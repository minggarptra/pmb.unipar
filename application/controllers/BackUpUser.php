<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Pusher\Pusher;
use Xendit\Xendit;
class User extends CI_Controller {

	public function __construct(){
        parent::__construct();
       
	
        $this->load->helper('date');
		$this->load->helper('url','file');	
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        if(!$this->session->userdata('login')){
           
                    redirect(base_url() . 'login');
               
        }

		$this->buktibayar = FCPATH . "assets/upload/images/buktipembayaran/";

    }
	public function index()
	{
        $caripendaftar = $this->db->get_where('pendaftaran',array('id_user' => $this->session->userdata('id')));
        
        $pendaftaran = $this->db->get_where('pendaftaran', ['id_user' => $this->session->userdata('id')])->num_rows(); 

        $caripendaftaran = $this->db->get_where('pendaftaran',array('id_user' => $this->session->userdata('id')));
        $data['pendaftar']=$caripendaftaran->row();

        if ($pendaftaran < 1) {
            $data['stepdaftar'] = '0';
        } else {
            $data['stepdaftar'] = '1';
        } 
        $user = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row();    
        $invoice = $this->db->get_where('invoice', ['camaba' => $user->no_pendaftaran])->num_rows(); 
        if ($invoice < 1) {
            $data['steppembayaran'] = '0';
        } else {
            $cari = $this->db->get_where('invoice', ['camaba' => $user->no_pendaftaran])->row();
            if ($cari->pay_status == 'SETTLED') {
                $data['steppembayaran'] = '1';
            }
            else{
                $data['steppembayaran'] = '0';
            }
        }
        $ijazah = $this->db->get_where('ijazah', ['user' => $this->session->userdata('id')])->num_rows();    
        $kk = $this->db->get_where('kk', ['user' => $this->session->userdata('id')])->num_rows();    
        $foto = $this->db->get_where('foto', ['user' => $this->session->userdata('id')])->num_rows();
        $ktp = $this->db->get_where('ktp', ['user' => $this->session->userdata('id')])->num_rows();
        $akte_kelahiran = $this->db->get_where('akte_kelahiran', ['user' => $this->session->userdata('id')])->num_rows();
        $ijazah_d = $this->db->get_where('ijazah_d1_d2_d3', ['user' => $this->session->userdata('id')])->num_rows();
        $ijazah_s1 = $this->db->get_where('ijazah_s1', ['user' => $this->session->userdata('id')])->num_rows();    
        $transkrip_d = $this->db->get_where('transkrip_nilai_d1_d2_d3', ['user' => $this->session->userdata('id')])->num_rows();
        $transkrip_s1 = $this->db->get_where('transkrip_nilai_s1', ['user' => $this->session->userdata('id')])->num_rows();
        $sk_pindah = $this->db->get_where('sk_pindah', ['user' => $this->session->userdata('id')])->num_rows();
        $persyaratan_lain = $this->db->get_where('persyaratan_lain', ['user' => $this->session->userdata('id')])->num_rows();
        $un = $this->db->get_where('un', ['user' => $this->session->userdata('id')])->num_rows();
        
        if ($data['pendaftar']->jurusan == '09') {
            if ($ktp < 1 || $kk < 1 ||  $akte_kelahiran < 1  || $ijazah < 1 || $ijazah_s1 < 1 || $transkrip_s1 < 1 ) {
                $data['stepberkas'] = '0';
            } else {
                $data['stepberkas'] = '1';
            }
        }else{
            if ($ktp < 1 || $kk < 1 ||  $akte_kelahiran < 1  || $ijazah < 1 || $ijazah_d < 0 || $transkrip_d < 0 || $un < 1 || $sk_pindah < 0 || $persyaratan_lain < 0 ) {
                $data['stepberkas'] = '0';
            } else {
                $data['stepberkas'] = '1';
            }
        }
        // if ($ijazah < 1 || $kk < 1 || $foto < 1 || $ktp < 1  || $akte_kelahiran < 1 || $un < 1 || $ijazah_s1 < 1 ) {
        //                     $data['stepberkas'] = '0';
        // } else {
        //                     $data['stepberkas'] = '1';
        // }
        $data['pendaftar']=$caripendaftar->row();
        $data['user'] = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row();    
        $data['jurusan'] = $this->db->get_where('jurusan', ['kode' => $data['user']->jurusan])->row();    
        $data['title'] =  $this->Settings_model->general()["app_name"];
        $data['tahun']= $this->Settings_model->gettahun()["tahun"] ;
		$this->load->view('user/main',$data);
	}

    // PEMBAYARAN

    public function pembayaran(){
        $user = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();   
        $invoice =  $this->db->get_where('invoice', ['camaba' => $user['no_pendaftaran']])->row_array();  
        $jurusan =  $this->db->get_where('jurusan', ['kode' => $invoice['jurusan']])->row();  

        // DATA KE FORM
        $data['user'] =$user;
        $data['order']=$invoice;
        $data['jurusan']=$jurusan;
        $data['title'] =  $this->Settings_model->general()["app_name"];
		$this->load->view('user/pembayaran',$data);
    }

    public function paysuccess(){
        $user = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row();   
        $cariidinvoice = $this->db->get_where('invoice', ['camaba' => $user->no_pendaftaran])->row();  
        $tahun= $this->Settings_model->gettahun()["tahun"] ;

        // AMBIL DATA XENDIT UNTUK SET STATUS PEMBAYARAN

        $key = $this->Settings_model->general()["xenditkey"];
        Xendit::setApiKey($key);
        $getInvoice = \Xendit\Invoice::retrieve($cariidinvoice->invoice_code);
        $databayar = [
            'pay_status' => $getInvoice['status'],
            'bulan' => date('F'),
            'tahun' => $tahun
        ];
        $datanotif =[
            'user' => $this->session->userdata('id'),
            'notifikasi' => 'Pembayaran Berhasil',
            'is_read' => '0'
        ];
        $datastatus = [
            'pembayaran' =>  1,
        ];
        $this->db->where('user',$this->session->userdata('id') );
        $this->db->update('status_pendaftaran', $datastatus);
        $this->db->insert('notifikasi', $datanotif);
        // PUSHER
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
        $datapusher['message'] = 'notif';
        $pusher->trigger('my-channel', 'my-event', $datapusher);
        $this->db->where('invoice_code', $cariidinvoice->invoice_code);
		$this->db->update('invoice', $databayar);      
        $datanotifadmin =[
           
            'notifikasi' => 'Pembayaran baru selesai',
            'is_read' => '0',
            'type' => 'notif'
        ];
        $this->db->insert('notifadmin', $datanotifadmin);
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

        redirect('pembayaran');
        
       
    }

