<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {

  function __construct() {
    parent::__construct();
    $this->table = 'users';
  }

  function Save($data) {
    if(isset($data['type'])==false or $data['type']==='' ){
      $data['type'] = 'customer';
    }
    $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);
    $this->db->insert('users', $data);
    $userID = $this->db->insert_id();
    if($userID)
    {
      return $this->GetUser($userID);
    }
    else
    {
      return false;
    }
  }

  function Inativate($data) {
    $this->db->where('id', $data['id']);
    $this->db->update('users', $data);
  }

  function Update ($data) {
    $data['pwd'] = password_hash($data['pwd'], PASSWORD_DEFAULT);
    $this->db->where('id', $this->session->userdata('id'));
    $this->db->update('users', $data);
  }

  function Login ($data) {
    $this->db->select('*')->from('users')->where('email', $data['email']);
    $results = $this->db->get()->result();
    return $results;
  }

  public function GetUserByLogin ($login) {
    $this->db->select('*')->from('users')->where('login', $login);
    $result = $this->db->get()->result();
    if ($result) {
      return $result[0];
    } else {
      return false;
    }
  }

  public function GetUser ($id) {
    $this->db->select('*')->from('users')->where('id', $id);
    $result = $this->db->get()->result();
    if ($result) {
      return $result[0];
    } else {
      return false;
    }
  }

  public function GetActiveUsers () {
    $this->db->select('*')->from('users')->where('status',1);
    $result = $this->db->get()->result_array();
    if(count($result)>0)
      return $result;
    else
      return false;
  }

  public function GetAll() {
    $this->db->select('*')->from('users');
    $result = $this->db->get()->result_array();
    if(count($result)>0)
      return $result;
    else
      return false;
  }

  function Format($users) {
    if($users){
      for($i = 0; $i < count($users); $i++){
        $users[$i]['edit_url'] = base_url('edit')."/".$users[$i]['id'];
        $users[$i]['delete_url'] = base_url('delete')."/".$users[$i]['id'];
      }
      return $users;
    } else {
      return false;
    }
  }

}
