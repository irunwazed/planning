<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter {

    private static $CI;

    public function __construct()
    {
        self::$CI = & get_instance();
    }
    
    public function cekLogin($levelArr){
        $status = false;
        if(in_array(self::$CI->session->level, $levelArr)){
            $status = true;
        }
        return $status;
    }

    public function cekLoginOut($levelArr){
        $status = $this->cekLogin($levelArr);
        if(!$status){
            redirect(base_url('beranda'));
        }
    }

    public function getJenisRpjmd(){
        self::$CI->db->where('id_tb_rpjmd', self::$CI->session->rpjmd);
        $rpjmd = self::$CI->db->get('tb_rpjmd')->row();
        $rpjmdAturan = json_decode($rpjmd->tb_rpjmd_status_json, true);
        $jenis = @$rpjmdAturan['tahun'.$rpjmd->tb_rpjmd_status_tahun]['bulan'.$rpjmd->tb_rpjmd_status_bulan];
        return $jenis;
    }

}