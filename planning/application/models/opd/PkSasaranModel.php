<?php

class PkSasaranModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2000;
        $this->table = 'tb_rpjmd_sasaran';
    }

    public function getSasaranOpd(){
        $table = 'tb_rpjmd_opd';

        $this->db->join('tb_rpjmd_sasaran', 'tb_rpjmd_sasaran.id_tb_rpjmd = '.$table.'.id_tb_rpjmd
                                        AND tb_rpjmd_sasaran.tb_rpjmd_misi_kode = '.$table.'.tb_rpjmd_misi_kode
                                        AND tb_rpjmd_sasaran.tb_rpjmd_tujuan_kode = '.$table.'.tb_rpjmd_tujuan_kode
                                        AND tb_rpjmd_sasaran.tb_rpjmd_sasaran_kode = '.$table.'.tb_rpjmd_sasaran_kode', 'left');

        $kodeOpd = explode("-", $this->session->kodeOpd);
        $this->db->where($table.'.tb_urusan_kode', $kodeOpd[0]);
        $this->db->where($table.'.tb_bidang_kode', $kodeOpd[1]);
        $this->db->where($table.'.tb_unit_kode', $kodeOpd[2]);
        $this->db->where($table.'.tb_sub_unit_kode', $kodeOpd[3]);

        $groupBy = array(
            $table.".id_tb_rpjmd",
            $table.".tb_rpjmd_misi_kode",
            $table.".tb_rpjmd_tujuan_kode",
            $table.".tb_rpjmd_sasaran_kode",
        );
        $this->db->group_by($groupBy);

        $data = $this->db->get($table)->result_array();
        return $data;
    }

    public function getProgramOpd(){
        $table = 'tb_rpjmd_program';

        $this->db->join('tb_program', 'tb_program.tb_urusan_kode = '.$table.'.tb_urusan_kode
                                        AND tb_program.tb_bidang_kode = '.$table.'.tb_bidang_kode
                                        AND tb_program.tb_program_kode = '.$table.'.tb_program_kode', 'left');

        $kodeOpd = explode("-", $this->session->kodeOpd);
        $this->db->where($table.'.tb_urusan_kode', $kodeOpd[0]);
        $this->db->where($table.'.tb_bidang_kode', $kodeOpd[1]);
        $this->db->where($table.'.tb_unit_kode', $kodeOpd[2]);
        $this->db->where($table.'.tb_sub_unit_kode', $kodeOpd[3]);

        $groupBy = array(
            $table.".id_tb_rpjmd",
            $table.".tb_rpjmd_misi_kode",
            $table.".tb_rpjmd_tujuan_kode",
            $table.".tb_rpjmd_sasaran_kode",
            $table.".tb_urusan_kode",
            $table.".tb_bidang_kode",
            $table.".tb_unit_kode",
            $table.".tb_sub_unit_kode",
            $table.".tb_program_kode",
        );
        $this->db->group_by($groupBy);

        $data = $this->db->get($table)->result_array();
        return $data;
    }

    public function getKegiatanOpd(){
        $table = 'tb_rpjmd_kegiatan';

        $this->db->join('tb_kegiatan', 'tb_kegiatan.tb_urusan_kode = '.$table.'.tb_urusan_kode
                                        AND tb_kegiatan.tb_bidang_kode = '.$table.'.tb_bidang_kode
                                        AND tb_kegiatan.tb_program_kode = '.$table.'.tb_program_kode
                                        AND tb_kegiatan.tb_kegiatan_kode = '.$table.'.tb_kegiatan_kode', 'left');

        $kodeOpd = explode("-", $this->session->kodeOpd);
        $this->db->where($table.'.tb_urusan_kode', $kodeOpd[0]);
        $this->db->where($table.'.tb_bidang_kode', $kodeOpd[1]);
        $this->db->where($table.'.tb_unit_kode', $kodeOpd[2]);
        $this->db->where($table.'.tb_sub_unit_kode', $kodeOpd[3]);

        $groupBy = array(
            $table.".id_tb_rpjmd",
            $table.".tb_rpjmd_misi_kode",
            $table.".tb_rpjmd_tujuan_kode",
            $table.".tb_rpjmd_sasaran_kode",
            $table.".tb_urusan_kode",
            $table.".tb_bidang_kode",
            $table.".tb_unit_kode",
            $table.".tb_sub_unit_kode",
            $table.".tb_program_kode",
            $table.".tb_kegiatan_kode",
        );
        $this->db->group_by($groupBy);

        $data = $this->db->get($table)->result_array();
        return $data;
    }

    public function setSasaran($post){
        $kode = explode("-", $post['tb_rpjmd_sasaran_kode']);
        $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
        $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
        $this->db->where('tb_rpjmd_tujuan_kode', $kode[1]);
        $this->db->where('tb_rpjmd_sasaran_kode', $kode[2]);
        
        $kodeOpd = explode("-", $this->session->kodeOpd);
        $this->db->where('tb_urusan_kode', $kodeOpd[0]);
        $this->db->where('tb_bidang_kode', $kodeOpd[1]);
        $this->db->where('tb_unit_kode', $kodeOpd[2]);
        $this->db->where('tb_sub_unit_kode', $kodeOpd[3]);
        
        $tahun = $this->session->tahun;
        $data = array(
            "tb_rpjmd_opd_th".$tahun."_capaian_kinerja" => $post['kinerja'],
        );
        $status = $this->db->update('tb_rpjmd_opd', $data);
        return $status;
    }

    public function setProgram($post){
        $kode = explode("-", $post['tb_program_kode']);
        $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
        $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
        $this->db->where('tb_rpjmd_tujuan_kode', $kode[1]);
        $this->db->where('tb_rpjmd_sasaran_kode', $kode[2]);
        $this->db->where('tb_program_kode', $kode[3]);

        $tahun = $this->session->tahun;
        $data = array(
            "tb_rpjmd_program_th".$tahun."_capaian_kinerja" => $post['kinerja'],
        );

        $status = $this->db->update('tb_rpjmd_program', $data);
        return $status;
    }

    public function setKegiatan($post){
        $kode = explode("-", $post['tb_kegiatan_kode']);
        $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
        $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
        $this->db->where('tb_rpjmd_tujuan_kode', $kode[1]);
        $this->db->where('tb_rpjmd_sasaran_kode', $kode[2]);
        $this->db->where('tb_program_kode', $kode[3]);
        $this->db->where('tb_kegiatan_kode', $kode[4]);

        $tahun = $this->session->tahun;
        $data = array(
            "tb_rpjmd_kegiatan_th".$tahun."_capaian_kinerja" => $post['kinerja'],
        );

        $status = $this->db->update('tb_rpjmd_kegiatan', $data);
        return $status;
    }

    // public function getSasaran($post){
    //     $kode = explode("-", $post['tb_rpjmd_sasaran_kode']);
    //     $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
    //     $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
    //     $this->db->where('tb_rpjmd_tujuan_kode', $kode[1]);
    //     $this->db->where('tb_rpjmd_sasaran_kode', $kode[2]);

    //     $kodeOpd = explode("-", $this->session->kodeOpd);
    //     $this->db->where('tb_urusan_kode', $kodeOpd[0]);
    //     $this->db->where('tb_bidang_kode', $kodeOpd[1]);
    //     $this->db->where('tb_unit_kode', $kodeOpd[2]);
    //     $this->db->where('tb_sub_unit_kode', $kodeOpd[3]);

    //     $tahun = $this->session->tahun;
    //     $status = $this->db->get('tb_rpjmd_opd')->row();
    //     return $status;
    // }

}