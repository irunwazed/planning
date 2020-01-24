<?php

class SetTahunModel extends CI_Model
{
    private $jumlah, $table;
    
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2000;
        $this->table = 'tb_rpjmd';
    }

    public function getAllJson(){
      	$data = $this->db->get('tb_rpjmd')->row_array();
      	$data = json_decode($data['tb_rpjmd_status_json'], true);
        return $data;
    }

    public function update($post){

		$post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        
        if($this->cekInput($post)){
			$tahun = $post['tahun'];
            $data = array(
                'tb_rpjmd_status_tahun' => $tahun,
			);
			
			$this->session->set_userdata('tahun', $tahun);

            $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
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
    
    public function cekInput($post){
        
        return true;
    }


}