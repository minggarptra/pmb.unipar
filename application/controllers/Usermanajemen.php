<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermanajemen extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
	  

        if(!$this->session->userdata('admin')){
            $cookie = get_cookie('djehbicd');
            if($cookie == NULL){
                redirect(base_url());
            }else{
                $getCookie = $this->db->get_where('admin', ['cookie' => $cookie])->row_array();
                if($getCookie){
                    $this->session->set_userdata('admin', true);
                }else{
                    redirect(base_url());
                }
            }
        }
    }
	public function index()
	{
		$data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Setting',
			'subjudul'	=> 'User Manajemen',
		];
	
		$this->load->view('admin/page/usermanajemen',$data);
	
	
	}

    public function getdata()
	{
       
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->query("SELECT * FROM admin WHERE LEVEL = 'keuangan' OR LEVEL='pimpinan'");


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  =$lists->nama;
			$data[$key][]  =$lists->username;
			$data[$key][]  =$lists->level;
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->id . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
		}


		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);


		echo json_encode($result);
		exit();
	}

   

    function simpan()
	{
		
        $kodedit = $this->input->post('kodedit');
        if ($kodedit == '') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            $level = $this->input->post('level');
            $pass = password_hash($password, PASSWORD_DEFAULT);
            
                        
                        
                    $datasimpan = array(
            
                        'username' => $username,
                        'nama' => $nama,
                        'password' => $pass,     
                        'level' => $level,     
				        'photo_profile' => 'default.png'

                    );
                    $cek = $this->db->get_where('admin', array('username' => $username));
                    if ($cek->num_rows() > 0) {
                        echo 'ada';
                    } else {
                        $data = $this->db->insert('admin', $datasimpan);
                        if ($data) {
                            echo 'success';
                        } else {
                            echo 'error';
                        }
                    }
            
        } 
        else 
        {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $level = $this->input->post('level');
            $nama = $this->input->post('nama');

            $pass = password_hash($password, PASSWORD_DEFAULT);

            
            
             if ($password == "") {
                $data = array(
                    'username' => $username,
                    'nama' => $nama,
                    
                    'level' => $level,     
                   
                );
             } else {
                $data = array(
                    'username' => $username,
                    'password' => $pass,     
                    'level' => $level,     
                    'nama' => $nama,

                   
                );
             }
               

                

                
                $this->db->where('id', $this->input->post('kodedit'));
                $simpan = $this->db->update('admin', $data);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            

           
            
            
        }
        
		
		
		
	}

    public function showedit()
	{
		$id = $this->input->get('id');
	

		$jurusan = $this->db->get_where('admin', ['id' => $id]);

		if ($jurusan->num_rows() > 0) {
			foreach ($jurusan->result() as $data) {
				$hasil = array(
					'kode' => $data->id,
					'username' => $data->username,			
					'level' => $data->level,			
					'nama' => $data->nama,			
							
				);
			}
		}
		echo json_encode($hasil);
	}


    public function hapus()
	{
		    $id = $this->input->post('id');
           
                    $data = $this->db->query("DELETE FROM admin WHERE id= '$id' ");
                    if ($data) {
                        echo 'success';
                    } else {
                        echo 'error';
			        }
           	
	}


}
