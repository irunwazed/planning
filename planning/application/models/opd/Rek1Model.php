<?php

class Rek1Model extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2000;
        $this->table = 'tb_monev_lra_rek1';
    }

    public function setQuery($post){
        
                                    
        $this->db->join('tb_rpjmd', 'tb_rpjmd.id_tb_rpjmd = '.$this->table.'.id_tb_rpjmd', 'left');
        $this->db->join('tb_rekening1', 'tb_rekening1.tb_rekening1_kode = '.$this->table.'.tb_rekening1_kode', 'left');
        
        $this->db->where($this->table.'.id_tb_rpjmd', $this->session->rpjmd);

        $kodeOpd = explode("-", $this->session->kodeOpd);
        $this->db->where($this->table.'.tb_urusan_kode', $kodeOpd[0]);
        $this->db->where($this->table.'.tb_bidang_kode', $kodeOpd[1]);
        $this->db->where($this->table.'.tb_unit_kode', $kodeOpd[2]);
        $this->db->where($this->table.'.tb_sub_unit_kode', $kodeOpd[3]);
        
    }

    public function getCount($post = array()){

        $this->setQuery($post);
        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($post){
        
        $jumlah = $this->jumlah;
        $awal = (@$post['page'] - 1)*$jumlah;

        $this->setQuery($post);
        $this->db->limit($jumlah,$awal); 
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        if($this->cekInput($post)){

            $kodeOpd = explode("-", $this->session->kodeOpd);
            $kode = explode("-", $post['kode']);
            $setKode = $this->getLastKode();
            $data = array(
                'tb_monev_lra_kode' => $setKode,
                'id_tb_rpjmd' => $this->session->rpjmd,
                'tb_urusan_kode' => $kodeOpd[0],
                'tb_bidang_kode' => $kodeOpd[1],
                'tb_unit_kode' => $kodeOpd[2],
                'tb_sub_unit_kode' => $kodeOpd[3],
                'tb_rekening1_kode' => 5,
                'tb_monev_lra_rek1_tahun' => $post['tb_monev_lra_rek1_tahun'],
                'tb_monev_lra_rek1_bulan' => $post['tb_monev_lra_rek1_bulan'],
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
                'tb_rekening1_kode' => 5,
                'tb_monev_lra_rek1_tahun' => $post['tb_monev_lra_rek1_tahun'],
                'tb_monev_lra_rek1_bulan' => $post['tb_monev_lra_rek1_bulan'],
            );

            $kodeOpd = explode("-", $this->session->kodeOpd);
            $kode = explode("-", $post['kode']);
            $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
            $this->db->where('tb_monev_lra_kode', $kode[0]);
            $this->db->where('tb_urusan_kode', $kodeOpd[0]);
            $this->db->where('tb_bidang_kode', $kodeOpd[1]);
            $this->db->where('tb_unit_kode', $kodeOpd[2]);
            $this->db->where('tb_sub_unit_kode', $kodeOpd[3]);
            $this->db->where('tb_rekening1_kode', 5);
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
            $kodeOpd = explode("-", $this->session->kodeOpd);
            $kode = explode("-", $post['kode']);
            $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
            $this->db->where('tb_monev_lra_kode', $kode[0]);
            $this->db->where('tb_urusan_kode', $kodeOpd[0]);
            $this->db->where('tb_bidang_kode', $kodeOpd[1]);
            $this->db->where('tb_unit_kode', $kodeOpd[2]);
            $this->db->where('tb_sub_unit_kode', $kodeOpd[3]);
            $this->db->where('tb_rekening1_kode', 5);
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
        
        return true;
    }

    
    public function getLastKode(){

        $this->db->order_by($this->table.".tb_monev_lra_kode", "DESC");
        $data = $this->db->get($this->table)->result_array();

        $setKode = @$data[0]['tb_monev_bulanan_kode']+1;
        return $setKode;

    }

}