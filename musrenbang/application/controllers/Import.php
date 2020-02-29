<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Import extends CI_Controller {
    // construct
    public function __construct() {
        parent::__construct();
        $this->load->library('MyConfig');
        $this->load->model("DataModel");
    }    

    function export($name='data')
    {
        $session = $this->myconfig->getSession($this->input->post('session'), 0 , true);
        $post = $this->input->post();
        if($session['status']){
            $this->load->model("DataModel");
            $post['session'] = $session;
            $jenis = $this->input->post('jenis');

            if($jenis == 'kelurahan'){
                $post['grup_id'] =  $this->input->post('id');
                $post['user_id'] = $session['id'];
                $post['table'] = 'ref_musrenbang';
            }else if($jenis == 'kecamatan'){
                $post['grup_id'] =  $this->input->post('id');
                $post['user_id'] = $session['id'];
                $post['table'] = 'ref_musrenbang_kecamatan';
            }else if($jenis == 'pokir'){
                $post['grup_id'] =  $this->input->post('id');
                $post['user_id'] = $session['id'];
                $post['table'] = 'ref_musrenbang_pokir';
            }
            
            $data = $this->DataModel->getDataAllExport($post);
    
            $this->load->library("excel");
    
            $fileName = $name."-".$post['session']['id']."-".time();
    
            $object = new PHPExcel();
    
            $object->setActiveSheetIndex(0);
    
            $table_columns = array(
                "id", 
                "tahun",
                "user_id",
                "nama",
                "alasan",
                "lokasi",
                "volume",
                "satuan_id",
                "kategori_id",
                "pagu",
                "pengusul",
                "manfaat",
                "file",
                "berkas_ba",
                "berkas_usulan",
                "tgl_input",
                "asal",
                "skor_keterdesakan",
                "skor_pertumbuhan",
                "skor_potensi",
                "skor_kemiskinan",
                "skor_manfaat",
                "skor_partisipasi",
                "skor_pelaksanaan",
                "skor_dokumen",
                "skor_total",
                "opd_user_id",
                "kd_asal",
                "Kd_Prov",
                "Kd_Kab",
                "Kd_Kec",
                "Kd_Kel",
                "Kd_Urut_Kel",
                "Kd_Mus",
            );

            if($jenis == 'kecamatan'){
                array_push($table_columns, "terima" );
                array_push($table_columns, "terimaKet" );
            }
    
            $column = 0;
    
            foreach($table_columns as $field)
            {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
            }
    
            $excel_row = 2;
    
            foreach($data as $row)
            {

                $index = 0;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['id']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['tahun']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['user_id']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['nama']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['alasan']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['lokasi']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['volume']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['satuan_id']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['kategori_id']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['pagu']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['pengusul']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['manfaat']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['file']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['berkas_ba']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['berkas_usulan']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['tgl_input']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['asal']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['skor_keterdesakan']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['skor_pertumbuhan']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['skor_potensi']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['skor_kemiskinan']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['skor_manfaat']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['skor_partisipasi']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['skor_pelaksanaan']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['skor_dokumen']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['skor_total']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['opd_user_id']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['kd_asal']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['Kd_Prov']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['Kd_Kab']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['Kd_Kec']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['Kd_Kel']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['Kd_Urut_Kel']); $index++;
                $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['Kd_Mus']); $index++;

                if($jenis == 'kecamatan'){
                    $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['terima']); $index++;
                    $object->getActiveSheet()->setCellValueByColumnAndRow($index, $excel_row, $row['terimaKet']); $index++;
                }

            $excel_row++;
            }
    
            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="'.$fileName.'.xls"');
            $object_writer->save('php://output');
        }

        
    }

    public function viewImport(){
        echo '<form action="import" method="POST"  enctype="multipart/form-data">
            <input type="file" name="file" />
            <input type="submit"  />
            </form>';
        
    }

    function fetch()
    {
        $data = array(
            array('nama'=> 'aka', 'age'=> 19),
            array('nama'=> 'aka', 'age'=> 19),
            array('nama'=> 'aka', 'age'=> 19),
            array('nama'=> 'aka', 'age'=> 19),
        );
        $output = '
        <h3 align="center">Total Data - </h3>
        <table class="table table-striped table-bordered">
        <tr>
            <th>Customer Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Country</th>
        </tr>
        ';
        foreach($data as $row)
        {
        $output .= '
        <tr>
            <td>'.$row['nama'].'</td>
            <td>'.$row['age'].'</td>
        </tr>
        ';
        }
        $output .= '</table>';
        echo $output;
    }


    function import()
    {
        $session = $this->myconfig->getSession($this->input->post('session'), 0 , true);
        // print_r($_POST);
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
                for ($i=0; $i <= 40; $i++) { 
                    $set[$i] = $worksheet->getCellByColumnAndRow($i, $row)->getValue();
                }
                // echo "1";
                $kirim = array(
                    "tahun" => (int)$set[1], 
                    "user_id" => (int)$set[2],
                    "nama" => (string)$set[3],
                    "alasan" => (string)$set[4],
                    "lokasi" => (string)$set[5],
                    "volume" => (string)$set[6],
                    "satuan_id" => (int)$set[7],
                    "kategori_id" => (int)$set[8],
                    "pagu" => (string)$set[9],
                    "pengusul" => (string)$set[10],
                    "manfaat" => (string)$set[11],
                    "file" => (string)$set[12],
                    "berkas_ba" => (string)$set[13],
                    "berkas_usulan" => (string)$set[14],
                    "tgl_input" => (string)$set[15],
                    "asal" => (int)$set[16],
                    "skor_keterdesakan" => (float)$set[17],
                    "skor_pertumbuhan" => (float)$set[18],
                    "skor_potensi" => (float)$set[19],
                    "skor_kemiskinan" => (float)$set[20],
                    "skor_manfaat" => (float)$set[21],
                    "skor_partisipasi" => (float)$set[22],
                    "skor_pelaksanaan" => (float)$set[23],
                    "skor_dokumen" => (float)$set[24],
                    "skor_total" => (float)$set[25],
                    "opd_user_id" => (int)$set[26],
                    "kd_asal" => (int)@$set[27],
                    "Kd_Prov" => (int)$set[28],
                    "Kd_Kab" => (int)$set[29],
                    "Kd_Kec" => (int)$set[30],
                    "Kd_Kel" => (int)$set[31],
                    "Kd_Urut_Kel" => (int)$set[32],
                    "Kd_Mus" => (int)$set[33],
                );
                // print_r($set);
                // $result = $this->DataModel->getDataAll($kirim);
                
                if(@$this->input->post('jenis') == 'kecamatan'){

                    $kirim['terima'] = (int)$set[34];
                    $kirim['terimaKet'] = (string)$set[35];
                    // print_r($kirim);
                    // die("tes");
                    $status = $this->db->insert('ref_musrenbang_kecamatan', $kirim);
                    
                }else{
                    $status = $this->db->insert('ref_musrenbang_opd', $kirim);
                }
                
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
?>