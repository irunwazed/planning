<?php

class SubDetailRincianModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'sub_detail_rincian';
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function setQuery($post){
        
        
        $this->db->join('satuan', 'satuan.id_satuan = sub_detail_rincian.id_satuan', 'left');
        $this->db->join('masalah', 'masalah.id_masalah = sub_detail_rincian.id_masalah', 'left');
        // print_r($post);
        $kode = explode('-', $post['kode']);
        $this->db->where('tahun', $kode[0]);
        $this->db->where('bidang_kode', $kode[1]);
        $this->db->where('sub_bidang_kode', $kode[2]);
        $this->db->where('kegiatan_kode', $kode[3]);
        $this->db->where('rincian_kode', $kode[4]);
        $this->db->where('detail_rincian_kode', $kode[5]);
        $this->db->where('sub_detail_rincian_triwulan', $post['triwulan']);

        $this->db->order_by("detail_rincian_kode", "asc");
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
                'rincian_kode' => $kode[4],
                'detail_rincian_kode' => $kode[5],
                'sub_detail_rincian_triwulan' => $post['sub_detail_rincian_triwulan'],
                'sub_detail_rincian_nama' => $post['sub_detail_rincian_nama'],
                'sub_detail_rincian_volume' => $post['sub_detail_rincian_volume'],
                'id_satuan' => $post['id_satuan'],
                'sub_detail_rincian_penerima' => $post['sub_detail_rincian_penerima'],
                'sub_detail_rincian_pagu' => $post['sub_detail_rincian_pagu'],
                'sub_detail_rincian_swakelola' => $post['sub_detail_rincian_swakelola'],
                'sub_detail_rincian_kontrak' => $post['sub_detail_rincian_kontrak'],
                'sub_detail_rincian_pembayaran' => $post['sub_detail_rincian_pembayaran'],
                'sub_detail_rincian_keuangan' => $post['sub_detail_rincian_keuangan'],
                'sub_detail_rincian_fisik_volume' => $post['sub_detail_rincian_fisik_volume'],
                'id_masalah' => $post['id_masalah'],
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
                'sub_detail_rincian_triwulan' => $post['sub_detail_rincian_triwulan'],
                'sub_detail_rincian_nama' => $post['sub_detail_rincian_nama'],
                'sub_detail_rincian_volume' => $post['sub_detail_rincian_volume'],
                'id_satuan' => $post['id_satuan'],
                'sub_detail_rincian_penerima' => $post['sub_detail_rincian_penerima'],
                'sub_detail_rincian_pagu' => $post['sub_detail_rincian_pagu'],
                'sub_detail_rincian_swakelola' => $post['sub_detail_rincian_swakelola'],
                'sub_detail_rincian_kontrak' => $post['sub_detail_rincian_kontrak'],
                'sub_detail_rincian_pembayaran' => $post['sub_detail_rincian_pembayaran'],
                'sub_detail_rincian_keuangan' => $post['sub_detail_rincian_keuangan'],
                'sub_detail_rincian_fisik_volume' => $post['sub_detail_rincian_fisik_volume'],
                'id_masalah' => $post['id_masalah'],
            );
            $this->db->where('id_sub_detail_rincian', $post['id_sub_detail_rincian']);
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
            $this->db->where('id_sub_detail_rincian', $post['kode']);
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