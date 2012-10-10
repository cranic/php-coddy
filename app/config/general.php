<?php

/**
 * General configuration files, please read the documentation to learn about
 * each setting.
 *
 * @author Alan Hoffmeister <contato@cranic.com.br>
 * @copyright Cranic Tecnologia e Informática LTDA <http://cranic.com.br>
 * @version 0.0.1
 * @license MIT <http://opensource.org/licenses/mit-license.php>
 * @date 2012-10-08 09:31 PM
 * 
 */
use Coddy\Config as Config;

/**
 * Configuring production enviroment
 */
Config::set([
    "env.production.url" => "localhost",
    "env.production.debug" => false,
    "env.production.log" => true,
    "env.production.errorReporting" => 0,
    "env.production.errorHandler" => "Coddy\\Loggery\\File",
    "env.production.urlPrefix" => "/",
    "env.production.logFile" => Config::get("path.app") . "log/production.log"
]);

/**
 * Configuring staging enviroment
 */
Config::set([
    "env.staging.url" => "localhost",
    "env.staging.debug" => true,
    "env.staging.log" => true,
    "env.staging.errorReporting" => -1,
    "env.staging.errorHandler" => "Coddy\\Loggery\\File",
    "env.staging.urlPrefix" => "/",
    "env.staging.logFile" => Config::get("path.app") . "log/staging.log"
]);

/**
 * Configuring development enviroment
 */
Config::set([
    "env.development.url" => "localhost",
    "env.development.debug" => true,
    "env.development.log" => true,
    "env.development.errorReporting" => -1,
    "env.development.errorHandler" => "Coddy\\Loggery\\Screen",
    "env.development.urlPrefix" => "coddy/",
    "env.development.logFile" => Config::get("path.app") . "log/development.log"
]);

/**
 * Configuring general settings
 */
Config::set([
    "timezone" => "America/Sao_Paulo",
    "env.mode" => "auto",
    "404route" => "/404"
]);

/**
 * Configuring security settings
 */
Config::set([
    "security.hash.key" => "wfbdn0aRuofE6lPYAjhPbIucqeNpOERnJbjkT2rIAfkcY1c77oDMTGWuLDKfXDqK9VQuUERwwgVa3Z9T",
    "security.hash.algo" => "sha512",
    "security.token" => "_n54wVC4Zhk12jF6KbO2hV5PeMf3mQiTo"
]);