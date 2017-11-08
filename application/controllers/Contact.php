<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}
		// $this->load->library('pagination');
	}

	public function LoadPage($value){
		if(isset($value['Result'])){
			$data = $value['Result'];
			$this->load->view('template/back/header', $data);
		}else{
			$this->load->view('template/back/header');
		}
    $this->load->view($value['View']);
    $this->load->view('template/back/footer');
  }

	public function addContact(){
		$input = $this->input->post();
		$input['contact_date'] = date("Y-m-d H:i:s");
		$this->Contactmodel->addContact($input);
		redirect('Home/contact/success');
	}

	public function contactList(){
		$contactList = $this->Contactmodel->contactList();
    $value = array(
      'Result' => array(
        'contactList' => $contactList
      ),
      'View' => 'back/contact/contact_list'
    );
    $this->LoadPage($value);
	}

	public function contactDetail(){
		$input = $this->uri->segment(3);
		$contactSelect = $this->Contactmodel->contactSelect($input);
		$value = array(
			'Result' => array(
				'contactSelect' => $contactSelect
			),
			'View' => 'back/contact/contact_detail'
		);
		$this->LoadPage($value);
	}


}
