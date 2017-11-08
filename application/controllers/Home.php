<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct() {
		parent::__construct();

		if(!isset($_SESSION)) {
			session_start();
		}
		// $this->load->library('pagination');
	}

	public function LoadPage($value){

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

	public function index()
	{
		redirect('Home/product');
	}
	public function product()
	{

		$config = array();
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		// $config['use_page_numbers']  = TRUE;
		$config['num_links'] = 5;
		$config["base_url"] = site_url() . "/Home/product";
		$config["total_rows"] = $this->Productmodel->record_count();
		$config["per_page"] = 24;
		$config["uri_segment"] = 3;

		$searchword = $this->input->post('product_name');

		if(empty($searchword)){
			$searchword = '';
		}

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$ProductList = $this->Productmodel->fetch_product($config["per_page"], $page,$searchword);

		$links = $this->pagination->create_links();

		// print_r($links);
		$typeList = $this->Productmodel->typeList();
		$gallery = $this->Productmodel->productImageAll();
		$value = array(
			'Result' => array(
				'ProductList' => $ProductList,
				'gallery' => $gallery,
				'typeList' => $typeList,
				'links' => $links
			),
			'View' => 'front/home'
		);
		$this->LoadPage($value);
	}

	public function selectCategory(){
		$category_id = $this->uri->segment(3);

		$config = array();
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		// $config['use_page_numbers']  = TRUE;
		$config['num_links'] = 5;
		$config["base_url"] = site_url() . "/Home/selectCategory/".$category_id;
		$config["total_rows"] = $this->Productmodel->record_count_category($category_id);
		$config["per_page"] = 24;
		$config["uri_segment"] = 4;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$ProductList = $this->Productmodel->fetch_category($config["per_page"], $page, $category_id);

		$links = $this->pagination->create_links();
		$typeList = $this->Productmodel->typeList();

		$gallery = $this->Productmodel->productImageAll();
		$value = array(
			'Result' => array(
				'ProductList' => $ProductList,
				'typeList' => $typeList,
				'gallery' => $gallery,
				'links' => $links
			),
			'View' => 'front/home'
		);
		$this->LoadPage($value);
		// print_r($ProductList);
	}

	public function productTypeList(){
		$product_type_id = $this->uri->segment(3);

		$config = array();
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";
		// $config['use_page_numbers']  = TRUE;
		$config['num_links'] = 5;
		$config["base_url"] = site_url() . "/Home/productTypeList/".$product_type_id;
		$config["total_rows"] = $this->Productmodel->record_count_product_type($product_type_id);
		$config["per_page"] = 24;
		$config["uri_segment"] = 4;

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

		$ProductList = $this->Productmodel->fetch_product_type($config["per_page"], $page, $product_type_id);

		$links = $this->pagination->create_links();

		$gallery = $this->Productmodel->productImageAll();
		$value = array(
			'Result' => array(
				'ProductList' => $ProductList,
				'gallery' => $gallery,
				'links' => $links
			),
			'View' => 'front/product_type_list'
		);
		$this->LoadPage($value);
	}

public function search(){
	$input = $this->input->post();
	$ProductList = $this->Productmodel->search($input);
	$gallery = $this->Productmodel->productImageAll();

	$value = array(
		'Result' => array(
			'ProductList' => $ProductList,
			'gallery' => $gallery,
		),
		'View' => 'front/product_search'
	);
	$this->LoadPage($value);
}


	public function orderAdd(){

		$input = $this->input->post();

		$ProductSelect = $this->Productmodel->productSelect($input['product_id']);
		ob_start();

		if(!isset($_SESSION["intLine"]))
		{
			$_SESSION["intLine"] = 0;
			$_SESSION["strProductID"][0] = $input['product_id'];
			$_SESSION["strQty"][0] = $input['qty'];
		}
		else
		{
			$key = array_search($input['product_id'], $_SESSION["strProductID"]);
			if((string)$key != "")
			{
				if(($input['qty']+$_SESSION["strQty"][$key])<=$ProductSelect[0]['stock']){
					$_SESSION["strQty"][$key] = $_SESSION["strQty"][$key] + $input['qty'];
				}else{
					redirect('Home/productDetail/'.$input['product_id'].'/error');
				}

			}
			else
			{
				$_SESSION["intLine"] = $_SESSION["intLine"] + 1;
				$intNewLine = $_SESSION["intLine"];
				$_SESSION["strProductID"][$intNewLine] = $input['product_id'];
				$_SESSION["strQty"][$intNewLine] = $input['qty'];
			}
		}

		//order end
		redirect('Home/productDetail/'.$input['product_id']);
	}

	public function productDetail(){
		$input = $this->uri->segment(3);

		$ProductSelect = $this->Productmodel->productSelect($input);
		$gallery = $this->Productmodel->productImageSelect($input);

		$value = array(
			'Result' => array(
				'ProductSelect' => $ProductSelect,
				'gallery' => $gallery
			),
			'View' => 'front/product/product_detail'
		);
		$this->LoadPage($value);
	}

	public function contact(){
		$value = array(
			'Result' => array(
			),
			'View' => 'front/contact'
		);
		$this->LoadPage($value);
	}

	public function confirmPayment(){
		$BookbankTypeList = $this->Paymentmodel->bookBankList();
		$value = array(
			'Result' => array(
				'BookbankTypeList' => $BookbankTypeList
			),
			'View' => 'front/confirmPayment'
		);
		$this->LoadPage($value);
	}

	public function statusDelivery(){
		$deliveryStatus = $this->Deliverymodel->deliveryStatus();
		$value = array(
			'Result' => array(
				'deliveryStatus' => $deliveryStatus
			),
			'View' => 'front/statusDelivery'
		);
		$this->LoadPage($value);
	}

	public function cart(){
		$value = array(
			'Result' => array(

			),
			'View' => 'front/cart'
		);
		$this->LoadPage($value);
	}

	public function updateqty(){
		$input = $this->input->post();
		// print_r($input['updateQtyId']);
		$_SESSION['strQty'][$input['updateQtyId']] = $input['qty'];
		redirect('Home/cart');
	}
	public function delprodecucart($id){
		unset($_SESSION["strProductID"][$id]);
		unset($_SESSION["strQty"][$id]);
		if((int)$_SESSION["intLine"]==0){
			unset($_SESSION["intLine"]);
		}else{
			$_SESSION["intLine"]--;
		}
		// session_destroy();
		redirect('Home/cart');
	}

	public function checkout(){
		$BookbankTypeList = $this->Paymentmodel->bookBankList();
		$PaymentTypeList = $this->Paymentmodel->paymentTypeList();
		$deliveryTypeList = $this->Deliverymodel->deliveryTypeList();
		$addressList = $this->Membermodel->selectAddress($_SESSION['MEMBER_ID']);



		$value = array(
			'Result' => array(
				'BookbankTypeList' => $BookbankTypeList,
				'PaymentTypeList' => $PaymentTypeList,
				'deliveryTypeList' => $deliveryTypeList,
				'addressList' => $addressList
			),
			'View' => 'front/checkout'
		);
		$this->LoadPage($value);
	}

	public function addAddressForm(){
		$Province = $this->Membermodel->provinceList();

		$value = array(
			'Result' => array(
				'Province' => $Province,

			),
			'View' => 'front/profile_address_add'
		);
		$this->LoadPage($value);
	}

	public function updateAddressForm(){
		$input = $this->uri->segment(3);
		$Province = $this->Membermodel->provinceList();
		$address = $this->Membermodel->selectAddress($input);

		$value = array(
			'Result' => array(
				'Province' => $Province,
				'address' => $address
			),
			'View' => 'front/profile_address_edit'
		);
		$this->LoadPage($value);
	}

	public function orderMember(){
		$input = $this->uri->segment(3);
		$order = $this->Ordermodel->selectOrderOne($input);
		$order_list = $this->Ordermodel->selectOrderList($input);
		// print_r($order_list);
		$value = array(
			'Result' => array(
				'order' => $order,
				'order_list' => $order_list
			),
			'View' => 'front/order_member'
		);
		$this->LoadPage($value);

	}

	public function guide(){
		$value = array(
			'Result' => array(
			),
			'View' => 'front/guide'
		);
		$this->LoadPage($value);
	}
}
