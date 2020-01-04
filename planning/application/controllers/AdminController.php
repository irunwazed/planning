
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

	public function beranda()
	{
        $data = array();
        $data['judul'] = "Beranda";
        
        $file['content'] = $this->load->view('components/beranda/content', $data, true);
        $this->load->view('includes/layout', $file);
    }

	public function kota()
	{
        $data = array();
        $data['judul'] = "Data Kota";
        
        $file['content'] = $this->load->view('components/kota/content', $data, true);
        $file['script'] = $this->load->view('components/kota/script', $data, true);
        $this->load->view('includes/layout', $file);
    }

	public function login()
	{
        redirect(base_url('rpjmd/beranda'));
    }

	public function logout()
	{
        redirect(base_url('login'));
    }
    
}
