<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base extends CI_Controller {

    public function Index() {
		$users = $this->users_model->GetAll('name');
		$data['users'] =$this->users_model->Format($users);
		$this->load->view('home',$data);
	}

	public function Save() {
		$users = $this->users_model->GetAll('name');
		$data['users'] =$this->users_model->Format($users);
		$validation = self::Validate();
		if($validation){
			$user = $this->input->post();
			$status = $this->users_model->Insert($user);
			if(!$status){
				$this->session->set_flashdata('error', 'Não foi possível inserir o contato.');
			}else{
				$this->session->set_flashdata('success', 'Contato inserido com sucesso.');
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors('<p>','</p>'));
		}
		$this->load->view('home',$data);
	}

    public function Edit() {
		$id = $this->uri->segment(2);
		if(is_null($id))
			redirect();
		$data['user'] = $this->users_model->GetById($id);
		$this->load->view('edit',$data);
	}

	public function Update(){
		$validation = self::Validate('update');
		if($validation){
			$user = $this->input->post();
			$status = $this->users_model->Update($user['id'],$user);
			if(!$status){
				$data['user'] = $this->users_model->GetById($user['id']);
				$this->session->set_flashdata('error', 'Não foi possível atualizar o contato.');
			}else{
				$this->session->set_flashdata('success', 'Contato atualizado com sucesso.');
				redirect();
			}
		}else{
			$this->session->set_flashdata('error', validation_errors());
		}
		$this->load->view('edit',$data);
	}

	public function Delete(){
		$id = $this->uri->segment(2);
		if(is_null($id))
			redirect();
		$status = $this->users_model->Delete($id);
		if($status){
			$this->session->set_flashdata('success', '<p>Contato excluído com sucesso.</p>');
		}else{
			$this->session->set_flashdata('error', '<p>Não foi possível excluir o contato.</p>');
		}
		redirect();
	}
  
	private function Validate($operation = 'insert'){
		switch($operation){
			case 'insert':
				$rules['name'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[users.email]');
                $rules['password'] = array('trim', 'required', 'valid_password', 'is_unique[users.pwd]');
                $rules['type'] = array('trim', 'required', 'valid_type', 'is_unique[users.type]');
				break;
			case 'update':
				$rules['name'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email');
                $rules['password'] = array('trim', 'required', 'valid_password', 'is_unique[users.pwd]');
                $rules['type'] = array('trim', 'required', 'valid_type', 'is_unique[users.type]');
				break;
			default:
				$rules['name'] = array('trim', 'required', 'min_length[3]');
				$rules['email'] = array('trim', 'required', 'valid_email', 'is_unique[users.email]');
                $rules['password'] = array('trim', 'required', 'valid_password', 'is_unique[users.pwd]');
                $rules['type'] = array('trim', 'required', 'valid_type', 'is_unique[users.type]');
				break;
		}
		$this->form_validation->set_rules('name', 'Name', $rules['name']);
		$this->form_validation->set_rules('email', 'Email', $rules['email']);
        $this->form_validation->set_rules('password', 'Password', $rules['pwd']);
		return $this->form_validation->run();
	}
}