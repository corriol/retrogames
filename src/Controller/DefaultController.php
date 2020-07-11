<?php

namespace App\Controller;

use App\Core\Controller;


/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends Controller
{
    /**
     * @return string
     */
    public function index(): string
    {
        return $this->getResponse()->renderView('index', 'default', array());
    }
}