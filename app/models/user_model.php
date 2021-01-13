<?php
class User_model extends CI_Model{
	public function create_member(){
		$enc_password = md5($this->input->post('password'));
		$data = array(
			'username' 		=> $this->input->post('username'),
			'firstname' 	=> $this->input->post('firstname'),
			'lastname' 		=> $this->input->post('lastname'),
			'email' 		=> $this->input->post('email'),
			'password' 		=> $enc_password,
		);
		//$query = $this->db->get('user');
		$insert = $this->db->insert('user', $data);
		return $insert;
	}
	public function login_user($username, $password){
		$enc_password = md5($password);
		$this->db->where('username',$username);
		$this->db->where('password',$enc_password);

		$result = $this->db->get('user');
		if($result->num_rows() == 1){
		return $result->row(0)->id;}
		else{return false;
		}
}
}


