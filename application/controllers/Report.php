<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}

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

	public function all(){

		$value = array(
			'Result' => array(
			),
			'View' => 'back/report/all'
		);
		$this->LoadPage($value);
	}

	public function viewall(){
		$input = $this->input->post();

		$productOrder = $this->Ordermodel->productOrder($input);
		$productOrderList = $this->Ordermodel->productOrderList($input);

		// print_r($productOrderList);

		$value = array(
			'Result' => array(
				'input' => $input,
				'productOrder' => $productOrder,
				'productOrderList' => $productOrderList
			),
			'View' => 'back/report/all'
		);
		$this->LoadPage($value);
	}

	public function printReport(){
		$input['date_start'] = $this->uri->segment(3)."/".$this->uri->segment(4)."/".$this->uri->segment(5);
		$input['date_end'] = $this->uri->segment(6)."/".$this->uri->segment(7)."/".$this->uri->segment(8);
		// print_r($input);

		$productOrder = $this->Ordermodel->productOrder($input);
		$productOrderList = $this->Ordermodel->productOrderList($input);

		// print_r($productOrderList);

		$value = array(
			'Result' => array(
				'input' => $input,
				'productOrder' => $productOrder,
				'productOrderList' => $productOrderList
			),
			'View' => 'back/report/print'
		);
		$this->load->view($value['View'],$value['Result']);
	}

}
