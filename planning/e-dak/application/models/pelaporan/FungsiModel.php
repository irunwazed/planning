<?php

class FungsiModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
    }

    public function setPpk($post){
        // print_r($post);
        $kode = explode('-', $post['kode_ppk']);
        $data = array(
            'tahun' => $kode[0],
            'bidang_kode' => $kode[1],
            'sub_bidang_kode' => $kode[2],
            'kegiatan_kode' => $kode[3],
            'rincian_kode' => $kode[4],
            'detail_rincian_kode' => $kode[5],
            'id_pegawai' => $post['id_pegawai'],
        );
        $status = $this->db->insert('pegawai_ppk', $data);
        return $status;
    }

}