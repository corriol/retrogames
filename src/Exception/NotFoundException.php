<?php
namespace App\Exception;

use App\Core\AppException;
use Throwable;

/**
 * Class NotFoundException
 */
class NotFoundException extends AppException
{
    public function __construct($message = "Error no s'ha trobat el recurs", $code = 404, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}