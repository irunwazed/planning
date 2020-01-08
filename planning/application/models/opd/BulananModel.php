<?php

class BulananModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2000;
        $this->table = 'tb_monev_bulanan';
        
        $this->load->library('Filter');
        $jenis = $this->filter->getJenisRpjmd();
        if($jenis == 2){
            $this->table = 'tb_monev_bulanan_penetapan';
        }else if($jenis == 3){
            $this->table = 'tb_monev_bulanan_perubahan';
        }
    }

    public function setQuery($post){
        
        
        $kodeOpd = explode("-", $this->session->kodeOpd);
        $this->db->where($this->table.'.id_tb_rpjmd', $this->session->rpjmd);

        $kode = explode("-", @$post['kode']);
        
        $this->db->where($this->table.'.tb_rpjmd_misi_kode', $kode[0]);
        $this->db->where($this->table.'.tb_rpjmd_tujuan_kode', $kode[1]);
        $this->db->where($this->table.'.tb_rpjmd_sasaran_kode', $kode[2]);
        $this->db->where($this->table.'.tb_program_kode', $kode[7]);
        $this->db->where($this->table.'.tb_kegiatan_kode', $kode[8]);

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
            
            $post['tb_monev_bulanan_anggaran'] = $this->fungsi->convert_to_number($post['tb_monev_bulanan_anggaran']);
            $post['tb_monev_bulanan_realisasi'] = $this->fungsi->convert_to_number($post['tb_monev_bulanan_realisasi']);

            $kode = explode("-", $post['kode']);
            $setKode = $this->getLastKode($kode);
            $data = array(
                'id_tb_rpjmd' => $this->session->rpjmd,
                'tb_rpjmd_misi_kode' => $kode[0],
                'tb_rpjmd_tujuan_kode' => $kode[1],
                'tb_rpjmd_sasaran_kode' => $kode[2],
                'tb_urusan_kode' => $kode[3],
                'tb_bidang_kode' => $kode[4],
                'tb_unit_kode' => $kode[5],
                'tb_sub_unit_kode' => $kode[6],
                'tb_program_kode' => $kode[7],
                'tb_kegiatan_kode' => $kode[8],
                'tb_monev_bulanan_kode' => $setKode,
                'tb_monev_bulanan_tahun' => $post['tb_monev_bulanan_tahun'],
                'tb_monev_bulanan_bulan' => $post['tb_monev_bulanan_bulan'],
                'tb_monev_bulanan_kinerja' => $post['tb_monev_bulanan_kinerja'],
                'tb_monev_bulanan_anggaran' => $post['tb_monev_bulanan_anggaran'],
                'tb_monev_bulanan_realisasi' => $post['tb_monev_bulanan_realisasi'],
                'tb_monev_bulanan_fisik' => $post['tb_monev_bulanan_fisik'],
                'tb_monev_bulanan_pelaksana' => $post['tb_monev_bulanan_pelaksana'],
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

            $post['tb_monev_bulanan_anggaran'] = $this->fungsi->convert_to_number($post['tb_monev_bulanan_anggaran']);
            $post['tb_monev_bulanan_realisasi'] = $this->fungsi->convert_to_number($post['tb_monev_bulanan_realisasi']);

            $data = array(
                'tb_monev_bulanan_tahun' => $post['tb_monev_bulanan_tahun'],
                'tb_monev_bulanan_bulan' => $post['tb_monev_bulanan_bulan'],
                'tb_monev_bulanan_kinerja' => $post['tb_monev_bulanan_kinerja'],
                'tb_monev_bulanan_anggaran' => $post['tb_monev_bulanan_anggaran'],
                'tb_monev_bulanan_realisasi' => $post['tb_monev_bulanan_realisasi'],
                'tb_monev_bulanan_fisik' => $post['tb_monev_bulanan_fisik'],
                'tb_monev_bulanan_pelaksana' => $post['tb_monev_bulanan_pelaksana'],
            );

            $kode = explode("-", $post['kode']);
            $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
            $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
            $this->db->where('tb_rpjmd_tujuan_kode', $kode[1]);
            $this->db->where('tb_rpjmd_sasaran_kode', $kode[2]);
            $this->db->where('tb_urusan_kode', $kode[3]);
            $this->db->where('tb_bidang_kode', $kode[4]);
            $this->db->where('tb_unit_kode', $kode[5]);
            $this->db->where('tb_sub_unit_kode', $kode[6]);
            $this->db->where('tb_program_kode', $kode[7]);
            $this->db->where('tb_kegiatan_kode', $kode[8]);
            $this->db->where('tb_monev_bulanan_kode', $kode[9]);
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
            $kode = explode("-", $post['kode']);
            $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
            $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
            $this->db->where('tb_rpjmd_tujuan_kode', $kode[1]);
            $this->db->where('tb_rpjmd_sasaran_kode', $kode[2]);
            $this->db->where('tb_urusan_kode', $kode[3]);
            $this->db->where('tb_bidang_kode', $kode[4]);
            $this->db->where('tb_unit_kode', $kode[5]);
            $this->db->where('tb_sub_unit_kode', $kode[6]);
            $this->db->where('tb_program_kode', $kode[7]);
            $this->db->where('tb_kegiatan_kode', $kode[8]);
            $this->db->where('tb_monev_bulanan_kode', $kode[9]);
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

    public function getLastKode($kode){
        $setKode = 1;
        $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
        $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
        $this->db->where('tb_rpjmd_tujuan_kode', $kode[1]);
        $this->db->where('tb_rpjmd_sasaran_kode', $kode[2]);
        $this->db->where('tb_urusan_kode', $kode[3]);
        $this->db->where('tb_bidang_kode', $kode[4]);
        $this->db->where('tb_unit_kode', $kode[5]);
        $this->db->where('tb_sub_unit_kode', $kode[6]);
        $this->db->where('tb_program_kode', $kode[7]);
        $this->db->where('tb_kegiatan_kode', $kode[8]);
        $this->db->order_by($this->table.".tb_monev_bulanan_kode", "DESC");
        $data = $this->db->get($this->table)->result_array();

        $setKode = @$data[0]['tb_monev_bulanan_kode']+1;
        return $setKode;

    }


}