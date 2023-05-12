<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		
		$this->load->helper('cookie');
	}
	public function index()
	{	
        $data['title'] =  $this->Settings_model->general()["app_name"];
        $this->load->view('admin/auth/login',$data);   
	}

	public function proses(){
		$username = $this->input->post('username');
            $password = $this->input->post('password');
            $cookie = $this->input->post('cookie');
            $admin = $this->db->get_where('admin', ['username' => $username])->row_array();

            if($admin){
                if(password_verify($password, $admin['password'])){
                  
					if($cookie != NULL){
						$key = random_string('alnum', 64);
						set_cookie('djehbicd', $key, 3600*24*30*12);
						$this->db->set('cookie', $key);
						$this->db->update('admin');
					}

					$data = [
						'id' => $admin['id'],
						'level' => $admin['level'],
					];                
				
					$this->session->set_userdata('admin', true);
					$this->session->set_userdata($data);
					echo 'success';

                }
				else
				{
                  echo 'error';
                }
              }
			  else
			  {
				echo 'error';
              }
	}

    public function logout(){
		$this->session->sess_destroy();
		redirect('login/admin','refresh');
	}
}
