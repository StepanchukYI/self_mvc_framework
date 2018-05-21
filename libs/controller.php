<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 21:56
 */

class Controller
{
	protected $data;

	protected $model;

	protected $params;

	/**
	 * @return mixed
	 */
	public function getData()
	{
		return $this->data;
	}

	/**
	 * @return mixed
	 */
	public function getModel()
	{
		return $this->model;
	}

	/**
	 * @return mixed
	 */
	public function getParams()
	{
		return $this->params;
	}

	public function __construct($data = array())
	{
		$this->data = $data;
		$this->params = App::getRouter()->getParams();
	}
}