<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Json {

    private static $CI;

    public function __construct()
    {
        self::$CI = & get_instance();
    }
    

    public function setRpjmdStatus(){
        $tahunan = array(
            'bulan1' => 0,
            'bulan2' => 0,
            'bulan3' => 0,
            'bulan4' => 0,
            'bulan5' => 0,
            'bulan6' => 0,
            'bulan7' => 0,
            'bulan8' => 0,
            'bulan9' => 0,
            'bulan10' => 0,
            'bulan11' => 0,
            'bulan12' => 0,
        );
        $status = array(
            'tahun1' => $tahunan,
            'tahun2' => $tahunan,
            'tahun3' => $tahunan,
            'tahun4' => $tahunan,
            'tahun5' => $tahunan,
        );

        $data = json_encode($status);
        return $data;
    }

}