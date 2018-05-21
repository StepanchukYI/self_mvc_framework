<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 21.05.2018
 * Time: 22:00
 */

class PageController extends Controller
{

	public function index()
	{
		App::$db->query( 'SELECT * FROM menus ' );
		$this->data['test_content'] = App::$db->query( 'SELECT * FROM categories ' );

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