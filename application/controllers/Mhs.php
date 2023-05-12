<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mhs extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->path = FCPATH . "assets/upload/images/kegiatan/";
		$this->path2 = FCPATH . "assets/upload/images/kegiatan/isi/";
		$this->buktibayar = FCPATH . "assets/upload/images/buktipembayaran/";



		//cek session login
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
        $this->load->model('Model_dynamic_dependent', 'Mdependent');

		$data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Mahasiswa',
			'subjudul'	=> 'Tambah Mahasiswa',
		];
        $data['jurusan']= $this->db->get('jurusan');
        $data['provinsi'] = $this->Mdependent->get_provinsi();

	
		$this->load->view('admin/page/mahasiswa/add',$data);


    }

     // get kabupaten

     function get_kabupaten()
     {
         $this->load->model('Model_dynamic_dependent', 'Mdependent');
         if ($this->input->post('provinsi_id')) {
             echo $this->Mdependent->get_kabupaten($this->input->post('provinsi_id'));
         }
     }
     function get_kabupaten_data()
     {
         $this->load->model('Model_dynamic_dependent', 'Mdependent');
         if ($this->input->post('provinsi_id')) {
             echo $this->Mdependent->get_kabupaten_data($this->input->post('provinsi_id'),$this->input->post('kab_id'));
         }
     }

     function random() {
        return (float)rand()/(float)getrandmax();
      }

     private function _configUpload()
     {
         $config['upload_path'] = $this->buktibayar;
         $config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
         $config['encrypt_name'] = TRUE;
         $this->load->library('upload');
         $this->upload->initialize($config);
     }
 
     private function _compressImg($name)
     {
         $config['image_library']    = 'gd2';
         $config['source_image']     = $this->buktibayar . $name;
         $config['create_thumb']     = FALSE;
         $config['maintain_ratio']   = TRUE;
         $config['quality']          = '100%';
         $config['new_image']        = $this->buktibayar . $name;
 
         $this->load->library('image_lib', $config);
         $this->image_lib->resize();
     }


     public function simpan(){
        $thn=$this->Settings_model->gettahun()["tahun"] ;
        // $code=$this->User_model->register($thn);
        $email = addslashes(htmlspecialchars($this->input->post('email', true)));
        $checkEmail = $this->db->get_where('camaba', ['email' => $email])->row_array();
        if($checkEmail){
            echo   'emailregist';
        }else{
            $getnumber = substr($this->input->post('nohp'),0, 1);
			$regional = 62;
			if($getnumber == 0 || $getnumber == 8 ){
				$format_number = $regional.substr($this->input->post('nohp'), 1);
			}else{
				$format_number = $this->input->post('nohp');
			}
            $checkNumber = $this->db->get_where('camaba', ['nohp' => $format_number])->row_array();
            if($checkNumber){
                echo 'hpregist';
            }else{

            $name = addslashes(htmlspecialchars($this->input->post('nama_belakang', true)));
            $password = $this->input->post('nohp');
            $jurusan = $this->input->post('jurusan');
            $token = sha1($format_number);
            $tokenwa = mt_rand(111111,999999);
            function textToSlug($text='') {
                $text = trim($text);
                if (empty($text)) return '';
                $text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
                $text = strtolower(trim($text));
                $text = str_replace(' ', '-', $text);
                $text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
                return $text;
            }
            $username = textToSlug($name);
            $checkUsername = $this->db->get_where('camaba', ['username' => $username])->row_array();
            if($checkUsername){
                $username = $username . substr(rand(),0,3);
            }

            // NO PENDAFTARAN
            $tahun= $this->Settings_model->gettahun()["tahun"] ;
            $this->db->order_by('id', 'DESC');
            $caripendadftaran = $this->db->get_where('camaba',array('jurusan' => $jurusan));
            if ($caripendadftaran->num_rows() == 0) 
            {
                $no_pendaftaran   = $tahun.$jurusan.'0001';
            
            }
            else
            {
                $noUrut 	 	= substr($caripendadftaran->row()->no_pendaftaran, 6, 4);
                $noUrut++;
                $no_pendaftaran	  = $tahun.$jurusan.sprintf("%04s", $noUrut);
            }

            $data = [
                'name' => $name,
                'no_pendaftaran' => $no_pendaftaran,
                'jurusan' => $jurusan,
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'date_register' => date('Y-m-d H:i:s'),
                'token' => $token,
                'tokenwa' => $tokenwa,
                'nohp' => $format_number,
                'photo_profile' => 'default.png',
                'tanggal_daftar'=>date('Y-m-d'),
                'bulan'=>date('F'),
                'hari'=>date('d'),
                'is_activate'=>1,
                'tahun'=>$thn
            ];
            // insert maba
             $this->db->insert('camaba', $data);
            $last_id = $this->db->insert_id();
         $carijurusan = $this->db->get_where('jurusan',array('kode' => $jurusan));
         $bukti= "";
         if (!empty($_FILES['buktibayar']['name'])) {
             $this->_configUpload();
 
             if ($this->upload->do_upload('buktibayar')) {
                 $img = $this->upload->data();
 
                 //Compress Image
                 $this->_compressImg($img['file_name']);
 
                 $gambar = $img['file_name'];
             } else {
                 echo 'gagalgambar';
                 $gambar = "gagalupload";
             }
             $bukti= $gambar;
            }


            $invoicedata = [
                'camaba' => $no_pendaftaran,
                'invoice_code' =>  $no_pendaftaran,
                'total_all' => $carijurusan->row()->biaya,
                'jurusan' => $jurusan,
                'pay_status' => 'SETTLED',  
                'bukti' => $bukti,
                 'tanggal_konfirmasi' => date('Y-m-d H:i:s'),
                'bulan' => date('F'),
                'tahun' => $thn
            ];
   
           $this->db->insert('invoice', $invoicedata);

            // insert form pendaftaran
             //DATA PRIBADI
        $nama_depan= $this->input->post('nama_depan');
        $nama_belakang= $this->input->post('nama_belakang');
        $nik= $this->input->post('nik');
        $nisn= $this->input->post('nisn');
        $tanggal_lahir= $this->input->post('tanggal_lahir');
        $tempat_lahir= $this->input->post('tempat_lahir');
        $nohp= $this->input->post('nohp');
        $golongan_darah= $this->input->post('golongan_darah');
        $jenis_kelamin= $this->input->post('jenis_kelamin');
        $wn= $this->input->post('wn');
        $pekerjaan= $this->input->post('pekerjaan');
        $agama= $this->input->post('agama');
        $anak_ke= $this->input->post('anak_ke');
        $jumlah_saudara= $this->input->post('jumlah_saudara');
        $size_almet= $this->input->post('size_almet');
        $alamat= $this->input->post('alamat');
        $alamat_jember = $this->input->post('alamat_jember');

        //DATA SEKOLAH
        $asal_sekolah= $this->input->post('asal_sekolah');
        $tahun_lulus= $this->input->post('tahun_lulus');
        $provinsi= $this->input->post('provinsi');
        $kabupaten= $this->input->post('kabupaten');
        $npsn = $this->input->post('npsn');
        $alamat_sekolah= $this->input->post('alamat_sekolah');

        //DATAORANGTUA
        $nama_ortu=$this->input->post('nama_ortu');
        $nohp_ortu=$this->input->post('nohp_ortu');
        $agama_ortu=$this->input->post('agama_ortu');
        $pekerjaan_ortu=$this->input->post('pekerjaan_ortu');
        $pendidikan_ortu=$this->input->post('pendidikan_ortu');
        $penghasilan_ortu=$this->input->post('penghasilan_ortu');
        $alamat_ortu=$this->input->post('alamat_ortu');

        $jalur_pendaftaran = $this->input->post('jalur_pendaftaran');
        $informasi = $this->input->post('informasi');
        $kipk = $this->input->post('kipk');

        $tahun= $this->Settings_model->gettahun()["tahun"] ; 
        $data=array(
            'id_user' => $last_id,
            'no_pendaftaran' => $no_pendaftaran,
            'tahun' => $tahun,
            'nama_depan'=> $nama_depan,
            'nama_belakang'=> $nama_belakang,
            'nik'=> $nik,
            'nisn'=> $nisn,
            'tempat_lahir'=>$tempat_lahir ,
            'tanggal_lahir'=>$tanggal_lahir ,
            'alamat'=>$alamat,
            'alamat_jember'=>$alamat_jember,
            'size_almet'=>$size_almet,
            'jurusan'=>$jurusan,
            'nohp'=>$nohp,
            'gdarah'=>$golongan_darah,
            'jk'=>$jenis_kelamin,
            'wn'=>$wn,
            'agama'=>$agama,
            'anak'=>$anak_ke,
            'jsaudara'=>$jumlah_saudara,
            'pekerjaan'=>$pekerjaan,
            'asalsekolah'=>$asal_sekolah,
            'tahunlulus'=>$tahun_lulus,
            'npsn'=>$npsn,
            'alamatsekolah'=>$alamat_sekolah,
            'kota'=>$kabupaten,
            'prov'=>$provinsi,
            'nama_ortu'=>$nama_ortu,
            'agama_ortu'=>$agama_ortu,
            'nohp_ortu'=>$nohp_ortu,
            'pekerjaan_ortu'=>$pekerjaan_ortu,
            'pendidikan_ortu'=>$pendidikan_ortu,
            'penghasilan_ortu'=>$penghasilan_ortu,
            'alamat_ortu'=>$alamat_ortu,
            'jalur_pendaftaran' => $jalur_pendaftaran,
            'informasi' => $informasi,
            'kipk' => $kipk,
            'tanggal_daftar'=>date('Y-m-d'),
            'bulan'=>date('F'),
            'hari'=>date('d')
        );
        
        $insert = $this->db->insert('pendaftaran',$data);


        // KTP
        $config['upload_path']   = FCPATH.'assets/upload/images/ktp/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('ktp')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('ktp',array(
                'user' =>  $last_id,
                'ktp'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errorktp';
        }

        // KK
        $config['upload_path']   = FCPATH.'assets/upload/images/kk/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('kk')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('kk',array(
                'user' =>  $last_id,
                'kk'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errorkk';
        }

        // AKTE KELAHIRAN
        $config['upload_path']   = FCPATH.'assets/upload/images/akte_kelahiran/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('akte_kelahiran')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('akte_kelahiran',array(
                'user' =>  $last_id,
                'akte_kelahiran'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errorakte_kelahiran';
        }

        // IJAZAH SMA/SMK/SEDERAJAT
        $config['upload_path']   = FCPATH.'assets/upload/images/ijazah_sma_smk/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('ijazah')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('ijazah',array(
                'user' =>  $last_id,
                'ijazah'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errorijazah';
        }

        // // KK
        // $config['upload_path']   = FCPATH.'/assets/upload/images/kk/';
        // $config['allowed_types'] = 'pdf';
        // $config['encrypt_name'] = TRUE;
        // $this->load->library('upload');
		// $this->upload->initialize($config);

        // if($this->upload->do_upload('kk')){
        // 	$token=$this->random();
        // 	$nama=$this->upload->data('file_name');
        // 	$this->db->insert('kk',array(
        //         'user' =>  $last_id,
        //         'kk'=> $nama,
        //         'token'=>  $token
            
        //     ));
        // }
        // else{
        //     echo 'errorkk';
        // }


        // // FOTO

        // $config['upload_path']   = FCPATH.'/assets/upload/images/foto/';
        // $config['allowed_types'] = 'jpg|png';
        // $config['encrypt_name'] = TRUE;
        // $this->load->library('upload');
		// $this->upload->initialize($config);

        // if($this->upload->do_upload('foto')){
        // 	$token=$this->random();
        // 	$nama=$this->upload->data('file_name');
        // 	$this->db->insert('foto',array(
        //         'user' =>  $last_id,
        //         'foto'=> $nama,
        //         'token'=>  $token
            
        //     ));
        // }
        // else{
        //     echo 'errorfoto';
        // }

        // NILAI UN
        $config['upload_path']   = FCPATH.'assets/upload/images/nilai_un/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('un')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('un',array(
                'user' =>  $last_id,
                'un'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errorun';
        }

        // Ijazah D1 / D2 / D3
        $config['upload_path']   = FCPATH.'assets/upload/images/ijazah_d/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('ijazah_d')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('ijazah_d1_d2_d3',array(
                'user' =>  $last_id,
                'ijazah_d1_d2_d3'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errorijazah_d1_d2_d3';
        }

        // Transkrip D1 / D2 / D3
        $config['upload_path']   = FCPATH.'assets/upload/images/transkrip_d/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('transkrip_d')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('transkrip_nilai_d1_d2_d3',array(
                'user' =>  $last_id,
                'transkrip_d1_d2_d3'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errortranskrip_d';
        }

        // SK PINDAH
        $config['upload_path']   = FCPATH.'assets/upload/images/sk_pindah/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('sk_pindah')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('sk_pindah',array(
                'user' =>  $last_id,
                'sk'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errorsk_pindah';
        }

        // PERSYARATAN LAIN
        $config['upload_path']   = FCPATH.'assets/upload/images/persyaratan_lain/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('persyaratan_lain')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('persyaratan_lain',array(
                'user' =>  $last_id,
                'persyaratan_lain'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errorpersyaratan_lain';
        }

        // IJAZAH S1
        $config['upload_path']   = FCPATH.'assets/upload/images/ijazah_s1/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('ijazah_s1')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('ijazah_s1',array(
                'user' =>  $last_id,
                'ijazah_s1'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errorijazah_s1';
        }

        // TRANSKRIP S1
        $config['upload_path']   = FCPATH.'assets/upload/images/transkrip_s1/';
        $config['allowed_types'] = 'pdf';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('transkrip_s1')){
        	$token=  $this->random();
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('transkrip_nilai_s1',array(
                'user' =>  $last_id,
                'transkrip_s1'=> $nama,
                'token'=>  $token
            
            ));
        }
        else{
            echo 'errortranskrip_s1';
        }



        if ($insert){
            echo 'success';
        }
            


        redirect(base_url().'tambah-mhs');
            }
            }
        }

        // KK
        // $config['upload_path']   = FCPATH.'/assets/upload/images/akte_kelahiran/';
        // $config['allowed_types'] = 'pdf';
        // $config['encrypt_name'] = TRUE;
        // $this->load->library('upload');
		// $this->upload->initialize($config);

        // if($this->upload->do_upload('akte_kelahiran')){
        // 	$token=$this->random();
        // 	$nama=$this->upload->data('file_name');
        // 	$this->db->insert('akte_kelahiran',array(
        //         'user' =>  $last_id,
        //         'akte_kelahiran'=> $nama,
        //         'token'=>  $token
            
        //     ));
        // }
        // else{
        //     echo 'erroraktekelahiran';
        // }

}
