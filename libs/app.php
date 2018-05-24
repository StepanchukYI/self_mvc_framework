<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 21:53
 */

class App
{

	protected static $router;

	public static $mail;

	public static $db;


	/**
	 * @return mixed
	 */
	public static function getRouter()
	{
		return self::$router;
	}

	public static function run( $url )
	{
		self::$router = new Router( $url );

		self::$mail = new Mail;

		self::$db = new Database( Config::get( 'db.host' ), Config::get( 'db.user' ), Config::get( 'db.password' ), Config::get( 'db.name' ) );

		$controller_class = ucfirst( self::$router->getController() ) . 'Controller';

		$controller_method = strtolower( self::$router->getMethodPrefix() . self::$router->getAction() );

		$controller_object = new $controller_class();

		if ( method_exists( $controller_object, $controller_method ) )
		{
			$view_path   = $controller_object->$controller_method();
			$view_object = new View( $controller_object->getData(), $view_path );
			$content     = $view_object->render();
		} else
		{
			throw new Exception( 'Method ' . $controller_method . ' of class ' . $controller_class . ' does not exist' );
		}

		$layout             = self::$router->getRoute();
		$layout_path        = VIEWS_PATH . DS . 'layout' . DS . $layout . '.php';
		$layout_view_object = new View( compact( 'content' ), $layout_path );

		echo $layout_view_object->render();
	}
}