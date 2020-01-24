<?php

class LoginModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2;
        $this->table = 'users';
    }

    public function selectOneUserByUser($user){
        $this->db->where("username", $user);
        $data = $this->db->get($this->table)->result_array();
        return $data;
    }

    public function selectOneUserByUserPpk($user){
        $this->db->where("pegawai_username", $user);
        $data = $this->db->get('pegawai')->result_array();
        return $data;
    }

    public function login($post){

    }


}