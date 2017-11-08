<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactmodel extends CI_Model
{

  public function addContact($input) {
    $this->db->insert('contact',$input);
  }

  public function contactList(){
    $query =  $this->db
    ->order_by('contact_date','desc')
    ->get('contact')
    ->result_array();
    return $query;
  }

  public function contactSelect($input){
    $query =  $this->db
    ->where('contact_id',$input)
    ->order_by('contact_date','desc')
    ->get('contact')
    ->result_array();
    return $query;
  }

}
