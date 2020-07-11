<?php
namespace App;

use App\Core\AppException;
use App\Exception\DBException;
use Exception;
use PDO;
use PDOException;

class DBConnection
{

    private $connection;

    private function __construct()
    {
        try {
            $config = require __DIR__ . '/../config/config.php';


            $name = $config["database"]["name"];
            $user = $config["database"]["user"];
            $pass = $config["database"]["pass"];
            $connection = $config["database"]["connection"];
            $options = $config["database"]["options"];

            $this->connection = new PDO("$connection;dbname=$name", $user, $pass, $options);


        } catch (PDOException $e) {
            throw new DBException("S'ha produït un error en intentar connectar al servidor de base de dades: " . $e->getMessage());

        } catch (Exception $e) {
            throw new DBException("S'ha produït un error en intentar connectar al servidor de base de dades: " . $e->getMessage());
        }
    }

    public static function getConnection(): PDO
    {
        try {
            $PDO = new DBConnection();
        } catch (Exception $e) {
            throw new AppException("S'ha produït un error en intentar connectar al servidor de base de dades: " . $e->getMessage());
        }
        return $PDO->connection;
    }
}

