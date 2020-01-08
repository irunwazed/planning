<?php

class PenggunaModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2000;
        $this->table = 'tb_user';
    }

    public function setQuery($post){
        $this->db->select("tb_user.*, tb_sub_unit.tb_urusan_kode, tb_sub_unit.tb_bidang_kode, tb_sub_unit.tb_unit_kode, tb_sub_unit.tb_sub_unit_kode, tb_sub_unit.tb_sub_unit_nama");
        $this->db->join('tb_user_opd', 'tb_user_opd.id_tb_user = '.$this->table.'.id_tb_user', 'left');
        $this->db->join('tb_sub_unit', 'tb_sub_unit.tb_urusan_kode = tb_user_opd.tb_urusan_kode
                                    AND tb_sub_unit.tb_bidang_kode = tb_user_opd.tb_bidang_kode
                                    AND tb_sub_unit.tb_unit_kode = tb_user_opd.tb_unit_kode
                                    AND tb_sub_unit.tb_sub_unit_kode = tb_user_opd.tb_sub_unit_kode', 'left');
        $this->db->where($this->table.'.tb_user_akun', 7);
        
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
            $post['tb_user_password'] = $this->fungsi->password_hash($post['tb_user_password']);
            $data = array(
                'tb_user_username' => $post['tb_user_username'],
                'tb_user_password' => $post['tb_user_password'],
                'tb_user_akun' => 7,
                'tb_user_level' => $post['tb_user_level'],
                'tb_user_hp' => $post['tb_user_hp'],
            );
            $status = $this->db->insert($this->table, $data);

            if($post['tb_user_level'] == 3){
                $id_user = $this->db->insert_id();
                $kodeOpd = explode("-", $post['opd']);
                $data = array(
                    'tb_urusan_kode' => $kodeOpd[0],
                    'tb_bidang_kode' => $kodeOpd[1],
                    'tb_unit_kode' => $kodeOpd[2],
                    'tb_sub_unit_kode' => $kodeOpd[3],
                    'id_tb_user' => $id_user,
                );
                $status = $this->db->insert('tb_user_opd', $data);
            }
            



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
                'tb_user_username' => $post['tb_user_username'],
                'tb_user_level' => $post['tb_user_level'],
                'tb_user_hp' => $post['tb_user_hp'],
            );

            $this->db->where('id_tb_user', $post['kode']);
            $query = $this->db->get($this->table)->result_array();

            if(@$query[0]['tb_user_password'] != $post['tb_user_password']){
                $post['tb_user_password'] = $this->fungsi->password_hash($post['tb_user_password']);
                $data['tb_user_password'] = $post['tb_user_password'];
            }

            $this->db->where('id_tb_user', $post['kode']);
            $status = $this->db->update($this->table, $data);

            if($post['tb_user_level'] == 3){
                $id_user = $post['kode'];

                $this->db->where('id_tb_user', $id_user);
                $status = $this->db->delete('tb_user_opd');

                $kodeOpd = explode("-", $post['opd']);
                $data = array(
                    'tb_urusan_kode' => $kodeOpd[0],
                    'tb_bidang_kode' => $kodeOpd[1],
                    'tb_unit_kode' => $kodeOpd[2],
                    'tb_sub_unit_kode' => $kodeOpd[3],
                    'id_tb_user' => $id_user,
                );
                $status = $this->db->insert('tb_user_opd', $data);
            }


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
            $this->db->where('id_tb_user', $post['kode']);
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