<?php

class RincianModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'rincian';
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function setQuery($post){
        
        // print_r($post);
        $kode = explode('-', $post['kode']);
        $this->db->where('tahun', $kode[0]);
        $this->db->where('bidang_kode', $kode[1]);
        $this->db->where('sub_bidang_kode', $kode[2]);
        $this->db->where('kegiatan_kode', $kode[3]);

        $this->db->order_by("rincian_kode", "asc");
    }

    public function getCount($search = '', $post = array()){

        $this->setQuery($post);
        $query = $this->db->get($this->table);
        return $query->num_rows();
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
            $kode = explode('-', $post['kode']);
            $data = array(
                'tahun' => $kode[0],
                'bidang_kode' => $kode[1],
                'sub_bidang_kode' => $kode[2],
                'kegiatan_kode' => $kode[3],
                'rincian_kode' => $post['rincian_kode'],
                'rincian_nama' => $post['rincian_nama'],
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
                'rincian_kode' => $post['rincian_kode'],
                'rincian_nama' => $post['rincian_nama'],
            );
            $kode = explode('-', $post['kode']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
            $this->db->where('sub_bidang_kode', $kode[2]);
            $this->db->where('kegiatan_kode', $kode[3]);
            $this->db->where('rincian_kode', $kode[4]);
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
            $kode = explode('-', $post['kode']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
            $this->db->where('sub_bidang_kode', $kode[2]);
            $this->db->where('kegiatan_kode', $kode[3]);
            $this->db->where('rincian_kode', $kode[4]);
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