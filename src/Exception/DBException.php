<?php


namespace App\Exception;


use App\Core\AppException;
use Throwable;

class DBException extends AppException
{
    public function __construct($message = "Error de base de dades", $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}