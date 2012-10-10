<?php

/**
 * Main bootstrap for the Coddy Framework.
 * @todo Enable autoload from .phar file
 * 
 * @author Alan Hoffmeister <contato@cranic.com.br>
 * @copyright Cranic Tecnologia e Informática LTDA <http://cranic.com.br>
 * @version 0.0.1
 * @license MIT <http://opensource.org/licenses/mit-license.php>
 * @date 2012-10-05 02:01:14 AM
 */

/**
 * This is the default path, you can change it and leave the application
 * and/or framework path somewhere else outside the root http path.
 */
$frameworkPath = __DIR__ . "/coddy/";
$applicationPath = __DIR__ . "/app/";

/**
 * We will start all autoload fancy stuff.
 */
require_once __DIR__ . "/coddy/autoloader.php";

use Coddy\Autoloader as Autoloader;

Autoloader::register($frameworkPath, $applicationPath);

/**
 * Autoload all packages needed.
 */
use Coddy\Config as Config;

//use Coddy\Bootstrap as Bootstrap;
//use Coddy\Router as Router;

/**
 * Configure all the things we need.
 */
Config::set([
    "path.main" => $frameworkPath,
    "path.app" => $applicationPath
]);

/**
 * Include default application config file, database and routes.
 */
require_once $applicationPath . "config/general.php";
//require_once $applicationPath . "config/database.php";
//require_once $applicationPath . "config/router.php";

/**
 * Start the application
 */
print_r(Config::get());
//Bootstrap::init();
//Router::route();