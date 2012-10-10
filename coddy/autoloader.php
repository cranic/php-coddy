<?php

/**
 * Autoload namespaces and classes automatically.
 *
 * @author Alan Hoffmeister <contato@cranic.com.br>
 * @copyright Cranic Tecnologia e Informática LTDA <http://cranic.com.br>
 * @version 0.0.1
 * @license MIT <http://opensource.org/licenses/mit-license.php>
 * @date 2012-10-05 02:01:14 AM
 */

namespace Coddy;

class Autoloader {

    /**
     * Main autoload method.
     * 
     * @todo Implement autoload for loading namespaces inside .phar archives
     * @param String $dir The main path for the project
     */
    public static function register($frameworkPath, $appPath) {
        spl_autoload_register(function($namespace) use($frameworkPath, $appPath) {
            $namespacePath = explode("\\", $namespace);
            $package = array_shift($namespacePath);
            if ($package == "Coddy")
                $path = $frameworkPath . strtolower(implode("/", $namespacePath)) . ".php";
            elseif ($package == "App")
                $path = $appPath . strtolower(implode("/", $namespacePath)) . ".php";
            else
                return false;

            return is_file($path) ? require_once $path : false;
        });
    }

}
