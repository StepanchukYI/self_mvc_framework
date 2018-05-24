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

		if ( $_POST && App::getRouter()->getAttributes() != null )
		{
			$order = new Order();

			$product = $this->model->find(App::getRouter()->get('product_id'));

			if($product){
				$order->insert( [
					'name' => App::getRouter()->get('name'),
					'product_id' => $product['id'],
					'price' => $product['price'],
					'comment' => App::getRouter()->get('comment'),
					'phone' => App::getRouter()->get('phone')
				] );
				if ( $order )
				{
					echo json_encode(['success' => 1]);
					die();
				} else
				{
					echo json_encode(['error' => 'Что-то пошло не так!']);
					die();
				}
			}else{
				echo json_encode(['error' => 'Товар не найден']);
				die();
			}




		}

	}

	public function admin_index()
	{
		if ( $_COOKIE['auth'] )
		{
			header( "Location: /admin/auth/dashboard" );
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