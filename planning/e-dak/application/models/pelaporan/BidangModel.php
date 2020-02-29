<?php

class BidangModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'bidang';
    }

    public function setQuery($post){
        
        $this->db->select($this->table.".*");
        $this->db->where($this->table.'.tahun', $post['tahun']);
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
                for($i = 0; $i < count($post['userKode']); $i++){
                    if($i == 0){
                        $this->db->where('bidang.bidang_kode', $post['userKode'][$i]['bidang_kode']);
                    }else{
                        $this->db->or_where('bidang.bidang_kode', $post['userKode'][$i]['bidang_kode']);
                    }
                }
            }
            
        }
        
        $this->db->group_by(array($this->table.".bidang_kode", $this->table.".tahun"), "asc");
    }

    public function getCount($search = '', $post = array()){

        $this->setQuery($post);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($page = 1, $search = '', $post = array()){
        $jumlah = $this->jumlah;
        $awal = ($page - 1)*$jumlah;

        $this->setQuery($post);
        
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        
        if($this->cekInput($post)){
            $data = array(
                'tahun' => $post['tahun'],
                'bidang_kode' => $post['bidang_kode'],
                'bidang_nama' => $post['bidang_nama'],
                'id_indikator' => $post['id_indikator'],
            );
            $status = $this->db->insert($this->table, $data);
            if($status)
                $pesan = "Berhasil Menambah Data";
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        
        if($this->cekInput($post)){

            $data = array(
                'tahun' => $post['tahun'],
                'bidang_kode' => $post['bidang_kode'],
                'bidang_nama' => $post['bidang_nama'],
                'id_indikator' => $post['id_indikator'],
            );
            $kode = explode('-', $post['kode']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
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

    public function delete($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menghapus Data";
        $status = False;
        
        if($this->cekInput($post)){
            $kode = explode('-', $post['kode']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
            $status = $this->db->delete($this->table);
            if($status)
                $pesan = "Berhasil Menghapus Data";
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }
    
    public function cekInput($post){
        //ruang filter

        // $query = $this->db->get($this->table);
        return true;
    }

    public function setVerifikasiBappeda($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        if($this->cekInput($post)){

            if($_SESSION['level'] == 2){
                // $this->load->model('pelaporan/DataModel');
                // $post['userKode'] = @$this->DataModel->getUserKode($_SESSION['id'], $_SESSION['level']);
            
                // $this->db->where('bidang.id_indikator', $post['userKode']);
                // $this->db->where('bidang.bidang_verifikasi', 1);
                // $dataBidang = $this->db->get($this->table)->result_array();
                // foreach($dataBidang as $row){
                    // print_r($post);
                    if($post['status'] == 1){
                        $status = 1;
                    }else if($post['status'] == 2){
                        $status = 2;
                    }
                    $kode = explode("-", $post['kode']);

                    $data = array(
                        'bidang_verifikasi_bappeda' => $status,
                    );
                    $this->db->where('tahun', $kode[0]);
                    $this->db->where('bidang_kode', $kode[1]);
                    $status = $this->db->update($this->table, $data);
                // }
                
                if($status)
                    $pesan = "Berhasil Mengirim Data";
            
            }

            
            
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function setVerifikasi($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        
        if($this->cekInput($post)){

            if($post['status'] == 1){
                $status = 1;
            }else if($post['status'] == 2){
                $status = 2;
            }

            $data = array(
                'bidang_verifikasi' => $status,
            );
            $kode = explode('-', $post['kode']);
            // print_r($post);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
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

    public function setTtd($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Tanda Tangan!";
        $status = False;
        
        if($this->cekInput($post)){
            $tahun = 2019;
            $triwulan = @$post['triwulan']?$post['triwulan'] :1;
            $data = array(
                'ttd'.$triwulan => 1,
            );
            $this->db->where('tahun', $tahun);
            $status = $this->db->update($this->table, array('ttd'.$triwulan => 0));
            $this->db->where('tahun', $tahun);
            $this->db->where('bidang.bidang_verifikasi', 1);
            $this->db->where('bidang.bidang_verifikasi_bappeda', 1);
            $dataBidang = $this->db->get($this->table)->result_array();
            foreach($dataBidang as $row){
                $this->db->where('tahun', $tahun);
                $this->db->where('bidang_kode', $row['bidang_kode']);
                $status = $this->db->update($this->table, $data);
            }

            if($status)
                $pesan = "Berhasil Tanda Tangan!";
            
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }
    

}