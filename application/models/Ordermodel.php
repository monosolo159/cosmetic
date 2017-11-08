<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordermodel extends CI_Model
{

  public function addOrder($input){
    $this->db->insert('orders',$input);
    return $this->db->insert_id();
  }

  public function addOrderList($input){
    $this->db->insert('order_list',$input);
  }

  public function selectOrder($data)
  {
    $query = $this->db
    ->where('member_id', $data)
    ->join('order_status', 'order_status.order_status_id = orders.order_status_id')
    ->order_by("order_id", "desc")
    ->get('orders')
    ->result_array();
    return $query;
  }

  public function selectOrderAll()
  {
    $query = $this->db
    // ->where('member_id', $data)
    ->join('order_status', 'order_status.order_status_id = orders.order_status_id')
    ->order_by("order_id", "desc")
    ->get('orders')
    ->result_array();
    return $query;
  }

  public function selectOrderAll2()
  {
    $query = $this->db
    ->where('orders.order_status_id',2)
    ->join('order_status', 'order_status.order_status_id = orders.order_status_id')
    ->order_by("order_id", "desc")
    ->get('orders')
    ->result_array();
    return $query;
  }


  public function selectOrderOne($data)
  {
    $query = $this->db
    ->where('order_id', $data)
    ->join('delivery', 'delivery.delivery_id = orders.delivery_id')
    ->join('payment_type', 'payment_type.payment_type_id = orders.payment_type_id')
    ->join('order_status', 'order_status.order_status_id = orders.order_status_id')
    ->join('province', 'province.province_id = orders.province_id')
    ->get('orders')
    ->result_array();
    return $query;
  }

  public function selectOrderList($data)
  {
    $query = $this->db
    ->where('order_id', $data)
    ->join('product', 'product.product_id = order_list.product_id')
    ->get('order_list')
    ->result_array();
    return $query;
  }

  public function updateOrder($data){
    $id = $data['order_id'];
    unset($data['order_id']);
    $this->db
    ->where('order_id',$id)
    ->update('orders',$data);
  }

  public function orderStatus(){
    return $this->db
    ->get('order_status')
    ->result_array();
  }

  public function productOrder($input){
    $query = $this->db
    ->where('order_date  >=', $input['date_start'].' 00:00:00')
    ->where('order_date  <=', $input['date_end'].' 23:59:59')
    ->where('order_status_id',3)

    ->get('orders')
    ->result_array();
    return $query;

  }

  public function productOrderList($input){
    $this->db->distinct();
    $this->db->select('product.product_id,product_name,product_detail,product_price,category_name, (select sum(order_list_value) from order_list where order_list.product_id = product.product_id) as stock, (select sum(order_list_price) from order_list left join orders on order_list.order_id=orders.order_id where order_list.product_id = product.product_id and (orders.order_status_id = 2 or orders.order_status_id = 3)) as price');
    $this->db->where('order_date  >=', $input['date_start'].' 00:00:00');
    $this->db->where('order_date  <=', $input['date_end'].' 23:59:59');
    $this->db->where('order_status_id',3);

    $this->db->from('product');

    $this->db->join('order_list', 'order_list.product_id = product.product_id');
    $this->db->join('orders', 'orders.order_id = order_list.order_id');
    $this->db->join('category', 'product.category_id = category.category_id');
    $query = $this->db->get()->result_array();
    return $query;
  }
}
