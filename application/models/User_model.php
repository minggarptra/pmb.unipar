<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Xendit\Xendit;
class User_model extends CI_Model {

    // DASHBOARD ADMIN
    public function gettotalregist($thn){
        $query= $this->db->query("SELECT COUNT(*) AS jumlah FROM camaba  WHERE  camaba.`tahun` = '$thn' ");
        return $query->row();
    }

    public function getTotalDaftar($thn){
        $query= $this->db->query("SELECT COUNT(*) AS jumlah FROM pendaftaran  WHERE  pendaftaran.`tahun` = '$thn' ");
        return $query->row();
    }

    public function totalKeuangan($thn){
        $query= $this->db->query("SELECT  SUM(total_all) AS jumlah FROM invoice WHERE tahun = '$thn' and pay_status='SETTLED' ");

        return $query->row();
    }


    // AKHIR DASHBOARD ADMIN

    public function getUsers($number,$offset){
        $this->db->order_by('id', 'desc');
        return $this->db->get('user',$number,$offset);
    }

    public function getDaftarDetail($id,$thn){
        $query= $this->db->query("SELECT pendaftaran.* FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn'");

        return $query->result();
    }

    public function getJurusan(){
        $query= $this->db->query("SELECT jurusan , kode FROM jurusan");

        return $query->result();
    }

    

