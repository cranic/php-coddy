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
     * @var type 
     */
    public static $get;

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

        self::reload();
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

    private static function reload() {
        $reloaded = [];
        foreach (self::$raw as $key => $val) {
            $keys = array_reverse(explode('.', $key));
            if (count($keys) < 2)
                $reloaded = array_merge_recursive($reloaded, [$key => $val]);
            else {
                $array = [];
                foreach ($keys as $key) {
                    $array = empty($array) ? [$key => $val] : [$key => $array];
                }
                $reloaded = array_merge_recursive($reloaded, $array);
            }
        }
        self::$get = self::arrayToObject($reloaded);
    }

    private static function arrayToObject($array) {
        if (!is_array($array)) {
            return $array;
        }

        $object = new \stdClass();
        if (is_array($array) && count($array) > 0) {
            foreach ($array as $name => $value) {
                $name = strtolower(trim($name));
                if (!empty($name)) {
                    $object->$name = self::arrayToObject($value);
                }
            }
            return $object;
        } else {
            return false;
        }
    }

}
