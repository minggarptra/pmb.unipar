<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Pusher\Pusher;

class Admin extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->helper('date');
      

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
		
   
        $aktif= $this->db->get('settings')->row_array();
       
        if ($aktif['buka_pendaftaran']==1) {
            $data['statusaktif']= 'Pendaftaran Aktif';
        } else {
            $data['statusaktif']= 'Pendaftaran ditutup';
        }
        $StartDate = date("d-m-Y", strtotime($this->Settings_model->gettahun()["awal"]. ' + 1 day'));
        $StopDate = date("d-m-Y", strtotime($this->Settings_model->gettahun()["akhir"]. ' + 1 day'));
        $start = new DateTime($StartDate);
        $end   = new DateTime($StopDate);
        $interval = DateInterval::createFromDateString('1 month');
        $datePeriod   = new DatePeriod($start, $interval, $end);
        foreach ($datePeriod as $date) {
            $bulan[] = $date->format('F');
        }
        $thn=$this->Settings_model->gettahun()["tahun"] ;

        $data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
            'totalregist' =>$this->User_model->gettotalregist($thn),
            'totaldaftar' =>$this->User_model->getTotalDaftar($thn),
            'totaluang' =>$this->User_model->totalKeuangan($thn),
			'judul'		=> 'Dashboard',
			'subjudul'	=> 'Dashboard Aplikasi',
            'bulan' => $bulan,
            'jurusan' =>  $this->db->get("jurusan")->result(),
		];

		$this->load->view('admin/page/main',$data);
		
	}

    public function settings()
	{
        $aksi= $this->input->post('aksi');
        if ($aksi == 'passwordganti') {
            $this->form_validation->set_rules('oldpassword', 'Password Lama', 'required', ['required' => 'Password lama wajib diisi']);
            $this->form_validation->set_rules('newpassword', 'Password Baru', 'required', ['required' => 'Password baru wajib diisi']);
            if($this->form_validation->run() == false){
                $data = [
                    'title' => $this->Settings_model->general()["app_name"],
                    'ta' =>$this->User_model->getTahunAktif()->row(),
                    'judul'		=> 'Setting',
                    'subjudul'	=> 'Profile',
                    'jurusan' =>  $this->db->get("jurusan")->result(),
                ];
                $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();  
                $this->load->view('admin/page/settingprofile',$data);
            }
            else{
                $user = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
                if(password_verify($this->input->post('oldpassword'), $user['password'])){
                    if($this->input->post('newpassword') ==  $this->input->post('confirmpassword')){
                        $pass = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
                        $this->db->set('password', $pass);
                        $this->db->where('id', $this->session->userdata('id'));
                        $this->db->update('admin');
                        
                        $this->session->set_flashdata('success', "Password berhasil diubah");
                        redirect(base_url() . 'admin-settings');
                    }else{
                        $this->session->set_flashdata('failed', "Konfirmasi Password tidak sama");
                        redirect(base_url() . 'admin-settings');
                    }
                }else{
                    $this->session->set_flashdata('failed', "Password Lama Salah");
                    redirect(base_url() . 'admin-settings');
                }
            }

        } 
        
        else {
        $this->form_validation->set_rules('poto', 'Foto Profile', 'callback_validate_image'); // penamaan callback, calback_nama fungsi
       
        if($this->form_validation->run() == false){
            
         
            $data = [
                'title' => $this->Settings_model->general()["app_name"],
                'ta' =>$this->User_model->getTahunAktif()->row(),
                'judul'		=> 'Setting',
                'subjudul'	=> 'Profile',
                'jurusan' =>  $this->db->get("jurusan")->result(),
            ];
            $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();  
            $this->load->view('admin/page/settingprofile',$data);
        }

        else
        {
                    $foto=$this->db->get_where('admin',array('id'=>$this->session->userdata('id')));


                    if($foto->num_rows()>0){
                        $hasil=$foto->row();
                        $nama_foto=$hasil->photo_profile;
                        if ($nama_foto == 'default.png') {
                            
                        }
                        else{
                        if(file_exists($file=FCPATH.'assets/upload/images/profile/'.$nama_foto)){
                            unlink($file);
                        }
                        }   
                        $upload = $this->User_model->uploadPhoto();

                        if($upload['result'] == 'success'){
                            $file = $upload['file']['file_name'];
                            $this->User_model->updateProfileAdmin($file);
                            $this->session->set_flashdata('success', 'foto berhasil di ubah');
                             redirect(base_url() . 'admin-settings');

                        }
                        else
                        {
                            $this->session->set_flashdata('success', 'foto gagal di ubah');
                            redirect(base_url() . 'admin-settings');
                        }
                    

		            }

        }
    }


    
	}

    function validate_image()
    {
        $check = TRUE;
        if ((!isset($_FILES['poto'])) || $_FILES['poto']['size'] == 0) {
            $this->form_validation->set_message('validate_image', ' {field} Harus di isi');
            $check = FALSE;
        } else if (isset($_FILES['poto']) && $_FILES['poto']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["poto"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['poto']['tmp_name']);
            $type = $_FILES['poto']['type'];
            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Tipe file ini tidak diizinkan!');
                $check = FALSE;
            }
            if (filesize($_FILES['poto']['tmp_name']) > 2097152) {
                $this->form_validation->set_message('validate_image', 'Size gambar tidak lebih dari 2MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_image', "Tipe file ini tidak diizinkan {$extension}");
                $check = FALSE;
            }
        }
        return $check;
    }



    function getnotif(){
        $id= $this->session->userdata('id');
        $cari =  $this->db->query("SELECT * FROM notifadmin WHERE  desktopnotif IS NULL ");
        $content = $cari->row();
        $setting = $this->db->get('general')->row();
        if ($cari->num_rows() < 1) {
  
          $result = [
              'status'    => 'no',
              'content'   => '',
              
          ];
  
          echo json_encode($result);
        } else {
  
          $result = [
              'status'    => 'ok',
              'content'   => $content->notifikasi,
              'title'   => $setting->app_name,
              
          ];
  
          echo json_encode($result);
          
        }
        
  
      }
  
  
      function setnotif(){
          $datan=[
              'desktopnotif' => 1,
          ];
          
          $this->db->update('notifadmin', $datan);
      }


      function notifikasi(){

        $this->load->library('pagination'); 

        //set read 1 kalau lihat semua notifikasi
        $datan=[
            'is_read' => '1'
        ];
       
        $this->db->update('notifadmin', $datan);


        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();    
        $data['title'] =  $this->Settings_model->general()["app_name"];

        $config['base_url'] = site_url('notifadmin'); //site url
        $config['total_rows'] = $this->db->get('notifadmin')->num_rows(); //total row
        $config['per_page'] = 10;  //show record per halaman
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
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
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

        $this->db->order_by('date', 'DESC');
        $data['notifikasi'] = $this->db->get('notifadmin',$config["per_page"],$data["page"])->result();

        
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('admin/partials/header',$data);
               
        $this->load->view('admin/page/notifikasi',$data);
        $this->load->view('admin/partials/footer',$data);
               

    }

    function headernotifikasichat(){
        $this->db->limit(5);
        $this->db->order_by("date", "DESC");
        $notifikasi = $this->db->get_where('notifadmin', ['is_read' => '0', 'type' => 'chat'])->result();
        $jumlah = $this->db->get_where('notifadmin', ['is_read' => '0', 'type' => 'chat'])->num_rows();
        $now = time();
        $data= []  ;        
        $notif = [] ;                
        foreach ($notifikasi as $i =>  $value) {
            $notif[$i]['notifikasi'] = $value->notifikasi;
            $notif[$i]['waktu'] = timespan(strtotime($value->date), $now) . ' ago';
        }

        $data['jumlah']=$jumlah;
        $data['notif']=$notif;

        echo json_encode($data);
	
    }

    function headernotifikasi(){
        $this->db->limit(5);
        $this->db->order_by("date", "DESC");
        $notifikasi = $this->db->get_where('notifadmin', ['is_read' => '0', 'type' => 'notif'])->result();
        $jumlah = $this->db->get_where('notifadmin', ['is_read' => '0', 'type' => 'notif'])->num_rows();
        $now = time();
        $data= []  ;        
        $notif = [] ;                
        foreach ($notifikasi as $i =>  $value) {
            $notif[$i]['notifikasi'] = $value->notifikasi;
            $notif[$i]['waktu'] = timespan(strtotime($value->date), $now) . ' ago';
        }

        $data['jumlah']=$jumlah;
        $data['notif']=$notif;

        echo json_encode($data);
	
    }


    function clearnotif(){
        $datan=[
            'is_read' => 1,
        ];
        $this->db->where('type', 'notif');
        $this->db->update('notifadmin', $datan);
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            'b6ddec25ff4b5cc46b4f', //ganti dengan App_key pusher Anda
            '3f075b004850be476e54', //ganti dengan App_secret pusher Anda
            '1522214', //ganti dengan App_key pusher Anda
            $options
        );
        $datapusher['message'] = 'notifadmin';
        $pusher->trigger('my-channel', 'my-event', $datapusher);
    }

    function clearnotifchat(){
        $datan=[
            'is_read' => 1,
        ];
        $this->db->where('type', 'chat');
        $this->db->update('notifadmin', $datan);
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher(
            'b6ddec25ff4b5cc46b4f', //ganti dengan App_key pusher Anda
            '3f075b004850be476e54', //ganti dengan App_secret pusher Anda
            '1522214', //ganti dengan App_key pusher Anda
            $options
        );
        $datapusher['message'] = 'notifadmin';
        $pusher->trigger('my-channel', 'my-event', $datapusher);
    }

    
}