    public function getJumlahDaftar($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' GROUP BY bulan");
        return $query->result();
    }

    
    public function getPendaftaranAll($thn){
        $query= $this->db->query("SELECT COUNT(*) AS jumlah, pendaftaran.`jurusan`, jurusan.`jurusan` AS prodi FROM pendaftaran , jurusan WHERE  pendaftaran.`tahun` = '$thn' AND 
        jurusan.`kode` = pendaftaran.`jurusan`
         GROUP BY 
        pendaftaran.`jurusan`");

        return $query->result_object();

    }


    public function getHarian($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah,hari FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' GROUP BY hari");

        return $query->result();
    }

    public function getBulanan($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah,bulan FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' GROUP BY bulan");

        return $query->result_object();
    }

    public function getKeuanganBulanan($thn){
        $query= $this->db->query("SELECT  SUM(total_all) AS jumlah,bulan  FROM invoice WHERE tahun = '$thn' and pay_status='SETTLED'  GROUP BY bulan");

        return $query->result_object();
    }

    public function getKeuanganBulananJurusan($id,$thn){
        $query= $this->db->query("SELECT  SUM(total_all) AS jumlah,bulan  FROM invoice WHERE tahun = '$thn' and jurusan='$id' and pay_status='SETTLED'  GROUP BY bulan");

        return $query->result_object();
    }
    
    public function keuanganDetail($id,$thn){
        $query= $this->db->query("SELECT pendaftaran.`no_pendaftaran`,pendaftaran.`nama_depan`,pendaftaran.`nama_belakang`, invoice.`total_all`,invoice.`bulan`,invoice.`user`
        FROM pendaftaran,invoice
        WHERE pendaftaran.`jurusan` = invoice.`jurusan` AND invoice.tahun = '$thn' AND 
        invoice.jurusan = '$id' and pay_status='SETTLED' AND pendaftaran.`id_user` = invoice.`user` ");

        return $query->result();
    }

    // CHART 1
    public function getLaki($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' AND jk='laki-laki' ");

        return $query->row();
    }

    public function getPerempuan($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' AND jk='perempuan' ");

        return $query->row();
    }

    // CHART 2

    public function getKerja($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' AND pekerjaan='bekerja' ");

        return $query->row();
    }

    public function getTKerja($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' AND pekerjaan='tidak bekerja' ");

        return $query->row();
    }

    // CHART 3

    public function c3a($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' AND penghasilan_ortu='<1000000' ");
        return $query->row();
    }

    public function c3b($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' AND penghasilan_ortu='1000000-2500000' ");
        return $query->row();
    }

    public function c3c($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' AND penghasilan_ortu='250000-5000000' ");
        return $query->row();
    }

    public function c3d($id,$thn){
        $query= $this->db->query("SELECT Count(*) as jumlah FROM pendaftaran WHERE pendaftaran.`jurusan` = '$id' and pendaftaran.`tahun` = '$thn' AND penghasilan_ortu='>5000000' ");
        return $query->row();
    }



    public function create_slug($title)
    {
        $extract = explode(" ", $title, 6);
        unset($extract[5]);
        $combine = implode(" ", $extract);
        $lowercase = strtolower($combine);
        $preslug = url_title($lowercase);

        $slug = $preslug;

        $this->db->like('slug', $preslug, 'after');
        $checkslug = $this->db->get('berita');
        if ($checkslug->num_rows() > 0) {
            $num = (int)$checkslug->num_rows() + 1;
            $slug = $preslug . "-" . $num;
        }

        return $slug;
    }
    

    public function getProfile(){
        $id = $this->session->userdata('id');
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function getNamaJurusan($id){
        
        return $this->db->get_where('jurusan', ['kode' => $id]);
    }

    public function getTahunAktif(){
        
        return $this->db->get_where('tahun_akademik', ['aktif' => '1']);
    }

    public function getOrder(){
        $id = $this->session->userdata('id');
        $this->db->where('status !=', 4);
        $this->db->where('user', $id);
        $this->db->order_by('id', 'desc');
        return $this->db->get('invoice');
    }

    public function getFinishOrder(){
        $id = $this->session->userdata('id');
        $this->db->where('status', 4);
        $this->db->where('user', $id);
        $this->db->order_by('id', 'desc');
        return $this->db->get('invoice');
    }

    public function getOrderByInvoice($id){
        $user = $this->session->userdata('id');
        return $this->db->get_where('invoice', ['invoice_code' => $id, 'user' => $user])->row_array();
    }

    public function getOrderByUser($id){
        $user = $this->session->userdata('id');
        $cari = $this->db->get_where('invoice', ['user' => $user])->num_rows();
        if ($cari < 1) {
            return 1;
        } else {
            return $this->db->get_where('invoice', [ 'user' => $user])->row_array();

        }
        
    }

    public function register($thn){
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

            $name = addslashes(htmlspecialchars($this->input->post('name', true)));
            $password = $this->input->post('password');
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
                'tahun'=>$thn
            ];
            $insert= $this->db->insert('camaba', $data);
            if ($insert){
                echo 'success';

            }

             // EMAIL
            
             $this->load->library('email');
             $config['charset'] = 'utf-8';
             $config['useragent'] = $this->Settings_model->general()["app_name"];
             $config['smtp_crypto'] = $this->Settings_model->general()["crypto_smtp"];
             $config['protocol'] = 'smtp';
             $config['mailtype'] = 'html';
             $config['smtp_host'] = $this->Settings_model->general()["host_mail"];
             $config['smtp_port'] = $this->Settings_model->general()["port_mail"];
             $config['smtp_timeout'] = '5';
             $config['smtp_user'] = $this->Settings_model->general()["account_gmail"];
             $config['smtp_pass'] = $this->Settings_model->general()["pass_gmail"];
             $config['crlf'] = "\r\n";
             $config['newline'] = "\r\n";
             $config['wordwrap'] = TRUE;
             $data['name']=$name;
             $data['mail']=$email;
             $data['token']=$token;
             $message=$this->load->view('auth/email',$data,true);
             $this->email->initialize($config);
             $this->email->from($this->Settings_model->general()["account_gmail"], $this->Settings_model->general()["app_name"]);
             $this->email->to($email);
             $this->email->subject('Verifikasi Alamat Email '.$this->Settings_model->general()["app_name"]);
             $this->email->message($message);
             $this->email->send();
             

     // XENDIT BUAT INVOICE
         $key = $this->Settings_model->general()["xenditkey"];
         Xendit::setApiKey($key);
         $carijurusan = $this->db->get_where('jurusan',array('kode' => $jurusan));
         $params = [ 
             'external_id' => $no_pendaftaran,
             'amount' => $carijurusan->row()->biaya,
             'description' => 'Pendaftaran Program Studi '.$carijurusan->row()->jurusan,
             'invoice_duration' => 86400,
             'customer' => [
                 'given_names' => $name,
                 'surname' => $name,
                 'email' => $email,
                 'mobile_number' => $format_number,
             ],
             'customer_notification_preference' => [
                 'invoice_created' => [
                     'whatsapp',
                     'sms',
                     'email',
                     'viber'
                 ],
                 'invoice_reminder' => [
                     'whatsapp',
                     'sms',
                     'email',
                     'viber'
                 ],
                 'invoice_paid' => [
                     'whatsapp',
                     'sms',
                     'email',
                     'viber'
                 ],
                 'invoice_expired' => [
                     'whatsapp',
                     'sms',
                     'email',
                     'viber'
                 ]
             ],
             'success_redirect_url' => base_url('pembayaran-sukses'),
             'failure_redirect_url' => base_url('user'),
             'currency' => 'IDR',
             'payment_methods' => ['BCA', 'BNI', 'BSI', 'BRI', 'MANDIRI', 'PERMATA', 'ALFAMART', 'INDOMARET']
           ];
         
           $createInvoice = \Xendit\Invoice::create($params);
           $url = $createInvoice['invoice_url'];
           $status=  $createInvoice['status'];
 
         $invoicedata = [
             'camaba' => $no_pendaftaran,
             'invoice_code' =>  $createInvoice['id'],
             'total_all' => $carijurusan->row()->biaya,
             'jurusan' => $jurusan,
             'link_pay' => $url,  
             'pay_status' => $status,  
         ];

        $this->db->insert('invoice', $invoicedata);


           
       

//             // kirim confirmasi WHATSAPP

//             $veriflink = base_url().'auth/verification?email='.$email.'&token='.$token;
//             $kirim = '<a href="'.$veriflink.'" class="btn btn-warning btn-sm bedit"  ><i class="fa fa-edit nav-icon"></i></a>';
            
            

//             $namaweb =  $this->Settings_model->general()["app_name"];
//             $pesan = "𝗧𝗲𝗿𝗶𝗺𝗮𝗸𝗮𝘀𝗶𝗵 𝘁𝗲𝗹𝗮𝗵 𝗺𝗲𝗻𝗱𝗮𝗳𝘁𝗮𝗿 𝗱𝗶
// $namaweb,
// berikut kode verifikasi anda: 
// *$tokenwa*";
//             $body = ['text'=>$pesan,];
//             $cek = $this->db->get_where('device', array('status' => 'authenticated'),1)->row();
            

           
            
            
//             $templateButtons = array(
//                 ['index'=> 1, 'urlButton'=> ['displayText'=> '⭐ Verifikasi Pendaftarn Anda', 'url'=> $veriflink]],               
//             );

//             $templateMessage = array (
//                 'text' => "Hi. Ini adalah link %0a verifikasi pendfataran anda",
//                 'footer'=> $namaweb,
//                 'templateButtons'=> $templateButtons
//             );
            
//             $kirimwa = $this->curl->simple_post($this->api . '/chats/send?id='.$cek->name,[
// 				'receiver' => $format_number,
// 				'message' => $body
//             ], array(CURLOPT_BUFFERSIZE => 10));
            
            




             
        }
    }
    }

