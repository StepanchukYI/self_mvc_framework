<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 22:00
 */

class PageController extends Controller
{

	public function __construct( array $data = array() )
	{
		parent::__construct( $data );
		$this->model = new Product();
	}

	public function index()
	{
		$this->data['products'] = $this->model->all();

	}

	public function admin_index()
	{
		if ( $_COOKIE['auth'] )
		{
			header( "Location: /admin/dashboard" );
		} else
		{
			header( "Location: /admin/auth" );
		}
	}

	public function view()
	{
		$params = App::getRouter()->getParams();

		if ( isset( $params[0] ) )
		{
			echo $params[0];
		}
	}
}