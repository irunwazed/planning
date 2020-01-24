<?php

class KegiatanModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'kegiatan';
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function setQuery($post){
        $this->db->join('jenis', 'jenis.id_jenis = kegiatan.id_jenis', 'left');
        $this->db->join('opd', 'opd.id_opd = kegiatan.id_opd', 'left');
        $kode = explode('-', $post['kode']);
        $this->db->where('tahun', $kode[0]);
        $this->db->where('bidang_kode', $kode[1]);
        $this->db->where('sub_bidang_kode', $kode[2]);

        

        $this->db->order_by("kegiatan_kode", "asc");
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
                'kegiatan_kode' => $post['kegiatan_kode'],
                'kegiatan_nama' => $post['kegiatan_nama'],
                'id_jenis' => $post['id_jenis'],
                'id_opd' => $post['id_opd'],
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
                'kegiatan_kode' => $post['kegiatan_kode'],
                'kegiatan_nama' => $post['kegiatan_nama'],
                'id_jenis' => $post['id_jenis'],
                'id_opd' => $post['id_opd'],
            );
            $kode = explode('-', $post['kode']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
            $this->db->where('sub_bidang_kode', $kode[2]);
            $this->db->where('kegiatan_kode', $kode[3]);
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