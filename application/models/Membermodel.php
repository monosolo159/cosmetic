<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Membermodel extends CI_Model
{
  public function login($data)
  {
    $query = $this->db
    ->where('member_username', $data['member_username'])
    ->where('member_password', md5($data['member_password']))
    ->get('member')
    ->result_array();
    return $query;
  }

  public function selectUser($data)
  {
    $query = $this->db
    ->where('member_id', $data)
    ->join('province', 'province.province_id = member.province_id')
    ->get('member')
    ->result_array();
    return $query;
  }



  public function selectAddress($data)
  {
    $query = $this->db
    ->where('member_id', $data)
    ->join('province', 'province.province_id = member_address_delivery.province_id')
    ->get('member_address_delivery')
    ->result_array();
    return $query;
  }

  public function selectAddressOne($data)
  {
    $query = $this->db
    ->where('mad_id', $data)
    // ->join('province', 'province.province_id = member_address_delivery.province_id')
    ->get('member_address_delivery')
    ->result_array();
    return $query;
  }

  public function addAddress($input)
  {
    $this->db->insert('member_address_delivery',$input);
  }

  public function updateAddress($input)
  {
    $id = $input['mad_id'];
    unset($input['mad_id']);

    $this->db
    ->where('mad_id',$id)
    ->update('member_address_delivery',$input);
  }

  public function deleteAddress($input)
  {
    $this->db
    ->where('mad_id',$input)
    ->delete('member_address_delivery');
  }

  public function provinceList()
  {
    $query = $this->db
    ->order_by('province_name','asc')
    ->get('province')
    ->result_array();
    return $query;
  }

  public function checkUser($data){
    $query = $this->db
    ->where('member_username', $data)
    ->get('member')
    ->result_array();
    return $query;
  }

  public function registerUser($input) {
    $input['member_password'] = md5($input['member_password']);
    $this->db->insert('member',$input);
    return $this->db->insert_id();
  }

  public function updateUser($input) {
    $input['member_password'] = md5($input['member_password']);
    $id = $input['member_id'];
    unset($input['member_id']);
    $this->db
    ->where('member_id',$id)
    ->update('member',$input);
  }

  public function memberList(){
    $query = $this->db
    ->order_by('member_id','desc')
    ->join('province', 'province.province_id = member.province_id')
    ->get('member')
    ->result_array();
    return $query;
  }

  public function memberDelete($input){
    $this->db
    ->where('member_id',$input)
    ->delete('member');
  }

}
