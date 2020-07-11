<?php


use App\Core\AppException;
use App\Core\Request;

try {
    require_once __DIR__ . '/../src/bootstrap.php';
    $request = new Request();
    echo $router->route($request);

} catch (AppException $appException) {
    echo $appException->handleException();
}

