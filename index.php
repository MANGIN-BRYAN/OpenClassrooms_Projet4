<?php
/* 
|--------------------------------------------------------------------------
 My Super Blog custom MVC
|--------------------------------------------------------------------------
*/


// define path to the directory that has all of "app", "public", "vendor", other directories.
define('BASE_DIR',  dirname(__FILE__));
// define path to app directory.
define('APP',  BASE_DIR . "/app/");

// define path to upload images, use Config::get('root') . "/img/" for get image.
define('IMAGES',   str_replace("\\", "/", __DIR__) . "/img/");

// Required! Autoload : using composer
require  'vendor/autoload.php';

// Register Exception handlers : the methods while there is an error | or an exception has been thrown.
Handler::register();

// Start session for admin
Session::init();

// start new object
$mysuperblog = new App();

// Config::set('root', $app->request->root());
define('PUBLIC_ROOT', $mysuperblog->request->root() . '/');
define('THEMES_ROOT', $mysuperblog->request->root() . '/public/');

// run
$mysuperblog->run();