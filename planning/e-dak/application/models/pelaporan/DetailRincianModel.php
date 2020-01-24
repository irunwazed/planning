<?php

class DetailRincianModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'detail_rincian';
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function setQuery($post){
        // $this->db->select('detail_rincian.*');
        
        $this->db->join('satuan', 'satuan.id_satuan = detail_rincian.id_satuan', 'left');
        $this->db->join('masalah', 'masalah.id_masalah = detail_rincian.id_masalah', 'left');
        // print_r($post);
        $kode = explode('-', $post['kode']);
        $this->db->where($this->table.'.tahun', $kode[0]);
        $this->db->where($this->table.'.bidang_kode', $kode[1]);
        $this->db->where($this->table.'.sub_bidang_kode', $kode[2]);
        $this->db->where($this->table.'.kegiatan_kode', $kode[3]);
        $this->db->where($this->table.'.rincian_kode', $kode[4]);

        $this->db->order_by($this->table.".detail_rincian_kode", "asc");
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
            $kode = explode('-', $post['kode']);
            $data = array(
                'tahun' => $kode[0],
                'bidang_kode' => $kode[1],
                'sub_bidang_kode' => $kode[2],
                'kegiatan_kode' => $kode[3],
                'rincian_kode' => $kode[4],
                'detail_rincian_kode' => $post['detail_rincian_kode'],
                'detail_rincian_nama' => $post['detail_rincian_nama'],
                'detail_rincian_volume' => $post['detail_rincian_volume'],
                'id_satuan' => $post['id_satuan'],
                'detail_rincian_penerima_manfaat' => $post['detail_rincian_penerima_manfaat'],
                'detail_rincian_pagu' => $post['detail_rincian_pagu'],
                'detail_rincian_pelaksanaan_jenis' => $post['detail_rincian_pelaksanaan_jenis'],
                'detail_rincian_swakelola_volume' => @$post['detail_rincian_swakelola_volume']?$post['detail_rincian_swakelola_volume']:0,
                'detail_rincian_swakelola_rp' => @$post['detail_rincian_swakelola_rp']?$post['detail_rincian_swakelola_rp']:0,
                'detail_rincian_konstraktual_volume' => @$post['detail_rincian_konstraktual_volume']?$post['detail_rincian_konstraktual_volume']:0,
                'detail_rincian_konstraktual_rp' => @$post['detail_rincian_konstraktual_rp']?$post['detail_rincian_konstraktual_rp']:0,
                'detail_rincian_pembayaran' => $post['detail_rincian_pembayaran'],
                'detail_rincian_tw1_keuangan_rp' => 0,
                'detail_rincian_tw1_fisik_volume' => 0,
                'detail_rincian_tw1_fisik_persen' => 0,
                'detail_rincian_tw2_keuangan_rp' => 0,
                'detail_rincian_tw2_fisik_volume' => 0,
                'detail_rincian_tw2_fisik_persen' => 0,
                'detail_rincian_tw3_keuangan_rp' => 0,
                'detail_rincian_tw3_fisik_volume' => 0,
                'detail_rincian_tw3_fisik_persen' => 0,
                'detail_rincian_tw4_keuangan_rp' => 0,
                'detail_rincian_tw4_fisik_volume' => 0,
                'detail_rincian_tw4_fisik_persen' => 0,
                'id_masalah' => $post['id_masalah'],
            );
            $status = $this->db->insert($this->table, $data);
            if($status)
                $pesan = "Berhasil Menambah Data";
        }else{
            $pesan = "Gagal Menambah Data, Kode Telah Digunakan";
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
        
        if(true){

            $data = array(
                'detail_rincian_kode' => $post['detail_rincian_kode'],
                'detail_rincian_nama' => $post['detail_rincian_nama'],
                'detail_rincian_volume' => $post['detail_rincian_volume'],
                'id_satuan' => $post['id_satuan'],
                'detail_rincian_penerima_manfaat' => $post['detail_rincian_penerima_manfaat'],
                'detail_rincian_pagu' => $post['detail_rincian_pagu'],
                'detail_rincian_pelaksanaan_jenis' => $post['detail_rincian_pelaksanaan_jenis'],
                'detail_rincian_swakelola_volume' => @$post['detail_rincian_swakelola_volume']?$post['detail_rincian_swakelola_volume']:0,
                'detail_rincian_swakelola_rp' => @$post['detail_rincian_swakelola_rp']?$post['detail_rincian_swakelola_rp']:0,
                'detail_rincian_konstraktual_volume' => @$post['detail_rincian_konstraktual_volume']?$post['detail_rincian_konstraktual_volume']:0,
                'detail_rincian_konstraktual_rp' => @$post['detail_rincian_konstraktual_rp']?$post['detail_rincian_konstraktual_rp']:0,
                'detail_rincian_pembayaran' => $post['detail_rincian_pembayaran'],
                'id_masalah' => $post['id_masalah'],
            );
            $kode = explode('-', $post['kode']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
            $this->db->where('sub_bidang_kode', $kode[2]);
            $this->db->where('kegiatan_kode', $kode[3]);
            $this->db->where('rincian_kode', $kode[4]);
            $this->db->where('detail_rincian_kode', $kode[5]);
            $status = $this->db->update($this->table, $data);
            if($status)
                $pesan = "Berhasil Mengubah Data";
            
        }else{
            $pesan = "Gagal Mengubah Data, Kode Telah Digunakan";
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
        
        if(true){
            $kode = explode('-', $post['kode']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
            $this->db->where('sub_bidang_kode', $kode[2]);
            $this->db->where('kegiatan_kode', $kode[3]);
            $this->db->where('rincian_kode', $kode[4]);
            $this->db->where('detail_rincian_kode', $kode[5]);
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
        $kode = explode('-', $post['kode']);
        $data = array(
            'tahun' => $kode[0],
            'bidang_kode' => $kode[1],
            'sub_bidang_kode' => $kode[2],
            'kegiatan_kode' => $kode[3],
            'rincian_kode' => $kode[4],
            'detail_rincian_kode' => $post['detail_rincian_kode'],
        );

        $this->db->where($data);
        $num = $this->db->get($this->table)->num_rows();

        if($num == 0){
            return True;
        }
        
        return false;
    }
    
    function setTriwulan($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        
        if(true){
            $triwulan = $post['triwulan'];
            $data = array(
                'detail_rincian_tw'.$triwulan.'_keuangan_rp' => $post['detail_rincian_tw'.$triwulan.'_keuangan_rp'],
                'detail_rincian_tw'.$triwulan.'_fisik_volume' => $post['detail_rincian_tw'.$triwulan.'_fisik_volume'],
                'detail_rincian_tw'.$triwulan.'_fisik_persen' => $post['detail_rincian_tw'.$triwulan.'_fisik_persen'],
            );
            $kode = explode('-', $post['kode_triwulan']);
            $this->db->where('tahun', $kode[0]);
            $this->db->where('bidang_kode', $kode[1]);
            $this->db->where('sub_bidang_kode', $kode[2]);
            $this->db->where('kegiatan_kode', $kode[3]);
            $this->db->where('rincian_kode', $kode[4]);
            $this->db->where('detail_rincian_kode', $kode[5]);
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