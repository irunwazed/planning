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
            </select>
            <input type="submit"  />
            </form>';
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
                
                for ($i=0; $i < 27; $i++) { 
                    $set[$i] = $worksheet->getCellByColumnAndRow($i, $row)->getValue();
                }

                $this->$post['table']($set, $post['table']);
                
                array_push($data,$this->data);
                
                $pesan = "Berhasil menyimpan data";
            $status = true;
            }
        }
        echo "<pre>";
        print_r($data);
        echo "</pre>";
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