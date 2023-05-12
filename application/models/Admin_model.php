<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{


    public function getDataKonfirmasi($jurusan, $tahun)
    {
        $this->datatables->select('camaba.id, camaba.no_pendaftaran,camaba.tanggal_daftar,
        camaba.name as namalengkap,
        invoice.pay_status, invoice.total_all,invoice.bukti,
        jurusan.jurusan as nama_prodi,
        IF(invoice.pay_status="SETTLED", "Lunas", "Belum-Lunas") as statusbayar
        ');
        $this->datatables->from('camaba');
        $this->datatables->join('jurusan ', 'jurusan.kode=camaba.jurusan');
        $this->datatables->join('invoice', 'camaba.no_pendaftaran = invoice.camaba','left');
        $this->datatables->where('invoice.pay_status', 'PENDING');                    
        if ($jurusan!==null && $tahun==='all') {
            $this->datatables->where('camaba.jurusan', $jurusan);            
        }else if ($jurusan==='all' && $tahun!==null) {
            $this->datatables->where('camaba.tahun', $tahun);            
        }else if($jurusan!==null && $tahun!==null){
            $this->datatables->where('camaba.tahun', $tahun);
            $this->datatables->where('camaba.jurusan', $jurusan);
        }
        return $this->datatables->generate();
    }
    public function getDataAkun($jurusan, $tahun)
    {
        $this->datatables->select('a.id,a.no_pendaftaran,a.name,a.tanggal_daftar, b.jurusan as nama_prodi,if(a.is_activate=1,"active","not active") as aktivasi');
        $this->datatables->from('camaba a');
        $this->datatables->join('jurusan b', 'b.kode=a.jurusan');
        if ($jurusan!==null && $tahun==='all') {
            $this->datatables->where('a.jurusan', $jurusan);            
        }else if ($jurusan==='all' && $tahun!==null) {
            $this->datatables->where('a.tahun', $tahun);            
        }else if($jurusan!==null && $tahun!==null){
            $this->datatables->where('a.tahun', $tahun);
            $this->datatables->where('a.jurusan', $jurusan);
        }
        return $this->datatables->generate();
    }


    public function getDataPendaftaran($jurusan, $tahun)
    {
        $this->datatables->select('pendaftaran.id, pendaftaran.no_pendaftaran,
        CONCAT (pendaftaran.nama_depan," ",pendaftaran.nama_belakang) as namalengkap,,
        invoice.pay_status,
        foto.foto,
        ijazah.ijazah,
        kk.kk ,  jurusan.jurusan as nama_prodi,
        IF(invoice.pay_status="SETTLED", "Lunas", "Belum-Lunas") as statusbayar
        ');
        $this->datatables->from('`pendaftaran`');
        $this->datatables->join('jurusan ', 'jurusan.kode=pendaftaran.jurusan');
        $this->datatables->join('invoice', 'pendaftaran.no_pendaftaran = invoice.camaba','left');
        $this->datatables->join('foto', 'pendaftaran.id_user = foto.user','left');
        $this->datatables->join('ijazah', 'pendaftaran.id_user = ijazah.user','left');
        $this->datatables->join('kk', 'pendaftaran.id_user = kk.user','left');
        if ($jurusan!==null && $tahun==='all') {
            $this->datatables->where('pendaftaran.jurusan', $jurusan);            
        }else if ($jurusan==='all' && $tahun!==null) {
            $this->datatables->where('pendaftaran.tahun', $tahun);            
        }else if($jurusan!==null && $tahun!==null){
            $this->datatables->where('pendaftaran.tahun', $tahun);
            $this->datatables->where('pendaftaran.jurusan', $jurusan);
        }
        return $this->datatables->generate();
    }

    public function getDetailList($id){
        $this->db->select('pendaftaran .*,
        CONCAT (pendaftaran.nama_depan," ",pendaftaran.nama_belakang) as namalengkap,,
        invoice.pay_status, transkrip_s1.transkrip_s1,
        foto.foto, ktp.ktp, akte_kelahiran.akte_kelahiran, 
        ijazah.ijazah, un.un, ijazah_s1.ijazah_s1, transkrip_s1.transkrip_s1,
        kk.kk , jurusan.jurusan as nama_prodi,
        ijazah_d1_d2_d3.ijazah_d1_d2_d3, transkrip_d1_d2_d3.transkrip_d1_d2_d3,
        sk.sk, persyaratan_lain.persyaratan_lain, 
        provinces.name AS provinsi, regencies.name AS kabupaten,
        IF(invoice.pay_status="SETTLED", "Lunas", "Belum-Lunas") as statusbayar
        ');
        $this->db->from('`pendaftaran`');
        $this->db->join('provinces ', 'pendaftaran.prov = provinces.id');
        $this->db->join('regencies ', 'pendaftaran.kota=regencies.id');
        $this->db->join('jurusan ', 'jurusan.kode=pendaftaran.jurusan');
        $this->db->join('invoice', 'pendaftaran.no_pendaftaran = invoice.camaba','left');
        $this->db->join('foto', 'pendaftaran.id_user = foto.user','left');
        $this->db->join('ijazah', 'pendaftaran.id_user = ijazah.user','left');
        $this->db->join('kk', 'pendaftaran.id_user = kk.user','left');
        $this->db->join('ktp', 'pendaftaran.id_user = ktp.user','left');
        $this->db->join('akte_kelahiran', 'pendaftaran.id_user = akte_kelahiran.user','left');
        $this->db->join('persyaratan_lain', 'pendaftaran.id_user = persyaratan_lain.user', 'left');
        $this->db->join('ijazah_d1_d2_d3', 'pendaftaran.id_user = ijazah_d1_d2_d3.user','left');
        $this->db->join('transkrip_nilai_d1_d2_d3 as transkrip_d1_d2_d3', 'pendaftaran.id_user = transkrip_d1_d2_d3.user','left');
        $this->db->join('un', 'pendaftaran.id_user = un.user', 'left');
        $this->db->join('sk_pindah as sk', 'pendaftaran.id_user = sk.user', 'left');
        $this->db->join('ijazah_s1', 'pendaftaran.id_user = ijazah_s1.user', 'left');
        $this->db->join('transkrip_nilai_s1 as transkrip_s1','pendaftaran.id_user = transkrip_s1.user', 'left');
        $this->db->where('pendaftaran.no_pendaftaran', $id);
        return $this->db->get();
    }

    public function getActDate($id){
        $this->db->select('*');
        $this->db->from('notifikasi');
        $this->db->where('notifikasi.user', $id);
        $this->db->order_by('CAST(notifikasi.date AS DATE)','DESC');
        return $this->db->get();
    }


    public function getDataKeuangan($jurusan, $tahun)
    {
        $this->datatables->select('camaba.id, camaba.no_pendaftaran,
        camaba.name as namalengkap,,
        invoice.pay_status, invoice.total_all,
        jurusan.jurusan as nama_prodi,
        IF(invoice.pay_status="SETTLED", "Lunas", "Belum-Lunas") as statusbayar
        ');
        $this->datatables->from('camaba');
        $this->datatables->join('jurusan ', 'jurusan.kode=camaba.jurusan');
        $this->datatables->join('invoice', 'camaba.no_pendaftaran = invoice.camaba','left');
        if ($jurusan!==null && $tahun==='all') {
            $this->datatables->where('camaba.jurusan', $jurusan);            
        }else if ($jurusan==='all' && $tahun!==null) {
            $this->datatables->where('camaba.tahun', $tahun);            
        }else if($jurusan!==null && $tahun!==null){
            $this->datatables->where('camaba.tahun', $tahun);
            $this->datatables->where('camaba.jurusan', $jurusan);
        }
        return $this->datatables->generate();
    }

    public function getJumlahUang($jurusan, $tahun){
        $this->db->select(' SUM(total_all) AS total_uang');
        $this->db->from('invoice');
        $this->db->where('invoice.pay_status', 'SETTLED');            
         if($jurusan==='all' && $tahun==='all'){
        }
        else if($jurusan!=='all' && $tahun!=='all'){
            $this->db->where('invoice.tahun', $tahun);
            $this->db->where('invoice.jurusan', $jurusan);
        }
        else if ($jurusan!==null && $tahun==='all') {
            $this->db->where('invoice.jurusan', $jurusan);            
        }else if ($jurusan==='all' && $tahun!==null) {
            $this->db->where('invoice.tahun', $tahun);            
        }
        

        return $this->db->get()->row();

    }

    public function getInvoice($id)
    {
        $this->db->select('camaba.name, jurusan.jurusan as prodi, invoice.*,IF(invoice.pay_status="SETTLED", "Lunas", "Belum-Lunas") AS statusbayar');
        $this->db->from('`invoice`');
        $this->db->join('camaba', 'camaba.no_pendaftaran = invoice.camaba','left');
        $this->db->join('jurusan', 'jurusan.kode = invoice.jurusan','left');
        $this->db->where('invoice.camaba', $id);
        return $this->db->get()->row();
    }


    public function getDataLaporanPendaftaran($jurusan, $tahun, $min, $max)
    {
        $this->datatables->select('pendaftaran.id, pendaftaran.no_pendaftaran,DATE_FORMAT(tanggal_daftar,"%d-%m-%Y") AS tanggaldaftar,
        CONCAT (pendaftaran.nama_depan," ",pendaftaran.nama_belakang) as namalengkap,,
        invoice.pay_status,  jurusan.jurusan as nama_prodi,
        IF(invoice.pay_status="SETTLED", "Lunas", "Belum-Lunas") as statusbayar
        ');
        $this->datatables->from('`pendaftaran`');
        $this->datatables->join('jurusan ', 'jurusan.kode=pendaftaran.jurusan');
        $this->datatables->join('invoice', 'pendaftaran.no_pendaftaran = invoice.camaba','left');
        if ($jurusan!==null && $tahun==='all') {
            $this->datatables->where('pendaftaran.jurusan', $jurusan);            
        }else if ($jurusan==='all' && $tahun!==null) {
            $this->datatables->where('pendaftaran.tahun', $tahun);            
        }else if($jurusan!==null && $tahun!==null){
            $this->datatables->where('pendaftaran.tahun', $tahun);
            $this->datatables->where('pendaftaran.jurusan', $jurusan);
        }
         if ($min !== 'kosong' && $min !== null){
            $this->datatables->where('pendaftaran.tanggal_daftar >= ', $min);
         }
         if ($max !== 'kosong' && $max !== null){
            $this->datatables->where('pendaftaran.tanggal_daftar <= ', $max);
         }

        return $this->datatables->generate();
    }


    public function getPrintDataLaporanPendaftaran($jurusan, $tahun, $min, $max)
    {
        $this->db->select('pendaftaran.id, pendaftaran.no_pendaftaran,DATE_FORMAT(tanggal_daftar,"%d-%m-%Y") AS tanggaldaftar,
        CONCAT (pendaftaran.nama_depan," ",pendaftaran.nama_belakang) as namalengkap,,
        invoice.pay_status,  jurusan.jurusan as nama_prodi,
        IF(invoice.pay_status="SETTLED", "Lunas", "Belum-Lunas") as statusbayar
        ');
        $this->db->from('`pendaftaran`');
        $this->db->join('jurusan ', 'jurusan.kode=pendaftaran.jurusan');
        $this->db->join('invoice', 'pendaftaran.no_pendaftaran = invoice.camaba','left');
        if ($jurusan!=='' && $tahun==='all') {
            $this->db->where('pendaftaran.jurusan', $jurusan);            
        }else if ($jurusan==='all' && $tahun!=='') {
            $this->db->where('pendaftaran.tahun', $tahun);            
        }else if($jurusan!='' && $tahun!==''){
            $this->db->where('pendaftaran.tahun', $tahun);
            $this->db->where('pendaftaran.jurusan', $jurusan);
        }
         if ( $min !== ''){
            $this->db->where('pendaftaran.tanggal_daftar >= ', $min);
         }
         if ($max !== ''){
            $this->db->where('pendaftaran.tanggal_daftar <= ', $max);
         }
        return $this->db->get();
    }

    public function getDataLaporanKeuangan($jurusan, $tahun, $min, $max)
    {
        $this->datatables->select('pendaftaran.id, pendaftaran.no_pendaftaran,DATE_FORMAT(tanggal_daftar,"%d-%m-%Y") AS tanggaldaftar,
        CONCAT (pendaftaran.nama_depan," ",pendaftaran.nama_belakang) as namalengkap,
        invoice.pay_status, invoice.total_all, jurusan.jurusan as nama_prodi,
        IF(invoice.pay_status="SETTLED", "Lunas", "Belum-Lunas") as statusbayar
        ');
        $this->datatables->from('`pendaftaran`');
        $this->datatables->join('jurusan ', 'jurusan.kode=pendaftaran.jurusan');
        $this->datatables->join('invoice', 'pendaftaran.no_pendaftaran = invoice.camaba','left');
        if ($jurusan!==null && $tahun==='all') {
            $this->datatables->where('pendaftaran.jurusan', $jurusan);            
        }else if ($jurusan==='all' && $tahun!==null) {
            $this->datatables->where('pendaftaran.tahun', $tahun);            
        }else if($jurusan!==null && $tahun!==null){
            $this->datatables->where('pendaftaran.tahun', $tahun);
            $this->datatables->where('pendaftaran.jurusan', $jurusan);
        }
         if ($min !== 'kosong' && $min !== null){
            $this->datatables->where('pendaftaran.tanggal_daftar >= ', $min);
         }
         if ($max !== 'kosong' && $max !== null){
            $this->datatables->where('pendaftaran.tanggal_daftar <= ', $max);
         }

        return $this->datatables->generate();
    }


    public function getPrintDataLaporanKeuangan($jurusan, $tahun, $min, $max)
    {
        $this->db->select('pendaftaran.id, pendaftaran.no_pendaftaran,DATE_FORMAT(tanggal_daftar,"%d-%m-%Y") AS tanggaldaftar,
        CONCAT (pendaftaran.nama_depan," ",pendaftaran.nama_belakang) as namalengkap,,
        invoice.pay_status,  jurusan.jurusan as nama_prodi,invoice.total_all,
        IF(invoice.pay_status="SETTLED", "Lunas", "Belum-Lunas") as statusbayar
        ');
        $this->db->from('`pendaftaran`');
        $this->db->join('jurusan ', 'jurusan.kode=pendaftaran.jurusan');
        $this->db->join('invoice', 'pendaftaran.no_pendaftaran = invoice.camaba','left');
        if ($jurusan!=='' && $tahun==='all') {
            $this->db->where('pendaftaran.jurusan', $jurusan);            
        }else if ($jurusan==='all' && $tahun!=='') {
            $this->db->where('pendaftaran.tahun', $tahun);            
        }else if($jurusan!='' && $tahun!==''){
            $this->db->where('pendaftaran.tahun', $tahun);
            $this->db->where('pendaftaran.jurusan', $jurusan);
        }
         if ( $min !== ''){
            $this->db->where('pendaftaran.tanggal_daftar >= ', $min);
         }
         if ($max !== ''){
            $this->db->where('pendaftaran.tanggal_daftar <= ', $max);
         }
        return $this->db->get();
    }


    public function getLaporanJumlahUang($jurusan, $tahun, $min, $max)
    {
        $this->db->select(' SUM(total_all) AS total_uang');
        $this->db->from('invoice');
        $this->db->where('invoice.pay_status', 'SETTLED');            
        if ($jurusan!=='' && $tahun==='all') {
            $this->db->where('invoice.jurusan', $jurusan);            
        }else if ($jurusan==='all' && $tahun!=='') {
            $this->db->where('invoice.tahun', $tahun);            
        }else if($jurusan!='' && $tahun!==''){
            $this->db->where('invoice.tahun', $tahun);
            $this->db->where('invoice.jurusan', $jurusan);
        }
         if ( $min !== ''){
            $this->db->where('invoice.date_input >= ', $min);
         }
         if ($max !== ''){
            $this->db->where('invoice.date_input <= ', $max);
         }
        return $this->db->get();
    }
}
