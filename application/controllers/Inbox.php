<?php
use Pusher\Pusher;
defined('BASEPATH') OR exit('No direct script access allowed');
class Inbox extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
        $this->load->model('Messagemodel');
      

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
        $dataupdate = array(
            'is_read' => '1'
        );
        $this->db->where('type','chat');
        $insert=$this->db->update('notifadmin', $dataupdate);
        $data = [
            'title' => $this->Settings_model->general()["app_name"],
            'ta' =>$this->User_model->getTahunAktif()->row(),
			'judul'		=> 'Pesan',
			'subjudul'	=> 'Daftar Pesan',
		];

		$this->load->view('admin/page/chat/chat',$data);
		
	}

    public function chat($id)
	{
		$data['title'] =  $this->Settings_model->general()["app_name"];
        $data['tahun']= $this->Settings_model->gettahun()["tahun"] ;
        $data['iduser']=$id;
      
        $message= $this->db->query("SELECT  * from inbox where pengirim = '$id' OR penerima ='$id'  ORDER BY waktu ASC ")->num_rows();
        if ($message < 1) {
            $this->session->set_flashdata('failed', "Pesan tidak ditemukan");
            redirect(base_url() . 'pesan-admin');
           
        } else {
            
            $camaba = $this->db->get_where('camaba',['id' => $id ])->row();
            $dataupdate = array(
                'status' => '1'
            );
            $this->db->where('pengirim',$id);
            $insert=$this->db->update('inbox', $dataupdate);
            $data = [
                'title' => $this->Settings_model->general()["app_name"],
                'ta' =>$this->User_model->getTahunAktif()->row(),
                'judul'		=> 'Detail Pesan',
                'subjudul'	=> $camaba->name,
                'iduser'  => $id,
                'fotouser' => $camaba->photo_profile,
                'nodaftar' => $camaba->no_pendaftaran,
            ];

		    $this->load->view('admin/page/chat/singlechat',$data);

        }	
	}


    function getUserInbox(){
       
            $output = '';
            $query = '';
            if($this->input->post('query'))
            {
            $query = $this->input->post('query');
            }
        $data['last_msg'] = array();
        $data['data'] = $this->Messagemodel->allUser($query);
        $data['belumdibaca'] = $this->db->query("SELECT COUNT(*) AS total FROM inbox WHERE
        pengirim = '6' AND STATUS =0")->row();

		$this->load->helper('url');
		if(!is_array($data['data'])){
			echo "<p class='text-center'>No user available.</p>";
		}else{
            
			$count = count($data['data']);
			for($i = 0; $i < $count; $i++){
				$unique_id = $data['data'][$i]['pengirim'];
				$msg = $this->db->query("SELECT  inbox.*, camaba.`name` ,camaba.`photo_profile` FROM inbox,camaba  
                WHERE (inbox.`pengirim` = camaba.`id` OR inbox.`penerima` = camaba.`id`) AND  (inbox.`pengirim` = 'admin' AND inbox.`penerima` = '$unique_id' OR 
                inbox.`pengirim` = '$unique_id' AND inbox.`penerima` = 'admin' ) 
                ORDER BY waktu DESC LIMIT 1 ")->result_array();
				for($j = 0; $j < count($msg); $j++){

					array_push($data['last_msg'],array(
						'isi' => $msg[0]['isi'],
						'pengirim' => $msg[0]['pengirim'],
						'penerima' => $msg[0]['penerima'],
						'waktu' => $msg[0]['waktu'] //00:00
					));
				}
			}
			$this->load->view('admin/page/chat/chatlist',$data);
        }

    }


    function getMessage(){
        $id= $this->input->get('id');
        $dataupdate = array(
            'status' => '1'
        );
        $this->db->where('pengirim',$this->input->get('id'));
        $this->db->update('inbox', $dataupdate);
         $message= $this->db->query("SELECT  inbox.*, camaba.`name` ,camaba.`photo_profile` FROM inbox,camaba  
         WHERE (inbox.`pengirim` = camaba.`id` OR inbox.`penerima` = camaba.`id`) AND  (inbox.`pengirim` = 'admin' AND          inbox.`penerima` = '$id' OR 
         inbox.`pengirim` = '$id' )
         ORDER BY realtime ASC " )->result();
         echo json_encode($message);
     }

     function sendmessage(){
        $data =[
            'penerima' => $this->input->post('user'),
            'pengirim' =>  'admin',
            'waktu' => date('d M Y').', '.date('H:i:s'),
            'isi'=> $this->input->post('pesan'),
            'terkirim' => 'terkirim',
            'realtime' => date('Y-m-d H:i:s'),
            'status'=>0
        ];
        $datanotif =[
            'user' => $this->input->post('user'),
            'notifikasi' => 'Admin Mengirim anda pesan',
            'is_read' => '0'
        ];
      
       
        $this->db->insert('notifikasi', $datanotif);

        $simpan = $this->db->insert('inbox', $data);
        if ($simpan) {
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
     
            $datapusher['message'] = 'chat';
            $pusher->trigger('my-channel', 'my-event', $datapusher);
            echo 'success';
        } else {
            echo 'error';
        }

    }

    
}
