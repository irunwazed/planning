<?php

class DataModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
    }

    public function selectSatuan(){
        $data = $this->db->get("satuan")->result_array();
        return $data;
    }

    public function selectMasalah(){
        $data = $this->db->get("masalah")->result_array();
        return $data;
    }
    public function selectPpk(){
        $data = $this->db->get("pegawai")->result_array();
        return $data;
    }
    
    public function selectJenis(){
        $data = $this->db->get("jenis")->result_array();
        return $data;
    }
    
    public function selectBidang($post = array()){

        if(@$post['userKode']){
            if($_SESSION['level'] == 2){
                $this->db->where('bidang.id_indikator', $post['userKode']);
            }else if($_SESSION['level'] == 3){
                
                $this->db->join('kegiatan', 'kegiatan.bidang_kode = bidang.bidang_kode', 'left');
                $this->db->where('kegiatan.id_opd', $post['userKode']);
            }else if($_SESSION['level'] == 4){
                for($i = 0; $i < count($post['userKode']); $i++){
                    if($i == 0){
                        $this->db->where('bidang.bidang_kode', $post['userKode'][$i]['bidang_kode']);
                    }else{
                        $this->db->or_where('bidang.bidang_kode', $post['userKode'][$i]['bidang_kode']);
                    }
                    
                }
            }
            
        }

        $this->db->group_by(array("bidang.tahun", "bidang.bidang_kode"));

        $data = $this->db->get("bidang")->result_array();
        return $data;
    }
    
    public function selectOpd(){
        $data = $this->db->get("opd")->result_array();
        return $data;
    }

    public function getBidang($post){
        $this->db->where('tahun', $post['tahun']);
        $this->db->where('bidang_kode', $post['bidang']);
        $data = $this->db->get("bidang")->result_array();
        return $data;
    }

    public function getUserKode($id, $level){
        
        if($level == 2){
            $this->db->where('id_users', $id);
            $data = $this->db->get("users_admin")->result_array();
            return @$data[0]['id_indikator'];
        }else if($level == 3){
            $this->db->where('id_users', $id);
            $data = $this->db->get("users_opd")->result_array();
            return @$data[0]['id_opd'];
        }else if($level == 4){
            $this->db->where("id_pegawai", $id);
            $data = $this->db->get("pegawai_ppk")->result_array();
            return $data;
        }else{
            return 0;
        }
        
    }

    public function jumlah_isi($post){
        
        $arr = array(
            'tahun',
            'bidang_kode',
            'sub_bidang_kode',
            'kegiatan_kode',
            'rincian_kode',
            'detail_rincian_kode',
        );

        $kode = explode('-', $post['kode']);
        for($i = 0; $i < count($kode); $i++){
            $this->db->where($arr[$i], $kode[$i]);
        }

        $query = $this->db->get('detail_rincian');
        return $query->num_rows();
    }

    public function jumlah_isi_penunjang($post){
        $arr = array(
            'tahun',
            'bidang_kode',
            'sub_bidang_kode',
        );

        $kode = explode('-', $post['kode']);
        for($i = 0; $i < count($kode) && $i < count($arr); $i++){
            $this->db->where($arr[$i], $kode[$i]);
        }

        $query = $this->db->get('kegiatan_penunjang');
        return $query->num_rows();
    }

    function getBidang2($post){
        $this->db->where('tahun', $post['tahun']);
        $data = $this->db->get("bidang")->result_array();
        return $data;
    }

    function getSubBidang($post){

        $kode = explode('-', $post['kode']);
        $this->db->where('tahun', $kode[0]);
        $this->db->where('bidang_kode', $kode[1]);
        $data = $this->db->get("sub_bidang")->result_array();
        return $data;
    }

    public function getPpk($id){
        
        $this->db->join('jenis', 'jenis.id_jenis = pegawai_ppk.id_jenis', 'left');
        $this->db->join('bidang', 'bidang.bidang_kode = pegawai_ppk.bidang_kode', 'left');
        $this->db->join('sub_bidang', 'sub_bidang.bidang_kode = pegawai_ppk.bidang_kode
                                        AND sub_bidang.sub_bidang_kode = pegawai_ppk.sub_bidang_kode', 'left');
        $this->db->where('id_pegawai', $id);
        $data = $this->db->get("pegawai_ppk")->result_array();
        return $data;
    }

    public function getDataPerTahun($post){
        $this->db->select('detail_rincian.*, bidang.bidang_nama');
        $this->db->join('bidang', 'bidang.bidang_kode = detail_rincian.bidang_kode
                                    AND bidang.tahun = detail_rincian.tahun', 'left');

        if($_SESSION['level'] == 1){
            // $this->db->where('bidang.bidang_verifikasi', 1);
            // $this->db->where('bidang.bidang_verifikasi_bappeda', 1);
        }
        if(@$post['userKode']){
            if($_SESSION['level'] == 2){
                $this->db->where('bidang.id_indikator', $post['userKode']);
                // $this->db->where('bidang.bidang_verifikasi', 1);
            }else if($_SESSION['level'] == 3){
                $this->db->join('kegiatan', 'kegiatan.bidang_kode = bidang.bidang_kode
                                            AND kegiatan.tahun = bidang.tahun', 'left');
                $this->db->where('kegiatan.id_opd', $post['userKode']);
            }else if($_SESSION['level'] == 4){
                $this->db->where('detail_rincian.bidang_kode', $post['userKode'][0]['bidang_kode']);
                $subQuery = '';
                for($i = 0; $i < count($post['userKode']); $i++){
                    if($i == 0){
                        $subQuery .= " (detail_rincian.sub_bidang_kode = ".$post['userKode'][$i]['sub_bidang_kode'];
                    }else{
                        $subQuery .= " OR detail_rincian.sub_bidang_kode = ".$post['userKode'][$i]['sub_bidang_kode'];
                    }
                }
                $subQuery .= ")";
                $this->db->where($subQuery, NULL, FALSE);
            }
        }
        $this->db->where('detail_rincian.tahun', $post['tahun']);
        $query = $this->db->get('detail_rincian');
        return $query->result_array();
    }

    public function getDataPenunjangPerTahun($post){
        $this->db->select('kegiatan_penunjang.*');
        $this->db->join('bidang', 'bidang.bidang_kode = kegiatan_penunjang.bidang_kode', 'left');
        if(@$post['userKode']){
            if($_SESSION['level'] == 2){
                $this->db->where('bidang.id_indikator', $post['userKode']);
            }else if($_SESSION['level'] == 4){
                $this->db->where('kegiatan_penunjang.bidang_kode', $post['userKode'][0]['bidang_kode']);
                $subQuery = '';
                for($i = 0; $i < count($post['userKode']); $i++){
                    if($i == 0){
                        $subQuery .= " (kegiatan_penunjang.sub_bidang_kode = ".$post['userKode'][$i]['sub_bidang_kode'];
                    }else{
                        $subQuery .= " OR kegiatan_penunjang.sub_bidang_kode = ".$post['userKode'][$i]['sub_bidang_kode'];
                    }
                }
                $subQuery .= ")";
                $this->db->where($subQuery, NULL, FALSE);
            }
            
        }
        $this->db->where('kegiatan_penunjang.tahun', $post['tahun']);
        $query = $this->db->get('kegiatan_penunjang');
        return $query->result_array();
    }

    public function getIndikator($post){
        $this->db->where('id_indikator', $post['indikator']);
        $data = $this->db->get("indikator")->result_array();
        return $data;
    }

    public function getBidangFromOpd($post){
        
        $this->db->select("bidang.*");
        $this->db->where('bidang.tahun', $post['tahun']);
        $this->db->join('kegiatan', 'kegiatan.bidang_kode = bidang.bidang_kode', 'left');
        $this->db->where('kegiatan.id_opd', $post['id_opd']);
        $this->db->group_by(array("bidang.bidang_kode"), "asc");
        $data = $this->db->get("bidang")->result_array();
        return $data;
    }

}