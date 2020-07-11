<?php
// DefaultController

$router->addGet("", "DefaultController", "index");

// Gestió d'usuaris
$router->addGet("admin/users", "UserController", "index", []);
$router->addGet("admin/users/create", "UserController", "create");
$router->addPost("admin/users/create", "UserController", "processCreate");
$router->addGet("admin/users/:id/edit", "UserController", "update", ["id"=>"number"]);
$router->addPost("admin/users/:id/edit", "UserController", "processUpdate", ["id"=>"number"]);
