<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function index()
	{

        $this->load->view('include/head');
        $this->load->view('components/simple');
        $this->load->view('include/foot');
    }
    
    public function login(){
        $this->load->view('pages/login');
    }

    public function cekLogin(){
        $this->load->model('pelaporan/LoginModel');
        $post = $this->input->post();
        $dataOneUser = $this->LoginModel->selectOneUserByUser(@$post['username']);
        $status = false;
        if(count($dataOneUser) > 0){
            if(password_verify($post['password'], $dataOneUser[0]['password'])) {
                $status = true;
                // $this->session->sess_destroy();
                $data_session = array(
                    'id' => $dataOneUser[0]['id_users'],
                    'lapor' => TRUE,
                    'nama'  => $dataOneUser[0]['nama'],
                    'username'  => $dataOneUser[0]['username'],
                    'level' => $dataOneUser[0]['level'],
                    'login' => TRUE
                );
                
                $this->session->set_userdata($data_session);
                redirect(base_url()."beranda");
            }
        }else{
            $dataOneUser = $this->LoginModel->selectOneUserByUserPpk(@$post['username']);
            $status = false;
            if(count($dataOneUser) > 0){
                
                if(password_verify($post['password'], $dataOneUser[0]['pegawai_password'])) {
                    
                    $status = true;
                    $data_session = array(
                        'id' => $dataOneUser[0]['id_pegawai'],
                        'nama'  => $dataOneUser[0]['pegawai_nama'],
                        'username'  => $dataOneUser[0]['pegawai_username'],
                        'level' => 4,
                        'login' => TRUE
                    );
                    
                    $this->session->set_userdata($data_session);
                    redirect(base_url()."beranda");
                }
            }
        }
        // die("tes");
        $pesan = array(
            "pesan" => "Gagal melakukan Login",
            "status" => false,
        );
        $this->session->set_flashdata('pesan', $pesan);
        redirect(base_url()."login");
    }

    public function logout(){
        $data_session = array(
            'id' => NULL,
            'nama'  => NULL,
            'username'  => NULL,
            'level' => NULL,
            'login' => FALSE
        );

        
        $this->session->set_userdata($data_session);

        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('login');

        $this->session->sess_destroy();
        // session_destroy();
        $_SESSION = [];
        redirect(base_url()."login");
    }
}
