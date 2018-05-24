<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 20:43
 */

define( 'DS', DIRECTORY_SEPARATOR );
define( 'ROOT', dirname( dirname( __FILE__ ) ) );
define( 'VIEWS_PATH', ROOT . DS . 'view' );

require_once( ROOT . DS . 'libs' . DS . 'init.php' );

session_start();

App::run( $_SERVER['REQUEST_URI'] );