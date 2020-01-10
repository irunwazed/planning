<?php

class StatusModel extends CI_Model
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

    public function update(){
      	$stat = $this->input->post('sts', true);
      	$thn = $this->input->post('thnPilih', true);
      	$bln = $this->input->post('blnPilih', true);

      	// $stat = 3;
      	// $thn = 1;
      	// $bln = 2;

      	$json = $this->getAllJson();
      	$data = $json;
      	$data["tahun$thn"]["bulan$bln"] = $stat;

      	$json = json_encode($data);
      	$this->db->where('id_tb_rpjmd', '1');
      	$kirim = ['tb_rpjmd_status_json' => $json];
      	$this->db->update($this->table, $kirim);
      	return true;
    }


}