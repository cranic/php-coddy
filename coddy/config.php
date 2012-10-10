<?php

/**
 * Configuration class, everithing related to the config starts here.
 *
 * @author Alan Hoffmeister <contato@cranic.com.br>
 * @copyright Cranic Tecnologia e Informática LTDA <http://cranic.com.br>
 * @version 0.0.1
 * @license MIT <http://opensource.org/licenses/mit-license.php>
 * @date 2012-10-08 10:27 PM
 * 
 */

namespace Coddy;

class Config {

    /**
     *
     * @var type 
     */
    protected static $raw;

    /**
     * 
     * @param type $arr
     * @return type
     */
    public static function set($key, $value = null) {
        if (empty(self::$raw))
            self::$raw = [];

        if (is_array($key))
            self::$raw = array_merge(self::$raw, $key);
        else
            self::$raw[$key] = $value;
    }

    /**
     * 
     * @param type $str
     */
    public static function get($key = null) {
        if ($key == null)
            return self::$raw;
        elseif (isset(self::$raw[$key]))
            return self::$raw[$key];
        else
            return null;
    }

}
