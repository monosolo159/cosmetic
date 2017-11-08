<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}
	}

	public function LoadPageFront($value){

		$value['Result']['AllProduct'] = $this->Productmodel->productList();
		$value['Result']['CategoryList'] = $this->Productmodel->categoryListFront();

		if(isset($value['Result'])){
			$data = $value['Result'];
			$this->load->view('template/front/header', $data);
		}else{
			$this->load->view('template/front/header');
		}
		$this->load->view($value['View']);
		$this->load->view('template/front/footer');
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

	public function paymentTypeList(){
		$PaymentTypeList = $this->Paymentmodel->paymentTypeList();
		// print_r($ProductList);
    $value = array(
      'Result' => array(
        'PaymentTypeList' => $PaymentTypeList
      ),
      'View' => 'back/payment/payment_type_list'
    );
    $this->LoadPage($value);
	}

	public function paymentList(){
		$PaymentList = $this->Paymentmodel->paymentList();
		$order = $this->Ordermodel->selectOrderAll();




		// $input = $this->uri->segment(3);
		// $order = $this->Ordermodel->selectOrderOne($input);
		// $order_list = $this->Ordermodel->selectOrderList($order[0]['order_id']);
		//
		// $value = array(
		// 	'Result' => array(
		// 		'order' => $order,
		// 		'order_list' => $order_list,
		// 	),
		// 	'View' => 'back/order/order_detail'
		// );
		//


		// print_r($ProductList);
    $value = array(
      'Result' => array(
        'PaymentList' => $PaymentList,
				'order' => $order
      ),
      'View' => 'back/payment/payment_list'
    );
    $this->LoadPage($value);
	}

	public function enablePaymentType(){
		$input['payment_type_id'] = $this->uri->segment(3);
		$input['payment_type_enable'] = $this->uri->segment(4);

		if($input['payment_type_enable'] == 0){
			$input['payment_type_enable'] = 1;
		}else if($input['payment_type_enable'] == 1){
			$input['payment_type_enable'] = 0;
		}

		$this->Paymentmodel->enablePaymentType($input);
		redirect('Payment/paymentTypeList');
	}

	public function bookBankList(){
		$BookbankTypeList = $this->Paymentmodel->bookBankList();
		// print_r($ProductList);
		$value = array(
			'Result' => array(
				'BookbankTypeList' => $BookbankTypeList
			),
			'View' => 'back/payment/payment_bookbank_list'
		);
		$this->LoadPage($value);
	}

	public function bookbankAddForm(){
		$value = array(
      'View' => 'back/payment/payment_bookbank_insert'
    );
		$this->LoadPage($value);
	}

	public function bookbankAdd(){
		$input = $this->input->post();
		unset($input['imgfiles']);


		$ext = pathinfo($_FILES["imgfiles"]["name"],PATHINFO_EXTENSION);
		$code = DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");
		$new_file = md5($product_id.'_'.$code).'.'.$ext;
		$input['bank_image'] = $new_file;
		if(move_uploaded_file($_FILES["imgfiles"]["tmp_name"],"assets/image/bookbank/".$new_file)){
			$bookbank_id = $this->paymentmodel->bookbankAdd($input);
		}

		redirect('Payment/bookBankList');

	}

	public function bookbankFormEdit(){
		$input = $this->uri->segment(3);
		$BookbankSelect = $this->Paymentmodel->bookbankSelect($input);
		$value = array(
			'Result' => array(
        'BookbankSelect' => $BookbankSelect
      ),
      'View' => 'back/payment/payment_bookbank_edit'
    );
		$this->LoadPage($value);
	}

	public function bookbankEdit(){

		$input = $this->input->post();
		unset($input['imgfiles']);
		if(file_exists($_FILES['imgfiles']['tmp_name']) || is_uploaded_file($_FILES['imgfiles']['tmp_name'])){
			$ext = pathinfo($_FILES["imgfiles"]["name"],PATHINFO_EXTENSION);
			$code = DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");

			$bank_image = $this->Paymentmodel->bookbankSelect($input['bank_id']);

			$new_file = md5($bank_image['bank_id'].'_'.$code).'.'.$ext;
			$input['bank_image'] = $new_file;


			if($bank_image[0]['bank_image']){
				unlink('assets/image/bookbank/'.$bank_image[0]['bank_image']);
			}
			move_uploaded_file($_FILES["imgfiles"]["tmp_name"],"assets/image/bookbank/".$new_file);
		}
		$this->Paymentmodel->bookbankEdit($input);

		redirect('Payment/bookBankList');
	}

	public function bookbankFormDelete(){
		$bank_id = $this->uri->segment(3);
		$bank_image = $this->Paymentmodel->bookbankSelect($bank_id);
		$query = $this->Paymentmodel->bookbankFormDelete($bank_id);
		if($query==1){
			unlink('assets/image/bookbank/'.$bank_image[0]['bank_image']);
		}
		redirect('Payment/bookBankList');
	}

	public function confirmPayment(){
		$input = $this->input->post();
		$input['payment_date'] = $input['year']."-".$input['month']."-".$input['day']." ".$input['timeh'].":".$input['timem'];
		unset($input['year']);
		unset($input['month']);
		unset($input['day']);
		unset($input['timeh']);
		unset($input['timem']);
		unset($input['imgfiles']);

		$ext = pathinfo($_FILES["imgfiles"]["name"],PATHINFO_EXTENSION);
		$code = DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");

		$new_file = md5($code).'.'.$ext;
		$input['payment_slip'] = $new_file;
		if(move_uploaded_file($_FILES["imgfiles"]["tmp_name"],"assets/image/confirm_payment/".$new_file)){
			$this->Paymentmodel->paymentAdd($input);

			redirect('Home/confirmPayment/success');
		}
	}

	public function paymentConfirmOrder(){

		$input = $this->uri->segment(3);
		$data['order_id'] = $input;
		$data['order_status_id'] = 2;
		$this->Ordermodel->updateOrder($data);

		$inputp = $this->uri->segment(4);
		$pdata['payment_id'] = $inputp;
		$pdata['payment_status'] = 1;
		$this->Paymentmodel->paymentUpdate($pdata);


		redirect('Payment/paymentList');
	}

	public function viewSlip(){
		$input = $this->uri->segment(3);
		$viewSlip = $this->Paymentmodel->viewSlip($input);

		$value = array(
			'Result' => array(
				'viewSlip' => $viewSlip,
			),
			'View' => 'back/payment/payment_slip'
		);

		$this->load->view($value['View'],$value['Result']);
	}

}
