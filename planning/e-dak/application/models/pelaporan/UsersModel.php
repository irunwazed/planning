<?php

class UsersModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = 'users';
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
            $post['password'] = $this->fungsi->password_hash($post['password']);
            $data = array(
                'nama' => $post['nama'],
                'username' => $post['username'],
                'password' => $post['password'],
                'level' => $post['level'],
            );
            $status = $this->db->insert($this->table, $data);
            if($status)
                $pesan = "Berhasil Menambah Data";

            $id_users = $this->db->insert_id();

            if(@$post['level'] == 2){
                $data = array(
                    'id_users' => $id_users,
                    'id_indikator' => $post['indikator'],
                );
                $status = $this->db->insert('users_admin', $data);
            }
            if(@$post['level'] == 3){
                $data = array(
                    'id_users' => $id_users,
                    'id_opd' => $post['id_opd'],
                );
                $status = $this->db->insert('users_opd', $data);
            }
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

            $this->db->where('id_users', $post['id_users']);
            $dataOne = $this->db->get($this->table)->result_array();
            if(count($dataOne) == 1){

                if($dataOne[0]['password'] == $post['password']){
                    $data = array(
                        'nama' => $post['nama'],
                        'username' => $post['username'],
                        'level' => $post['level'],
                    );
                }else{
                    $post['password'] = $this->fungsi->password_hash($post['password']);
                    $data = array(
                        'nama' => $post['nama'],
                        'username' => $post['username'],
                        'password' => $post['password'],
                        'level' => $post['level'],
                    );
                }

                $this->db->where('id_users', $post['id_users']);
                $status = $this->db->update($this->table, $data);
                if($status)
                    $pesan = "Berhasil Mengubah Data";

                $this->db->where('id_users', $post['id_users']);
                $status = $this->db->delete('users_admin');
                $this->db->where('id_users', $post['id_users']);
                $status = $this->db->delete('users_opd');
                if(@$post['level'] == 2){
                    $data = array(
                        'id_users' => $post['id_users'],
                        'id_indikator' => $post['indikator'],
                    );
                    $status = $this->db->insert('users_admin', $data);
                }
                if(@$post['level'] == 3){
                    $data = array(
                        'id_users' => $post['id_users'],
                        'id_opd' => $post['id_opd'],
                    );
                    $status = $this->db->insert('users_opd', $data);
                }
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
            $this->db->where('id_users', $post['id_users']);
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
    

}