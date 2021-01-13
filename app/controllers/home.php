<?php
class Home extends CI_Controller{
	public function index()
	{
		$data = array();
		$data['product'] = $this->products->getrows();

		$this->load->view('layouts/header');
		$this->load->view('layouts/slider');
		$this->load->view('home', $data);
		$this->load->view('layouts/footer');
	}





}
