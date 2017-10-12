<?php
class Users_model extends MY_Model {
    function __construct() {
        parent::__construct();
        $this->table = 'users';
    }

    function Format($users){
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