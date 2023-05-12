<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
		$this->logo = FCPATH . "assets/upload/images/logo/";
		$this->favicon = FCPATH . "assets/upload/images/fav/";
		$this->h_laporan = FCPATH . "assets/upload/images/header_pendaftaran/";
		$this->hero = FCPATH . "assets/upload/images/hero/";
		$this->fasilitas = FCPATH . "assets/upload/images/fasilitas/";
		$this->bghero = FCPATH . "assets/upload/images/bghero/";
        

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
			'subjudul'	=> 'Aplikasi',
		];
	
		$this->load->view('admin/page/setting_aplikasi',$data);
	
	}


    public function norek()
	{
		$data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Setting',
			'subjudul'	=> 'Nomor Rekening',
		];
	
		$this->load->view('admin/page/settingnorek',$data);
	
	}

    public function landing()
	{
		$data['title'] =  $this->Settings_model->general()["app_name"];
        $data['tahun']= $this->Settings_model->gettahun()["tahun"] ;

		$this->load->view('admin/partials/header',$data);
		$this->load->view('admin/page/settings-landing',$data);
	
	}

    public function showdata()
    {
        $kode = $this->input->get('id');
        $settings = $this->db->query("SELECT * FROM settings , general");
        if ($settings->num_rows() > 0) {
            foreach ($settings->result() as $data) {
                $hasil = array(
                    'deskripsi' => $data->short_desc,
                    'lokasi' => $data->lokasi,
                    
                    'alamat' => $data->address,
                    'id' => $data->id,
                    'buka_pendaftaran' => $data->buka_pendaftaran,
                    'favicon' => $data->favicon,
                    'h_daftar' => $data->header_pendaftaran,
                    'logo' => $data->logo,
                    'app_name' => $data->app_name,
                    'slogan' => $data->slogan,
                    'host_mail' => $data->host_mail,
                    'port_mail' => $data->port_mail,
                    'crypto_smtp' => $data->crypto_smtp,
                    'account_gmail' => $data->account_gmail,
                    'pass_gmail' => $data->pass_gmail,
                    'video' => $data->video_profile,
                    'whatsapp' => $data->whatsapp,
                    'hero' => $data->hero,
                    'bghero' => $data->bghero,
                    'fasilitas' => $data->fasilitas,
                  
                );
            }
        }
        echo json_encode($hasil);
    }

    public function showdatanorek()
    {
       
        $settings = $this->db->query("SELECT * FROM norek ");
        if ($settings->num_rows() > 0) {
            foreach ($settings->result() as $data) {
                $hasil = array(
                    
                    'norek' => $data->norek,
                    'bank' => $data->bank,
                    'atasnama' => $data->atasnama,
                    'id' => $data->id,

                    
                    
                  
                );
            }
        }
        echo json_encode($hasil);
    }

    public function getdatafasilitas()
	{
       
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->get("fasilitas");


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $no;
			$data[$key][]  =$lists->nama;
			
			$data[$key][]  = ' <a href="javascript:;" class="btn btn-warning btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
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

    private function _configUpload()
	{
		$config['upload_path'] = $this->logo;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImg($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->logo . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '100%';
		$config['new_image']        = $this->logo . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

    private function _configUploadfav()
	{
		$config['upload_path'] = $this->favicon;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImgfav($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->favicon . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '100%';
		$config['new_image']        = $this->favicon . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

    private function _configUploadh()
	{
		$config['upload_path'] = $this->h_laporan;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImgh($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->h_laporan . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '100%';
		$config['new_image']        = $this->h_laporan . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

    private function _configUploadhero()
	{
		$config['upload_path'] = $this->hero;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImghero($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->hero . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '100%';
		$config['new_image']        = $this->hero . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

    private function _configUploadfas()
	{
		$config['upload_path'] = $this->fasilitas;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImgfas($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->fasilitas . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '100%';
		$config['new_image']        = $this->fasilitas . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

    private function _configUploadbgher()
	{
		$config['upload_path'] = $this->bghero;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImgbgher($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->bghero . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '100%';
		$config['new_image']        = $this->bghero . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

    public function bghero()
	{
		$data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Setting',
			'subjudul'	=> 'Background Hero',
		];
	
		$this->load->view('admin/page/settinghero',$data);
	
	}

    function simpanbghero(){
    
        $cariold = $this->db->get_where('settings', array('id' => '1'))->row();

        if (!empty($_FILES['bghero']['name'])) {
            $oldimg = $cariold->bghero;
            if ($oldimg) {
                if (is_file($this->bghero . $oldimg)) {
                    unlink($this->bghero . $oldimg);
                }
            }
            $this->_configUploadbgher();

            if ($this->upload->do_upload('bghero')) {
                $img = $this->upload->data();

                //Compress Image
                $this->_compressImgbgher($img['file_name']);

                $gambar = $img['file_name'];
            } else {
                echo 'gagalgambar';
                $gambar = "gagalupload";
            }
            $data = array(    
                'bghero' => $gambar,
            );


        }

        $this->db->where('id', '1');
                $simpan = $this->db->update('settings', $data);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }


    }


    
    function simpanfas(){
    
        $cariold = $this->db->get_where('settings', array('id' => '1'))->row();

        if (!empty($_FILES['fas']['name'])) {
            $oldimg = $cariold->hero;
            if ($oldimg) {
                if (is_file($this->fasilitas . $oldimg)) {
                    unlink($this->fasilitas . $oldimg);
                }
            }
            $this->_configUploadfas();

            if ($this->upload->do_upload('fas')) {
                $img = $this->upload->data();

                //Compress Image
                $this->_compressImgfas($img['file_name']);

                $gambar = $img['file_name'];
            } else {
                echo 'gagalgambar';
                $gambar = "gagalupload";
            }
            $data = array(    
                'fasilitas' => $gambar,
            );


        }

        $this->db->where('id', '1');
                $simpan = $this->db->update('settings', $data);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }


    }


    function simpan()
	{
		
            $kodedit = $this->input->post('kodedit');
        
            $desc = $this->input->post('desc');
            $alamat = $this->input->post('alamat');
            $video = $this->input->post('video');
            $lokasi = $this->input->post('lokasi');
          
            
            if($desc !== "" ){
            $cariold = $this->db->get_where('settings', array('id' => $this->input->post('kodedit')))->row();
             if (!empty($_FILES['logo']['name'])) {
                    $oldimg = $cariold->logo;
                    if ($oldimg) {
                        if (is_file($this->logo . $oldimg)) {
                            unlink($this->logo . $oldimg);
                        }
                    }
                    $this->_configUpload();
        
                    if ($this->upload->do_upload('logo')) {
                        $img = $this->upload->data();
        
                        //Compress Image
                        $this->_compressImg($img['file_name']);
        
                        $gambar = $img['file_name'];
                    } else {
                        echo 'gagalgambar';
                        $gambar = "gagalupload";
                    }
                    $data = array(
                        'address' => $alamat,
                        'logo' => $gambar,
                        'short_desc' => $desc,
                        'video_profile' => $video,
                        'lokasi' => $lokasi,
                        

                    );
                }
                else if (!empty($_FILES['favicon']['name'])) {
                    $oldimg = $cariold->favicon;
                    if ($oldimg) {
                        if (is_file($this->favicon . $oldimg)) {
                            unlink($this->favicon . $oldimg);
                        }
                    }
                    $this->_configUploadfav();
        
                    if ($this->upload->do_upload('favicon')) {
                        $img = $this->upload->data();
        
                        //Compress Image
                        $this->_compressImgfav($img['file_name']);
        
                        $gambar = $img['file_name'];
                    } else {
                        echo 'gagalgambar';
                        $gambar = "gagalupload";
                    }
                    $data = array(
                        'address' => $alamat,
                        'favicon' => $gambar,
                        'short_desc' => $desc,
                        'video_profile' => $video,
                        'lokasi' => $lokasi,

                        

                    );
                }
                else if (!empty($_FILES['h_laporan']['name'])) {
                    $oldimg = $cariold->header_pendaftaran;
                    if ($oldimg) {
                        if (is_file($this->h_laporan . $oldimg)) {
                            unlink($this->h_laporan . $oldimg);
                        }
                    }
                    $this->_configUploadh();
        
                    if ($this->upload->do_upload('h_laporan')) {
                        $img = $this->upload->data();
        
                        //Compress Image
                        $this->_compressImgh($img['file_name']);
        
                        $gambar = $img['file_name'];
                    } else {
                        echo 'gagalgambar';
                        $gambar = "gagalupload";
                    }
                    $data = array(
                        'address' => $alamat,
                        'header_pendaftaran' => $gambar,
                        'short_desc' => $desc,
                        'video_profile' => $video,
                        'lokasi' => $lokasi,

                        

                    );
                }
                else{

                    $data = array(
                        'address' => $alamat,
                        'short_desc' => $desc,
                        'video_profile' => $video,
                        'lokasi' => $lokasi,


                        
                    );
                }

                
                $this->db->where('id', $this->input->post('kodedit'));
                $simpan = $this->db->update('settings', $data);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }

            }
            else{
                echo 'errordesc';

            }
		
	}

    public function simpangeneral(){
        $kodedit = $this->input->post('kodedit2');
        
        $app_name = $this->input->post('app_name');
        $slogan = $this->input->post('slogan');
        $host_mail = $this->input->post('host_mail');
        $port_mail = $this->input->post('port_mail');
        $crypto_smtp = $this->input->post('crypto_smtp');
        $account_gmail = $this->input->post('account_gmail');
        $pass_gmail = $this->input->post('pass_gmail');
        $whatsapp = $this->input->post('whatsapp');
        $server_api_midtrans = $this->input->post('server_api_midtrans');
        $client_api_midtrans = $this->input->post('client_api_midtrans');

        $data = array(
            'app_name' => $app_name,
                    'slogan' => $slogan,
                    'host_mail' => $host_mail,
                    'port_mail' => $port_mail,
                    'crypto_smtp' => $crypto_smtp,
                    'account_gmail' => $account_gmail,
                    'pass_gmail' => $pass_gmail,
                    'whatsapp' => $whatsapp,
                    'server_api_midtrans' => $server_api_midtrans,
                    'client_api_midtrans' => $client_api_midtrans,
        );

        $this->db->where('id', $this->input->post('kodedit2'));
                $simpan = $this->db->update('general', $data);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }
        
        
      

    }

    public function simpanfasilitas(){
        $fasilitas = $this->input->post('fasilitas');
        
       

        $data = array(
            'nama' => $fasilitas,
                   
        );

       
                $simpan = $this->db->insert('fasilitas', $data);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }
        
        
      

    }


    public function simpannorek(){
        $kodedit = $this->input->post('kodedit2');
        
        $bank = $this->input->post('bank');
        $norek = $this->input->post('norek');
        $atasnama = $this->input->post('atasnama');
       

        $data = array(
                     'norek' => $norek,
                    'bank' => $bank,
                    'atasnama' => $atasnama,
                    
        );

        $this->db->where('id', $this->input->post('kodedit2'));
                $simpan = $this->db->update('norek', $data);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }
        
        
      

    }

    public function showedit()
	{
		$id = $this->input->get('id');
	

		$jurusan = $this->db->get_where('jurusan', ['kode' => $id]);

		if ($jurusan->num_rows() > 0) {
			foreach ($jurusan->result() as $data) {
				$hasil = array(
					'kode' => $data->kode,
					'jurusan' => $data->jurusan,			
					'biaya' => $data->biaya,			
					'foto' => $data->foto,			
				);
			}
		}
		echo json_encode($hasil);
	}


    public function hapus()
	{
		    $id = $this->input->post('id');
            $jurusan =  $this->db->get_where('jurusan',['id' => $id ])->row();
            $pendaftaran =  $this->db->get_where('pendaftaran',['jurusan' => $jurusan->kode ])->num_rows();
            if ($pendaftaran < 1) {
                    $data = $this->db->query("DELETE FROM jurusan WHERE id= '$id' ");
                    if ($data) {
                        echo 'success';
                    } else {
                        echo 'error';
			        }
            } else {
                echo 'ada';
            }		
	}

    public function hapusfasilitas()
	{
		    $id = $this->input->post('id');
           
                    $data = $this->db->query("DELETE FROM fasilitas WHERE id= '$id' ");
                    if ($data) {
                        echo 'success';
                    } else {
                        echo 'error';
			        }
           
	}

    
    public function ubahaktif()
    {
		    $id = $this->input->post('id');
		    $nilai = $this->input->post('nilai');
          

            if ($nilai == 0) {
               
                    $datasimpan = array(
            
                        'buka_pendaftaran' => 1,
                        
                        
                    );
                    $this->db->where('id', $id);
                    $simpan = $this->db->update('settings', $datasimpan);
                    if ($simpan) {
                        echo 'success';
                    } else {
                        echo 'error';
                    }
               
                
                
            } else {
                $datasimpan = array(
                    'buka_pendaftaran' => 0,
                );
                $this->db->where('id', $id);
                $simpan = $this->db->update('settings', $datasimpan);
                if ($simpan) {
                    echo 'successnonaktif';
                } else {
                    echo 'error';
                }
            }
            




    }


}
