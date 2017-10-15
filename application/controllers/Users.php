<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once "Base.php";

class Users extends CI_Controller {

  function __construct() {
    parent::__construct();
    $this->load->model('Users_model');
    $this->load->helper(array('form', 'url'));
  }

  public function Index() {
		$users = $this->users_model->GetActiveUsers('name');
		$data['users'] =$this->users_model->Format($users);
		$this->load->view('users',$data);
	}
  public function Login() {
    log_message('error', 'Users.php - Login()');
    $this->form_validation->set_rules('email','email','required|min_length[1]|valid_email|trim');
    $this->form_validation->set_rules('pwd','pwd','required|min_length[6]|trim');
    if($this->form_validation->run() == FALSE) {
      $data['error'] = validation_errors();
      log_message('error', 'Users.php - ' . $data['error']);
    } else {
      $dataLogin = $this->input->post();
      log_message('error', 'Users.php - dataLogin:' . implode("|",$dataLogin));
      $res = $this->Users_model->Login($dataLogin);
      if($res) {
        foreach($res as $result) {
          log_message('error', "Users.php - pwd: " . $dataLogin['pwd']);
          log_message('error', "Users.php - result: $result->pwd");
          if (password_verify($dataLogin['pwd'], $result->pwd)) {
            $data['error'] = null;
            $this->session->set_userdata('logged',"true");
            $this->session->set_userdata('type',$result->type);
            $this->session->set_userdata('email',$result->email);
            $this->session->set_userdata('id',$result->id);
            redirect();
          } else {
            $data['error'] = "Invalid password.";
            log_message('error', 'Users.php - ' . $data['error']);
          }
        }
      } else {
        $data['error'] = "User doesn't exist.";
        log_message('error', 'Users.php - ' . $data['error']);
      }
    }
    $users = $this->Users_model->GetActiveUsers();
		$data['users'] =$this->Users_model->Format($users);
    $this->load->view('home',$data);
    //$base = new Base();
    //$base.Index();
  }

  public function getLogged() {
    log_message('error', "Users.php - userdata:" . implode("|",$this->session->userdata));
    log_message('error', "Users.php - logged:" . $this->session->userdata('logged'));
    if($this->session->userdata('logged')){
      return $this->session->userdata('logged');
    } else {
      return false;
    }
  }

  public function Logout() {
    $this->session->unset_userdata('logged');
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('id');
    $this->session->unset_userdata('type');
    session_destroy();
    $this->load->view('home');
  }

  public function Register() {
    $this->form_validation->set_rules('login','Login','required|min_length[3]|trim');
    $this->form_validation->set_rules('email','Email','required|min_length[1]|valid_email|trim');
    $this->form_validation->set_rules('pwd','Password','required|min_length[6]|trim');
    if($this->form_validation->run() == FALSE) {
      $data['error'] = validation_errors();
    } else {
      $dataRegister = $this->input->post();
      $res = $this->Users_model->Save($dataRegister);
      if($res) {
        $data['error'] = null;
      } else {
        $data['error'] = "There are errors.";
      }
    }
    if($data['error']) {
      $this->load->view('home',$data);
    } else {
      $this->session->set_userdata('logged',true);
      $this->session->set_userdata('email',$res->email);
      $this->session->set_userdata('id',$res->id);
      redirect();
    }
  }

  public function ValidateLogin () {
    $data = $this->input->post();
    if($this->Users_model->GetUserByLogin($data['login']) ) {
      print "there is a login " . $data['login'] . " yet";
    }
  }

  public function InativateUser() {
    $data['success'] = null;
    $data['error'] = null;
    $data = $this->input->post();
    $this->Users_model->Inativate($data);
    log_message('error', 'Users.php - Inativate - data:' . implode("|",$data));
    $data['success'] = "User inativated!";
    $data['error'] = null;

    //$users = $this->Users_model->GetAll('login');
		//$data['users'] =$this->Users_model->Format($users);
    //$this->load->view('home',$data);
  }

  public function UpdatePassw() {
    $data['success'] = null;
    $data['error'] = null;
    $this->form_validation->set_rules('pwd','Password','required|min_length[6]|trim');
    if($this->form_validation->run() == FALSE)
    {
      $data['error'] = validation_errors();
    }
    else
    {
      $data = $this->input->post();
      $this->Users_model->Update($data);
      $data['success'] = "Password changed with success!";
      $data['error'] = null;
    }
    $data['user'] = $this->User_model->GetUser($this->session->userdata('id'));
    $this->load->view('change-password',$data);
  }

}
