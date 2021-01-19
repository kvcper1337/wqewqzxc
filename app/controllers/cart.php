<?php
class Cart extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('products');
	}

	public function index()
	{
		$data = array();

		$data["cartitems"] = $this->cart->contents();
		$this->load->view('layouts/header');
		$this->load->view('layouts/cart', $data);
	}

	public function updateitemqty()
	{
		$updade = 0;
		$rowid = $this->input->get('rowid');
		$qty = $this->input->get('qty');
		if(!empty($rowid) && !empty($qty)){
			$data = array(
						'rowid' => $rowid,
						  'qty' => $qty
					);
			$update = $this->cart->update($data);
		}
		echo $update?'ok': 'error';
	}
	public function removeitem($rowid){
		$remove = $this->cart->remove($rowid);
		redirect('cart/index');
	}
		 public function removeall(){
			 $this->cart->destroy;
			redirect('cart/index');
}


}
