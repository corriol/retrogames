<?php


namespace App\Core;

use App\Exception\NotFoundException;
use Exception;
use Throwable;

/**
 * Class AppException
 * @package App\Core
 */
class AppException extends Exception
{
    /**
     * AppException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "Error intern de servidor", $code = 500, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


    /**
     * @return mixed
     * @throws NotFoundException
     */
    public function handleException()
    {
        $message = $this->getMessage();
        $code = $this->getCode();
        // HTTP/1.1 404 Not found

        $httpStatus = $this->getHttpStatus();

        header($_SERVER["SERVER_PROTOCOL"] . ' ' . $httpStatus);
        $response = App::get('response');
        return $response->renderView('error', 'default', compact('message', 'code'));
    }

    /**
     * @return mixed
     * @throws NotFoundException
     */
    public function handleAPIException()
    {
        $message = $this->getMessage();
        $code = $this->getCode();
        // HTTP/1.1 404 Not found

        $httpStatus = $this->getHttpStatus();

        header($_SERVER["SERVER_PROTOCOL"] . ' ' . $httpStatus);

        $response = App::get('response');
        return $response->jsonResponse($httpStatus);
    }

    /**
     * @return string
     */
    private function getHttpStatus(): string
    {
        switch ($this->getCode()) {
            case 404:
                $status = "404 Not Found";
                break;

            case 403:
                $status = "403 Forbidden";
                break;

            default:
                $status = "Internal Server Error";

        }
        return $status;
    }
}