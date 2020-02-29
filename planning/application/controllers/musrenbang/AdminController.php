
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function loginView()
	{
		$this->load->view('musrenbang/pages/login');
	}

	public function beranda()
	{
        $data = array();
        $data['judul'] = "Beranda";
        
        $this->load->model('DataModel');
        
        $this->load->library('Filter');
        $this->filter->cekLoginOut(array(1,2,3));

        $data['jumOpd'] = $this->DataModel->getJumlahOpd();
        $data['jumProgram'] = $this->DataModel->getJumlahProgram();
        $data['jumKegiatan'] = $this->DataModel->getJumlahKegiatan();
        $file['content'] = @$this->load->view('musrenbang/components/beranda/content', $data, true);
        $this->load->view('musrenbang/includes/layout', $file);
    }

	public function login(){
        
        $this->load->model('musrenbang/LoginModel');
        $post = $this->input->post();
        $dataOneUser = $this->LoginModel->selectOneUserByUser(@$post['username']);
        $status = false;
        $pesan = "Gagal melakukan Login";
        if(count($dataOneUser) > 0){
            if(password_verify($post['password'], $dataOneUser[0]['tb_user_password'])) {
                $status = true;
                $data_session = array(
                    'id' => $dataOneUser[0]['id_tb_user'],
                    'username'  => $dataOneUser[0]['tb_user_username'],
                    'akun' => $dataOneUser[0]['tb_user_akun'],
                    'level' => $dataOneUser[0]['tb_user_level'],
                    'no_hp' => $dataOneUser[0]['tb_user_hp'],
                    'tahun' => 2020,
                    'logged_in' => TRUE,
                );

                $this->load->model('DataModel');
                $dataRpjmd = $this->DataModel->getRowRpjmd($data_session['rpjmd']);
                $data_session['tahun'] = @$dataRpjmd->tb_rpjmd_status_tahun;
                
                if($dataOneUser[0]['tb_user_level'] == 3){
                    $dataOpd = $this->LoginModel->selectOneUserOpdById(@$dataOneUser[0]['id_tb_user']);
                    $data_session['kodeOpd'] = @$dataOpd[0]['tb_urusan_kode']."-".@$dataOpd[0]['tb_bidang_kode']."-".@$dataOpd[0]['tb_unit_kode']."-".@$dataOpd[0]['tb_sub_unit_kode'];
                }

                $this->session->set_userdata($data_session);
                redirect(base_url()."musrenbang/beranda");
            }else{
                $pesan = "Password salah!";
            }
        }else{
            $pesan = "Username tidak terdaftar";
        }

        $pesan = array(
            "pesan" => $pesan,
            "status" => false,
        );
        print_r($post);
        $this->session->set_flashdata('pesan', $pesan);
        redirect(base_url()."musrenbang/login");
    }

	public function logout(){
        session_destroy();
        redirect(base_url('musrenbang/login'));
    }
    
}
