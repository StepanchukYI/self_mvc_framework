<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 20:43
 */

require_once( ROOT . DS . 'config' . DS . 'config.php' );

function __autoload( $classname )
{
	$lib_path        = ROOT . DS . 'libs' . DS . strtolower( $classname ) . '.php';
	$controller_path = ROOT . DS . 'controllers' . DS . str_replace( 'controller', '', strtolower( $classname ) ) . 'Controller.php';
	$model_path      = ROOT . DS . 'model' . DS . strtolower( $classname ) . 'Model.php';

	if ( file_exists( $lib_path ) )
	{
		require_once( $lib_path );
	} elseif ( file_exists( $controller_path ) )
	{
		require_once( $controller_path );
	} elseif ( file_exists( $model_path ) )
	{
		require_once( $model_path );
	} else
	{
		throw new Exception( 'Failed to include class: ' . $classname );
	}
}