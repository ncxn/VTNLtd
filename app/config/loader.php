<?php

use Phalcon\Loader;

$loader = new Loader();

/**
 * Register Namespaces
 */
$loader->registerNamespaces([
    'Vtnltd\Model'      => APP_PATH . '/common/models/',
    'Vtnltd\Lib'        => APP_PATH . '/common/library/',
    'Vtnltd\Form'       => APP_PATH . '/common/forms/',
    'Vtnltd\Plugin'       => APP_PATH . '/common/library/plugin',
]);

/**
 * Register module classes
 */
$loader->registerClasses([
    'Vtnltd\Modules\Home\Module'     => APP_PATH . '/modules/home/Module.php',
    'Vtnltd\Modules\Cli\Module'      => APP_PATH . '/modules/cli/Module.php'
]);

$loader->register();
