<?php

$router = new Phalcon\Mvc\Router(False);

$router->add('user/confirm/{code}/{email}', [
    'controller'    => 'confirmEmail',
    'action'        => 'confirmEmail'
]);
$router->add('/user/resetPwd/{code}/{email}', [
    'module'        => 'user',
    'controller'    => 'resetPwd',
    'action'        => 'index',
]);
return $router;