<?php
class Checkout extends CI_Controller{
public function __construct()
{parent::__construct();
$this->load->library('form_validation');
$this->load->helper('form');
$this->load->library('cart');
$this->load->model('products');
$this->load->model('user_model');
$this->load->view('checkout/index');
}
	function index()
	{
		if ($this->cart->total_items() <= 0) {
			redirected('home/index');

		}

			$this->input->post('placeOrder');
			$data = $this->session->userdata('id');
			$insert = $this->products->getorder($data);
				$order = $this->placeOrder($insert);


				if ($order) {
					$this->session->set_userdata('success_msg', 'Order placed successfully.');
					redirect($this->controller . '/orderSuccess/' . $order);
				} else {
					$data['error_msg'] = 'Order submission failed, please try again.';
				}

		$data['cartitems'] = $this->cart->contents();
		$this->load->view($this->controller . '/index', $data);
}
	public function placeorder($custid){
	$ordata = array(
		'user_id' => $custid,
		'grand_total' => $this->cart->total()


	);

		$insertorder = $this->products->insertorder($ordata);
	if($insertorder){
		$cartitems = $this->cart->contents();
		$orditemdata = array();
		$i = 0;
		foreach($cartitems as $item){
			$orditemdata[$i]['order_id'] = $insertorder;
			$orditemdata[$i]['product_id'] = $item['id'];
			$orditemdata[$i]['quantity'] = $item['qty'];
			$orditemdata[$i]['order_id'] = $item["subtotal"];
			$i++;
		}
		if(!empty($orditemdata)){
			$insertorderitems = $this->products->insertorderitems($orditemdata);
			if($insertorderitems){
				$this->cart->destroy();
				return $insertorder;

			}
		}
	}
	return false;
	}
	public function ordersucces($ordid){
	$data['order'] = $this->products->getorder($ordid);
	$this->load->view($this->controller. '/order-success/', $data);
}
}




