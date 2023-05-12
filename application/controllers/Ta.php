<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ta extends CI_Controller {

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
			'subjudul'	=> 'Tahun Akademik',
		];
	
		$this->load->view('admin/page/setting_ta',$data);
	
	
	}

    public function getdata()
	{
       
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->get("tahun_akademik");


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;
            $a=$lists->tahun;
            $b=$a + 1;
            if ($lists->aktif == 1) {
                $check = 'checked';
            } else {
                $check = '';

            }
            
			$data[$key][]  = $lists->tahun.' - '.$b;
			$data[$key][]  =date('d-m-Y', strtotime($lists->awal)); 
			$data[$key][]  = date('d-m-Y', strtotime($lists->akhir)); 
			$data[$key][]  = '
            <div class="switchToggle">
            <input type="checkbox" value="'.$lists->aktif.'" data="' . $lists->id . '" class="tahuncek" '.$check.' id="switch'.$lists->id.'">
            <label for="switch'.$lists->id.'">Toggle</label>
            </div>
        ';
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
            $tahun = $this->input->post('tahun');
            $awal = $this->input->post('awal');
            $akhir = $this->input->post('akhir');
           
                        
                    $datasimpan = array(
            
                        'tahun' => $tahun,
                        'awal' => $awal,     
				        'akhir' => $akhir,
                        'aktif' => 0

                    );
                    $cek = $this->db->get_where('tahun_akademik', array('tahun' => $tahun));
                    if ($cek->num_rows() > 0) {
                        echo 'ada';
                    } else {
                        $data = $this->db->insert('tahun_akademik', $datasimpan);
                        if ($data) {
                            echo 'success';
                        } else {
                            echo 'error';
                        }
                    }
            
        } 
        else 
        {
                    $tahun = $this->input->post('tahun');
                    $awal = $this->input->post('awal');
                    $akhir = $this->input->post('akhir');             
                    $cek = $this->db->get_where('tahun_akademik', array('tahun' => $tahun));
                    $cek2 = $this->db->get_where('tahun_akademik', array('id' => $this->input->post('kodedit')))->row();

                    if ($cek2->tahun == $tahun) {
                        $sukses = 'success';
                    } else {
                        $sukses = 'successada';
                    }
                    
                    
                    if ($cek->num_rows() > 0) {
                        $datasimpan = array(   
                            'awal' => $awal,     
                            'akhir' => $akhir, 
                        );
                        $this->db->where('id', $this->input->post('kodedit'));
                        $simpan = $this->db->update('tahun_akademik', $datasimpan);
                        if ($simpan) {
                            echo $sukses;
                        } else {
                            echo 'error';
                        }
          
                       
                    } else {

                        $datasimpan = array(
            
                            'tahun' => $tahun,
                            'awal' => $awal,     
                            'akhir' => $akhir,
                           
                        );
                        $this->db->where('id', $this->input->post('kodedit'));
                        $simpan = $this->db->update('tahun_akademik', $datasimpan);
                        if ($simpan) {
                            echo 'success';
                        } else {
                            echo 'error';
                        }
                        
                    }

                       
                
            
            
        }
        
		
		
		
	}

    public function showedit()
	{
		$id = $this->input->get('id');
	

		$jurusan = $this->db->get_where('tahun_akademik', ['id' => $id]);

		if ($jurusan->num_rows() > 0) {
			foreach ($jurusan->result() as $data) {
				$hasil = array(
					'tahun' => $data->tahun,
					'awal' => $data->awal,			
					'akhir' => $data->akhir,			
				);
			}
		}
		echo json_encode($hasil);
	}


    public function hapus()
	{
		    $id = $this->input->post('id');
            $tahun =  $this->db->get_where('tahun_akademik',['id' => $id ])->row();
            $pendaftaran =  $this->db->get_where('pendaftaran',['tahun' => $tahun->tahun ])->num_rows();
            if ($pendaftaran < 1) {
                    $data = $this->db->query("DELETE FROM tahun_akademik WHERE id= '$id' ");
                    if ($data) {
                        echo 'success';
                    } else {
                        echo 'error';
			        }
            } else {
                echo 'ada';
            }		
	}

    public function ubahaktif()
    {
		    $id = $this->input->post('id');
		    $nilai = $this->input->post('nilai');
            $cariaktif = $this->db->query("SELECT * FROM tahun_akademik WHERE aktif = 1  AND id != '$id' ")->num_rows();
		    

            if ($nilai == 0) {
                if ($cariaktif < 1) {
                    $datasimpan = array(
            
                        'aktif' => 1,
                        
                        
                    );
                    $this->db->where('id', $id);
                    $simpan = $this->db->update('tahun_akademik', $datasimpan);
                    if ($simpan) {
                        echo 'success';
                    } else {
                        echo 'error';
                    }
                } else {
                    echo 'ada';
                }
                
                
            } else {
                $datasimpan = array(
                    'aktif' => 0,
                );
                $this->db->where('id', $id);
                $simpan = $this->db->update('tahun_akademik', $datasimpan);
                if ($simpan) {
                    echo 'successnonaktif';
                } else {
                    echo 'error';
                }
            }
            




    }


}
