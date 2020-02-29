<?php

class LaporanModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'detail_rincian';
    }

    public function selectLaporan($post){
        
        $this->db->join('satuan', 'satuan.id_satuan = '.$this->table.'.id_satuan', 'left');
        $this->db->join('masalah', 'masalah.id_masalah = '.$this->table.'.id_masalah', 'left');

        $this->db->join('bidang', 'bidang.tahun = '.$this->table.'.tahun AND
                                    bidang.bidang_kode = '.$this->table.'.bidang_kode', 'left');

        $this->db->join('sub_bidang', 'sub_bidang.tahun = '.$this->table.'.tahun AND
                                    sub_bidang.bidang_kode = '.$this->table.'.bidang_kode AND
                                    sub_bidang.sub_bidang_kode = '.$this->table.'.sub_bidang_kode', 'left');
        
        $this->db->join('kegiatan', 'kegiatan.tahun = '.$this->table.'.tahun AND
                                    kegiatan.bidang_kode = '.$this->table.'.bidang_kode AND
                                    kegiatan.sub_bidang_kode = '.$this->table.'.sub_bidang_kode AND
                                    kegiatan.kegiatan_kode = '.$this->table.'.kegiatan_kode', 'left');
        
        $this->db->join('rincian', 'rincian.tahun = '.$this->table.'.tahun AND
                                    rincian.bidang_kode = '.$this->table.'.bidang_kode AND
                                    rincian.sub_bidang_kode = '.$this->table.'.sub_bidang_kode AND
                                    rincian.kegiatan_kode = '.$this->table.'.kegiatan_kode AND
                                    rincian.rincian_kode = '.$this->table.'.rincian_kode', 'left');
                                    
        $this->db->join('jenis', 'jenis.id_jenis = kegiatan.id_jenis', 'left');

        if(@$post['id_jenis'] && $post['id_jenis'] > 0){
            $this->db->where("kegiatan.id_jenis", $post['id_jenis']);
        }else{
            // $this->db->where("kegiatan.id_jenis", 1);
        }

        if(@$post['tahun'] && $post['tahun'] > 0){
            $this->db->where("detail_rincian.tahun", $post['tahun']);
        }

        if(@$post['bidang'] && $post['bidang'] > 0){
            $this->db->where("detail_rincian.bidang_kode", $post['bidang']);
        }

        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function selectPenunjang($post){

        $this->db->join('satuan', 'satuan.id_satuan = kegiatan_penunjang.id_satuan', 'left');

        $this->db->join('masalah', 'masalah.id_masalah = kegiatan_penunjang.id_masalah', 'left');
        $this->db->join('jenis', 'jenis.id_jenis = kegiatan_penunjang.id_jenis', 'left');

        $this->db->join('bidang', 'bidang.tahun = kegiatan_penunjang.tahun AND
                                    bidang.bidang_kode = kegiatan_penunjang.bidang_kode', 'left');

        $this->db->join('sub_bidang', 'sub_bidang.tahun = kegiatan_penunjang.tahun AND
                                    sub_bidang.bidang_kode = kegiatan_penunjang.bidang_kode AND
                                    sub_bidang.sub_bidang_kode = kegiatan_penunjang.sub_bidang_kode', 'left');

        $this->db->where("kegiatan_penunjang.bidang_kode", $post['bidang_kode']);
        $this->db->where("kegiatan_penunjang.sub_bidang_kode", $post['sub_bidang_kode']);

        if(@$post['id_jenis'] && $post['id_jenis'] > 0){
            $this->db->where("kegiatan_penunjang.id_jenis", $post['id_jenis']);
        }

        if(@$post['tahun'] && $post['tahun'] > 0){
            $this->db->where("kegiatan_penunjang.tahun", $post['tahun']);
        }

        // if(@$post['bidang'] && $post['bidang'] > 0){
        //     $this->db->where("kegiatan_penunjang.bidang_kode", $post['bidang']);
        // }

        $query = $this->db->get('kegiatan_penunjang')->result_array();
        return $query;
    }
}