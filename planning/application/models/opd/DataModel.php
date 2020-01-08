<?php

class DataModel extends CI_Model
{
    
    public function getAllSasaran(){
        $data = $this->db->get('tb_rpjmd_sasaran')->result_array();
        return $data;
    }
    
}