<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 22:22
 */

class View
{

	protected $data;

	protected $path;

	protected static function getDefaultViewPath()
	{
		$router = App::getRouter();

		if ( ! $router )
		{
			return false;
		}

		$controller_dir = $router->getController();
		$template_name  = $router->getMethodPrefix() . $router->getAction() . '.php';

		return VIEWS_PATH . DS . $controller_dir . DS . $template_name;
	}

	public function __construct( $data = array(), $path = null )
	{
		if ( ! $path )
		{
			$path = $this->getDefaultViewPath();
		}

		if ( ! file_exists( $path ) )
		{
			throw new Exception( 'View not found in path ' . $path );
		}
		$this->path = $path;
		$this->data = $data;


	}

	public function render()
	{
		$data = $this->data;

		ob_start();
		include( $this->path );
		$content = ob_get_clean();

		return $content;
	}


}