    // AKSI UPLOAD BERKAS
    public function upload_berkas(){
        $user = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row();
        // $camaba = $this->db->get_where('camaba')  
        
        $caripendaftar = $this->db->get_where('pendaftaran',array('id_user' => $this->session->userdata('id')));
        $data['pendaftar']=$caripendaftar->row();

        $cari = $this->db->get_where('invoice', ['camaba' => $user->no_pendaftaran])->row();
            // if ($cari->pay_status == 'SETTLED') {
                $data['user'] = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();    
                $berkasktp = $this->db->get_where('ktp', ['user' => $this->session->userdata('id')])->num_rows();
                $berkaskk = $this->db->get_where('kk', ['user' => $this->session->userdata('id')])->num_rows();
                $berkasakte_kelahiran = $this->db->get_where('akte_kelahiran', ['user' => $this->session->userdata('id')])->num_rows();
                $berkasijazah = $this->db->get_where('ijazah', ['user' => $this->session->userdata('id')])->num_rows();
                // $berkasfoto = $this->db->get_where('foto', ['user' => $this->session->userdata('id')])->num_rows();
                $berkasun = $this->db->get_where('un', ['user' => $this->session->userdata('id')])->num_rows();
                $berkasijazah_d = $this->db->get_where('ijazah_d1_d2_d3', ['user' => $this->session->userdata('id')])->num_rows();
                $berkastranskrip_d = $this->db->get_where('transkrip_nilai_d1_d2_d3', ['user' => $this->session->userdata('id')])->num_rows();
                $berkassk_pindah = $this->db->get_where('sk_pindah', ['user' => $this->session->userdata('id')])->num_rows();
                $berkaspersyaratan_lain = $this->db->get_where('persyaratan_lain', ['user' => $this->session->userdata('id')])->num_rows();
                $berkasijazah_s1 = $this->db->get_where('ijazah_s1', ['user' => $this->session->userdata('id')])->num_rows();
                $berkastranskrip_s1 = $this->db->get_where('transkrip_nilai_s1', ['user' => $this->session->userdata('id')])->num_rows();

                if ($data['pendaftar']->jurusan == '09') {
                    if ($berkasktp < 1) {
                        $data['tokenktp']= 0;
                    } else {
                        $tokenktp = $this->db->get_where('ktp', ['user' => $this->session->userdata('id')])->row();
                        $data['tokenktp']= $tokenktp->user;
                        $data['ktp']= $tokenktp->ktp;
                    }
                    if ($berkaskk < 1) {
                        $data['tokenkk']= 0;
                    } else {
                        $tokenkk = $this->db->get_where('kk', ['user' => $this->session->userdata('id')])->row();
                        $data['tokenkk']= $tokenkk->user;
                        $data['kk']= $tokenkk->kk;
                    }
                    if ($berkasakte_kelahiran < 1) {
                        $data['token_akte_kelahiran']= 0;
                    } else {
                        $token_akte_kelahiran = $this->db->get_where('akte_kelahiran', ['user' => $this->session->userdata('id')])->row();
                        $data['token_akte_kelahiran']= $token_akte_kelahiran->user;
                        $data['akte_kelahiran']= $token_akte_kelahiran->akte_kelahiran;
                    } 
                    if ($berkasijazah < 1) {
                        $data['token']= 0;
                    } else {
                        $token= $this->db->get_where('ijazah', ['user' => $this->session->userdata('id')])->row();
                        $data['token']= $token->user;
                        $data['ijazah']= $token->ijazah;
                    }
    
                    if ($berkasijazah_s1 < 1) {
                        $data['token_ijazah_s1']= 0;
                    } else {
                        $token_ijazah_s1= $this->db->get_where('ijazah_s1', ['user' => $this->session->userdata('id')])->row();
                        $data['token_ijazah_s1']= $token_ijazah_s1->user;
                        $data['ijazah_s1']= $token_ijazah_s1->ijazah_s1;
                    }
                    if ($berkastranskrip_s1 < 1) {
                        $data['token_transkrip_s1']= 0;
                    } else {
                        $token_transkrip_s1 = $this->db->get_where('transkrip_nilai_s1', ['user' => $this->session->userdata('id')])->row();
                        $data['token_transkrip_s1']= $token_transkrip_s1->user;
                        $data['transkrip_s1']= $token_transkrip_s1->transkrip_s1;
                    }
                }else{
                    if ($berkasktp < 1) {
                        $data['tokenktp']= 0;
                    } else {
                        $tokenktp = $this->db->get_where('ktp', ['user' => $this->session->userdata('id')])->row();
                        $data['tokenktp']= $tokenktp->user;
                        $data['ktp']= $tokenktp->ktp;
                    }
                    if ($berkaskk < 1) {
                        $data['tokenkk']= 0;
                    } else {
                        $tokenkk = $this->db->get_where('kk', ['user' => $this->session->userdata('id')])->row();
                        $data['tokenkk']= $tokenkk->user;
                        $data['kk']= $tokenkk->kk;
                    }
                    if ($berkasakte_kelahiran < 1) {
                        $data['token_akte_kelahiran']= 0;
                    } else {
                        $token_akte_kelahiran = $this->db->get_where('akte_kelahiran', ['user' => $this->session->userdata('id')])->row();
                        $data['token_akte_kelahiran']= $token_akte_kelahiran->user;
                        $data['akte_kelahiran']= $token_akte_kelahiran->akte_kelahiran;
                    } 
                    if ($berkasijazah < 1) {
                        $data['token']= 0;
                    } else {
                        $token= $this->db->get_where('ijazah', ['user' => $this->session->userdata('id')])->row();
                        $data['token']= $token->user;
                        $data['ijazah']= $token->ijazah;
                    }
                    // if ($berkasfoto < 1) {
                    //     $data['tokenfoto']= 0;
                    // } else {
                    //     $tokenfoto = $this->db->get_where('foto', ['user' => $this->session->userdata('id')])->row();
                    //     $data['tokenfoto']= $tokenfoto->user;
                    //     $data['foto']= $tokenfoto->foto;
                    // }
                    
                    
                    if ($berkasun < 1) {
                        $data['token_un']= 0;
                    } else {
                        $token_un = $this->db->get_where('un', ['user' => $this->session->userdata('id')])->row();
                        $data['token_un']= $token_un->user;
                        $data['un']= $token_un->un;
                    }
                    if ($berkasijazah_d < 1) {
                        $data['token_ijazah_d'] = 0;
                    } else {
                        $token_ijazah_d = $this->db->get_where('ijazah_d1_d2_d3', ['user' => $this->session->userdata('id')])->row();
                        $data['token_ijazah_d'] = $token_ijazah_d->user;
                        $data['ijazah_d'] = $token_ijazah_d->ijazah_d1_d2_d3;
                    }
                    if ($berkastranskrip_d < 1) {
                        $data['token_transkrip_d']= 0;
                    } else {
                        $token_transkrip_d = $this->db->get_where('transkrip_nilai_d1_d2_d3', ['user' => $this->session->userdata('id')])->row();
                        $data['token_transkrip_d']= $token_transkrip_d->user;
                        $data['transkrip_d']= $token_transkrip_d->transkrip_d1_d2_d3;
                    }
                    if ($berkassk_pindah < 1) {
                        $data['token_sk_pindah']= 0;
                    } else {
                        $token_sk_pindah = $this->db->get_where('sk_pindah', ['user' => $this->session->userdata('id')])->row();
                        $data['token_sk_pindah']= $token_sk_pindah->user;
                        $data['sk_pindah']= $token_sk_pindah->sk;
                    }
                    if ($berkaspersyaratan_lain < 1) {
                        $data['token_persyaratan_lain']= 0;
                    } else {
                        $token_persyaratan_lain = $this->db->get_where('persyaratan_lain', ['user' => $this->session->userdata('id')])->row();
                        $data['token_persyaratan_lain']= $token_persyaratan_lain->user;
                        $data['persyaratan_lain']= $token_persyaratan_lain->persyaratan_lain;
                    }
                }
                // if ($berkasktp < 1) {
                //     $data['tokenktp']= 0;
                // } else {
                //     $tokenktp = $this->db->get_where('ktp', ['user' => $this->session->userdata('id')])->row();
                //     $data['tokenktp']= $tokenktp->user;
                //     $data['ktp']= $tokenktp->ktp;
                // }
                // if ($berkaskk < 1) {
                //     $data['tokenkk']= 0;
                // } else {
                //     $tokenkk = $this->db->get_where('kk', ['user' => $this->session->userdata('id')])->row();
                //     $data['tokenkk']= $tokenkk->user;
                //     $data['kk']= $tokenkk->kk;
                // }
                // if ($berkasakte_kelahiran < 1) {
                //     $data['token_akte_kelahiran']= 0;
                // } else {
                //     $token_akte_kelahiran = $this->db->get_where('akte_kelahiran', ['user' => $this->session->userdata('id')])->row();
                //     $data['token_akte_kelahiran']= $token_akte_kelahiran->user;
                //     $data['akte_kelahiran']= $token_akte_kelahiran->akte_kelahiran;
                // } 
                // if ($berkasijasah < 1) {
                //     $data['token']= 0;
                // } else {
                //     $token= $this->db->get_where('ijazah', ['user' => $this->session->userdata('id')])->row();
                //     $data['token']= $token->user;
                //     $data['ijazah']= $token->ijazah;
                // }
                // // if ($berkasfoto < 1) {
                // //     $data['tokenfoto']= 0;
                // // } else {
                // //     $tokenfoto = $this->db->get_where('foto', ['user' => $this->session->userdata('id')])->row();
                // //     $data['tokenfoto']= $tokenfoto->user;
                // //     $data['foto']= $tokenfoto->foto;
                // // }
                
                
                // if ($berkasun < 1) {
                //     $data['token_un']= 0;
                // } else {
                //     $token_un = $this->db->get_where('un', ['user' => $this->session->userdata('id')])->row();
                //     $data['token_un']= $token_un->user;
                //     $data['un']= $token_un->un;
                // }
                // if ($berkasijazah_d < 1) {
                //     $data['token_ijazah_d'] = 0;
                // } else {
                //     $token_ijazah_d = $this->db->get_where('ijazah_d1_d2_d3', ['user' => $this->session->userdata('id')])->row();
                //     $data['token_ijazah_d'] = $token_ijazah_d->user;
                //     $data['ijazah_d'] = $token_ijazah_d->ijazah;
                // }
                // // if ($berkasijazah_d < 1) {
                // //     $data['token_ijazah_d']= 0;
                // // } else {
                // //     $token_ijazah_d = $this->db->get_where('ijazah_d1_d2_d3', ['user' => $this->session->userdata('id')])->row();
                // //     $data['token_ijazah_d']= $token_ijazah_d->user;
                // //     $data['ijazah_d']= $token_ijazah_d->ijazah_d;
                // // }
                // if ($berkastranskrip_d < 1) {
                //     $data['token_transkrip_d']= 0;
                // } else {
                //     $token_transkrip_d = $this->db->get_where('transkrip_nilai_d1_d2_d3', ['user' => $this->session->userdata('id')])->row();
                //     $data['token_transkrip_d']= $token_transkrip_d->user;
                //     $data['transkrip_d']= $token_transkrip_d->transkrip;
                // }
                // if ($berkassk_pindah < 1) {
                //     $data['token_sk_pindah']= 0;
                // } else {
                //     $token_sk_pindah = $this->db->get_where('sk_pindah', ['user' => $this->session->userdata('id')])->row();
                //     $data['token_sk_pindah']= $token_sk_pindah->user;
                //     $data['sk_pindah']= $token_sk_pindah->sk;
                // }
                // if ($berkaspersyaratan_lain < 1) {
                //     $data['token_persyaratan_lain']= 0;
                // } else {
                //     $token_persyaratan_lain = $this->db->get_where('persyaratan_lain', ['user' => $this->session->userdata('id')])->row();
                //     $data['token_persyaratan_lain']= $token_persyaratan_lain->user;
                //     $data['persyaratan_lain']= $token_persyaratan_lain->persyaratan_lain;
                // }

                // if ($berkasijazah_s1 < 1) {
                //     $data['token_ijazah_s1']= 0;
                // } else {
                //     $token_ijazah_s1 = $this->db->get_where('ijazah_s1', ['user' => $this->session->userdata('id')])->row();
                //     $data['token_ijazah_s1']= $token_ijazah_s1->user;
                //     $data['ijazah_s1']= $token_ijazah_s1->ijazah;
                // }
                // if ($berkastranskrip_s1 < 1) {
                //     $data['token_transkrip_s1']= 0;
                // } else {
                //     $token_transkrip_s1 = $this->db->get_where('transkrip_nilai_s1', ['user' => $this->session->userdata('id')])->row();
                //     $data['token_transkrip_s1']= $token_transkrip_s1->user;
                //     $data['transkrip_s1']= $token_transkrip_s1->transkrip;
                // }
                
                $data['title'] =  $this->Settings_model->general()["app_name"];
                $data['jurusan']= $this->db->get('jurusan');
                // $cari = $this->db->get_where('invoice', ['user' => $this->session->userdata('id')])->num_rows();
                $this->load->view('user/uploadberkas',$data);
            // }
            // else{
            //     redirect('pembayaran');
            // }
        
       
        
    }

