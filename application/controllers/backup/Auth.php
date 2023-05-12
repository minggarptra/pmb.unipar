<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use Xendit\Xendit;
class Auth extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('cookie');
        $this->api = $this->Settings_model->general()["waapi"];
        $this->load->library('curl');
		
    }
    public function index(){
        $data['title'] = 'Login - ' . $this->Settings_model->general()["app_name"];
        $this->load->view('auth/app',$data);


    }

    public function register(){
        if($this->session->userdata('login')){
			redirect(base_url());
        }else{
			$cookie = get_cookie('e382jxndj');
            if($cookie != NULL){
				$getCookie = $this->db->get_where('user', ['cookie' => $cookie])->row_array();
                if($getCookie){
                    $dataCookie = $getCookie;
                    $dataSession = [
                        'id' => $dataCookie['id']
                    ];
                    $this->session->set_userdata('login', true);
					$this->session->set_userdata($dataSession);
					redirect(base_url());
                }
            }
		}
        
        
            $data['title'] = 'Daftar - ' . $this->Settings_model->general()["app_name"];
            $data['jurusan'] = $this->db->get('jurusan')->result();

          
            $this->load->view('auth/register',$data);
         
       
            
            
            
        
    }


    public function register_save(){

        $this->load->library('email');
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
         $carijurusan = $this->db->get_where('jurusan',array('kode' => $jurusan));
         $invoicedata = [
             'camaba' => $no_pendaftaran,
             'invoice_code' =>  $no_pendaftaran,
             'total_all' => $carijurusan->row()->biaya,
             'jurusan' => $jurusan,
             'pay_status' => '',  
         ];

        $this->db->insert('invoice', $invoicedata);

        }
      }
    }


    public function login(){
        if($this->session->userdata('login')){
			redirect(base_url('user'));
        }else{
			$cookie = get_cookie('e382jxndj');
            if($cookie != NULL){
				$getCookie = $this->db->get_where('camaba', ['cookie' => $cookie])->row_array();
                if($getCookie){
                    $dataCookie = $getCookie;
                    $dataSession = [
                        'id' => $dataCookie['id']
                    ];
                    $this->session->set_userdata('login', true);
					$this->session->set_userdata($dataSession);
					redirect(base_url());
                }
            }
		}
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email wajib diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi'
	    ]);
	    if($this->form_validation->run() == false){
            $data['title'] = 'Login - ' . $this->Settings_model->general()["app_name"];
            
           
            $this->load->view('auth/login', $data);
          
        }else{
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $remember = $this->input->post('remember');
            $user = $this->db->get_where('camaba', ['email' => $email])->row_array();
            if($user){
                if(password_verify($password, $user['password'])){
                    if($user['is_activate'] == 0){
                       echo 'notactive';
                    }else{
                        $data = [
                            'id' => $user['id']
                        ];
                        if($remember != NULL){
                            $key = random_string('alnum', 64);
                            set_cookie('e382jxndj', $key, 3600*24*30*12);
                            $this->db->set('cookie', $key);
                            $this->db->where('id', $user['id']);
                            $this->db->update('user');
                        }
                                        
                        $this->session->set_userdata('login', true);
                        $this->session->set_userdata($data);
        
                        echo 'success';
                    }
                }else{
                    echo 'failed';
                }
            }else{
                echo 'notregist';
            }
        }
    }

   

    public function verification(){
        $email = $_GET['email'];
        $token = $_GET['token'];

        $check = $this->db->get_where('camaba', ['email' => $email, 'token' => $token])->row_array();
        if($check['is_activate'] == 1){
            $this->session->set_flashdata('verification', "<scrip>
                swal({
                text: 'Akun Anda sudah aktif'
                });
            </script>");
            redirect(base_url() . 'login');
        }
        if($check){
            $this->db->set('is_activate', 1);
            $this->db->where('id', $check['id']);
            $this->db->update('camaba');
            $this->session->set_flashdata('verification', '<div class="alert alert-success" role="alert">
            Selamat akun anda sudah aktif
        </div>');
            redirect(base_url() . 'login');
        }else{
            $this->session->set_flashdata('verification', '<div class="alert alert-daner" role="alert">
          Akun gagal diverifikasi
        </div>');
            redirect(base_url() . 'login');
        }
    }

    public function proses_reset(){
        $email = $this->input->post('email');
            $token = sha1($email);
            $user = $this->db->get_where('camaba', ['email' => $email])->row_array();
            if($user){
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

                $data['name']=$user['name'];
                 $data['mail']=$email;
                 $data['token']=$token;
                $message=$this->load->view('auth/emailreset',$data,true);
                $this->email->initialize($config);
                $this->email->from($this->Settings_model->general()["account_gmail"], $this->Settings_model->general()["app_name"]);
                $this->email->to($email);
                $this->email->subject('Konfirmasi Reset Password');
                $this->email->message($message);
                $this->email->send();
                $this->db->set('token_reset', $token);
                $this->db->where('email', $email);
                $this->db->update('camaba');
                
                echo 'success';
            }else{
                echo 'notregist';
            }
    }

    public function reset_password(){
		
            $data['title'] = 'Reset Password - ' . $this->Settings_model->general()["app_name"];
            $data['css'] = 'auth';
            
            $this->load->view('auth/reset', $data);
            
        
    }
    
    public function reset(){
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('camaba', ['email' => $email, 'token_reset' => $token])->row_array();
        if($user){
            $data = [
                'email' => $email
            ];
            $this->session->set_userdata($data);
            $this->session->set_userdata('reset', true);
            redirect(base_url() . 'new-password');
        }else{
            $this->session->set_flashdata('failed', "token reset salah");
            redirect(base_url() . 'login');
        }
    }

    public function new_password(){
        if(!$this->session->userdata('reset')){
            redirect(base_url() . 'login');
        }
       
            $data['title'] = 'Password Baru - ' . $this->Settings_model->general()["app_name"];
            $data['css'] = 'auth';

            $this->load->view('auth/new_password', $data);
            
       
    }

    public function new_pas_proc(){

        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $this->db->set('password', $password);
            $this->db->where('email', $this->session->userdata('email'));
            $this->db->update('camaba');
            $sess = ['reset','email'];
		    $this->session->unset_userdata($sess);
            $this->session->set_flashdata('success', "Password berhasil di ubah");
            echo 'success';

    }

    public function reconfirm(){
		
        $data['title'] = 'Konfirmasi Ulang - ' . $this->Settings_model->general()["app_name"];
        $data['css'] = 'auth';
        
        $this->load->view('auth/konfirmasiulang', $data);
        
    
}

    public function proses_reconfirm(){
        $email = $this->input->post('email');
            
            $user = $this->db->get_where('camaba', ['email' => $email])->row_array();
            if($user){
                if ($user['is_activate'] ==='1') {
                    echo 'aktif';
                } else {
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

                $data['name']=$user['name'];
                 $data['email']=$email;
                 $data['token']=$user['token'];
                 $message=$this->load->view('auth/email',$data,true);
                 $this->email->initialize($config);
                 $this->email->from($this->Settings_model->general()["account_gmail"], $this->Settings_model->general()["app_name"]);
                 $this->email->to($email);
                 $this->email->subject('Verifikasi Alamat Email '.$this->Settings_model->general()["app_name"]);
                 $this->email->message($message);
                 if ($this->email->send()) {
                    echo 'success';
                 }
                
               

                }
                
                
            }else{
                echo 'notregist';
            }
    }

    public function logout(){
		$sess = ['login','id'];
		$this->session->unset_userdata($sess);
        delete_cookie('e382jxndj');
        redirect(base_url() . 'login');
	}

}