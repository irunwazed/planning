<?php

class SubBidangModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'sub_bidang';
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function setQuery($post){
        $kode = explode('-', $post['kode']);
        $this->db->where('tahun', $kode[0]);
        $this->db->where('bidang_kode', $kode[1]);

        if(@$post['userKode']){
            if($_SESSION['level'] == 2){
                $this->db->where('bidang.id_indikator', $post['userKode']);
            }else if($_SESSION['level'] == 4){
                $subQuery = '';
                for($i = 0; $i < count($post['userKode']); $i++){
                    if($i == 0){
                        $subQuery .= " (sub_bidang.sub_bidang_kode = ".$post['userKode'][$i]['sub_bidang_kode'];
                    }else{
                        $subQuery .= " OR sub_bidang.sub_bidang_kode = ".$post['userKode'][$i]['sub_bidang_kode'];
                    }
                    
                }
                $subQuery .= ")";
                $this->db->where($subQuery, NULL, FALSE);
            }
            
        }

        $this->db->order_by("sub_bidang_kode", "asc");
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
                'sub_bidang_kode' => $post['sub_bidang_kode'],
                'sub_bidang_nama' => $post['sub_bidang_nama'],
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
                'sub_bidang_kode' => $post['sub_bidang_kode'],
                'sub_bidang_nama' => $post['sub_bidang_nama'],
            );
            $kode = explode('-', $post['kode']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
            $this->db->where('sub_bidang_kode', $kode[2]);
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