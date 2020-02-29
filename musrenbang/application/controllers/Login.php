<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->library('MyConfig');
		
	}

	// public function cek(){
	// 	if (password_verify('qwe123', '$2y$10$0.pkd5BAP0Rfw0.YdW/Rz.kF41b3NGOw8MeMAYg9YvUVO2zvYW0Aq')) {
	// 		echo "true";
	// 	}
	// }

    public function login($setDomain){
		$this->myconfig->header($setDomain);
		$this->load->model('DataModel');
		$this->load->model('AkunModel');
        $this->load->library('encryption');
        $status = false;
        $username = $this->input->post('user');
		$pass = $this->input->post('pass');
		$nama = '';
		if($this->input->post()){
			// print_r($this->input->post());
			$this->db->where('username', $username);
			$user = $this->db->get('user')->row();
			if($user){
				if (password_verify($pass, $user->password_hash)) {
					$this->AkunModel->userRiwayat($user->id);
					$userLevel = $this->DataModel->getLevel($user->id);
					if($userLevel != 0)
						$status = true;
				}
			}
		}
		if($status){
			$dataSession = array(
				'id' => $user->id,
				'level' => $userLevel,
				'kd_wilayah' => '0-0-0-0-0',
				'kd_opd' => '0-0-0-0',
				'tahun' => 2020,
				'status' => true,
				'domain' => $setDomain,
			);
			
			$this->db->where("Kd_User", $user->id);

			$this->db->join("ref_kecamatan", "ref_kecamatan.Kd_Prov = ta_user_kelompok.Kd_Prov
			AND ref_kecamatan.Kd_Kab = ta_user_kelompok.Kd_Kab
			AND ref_kecamatan.Kd_Kec = ta_user_kelompok.Kd_Kec", "left");

			$dataWil = $this->db->get("ta_user_kelompok")->row();
			$Kd_Prov = @$dataWil->Kd_Prov?$dataWil->Kd_Prov:0;
			$Kd_Kab = @$dataWil->Kd_Kab?$dataWil->Kd_Kab:0;
			$Kd_Kec = @$dataWil->Kd_Kec?$dataWil->Kd_Kec:0;
			$Kd_Kel = @$dataWil->Kd_Kel?$dataWil->Kd_Kel:0;
			$Kd_Urut_Kel = @$dataWil->Kd_Urut_Kel?$dataWil->Kd_Urut_Kel:0;
			$dataSession['kd_wilayah'] = $Kd_Prov."-".$Kd_Kab."-".$Kd_Kec."-".$Kd_Kel."-".$Kd_Urut_Kel;
				
			
			if($userLevel == 2){
				
				$nama = "Kecamatan ".@$dataWil->Nm_Kec;

			}else if($userLevel == 4){
				$this->db->where("Kd_User", $user->id);

				$this->db->join("ref_sub_unit", "ref_sub_unit.Kd_Urusan = ta_user_unit.Kd_Urusan
                AND ref_sub_unit.Kd_Bidang = ta_user_unit.Kd_Bidang
				AND ref_sub_unit.Kd_Unit = ta_user_unit.Kd_Unit
				AND ref_sub_unit.Kd_Sub = ta_user_unit.Kd_Sub_Unit", "left");
				
				$dataOpd = $this->db->get("ta_user_unit")->row();

				
				$kd_opd = (@$dataOpd->Kd_Urusan?$dataOpd->Kd_Urusan:0)
						."-".(@$dataOpd->Kd_Bidang?$dataOpd->Kd_Bidang:0)
						."-".(@$dataOpd->Kd_Unit?$dataOpd->Kd_Unit:0)
						."-".(@$dataOpd->Kd_Sub_Unit?$dataOpd->Kd_Sub_Unit:0);

				$dataSession['kd_opd'] = $kd_opd;
				$nama = @$dataOpd->Nm_Sub_Unit;
			}

			$stringSession = json_encode($dataSession);
			$encryption = $this->encryption->encrypt($stringSession);
			$data = array(
				'session' => $encryption,
				'level' => md5('levelUser'.$userLevel),
				'nama' => $nama,
				'username' => $username,
				'status' => true
			);
		}else{
			$data = array(
				'pesan' => 'Gagal Melakukan Login',
				'status' => false
			);
		}
		echo json_encode($data);
    }

}