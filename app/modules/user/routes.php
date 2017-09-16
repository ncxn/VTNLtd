<?php
$router = new \Phalcon\Mvc\Router(false);
$router->add(
    "(/.*)*",
    array(
        "controller" => "profile",
        "action"     => "index",
        "param"         => 1,
    )
);
