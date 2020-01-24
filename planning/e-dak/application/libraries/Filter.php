<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Filter {

    private static $CI;

    public function __construct()
    {
        self::$CI = & get_instance();
    }

    public function cekLogin($arr){
        $status = false;
        if(@$_SESSION['login'] ){
            if(in_array(@$_SESSION['level'], $arr['level']))
                $status = true;
        }
        $this->setEmail();
        return $status;
    }

    public function setEmail(){
        $triwulan = array(3,6,9,12);
        $tahun = date('Y');
        $bulan = date('m');
        $tgl = date('d');

        
        // print_r($dataPegawai);

        if(in_array($bulan, $triwulan)){
            $triwulanKe = array_search($bulan, $triwulan)+1;
            if($tgl == 1){
                $judul = "Pembukaan Laporan pada Triwulan ke-".$triwulanKe." tahun ".$tahun;
                $isi = "Penginputan laporan telah dibuka pukul 00:01 WITA tanggal ".$tgl."-".$bulan."-".$tahun;

                $dataPegawai = $this->loadPegawaiEmail();
                foreach($dataPegawai as $row){
                    $statusEmail =  $this->kirimEmail($row['pegawai_email'], $judul, $isi);
                }

            }
            if($tgl == 3){
                $judul = "Penutupan Laporan pada Triwulan ke-".$triwulanKe." tahun ".$tahun;
                $isi = "Penginputan laporan akan ditutup pukul 23:59 WITA tanggal ".$tgl."-".$bulan."-".$tahun;

                $dataPegawai = $this->loadPegawaiEmail();
                foreach($dataPegawai as $row){
                    $statusEmail =  $this->kirimEmail($row['pegawai_email'], $judul, $isi);
                }

            }
        }
    }

    public function loadPegawaiEmail(){
        
        self::$CI->db->join('pegawai', 'pegawai.id_pegawai = pegawai_ppk.id_pegawai', 'left');
        $data = self::$CI->db->get("pegawai_ppk")->result_array();
        return $data;
    }

    public function kirimEmail($toEmail, $judul, $isi){

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '70';
        $config['smtp_user']    = 'simple.email.website@gmail.com';
        $config['smtp_pass']    = 'qwerty123@';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      

        self::$CI->email->initialize($config);


        self::$CI->email->from('simple.email.website@gmail.com', 'Si PANDAI');
        self::$CI->email->to($toEmail); 

        self::$CI->email->subject($judul);
        self::$CI->email->message($isi);  

        if(self::$CI->email->send()){
            // echo "sukses";
            return true;
        }else{
            
            return false;
            // show_error($this->email->print_debugger());
        }
    
    }
    

}