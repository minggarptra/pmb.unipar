<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
       
        $this->load->library(['datatables', 'form_validation']);// Load Library Ignited-Datatables
		$this->form_validation->set_error_delimiters('','');
		$this->load->model('Admin_model', 'admin');


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
	{   $data['ta']= $this->User_model->getTahunAktif()->row();
        $ta= $this->User_model->getTahunAktif()->num_rows();
        if ($ta<1) {
            $this->session->set_flashdata('failed', 'Tahun Akademik Belum Aktif');
            redirect(base_url() . 'tahun-akademik');
        } else {
		$data['title'] =  $this->Settings_model->general()["app_name"];
        $data['tahun']= $this->Settings_model->gettahun()["tahun"] ;
		$data['jurusan'] = $this->db->get("jurusan");
		$this->load->view('admin/page/pendaftaran',$data);
        }
	}


    public function output_json($data, $encode = true)
	{
        if($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
    }

    public function akun(){

        $data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Akun Registrasi',
			'subjudul'	=> 'Data akun registrasi',
		];
		$data['jurusan'] = $this->db->get("jurusan")->result();
		$data['tahun'] = $this->db->get("tahun_akademik")->result();


		$this->load->view('admin/page/akunregistrasi',$data);

    }


    public function dataakun($jurusan = null, $tahun =null){
		$this->output_json($this->admin->getDataAkun($jurusan, $tahun), false);
    }

    public function hapusakun(){
        $id = $this->input->post('id');
		$no_pendaftaran = $this->db->get_where("camaba",['id' => $id])->row()->no_pendaftaran;

        $ktp=$this->db->get_where('ktp',array('user'=>$id));
        $kk=$this->db->get_where('kk',array('user'=>$id));
        $akte_kelahiran=$this->db->get_where('akte_kelahiran',array('user'=>$id));
        $ijazah=$this->db->get_where('ijazah',array('user'=>$id));
        $ijazah_s1=$this->db->get_where('ijazah_s1',array('user'=>$id));
        $transkrip_s1=$this->db->get_where('transkrip_nilai_s1',array('user'=>$id));
        $un=$this->db->get_where('un',array('user'=>$id));
        $ijazah_d=$this->db->get_where('ijazah_d1_d2_d3',array('user'=>$id));
        $transkrip_d=$this->db->get_where('transkrip_nilai_d1_d2_d3',array('user'=>$id));
        $sk_pindah=$this->db->get_where('sk_pindah',array('user'=>$id));
        $persyaratan_lain=$this->db->get_where('persyaratan_lain',array('user'=>$id));

        $data = $this->db->query("DELETE FROM camaba WHERE id = '$id' ");
		$data1 = $this->db->query("DELETE FROM invoice WHERE camaba = '$no_pendaftaran' ");
		$data2 = $this->db->query("DELETE FROM pendaftaran WHERE id_user = '$id' ");
        
        if($ktp->num_rows()>0){
			$hasil=$ktp->row();
			$nama_ktp=$hasil->ktp;
			if(file_exists($file=FCPATH.'/assets/upload/images/ktp/'.$nama_ktp)){
				unlink($file);
			}
			$data3 = $this->db->query("DELETE FROM ktp WHERE user = '$id' ");
        }
        if($kk->num_rows()>0){
            $hasil=$kk->row();
			$nama_kk=$hasil->kk;
			if(file_exists($file=FCPATH.'/assets/upload/images/kk/'.$nama_kk)){
				unlink($file);
			}
            $data5 = $this->db->query("DELETE FROM kk WHERE user = '$id' ");
        }
        if($akte_kelahiran->num_rows()>0){
            $hasil=$akte_kelahiran->row();
			$nama_akte_kelahiran=$hasil->akte_kelahiran;
			if(file_exists($file=FCPATH.'/assets/upload/images/akte_kelahiran/'.$nama_akte_kelahiran)){
				unlink($file);
			}
            $data4 = $this->db->query("DELETE FROM akte_kelahiran WHERE user = '$id' ");
        }
        if($ijazah->num_rows()>0){
            $hasil=$ijazah->row();
			$nama_ijazah=$hasil->ijazah;
			if(file_exists($file=FCPATH.'/assets/upload/images/ijazah_sma_smk/'.$nama_ijazah)){
				unlink($file);
			}
            $data6 = $this->db->query("DELETE FROM ijazah WHERE user = '$id' ");
        }
        if($ijazah_s1->num_rows()>0){
            $hasil=$ijazah_s1->row();
			$nama_ijazah_s1=$hasil->ijazah_s1;
			if(file_exists($file=FCPATH.'/assets/upload/images/ijazah_s1/'.$nama_ijazah_s1)){
				unlink($file);
			}
            $data7 = $this->db->query("DELETE FROM akte_kelahiran WHERE user = '$id' ");
        }
        if($transkrip_s1->num_rows()>0){
            $hasil=$transkrip_s1->row();
			$nama_transkrip_s1=$hasil->transkrip_s1;
			if(file_exists($file=FCPATH.'/assets/upload/images/transkrip_s1/'.$nama_transkrip_s1)){
				unlink($file);
			}
            $data8 = $this->db->query("DELETE FROM transkrip_nilai_s1 WHERE user = '$id' ");
        }
        if($un->num_rows()>0){
            $hasil=$un->row();
			$nama_un=$hasil->un;
			if(file_exists($file=FCPATH.'/assets/upload/images/nilai_un/'.$nama_un)){
				unlink($file);
			}
            $data9 = $this->db->query("DELETE FROM un WHERE user = '$id' ");
        }
        if($ijazah_d->num_rows()>0){
            $hasil=$ijazah_d->row();
			$nama_ijazah_d=$hasil->ijazah_d1_d2_d3;
			if(file_exists($file=FCPATH.'/assets/upload/images/ijazah_d/'.$nama_ijazah_d)){
				unlink($file);
			}
            $data10 = $this->db->query("DELETE FROM ijazah_d1_d2_d3 WHERE user = '$id' ");
        }
        if($transkrip_d->num_rows()>0){
            $hasil=$transkrip_d->row();
			$nama_transkrip_d=$hasil->transkrip_d1_d2_d3;
			if(file_exists($file=FCPATH.'/assets/upload/images/transkrip_d/'.$nama_transkrip_d)){
				unlink($file);
			}
            $data11 = $this->db->query("DELETE FROM transkrip_nilai_d1_d2_d3 WHERE user = '$id' ");
        }
        if($sk_pindah->num_rows()>0){
            $hasil=$sk_pindah->row();
			$nama_sk_pindah=$hasil->sk_pindah;
			if(file_exists($file=FCPATH.'/assets/upload/images/sk_pindah/'.$nama_sk_pindah)){
				unlink($file);
			}
            $data12 = $this->db->query("DELETE FROM sk_pindah WHERE user = '$id' ");
        }
        if($persyaratan_lain->num_rows()>0){
            $hasil=$persyaratan_lain->row();
			$nama_persyaratan_lain=$hasil->persyaratan_lain;
			if(file_exists($file=FCPATH.'/assets/upload/images/persyaratan_lain/'.$nama_persyaratan_lain)){
				unlink($file);
			}
            $data13 = $this->db->query("DELETE FROM persyaratan_lain WHERE user = '$id' ");
        }


		// $data = $this->db->query("DELETE FROM camaba WHERE id = '$id' ");
		// $data1 = $this->db->query("DELETE FROM invoice WHERE camaba = '$no_pendaftaran' ");
		// $data2 = $this->db->query("DELETE FROM pendaftaran WHERE id_user = '$id' ");
		// $data3 = $this->db->query("DELETE FROM ktp WHERE user = '$id' ");
		// $data4 = $this->db->query("DELETE FROM akte_kelahiran WHERE user = '$id' ");
		// $data5 = $this->db->query("DELETE FROM kk WHERE user = '$id' ");
        // $data6 = $this->db->query("DELETE FROM ijazah WHERE user = '$id' ");
        // $data7 = $this->db->query("DELETE FROM ijazah_s1 WHERE user = '$id' ");
        // $data8 = $this->db->query("DELETE FROM transkrip_nilai_s1 WHERE user = '$id' ");
        // $data9 = $this->db->query("DELETE FROM un WHERE user = '$id' ");
        // $data10 = $this->db->query("DELETE FROM ijazah_d1_d2_d3 WHERE user = '$id' ");
        // $data11 = $this->db->query("DELETE FROM transkrip_nilai_d1_d2_d3 WHERE user = '$id' ");
        // $data12 = $this->db->query("DELETE FROM sk_pindah WHERE user = '$id' ");
        // $data13 = $this->db->query("DELETE FROM persyaratan_lain WHERE user = '$id' ");
		$data14 = $this->db->query("DELETE FROM notifikasi WHERE user = '$id' ");
		$data15 = $this->db->query("DELETE FROM inbox WHERE pengirim = '$id' ");
		$data16 = $this->db->query("DELETE FROM inbox WHERE penerima = '$id' ");

		if ($data16) {
			$this->output_json(['status'=>true]);
		} else {
			$this->output_json(['status'=>false]);
		}

        // if($ktp->num_rows()>0){
		// 	$hasil=$ktp->row();
		// 	$nama_ktp=$hasil->ktp;
		// 	if(file_exists($file=FCPATH.'/assets/upload/images/ktp/'.$nama_ktp)){
		// 		unlink($file);
		// 	}
		// 	// $delete = $this->db->delete('ktp',array('user'=> $id));
        // } 
        // elseif ($kk->num_rows()>0){
        //     $hasil=$kk->row();
		// 	$nama_kk=$hasil->kk;
		// 	if(file_exists($file=FCPATH.'/assets/upload/images/kk/'.$nama_kk)){
		// 		unlink($file);
		// 	}
        // }
        // elseif ($akte_kelahiran->num_rows()>0){
        //     $hasil=$akte_kelahiran->row();
		// 	$nama_akte_kelahiran=$hasil->akte_kelahiran;
		// 	if(file_exists($file=FCPATH.'/assets/upload/images/akte_kelahiran/'.$nama_akte_kelahiran)){
		// 		unlink($file);
		// 	}
        // }
        // elseif ($ijazah->num_rows()>0){
        //     $hasil=$ijazah->row();
		// 	$nama_ijazah=$hasil->ijazah;
		// 	if(file_exists($file=FCPATH.'/assets/upload/images/ijazah/'.$ijazah)){
		// 		unlink($file);
		// 	}
        // }

        redirect(base_url().'master-akun');

    }

    public function fetch(){
            $ta= $this->User_model->getTahunAktif()->row();
            $output = '';
            $query = '';
            if($this->input->post('query'))
            {
            $query = $this->input->post('query');
            }
            $data = $this->User_model->fetch_data($query);
            if($data->num_rows() > 0)
            {
            foreach($data->result() as $row)
            {
                $jumlah = $this->db->query("SELECT COUNT(*) AS jumlah FROM pendaftaran WHERE jurusan IN (SELECT kode FROM jurusan WHERE kode = '$row->kode' ) and tahun = '$ta->tahun' ")->row();
                $output .= '
                <div class="col">
				<div class="card bg-white">
                <img src="https://media.istockphoto.com/id/1266264533/vector/students-spending-time-in-campus-near-college-building.jpg?s=612x612&w=0&k=20&c=FSBozH5W22Ji1E41y2b4vLML_OtOTxciZ33vsaO7n5w=" class="card-img-top" alt="Gambar Jurusan">
					<div class="card-body">
						<h5 class="card-title">'.$row->jurusan.'</h5>
						<p class="card-text"><h5 class="text-info">'.$jumlah->jumlah.'</h5> Pendaftar</p> <a href="'.base_url('pendaftaran-detail/'.$row->kode.'').'" class="btn btn-primary">Lihat Detail</a>
					</div>
				</div>
			</div>

                ';
            }
            }
            else
            {
            $output .= '<div class="alert alert-dark border-0 bg-dark alert-dismissible fade show py-2">
            <div class="d-flex align-items-center">
                <div class="font-35 text-white"><i class="bx bx-bell"></i>
                </div>
                <div class="ms-3">
                    <h6 class="mb-0 text-white">Data Jurusan Tidak ditemukan</h6>
                    <div class="text-white">Coba keyword Lain untuk menemukan Jurusan</div>
                </div>
            </div>
            
        </div>';
            }
            
            echo $output;
    }
    

    public function detail($id)
    {
        $cari=$this->User_model->getNamaJurusan($id)->num_rows() ;

        if ($cari < 1) {
        
            
        $this->session->set_flashdata('failed', 'Data Pendaftaran tidak ditemukan');
            
        redirect(base_url() . 'submission');

        } else { 
        $StartDate = date("d-m-Y", strtotime($this->Settings_model->gettahun()["awal"]. ' + 1 day'));
        $StopDate = date("d-m-Y", strtotime($this->Settings_model->gettahun()["akhir"]. ' + 1 day'));
        $start = new DateTime($StartDate);
        $end   = new DateTime($StopDate);
        $interval = DateInterval::createFromDateString('1 month');
        $datePeriod   = new DatePeriod($start, $interval, $end);

        
        $data['title'] =  $this->Settings_model->general()["app_name"];
        $data['tahun']= $this->Settings_model->gettahun()["tahun"] ;
        $thn=$this->Settings_model->gettahun()["tahun"] ;
		$data['jurusan'] = $this->db->get("jurusan");
        $data['nama_jurusan']=$this->User_model->getNamaJurusan($id)->row() ;
        
        $databulan=$this->User_model->getBulanan($id,$thn);
        

        foreach ($datePeriod as $date) {
            $ret[] = $date->format('F');
        }

        $chartData = [];
        foreach ($ret as $key => $value) {
            
           
            $dataKey = array_search($value, array_column($databulan, 'bulan'));
           
            if ($dataKey !== false) { // if we have the data in given date
                $chartData[] = $databulan[$dataKey]->jumlah;
            }else {
                //if there is no record, create default values
               $chartData[] = 0;
            }

            
            
        }
        
        $data['harian']=$this->User_model->getHarian($id,$thn) ;
        $data['bulan']=$ret;
        $data['pendaftaran']=$this->User_model->getDaftarDetail($id,$thn) ;
        $data['datachart']=$chartData ;
	    $data['ta']= $this->User_model->getTahunAktif()->row();
        $data['jumlah']=$this->User_model->getJumlahDaftar($id,$thn) ;
        
        $data['nama_jurusan']=$this->User_model->getNamaJurusan($id)->row() ;
        $data['kodeprodi']=$id ;


		
		$this->load->view('admin/page/detailpendaftaran',$data);
		
        }
    }

   

   

    function formpendaftaran($id){
        // panggil library yang kita buat sebelumnya yang bernama pdfgenerator
        $this->load->library('pdfgenerator');
        $cari = $this->db->get_where('pendaftaran', ['id_user' => $id])->num_rows(); 
        // $berkasfoto = $this->db->get_where('foto', ['user' => $id])->num_rows();
 
        //  if ($cari < 1 || $berkasfoto < 1) {
        //     $berkasfoto = 'default.png';
        //  } else {
        //     $berkasfoto1 = $this->db->get_where('foto', ['user' => $id])->row();
        //     $berkasfoto=$berkasfoto1->foto;

        //  }
       
         
        $cari = $this->db->get_where('pendaftaran', ['id_user' => $id]); 
        if ($cari->num_rows()<1) {
            redirect('my404');
        }
        $pendaftaran = $this->db->get_where('pendaftaran', ['id_user' => $id])->row(); 

        $provinsisekolah = $this->db->get_where('provinces', ['id' => $pendaftaran->prov])->row(); 
        $kabupatensekolah = $this->db->get_where('regencies', ['id' => $pendaftaran->kota])->row(); 
        $prodi_pilihan = $this->db->get_where('v_pilihan_prodi_pendaftar', ['id_user'=> $id])->row(); 
 
        // $this->db->select('nama_prodi');
        // $this->db->from('v_pilihan_prodi_pendaftar');
        // $this->where('id_user', '171');
        // $query=$this->db->get();
 
 
         
        // title dari pdf
        $this->data['title_pdf'] = 'Form Pendaftaran '.$pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang;
        $this->data['pendaftaran'] = $pendaftaran;
        // $this->data['foto'] = $berkasfoto;
 
        $this->data['provinsisekolah'] = $provinsisekolah;
        $this->data['kabupatensekolah'] = $kabupatensekolah;
        $this->data['prodi_pilihan'] = $prodi_pilihan;
 
        
        // filename dari pdf ketika didownload
        $file_pdf = 'Form Pendaftaran '.$pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang;
        // setting paper
        $paper = 'a4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
        
        $html = $this->load->view('admin/page/printformpendaftaran',$this->data, true);	    
        
        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
 
     }

     public function printlaporanpendaftaran(){
        $this->load->library('pdfgenerator');
        $this->load->helper('download');
        $tahun = $this->input->post('tahun_filter');
		$jurusan = $this->input->post('jurusan_filter');
        $min = $this->input->post('min');
		$max = $this->input->post('max');
       
        $this->data['pendaftaran'] =  $this->admin->getPrintDataLaporanPendaftaran($jurusan, $tahun, $min, $max)->result();
        $this->data['jurusan'] =  $jurusan;
        $this->data['tahun']= $tahun ;
        $this->data['min']= $min ;
        $this->data['max']= $max ;

        
        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Pendaftaran  '.$jurusan;
        // setting paper
        $paper = 'a4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
        
        $html = $this->load->view('admin/page/printlaporanpendaftaran',$this->data, true);	    
        
        // run dompdf
        $filenya = $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        
        force_download($file_pdf, $filenya);
     }


     public function statistik($id){
        $data['title'] =  $this->Settings_model->general()["app_name"];
        $data['tahun']= $this->Settings_model->gettahun()["tahun"] ;
        $thn=$this->Settings_model->gettahun()["tahun"] ;
		$data['jurusan'] = $this->db->get("jurusan");
        $data['nama_jurusan']=$this->User_model->getNamaJurusan($id)->row() ;
	    $data['ta']= $this->User_model->getTahunAktif()->row();
        $data['pendaftaran']=$this->User_model->getDaftarDetail($id,$thn) ;
        $data['kodeprodi']=$id ;


        // DATA CHART 1

        $data['laki']=$this->User_model->getLaki($id,$thn) ;
        $data['perempuan']=$this->User_model->getPerempuan($id,$thn) ;

        //DATA CHART 2

        $data['bekerja']=$this->User_model->getKerja($id,$thn) ;
        $data['tidakkerja']=$this->User_model->getTKerja($id,$thn) ;

        // DATA CHART 3
        $data['c3a']=$this->User_model->c3a($id,$thn) ;
        $data['c3b']=$this->User_model->c3b($id,$thn) ;
        $data['c3c']=$this->User_model->c3c($id,$thn) ;
        $data['c3d']=$this->User_model->c3d($id,$thn) ;

        // DATA CHART 4

        $StartDate = date("d-m-Y", strtotime($this->Settings_model->gettahun()["awal"]. ' + 1 day'));
        $StopDate = date("d-m-Y", strtotime($this->Settings_model->gettahun()["akhir"]. ' + 1 day'));
        $start = new DateTime($StartDate);
        $end   = new DateTime($StopDate);
        $interval = DateInterval::createFromDateString('1 month');
        $datePeriod   = new DatePeriod($start, $interval, $end);
        $databulan=$this->User_model->getBulanan($id,$thn);
        

        foreach ($datePeriod as $date) {
            $ret[] = $date->format('F');
        }

        $chartData = [];
        foreach ($ret as $key => $value) {
            
           
            $dataKey = array_search($value, array_column($databulan, 'bulan'));
           
            if ($dataKey !== false) { // if we have the data in given date
                $chartData[] = $databulan[$dataKey]->jumlah;
            }else {
                //if there is no record, create default values
               $chartData[] = 0;
            }

            
            
        }

        $data['bulan']=$ret;
        $data['datachart']=$chartData ;
       





		$this->load->view('admin/page/statistikpendaftaran',$data);


     }




    //  FUNGSI BARU KU

    public function list_pendaftaran(){

        $data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Pendaftaran',
			'subjudul'	=> 'Data Pendaftaran',
		];
		$data['jurusan'] = $this->db->get("jurusan")->result();
		$data['tahun'] = $this->db->get("tahun_akademik")->result();


		$this->load->view('admin/page/list_pendaftaran',$data);


    }
 
    public function datapendaftaran($jurusan = null, $tahun =null){
		$this->output_json($this->admin->getDataPendaftaran($jurusan, $tahun), false);
    }

    public function detail_list_pendaftaran($id){
        $data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Detail Pendaftaran',
			'subjudul'	=> $id,
		];
        $camaba= $this->db->get_where('camaba',['no_pendaftaran' => $id])->row();

        $caripendaftar = $this->db->get_where('pendaftaran',['no_pendaftaran' => $id])->row();
        $data['pendaftar']=$caripendaftar->jurusan;
		$data['detail'] = $this->admin->getDetailList($id)->row();
        $data['aktifitas']= $this->admin->getActDate($camaba->id)->result();
        $data['iduser']=$camaba->id;


		$this->load->view('admin/page/detaillistpendaftaran',$data);        
    }

    public function list_keuangan(){

        $data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Keuangan',
			'subjudul'	=> 'Keuangan pendaftaran',
		];
		$data['jurusan'] = $this->db->get("jurusan")->result();
		$data['tahun'] = $this->db->get("tahun_akademik")->result();
        $dataupdate = array(
            'is_read' => '1'
        );
        $this->db->where('type','notif');
        $insert=$this->db->update('notifadmin', $dataupdate);
		$this->load->view('admin/page/list_keuangan',$data);
    }

    public function datakeuangan($jurusan = null, $tahun =null){
		$this->output_json($this->admin->getDataKeuangan($jurusan, $tahun), false);
    }

    public function jumlahkeuangan(){
        
		$tahun = $this->input->post('tahun');
		$jurusan = $this->input->post('jurusan');
		$jumlah= $this->admin->getJumlahUang($jurusan, $tahun);
        $result = array(
			'total'    =>  '
            <div class="info-box bg-light">
            <span class="info-box-icon bg-green"><i class="ion ion-cash"></i></span>

            <div class="info-box-content">
              <span class="info-box-number">Rp. ' . $jumlah->total_uang . '</span>
              <span class="info-box-text">Total Keuangan</span>
              <strong>per tanggal</strong> ' . date("d/m/Y") . '
            </div>
            <!-- /.info-box-content -->
          </div> ',

			
		);

        echo json_encode($result);
		exit();
    }


    public function invoice($id)
    {
        $data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Invoice',
			'subjudul'	=> $id,
		];
        $data['invoice']=$this->admin->getInvoice($id);
       

		$this->load->view('admin/page/invoice',$data);

       
    }




    public function laporanpendaftaran(){

        $data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Laporan',
			'subjudul'	=> 'Laporan pendaftaran',
		];
		$data['jurusan'] = $this->db->get("jurusan")->result();
		$data['tahun'] = $this->db->get("tahun_akademik")->result();
		$this->load->view('admin/page/laporan_pendaftaran',$data);
    }

    public function datalaporanpendaftaran($jurusan = null, $tahun =null , $min = null, $max = null){
		$this->output_json($this->admin->getDataLaporanPendaftaran($jurusan, $tahun, $min, $max), false);
    }


    public function laporankeuangan(){

        $data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Laporan',
			'subjudul'	=> 'Laporan keuangan',
		];
		$data['jurusan'] = $this->db->get("jurusan")->result();
		$data['tahun'] = $this->db->get("tahun_akademik")->result();
		$this->load->view('admin/page/laporan_keuangan',$data);
    }

    public function datalaporankeuangan($jurusan = null, $tahun =null , $min = null, $max = null){
		$this->output_json($this->admin->getDataLaporanKeuangan($jurusan, $tahun, $min, $max), false);
    }


    public function printlaporankeuangan(){
        $this->load->library('pdfgenerator');
        $this->load->helper('download');
        $tahun = $this->input->post('tahun_filter');
		$jurusan = $this->input->post('jurusan_filter');
        $min = $this->input->post('min');
		$max = $this->input->post('max');
       
        $this->data['pendaftaran'] =  $this->admin->getPrintDataLaporanKeuangan($jurusan, $tahun, $min, $max)->result();
        $this->data['uang'] =  $this->admin->getLaporanJumlahUang($jurusan, $tahun, $min, $max)->row();
        $this->data['jurusan'] =  $jurusan;
        $this->data['tahun']= $tahun ;
        $this->data['min']= $min ;
        $this->data['max']= $max ;

        
        // filename dari pdf ketika didownload
        $file_pdf = 'Laporan Keuangan  '.$jurusan;
        // setting paper
        $paper = 'a4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        
        
        $html = $this->load->view('admin/page/printlaporankeuangan',$this->data, true);	    
        
        // run dompdf
        $filenya = $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        
        force_download($file_pdf, $filenya);
     }

     //  KONFIRMASI PEMBAYARRAN

    public function konfirmasi_pembayaran(){

        $dataupdate = array(
            'is_read' => '1'
        );
        $this->db->where('type','notif');
        $insert=$this->db->update('notifadmin', $dataupdate);
        

        $data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Keuangan',
			'subjudul'	=> 'Keuangan pendaftaran',
		];
		$data['jurusan'] = $this->db->get("jurusan")->result();
		$data['tahun'] = $this->db->get("tahun_akademik")->result();
        $dataupdate = array(
            'is_read' => '1'
        );
        $this->db->where('type','notif');
        $insert=$this->db->update('notifadmin', $dataupdate);
		$this->load->view('admin/page/konfirmasipembayaran',$data);
    }

    public function datakonfirmasi($jurusan = null, $tahun =null){
		$this->output_json($this->admin->getDataKonfirmasi($jurusan, $tahun), false);
    }

    public function konfirmact(){
        $id = $this->input->post('id');
        $tahun= $this->Settings_model->gettahun()["tahun"] ;
        $data = array(    
            'pay_status' => 'SETTLED',
            'tanggal_konfirmasi' => date('Y-m-d H:i:s'),
            'bulan' => date('F'),
            'tahun' => $tahun
        );

        $this->db->where('camaba', $id);
        $simpan = $this->db->update('invoice', $data);

		if ($simpan) {
			$this->output_json(['status'=>true]);
		} else {
			$this->output_json(['status'=>false]);
		}

    }


    
}
