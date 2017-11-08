<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deliverymodel extends CI_Model
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


  public function deliveryStatus(){
    $query =  $this->db
    //  ->join('member', 'member.member_id = delivery_status.member_id')
    ->order_by('delivery_status_date','desc')
    ->get('delivery_status')
    ->result_array();
    return $query;
  }

  public function deliveryStatusMember(){
    $query =  $this->db
    ->join('orders', 'orders.order_id = delivery_status.order_id')
    ->order_by('delivery_status_date','desc')
    ->get('delivery_status')
    ->result_array();
    return $query;
  }

  public function addDeliveryStatus($input){
    $this->db->insert('delivery_status',$input);
  }
}
