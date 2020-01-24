<?php

class SetHakModel extends CI_Model
{
    private $jumlah, $table;
    
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 2000;
        $this->table = 'tb_user';
    }

    public function getAllJson(){
      	$data = $this->db->get('tb_rpjmd')->row_array();
      	$data = json_decode($data['tb_rpjmd_status_json'], true);
        return $data;
    }

    public function update($post){

		$post = $this->security->xss_clean($post);
        $pesan = "Gagal Mengubah Data";
        $status = False;
        
        if($this->cekInput($post)){

            $id = $post['id'];

            $this->db->where('id_tb_user', $id);
            $dataUser = $this->db->get($this->table)->result_array();

            if(count($dataUser) > 0){
                
                $hak = json_decode($dataUser[0]['tb_user_hak'], true);

                $hak['rpjmd']['misi'] = @$post['rpjmd-misi']=='on'?1:0;
                $hak['rpjmd']['tujuan'] = @$post['rpjmd-tujuan']=='on'?1:0;
                $hak['rpjmd']['sasaran'] = @$post['rpjmd-sasaran']=='on'?1:0;
                $hak['rpjmd']['opd'] = @$post['rpjmd-opd']=='on'?1:0;
                $hak['rpjmd']['program'] = @$post['rpjmd-program']=='on'?1:0;

                $hak['renstra']['kegiatan'] = @$post['renstra-kegiatan']=='on'?1:0;
                
                $hak['rkpdPenetapan']['program'] = @$post['rkpd-penetapan-program']=='on'?1:0;
                $hak['rkpdPenetapan']['kegiatan'] = @$post['rkpd-penetapan-kegiatan']=='on'?1:0;
                $tahun = array();
                if(@$post['rkpd-penetapan-tahun1']=='on')array_push($tahun, 1);
                if(@$post['rkpd-penetapan-tahun2']=='on')array_push($tahun, 2);
                if(@$post['rkpd-penetapan-tahun3']=='on')array_push($tahun, 3);
                if(@$post['rkpd-penetapan-tahun4']=='on')array_push($tahun, 4);
                if(@$post['rkpd-penetapan-tahun5']=='on')array_push($tahun, 5);
                $hak['rkpdPenetapan']['tahun'] = $tahun;
                
                $hak['rkpdPerubahan']['program'] = @$post['rkpd-perubahan-program']=='on'?1:0;
                $hak['rkpdPerubahan']['kegiatan'] = @$post['rkpd-perubahan-kegiatan']=='on'?1:0;
                
                $tahun = array();
                if(@$post['rkpd-perubahan-tahun1']=='on')array_push($tahun, 1);
                if(@$post['rkpd-perubahan-tahun2']=='on')array_push($tahun, 2);
                if(@$post['rkpd-perubahan-tahun3']=='on')array_push($tahun, 3);
                if(@$post['rkpd-perubahan-tahun4']=='on')array_push($tahun, 4);
                if(@$post['rkpd-perubahan-tahun5']=='on')array_push($tahun, 5);
                $hak['rkpdPerubahan']['tahun'] = $tahun;

                
                $hak['lra']['program'] = @$post['lra-program']=='on'?1:0;
                $hak['lra']['kegiatan'] = @$post['lra-kegiatan']=='on'?1:0;
                $hak['lra']['rek3'] = @$post['lra-rek3']=='on'?1:0;
                $hak['lra']['rek4'] = @$post['lra-rek4']=='on'?1:0;
                $hak['lra']['rek5'] = @$post['lra-rek5']=='on'?1:0;
                $tahun = array();
                if(@$post['lra-tahun1']=='on')array_push($tahun, 1);
                if(@$post['lra-tahun2']=='on')array_push($tahun, 2);
                if(@$post['lra-tahun3']=='on')array_push($tahun, 3);
                if(@$post['lra-tahun4']=='on')array_push($tahun, 4);
                if(@$post['lra-tahun5']=='on')array_push($tahun, 5);
                $hak['lra']['tahun'] = $tahun;
                
                $bulan = array();
                if(@$post['lra-bulan1']=='on')array_push($bulan, 1);
                if(@$post['lra-bulan2']=='on')array_push($bulan, 2);
                if(@$post['lra-bulan3']=='on')array_push($bulan, 3);
                if(@$post['lra-bulan4']=='on')array_push($bulan, 4);
                if(@$post['lra-bulan5']=='on')array_push($bulan, 5);
                if(@$post['lra-bulan6']=='on')array_push($bulan, 6);
                if(@$post['lra-bulan7']=='on')array_push($bulan, 7);
                if(@$post['lra-bulan8']=='on')array_push($bulan, 8);
                if(@$post['lra-bulan9']=='on')array_push($bulan, 9);
                if(@$post['lra-bulan10']=='on')array_push($bulan, 10);
                if(@$post['lra-bulan11']=='on')array_push($bulan, 11);
                if(@$post['lra-bulan12']=='on')array_push($bulan, 12);
                $hak['lra']['bulan'] = $bulan;

                
                $hak['pk']['sasaran'] = @$post['pk-sasaran']=='on'?1:0;
                $hak['pk']['program'] = @$post['pk-program']=='on'?1:0;
                $hak['pk']['kegiatan'] = @$post['pk-kegiatan']=='on'?1:0;
                $tahun = array();
                if(@$post['pk-tahun1']=='on')array_push($tahun, 1);
                if(@$post['pk-tahun2']=='on')array_push($tahun, 2);
                if(@$post['pk-tahun3']=='on')array_push($tahun, 3);
                if(@$post['pk-tahun4']=='on')array_push($tahun, 4);
                if(@$post['pk-tahun5']=='on')array_push($tahun, 5);
                $hak['pk']['tahun'] = $tahun;
                
                $data = array(
                    'tb_user_hak' => json_encode($hak),
                );
                
                $this->db->where('id_tb_user', $id);
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
    
    public function cekInput($post){
        
        return true;
    }


}