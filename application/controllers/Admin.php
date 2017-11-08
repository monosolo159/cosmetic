<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}
		// $this->load->library('pagination');
	}
	// public function loadpage($value)
	// {
	// 	$this->load->view('template/back/header'$value['Result']);
	// 	$this->load->view($value['View']);
	// 	$this->load->view('template/back/footer');
	// }
	public function home(){
			$this->load->view('template/back/header');
			$this->load->view('admin');
			$this->load->view('template/back/footer');
	}

	public function index(){
		if(!isset($_SESSION["ADMIN_ID"])){
			$this->load->view('back/login');
		}else{
			redirect('Order/orderList');
		}
	}

	public function login()
	{
		$data = $this->input->post();
		$User = $this->Adminmodel->login($data);
		if (empty($User))
		{
			redirect($this->agent->referrer(), 'refresh');
		} else {
			$_SESSION['ADMIN_ID'] = $User[0]['admin_id'];
			$_SESSION['ADMIN_FNAME'] = $User[0]['admin_fname'];
			$_SESSION['ADMIN_LNAME'] = $User[0]['admin_lname'];
			redirect('Admin');
		}
	}

	public function logout() {
		// session_destroy();
		unset($_SESSION["ADMIN_ID"]);
		redirect('Admin');
	}

}
