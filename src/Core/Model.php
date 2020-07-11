<?php


namespace App\Core;


use App\Exception\NotFoundException;
use PDO;
use PDOException;
use Exception;

/**
 * Class Model
 * @package App\Core
 */
abstract class Model
{
    /**
     * @var
     */
    protected $entity;
    /**
     * @var
     */
    protected $table;
    /**
     * @var PDO
     */
    protected $pdo;

    /**
     * Model constructor.
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    // "published_at" => "DESC"

    /**
     * @param array $order
     * @return array
     */
    public function findAll($order = []): array
    {
        if (empty($order))
            $stmt = $this->pdo->query("SELECT * FROM $this->table");
        else // "ORDER BY published_at DESC"
        {
            $orderClause = array_map(function ($v, $k) {
                return sprintf("%s %s", $k, $v);
            },
                $order,
                array_keys($order)
            );
            // [0] => "published_at DESC"
            $orderClause = implode(', ', $orderClause);
            $stmt = $this->pdo->query("SELECT * FROM $this->table ORDER BY $orderClause");
        }
        $result = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->entity);

        return $result;
    }


    /**
     * @param int $id
     * @return IEntity
     * @throws NotFoundException
     */
    public function find(int $id): IEntity
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->entity);
        $stmt->execute();
        $entity = $stmt->fetch();

        if ($entity === false)
            throw new NotFoundException("No existeix $this->entity amb id $id");

        return $entity;
    }

    /**
     * @param array $data
     * @param string $operator
     * @return array
     */
    public function findBy(array $data = [], $operator = "AND"): array
    {

        $sql = "SELECT * FROM $this->table WHERE %s";

        // data = [username => proves]

        $whereClause = implode(" $operator ",
            array_map(
                function ($k) {
                    return sprintf("%s = :%s", $k, $k);
                },
                array_keys($data) // [0 => username]
            )
        );

        //$whereClause = implode(', ', [0 => username = :username]);


        $selectSQL = sprintf($sql, $whereClause);

        $stmt = $this->pdo->prepare($selectSQL);
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $this->entity);

        $stmt->execute($data);

        $entities = $stmt->fetchAll();

        return $entities;
    }

    /**
     * @param array $data
     * @return IEntity|null
     */
    public function findOneBy(array $data = []): ?IEntity
    {

        $entities = $this->findBy($data);

        return $entities[0];
    }

    /**
     * @param IEntity $entity
     * @return bool
     */
    public function update(IEntity $entity): bool
    {
        try {
            $data = $entity->toArray();

            $dataWithoutID = array_filter($data, function ($e) {
                return ($e !== 'id');
            }, ARRAY_FILTER_USE_KEY);

            $setClause = implode(', ', array_map(
                function ($k) {return sprintf("%s = :%s", $k, $k);},
                array_keys($dataWithoutID)
            ));
            // prepare la consulta preparada SQL d'insercio en la BB.DD.
            $sql = "UPDATE %s SET %s WHERE id = :id";

            $updateSQL = sprintf($sql, $this->table, $setClause);
            $stmt = $this->pdo->prepare($updateSQL);

            $stmt->execute($data);

            if ($stmt->rowCount() == 1) {
                return true;
            } else
                return false;

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;

        }// tanque catch
    }

    /**
     * @param IEntity $entity
     * @return bool
     */
    public function save(IEntity $entity): bool
    {
        try {
            // prepare la consulta preparada SQL d'insercio en la BB.DD.

            $data = $entity->toArray();

            $sql = 'INSERT INTO %s (%s) 
                    VALUES (%s)';

            $insertSQL = sprintf($sql, $this->table, implode(',', array_keys($data)),
                ':' . implode(', :', array_keys($data)));

            $stmt = $this->pdo->prepare($insertSQL);

            $stmt->execute($data);

            if ($stmt->rowCount() == 1) {
                $entity->setId((int)$this->pdo->lastInsertId());
                return true;
            } else
                return false;

        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }// tanque catch

    }

    /**
     * @param IEntity $entity
     * @return bool
     */
    public function delete(IEntity $entity): bool
    {
        // prepare la consulta preparada SQL d'insercio en la BB.DD.

        $sql = "DELETE FROM $this->table WHERE  id = :id";
        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(':id', $entity->getId(), PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() == 1) {
            return true;
        } else
            return false;

    }
}