<?php

class PegawaiModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'pegawai';
    }

    public function getCount($search = '', $post = array()){

        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($page = 1, $search = '', $post = array()){
        $jumlah = $this->jumlah;
        $awal = ($page - 1)*$jumlah;

        // $this->db->limit($jumlah,$awal); 
        
        $query = $this->db->get($this->table)->result_array();
        return $query;
    }

    public function create($post){
        
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menambah Data";
        $status = False;
        
        if($this->cekInput($post)){
            $post['pegawai_password'] = $this->fungsi->password_hash($post['pegawai_password']);
            $data = array(
                'pegawai_nip' => $post['pegawai_nip'],
                'pegawai_nama' => $post['pegawai_nama'],
                'pegawai_username' => $post['pegawai_username'],
                'pegawai_email' => $post['pegawai_email'],
                'pegawai_no_hp' => $post['pegawai_no_hp'],
                'pegawai_password' => $post['pegawai_password'],
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

            $this->db->where('id_pegawai', $post['id_pegawai']);
            $dataOne = $this->db->get($this->table)->result_array();
            if(count($dataOne) == 1){

                if($dataOne[0]['pegawai_password'] == $post['pegawai_password']){
                    $data = array(
                        'pegawai_nip' => $post['pegawai_nip'],
                        'pegawai_nama' => $post['pegawai_nama'],
                        'pegawai_username' => $post['pegawai_username'],
                        'pegawai_email' => $post['pegawai_email'],
                        'pegawai_no_hp' => $post['pegawai_no_hp'],
                    );
                }else{
                    $post['pegawai_password'] = $this->fungsi->password_hash($post['pegawai_password']);
                    $data = array(
                        'pegawai_nip' => $post['pegawai_nip'],
                        'pegawai_nama' => $post['pegawai_nama'],
                        'pegawai_username' => $post['pegawai_username'],
                        'pegawai_email' => $post['pegawai_email'],
                        'pegawai_no_hp' => $post['pegawai_no_hp'],
                        'pegawai_password' => $post['pegawai_password'],
                    );
                }

                $this->db->where('id_pegawai', $post['id_pegawai']);
                $status = $this->db->update($this->table, $data);
                if($status)
                    $pesan = "Berhasil Mengubah Data";
            }

            
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
            $this->db->where('id_pegawai', $post['id_pegawai']);
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

    public function setPpk($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengolah Data";
        $status = False;
        
        if($this->cekInput($post)){
            $kode = explode("-", $post['sub_bidang']);
            $data = array(
                'id_pegawai' => $post['ppk_id_pegawai'],
                'tahun' => $kode[0],
                'bidang_kode' => $kode[1],
                'sub_bidang_kode' => $kode[2],
                'id_jenis' => $post['id_jenis'],
            );
            $status = $this->db->insert('pegawai_ppk', $data);
            
            $this->db->where('id_pegawai', $post['ppk_id_pegawai']);
            $dataPpk = $this->db->get('pegawai_ppk')->result_array();

            if($status)
                $pesan = "Berhasil Mengolah Data";

            
        }

        $kirim = array(
            'data' => $dataPpk,
            'pesan' => $pesan,
            'status' => $status,
        );
        return $kirim;
    }

    public function deletePpk($post){
        $post = $this->security->xss_clean($post);
        $pesan = "Gagal Menghapus Data";
        $status = False;
        
        if($this->cekInput($post)){
            $this->db->where('id_pegawai_ppk', $post['id_pegawai_ppk']);
            $status = $this->db->delete('pegawai_ppk');
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
    

}