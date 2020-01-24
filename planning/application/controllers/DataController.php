<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class DataController extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
    } 

    public function getDataTujuan(){
        $post = $this->input->post();
        $kode = $post['kode'];

        $table = "tb_rpjmd_tujuan";
        $this->db->where("id_tb_rpjmd", $this->session->rpjmd);
        $this->db->where("tb_rpjmd_misi_kode", $kode);
        $data = $this->db->get($table)->result_array();
        $kirim = array(
            "status" => true,
            "pesan" => '',
            "data" => $data,
        );
        echo json_encode($kirim);
    }

    public function getDataSasaran(){
        $post = $this->input->post();
        $kode = explode("-", $post['kode']);

        $table = "tb_rpjmd_sasaran";
        $this->db->where("id_tb_rpjmd", $this->session->rpjmd);
        $this->db->where("tb_rpjmd_misi_kode", $kode[0]);
        $this->db->where("tb_rpjmd_tujuan_kode", $kode[1]);
        $data = $this->db->get($table)->result_array();
        $kirim = array(
            "status" => true,
            "pesan" => '',
            "data" => $data,
        );
        echo json_encode($kirim);
    }

    public function getDataProgram(){
        $post = $this->input->post();
        $kode = explode("-", $post['kode']);
        $kodeOpd = explode("-", $this->session->kodeOpd);

        $table = "tb_rpjmd_program";
        
        $this->db->join('tb_program', 'tb_program.tb_urusan_kode = '.$table.'.tb_urusan_kode
                                    AND tb_program.tb_bidang_kode = '.$table.'.tb_bidang_kode
                                    AND tb_program.tb_program_kode = '.$table.'.tb_program_kode', 'left');

        $this->db->where($table.".id_tb_rpjmd", $this->session->rpjmd);
        $this->db->where($table.".tb_rpjmd_misi_kode", $kode[0]);
        $this->db->where($table.".tb_rpjmd_tujuan_kode", $kode[1]);
        $this->db->where($table.".tb_rpjmd_sasaran_kode", $kode[2]);
        $this->db->where($table.".tb_urusan_kode", $kodeOpd[0]);
        $this->db->where($table.".tb_bidang_kode", $kodeOpd[1]);
        $this->db->where($table.".tb_unit_kode", $kodeOpd[2]);
        $this->db->where($table.".tb_sub_unit_kode", $kodeOpd[3]);
        $data = $this->db->get($table)->result_array();
        $kirim = array(
            "status" => true,
            "pesan" => '',
            "data" => $data,
        );
        echo json_encode($kirim);
    }

    public function getDataKegiatan(){
        $post = $this->input->post();
        $kode = explode("-", $post['kode']);
        $kodeOpd = explode("-", $this->session->kodeOpd);

        $table = "tb_rpjmd_kegiatan";
        
        $this->db->join('tb_kegiatan', 'tb_kegiatan.tb_urusan_kode = '.$table.'.tb_urusan_kode
                                    AND tb_kegiatan.tb_bidang_kode = '.$table.'.tb_bidang_kode
                                    AND tb_kegiatan.tb_program_kode = '.$table.'.tb_program_kode
                                    AND tb_kegiatan.tb_kegiatan_kode = '.$table.'.tb_kegiatan_kode', 'left');

        $this->db->where($table.".id_tb_rpjmd", $this->session->rpjmd);
        $this->db->where($table.".tb_rpjmd_misi_kode", $kode[0]);
        $this->db->where($table.".tb_rpjmd_tujuan_kode", $kode[1]);
        $this->db->where($table.".tb_rpjmd_sasaran_kode", $kode[2]);
        $this->db->where($table.".tb_urusan_kode", $kodeOpd[0]);
        $this->db->where($table.".tb_bidang_kode", $kodeOpd[1]);
        $this->db->where($table.".tb_unit_kode", $kodeOpd[2]);
        $this->db->where($table.".tb_sub_unit_kode", $kodeOpd[3]);
        $this->db->where($table.".tb_program_kode", $kode[3]);
        $data = $this->db->get($table)->result_array();
        $kirim = array(
            "status" => true,
            "pesan" => '',
            "data" => $data,
        );
        echo json_encode($kirim);
    }
    
}