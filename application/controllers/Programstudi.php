<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programstudi extends CI_Controller {

	public function __construct(){
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('form_validation');
		$this->path = FCPATH . "assets/upload/images/jurusan/";
        

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
			'subjudul'	=> 'Program Studi',
		];
	
		$this->load->view('admin/page/setting_prodi',$data);
	
	}

    public function getdata()
	{
       
		$draw = intval($this->input->get("draw"));
		$start = intval($this->input->get("start"));
		$length = intval($this->input->get("length"));


		$query = $this->db->get("jurusan");


		$data = [];

		$no = 0;
		foreach ($query->result() as $key => $lists) {
			$no++;

			$data[$key][]  = $lists->kode;
			$data[$key][]  =$lists->jurusan;
			$data[$key][]  = 'Rp.'.''.number_format($lists->biaya,0,",",".");
			$data[$key][]  = '
            <img class="w-50" src="'.base_url().'assets/upload/images/jurusan/'.$lists->foto.'" alt="profile" />
            ';
			$data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm bedit" data="' . $lists->kode . '" ><i class="fa fa-edit nav-icon"></i></a> <a href="javascript:;" class="btn btn-danger btn-sm bhapus" data="' . $lists->id . '"><i class="fa fa-trash nav-icon"></i></a>';
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
		$config['upload_path'] = $this->path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload');
		$this->upload->initialize($config);
	}

	private function _compressImg($name)
	{
		$config['image_library']    = 'gd2';
		$config['source_image']     = $this->path . $name;
		$config['create_thumb']     = FALSE;
		$config['maintain_ratio']   = TRUE;
		$config['quality']          = '70%';
		$config['new_image']        = $this->path . $name;

		$this->load->library('image_lib', $config);
		$this->image_lib->resize();
	}

    function simpan()
	{
		
        $kodedit = $this->input->post('kodedit');
        if ($kodedit == '') {
            $kode = $this->input->post('kode');
            
            $jurusan = $this->input->post('jurusan');
            $biaya = $this->input->post('biaya');
            $desc = $this->input->post('desc');
            $instagram = $this->input->post('instagram');
            $slug = $this->User_model->create_slug($jurusan);
            if (!empty($_FILES['jurusan_thumbnail']['name'])) {
                        $this->_configUpload();
            
                        if ($this->upload->do_upload('jurusan_thumbnail')) {
                            $img = $this->upload->data();
            
                            //Compress Image
                            $this->_compressImg($img['file_name']);
            
                            $gambar = $img['file_name'];
                        } else {
                            echo 'gagalgambar';
                            $gambar = "gagalupload";
                        }
                        
                        
                    $datasimpan = array(
            
                        'kode' => $kode,
                        'jurusan' => $jurusan,     
                        'biaya' => $biaya,     
				        'foto' => $gambar,
				        'deskripsi' => $desc,
                        'slug' => $slug,
                        'instagram' => $instagram


                    );
                    $cek = $this->db->get_where('jurusan', array('kode' => $kode));
                    if ($cek->num_rows() > 0) {
                        echo 'ada';
                    } else {
                        $data = $this->db->insert('jurusan', $datasimpan);
                        if ($data) {
                            echo 'success';
                        } else {
                            echo 'error';
                        }
                    }
            }
        } 
        else 
        {
            $jurusan = $this->input->post('jurusan');
            $biaya = $this->input->post('biaya');
            $kode = $this->input->post('kode');
            $slug = $this->User_model->create_slug($jurusan);
            $desc = $this->input->post('desc');
            $instagram = $this->input->post('instagram');


            
            $pendaftaran =  $this->db->get_where('pendaftaran',['jurusan' => $this->input->post('kodedit') ])->num_rows();
            $cariold = $this->db->get_where('jurusan', array('kode' => $this->input->post('kodedit')))->row();
            if ($pendaftaran < 1) {
		       
                if (!empty($_FILES['jurusan_thumbnail']['name'])) {
                    $oldimg = $cariold->foto;
                    if ($oldimg) {
                        if (is_file($this->path . $oldimg)) {
                            unlink($this->path . $oldimg);
                        }
                    }
                    $this->_configUpload();
        
                    if ($this->upload->do_upload('jurusan_thumbnail')) {
                        $img = $this->upload->data();
        
                        //Compress Image
                        $this->_compressImg($img['file_name']);
        
                        $gambar = $img['file_name'];
                    } else {
                        echo 'gagalgambar';
                        $gambar = "gagalupload";
                    }
                    $data = array(
                        'kode' => $kode,
                        'jurusan' => $jurusan,
                        'biaya' => $biaya,
                        'foto' => $gambar,
                        'deskripsi' => $desc,
                        'slug' => $slug,
                        'instagram' => $instagram


                    );
                }
                else{

                    $data = array(
                        'kode' => $kode,
                        'jurusan' => $jurusan,
                        'biaya' => $biaya,
                        'deskripsi' => $desc,
                        'slug' => $slug,
                        'instagram' => $instagram
                    );
                }

                
                $this->db->where('kode', $this->input->post('kodedit'));
                $simpan = $this->db->update('jurusan', $data);
                if ($simpan) {
                    echo 'success';
                } else {
                    echo 'error';
                }
            }

            else {

                if (!empty($_FILES['jurusan_thumbnail']['name'])) {
                    $oldimg = $cariold->foto;
                    if ($oldimg) {
                        if (is_file($this->path . $oldimg)) {
                            unlink($this->path . $oldimg);
                        }
                    }
                    $this->_configUpload();
        
                    if ($this->upload->do_upload('jurusan_thumbnail')) {
                        $img = $this->upload->data();
        
                        //Compress Image
                        $this->_compressImg($img['file_name']);
        
                        $gambar = $img['file_name'];
                    } else {
                        echo 'gagalgambar';
                        $gambar = "gagalupload";
                    }
                    $data = array(
                        
                        'jurusan' => $jurusan,
                        'biaya' => $biaya,
                        'foto' => $gambar,
                        'deskripsi' => $desc,
                        'slug' => $slug,
                        'instagram' => $instagram




                    );
                }
                else{

                    $data = array(
                        'biaya' => $biaya,
                        'jurusan' => $jurusan,
                        'deskripsi' => $desc,
                        'slug' => $slug,
                        'instagram' => $instagram



                    );
                }
               
                $this->db->where('kode', $this->input->post('kodedit'));
                $simpan = $this->db->update('jurusan', $data);
                if ($simpan) {
                    echo 'adadaftar';
                } else {
                    echo 'error';
                }
            }
            
            
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
					'deskripsi' => $data->deskripsi,			
					'instagram' => $data->instagram,			
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
			        $this->deleteContentImage($jurusan->deskripsi);
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


    // summernote 

    public function upload_img()
	{
		if (isset($_FILES["image"]["name"])) {
			$path = FCPATH . 'assets/upload/images/jurusan/isi/';
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|jpeg|bmp';
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = $path . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				$config['width'] = 800;
				$config['height'] = 800;
				$config['new_image'] = $path . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url('assets/upload/images/jurusan/isi/') . $data['file_name'];
			}
		}
	}

	//Delete image summernote
	function delete_img()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if (unlink($file_name)) {
			echo 'File Delete Successfully';
		}
	}


	public function deleteContentImage($content)
    {
       $data= preg_match_all('/<img[^>]+>/i', $content, $imgTags);

       if($data != null){
        for ($i = 0; $i < count($imgTags[0]); $i++) {
            preg_match('/src="([^"]+)/i', $imgTags[0][$i], $imgage);
            $images[] = str_ireplace('src="', '',  $imgage[0]);
        }
            foreach ($images as $image) {
                $extract = explode('/', $image);
                $img = end($extract);
    
                $thumbnail = $this->path2 . $img;
                if (is_file($thumbnail)) {
                    unlink($thumbnail);
                }
            }
        }
       
    }


}
