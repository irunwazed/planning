<?php

class ProgramModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2000;
        $this->table = 'tb_rpjmd_program';

        $this->load->library('Filter');
        $jenis = $this->filter->getJenisRpjmd();
        if($jenis == 2){
            $this->table = 'tb_rpjmd_program_penetapan';
        }else if($jenis == 3){
            $this->table = 'tb_rpjmd_program_perubahan';
        }
        
    }

    public function setQuery($post){
        
        $kode = explode("-", $post['kode']);

        $this->db->join('tb_program', 'tb_program.tb_urusan_kode = '.$this->table.'.tb_urusan_kode
                                    AND tb_program.tb_bidang_kode = '.$this->table.'.tb_bidang_kode
                                    AND tb_program.tb_program_kode = '.$this->table.'.tb_program_kode', 'left');
        $this->db->join('tb_satuan', 'tb_satuan.id_tb_satuan = '.$this->table.'.id_tb_satuan', 'left');

        $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
        $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
        $this->db->where('tb_rpjmd_tujuan_kode', $kode[1]);
        $this->db->where('tb_rpjmd_sasaran_kode', $kode[2]);
        $this->db->where($this->table.'.tb_urusan_kode', $kode[3]);
        $this->db->where($this->table.'.tb_bidang_kode', $kode[4]);
        $this->db->where($this->table.'.tb_unit_kode', $kode[5]);
        $this->db->where($this->table.'.tb_sub_unit_kode', $kode[6]);
        
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

            $post['tb_rpjmd_program_th_awal_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th_awal_target_realisasi']);
            // $post['tb_rpjmd_program_th_akhir_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th_akhir_target_realisasi']);
            $post['tb_rpjmd_program_th1_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th1_target_realisasi']);
            $post['tb_rpjmd_program_th2_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th2_target_realisasi']);
            $post['tb_rpjmd_program_th3_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th3_target_realisasi']);
            $post['tb_rpjmd_program_th4_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th4_target_realisasi']);
            $post['tb_rpjmd_program_th5_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th5_target_realisasi']);

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
                'tb_program_kode' => $post['tb_program_kode'],
                'tb_rpjmd_program_indikator' => $post['tb_rpjmd_program_indikator'],
                'tb_rpjmd_program_th1_target_kinerja' => $post['tb_rpjmd_program_th1_target_kinerja'],
                'tb_rpjmd_program_th2_target_kinerja' => $post['tb_rpjmd_program_th2_target_kinerja'],
                'tb_rpjmd_program_th3_target_kinerja' => $post['tb_rpjmd_program_th3_target_kinerja'],
                'tb_rpjmd_program_th4_target_kinerja' => $post['tb_rpjmd_program_th4_target_kinerja'],
                'tb_rpjmd_program_th5_target_kinerja' => $post['tb_rpjmd_program_th5_target_kinerja'],
                'tb_rpjmd_program_th1_target_realisasi' => $post['tb_rpjmd_program_th1_target_realisasi'],
                'tb_rpjmd_program_th2_target_realisasi' => $post['tb_rpjmd_program_th2_target_realisasi'],
                'tb_rpjmd_program_th3_target_realisasi' => $post['tb_rpjmd_program_th3_target_realisasi'],
                'tb_rpjmd_program_th4_target_realisasi' => $post['tb_rpjmd_program_th4_target_realisasi'],
                'tb_rpjmd_program_th5_target_realisasi' => $post['tb_rpjmd_program_th5_target_realisasi'],
                'tb_rpjmd_program_th_awal_target_kinerja' => $post['tb_rpjmd_program_th_awal_target_kinerja'],
                // 'tb_rpjmd_program_th_akhir_target_kinerja' => $post['tb_rpjmd_program_th_akhir_target_kinerja'],
                'tb_rpjmd_program_th_awal_target_realisasi' => $post['tb_rpjmd_program_th_awal_target_realisasi'],
                // 'tb_rpjmd_program_th_akhir_target_realisasi' => $post['tb_rpjmd_program_th_akhir_target_realisasi'],
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

            $post['tb_rpjmd_program_th_awal_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th_awal_target_realisasi']);
            // $post['tb_rpjmd_program_th_akhir_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th_akhir_target_realisasi']);
            $post['tb_rpjmd_program_th1_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th1_target_realisasi']);
            $post['tb_rpjmd_program_th2_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th2_target_realisasi']);
            $post['tb_rpjmd_program_th3_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th3_target_realisasi']);
            $post['tb_rpjmd_program_th4_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th4_target_realisasi']);
            $post['tb_rpjmd_program_th5_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_program_th5_target_realisasi']);

            $data = array(
                'tb_program_kode' => $post['tb_program_kode'],
                'tb_rpjmd_program_indikator' => $post['tb_rpjmd_program_indikator'],
                'tb_rpjmd_program_th1_target_kinerja' => $post['tb_rpjmd_program_th1_target_kinerja'],
                'tb_rpjmd_program_th2_target_kinerja' => $post['tb_rpjmd_program_th2_target_kinerja'],
                'tb_rpjmd_program_th3_target_kinerja' => $post['tb_rpjmd_program_th3_target_kinerja'],
                'tb_rpjmd_program_th4_target_kinerja' => $post['tb_rpjmd_program_th4_target_kinerja'],
                'tb_rpjmd_program_th5_target_kinerja' => $post['tb_rpjmd_program_th5_target_kinerja'],
                'tb_rpjmd_program_th1_target_realisasi' => $post['tb_rpjmd_program_th1_target_realisasi'],
                'tb_rpjmd_program_th2_target_realisasi' => $post['tb_rpjmd_program_th2_target_realisasi'],
                'tb_rpjmd_program_th3_target_realisasi' => $post['tb_rpjmd_program_th3_target_realisasi'],
                'tb_rpjmd_program_th4_target_realisasi' => $post['tb_rpjmd_program_th4_target_realisasi'],
                'tb_rpjmd_program_th5_target_realisasi' => $post['tb_rpjmd_program_th5_target_realisasi'],
                'tb_rpjmd_program_th_awal_target_kinerja' => $post['tb_rpjmd_program_th_awal_target_kinerja'],
                // 'tb_rpjmd_program_th_akhir_target_kinerja' => $post['tb_rpjmd_program_th_akhir_target_kinerja'],
                'tb_rpjmd_program_th_awal_target_realisasi' => $post['tb_rpjmd_program_th_awal_target_realisasi'],
                // 'tb_rpjmd_program_th_akhir_target_realisasi' => $post['tb_rpjmd_program_th_akhir_target_realisasi'],
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