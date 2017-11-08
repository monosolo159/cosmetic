<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
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


	public function categoryList(){
		$CategoryList = $this->Productmodel->categoryList();

    $value = array(
      'Result' => array(
        'CategoryList' => $CategoryList
      ),
      'View' => 'back/product/category_list'
    );
    $this->LoadPage($value);
	}

	public function typeList(){
		$typeList = $this->Productmodel->typeList();

		$value = array(
			'Result' => array(
				'typeList' => $typeList
			),
			'View' => 'back/product/type_list'
		);
		$this->LoadPage($value);
	}
	public function typeAddForm(){
		$CategoryList = $this->Productmodel->categoryList();
		$value = array(
      'Result' => array(
        'CategoryList' => $CategoryList
      ),
      'View' => 'back/product/type_form_insert'
    );
		$this->LoadPage($value);
	}

	public function typeAdd(){
		$input = $this->input->post();
		$this->Productmodel->typeAdd($input);
		redirect('Product/typeList');
	}
	public function typeDelete(){
		$id = $this->uri->segment(3);
		$this->Productmodel->typeDelete($id);
		redirect('Product/typeList');
	}
	public function typeEditForm(){
		$id = $this->uri->segment(3);
		$CategoryList = $this->Productmodel->categoryList();
		$typeSelect = $this->Productmodel->typeSelect($id);
		$value = array(
      'Result' => array(
        'CategoryList' => $CategoryList,
				'typeSelect' => $typeSelect

      ),
      'View' => 'back/product/type_form_edit'
    );
		$this->LoadPage($value);
	}
	public function typeEdit(){
		$input = $this->input->post();
		$this->Productmodel->typeEdit($input);

		redirect('product/typeList');
	}


	public function categoryAdd(){

		$input = $this->input->post();
		$this->Productmodel->categoryAdd($input);

		$CategoryList = $this->Productmodel->categoryList();

    $value = array(
      'Result' => array(
        'CategoryList' => $CategoryList
      ),
      'View' => 'back/product/category_list'
    );
    $this->LoadPage($value);
	}

	public function categoryEdit(){

		$input = $this->input->post();
		$this->Productmodel->categoryEdit($input);

		redirect('product/categoryList');
	}

	public function productEdit(){

		$input = $this->input->post();
		$this->Productmodel->productEdit($input);

		redirect('Product/productList');
	}

	public function productAdd(){

		$input = $this->input->post();
		unset($input['imgfiles']);
		$product_id = $this->Productmodel->productAdd($input);
		// print_r($_FILES["imgfiles"]);
		if($product_id){
			$input = array(
				'product_image_name'=>'',
				'product_id'=>$product_id,
				'product_image_order'=>0
			);
			$index = 0;
			foreach ($_FILES["imgfiles"]["name"] as $row) {

				$ext = pathinfo($_FILES["imgfiles"]["name"][$index],PATHINFO_EXTENSION);
				$code = DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");

				$new_file = md5($product_id.'_'.$code).'.'.$ext;

				if(move_uploaded_file($_FILES["imgfiles"]["tmp_name"][$index],"assets/image/product/".$new_file)){
					$input['product_image_name'] = $new_file;
					$input['product_image_order'] = $index;
					$this->Productmodel->productAddImage($input);
				}
				$index++;
			}
		}
		redirect('Product/productList');
	}

	public function productImageAdd(){

		$input = $this->input->post();
		unset($input['imgfiles']);
		$image_max_order = $this->Productmodel->productImageMax($input['product_id']);
		$input = array(
			'product_image_name'=>'',
			'product_id'=>$input['product_id'],
			'product_image_order'=>0
		);
		$index = 0;
		foreach ($_FILES["imgfiles"]["name"] as $row) {
			$ext = pathinfo($_FILES["imgfiles"]["name"][$index],PATHINFO_EXTENSION);

			$code = DateTime::createFromFormat('U.u', microtime(true))->format("Hisu");
			$new_file = md5($input['product_id'].'_'.$code).'.'.$ext;

			if(move_uploaded_file($_FILES["imgfiles"]["tmp_name"][$index],"assets/image/product/".$new_file)){
				$input['product_image_name'] = $new_file;
				$input['product_image_order'] = ($index+1+$image_max_order[0]['product_image_order']);
				$this->Productmodel->productAddImage($input);
			}
			$index++;
		}

		redirect('Product/productImageEditForm/'.$input['product_id']);
	}

	public function productImageDeleteId(){
		$input = $this->uri->segment(3);

		$productImageSelectId = $this->Productmodel->productImageSelectId($input);
		unlink('assets/image/product/'.$productImageSelectId[0]['product_image_name']);

		$product_id = $this->uri->segment(4);
		$this->Productmodel->productImageDelete($input);
		redirect('Product/productImageEditForm/'.$product_id);
	}

	public function productImageDeleteAll(){
		$input = $this->uri->segment(3);

		$productImageSelectId = $this->Productmodel->productImageSelect($input);
		$index = 0;
		foreach ($productImageSelectId as $row) {
			unlink('assets/image/product/'.$productImageSelectId[$index]['product_image_name']);
			$index++;
		}

		$this->Productmodel->productImageDeleteAll($input);
		redirect('Product/productImageEditForm/'.$input);
	}


	public function categoryAddForm(){
		$value = array(
      'View' => 'back/product/category_form_insert'
    );
		$this->LoadPage($value);
	}

	public function productImportForm(){
		$input = $this->uri->segment(3);
		$ProductSelect = $this->Productmodel->productSelect($input);
		$value = array(
			'Result' => array(
				'ProductSelect' => $ProductSelect
			),
			'View' => 'back/product/product_form_import'
		);
		$this->LoadPage($value);
	}

	public function productImportValue(){
		$input = $this->input->post();
		$dt = new DateTime();
		unset($input['category_name']);
		unset($input['product_detail']);
		unset($input['product_name']);
		$input['product_stock_date'] = $dt->format('Y-m-d H:i:s');
		$this->Productmodel->productImportValue($input);
		redirect('Product/productList');
	}

	public function categoryEditForm(){
		$input = $this->uri->segment(3);
		$CategorySelect = $this->Productmodel->categorySelect($input);
		$value = array(
			'Result' => array(
        'CategorySelect' => $CategorySelect
      ),
      'View' => 'back/product/category_form_edit'
    );
		$this->LoadPage($value);
	}

	public function productEditForm(){
		$input = $this->uri->segment(3);
		$ProductSelect = $this->Productmodel->productSelect($input);
		$CategoryList = $this->Productmodel->categoryList();
		$typeList = $this->Productmodel->typeList();
		$value = array(
			'Result' => array(
        'ProductSelect' => $ProductSelect,
				'CategoryList' => $CategoryList,
				'typeList' => $typeList,
      ),
      'View' => 'back/product/product_form_edit'
    );
		$this->LoadPage($value);
	}

	public function productImageEditForm(){
		$input = $this->uri->segment(3);
		$ProductImageSelect= $this->Productmodel->productImageSelect($input);
		$value = array(
			'Result' => array(
        'ProductImageSelect' => $ProductImageSelect,
				'product_id' => $input
      ),
      'View' => 'back/product/product_form_image_edit'
    );
		$this->LoadPage($value);
	}

	public function productAddForm(){
		$CategoryList = $this->Productmodel->categoryList();
		$typeList = $this->Productmodel->typeList();

		$value = array(
			'Result' => array(
				'CategoryList' => $CategoryList,
        'typeList' => $typeList
      ),
      'View' => 'back/product/product_form_insert'
    );
		$this->LoadPage($value);
	}

	public function categoryDelete(){
		$input = $this->uri->segment(3);
		$this->Productmodel->categoryDelete($input);

		$CategoryList = $this->Productmodel->categoryList();

    $value = array(
      'Result' => array(
        'CategoryList' => $CategoryList
      ),
      'View' => 'back/product/category_list'
    );
    $this->LoadPage($value);
	}

	public function productDelete(){
		$input = $this->uri->segment(3);
		$this->Productmodel->productDelete($input);

    redirect('Product/productList');
	}

	public function productList(){
		$ProductList = $this->Productmodel->productList();
		// print_r($ProductList);
    $value = array(
      'Result' => array(
        'ProductList' => $ProductList
      ),
      'View' => 'back/product/product_list'
    );
    $this->LoadPage($value);
	}

	public function productImageOrderEdit(){
		$value = $this->input->post();
		$product_id = $value['product_id'];

		$this->Productmodel->productImageOrderEdit($value);

		redirect('Product/productImageEditForm/'.$product_id);

	}


}
