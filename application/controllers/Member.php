<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
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


	public function login()
	{
		$data = $this->input->post();
		$User = $this->Membermodel->login($data);
		if (empty($User))
		{
			redirect($this->agent->referrer(), 'refresh');
		} else {
			$_SESSION['MEMBER_ID'] = $User[0]['member_id'];
			$_SESSION['MEMBER_FULLNAME'] = $User[0]['member_fname']." ".$User[0]['member_lname'];
			redirect('Home');
		}
	}
	public function logout() {
		unset($_SESSION['MEMBER_ID']);
		unset($_SESSION['MEMBER_FULLNAME']);

		// session_destroy();
		redirect('Home');
	}

	public function registerForm(){
		$CategoryList = $this->Productmodel->categoryListFront();
		$ProvinceList = $this->Membermodel->provinceList();
		// print_r($ProductList);
		$value = array(
			'Result' => array(
				'CategoryList' => $CategoryList,
				'ProvinceList' => $ProvinceList
			),
			'View' => 'front/register'
		);
		$this->LoadPageFront($value);
	}

	public function checkUser() {
		$data = $this->input->post();
		$checkUser = $this->Membermodel->checkUser($data['member_username']);
		$ProvinceList = $this->Membermodel->provinceList();
		$CategoryList = $this->Productmodel->categoryListFront();
		$value = array(
			'Result' => array(
				'checkUser' => $checkUser,
				'new_member' => $data,
				'CategoryList' => $CategoryList,
				'ProvinceList' => $ProvinceList
			),
			'View' => 'front/register'
		);
		$this->LoadPageFront($value);
	}

	public function checkUserBack() {
		$data = $this->input->post();
		$checkUser = $this->Membermodel->checkUser($data['member_username']);
		$ProvinceList = $this->Membermodel->provinceList();
		$CategoryList = $this->Productmodel->categoryListFront();
		$value = array(
			'Result' => array(
				'checkUser' => $checkUser,
				'new_member' => $data,
				'CategoryList' => $CategoryList,
				'ProvinceList' => $ProvinceList
			),
			'View' => 'back/member/member_insert'
		);
		$this->LoadPage($value);
	}

	public function register() {
		$data = $this->input->post();
		if($data['member_password']==$data['member_password_confirm']){
			unset($data['member_password_confirm']);
			$id = $this->Membermodel->registerUser($data);
			$address['member_id'] = $id;
			$address['member_fname'] = $data['member_fname'];
			$address['member_lname'] = $data['member_lname'];
			$address['member_address'] = $data['member_address'];
			$address['province_id'] = $data['province_id'];
			$address['member_zipcode'] = $data['member_zipcode'];

			$this->Membermodel->addAddress($address);
			redirect('Member/registerForm/success');

		}else{
			redirect('Member/registerForm/fail');
		}
	}

	public function profile()
	{
		$CategoryList = $this->Productmodel->categoryListFront();
		$userDetail = $this->Membermodel->selectUser($_SESSION['MEMBER_ID']);
		$order = $this->Ordermodel->selectOrder($_SESSION['MEMBER_ID']);
		$address = $this->Membermodel->selectAddress($_SESSION['MEMBER_ID']);
		$deliveryMember = $this->Deliverymodel->deliveryStatusMember($_SESSION['MEMBER_ID']);
		// $MemberAddress = $this->Membermodel->selectAddress($_SESSION['MEMBER_ID']);

		$value = array(
			'Result' => array(
				'CategoryList' => $CategoryList,
				'userDetail' => $userDetail,
				'order' => $order,
				'address' => $address,
				'deliveryMember' => $deliveryMember
			),
			'View' => 'front/profile'
		);
		$this->LoadPageFront($value);
	}

	public function selectUser()
	{
		$CategoryList = $this->Productmodel->categoryListFront();
		$userDetail = $this->Membermodel->selectUser($_SESSION['MEMBER_ID']);
		$ProvinceList = $this->Membermodel->provinceList();
		$value = array(
			'Result' => array(
				'CategoryList' => $CategoryList,
				'userDetail' => $userDetail,
				'ProvinceList' => $ProvinceList
			),
			'View' => 'front/profileEdit'
		);
		$this->LoadPageFront($value);
	}

	public function updateUser()
	{
		$data = $this->input->post();
		unset($data['member_password_confirm']);
		$this->Membermodel->updateUser($data);
		redirect('Member/profile/member');
	}
	public function updateUserBack()
	{
		$data = $this->input->post();
		unset($data['member_password_confirm']);
		$this->Membermodel->updateUser($data);
		redirect('Member/memberList');
	}


	public function addAddress(){
		$input = $this->input->post();
		$this->Membermodel->addAddress($input);
		redirect('Member/profile/address');
	}

	public function updateAddress(){
		$input = $this->input->post();
		$this->Membermodel->updateAddress($input);
		redirect('Member/profile/address');
	}

	public function deleteAddress(){
		$input = $this->uri->segment(3);
		$this->Membermodel->deleteAddress($input);
		redirect('Member/profile/address');
	}

	public function addAddressBack(){
		$input = $this->input->post();
		$this->Membermodel->addAddress($input);
		redirect('Member/memberEditAddressList/'.$input['member_id']);
	}

	public function updateAddressBack(){
		$input = $this->input->post();
		$this->Membermodel->updateAddress($input);
		redirect('Member/memberEditAddressList/'.$input['member_id']);
	}

	public function deleteAddressBack(){
		$input = $this->uri->segment(3);
		$re = $this->uri->segment(4);
		$this->Membermodel->deleteAddress($input);
		redirect('Member/memberEditAddressList/'.$re);
	}


	public function memberList(){
		$memberList = $this->Membermodel->memberList();
		$value = array(
			'Result' => array(
				'memberList' => $memberList,
			),
			'View' => 'back/member/member_list'
		);
		$this->LoadPage($value);
	}

	public function memberEdit(){
		$input = $this->uri->segment(3);

		$CategoryList = $this->Productmodel->categoryListFront();
		$userDetail = $this->Membermodel->selectUser($input);
		$ProvinceList = $this->Membermodel->provinceList();
		$value = array(
			'Result' => array(
				'CategoryList' => $CategoryList,
				'userDetail' => $userDetail,
				'ProvinceList' => $ProvinceList
			),
			'View' => 'back/member/member_edit'
		);
		$this->LoadPage($value);

	}

	public function memberDelete(){
		$input = $this->uri->segment(3);
		$this->Membermodel->memberDelete($input);
		redirect('Member/memberList');
	}

	public function memberAddForm(){
		// $CategoryList = $this->Productmodel->categoryListFront();
		$ProvinceList = $this->Membermodel->provinceList();
		// print_r($ProductList);
		$value = array(
			'Result' => array(
				// 'CategoryList' => $CategoryList,
				'ProvinceList' => $ProvinceList
			),
			'View' => 'back/member/member_insert'
		);
		$this->LoadPage($value);
	}

	public function memberAdd() {
		$data = $this->input->post();
		if($data['member_password']==$data['member_password_confirm']){
			unset($data['member_password_confirm']);
			$this->Membermodel->registerUser($data);
			redirect('Member/memberAddForm/success');
		}else{
			redirect('Member/memberAddForm/fail');
		}
	}

	public function memberEditPass(){
		$input = $this->uri->segment(3);
		$userDetail = $this->Membermodel->selectUser($input);
		$value = array(
			'Result' => array(
				'userDetail' => $userDetail,
			),
			'View' => 'back/member/member_edit_pass'
		);
		$this->LoadPage($value);
	}

	public function memberEditAddressList(){
		$input = $this->uri->segment(3);

		$address = $this->Membermodel->selectAddress($input);
		$value = array(
			'Result' => array(
				'address' => $address,
			),
			'View' => 'back/member/member_address_list'
		);
		$this->LoadPage($value);
	}

	public function memberEditAddressInsert(){
		$Province = $this->Membermodel->provinceList();

		$value = array(
			'Result' => array(
				'Province' => $Province,
			),
			'View' => 'back/member/member_address_insert'
		);
		$this->LoadPage($value);
	}
}
