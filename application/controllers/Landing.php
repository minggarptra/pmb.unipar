<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Landing extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->helper('date');
      

        
    }
	public function index()
	{
		$data['title'] =  $this->Settings_model->general()["app_name"];
        $data['tahun']= $this->Settings_model->gettahun()["tahun"] ;
        
        $aktif= $this->db->get('settings')->row_array();
       
        if ($aktif['buka_pendaftaran']==1) {
            $data['statusaktif']= 'Pendaftaran Aktif';
        } else {
            $data['statusaktif']= 'Pendaftaran ditutup';
        }        
  
		$data['slogan'] =  $this->Settings_model->general()["slogan"];
        $data['jurusan']  = $this->db->get("jurusan")->result();
	    $data['ta']= $this->User_model->getTahunAktif()->row();
        $data['berita'] = $this->M_landing->get_datadashboard();






		$this->load->view('dashboard/page/main',$data);
		
	}


    public function berita_list()
    {

		$data['title'] =  $this->Settings_model->general()["app_name"];
		$data['ta']= $this->User_model->getTahunAktif()->row();
		$data['slogan'] =  $this->Settings_model->general()["slogan"];



        $config['base_url'] = site_url('berita-pmb-list'); //site url
        $config['total_rows'] = $this->db->get('berita')->num_rows(); //total row
        $config['per_page'] = 6;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
    
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span aria-hidden="true"></span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(1)) ? $this->uri->segment(2) : 0;

       
        $start = $this->uri->segment(2);
        $data['beritalists'] = $this->M_landing->get_all_post($config['per_page'], $start);

        
        $data['pagination'] = $this->pagination->create_links();
 
        $data['berita'] = $this->M_landing->get_datadashboard();
        $data['jurusan']  = $this->db->get("jurusan")->result();


        $this->load->view('dashboard/page/list_berita',$data);

        
    }


    public function prodidetail($slug = "")
    {
        if (!$slug) {
            redirect('landing');
        }
		$data['title'] =  $this->Settings_model->general()["app_name"];
        $data['jurusan']  = $this->db->get("jurusan")->result();
        $data['ta']= $this->User_model->getTahunAktif()->row();
		$data['slogan'] =  $this->Settings_model->general()["slogan"];
        $cekdulu = $this->M_landing->get_prodi_by_slug($slug);
        $data['berita'] = $this->M_landing->get_datadashboard();

        if ($cekdulu->num_rows() < 1) {
            redirect('my404');
        } else {
            $data['detail']   = $this->M_landing->get_prodi_by_slug($slug)->row();

            $this->load->view('dashboard/page/detailprodi',$data);
        }

    }


    public function beritadetail($slug = "")
    {
        if (!$slug) {
            redirect('landing');
        }
		$data['title'] =  $this->Settings_model->general()["app_name"];
        $data['jurusan']  = $this->db->get("jurusan")->result();
        $data['ta']= $this->User_model->getTahunAktif()->row();
		$data['slogan'] =  $this->Settings_model->general()["slogan"];
        $cekdulu = $this->M_landing->get_post_by_slug($slug);
        $data['berita'] = $this->M_landing->get_datadashboard();
        if ($cekdulu->num_rows() < 1) {
            redirect('my404');
        } else {
            $data['detail']   = $this->M_landing->get_post_by_slug($slug)->row();

            $this->load->view('dashboard/page/detailberita',$data);
        }

    }
    

    
}
