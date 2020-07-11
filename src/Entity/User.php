<?php


namespace App\Entity;


use App\Core\IEntity;
use DateTime;

class User implements IEntity
{
    /**
     * @var
     */
    private $id;
    /**
     * @var
     */
    private $username;
    /**
     * @var
     */
    private $password;
    /**
     * @var
     */
    private $role;
    /**
     * @var
     */
    private $lastLogin;

    public function __construct()
    {

    }

    public function toArray()
    {
        // La gestió de la data és diferent perquè pot haver valors nulls.
        return ["id" => $this->getId(),
            "username" => $this->getUsername(),
            "password" => $this->getPassword(),
            "role" => $this->getRole(),
            "lastlogin"=> ($this->getLastLogin()!==null)?$this->getLastLogin()->format('d-m-Ÿ H:i:s'):null
        ];
    }

    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return DateTime|null
     * @throws \Exception
     */
    public function getLastLogin()
    {
        if (is_string($this->lastLogin))
            $this->setLastLogin(new DateTime($this->lastLogin));

        return $this->lastLogin;
    }

    /**
     * @param DateTime $lastLogin
     */
    public function setLastLogin(?DateTime $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }
}