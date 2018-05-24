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
			header( "Location: /admin/auth/dashboard" );
		}

		if ( $_POST && App::getRouter()->get( 'email' ) )
		{
			if( $_POST && App::getRouter()->get( 'password' ) != null){

				$query = "WHERE email = '". App::getRouter()->get( 'email' ) . "' AND password = '". App::getRouter()->get( 'password' )."'";
				$model = $this->model->query($query);

				if($model){
					setcookie('auth', true);

					echo json_encode(['success' => 2]);
					die();
				}else{
					$this->data['error'] = 'Неправильный пароль';

					echo json_encode(['error' => 'Неправильный пароль']);
					die();
				}


			}
			$code = App::$mail->sendAuthMail( App::getRouter()->get( 'email' ) );

			$this->model->insert( [
				'email'    => App::getRouter()->get( 'email' ),
				'password' => $code
			] );

			echo json_encode(['success' => 1]);
			die();

		}

	}

	public function admin_dashboard()
	{

	}

	public function admin_orders()
	{
		$orders = new Order();
		$this->data['orders'] = $orders->all();
	}

	public function admin_order_view()
	{
		$orderModel = new Order();
		$order = $orderModel->find(App::getRouter()->getParams()[0]);

		if($order){
			$this->data['order'] = $order;
		}

		if ( $_POST && App::getRouter()->getAttributes() )
		{
			$orderModel->update(App::getRouter()->getAttributes(), $order['id']);

			echo json_encode(['success' => 1]);
			die();

		}
	}

	public function admin_products()
	{
		$product = new Product();
		$this->data['products'] = $product->all();
	}

}