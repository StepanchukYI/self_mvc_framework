<?php
/**
 * Created by PhpStorm.
 * User: b0dun
 * Date: 22.05.2018
 * Time: 21:52
 */

class AuthController extends Controller
{

	public function __construct( array $data = array() )
	{
		parent::__construct( $data );
		$this->model = new Admin();
	}

	public function admin_index()
	{
		if ( $_COOKIE['auth'] )
		{
			header( "Location: " . $_SERVER['HTTP_HOST'] . '/admin/dashboard' );
		}

		if ( App::getRouter()->get( 'email' ) )
		{
			$code = App::$mail->sendAuthMail( App::getRouter()->get( 'email' ) );

			$this->model->insert( [
				'email'    => App::getRouter()->get( 'email' ),
				'password' => $code
			] );
		}

	}

	public function admin_password()
	{
		if ( $_COOKIE['auth'] )
		{
			header( "Location: " . $_SERVER['HTTP_HOST'] . '/admin/dashboard' );
		}

		if ( App::getRouter()->get( 'email' ) && App::getRouter()->get( 'password' ) )
		{
			$model = $this->model->select()->where( 'email', '=', App::getRouter()->get( 'email' ) )->where( 'password', '=', App::getRouter()->get( 'password' ) )
			if($model){
				$_COOKIE['auth'] = true;
			}else{
				$this->data['error'] = 'Неправильный пароль';
			}
		}
		header( "Location: " . $_SERVER['HTTP_HOST'] . '/admin/dashboard' );
	}

}