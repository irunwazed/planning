<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ImportController extends CI_Controller {
    
    private $data, $index, $no_kk;
    public function __construct() {
        parent::__construct();
        $this->index = 1;
    } 
    
    public function viewImport(){
        echo '<form action="importRek" method="POST"  enctype="multipart/form-data">
            <input type="file" name="file" />
            <select  name="table">
                <option>opd</option>
                <option>tb_urusan</option>
                <option>tb_fungsi</option>
                <option>tb_bidang</option>
                <option>tb_unit</option>
                <option>tb_sub_unit</option>
                <option>tb_program</option>
                <option>tb_kegiatan</option>
                <option>tb_rekening1</option>
                <option>tb_rekening2</option>
                <option>tb_rekening3</option>
                <option>tb_rekening4</option>
                <option>tb_rekening5</option>
                <option>tb_deskel</option>
                <option>penduduk</option>
                <option>detail_rincian</option>
                <option>akun_opd</option>
            </select>
            <input type="submit"  />
            </form>';
    }

    public function akun_opd($set, $table = null){
        $this->data = array(
            "nama" => (string)$set[5], 
            "username" => (string)$set[6], 
            "password" => password_hash((string)$set[7], PASSWORD_DEFAULT), 
            "level" => 3, 
        );
        $this->db->insert('users', $this->data);

        $user_id = $this->db->insert_id();
        
        $this->data = array(
            "id_users" => @$user_id, 
            "id_opd" => (string)$set[0], 
        );
        $this->db->insert('users_opd', $this->data);
    }
    	 
	function convert_to_number($rupiah)
	{
        return (preg_replace('/,.*|[^0-9]/', '', $rupiah));
	}

    public function detail_rincian($set, $table = null){

        $tahun = 2020;
        $bidang = explode("-", (string)$set[5]);
        $sub_bidang = explode("-", (string)$set[6]);
        $kegiatan = explode("-", (string)$set[8]);
        $rincian = explode("-", (string)$set[16]);
        $detail_rincian = explode("-", (string)$set[19]);

        $swakelola_volume = 0;
        $swakelola_rp = 0;
        $konstraktual_volume = 0;
        $konstraktual_rp = 0;

        $jenis = 2;
        $jenisKet = (string)$set[44];
        $rp = (string)$set[40];
        $vol = (string)$set[41];

        if((string)$set[44] == "Swakelola"){
            $jenis = 1;
            $jenisKet = "Swakelola";
            $swakelola_volume = $rp;
            $swakelola_rp = $vol;
        }else{
            $konstraktual_volume = $rp;
            $konstraktual_rp = $vol;
        }


        $confirm = 2;

        if((string)$set[37] == "Confirmed"){
            $confirm = 1;
        }


        $Kd_Prov = 72;
        $Kd_Kab = 6;
        $Kd_Kec = (string)$set[2];
        $Kd_Kel = 0;
        $Kd_Urut_Kel = 0;

        if((string)$set[3] != ""){
            $this->db->where('ref_kelurahan.Kd_Kec', $Kd_Kec);
            $this->db->where('ref_kelurahan.Nm_Kel', (string)$set[3]);  
            
            $dataKel = $this->db->get('ref_kelurahan')->result_array();
            if(count($dataKel) > 0){
                $Kd_Kel = @$dataKel[0]['Kd_Kel'];
                $Kd_Urut_Kel = @$dataKel[0]['Kd_Urut'];
            }
        }

        $this->data = array();

        $this->data['tahun'] = $tahun;
        $this->data['bidang_kode'] = $this->convert_to_number(@$bidang[0]);
        $this->data['sub_bidang_kode'] = $this->convert_to_number(@$sub_bidang[0]);
        $this->data['kegiatan_kode'] = $this->convert_to_number(@$kegiatan[0]);
        $this->data['rincian_kode'] = $this->convert_to_number(@$rincian[0]);
        $this->data['detail_rincian_kode'] =  $this->convert_to_number(@$detail_rincian[0]);
        $this->data['detail_rincian_nama'] = @$detail_rincian[1];
        $this->data['detail_rincian_volume'] = (string)$set[26];
        $this->data['id_satuan'] = (string)$set[22];
        $this->data['detail_rincian_penerima_manfaat'] = "-";
        $this->data['detail_rincian_pagu'] = (string)$set[28];
        $this->data['detail_rincian_swakelola_volume'] = $swakelola_volume;
        $this->data['detail_rincian_swakelola_rp'] =  $swakelola_rp;
        $this->data['detail_rincian_konstraktual_volume'] =  $konstraktual_volume;
        $this->data['detail_rincian_konstraktual_rp'] =  $konstraktual_rp;
        $this->data['detail_rincian_pembayaran'] = "-";
        $this->data['detail_rincian_tw1_keuangan_rp'] = 0;
        $this->data['detail_rincian_tw1_fisik_volume'] = 0;
        $this->data['detail_rincian_tw1_fisik_persen'] = 0;
        $this->data['detail_rincian_tw2_keuangan_rp'] = 0;
        $this->data['detail_rincian_tw2_fisik_volume'] = 0;
        $this->data['detail_rincian_tw2_fisik_persen'] = 0;
        $this->data['detail_rincian_tw3_keuangan_rp'] = 0;
        $this->data['detail_rincian_tw3_fisik_volume'] = 0;
        $this->data['detail_rincian_tw3_fisik_persen'] = 0;
        $this->data['detail_rincian_tw4_keuangan_rp'] = 0;
        $this->data['detail_rincian_tw4_fisik_volume'] = 0;
        $this->data['detail_rincian_tw4_fisik_persen'] = 0;
        $this->data['id_masalah'] = 11;
        $this->data['detail_rincian_file'] = '';
        $this->data['detail_rincian_pelaksanaan_jenis'] = $jenis;
        $this->data['detail_rincian_pelaksanaan_jenis_ket'] = $jenisKet;
        $this->data['confirm_pusat'] = $confirm;
        
        $this->data['Kd_Prov'] = $Kd_Prov;
        $this->data['Kd_Kab'] = $Kd_Kab;
        $this->data['Kd_Kec'] = $Kd_Kec;
        $this->data['Kd_Kel'] = $Kd_Kel;
        $this->data['Kd_Urut_Kel'] = $Kd_Urut_Kel;

        
        $status  = $this->db->insert($table, $this->data);
        if(!$status){
            echo "Gagal<br>";
            echo "<pre>";
            print_r($this->data);
            echo "</pre>";
        }else{
            echo "Berhasil<br>";
        }
    }

    public function opd($set, $table = null){
        $this->data = array(
            "kode_urusan" => (string)$set[0], 
            "kode_bidang" => (string)$set[1], 
            "kode_unit" => (string)$set[2], 
            "kode_sub_unit" => (string)$set[3], 
            "opd_nama" => (string)$set[4], 
        );
        $this->db->insert($table, $this->data);
    }

    public function tb_deskel($set, $table = null){
        $this->data = array(
            "tb_provinsi_kode" => (string)$set[0], 
            "tb_kabupaten_kode" => (string)$set[1], 
            "tb_kecamatan_kode" => (string)$set[2], 
            "tb_deskel_kode" => (string)$set[3], 
            "tb_deskel_level" => (string)$set[4], 
            "tb_deskel_nama" => (string)$set[5], 
        );
        $this->db->insert($table, $this->data);
    }

    public function penduduk($set, $table = null){
        $rand = mt_rand(15, 50);
        $nik = (string)$set[7];
        if($nik == ''){
            $nik = time().$this->index;
        }
        
        $this->data = array(
            "nik" => $nik, 
            "penduduk_nama" => (string)$set[6], 
            "jenis_kelamin" => (string)$set[10], 
            "tempat_lahir" => '', 
            "tgl_lahir" => (date("Y")-(int)$set[11]).'-01-01 00:00:00', 
            "alamat" => (string)$set[3], 
            "kondisi_fisik" => 1, 
            "jenis_keterampilan" => 1, 
            "hidup" => 1, 
            "id_status_pendidikan" => 1, 
            "id_status_perkawinan" => 1, 
            "id_pekerjaan" => 1, 
            "id_pekerjaan_sampingan" => 1, 
            "id_agama" => 1, 
        );
        $this->db->insert('penduduk', $this->data);

        if((string)$set[5] == 1){
            
            $this->no_kk = '7206'.$rand.time().$this->index;
            // $this->db->where('no_kk', (string)$set[1]);
            // $kk = $this->db->get('keluarga')->result_array();
            $kk = array();
            if(count($kk) == 0){
                $this->data = array(
                    "no_kk" => $this->no_kk, 
                    "nik_kepala" => $nik, 
                );
                $this->db->insert('keluarga', $this->data);
                $this->index++;
            }
        }

        $this->data = array(
            "no_kk" => $this->no_kk, 
            "nik" => $nik, 
            "jabatan" => (string)$set[8], 
            "aktif" => 1, 
        );
        $this->db->insert('keluarga_anggota', $this->data);
    }

    public function importRek()
    {
        $post = $this->input->post();
        $data = array();
        $this->load->library("excel");
        $pesan = "Gagal mengimport data";
        $status = false;
        if(isset($_FILES["file"]["name"]))
        {
        $path = $_FILES["file"]["tmp_name"];
        $object = PHPExcel_IOFactory::load($path);
        foreach($object->getWorksheetIterator() as $worksheet)
        {
            $highestRow = $worksheet->getHighestRow();
            $highestColumn = $worksheet->getHighestColumn();
            for($row=2; $row<=$highestRow; $row++)
            {
                for ($i=0; $i < 48; $i++) { 
                    $set[$i] = $worksheet->getCellByColumnAndRow($i, $row)->getValue();
                }
                echo ($row-1).".) ";
                $this->$post['table']($set, $post['table']);
                array_push($data,$this->data);
                $pesan = "Berhasil menyimpan data";
            $status = true;
            }
        }
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        //    $this->excel_import_model->insert();
        // echo 'Data Imported successfully';
        } 
        $kirim = array(
            'status'=>$status,
            'pesan'=>$pesan
        );

        echo json_encode($kirim);
    }

}