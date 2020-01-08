<?php

class LoginModel extends CI_Model
{
    private $jumlah, $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2;
        $this->table = 'tb_user';
    }

    public function selectOneUserByUser($user){
        $this->db->where("tb_user_username", $user);
        $this->db->where("tb_user_akun", 7);
        $data = $this->db->get($this->table)->result_array();
        return $data;
    }

    public function login($post){

    }

    public function selectOneUserOpdById($id){
        
        $this->db->where("id_tb_user", $id);
        $data = $this->db->get('tb_user_opd')->result_array();
        return $data;
    }


}