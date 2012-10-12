<?php

/**
 * Description of app
 *
 * @author Alan Hoffmeister <contato@cranic.com.br>
 * @copyright Cranic Tecnologia e Informática LTDA <http://cranic.com.br>
 * @version 0.0.1
 * @license MIT <http://opensource.org/licenses/mit-license.php>
 * @date Oct 10, 2012
 * 
 */

namespace Coddy;

class Controller {

    public static function run($controller, $action) {
        $c = new $controller();
        $c->$action();
    }

}
