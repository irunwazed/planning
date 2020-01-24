<?php

class DataModel extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->library('Filter');
    }

    public function getRowRpjmd($id_rpjmd){
        $this->db->where('id_tb_rpjmd', $id_rpjmd);
        $data = $this->db->get('tb_rpjmd')->row();
        return $data;
    }
    
    public function getJumlahOpd(){
        $data = $this->db->get('tb_sub_unit')->num_rows();
        return $data;
    }

    public function getJumlahProgram(){
        $data = $this->db->get('tb_rpjmd_program')->num_rows();
        $data += $this->db->get('tb_rpjmd_program_penetapan')->num_rows();
        $data += $this->db->get('tb_rpjmd_program_perubahan')->num_rows();
        return $data;
    }

    public function getJumlahKegiatan(){
        $data = $this->db->get('tb_rpjmd_kegiatan')->num_rows();
        $data += $this->db->get('tb_rpjmd_kegiatan_penetapan')->num_rows();
        $data += $this->db->get('tb_rpjmd_kegiatan_perubahan')->num_rows();
        return $data;
    }

}