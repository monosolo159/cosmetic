<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productmodel extends CI_Model
{
  public function categoryList() {
    $query =  $this->db
    ->get('category')
    ->result_array();
    return $query;
  }

  public function typeList() {
    $query =  $this->db
    // ->join('category', 'product_type.category_id = category.category_id','left')
    ->get('product_type')
    ->result_array();
    return $query;
  }
  public function typeAdd($input){
    $this->db->insert('product_type',$input);
  }
  public function typeDelete($id){
    $this->db
    ->where('product_type_id',$id)
    ->delete('product_type');
  }
  public function typeEdit($input) {
    $id = $input['product_type_id'];
    unset($input['product_type_id']);
    $this->db
    ->where('product_type_id',$id)
    ->update('product_type',$input);
  }
  public function typeSelect($id){
    $query =  $this->db
    ->where('product_type_id',$id)
    ->get('product_type')
    ->result_array();
    return $query;
  }


public function search($input){
  $this->db->like('product_name',$input['product_name']);
  $this->db->or_like('product_detail',$input['product_name']);
  $this->db->select('product_id,product_name,product_detail,product_price,category_name,product.product_type_id,product_type_name, IFNULL((select sum(product_stock_value) from product_stock where product.product_id = product_stock.product_id),"0") - IFNULL((select sum(order_list_value) from order_list left join orders on order_list.order_id=orders.order_id where order_list.product_id = product.product_id and (orders.order_status_id = 2 or orders.order_status_id = 3)), "0") as stock');
  $this->db->from('product');
  $this->db->join('category', 'product.category_id = category.category_id','left');
  $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id','left');
  $query = $this->db->get()->result_array();
  return $query;
}

  public function categoryListFront() {
    $this->db->select('category.category_id,category_name,category_detail, (select count(product_id) from product where product.category_id = category.category_id) as product_stock');
    $this->db->from('category');
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function record_count() {
          return $this->db->count_all("product");
  }

  public function record_count_category($category_id) {
    $query = $this->db
    ->where('category_id', $category_id)
    ->get('product');
    return $query->num_rows();
  }

  public function record_count_product_type($product_type_id) {
    $query = $this->db
    ->where('product_type_id', $product_type_id)
    ->get('product');
    return $query->num_rows();
  }


  public function fetch_product($limit, $start,$searchword) {
      $this->db->limit($limit, $start);
      $this->db->like('product_name',$searchword);
      $this->db->or_like('product_detail',$searchword);

      $this->db->select('product_id,product_name,product_detail,product_price,category_name,product.product_type_id,product_type_name, IFNULL((select sum(product_stock_value) from product_stock where product.product_id = product_stock.product_id),"0") - IFNULL((select sum(order_list_value) from order_list left join orders on order_list.order_id=orders.order_id where order_list.product_id = product.product_id and (orders.order_status_id = 2 or orders.order_status_id = 3)), "0") as stock');

      $this->db->from('product');
      $this->db->join('category', 'product.category_id = category.category_id','left');
      $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id','left');

      $query = $this->db->get();

      if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row) {
          $data[] = $row;
        }
        return $data;
      }
      return false;

  }

  public function fetch_category($limit, $start, $category_id) {
    $this->db->limit($limit, $start);
    $this->db->select('product_id,product_name,product_detail,product_price,category_name,product_type_name,product.product_type_id, IFNULL((select sum(product_stock_value) from product_stock where product.product_id = product_stock.product_id),"0") - IFNULL((select sum(order_list_value) from order_list left join orders on order_list.order_id=orders.order_id where order_list.product_id = product.product_id and (orders.order_status_id = 2 or orders.order_status_id = 3)), "0") as stock');
    $this->db->where('product.category_id',$category_id);
    $this->db->from('product');
    $this->db->join('category', 'product.category_id = category.category_id','left');
    $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id','left');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_product_type($limit, $start, $product_type_id) {
    $this->db->limit($limit, $start);
    $this->db->select('product_id,product_name,product_detail,product_price,category_name,product_type_name,product.product_type_id, IFNULL((select sum(product_stock_value) from product_stock where product.product_id = product_stock.product_id),"0") - IFNULL((select sum(order_list_value) from order_list left join orders on order_list.order_id=orders.order_id where order_list.product_id = product.product_id and (orders.order_status_id = 2 or orders.order_status_id = 3)), "0") as stock');
    $this->db->where('product.product_type_id',$product_type_id);
    $this->db->from('product');
    $this->db->join('category', 'product.category_id = category.category_id','left');
    $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id','left');

    $query = $this->db->get();

    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function productListHome() {
    $this->db->select('product_id,product_name,product_detail,product_price,category_name,product_type_name, IFNULL((select sum(product_stock_value) from product_stock where product.product_id = product_stock.product_id),"0") - IFNULL((select sum(order_list_value) from order_list left join orders on order_list.order_id=orders.order_id where order_list.product_id = product.product_id and (orders.order_status_id = 2 or orders.order_status_id = 3)), "0") as stock');
    $this->db->from('product');
    $this->db->join('category', 'product.category_id = category.category_id','left');
    $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id','left');

    $query = $this->db->get()->result_array();
    return $query;
  }

  public function productList() {
    $this->db->select('product_id,product_name,product_detail,product_price,category_name,product_type_name, IFNULL((select sum(product_stock_value) from product_stock where product.product_id = product_stock.product_id),"0") - IFNULL((select sum(order_list_value) from order_list left join orders on order_list.order_id=orders.order_id where order_list.product_id = product.product_id and (orders.order_status_id = 2 or orders.order_status_id = 3)), "0") as stock');
    $this->db->from('product');
    $this->db->join('category', 'product.category_id = category.category_id','left');
    $this->db->join('product_type','product.product_type_id = product_type.product_type_id','left');
    $query = $this->db->get()->result_array();
    return $query;
  }

  public function selectCategory($category_id) {
    $this->db->select('product_id,product_name,product_detail,product_price,category_name,product_type_name, IFNULL((select sum(product_stock_value) from product_stock where product.product_id = product_stock.product_id),"0") - IFNULL((select sum(order_list_value) from order_list left join orders on order_list.order_id=orders.order_id where order_list.product_id = product.product_id and (orders.order_status_id = 2 or orders.order_status_id = 3)), "0") as stock');
    $this->db->where('product.category_id',$category_id);
    $this->db->from('product');
    $this->db->join('category', 'product.category_id = category.category_id','left');
    $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id','left');

    $query = $this->db->get()->result_array();
    return $query;
  }

  public function productSelect($product_id) {
    $this->db->select('product_id,product_name,product_detail,product_price,category_name,product.category_id,product_type_name,product.product_type_id, IFNULL((select sum(product_stock_value) from product_stock where product.product_id = product_stock.product_id),"0") - IFNULL((select sum(order_list_value) from order_list left join orders on order_list.order_id=orders.order_id where order_list.product_id = product.product_id and (orders.order_status_id = 2 or orders.order_status_id = 3)), "0") as stock');
    $this->db->where('product_id',$product_id);
    $this->db->from('product');
    $this->db->join('category', 'product.category_id = category.category_id','left');
    $this->db->join('product_type', 'product.product_type_id = product_type.product_type_id','left');

    $query = $this->db->get()->result_array();
    return $query;
  }

  public function productImageSelect($product_id) {
    $query =  $this->db
    ->where('product_id',$product_id)
    ->order_by('product_image_order', "asc")
    ->get('product_image')
    ->result_array();
    return $query;
  }

  public function productImageSelectId($product_image_id) {
    $query =  $this->db
    ->where('product_image_id',$product_image_id)
    ->get('product_image')
    ->result_array();
    return $query;
  }

  public function productImageAll() {
    $query =  $this->db
    ->order_by('product_image_order', "asc")
    ->get('product_image')
    ->result_array();
    return $query;
  }

  public function categorySelect($category_id) {
    $query =  $this->db
    ->where('category_id',$category_id)
    ->get('category')
    ->result_array();
    return $query;
  }

  public function categoryAdd($input) {
    $this->db->insert('category',$input);
  }

  public function categoryEdit($input) {
    $id = $input['category_id'];
    unset($input['category_id']);
    $this->db
    ->where('category_id',$id)
    ->update('category',$input);
  }

  public function productEdit($input) {
    $id = $input['product_id'];
    unset($input['product_id']);
    $this->db
    ->where('product_id',$id)
    ->update('product',$input);
  }

  public function productAdd($input) {
    $this->db->insert('product',$input);
    return $this->db->insert_id();
  }

  public function productImportValue($input) {
    $this->db->insert('product_stock',$input);
    return $this->db->insert_id();
  }

  public function productSeleckStock($input) {
    $id = $value['product_id'];
    unset($value['product_id']);
    $this->db->where('product',$input)->update('product_id',$id);
  }

  public function productAddImage($input) {
    $this->db->insert('product_image',$input);
  }

  public function categoryDelete($input) {
    $this->db
    ->where('category_id',$input)
    ->delete('category');
  }

  public function productDelete($input) {
    $this->db
    ->where('product_id',$input)
    ->delete('product');
  }

  public function productImageOrderEdit($value) {
    $id = $value['product_image_id'];
    unset($value['product_image_id']);
    unset($value['product_id']);
    $this->db
    ->where('product_image_id',$id)
    ->update('product_image',$value);
  }

  public function productImageDelete($value) {
      $query = $this->db
      ->where('product_image_id',$value)
      ->delete('product_image');
  }

  public function productImageDeleteAll($value) {
    $this->db
    ->where('product_id',$value)
    ->delete('product_image');
  }

  public function productImageMax($id) {
    $this->db->select_max('product_image_order');
    $this->db->where('product_id',$id);
    $result = $this->db->get('product_image')->result_array();
    return $result;
  }

}
