<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ImportController extends CI_Controller {
    
    private $data, $index, $no_kk, $hapus;
    public function __construct() {
        parent::__construct();
        $this->index = 1;
        $this->hapus = true;
    } 
    
    public function viewImport(){
        echo '<form action="importRek" method="POST"  enctype="multipart/form-data">
            <input type="file" name="file" />
            <select  name="table">
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
                <option>tb_provinsi</option>
                <option>tb_kabupaten</option>
                <option>tb_kecamatan</option>
                <option>tb_deskel</option>
                <option>tb_kriteria_pembobotan</option>
                <option>tb_kriteria_bobot</option>
                
                <option>user_kel</option>
                <option>user_kec</option>
                <option>usulan_kel</option>
            </select>
            <input type="submit"  />
            </form>';
    }

    

    public function usulan_kel($set, $table = null){
        $this->data = array(
            "tahun" => @(string)$set[1], 
            "user_id" => @(string)$set[2], 
            "nama" => @(string)$set[3], 
            "alasan" => @(string)$set[4], 
            "lokasi" => @(string)$set[5], 
            "volume" => @(string)$set[6], 
            "satuan_id" => @(string)$set[7], 
            "kategori_id" => @(string)$set[8], 
            "pagu" => @(string)$set[9], 
            "pengusul" => @(string)$set[10], 
            "manfaat" => @(string)$set[11], 
            "file" => @(string)$set[12], 
            "berkas_ba" => @(string)$set[13], 
            "berkas_usulan" => @(string)$set[14], 
            "tgl_input" => @(string)$set[15], 
            "asal" => @(string)$set[16], 
            "skor_keterdesakan" => @(string)$set[17], 
            "skor_pertumbuhan" => @(string)$set[18], 
            "skor_potensi" => @(string)$set[19], 
            "skor_kemiskinan" => @(string)$set[20], 
            "skor_manfaat" => @(string)$set[21], 
            "skor_partisipasi" => @(string)$set[22], 
            "skor_pelaksanaan" => @(string)$set[23],  
            "skor_dokumen" => @(string)$set[24],  
            "skor_total" => @(string)$set[25],  
            "opd_user_id" => @(string)$set[26],  
            "Kd_Prov" => @(int)$set[28],  
            "Kd_Kab" => @(int)$set[29],  
            "Kd_Kec" => @(int)$set[30],  
            "Kd_Kel" => @(int)$set[31],  
            "Kd_Urut_Kel" => @(int)$set[32],  
            "Kd_Mus" => @(int)$set[33], 
        );
        // print_r($this->data);
        $this->db->insert('ref_musrenbang', $this->data);
    }

    
    public function user_kel($set, $table = null){
        $this->data = array(
            "username" => (string)$set[5]."_".join("_",explode(" ",strtolower((string)$set[6]))), 
            "no_hp_ktp" => (string)$set[7], 
            "level_musrenbang" => (string)$set[8], 
            "password_hash" => password_hash((string)$set[9], PASSWORD_DEFAULT), 
            "status" => 10, 
        );
        $this->db->insert('user', $this->data);

        $user_id = $this->db->insert_id();
        $data = array(
            'Kd_User' => $user_id, 
            'Kd_Prov' => (string)$set[0],
            'Kd_Kab' => (string)$set[1],
            'Kd_Kec' => (string)$set[2],
            'Kd_Kel' => (string)$set[3],
            'Kd_Urut_Kel' => (string)$set[4],
        );
        $result = $this->db->insert('ta_user_kelompok', $data);
    }

    public function user_kec($set, $table = null){
        $this->data = array(
            "username" => join("_",explode(" ",strtolower((string)$set[3]))), 
            "no_hp_ktp" => (string)$set[4], 
            "level_musrenbang" => (string)$set[5], 
            "password_hash" => password_hash((string)$set[6], PASSWORD_DEFAULT), 
            "status" => 10, 
        );
        $this->db->insert('user', $this->data);

        $user_id = $this->db->insert_id();
        $data = array(
            'Kd_User' => $user_id, 
            'Kd_Prov' => (string)$set[0],
            'Kd_Kab' => (string)$set[1],
            'Kd_Kec' => (string)$set[2],
        );
        $result = $this->db->insert('ta_user_kelompok', $data);
    }

    public function tb_urusan($set, $table = null){
        $this->data = array(
            "tb_urusan_kode" => (string)$set[0], 
            "tb_urusan_nama" => (string)$set[1], 
        );
        $this->db->insert($table, $this->data);
    }

    public function tb_fungsi($set, $table = null){
        $this->data = array(
            "tb_fungsi_kode" => (string)$set[0], 
            "tb_fungsi_nama" => (string)$set[1], 
        );
        $this->db->insert($table, $this->data);
    }

    public function tb_bidang($set, $table = null){
        $this->data = array(
            "tb_urusan_kode" => (string)$set[0],
            "tb_bidang_kode" => (string)$set[1], 
            "tb_bidang_nama" => (string)$set[2], 
            "tb_fungsi_kode" => (string)$set[3],
        );
        $this->db->insert($table, $this->data);

        
        // $this->db->where("tb_urusan_kode", (string)$set[0]);
        // $this->db->where("tb_bidang_kode", (string)$set[1]);
        // $this->data = array(
        //     "tb_bidang_nama" => (string)$set[2], 
        //     "tb_fungsi_kode" => (string)$set[3],
        // );
        // $this->db->update($table, $this->data);
    }

    public function tb_unit($set, $table = null){
        $this->data = array(
            "tb_urusan_kode" => (string)$set[0],
            "tb_bidang_kode" => (string)$set[1],
            "tb_unit_kode" => (string)$set[2], 
            "tb_unit_nama" => (string)$set[3], 
        );
        $this->db->insert($table, $this->data);
        
        // $this->db->where("tb_urusan_kode", (string)$set[0]);
        // $this->db->where("tb_bidang_kode", (string)$set[1]);
        // $this->db->where("tb_unit_kode", (string)$set[2]);
        // $this->data = array(
        //     "tb_unit_nama" => (string)$set[3], 
        // );
        // $this->db->update($table, $this->data);
    }

    public function tb_sub_unit($set, $table = null){
        $this->data = array(
            "tb_urusan_kode" => (string)$set[0],
            "tb_bidang_kode" => (string)$set[1],
            "tb_unit_kode" => (string)$set[2], 
            "tb_sub_unit_kode" => (string)$set[3], 
            "tb_sub_unit_nama" => (string)$set[4], 
        );
        $this->db->insert($table, $this->data);


        // $this->db->where("tb_urusan_kode", (string)$set[0]);
        // $this->db->where("tb_bidang_kode", (string)$set[1]);
        // $this->db->where("tb_unit_kode", (string)$set[2]);
        // $this->db->where("tb_sub_unit_kode", (string)$set[3]);
        // $this->data = array(
        //     "tb_urusan_kode" => (string)$set[0],
        //     "tb_bidang_kode" => (string)$set[1],
        //     "tb_unit_kode" => (string)$set[2], 
        //     "tb_sub_unit_kode" => (string)$set[3], 
        //     "tb_sub_unit_nama" => (string)$set[4], 
        // );
        // $this->db->update($table, $this->data);
    }

    public function tb_program($set, $table = null){
        $this->data = array(
            "tb_urusan_kode" => (string)$set[0],
            "tb_bidang_kode" => (string)$set[1],
            "tb_program_kode" => (string)$set[2],  
            "tb_program_nama" => (string)$set[3], 
        );
        $this->db->insert($table, $this->data);

        
        // $this->db->where("tb_urusan_kode", (string)$set[0]);
        // $this->db->where("tb_bidang_kode", (string)$set[1]);
        // $this->db->where("tb_program_kode", (string)$set[2]);
        // $this->data = array(
        //     "tb_urusan_kode" => (string)$set[0],
        //     "tb_bidang_kode" => (string)$set[1],
        //     "tb_program_kode" => (string)$set[2],  
        //     "tb_program_nama" => (string)$set[3], 
        // );
        // $this->db->update($table, $this->data);
    }

    public function tb_kegiatan($set, $table = null){
        $this->data = array(
            "tb_urusan_kode" => (string)$set[0],
            "tb_bidang_kode" => (string)$set[1],
            "tb_program_kode" => (string)$set[2],  
            "tb_kegiatan_kode" => (string)$set[3], 
            "tb_kegiatan_nama" => (string)$set[4], 
        );
        $this->db->insert($table, $this->data);

        
        // $this->db->where("tb_urusan_kode", (string)$set[0]);
        // $this->db->where("tb_bidang_kode", (string)$set[1]);
        // $this->db->where("tb_program_kode", (string)$set[2]);
        // $this->db->where("tb_kegiatan_kode", (string)$set[3]);
        // $this->data = array(
        //     "tb_urusan_kode" => (string)$set[0],
        //     "tb_bidang_kode" => (string)$set[1],
        //     "tb_program_kode" => (string)$set[2],  
        //     "tb_kegiatan_kode" => (string)$set[3], 
        //     "tb_kegiatan_nama" => (string)$set[4], 
        // );
        // $this->db->update($table, $this->data);
    }

    public function tb_rekening1($set, $table = null){
        $this->data = array(
            "tb_rekening1_kode" => (string)$set[0],
            "tb_rekening1_nama" => (string)$set[1],
        );
        $this->db->insert($table, $this->data);
    }

    public function tb_rekening2($set, $table = null){
        $this->data = array(
            "tb_rekening1_kode" => (string)$set[0],
            "tb_rekening2_kode" => (string)$set[1],
            "tb_rekening2_nama" => (string)$set[2],
        );
        $this->db->insert($table, $this->data);
    }

    public function tb_rekening3($set, $table = null){
        $this->data = array(
            "tb_rekening1_kode" => (string)$set[0],
            "tb_rekening2_kode" => (string)$set[1],
            "tb_rekening3_kode" => (string)$set[2],
            "tb_rekening3_nama" => (string)$set[3],
        );
        $this->db->insert($table, $this->data);
    }

    public function tb_rekening4($set, $table = null){
        $this->data = array(
            "tb_rekening1_kode" => (string)$set[0],
            "tb_rekening2_kode" => (string)$set[1],
            "tb_rekening3_kode" => (string)$set[2],
            "tb_rekening4_kode" => (string)$set[3],
            "tb_rekening4_nama" => (string)$set[4],
        );
        $this->db->insert($table, $this->data);
    }

    public function tb_rekening5($set, $table = null){
        $this->data = array(
            "tb_rekening1_kode" => (string)$set[0],
            "tb_rekening2_kode" => (string)$set[1],
            "tb_rekening3_kode" => (string)$set[2],
            "tb_rekening4_kode" => (string)$set[3],
            "tb_rekening5_kode" => (string)$set[4],
            "tb_rekening5_nama" => (string)$set[5],
        );
        $this->db->insert($table, $this->data);
    }

    
    public function tb_provinsi($set, $table = null){
        $this->data = array(
            "tb_provinsi_kode" => (string)$set[0], 
            "tb_provinsi_nama" => (string)$set[1],
        );
        $this->db->insert($table, $this->data);
    }
    
    public function tb_kabupaten($set, $table = null){
        $this->data = array(
            "tb_provinsi_kode" => (string)$set[0], 
            "tb_kabupaten_kode" => (string)$set[1],
            "tb_kabupaten_nama" => (string)$set[2],
        );
        $this->db->insert($table, $this->data);
    }
    
    public function tb_kecamatan($set, $table = null){
        $this->data = array(
            "tb_provinsi_kode" => (string)$set[0], 
            "tb_kabupaten_kode" => (string)$set[1],
            "tb_kecamatan_kode" => (string)$set[2],
            "tb_kecamatan_nama" => (string)$set[3],
        );
        $this->db->insert($table, $this->data);
    }
    
    public function tb_deskel($set, $table = null){
        $this->data = array(
            "tb_provinsi_kode" => (string)$set[0], 
            "tb_kabupaten_kode" => (string)$set[1],
            "tb_kecamatan_kode" => (string)$set[2],
            "tb_deskel_level" => (string)$set[3],
            "tb_deskel_kode" => (string)$set[4],
            "tb_deskel_nama" => (string)$set[5],
        );
        $this->db->insert($table, $this->data);
    }

    public function tb_kriteria_pembobotan($set, $table = null){
        $this->data = array(
            "id_tb_kriteria_pembobotan" => (string)$set[0], 
            "tb_kriteria_pembobotan_nama" => (string)$set[1],
            "tb_kriteria_pembobotan_bobot" => (string)$set[2],
            "tb_kriteria_pembobotan_ket" => (string)$set[3],
        );
        $this->db->insert($table, $this->data);
    }

    public function tb_kriteria_bobot($set, $table = null){
        $this->data = array(
            "id_tb_kriteria_bobot" => (string)$set[0], 
            "id_tb_kriteria_pembobotan" => (string)$set[1],
            "tb_kriteria_bobot_level" => (string)$set[2],
            "tb_kriteria_bobot_range" => (string)$set[3],
            "tb_kriteria_bobot_skor" => (string)$set[4],
        );
        $this->db->insert($table, $this->data);
    }

    public function importRek()
    {
        ini_set('max_execution_time', 0); 
        ini_set('memory_limit','2048M');
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
                for ($i=0; $i < 40; $i++) { 
                    $set[$i] = $worksheet->getCellByColumnAndRow($i, $row)->getValue();
                }
                $this->$post['table']($set, $post['table']);
                $this->hapus = false;
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