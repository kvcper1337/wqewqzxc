<?php
class Products extends CI_Model{
	public function __construct()
	{$this->productTable ='product';
	$this->userTable='user';
	$this->orderTable = 'orders';
	$this->orderitemsTable ='order_items';
	}
	public function getrows($id = ''){
		$this->db->select('*');
		$this->db->from($this->productTable);
		$this->db->where('status', '1');
		if($id){
			$this->db->where('id', $id);
			$query = $this->db->get();
			$result = $query->row_array();

		}
		else{
			$this->db->order_by('name', 'asc');
			$query = $this->db->get();
			$result=$query->result_array();
		}
		return !empty($result)?$result:false;
	}
	public function getorder($id){

		$this->db->select('o.*, u.username, u.email, u.id');
		$this->db->from($this->userTable. ' as u');
		$this->db->join($this->orderTable. ' as o', 'u.id = o.user_id', 'left');
		$this->db->where('o.id', $id);
		$query = $this->db->get();
		$result=$query->row_array();

		$this->db->select('item.*, p.image, p.name, p.price');
		$this->db->from($this->orderitemsTable. ' as item');
		$this->db->join($this->productTable. ' as p', 'p.id = item.product_id', 'left');
		$this->db->where('item.order_id', $id);
		$query2 = $this->db->get();
		$result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
		return !empty($result)?$result:false;
	}
	public function insertorder($data){

		if(!array_key_exists("created", $data)){
			$data['created'] = date("Y-m-d H:i:s");
		}
		if(!array_key_exists("modified", $data)){
			$data['modified'] = date("Y-m-d H:i:s");
		}
		$insert = $this->db->insert('orders', $data);

		return $insert;
	}
	public function insertorderitems($data = array()) {
		$insert=$this->db->insert_batch('order_items', $data);

		return $insert?true:false;
	}
}
