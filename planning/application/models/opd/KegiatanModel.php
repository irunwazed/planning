<?php

class KegiatanModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2000;
        $this->table = 'tb_rpjmd_kegiatan';
        
        $this->load->library('Filter');
        $jenis = $this->filter->getJenisRpjmd();
        if($jenis == 2){
            $this->table = 'tb_rpjmd_kegiatan_penetapan';
        }else if($jenis == 3){
            $this->table = 'tb_rpjmd_kegiatan_perubahan';
        }
    }

    public function setQuery($post){
        
        $this->db->join('tb_kegiatan', 'tb_kegiatan.tb_urusan_kode = '.$this->table.'.tb_urusan_kode
                                    AND tb_kegiatan.tb_bidang_kode = '.$this->table.'.tb_bidang_kode
                                    AND tb_kegiatan.tb_program_kode = '.$this->table.'.tb_program_kode
                                    AND tb_kegiatan.tb_kegiatan_kode = '.$this->table.'.tb_kegiatan_kode', 'left');
                                    
        $this->db->join('tb_satuan', 'tb_satuan.id_tb_satuan = '.$this->table.'.id_tb_satuan', 'left');
        $kodeOpd = explode("-", $this->session->kodeOpd);
        $this->db->where($this->table.'.id_tb_rpjmd', $this->session->rpjmd);

        $kode = explode("-", @$post['kode']);
        
        $this->db->where($this->table.'.tb_rpjmd_misi_kode', $kode[0]);
        $this->db->where($this->table.'.tb_rpjmd_tujuan_kode', $kode[1]);
        $this->db->where($this->table.'.tb_rpjmd_sasaran_kode', $kode[2]);
        $this->db->where($this->table.'.tb_program_kode', $kode[7]);

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
            
            $post['tb_rpjmd_kegiatan_th_awal_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th_awal_target_realisasi']);
            // $post['tb_rpjmd_kegiatan_th_akhir_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th_akhir_target_realisasi']);
            $post['tb_rpjmd_kegiatan_th1_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th1_target_realisasi']);
            $post['tb_rpjmd_kegiatan_th2_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th2_target_realisasi']);
            $post['tb_rpjmd_kegiatan_th3_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th3_target_realisasi']);
            $post['tb_rpjmd_kegiatan_th4_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th4_target_realisasi']);
            $post['tb_rpjmd_kegiatan_th5_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th5_target_realisasi']);

            $kode = explode("-", $post['kode']);
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
                'tb_kegiatan_kode' => $post['tb_kegiatan_kode'],
                'tb_rpjmd_kegiatan_indikator' => $post['tb_rpjmd_kegiatan_indikator'],
                'tb_rpjmd_kegiatan_th1_target_kinerja' => $post['tb_rpjmd_kegiatan_th1_target_kinerja'],
                'tb_rpjmd_kegiatan_th2_target_kinerja' => $post['tb_rpjmd_kegiatan_th2_target_kinerja'],
                'tb_rpjmd_kegiatan_th3_target_kinerja' => $post['tb_rpjmd_kegiatan_th3_target_kinerja'],
                'tb_rpjmd_kegiatan_th4_target_kinerja' => $post['tb_rpjmd_kegiatan_th4_target_kinerja'],
                'tb_rpjmd_kegiatan_th5_target_kinerja' => $post['tb_rpjmd_kegiatan_th5_target_kinerja'],
                'tb_rpjmd_kegiatan_th1_target_realisasi' => $post['tb_rpjmd_kegiatan_th1_target_realisasi'],
                'tb_rpjmd_kegiatan_th2_target_realisasi' => $post['tb_rpjmd_kegiatan_th2_target_realisasi'],
                'tb_rpjmd_kegiatan_th3_target_realisasi' => $post['tb_rpjmd_kegiatan_th3_target_realisasi'],
                'tb_rpjmd_kegiatan_th4_target_realisasi' => $post['tb_rpjmd_kegiatan_th4_target_realisasi'],
                'tb_rpjmd_kegiatan_th5_target_realisasi' => $post['tb_rpjmd_kegiatan_th5_target_realisasi'],
                'tb_rpjmd_kegiatan_th_awal_target_kinerja' => $post['tb_rpjmd_kegiatan_th_awal_target_kinerja'],
                'tb_rpjmd_kegiatan_th_awal_target_realisasi' => $post['tb_rpjmd_kegiatan_th_awal_target_realisasi'],
                // 'tb_rpjmd_kegiatan_th_akhir_target_kinerja' => $post['tb_rpjmd_kegiatan_th_akhir_target_kinerja'],
                // 'tb_rpjmd_kegiatan_th_akhir_target_realisasi' => $post['tb_rpjmd_kegiatan_th_akhir_target_realisasi'],
                'id_tb_satuan' => $post['id_tb_satuan'],
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

            $post['tb_rpjmd_kegiatan_th_awal_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th_awal_target_realisasi']);
            // $post['tb_rpjmd_kegiatan_th_akhir_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th_akhir_target_realisasi']);
            $post['tb_rpjmd_kegiatan_th1_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th1_target_realisasi']);
            $post['tb_rpjmd_kegiatan_th2_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th2_target_realisasi']);
            $post['tb_rpjmd_kegiatan_th3_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th3_target_realisasi']);
            $post['tb_rpjmd_kegiatan_th4_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th4_target_realisasi']);
            $post['tb_rpjmd_kegiatan_th5_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_kegiatan_th5_target_realisasi']);

            $data = array(
                'tb_kegiatan_kode' => $post['tb_kegiatan_kode'],
                'tb_rpjmd_kegiatan_indikator' => $post['tb_rpjmd_kegiatan_indikator'],
                'tb_rpjmd_kegiatan_th1_target_kinerja' => $post['tb_rpjmd_kegiatan_th1_target_kinerja'],
                'tb_rpjmd_kegiatan_th2_target_kinerja' => $post['tb_rpjmd_kegiatan_th2_target_kinerja'],
                'tb_rpjmd_kegiatan_th3_target_kinerja' => $post['tb_rpjmd_kegiatan_th3_target_kinerja'],
                'tb_rpjmd_kegiatan_th4_target_kinerja' => $post['tb_rpjmd_kegiatan_th4_target_kinerja'],
                'tb_rpjmd_kegiatan_th5_target_kinerja' => $post['tb_rpjmd_kegiatan_th5_target_kinerja'],
                'tb_rpjmd_kegiatan_th1_target_realisasi' => $post['tb_rpjmd_kegiatan_th1_target_realisasi'],
                'tb_rpjmd_kegiatan_th2_target_realisasi' => $post['tb_rpjmd_kegiatan_th2_target_realisasi'],
                'tb_rpjmd_kegiatan_th3_target_realisasi' => $post['tb_rpjmd_kegiatan_th3_target_realisasi'],
                'tb_rpjmd_kegiatan_th4_target_realisasi' => $post['tb_rpjmd_kegiatan_th4_target_realisasi'],
                'tb_rpjmd_kegiatan_th5_target_realisasi' => $post['tb_rpjmd_kegiatan_th5_target_realisasi'],
                'tb_rpjmd_kegiatan_th_awal_target_kinerja' => $post['tb_rpjmd_kegiatan_th_awal_target_kinerja'],
                'tb_rpjmd_kegiatan_th_awal_target_realisasi' => $post['tb_rpjmd_kegiatan_th_awal_target_realisasi'],
                // 'tb_rpjmd_kegiatan_th_akhir_target_kinerja' => $post['tb_rpjmd_kegiatan_th_akhir_target_kinerja'],
                // 'tb_rpjmd_kegiatan_th_akhir_target_realisasi' => $post['tb_rpjmd_kegiatan_th_akhir_target_realisasi'],
                'id_tb_satuan' => $post['id_tb_satuan'],
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


}