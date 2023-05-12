<?php
class Model_dynamic_dependent extends CI_Model
{
    function get_provinsi()
    {
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('provinces');
        return $query->result();
    }

    function get_kabupaten($provinsi_id)
    {
        //ambil data kabupaten berdasarkan id provinsi yang dipilih
        $this->db->where('province_id', $provinsi_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('regencies');

        $output = '<option value="">Pilih Kabupaten</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option class="text-capitalize" value="' . $row->id . '">' . $row->name . '</option>';
        }
        //return data kabupaten
        return $output;
    }

    function get_kabupaten_data($provinsi_id,$kab_id)
    {
        //ambil data kabupaten berdasarkan id provinsi yang dipilih
        $this->db->where('province_id', $provinsi_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('regencies');

        $output = '<option value="">Pilih Kabupaten</option>';

        //looping data
        foreach ($query->result() as $row) {
            if( $kab_id == $row->id ){
                $selected= 'selected';
            }
            else{
                $selected= '';
            }
            $output .= '<option class="text-capitalize" value="' . $row->id . '"'.$selected.' >' . $row->name . '</option>';
        }
        //return data kabupaten
        return $output;
    }

    function get_kecamatan($kabupaten_id)
    {
        //ambil data kecamatan berdasarkan id kabupaten yang dipilih
        $this->db->where('regency_id', $kabupaten_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('districts');

        $output = '<option value="">-- Pilih Kecamatan --</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        //return data kecamatan
        return $output;
    }

    function get_desa($kecamatan_id)
    {
        //ambil data desa berdasarkan id kecamatan yang dipilih
        $this->db->where('district_id', $kecamatan_id);
        $this->db->order_by('name', 'ASC');
        $query = $this->db->get('villages');

        $output = '<option value="">-- Pilih Desa --</option>';

        //looping data
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->id . '" >' . $row->name . '</option>';
        }
        //return data desa
        return $output;
    }
}