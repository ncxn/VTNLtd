<?php
$router = new \Phalcon\Mvc\Router(false);
$router->add(
     '/user/{id}',
     array(
         'controller' => 'profile',
         'action'     => 'index',
     )
 );

$router->add(
     '/user/profile/{id}',
     array(
        'controller' => 'profile',
        'action'     => 'abc'
     )
 );

 return $router;