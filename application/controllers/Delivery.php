<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delivery extends CI_Controller {
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

	public function deliveryTypeList(){
		$DeliveryTypeList = $this->Deliverymodel->deliveryTypeList();
		// print_r($ProductList);
    $value = array(
      'Result' => array(
        'DeliveryTypeList' => $DeliveryTypeList
      ),
      'View' => 'back/delivery/delivery_type_list'
    );
    $this->LoadPage($value);
	}

	public function enableDeliveryType(){
		$input['delivery_id'] = $this->uri->segment(3);
		$input['delivery_enable'] = $this->uri->segment(4);

		if($input['delivery_enable'] == 0){
			$input['delivery_enable'] = 1;
		}else if($input['delivery_enable'] == 1){
			$input['delivery_enable'] = 0;
		}

		$this->deliverymodel->enableDeliveryType($input);
		redirect('Delivery/deliveryTypeList');
	}

	public function deliveryTypeEditForm(){
		$input = $this->uri->segment(3);
		$DeliverySelect = $this->Deliverymodel->deliveryTypeSelect($input);
		$value = array(
			'Result' => array(
        'DeliverySelect' => $DeliverySelect
      ),
      'View' => 'back/delivery/delivery_type_form_edit'
    );
		$this->LoadPage($value);
	}

	public function deliveryTypeEdit(){

		$input = $this->input->post();
		$this->Deliverymodel->deliveryTypeEdit($input);

		redirect('Delivery/deliveryTypeList');
	}

	public function deliveryStatus(){

		$deliveryStatus = $this->Deliverymodel->deliveryStatus();
		// print_r($ProductList);
    $value = array(
      'Result' => array(
        'deliveryStatus' => $deliveryStatus
      ),
      'View' => 'back/delivery/delivery_status'
    );
    $this->LoadPage($value);

	}

	public function addDeliveryStatusForm(){
		$order = $this->Ordermodel->selectOrderAll2();
		$value = array(
      'Result' => array(
				'order' => $order
      ),
      'View' => 'back/delivery/delivery_status_insert'
    );
    $this->LoadPage($value);
	}

	public function addDeliveryStatus(){
		$input = $this->input->post();
		// print_r($input);
		$this->Deliverymodel->addDeliveryStatus($input);

		$data['order_id'] = $input['order_id'];
		$data['order_status_id'] = 3;
		$this->Ordermodel->updateOrder($data);
		redirect('delivery/deliveryStatus');
	}












	// public function paymentList(){
	// 	$PaymentList = $this->paymentmodel->paymentList();
	// 	// print_r($ProductList);
  //   $value = array(
  //     'Result' => array(
  //       'PaymentList' => $PaymentList
  //     ),
  //     'View' => 'back/payment/payment_list'
  //   );
  //   $this->LoadPage($value);
	// }
	//
	// public function enablePaymentType(){
	// 	$input['payment_type_id'] = $this->uri->segment(3);
	// 	$input['payment_type_enable'] = $this->uri->segment(4);
	//
	// 	if($input['payment_type_enable'] == 0){
	// 		$input['payment_type_enable'] = 1;
	// 	}else if($input['payment_type_enable'] == 1){
	// 		$input['payment_type_enable'] = 0;
	// 	}
	//
	// 	$this->paymentmodel->enablePaymentType($input);
	// 	redirect('payment/paymentTypeList');
	// }
}
