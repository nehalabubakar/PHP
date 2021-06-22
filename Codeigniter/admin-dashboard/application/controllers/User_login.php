<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_login extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Database_queries');
	}

	public function index()
	{
		$this->load->view('common/header');
		$this->load->view('login');
	}

	public function create_account()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$user_role = $this->input->post('user_role');
		if (!isset($user_role)) {
			$user_role = 'user';
		}

		if ($this->form_validation->run()) {
			$new_user_details = array(
				'name'		=> $this->input->post('name'),
				'email'		=> $this->input->post('email'),
				'password'	=> $this->encryption->encrypt($this->input->post('password')),
				'user_role_id'	=> $user_role,
			);

			$user_created = $this->Database_queries->create_user($new_user_details);

			if ($user_created === true || $user_created === 1) {
				$data['message'] = 'Account Created Successfully';
				$data['class'] = 'alert-success';
			} else {
				$data['message'] = $user_created;
				$data['class'] = 'alert-danger';
			}
		} else {
			$errors = $this->form_validation->error_array();
			$errorsKeys = array_keys($errors);
			$data['message']	= $errors[$errorsKeys[0]];
			$data['class']		= 'alert-danger';
		}

		echo json_encode($data);
	}

	public function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run()) {
			$login_details = array(
				'email' 	=>	$this->input->post('email'),
				'password'	=>	$this->input->post('password')
			);
			$can_login = $this->Database_queries->login($login_details);
			if ($can_login === true || $can_login === 1) {
				$user_session = array(
					'email'	=>	$this->input->post('email'),
				);
				$this->session->set_userdata($user_session);
				$data['message'] = 'Login Successful';
				$data['class'] = 'alert-success';
				$data['redirect'] = 'Dashboard';
			} else {
				$data['message'] = $can_login;
				$data['class'] = 'alert-danger';
			}
		} else {
			$errors = $this->form_validation->error_array();
			$errorsKeys = array_keys($errors);
			$data['message'] = $errors[$errorsKeys[0]];
			$data['class'] = 'alert-danger';
		}

		echo json_encode($data);
	}
}
