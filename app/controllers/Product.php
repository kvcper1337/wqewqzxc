<?php
class Product extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');

		$this->load->model('products');
	}

	public function addtocart($productid)
	{
		$product = $this->products->getrows($productid);
		$data = array(
			'id' => $product['id'],
			'qty' => 1,
			'price' => $product['price'],
			'name' => $product['name'],
			'image' => $product['image']
		);
		$this->cart->insert($data);
		redirect('cart/index');


	}
}