    // KTP

    function upload_ktp(){

        $config['upload_path']   = FCPATH.'/assets/upload/images/ktp/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_ktp');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('ktp',array(
                'user' =>  $this->session->userdata('id'),
                'ktp'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Kartu Tanda Penduduk berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'kk' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
            
        }else{
            echo 'gagal';
        }
	}


    function do_init_galleryktp()
    {
  
        $result = $this->db->get_where('ktp', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

    function delete_ktp($id){
		//Ambil token foto		
		$ktp=$this->db->get_where('ktp',array('user'=>$id));
		if($ktp->num_rows()>0){
			$hasil=$ktp->row();
			$nama_ktp=$hasil->ktp;
			if(file_exists($file=FCPATH.'/assets/upload/images/ktp/'.$nama_ktp)){
				unlink($file);
			}
			$delete = $this->db->delete('ktp',array('user'=> $id));
            if ($delete) {
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Kartu Tanda Penduduk berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'kk' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                $this->session->set_flashdata('success', 'KTP berhasil di hapus');
                redirect(base_url() . 'upload-berkas');
            }
		}
	}

    // KARTU KELUARGA
    function upload_kk(){

        $config['upload_path']   = FCPATH.'/assets/upload/images/kk/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_kk');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('kk',array(
                'user' =>  $this->session->userdata('id'),
                'kk'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Kartu Keluarga berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'kk' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
            
        }


	}


    function do_init_gallerykk()
    {
  
        $result = $this->db->get_where('kk', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

    function delete_kk($id){
		//Ambil token foto		
		$kk=$this->db->get_where('kk',array('user'=>$id));
		if($kk->num_rows()>0){
			$hasil=$kk->row();
			$nama_kk=$hasil->kk;
			if(file_exists($file=FCPATH.'/assets/upload/images/kk/'.$nama_kk)){
				unlink($file);
			}
			$delete = $this->db->delete('kk',array('user'=> $id));
            if ($delete) {
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Kartu Keluarga berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'kk' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                $this->session->set_flashdata('success', 'Kartu Keluarga berhasil di hapus');
                redirect(base_url() . 'upload-berkas');
            }
		}
	}

    // AKTE KELAHIRAN
    function upload_akte_kelahiran(){

        $config['upload_path']   = FCPATH.'/assets/upload/images/akte_kelahiran/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_akte_kelahiran');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('akte_kelahiran',array(
                'user' =>  $this->session->userdata('id'),
                'akte_kelahiran'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Kartu Keluarga berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'kk' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
            
        }else{
            echo 'gagal';
        }
	}


    function do_init_galleryakte_kelahiran()
    {
  
        $result = $this->db->get_where('akte_kelahiran', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

    function delete_akte_kelahiran($id){
		//Ambil token foto		
		$akte_kelahiran=$this->db->get_where('akte_kelahiran',array('user'=>$id));
		if($akte_kelahiran->num_rows()>0){
			$hasil=$akte_kelahiran->row();
			$nama_akte_kelahiran=$hasil->akte_kelahiran;
			if(file_exists($file=FCPATH.'/assets/upload/images/akte_kelahiran/'.$nama_akte_kelahiran)){
				unlink($file);
			}
			$delete = $this->db->delete('akte_kelahiran',array('user'=> $id));
            if ($delete) {
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Akte Kelahiran berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'kk' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                $this->session->set_flashdata('success', 'Akte Kelahiran berhasil di hapus');
                redirect(base_url() . 'upload-berkas');
            }
		}
	}
    
    function upload_ijazah(){

        $config['upload_path']   = FCPATH.'assets/upload/images/ijazah_sma_smk/';
       
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

       
        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_foto');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('ijazah',array(
                'user' =>  $this->session->userdata('id'),
                'ijazah_s1'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Ijazah berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'ijazah' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
        }
        else{

            echo 'gagal';
        }
	}


    function do_init_gallery()
    {
  
        $result = $this->db->get_where('ijazah', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
        
    }

    function delete_ijazah($id){

		//Ambil token foto
		$ijazah=$this->db->get_where('ijazah',array('user'=>$id));
		if($ijazah->num_rows()>0){
			$hasil=$ijazah->row();
			$nama_ijazah=$hasil->ijazah;
			if(file_exists($file=FCPATH.'/assets/upload/images/ijazah_sma_smk/'.$nama_ijazah)){
				unlink($file);
			}
			$delete = $this->db->delete('ijazah',array('user'=> $id));
            if ($delete) {
                $this->session->set_flashdata('success', 'Ijazah SMA/SMK/Sederajat berhasil di hapus');
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Ijazah SMA/SMK/Sederajat  berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'ijazah' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                redirect(base_url() . 'upload-berkas');

                # code...
            }
		}
	}
    // FOTO

    // function upload_foto(){

    //     $config['upload_path']   = FCPATH.'/assets/upload/images/foto/';
    //     $config['allowed_types'] = 'jpg|png';
    //     $this->load->library('upload');
	// 	$this->upload->initialize($config);

    //     if($this->upload->do_upload('userfile')){
    //     	$token=$this->input->post('token_foto');
    //     	$nama=$this->upload->data('file_name');
    //     	$this->db->insert('foto',array(
    //             'user' =>  $this->session->userdata('id'),
    //             'foto'=> $nama,
    //             'token'=>  $token
            
    //         ));
    //         $datanotif =[
    //             'user' => $this->session->userdata('id'),
    //             'notifikasi' => 'Input Foto berhasil',
    //             'is_read' => '0'
    //         ];
            
    //         // $datastatus = [
    //         //     'foto' =>  1,
                
    //         // ];
    //         // $this->db->where('user',$this->session->userdata('id') );
    //         // $this->db->update('status_pendaftaran', $datastatus);
           
    //         $this->db->insert('notifikasi', $datanotif);
    //         $options = array(
    //             'cluster' => 'ap1',
    //             'useTLS' => true
    //         );
    //         $pusher = new Pusher(
    //             'b6ddec25ff4b5cc46b4f', //ganti dengan App_key pusher Anda
    //             '3f075b004850be476e54', //ganti dengan App_secret pusher Anda
    //             '1522214', //ganti dengan App_key pusher Anda
    //             $options
    //         );
    //         $datapusher['message'] = 'notif';      
    //     }
	// }


    // function do_init_galleryfoto()
    // {
  
    //     $result = $this->db->get_where('foto', ['user' => $this->session->userdata('id')])->result();
    //     header('Content-Type: application/json');
    //     echo json_encode( $result );
    // }

    // function delete_foto($id){

	// 	//Ambil token foto
		
	// 	$foto=$this->db->get_where('foto',array('user'=>$id));


	// 	if($foto->num_rows()>0){
	// 		$hasil=$foto->row();
	// 		$nama_foto=$hasil->foto;
	// 		if(file_exists($file=FCPATH.'/assets/upload/images/foto/'.$nama_foto)){
	// 			unlink($file);
	// 		}
	// 		$delete = $this->db->delete('foto',array('user'=> $id));
    //         if ($delete) {

    //             $datanotif =[
    //                 'user' => $this->session->userdata('id'),
    //                 'notifikasi' => 'Hapus Foto berhasil',
    //                 'is_read' => '0'
    //             ];
        
    //             // $datastatus = [
    //             //     'foto' =>  0,
                    
    //             // ];
    //             // $this->db->where('user',$this->session->userdata('id') );
    //             // $this->db->update('status_pendaftaran', $datastatus);
               
    //             $this->db->insert('notifikasi', $datanotif);
    //             $options = array(
    //                 'cluster' => 'ap1',
    //                 'useTLS' => true
    //             );
    //             $pusher = new Pusher(
    //                 'b6ddec25ff4b5cc46b4f', //ganti dengan App_key pusher Anda
    //                 '3f075b004850be476e54', //ganti dengan App_secret pusher Anda
    //                 '1522214', //ganti dengan App_key pusher Anda
    //                 $options
    //             );
         
    //             $datapusher['message'] = 'notif';

    //             $this->session->set_flashdata('success', 'foto berhasil di hapus');
            
    //             redirect(base_url() . 'upload-berkas');

    //             # code...
    //         }

	// 	}
	// }

    

    // NILAI UN
    function upload_un(){

        $config['upload_path']   = FCPATH.'/assets/upload/images/nilai_un/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_un');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('un',array(
                'user' =>  $this->session->userdata('id'),
                'un'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Nilai Ujian Nasional berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'kk' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
            
        }else{
            echo 'gagal';
        }
	}


    function do_init_gallery_un()
    {
  
        $result = $this->db->get_where('un', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

    function delete_un($id){
		//Ambil token foto		
		$un=$this->db->get_where('un',array('user'=>$id));
		if($un->num_rows()>0){
			$hasil=$un->row();
			$nama_un=$hasil->un;
			if(file_exists($file=FCPATH.'/assets/upload/images/nilai_un/'.$nama_un)){
				unlink($file);
			}
			$delete = $this->db->delete('un',array('user'=> $id));
            if ($delete) {
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Nilai Ujian Nasional berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'kk' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                $this->session->set_flashdata('success', 'Nilai Ujian Nasional berhasil di hapus');
                redirect(base_url() . 'upload-berkas');
            }
		}
	}

    // IJAZAH D1/D2/D3
    function upload_ijazah_d(){

        $config['upload_path']   = FCPATH.'/assets/upload/images/ijazah_d/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_ijazah_d');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('ijazah_d1_d2_d3',array(
                'user' =>  $this->session->userdata('id'),
                'ijazah_d1_d2_d3'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Ijazah D1/D2/D3 berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'kk' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
            
        }else{
            echo 'gagal';
        }
	}


    function do_init_galleryijazah_d()
    {
  
        $result = $this->db->get_where('ijazah_d1_d2_d3', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

    function delete_ijazah_d($id){
		//Ambil token foto		
		$ijazah_d=$this->db->get_where('ijazah_d1_d2_d3',array('user'=>$id));
		if($ijazah_d->num_rows()>0){
			$hasil=$ijazah_d->row();
			$nama_ijazah_d=$hasil->ijazah_d;
			if(file_exists($file=FCPATH.'/assets/upload/images/ijazah_d/'.$nama_ijazah_d)){
				unlink($file);
			}
			$delete = $this->db->delete('ijazah_d1_d2_d3',array('user'=> $id));
            if ($delete) {
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Ijazah D1/D2/D3 berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'kk' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                $this->session->set_flashdata('success', 'Ijazah D1/D2/D3 berhasil di hapus');
                redirect(base_url() . 'upload-berkas');
            }
		}
	}

    // TRANSKRIP NILAI D1/D2/D3 
    function upload_transkrip_d(){

        $config['upload_path']   = FCPATH.'/assets/upload/images/transkrip_d/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_transkrip_d');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('transkrip_nilai_d1_d2_d3',array(
                'user' =>  $this->session->userdata('id'),
                'transkrip_d1_d2_d3'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Transkrip Nilai D1/D2/D3 berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'kk' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
            
        }


	}


    function do_init_gallerytranskrip_d()
    {
  
        $result = $this->db->get_where('transkrip_nilai_d1_d2_d3', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

    function delete_transkrip_d($id){
		//Ambil token foto		
		$transkrip_d=$this->db->get_where('transkrip_nilai_d1_d2_d3',array('user'=>$id));
		if($transkrip_d->num_rows()>0){
			$hasil=$transkrip_d->row();
			$nama_transkrip_d=$hasil->transkrip_d;
			if(file_exists($file=FCPATH.'/assets/upload/images/transkrip_d/'.$nama_transkrip_d)){
				unlink($file);
			}
			$delete = $this->db->delete('transkrip_nilai_d1_d2_d3',array('user'=> $id));
            if ($delete) {
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Transkrip Nilai D1/D2/D3 berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'kk' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                $this->session->set_flashdata('success', 'Transkrip Nilai D1/D2/D3 berhasil di hapus');
                redirect(base_url() . 'upload-berkas');
            }
		}
	}

    // SURAT KETERANGAN PINDAH
    function upload_sk_pindah(){

        $config['upload_path']   = FCPATH.'/assets/upload/images/sk_pindah/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_sk_pindah');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('sk_pindah',array(
                'user' =>  $this->session->userdata('id'),
                'sk'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Surat Keterangan Pindah berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'kk' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
            
        }


	}


    function do_init_gallerysk_pindah()
    {
  
        $result = $this->db->get_where('sk_pindah', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

    function delete_sk_pindah($id){
		//Ambil token foto		
		$sk_pindah=$this->db->get_where('sk_pindah',array('user'=>$id));
		if($sk_pindah->num_rows()>0){
			$hasil=$sk_pindah->row();
			$nama_sk_pindah=$hasil->sk_pindah;
			if(file_exists($file=FCPATH.'/assets/upload/images/sk_pindah/'.$nama_sk_pindah)){
				unlink($file);
			}
			$delete = $this->db->delete('sk_pindah',array('user'=> $id));
            if ($delete) {
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Surat Keterangan Pindah berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'kk' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                $this->session->set_flashdata('success', 'Surat Keterangan Pindah berhasil di hapus');
                redirect(base_url() . 'upload-berkas');
            }
		}
	}

    // PERSYARATAN LAINNYA
    function upload_persyaratan_lain(){

        $config['upload_path']   = FCPATH.'/assets/upload/images/persyaratan_lain/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_persyaratan_lain');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('persyaratan_lain',array(
                'user' =>  $this->session->userdata('id'),
                'persyaratan_lain'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Persyaratan Lain berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'kk' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
            
        }


	}


    function do_init_gallerypersyaratan_lain()
    {
  
        $result = $this->db->get_where('persyaratan_lain', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

    function delete_persyaratan_lain($id){
		//Ambil token foto		
		$persyaratan_lain=$this->db->get_where('persyaratan_lain',array('user'=>$id));
		if($persyaratan_lain->num_rows()>0){
			$hasil=$persyaratan_lain->row();
			$nama_persyaratan_lain=$hasil->persyaratan_lain;
			if(file_exists($file=FCPATH.'/assets/upload/images/persyaratan_lain/'.$nama_persyaratan_lain)){
				unlink($file);
			}
			$delete = $this->db->delete('persyaratan_lain',array('user'=> $id));
            if ($delete) {
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Persyaratan Lain berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'kk' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                $this->session->set_flashdata('success', 'Persyaratan Lain berhasil di hapus');
                redirect(base_url() . 'upload-berkas');
            }
		}
	}

    // IJAZAH S1
    function upload_ijazah_s1(){

        $config['upload_path']   = FCPATH.'/assets/upload/images/ijazah_s1/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_ijazah_s1');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('ijazah_s1',array(
                'user' =>  $this->session->userdata('id'),
                'ijazah_s1'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Ijazah S1 berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'kk' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
            
        }


	}


    function do_init_galleryijazah_s1()
    {
  
        $result = $this->db->get_where('ijazah_s1', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

    function delete_ijazah_s1($id){
		//Ambil token foto		
		$ijazah_s1=$this->db->get_where('ijazah_s1',array('user'=>$id));
		if($ijazah_s1->num_rows()>0){
			$hasil=$ijazah_s1->row();
			$nama_ijazah_s1=$hasil->ijazah_s1;
			if(file_exists($file=FCPATH.'/assets/upload/images/ijazah_s1/'.$nama_ijazah_s1)){
				unlink($file);
			}
			$delete = $this->db->delete('ijazah_s1',array('user'=> $id));
            if ($delete) {
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Ijazah S1 berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'kk' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                $this->session->set_flashdata('success', 'Ijazah S1 berhasil di hapus');
                redirect(base_url() . 'upload-berkas');
            }
		}
	}

    // // BATAS
    // function upload_ijazah_s1(){

    //     $config['upload_path']   = FCPATH.'/assets/upload/images/ijazah_s1/';
    //     $config['allowed_types'] = 'pdf';
    //     $this->load->library('upload');
	// 	$this->upload->initialize($config);

    //     if($this->upload->do_upload('userfile')){
    //     	$token=$this->input->post('token_ijazah_s1');
    //     	$nama=$this->upload->data('file_name');
    //     	$this->db->insert('ijazah_s1',array(
    //             'user' =>  $this->session->userdata('id'),
    //             'ijazah'=> $nama,
    //             'token'=>  $token
            
    //         ));
    //         $datanotif =[
    //             'user' => $this->session->userdata('id'),
    //             'notifikasi' => 'Input Ijazah S1 berhasil',
    //             'is_read' => '0'
    //         ];
    //         // $datastatus = [
    //         //     'kk' =>  1,
                
    //         // ];
    //         // $this->db->where('user',$this->session->userdata('id') );
    //         // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
    //         $this->db->insert('notifikasi', $datanotif);
    //         $options = array(
    //             'cluster' => 'ap1',
    //             'useTLS' => true
    //         );
    //         $pusher = new Pusher(
    //             'b6ddec25ff4b5cc46b4f', //ganti dengan App_key pusher Anda
    //             '3f075b004850be476e54', //ganti dengan App_secret pusher Anda
    //             '1522214', //ganti dengan App_key pusher Anda
    //             $options
    //         );
     
    //         $datapusher['message'] = 'notif';
            
    //     }


	// }


    // function do_init_galleryijazah_s1()
    // {
  
    //     $result = $this->db->get_where('ijazah_s1', ['user' => $this->session->userdata('id')])->result();
    //     header('Content-Type: application/json');
    //     echo json_encode( $result );
    // }

    // function delete_ijazah_s1($id){
	// 	//Ambil token foto		
	// 	$ijazah_s1=$this->db->get_where('ijazah_s1',array('user'=>$id));
	// 	if($ijazah_s1->num_rows()>0){
	// 		$hasil=$ijazah_s1->row();
	// 		$nama_ijazah_s1=$hasil->ijazah_s1;
	// 		if(file_exists($file=FCPATH.'/assets/upload/images/ijazah_s1/'.$nama_ijazah_s1)){
	// 			unlink($file);
	// 		}
	// 		$delete = $this->db->delete('ijazah_s1',array('user'=> $id));
    //         if ($delete) {
    //             $datanotif =[
    //                 'user' => $this->session->userdata('id'),
    //                 'notifikasi' => 'Hapus Ijazah S1 berhasil',
    //                 'is_read' => '0'
    //             ];
    //             // $datastatus = [
    //             //     'kk' =>  0,
                    
    //             // ];
    //             // $this->db->where('user',$this->session->userdata('id') );
    //             // $this->db->update('status_pendaftaran', $datastatus);
               
               
    //             $this->db->insert('notifikasi', $datanotif);
    //             $options = array(
    //                 'cluster' => 'ap1',
    //                 'useTLS' => true
    //             );
    //             $pusher = new Pusher(
    //                 'b6ddec25ff4b5cc46b4f', //ganti dengan App_key pusher Anda
    //                 '3f075b004850be476e54', //ganti dengan App_secret pusher Anda
    //                 '1522214', //ganti dengan App_key pusher Anda
    //                 $options
    //             );
         
    //             $datapusher['message'] = 'notif';
    //             $this->session->set_flashdata('success', 'Ijazah S1 berhasil di hapus');
    //             redirect(base_url() . 'upload-berkas');
    //         }
	// 	}
	// }

    // TRANSKRIP NILAI S1
    function upload_transkrip_s1(){

        $config['upload_path']   = FCPATH.'/assets/upload/images/transkrip_s1/';
        $config['allowed_types'] = 'pdf';
        $this->load->library('upload');
		$this->upload->initialize($config);

        if($this->upload->do_upload('userfile')){
        	$token=$this->input->post('token_transkrip_s1');
        	$nama=$this->upload->data('file_name');
        	$this->db->insert('transkrip_nilai_s1',array(
                'user' =>  $this->session->userdata('id'),
                'transkrip_s1'=> $nama,
                'token'=>  $token
            
            ));
            $datanotif =[
                'user' => $this->session->userdata('id'),
                'notifikasi' => 'Input Transkrip Nilai S1 berhasil',
                'is_read' => '0'
            ];
            // $datastatus = [
            //     'kk' =>  1,
                
            // ];
            // $this->db->where('user',$this->session->userdata('id') );
            // $this->db->update('status_pendaftaran', $datastatus);
           
    
           
            $this->db->insert('notifikasi', $datanotif);
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
     
            $datapusher['message'] = 'notif';
            
        }else{
            echo 'gagal';
        }
	}


    function do_init_gallerytranskrip_s1()
    {
  
        $result = $this->db->get_where('transkrip_nilai_s1', ['user' => $this->session->userdata('id')])->result();
        header('Content-Type: application/json');
        echo json_encode( $result );
    }

    function delete_transkrip_s1($id){
		//Ambil token foto		
		$transkrip_s1=$this->db->get_where('transkrip_nilai_s1',array('user'=>$id));
		if($transkrip_s1->num_rows()>0){
			$hasil=$transkrip_s1->row();
			$nama_transkrip_s1=$hasil->transkrip_s1;
			if(file_exists($file=FCPATH.'/assets/upload/images/transkrip_s1/'.$nama_transkrip_s1)){
				unlink($file);
			}
			$delete = $this->db->delete('transkrip_nilai_s1',array('user'=> $id));
            if ($delete) {
                $datanotif =[
                    'user' => $this->session->userdata('id'),
                    'notifikasi' => 'Hapus Transkrip Nilai S1 berhasil',
                    'is_read' => '0'
                ];
                // $datastatus = [
                //     'kk' =>  0,
                    
                // ];
                // $this->db->where('user',$this->session->userdata('id') );
                // $this->db->update('status_pendaftaran', $datastatus);
               
               
                $this->db->insert('notifikasi', $datanotif);
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
         
                $datapusher['message'] = 'notif';
                $this->session->set_flashdata('success', 'Transkrip Nilai S1 berhasil di hapus');
                redirect(base_url() . 'upload-berkas');
            }
		}
	}

    // AKSI DATA MAHASISWA
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


    public function datapendaftaran()
    {
        $user = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row();    

        $cari = $this->db->get_where('invoice', ['camaba' => $user->no_pendaftaran])->row();
            // if ($cari->pay_status == 'SETTLED') {
                $this->load->model('Model_dynamic_dependent', 'Mdependent');
                $data['provinsi'] = $this->Mdependent->get_provinsi();
                $data['user'] = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();    
                $data['title'] =  $this->Settings_model->general()["app_name"];
                $data['jurusan']= $this->db->get('jurusan');
                $caripendadftaran = $this->db->get_where('pendaftaran',array('id_user' => $this->session->userdata('id')));
                $data['data_daftar']=$caripendadftaran->row();
                if ($caripendadftaran->num_rows() < 1) 
                {	
                    $this->load->view('user/formdata',$data);
                }
                else
                {   
                
                    $this->load->view('user/datapendaftaran',$data);
                }
            // }
            // else{
            //     redirect('pembayaran');
            // }
       
    }

    function input_pendaftaran(){

        //DATA PRIBADI
        $nama_depan= $this->input->post('nama_depan');
        $nama_belakang= $this->input->post('nama_belakang');
        $nik = $this->input->post('nik');
        $nisn = $this->input->post('nisn');
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
        $size_almet = $this->input->post('size_almet');
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
        $user = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();   
        $data=array(
            'id_user' => $this->session->userdata('id'),
            'no_pendaftaran' => $user['no_pendaftaran'],
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
            'jurusan'=>$user['jurusan'],
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
        $datanotif =[
            'user' => $this->session->userdata('id'),
            'notifikasi' => 'Input form pendaftaran berhasil',
            'is_read' => '0'
        ];
  
        $this->db->insert('notifikasi', $datanotif);
        $insert = $this->db->insert('pendaftaran',$data);
        if ($insert) {
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
            $datapusher['message'] = 'notif';
            $pusher->trigger('my-channel', 'my-event', $datapusher);
        echo 'success';
        } else {
            echo 'gagal';
        }
    }


    public function editdatapendaftaran(){

        $this->load->model('Model_dynamic_dependent', 'Mdependent');
		$data['provinsi'] = $this->Mdependent->get_provinsi();
        $data['user'] = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();    
        $data['title'] =  $this->Settings_model->general()["app_name"];
        $data['jurusan']= $this->db->get('jurusan');
        $caripendadftaran = $this->db->get_where('pendaftaran',array('id_user' => $this->session->userdata('id')));
        $data['data_daftar']=$caripendadftaran->row();
       
            $this->load->view('user/formeditdata',$data);
        
    }


    public function simpaneditpendaftaran(){
        
        // //DATA PRIBADI
        // $nama_depan= $this->input->post('nama_depan');
        // $nama_belakang= $this->input->post('nama_belakang');
        // $tanggal_lahir= $this->input->post('tanggal_lahir');
        // $tempat_lahir= $this->input->post('tempat_lahir');
        // $nohp= $this->input->post('nohp');
        // $golongan_darah= $this->input->post('golongan_darah');
        // $jenis_kelamin= $this->input->post('jenis_kelamin');
        // $wn= $this->input->post('wn');
        // $pekerjaan= $this->input->post('pekerjaan');
        // $agama= $this->input->post('agama');
        // $anak_ke= $this->input->post('anak_ke');
        // $jumlah_saudara= $this->input->post('jumlah_saudara');
        // $alamat= $this->input->post('alamat');

        // //DATA SEKOLAH
        // $asal_sekolah= $this->input->post('asal_sekolah');
        // $tahun_lulus= $this->input->post('tahun_lulus');
        // $provinsi= $this->input->post('provinsi');
        // $kabupaten= $this->input->post('kabupaten');
        // $alamat_sekolah= $this->input->post('alamat_sekolah');

        // //DATAORANGTUA
        // $nama_ortu=$this->input->post('nama_ortu');
        // $nohp_ortu=$this->input->post('nohp_ortu');
        // $agama_ortu=$this->input->post('agama_ortu');
        // $pekerjaan_ortu=$this->input->post('pekerjaan_ortu');
        // $pendidikan_ortu=$this->input->post('pendidikan_ortu');
        // $penghasilan_ortu=$this->input->post('penghasilan_ortu');
        // $alamat_ortu=$this->input->post('alamat_ortu');
        //DATA PRIBADI
        $nama_depan= $this->input->post('nama_depan');
        $nama_belakang= $this->input->post('nama_belakang');
        $nik = $this->input->post('nik');
        $nisn = $this->input->post('nisn');
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
        $size_almet = $this->input->post('size_almet');
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
        $user = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();
        $data=array(
            'id_user' => $this->session->userdata('id'),
            'no_pendaftaran' => $user['no_pendaftaran'],
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
            'jurusan'=>$user['jurusan'],
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
        $datanotif =[
            'user' => $this->session->userdata('id'),
            'notifikasi' => 'Edit form pendaftaran berhasil',
            'is_read' => '0'
        ];
  
        $this->db->insert('notifikasi', $datanotif);
        $this->db->where('id_user',$this->session->userdata('id'));
        $insert = $this->db->update('pendaftaran',$data);
        if ($insert) {
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
            $datapusher['message'] = 'notif';
            $pusher->trigger('my-channel', 'my-event', $datapusher);
            echo 'success';
        } else {
            echo 'gagal';
        }


    }

    public function printformpendaftaran(){
    $this->load->library('pdfgenerator');
       $cari = $this->db->get_where('pendaftaran', ['id_user' => $this->session->userdata('id')])->num_rows(); 
       $berkasfoto = $this->db->get_where('foto', ['user' => $this->session->userdata('id')])->num_rows();

        if ($cari < 1 || $berkasfoto < 1) {
            redirect(base_url() . 'error');
        } else {
            # code...
        
       $berkasfoto = $this->db->get_where('foto', ['user' => $this->session->userdata('id')])->row();
        
       $pendaftaran = $this->db->get_where('pendaftaran', ['id_user' => $this->session->userdata('id')])->row(); 
       $provinsisekolah = $this->db->get_where('provinces', ['id' => $pendaftaran->prov])->row(); 
       $kabupatensekolah = $this->db->get_where('regencies', ['id' => $pendaftaran->kota])->row();
       $prodi_pilihan = $this->db->get_where('v_pilihan_prodi_pendaftar', ['id_user'=> $this->session->userdata('id')])->row(); 
      



        
       // title dari pdf
       $this->data['title_pdf'] = 'Form Pendaftaran '.$pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang;
       $this->data['pendaftaran'] = $pendaftaran;
       $this->data['foto'] = $berkasfoto->foto;
       $this->data['prodi_pilihan'] = $prodi_pilihan;
       $this->data['provinsisekolah'] = $provinsisekolah;
       $this->data['kabupatensekolah'] = $kabupatensekolah;

       
       // filename dari pdf ketika didownload
       $file_pdf = 'Form Pendaftaran '.$pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang;
       // setting paper
       $paper = 'a4';
       //orientasi paper potrait / landscape
       $orientation = "portrait";
       
       
       $html = $this->load->view('user/printpendaftaran',$this->data, true);	    
       
       // run dompdf
       $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
        }
    }

    // Form Domisili

    // public function printformdomisili(){
    //     $this->load->library('pdfgenerator');
    //     $cari = $this->db->get_where('pendaftaran', ['id_user' => $this->session->userdata('id')])->num_rows(); 
    
    //    $pendaftaran = $this->db->get_where('pendaftaran', ['id_user' => $this->session->userdata('id')])->row(); 
    
    //    // title dari pdf
    //    $this->data['title_pdf'] = 'Form Domisili '.$pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang;
    //    $this->data['pendaftaran'] = $pendaftaran;
    //    $this->data['prodi_pilihan'] = $prodi_pilihan;

    //    // filename dari pdf ketika didownload
    //    $file_pdf = 'Form Domisili '.$pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang;
    //    // setting paper
    //    $paper = 'a4';
    //    //orientasi paper potrait / landscape
    //    $orientation = "portrait";
       
       
    //    $html = $this->load->view('user/printdomisili',$this->data, true);	    
       
    //    // run dompdf
    //    $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    //     // }
    // }

    // public function printformpernyataan(){
    //     $this->load->library('pdfgenerator');
    //     // $cari = $this->db->get_where('pendaftaran', ['id_user' => $this->session->userdata('id')])->num_rows(); 
        
    //    $pendaftaran = $this->db->get_where('pendaftaran', ['id_user' => $this->session->userdata('id')])->row(); 
    
    //    $this->data['title_pdf'] = 'Form Domisili '.$pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang;
    //    $this->data['pendaftaran'] = $pendaftaran;
    //    $this->data['prodi_pilihan'] = $prodi_pilihan;

    //    // filename dari pdf ketika didownload
    //    $file_pdf = 'Form Pernyataan '.$pendaftaran->nama_depan.' '.$pendaftaran->nama_belakang;
    //    // setting paper
    //    $paper = 'a4';
    //    //orientasi paper potrait / landscape
    //    $orientation = "portrait";
       
       
    //    $html = $this->load->view('user/printpernyataan',$this->data, true);	    
       
    //    // run dompdf
    //    $this->pdfgenerator->generate($html, $file_pdf,$paper,$orientation);
    //     // }
    // }

    public function faqs(){
        $data['user'] = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();    
        $data['title'] =  $this->Settings_model->general()["app_name"];
        $data['jurusan']= $this->db->get('jurusan');

       $html = $this->load->view('user/faqs',$data);	    


    }


    // NOTIFIKASI HEADER

    function headernotifikasi(){
        $this->db->limit(5);
        $this->db->order_by("date", "DESC");
        $notifikasi = $this->db->get_where('notifikasi', ['user' => $this->session->userdata('id'),'is_read' => '0'])->result();
        $now = time();
        $data= []  ;                                 
        foreach ($notifikasi as $i =>  $value) {
            $data[$i]['notifikasi'] = $value->notifikasi;
            $data[$i]['waktu'] =    timespan(strtotime($value->date), $now) . ' ago';
        }
        echo json_encode($data);
	
    }


    function clearNotif(){
        $datan=[
            'is_read' => 1,
        ];
        $this->db->where('user', $this->session->userdata('id'));
        $this->db->update('notifikasi', $datan);
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
        $datapusher['message'] = 'notif';
        $pusher->trigger('my-channel', 'my-event', $datapusher);
    }


    function notifikasi(){

        $this->load->library('pagination'); 

        //set read 1 kalau lihat semua notifikasi
        $datan=[
            'is_read' => '1'
        ];
        $this->db->where('user',$this->session->userdata('id'));
        $this->db->update('notifikasi', $datan);


        $data['user'] = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();    
        $data['title'] =  $this->Settings_model->general()["app_name"];

        $config['base_url'] = site_url('notifikasi'); //site url
        $config['total_rows'] = $this->db->get_where('notifikasi', ['user' => $this->session->userdata('id')])->num_rows(); //total row
        $config['per_page'] = 2;  //show record per halaman
        $config["uri_segment"] = 2;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
    
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<nav><ul class="pagination justify-content-center flex-wrap">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="page-item"><a data-pjax class="d-none">';
        $config['num_tag_close']    = '</a></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a data-pjax class="page-link">';
        $config['cur_tag_close']    = '<a data-pjax class="sr-only">(current)</a></a></li>';
        $config['next_tag_open']    = '<li class="page-item"><a data-pjax class="page-link">';
        $config['next_tagl_close']  = '<a data-pjax aria-hidden="true">&raquo;</a></a></li>';
        $config['prev_tag_open']    = '<li class="page-item"><a data-pjax class="page-link">';
        $config['prev_tagl_close']  = '</a>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><a data-pjax class="page-link">';
        $config['first_tagl_close'] = '</a></li>';
        $config['last_tag_open']    = '<li class="page-item"><a data-pjax class="page-link">';
        $config['last_tagl_close']  = '</a></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(1)) ? $this->uri->segment(2) : 0;

        $this->db->order_by('date', 'DESC');
        $data['notifikasi'] = $this->db->get_where('notifikasi', ['user' => $this->session->userdata('id')],$config["per_page"],$data["page"])->result();
        $data['pagination'] = $this->pagination->create_links();
         $this->load->view('user/notifikasi',$data);

      




    }



    // SETTING PROFILE

    public function settingprofile(){
        $data['user'] = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();    
        $data['title'] =  $this->Settings_model->general()["app_name"];
        $data['jurusan']= $this->db->get('jurusan');

       $html = $this->load->view('user/settingprofile',$data);
    }


    public function setprofproses(){

                 $user = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();
                if(password_verify($this->input->post('oldpassword'), $user['password'])){
                        $pass = password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT);
                        $this->db->set('password', $pass);
                        $this->db->where('id', $this->session->userdata('id'));
                        $this->db->update('camaba');
                        $datanotif =[
                            'user' => $this->session->userdata('id'),
                            'notifikasi' => 'Password berhasil di ubah',
                            'is_read' => '0'
                        ];
                        $this->db->insert('notifikasi', $datanotif);
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
                 
                        $datapusher['message'] = 'notif';
                        echo 'success';
                    
                }
                else
                {
                    echo 'salah';
                }


    }



    // CHATING

    function message(){
        
        $data['user'] = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();    
        $data['title'] =  $this->Settings_model->general()["app_name"];
        $data['jurusan']= $this->db->get('jurusan');
        $data['foto_admin']= $this->db->get_where('admin',['id'=> 1])->row();

        $this->load->view('user/message',$data);    
    }

    function getMessage(){
        $id= $this->session->userdata('id');
         $message= $this->db->query("SELECT  * from inbox where pengirim = '$id' OR penerima ='$id'  ORDER BY realtime ASC ")->result();
         $datan=[
             'is_read' => '1'
         ];
         $this->db->where('user',$this->session->userdata('id'));
         $this->db->update('notifikasi', $datan);
         echo json_encode($message);
     }


     function sendmessage(){
        $data =[
            'penerima' => 'admin',
            'pengirim' =>  $this->session->userdata('id'),
            'waktu' => date('d M Y').', '.date('H:i:s'),
            'isi'=> $this->input->post('pesan'),
            'terkirim' => 'terkirim',
            'realtime' => date('Y-m-d H:i:s'),
            'status'=>0
        ];

        $datanotif =[
           
            'notifikasi' => 'Ada Pesan Masuk Baru',
            'is_read' => '0',
            'type' => 'chat'
        ];
        $simpan = $this->db->insert('inbox', $data);
        if ($simpan) {
            $this->db->insert('notifadmin', $datanotif);
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
     
            $datapusher['message'] = 'chatadmin';
            $pusher->trigger('my-channel', 'my-event', $datapusher);
    
            echo 'success';
        } else {
            echo 'error';
        }

        
       
    }



    
    // FUNGSI PEMBAYARAN

    public function showdatabayar()
    {
        $user = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();   
        $invoice =  $this->db->get_where('invoice', ['camaba' => $user['no_pendaftaran']])->row_array();  
   
                $hasil = array(
                    'bukti' => $invoice['bukti'],
                    'status' => $invoice['pay_status'],
                    'id' => $invoice['camaba'],
                    
                );
        
        echo json_encode($hasil);
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

    public function simpanbayar(){

        $user = $this->db->get_where('camaba', ['id' => $this->session->userdata('id')])->row_array();   
        $cariold =  $this->db->get_where('invoice', ['camaba' => $user['no_pendaftaran']])->row(); 
        if (!empty($_FILES['buktibayar']['name'])) {
            $oldimg = $cariold->bukti;
            if ($oldimg) {
                if (is_file($this->buktibayar . $oldimg)) {
                    unlink($this->buktibayar . $oldimg);
                }
            }
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
            $data = array(    
                'bukti' => $gambar,
                'pay_status' => 'PENDING'
            );

            $this->db->where('camaba', $user['no_pendaftaran']);
            $simpan = $this->db->update('invoice', $data);
            $datanotifadmin =[
           
                'notifikasi' => 'Ada Konfirmasi Pembayaran Baru',
                'is_read' => '0',
                'type' => 'notif'
            ];
            $this->db->insert('notifadmin', $datanotifadmin);
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
            if ($simpan) {
                echo 'success';
            } else {
                echo 'error';
            }


        }
    }
}
