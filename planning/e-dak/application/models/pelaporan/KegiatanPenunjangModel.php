<?php

class KegiatanPenunjangModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'kegiatan_penunjang';
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function setQuery($post){


        $this->db->join('satuan', 'satuan.id_satuan = kegiatan_penunjang.id_satuan', 'left');

        $this->db->join('masalah', 'masalah.id_masalah = kegiatan_penunjang.id_masalah', 'left');
        // print_r($post);
        $kode = explode('-', $post['kode']);
        $this->db->where('tahun', $kode[0]);
        $this->db->where('bidang_kode', $kode[1]);
        $this->db->where('sub_bidang_kode', $kode[2]);
        $this->db->order_by("kegiatan_penunjang_kode", "asc");
    }

    public function getCount($search = '', $post = array()){

        $this->setQuery($post);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }


    public function getAll($page = 1, $search = '', $post = array()){
        $jumlah = $this->jumlah;
        $awal = ($page - 1)*$jumlah;

        $this->setQuery($post);
        // $this->db->limit($jumlah,$awal); 
        
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        
        if($this->cekInput($post)){
            $kode = explode('-', $post['kode2']);
            $data = array(
                'tahun' => $kode[0],
                'bidang_kode' => $kode[1],
                'sub_bidang_kode' => $kode[2],
                'kegiatan_penunjang_kode' => $post['kegiatan_penunjang_kode'],
                'kegiatan_penunjang_nama' => $post['kegiatan_penunjang_nama'],
                'kegiatan_penunjang_volume' => $post['kegiatan_penunjang_volume'],
                'id_satuan' => $post['id_satuan'],
                'kegiatan_penunjang_penerima_manfaat' => $post['kegiatan_penunjang_penerima_manfaat'],
                'kegiatan_penunjang_pagu' => $post['kegiatan_penunjang_pagu'],
                'kegiatan_penunjang_jenis' => $post['kegiatan_penunjang_jenis'],
                'kegiatan_penunjang_swakelola_volume' => @$post['kegiatan_penunjang_swakelola_volume']?$post['kegiatan_penunjang_swakelola_volume']:0,
                'kegiatan_penunjang_swakelola_rp' => @$post['kegiatan_penunjang_swakelola_rp']?$post['kegiatan_penunjang_swakelola_rp']:0,
                'kegiatan_penunjang_konstraktual_volume' => @$post['kegiatan_penunjang_konstraktual_volume']?$post['kegiatan_penunjang_konstraktual_volume']:0,
                'kegiatan_penunjang_konstraktual_rp' => @$post['kegiatan_penunjang_konstraktual_rp']?$post['kegiatan_penunjang_konstraktual_rp']:0,
                'kegiatan_penunjang_pembayaran' => $post['kegiatan_penunjang_pembayaran'],
                'kegiatan_penunjang_tw1_keuangan_rp' => 0,
                'kegiatan_penunjang_tw1_fisik_volume' => 0,
                'kegiatan_penunjang_tw1_fisik_persen' => 0,
                'kegiatan_penunjang_tw2_keuangan_rp' => 0,
                'kegiatan_penunjang_tw2_fisik_volume' => 0,
                'kegiatan_penunjang_tw2_fisik_persen' => 0,
                'kegiatan_penunjang_tw3_keuangan_rp' => 0,
                'kegiatan_penunjang_tw3_fisik_volume' => 0,
                'kegiatan_penunjang_tw3_fisik_persen' => 0,
                'kegiatan_penunjang_tw4_keuangan_rp' => 0,
                'kegiatan_penunjang_tw4_fisik_volume' => 0,
                'kegiatan_penunjang_tw4_fisik_persen' => 0,
                'id_masalah' => $post['id_masalah'],
                'id_jenis' => $post['id_jenis2'],
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
        print_r($post);
        if($this->cekInput($post)){

            $data = array(
                'kegiatan_penunjang_kode' => $post['kegiatan_penunjang_kode'],
                'kegiatan_penunjang_nama' => $post['kegiatan_penunjang_nama'],
                'kegiatan_penunjang_volume' => $post['kegiatan_penunjang_volume'],
                'id_satuan' => $post['id_satuan'],
                'kegiatan_penunjang_penerima_manfaat' => $post['kegiatan_penunjang_penerima_manfaat'],
                'kegiatan_penunjang_pagu' => $post['kegiatan_penunjang_pagu'],
                'kegiatan_penunjang_jenis' => $post['kegiatan_penunjang_jenis'],
                'kegiatan_penunjang_swakelola_volume' => @$post['kegiatan_penunjang_swakelola_volume']?$post['kegiatan_penunjang_swakelola_volume']:0,
                'kegiatan_penunjang_swakelola_rp' => @$post['kegiatan_penunjang_swakelola_rp']?$post['kegiatan_penunjang_swakelola_rp']:0,
                'kegiatan_penunjang_konstraktual_volume' => @$post['kegiatan_penunjang_konstraktual_volume']?$post['kegiatan_penunjang_konstraktual_volume']:0,
                'kegiatan_penunjang_konstraktual_rp' => @$post['kegiatan_penunjang_konstraktual_rp']?$post['kegiatan_penunjang_konstraktual_rp']:0,
                'kegiatan_penunjang_pembayaran' => $post['kegiatan_penunjang_pembayaran'],
                // 'kegiatan_penunjang_tw1_keuangan_rp' => $post['kegiatan_penunjang_tw1_keuangan_rp'],
                // 'kegiatan_penunjang_tw1_fisik_volume' => $post['kegiatan_penunjang_tw1_fisik_volume'],
                // 'kegiatan_penunjang_tw1_fisik_persen' => $post['kegiatan_penunjang_tw1_fisik_persen'],
                'id_masalah' => $post['id_masalah'],
                'id_jenis' => $post['id_jenis2'],
            );
            $kode = explode('-', $post['kode2']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
            $this->db->where('sub_bidang_kode', $kode[2]);
            $this->db->where('kegiatan_penunjang_kode', $kode[3]);
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
            $this->db->where('sub_bidang_kode', $kode[2]);
            $this->db->where('kegiatan_penunjang_kode', $kode[3]);
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

    function setTriwulan($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        
        if($this->cekInput($post)){
            $triwulan = $post['triwulan'];
            $data = array(
                'kegiatan_penunjang_tw'.$triwulan.'_keuangan_rp' => $post['kegiatan_penunjang_tw'.$triwulan.'_keuangan_rp'],
                'kegiatan_penunjang_tw'.$triwulan.'_fisik_volume' => $post['kegiatan_penunjang_tw'.$triwulan.'_fisik_volume'],
                'kegiatan_penunjang_tw'.$triwulan.'_fisik_persen' => $post['kegiatan_penunjang_tw'.$triwulan.'_fisik_persen'],
            );
            $kode = explode('-', $post['kode_triwulan']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
            $this->db->where('sub_bidang_kode', $kode[2]);
            $this->db->where('kegiatan_penunjang_kode', $kode[3]);
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
    

}