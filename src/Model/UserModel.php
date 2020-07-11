<?php


namespace App\Model;


use App\Core\Model;
use App\Entity\User;
use PDO;

class UserModel extends Model
{
    public function __construct(PDO $pdo)
    {
        $this->entity = User::class;
        $this->table = 'user';
        parent::__construct($pdo);
    }

}