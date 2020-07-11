<?php

namespace App\Core;

use App\Exception\NotFoundException;

/**
 * Class Controller
 * @package App\Core
 */
abstract class Controller
{
    /**
     * @var mixed
     */
    private $response;

    /**
     * Controller constructor.
     * @throws NotFoundException
     */
    public function __construct()
    {
        $this->response = App::get('response');
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }


}