<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentmodel extends CI_Model
{
  public function paymentTypeList() {
    $query =  $this->db
    ->order_by('payment_type_id','asc')
    ->get('payment_type')
    ->result_array();
    return $query;
  }

  public function paymentList() {
    $this->db->select('payment_id,payment_amount,payment_date,orders.order_id,payment_slip,payment_status, (select ((sum(order_list_price)*order_list_value)+delivery_amount) from order_list where payment.order_id = order_list.order_id) as order_list_price_all');
    $this->db->from('payment');
    $this->db->join('orders','orders.order_id = payment.order_id','left');
    $this->db->join('delivery','delivery.delivery_id = orders.delivery_id','left');

    $query = $this->db->get()->result_array();
    return $query;
  }

  public function enablePaymentType($input) {
    $id = $input['payment_type_id'];
    unset($input['payment_type_id']);
    $this->db
    ->where('payment_type_id',$id)
    ->update('payment_type',$input);
  }

  public function bookBankList() {
    $query = $this->db
    ->order_by('bank_name','asc')
    ->get('bank')
    ->result_array();
    return $query;
  }

  public function bookbankAdd($input) {
    $this->db->insert('bank',$input);
    return $this->db->insert_id();
  }

  public function bookbankSelect($bank_id) {
    $query = $this->db
    ->where('bank_id',$bank_id)
    ->get('bank')
    ->result_array();
    return $query;
  }

  public function bookbankFormDelete($bank_id) {
      $this->db
      ->where('bank_id',$bank_id)
      ->delete('bank');
      return $this->db->affected_rows();
  }

  public function bookbankEdit($input) {
    $id = $input['bank_id'];
    unset($input['bank_id']);
    $this->db
    ->where('bank_id',$id)
    ->update('bank',$input);
  }

  public function paymentAdd($input) {
    $this->db->insert('payment',$input);
    // return $this->db->insert_id();
  }

  public function paymentUpdate($input) {
    $id = $input['payment_id'];
    unset($input['payment_id']);
    $this->db
    ->where('payment_id',$id)
    ->update('payment',$input);
  }

  public function viewSlip($input){
    return $this->db->where('payment_id',$input)->get('payment')->result_array();
  }

}
