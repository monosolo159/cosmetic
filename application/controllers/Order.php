<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
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

	public function confirmOrder(){
		$input = $this->input->post();
		$address = $this->Membermodel->selectAddressOne($input['mad_id']);

		$input['order_date'] = date("Y-m-d H:i:s");
		$input['order_status_id'] = 1;
		$input['member_id'] = $_SESSION['MEMBER_ID'];
		$input['member_fname'] = $address[0]['member_fname'];
		$input['member_lname'] = $address[0]['member_lname'];
		$input['member_address'] = $address[0]['member_address'];
		$input['province_id'] = $address[0]['province_id'];
		$input['member_zipcode'] = $address[0]['member_zipcode'];

		// print_r($input);
		$order_id = $this->Ordermodel->addOrder($input);


	  for($i=0;$i<=(int)$_SESSION["intLine"];$i++)
	  {
		  if($_SESSION["strProductID"][$i] != "")
		  {
				$order_list['order_id'] = $order_id;
				$order_list['product_id '] = $_SESSION["strProductID"][$i];
				$order_list['order_list_value'] = $_SESSION["strQty"][$i];
				$selectProduct = $this->Productmodel->productSelect($_SESSION["strProductID"][$i]);
				$order_list['order_list_price'] = $selectProduct[0]['product_price'];

				$this->Ordermodel->addOrderList($order_list);
		  }
	  }

		unset($_SESSION["strProductID"]);
		unset($_SESSION["strQty"]);
		unset($_SESSION["intLine"]);

		redirect('Home/orderMember/'.$order_id);
	}

	public function orderList(){
		// $CategoryList = $this->Productmodel->categoryList();
		$order = $this->Ordermodel->selectOrderAll();
		$orderStatus = $this->Ordermodel->orderStatus();
		$value = array(
			'Result' => array(
				'order' => $order,
				'orderStatus' => $orderStatus
			),
			'View' => 'back/order/order_list'
		);
		$this->LoadPage($value);
	}

	public function orderDetail(){
		$input = $this->uri->segment(3);
		$order = $this->Ordermodel->selectOrderOne($input);
		$order_list = $this->Ordermodel->selectOrderList($order[0]['order_id']);
		$orderStatus = $this->Ordermodel->orderStatus();

		$value = array(
			'Result' => array(
				'order' => $order,
				'order_list' => $order_list,
				'orderStatus' => $orderStatus
			),
			'View' => 'back/order/order_detail'
		);
		$this->LoadPage($value);
	}

	public function updateOrder(){
		$input = $this->input->post();
		$this->Ordermodel->updateOrder($input);
		redirect('Order/orderList');
	}
}