    public function getProductByInvoice($id){
        $user = $this->session->userdata('id');
        return $this->db->get_where('transaction', ['user' => $user, 'id_invoice' => $id]);
    }

    public function uploadPhoto(){
        $config['upload_path'] = FCPATH . "assets/upload/images/profile/";
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['file_name'] = round(microtime(true)*1000);

        $this->load->library('upload');
		$this->upload->initialize($config);
        if($this->upload->do_upload('poto')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }else{
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function updateProfile($file){
        if($file == ""){
            $name = $this->input->post('name');
            $this->db->set('name', $name);
            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update('user');
        }else{
          
            $this->db->set('photo_profile', $file);
            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update('user');
        }
    }

    public function updateProfileAdmin($file){
        if($file == ""){
            $name = $this->input->post('name');
            $this->db->set('name', $name);
            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update('admin');
        }else{
          
            $this->db->set('photo_profile', $file);
            $this->db->where('id', $this->session->userdata('id'));
            $this->db->update('admin');
        }
    }

    public function getLoginData($usr,$psw)
	{
		$u = $usr;
		$p = md5($psw);
		$q_cek_login = $this->db->get_where('admins', array('username' => $u, 'password' => $p));
		if(count($q_cek_login->result())>0)
		{
			foreach($q_cek_login->result() as $qck)
			{
					foreach($q_cek_login->result() as $qad)
					{
						$sess_data['logged_in'] = 'getLoginSIAKAD_online';
						$sess_data['username'] = $qad->username;
						$sess_data['nama_lengkap'] = $qad->nama_lengkap;
						$sess_data['id_user'] = $qad->id_username;

						$sess_data['level'] = 'admin';
						$this->session->set_userdata($sess_data);
					}
					header('location:'.base_url().'home');
			}
		}else{
			
				
					$this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.  Silahkan Hubungi Administrator.');
					header('location:'.base_url().'login');
				}
			}
		
	

// ADMIN MODEL

function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("jurusan");
  if($query != '')
  {
   $this->db->like('jurusan', $query);

  }
  $this->db->order_by('kode', 'ASC');
  return $this->db->get();
 }

}