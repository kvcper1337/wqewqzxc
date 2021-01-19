<?php
class Users extends CI_Controller
{

	public function register()
	{
		$this->load->library('cart');
		$this->load->helper('security');
		xss_clean('username');
		xsS_clean('email');
		xss_clean('firstname');
		xss_clean('lastname');
		xsS_clean('password');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Login:', 'trim|required|max_length[50]|min_length[2]');
		$this->form_validation->set_rules('email', 'Email:', 'trim|required|max_length[90]|min_length[2]|valid_email');
		$this->form_validation->set_rules('firstname', 'Imie:', 'trim|required|max_length[50]|min_length[2]');
		$this->form_validation->set_rules('lastname', 'Nazwisko:', 'trim|required|max_length[50]|min_length[2]');
		$this->form_validation->set_rules('password', 'Password:', 'trim|required|max_length[50]|min_length[2]');
		$this->form_validation->set_rules('password2', 'Potwierdz haslo:', 'trim|required|matches[password]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layouts/header');
			$this->load->view('users/register');
			$this->load->view('layouts/footer');

		} else {
			if ($this->User_model->create_member()) {
				$this->session->set_flashdata('registered', 'You are registered and can log in');
				redirect('users/register');
			}
		}
	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Login:', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('password', 'Haslo:', 'trim|required|min_length[4]|max_length[50]');
		if ($this->form_validation->run() == FALSE) {
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user_id = $this->User_model->login_user($username, $password);

			if ($user_id) {
				$user_data = array(
						'id' => $user_id,
					   'username' => $username,
					  'logged_in' => true
				);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('login_success', 'witaj    '. $username);
				redirect('home/index');
			} else {
				$this->session->set_flashdata('login_failed', 'bledny login');
				redirect('users/register');
			}

			}

		}
			public function logout(){
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('username');
			$this->session->sess_destroy();

				$this->session->set_flashdata('log_out', 'poprawnie wylogowano');
				redirect('home/index');
			}
}
