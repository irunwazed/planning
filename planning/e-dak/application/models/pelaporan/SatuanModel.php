<?php

class SatuanModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'satuan';
    }

    public function setQuery($post){
        // $kode = explode('-', $post['kode']);
        // $this->db->select($this->table.".*");
        // // $this->db->join('sub_bidang', 'sub_bidang.bidang_kode = bidang.bidang_kode AND sub_bidang.tahun = bidang.tahun', 'left');
        // // $this->db->join('kegiatan', 'kegiatan.bidang_kode = bidang.bidang_kode AND kegiatan.tahun = bidang.tahun', 'left');
        

        // $this->db->where($this->table.'.tahun', $post['tahun']);

        // if(@$post['userKode']){
        //     // print_r($_SESSION);
        //     $this->db->where('bidang.id_indikator', $post['userKode']);
        // }

        $this->db->group_by(array($this->table.".satuan_nama"), "asc");
    }

    public function getCount($search = '', $post = array()){

        $this->setQuery($post);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($page = 1, $search = '', $post = array()){
        $jumlah = $this->jumlah;
        $awal = ($page - 1)*$jumlah;

        $this->setQuery($post);
        // $this->db->limit($jumlah,$awal); 
        
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        
        if($this->cekInput($post)){
            $data = array(
                'satuan_nama' => $post['satuan_nama'],
            );
            $status = $this->db->insert($this->table, $data);
            if($status)
                $pesan = "Berhasil Menambah Data";
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        
        if($this->cekInput($post)){

            $data = array(
                'satuan_nama' => $post['satuan_nama'],
            );
            $this->db->where('id_satuan', $post['id_satuan']);
            $status = $this->db->update($this->table, $data);
            if($status)
                $pesan = "Berhasil Mengubah Data";
            
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function delete($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menghapus Data";
        $status = False;
        
        if($this->cekInput($post)){
            $this->db->where('id_satuan', $post['id_satuan']);
            $status = $this->db->delete($this->table);
            if($status)
                $pesan = "Berhasil Menghapus Data";
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }
    
    public function cekInput($post){
        //ruang filter

        // $query = $this->db->get($this->table);
        return true;
    }
    

}