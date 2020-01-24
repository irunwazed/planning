<?php

class TujuanModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2000;
        $this->table = 'tb_rpjmd_tujuan';
    }

    public function setQuery($post){
        
        $kode = explode("-", $post['kode']);
        $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
        $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
        
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
        $data = $this->db->get($this->table)->result_array();

        for($i = 0; $i < count($data); $i++){
            $this->db->where('id_tb_rpjmd', $data[$i]['id_tb_rpjmd']);
            $this->db->where('tb_rpjmd_misi_kode', $data[$i]['tb_rpjmd_misi_kode']);
            $this->db->where('tb_rpjmd_tujuan_kode', $data[$i]['tb_rpjmd_tujuan_kode']);
            $data[$i]['indikator'] = $this->db->get('tb_rpjmd_tujuan_indikator')->result_array();
        }

        return $data;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        if($this->cekInput($post)){

            $kode = explode("-", $post['kode']);
            $data = array(
                'id_tb_rpjmd' => $this->session->rpjmd,
                'tb_rpjmd_misi_kode' => $kode[0],
                'tb_rpjmd_tujuan_kode' => $post['tb_rpjmd_tujuan_kode'],
                'tb_rpjmd_tujuan_nama' => $post['tb_rpjmd_tujuan_nama'],
                'tb_rpjmd_tujuan_indikator' => @$post['tb_rpjmd_tujuan_indikator'],
            );
            $status = $this->db->insert($this->table, $data);

            if($status)
                $pesan = "Berhasil Menambah Data";
        }else{
            $pesan = "Anda tidak dapat mengakses data. Mohon Hubungi Admin.";
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

            // $post['tb_rpjmd_tujuan_th_awal_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_tujuan_th_awal_target_realisasi']);
            // $post['tb_rpjmd_tujuan_th1_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_tujuan_th1_target_realisasi']);
            // $post['tb_rpjmd_tujuan_th2_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_tujuan_th2_target_realisasi']);
            // $post['tb_rpjmd_tujuan_th3_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_tujuan_th3_target_realisasi']);
            // $post['tb_rpjmd_tujuan_th4_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_tujuan_th4_target_realisasi']);
            // $post['tb_rpjmd_tujuan_th5_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_tujuan_th5_target_realisasi']);
            // $post['tb_rpjmd_tujuan_th_akhir_target_realisasi'] = $this->fungsi->convert_to_number($post['tb_rpjmd_tujuan_th_akhir_target_realisasi']);


            $data = array(
                'tb_rpjmd_tujuan_kode' => $post['tb_rpjmd_tujuan_kode'],
                'tb_rpjmd_tujuan_nama' => $post['tb_rpjmd_tujuan_nama'],
                'tb_rpjmd_tujuan_indikator' => @$post['tb_rpjmd_tujuan_indikator'],
                // 'tb_rpjmd_tujuan_th_awal_target_kinerja' => $post['tb_rpjmd_tujuan_th_awal_target_kinerja'],
                // 'tb_rpjmd_tujuan_th_awal_target_realisasi' => $post['tb_rpjmd_tujuan_th_awal_target_realisasi'],
                // 'tb_rpjmd_tujuan_th1_target_kinerja' => $post['tb_rpjmd_tujuan_th1_target_kinerja'],
                // 'tb_rpjmd_tujuan_th1_target_realisasi' => $post['tb_rpjmd_tujuan_th1_target_realisasi'],
                // 'tb_rpjmd_tujuan_th2_target_kinerja' => $post['tb_rpjmd_tujuan_th2_target_kinerja'],
                // 'tb_rpjmd_tujuan_th2_target_realisasi' => $post['tb_rpjmd_tujuan_th2_target_realisasi'],
                // 'tb_rpjmd_tujuan_th3_target_kinerja' => $post['tb_rpjmd_tujuan_th3_target_kinerja'],
                // 'tb_rpjmd_tujuan_th3_target_realisasi' => $post['tb_rpjmd_tujuan_th3_target_realisasi'],
                // 'tb_rpjmd_tujuan_th4_target_kinerja' => $post['tb_rpjmd_tujuan_th4_target_kinerja'],
                // 'tb_rpjmd_tujuan_th4_target_realisasi' => $post['tb_rpjmd_tujuan_th4_target_realisasi'],
                // 'tb_rpjmd_tujuan_th5_target_kinerja' => $post['tb_rpjmd_tujuan_th5_target_kinerja'],
                // 'tb_rpjmd_tujuan_th5_target_realisasi' => $post['tb_rpjmd_tujuan_th5_target_realisasi'],
                // 'tb_rpjmd_tujuan_th_akhir_target_kinerja' => $post['tb_rpjmd_tujuan_th_akhir_target_kinerja'],
                // 'tb_rpjmd_tujuan_th_akhir_target_realisasi' => $post['tb_rpjmd_tujuan_th_akhir_target_realisasi'],
            );

            $kode = explode("-", $post['kode']);
            $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
            $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
            $this->db->where('tb_rpjmd_tujuan_kode', $kode[1]);
            $status = $this->db->update($this->table, $data);
            if($status)
                $pesan = "Berhasil Mengubah Data";
        }else{
            $pesan = "Anda tidak dapat mengakses data. Mohon Hubungi Admin.";
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
            $status = $this->db->delete($this->table);
            if($status)
                $pesan = "Berhasil Menghapus Data";
        }else{
            $pesan = "Anda tidak dapat mengakses data. Mohon Hubungi Admin.";
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function setIndikator($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        if($this->cekInput($post)){

            $kode = explode("-", $post['kode-indikator']);
            
            $this->db->where('id_tb_rpjmd', $this->session->rpjmd);
            $this->db->where('tb_rpjmd_misi_kode', $kode[0]);
            $this->db->where('tb_rpjmd_tujuan_kode', $kode[1]);
            $status = $this->db->delete('tb_rpjmd_tujuan_indikator');
            $index = 1;
            foreach($post['tb_rpjmd_tujuan_indikator_nama'] as $row){
                $data = array(
                    'id_tb_rpjmd' => $this->session->rpjmd,
                    'tb_rpjmd_misi_kode' => $kode[0],
                    'tb_rpjmd_tujuan_kode' => $kode[1],
                    'tb_rpjmd_tujuan_indikator_kode' => $index,
                    'tb_rpjmd_tujuan_indikator_nama' => $row,
                );
                $status = $this->db->insert('tb_rpjmd_tujuan_indikator', $data);
                $index++;
            }

            if($status)
                $pesan = "Berhasil Menambah Data";
        }else{
            $pesan = "Anda tidak dapat mengakses data. Mohon Hubungi Admin.";
        }

        $kirim = array(
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }
    
    public function cekInput($post){
        
        $this->db->where('id_tb_user', $this->session->id);
        $data = $this->db->get('tb_user')->row();
 
        $jalan = false;
        $hak = json_decode(@$data->tb_user_hak, true);
        if(@$hak['rpjmd']['tujuan'])$jalan = true;

        return $jalan;
    }


}