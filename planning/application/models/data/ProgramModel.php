<?php

class ProgramModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2000;
        $this->table = 'tb_program';
    }

    public function setQuery($post){
        $kode = explode("-", $post['kode']);

        $this->db->where('tb_urusan_kode', $kode[0]);
        $this->db->where('tb_bidang_kode', $kode[1]);
        
    }

    public function getCount($post = array()){

        $this->setQuery($post);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($post){
        
        $jumlah = $this->jumlah;
        $awal = (@$post['page'] - 1)*$jumlah;

        $this->setQuery($post);
        $this->db->limit($jumlah,$awal); 
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        if($this->cekInput($post)){
            
            $kode = explode("-", $post['kode']);
            $data = array(
                'tb_urusan_kode' => $kode[0],
                'tb_bidang_kode' => $kode[1],
                'tb_program_kode' => $post['tb_program_kode'],
                'tb_program_nama' => $post['tb_program_nama'],
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
                'tb_program_kode' => $post['tb_program_kode'],
                'tb_program_nama' => $post['tb_program_nama'],
            );
            $kode = explode("-", $post['kode']);
            $this->db->where('tb_urusan_kode', $kode[0]);
            $this->db->where('tb_bidang_kode', $kode[1]);
            $this->db->where('tb_program_kode', $kode[2]);
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
            $kode = explode("-", $post['kode']);
            $this->db->where('tb_urusan_kode', $kode[0]);
            $this->db->where('tb_bidang_kode', $kode[1]);
            $this->db->where('tb_program_kode', $kode[2]);
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
        
        return true;
    }


}