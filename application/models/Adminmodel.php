<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model
{
  public function deliveryTypeList() {
    $query =  $this->db
    ->order_by('delivery_id','asc')
    ->get('delivery')
    ->result_array();
    return $query;
  }

  public function enableDeliveryType($input) {
    $id = $input['delivery_id'];
    unset($input['delivery_id']);
    $this->db
    ->where('delivery_id',$id)
    ->update('delivery',$input);
  }

  public function deliveryTypeSelect($delivery_id) {
    $query =  $this->db
    ->where('delivery_id',$delivery_id)
    ->get('delivery')
    ->result_array();
    return $query;
  }

  public function deliveryTypeEdit($input) {
    $id = $input['delivery_id'];
    unset($input['delivery_id']);
    $this->db
    ->where('delivery_id',$id)
    ->update('delivery',$input);
  }

  public function login($data)
  {
    $query = $this->db
    ->where('admin_username', $data['admin_username'])
    ->where('admin_password', md5($data['admin_password']))
    ->get('admin')
    ->result_array();
    return $query;
  }
}
