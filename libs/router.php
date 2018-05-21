<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 20:53
 */

class Router
{
	protected $url;
	protected $controller;
	protected $action;
	protected $params;
	protected $route;
	protected $method_prefix;

	/**
	 * @return mixed
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @return mixed
	 */
	public function getController()
	{
		return $this->controller;
	}

	/**
	 * @return mixed
	 */
	public function getAction()
	{
		return $this->action;
	}

	/**
	 * @return mixed
	 */
	public function getParams()
	{
		return $this->params;
	}

	/**
	 * @return mixed
	 */
	public function getRoute()
	{
		return $this->route;
	}

	/**
	 * @return mixed
	 */
	public function getMethodPrefix()
	{
		return $this->method_prefix;
	}


	/**
	 * Router constructor.
	 *
	 * @param $url
	 */
	public function __construct($url)
	{
		$this->url = urldecode(trim($url, '/'));

		$routes = Config::get('routes');
		$this->route = Config::get('default_route');
		$this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';

		$this->controller = Config::get('default_controller');
		$this->action = Config::get('default_action');

		$url_part = explode('?', $this->url);

		$path = $url_part[0];

		$path_part = explode('/', $path);

		if( in_array(strtolower(current($path_part)), array_keys($routes)) ){
			$this->route = strtolower(current($path_part));
			$this->method_prefix = isset($routes[$this->route]) ? $routes[$this->route] : '';
			array_shift($path_part);
		}

		if(current($path_part)){
			$this->controller = strtolower(current($path_part));
			array_shift($path_part);
		}

		if(current($path_part)){
			$this->action = strtolower(current($path_part));
			array_shift($path_part);
		}

		$this->params = $path_part;

	}



}