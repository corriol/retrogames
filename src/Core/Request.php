<?php
namespace App\Core;

/**
 * Class Request
 * @package App\Core
 */
class Request
{
    /**
     * @var string
     */
    private $path;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $requestedUri = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

        $this->path = trim(parse_url($requestedUri, PHP_URL_PATH), '/');
    }

    /**
     * @return mixed
     */
    public function getRequestMethod()
    {
        return $_SERVER["REQUEST_METHOD"];
    }


}