<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_landing extends CI_Model
{

    function get_datadashboard()
    {

        $query = $this->db->query(" SELECT	berita.* , admin.`nama` as author FROM berita, admin WHERE
		berita.`user` = admin.`id` ORDER BY waktu DESC LIMIT 3");

        return $query;
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

    public function count_data()
    {


        // if ($search != null) {
        //     $this->db->like('p.judul', $search);
        // }


        $this->db->from('berita p');
        return $this->db->get()->num_rows();
    }

    public function get_all_post($limit, $start)
    {

        $this->db->order_by('p.id', 'desc');
        $this->db->join('admin u', 'u.id=p.user', 'left');
        $query = $this->db->get('berita p', $limit, $start)->result();
        return $query;
    }

    public function get_post_by_slug($slug = null)
    {
        $this->db->select('p.*, u.nama, u.photo_profile');

        $this->db->join('admin u', 'u.id=p.user', 'left');
        $query = $this->db->get_where('berita p', ['p.slug' => $slug]);
        return $query;
    }

    public function get_prodi_by_slug($slug = null)
    {
        $query = $this->db->get_where('jurusan ', ['jurusan.slug' => $slug]);
        return $query;
    }

    public function recent_post($slug)
    {

        $this->db->where('slug !=', $slug);
        $this->db->order_by('waktu', 'desc');
        $this->db->limit(5);
        return $this->db->get('berita')->result();
    }
}
