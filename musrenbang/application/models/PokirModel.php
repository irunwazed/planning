<?php

class PokirModel extends CI_Model
{
    private $jumlah;
    private $table;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->table = "ref_musrenbang_pokir";
    }

    public function setQuery($post){

        
        $this->db->join('ta_user_unit', '
            ta_user_unit.Kd_User = '.$this->table.'.opd_user_id
            ', 'left');

        $this->db->join('ref_sub_unit', '
            ref_sub_unit.Kd_Urusan = ta_user_unit.Kd_Urusan
            AND ref_sub_unit.Kd_Bidang = ta_user_unit.Kd_Bidang
            AND ref_sub_unit.Kd_Unit = ta_user_unit.Kd_Unit
            AND ref_sub_unit.Kd_Sub = ta_user_unit.Kd_Sub_Unit
            ', 'left');
        
        $this->db->join("ref_kelurahan", "ref_kelurahan.Kd_Prov = ".$this->table.".Kd_Prov
            AND ref_kelurahan.Kd_Kab = ".$this->table.".Kd_Kab
            AND ref_kelurahan.Kd_Kec = ".$this->table.".Kd_Kec
            AND ref_kelurahan.Kd_Kel = ".$this->table.".Kd_Kel
            AND ref_kelurahan.Kd_Urut = ".$this->table.".Kd_Urut_Kel", "left");

            
        $this->db->join("ref_kecamatan", "ref_kecamatan.Kd_Prov = ".$this->table.".Kd_Prov
                AND ref_kecamatan.Kd_Kab = ".$this->table.".Kd_Kab
                AND ref_kecamatan.Kd_Kec = ".$this->table.".Kd_Kec", "left");

        
        $this->db->join('ref_standard_satuan', '
            ref_standard_satuan.Kd_Satuan = '.$this->table.'.satuan_id
            ', 'left');
        $this->db->join('ref_musrenbang_kategori', '
            ref_musrenbang_kategori.id = '.$this->table.'.kategori_id
                ', 'left');

        $this->db->like('nama', $post['search']);
        
        if(@$post['kecamatan'] != 'null'){
    
            // $Kd_Wil = explode("-", $post['kecamatan']);
            // $this->db->where($this->table.'.Kd_Prov', $Kd_Wil[0]);
            // $this->db->where($this->table.'.Kd_Kab', $Kd_Wil[1]);
            // $this->db->where($this->table.'.Kd_Kec', $Kd_Wil[0]);

            
            $this->db->where($this->table.'.Kd_Kec', $post['kecamatan']);
           

            if(@$post['kelurahan'] != 'null' && count(explode("-", @$post['kelurahan'])) == 2){
                // print_r($post['kelurahan']);
                $Kd_Wil = explode("-", $post['kelurahan']);
                // $this->db->where($this->table.'.Kd_Prov', $Kd_Wil[0]);
                // $this->db->where($this->table.'.Kd_Kab', $Kd_Wil[1]);
                // $this->db->where($this->table.'.Kd_Kec', $Kd_Wil[2]);
                $this->db->where($this->table.'.Kd_Kel', $Kd_Wil[0]);
                $this->db->where($this->table.'.Kd_Urut_Kel', $Kd_Wil[1]);
            }
        }
        
        $this->db->order_by($this->table.'.Kd_Prov', "ASC");
        $this->db->order_by($this->table.'.Kd_Kab', "ASC");
        $this->db->order_by($this->table.'.Kd_Kec', "ASC");
        $this->db->order_by($this->table.'.Kd_Kel', "ASC");
        $this->db->order_by($this->table.'.Kd_Urut_Kel', "ASC");
        $this->db->order_by($this->table.'.skor_total', "DESC");
        $this->db->order_by($this->table.'.pengusul', "ASC");

    }

    public function getCount($post){
        $this->setQuery($post);

        $query = $this->db->get($this->table);
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($post, $all = false){
        $jumlah = $this->jumlah;

        $awal = ($post['page'] - 1)*$jumlah;
        $this->db->select($this->table.'.*, ref_standard_satuan.Uraian as nama_satuan, ref_sub_unit.Nm_Sub_Unit, ref_musrenbang_kategori.kategori, ref_kecamatan.Nm_Kec, ref_kelurahan.Nm_Kel');
        
        $this->setQuery($post);
        
        if(!$all){
            $this->db->limit($jumlah,$awal);
        }
        
        $query = $this->db->get($this->table);
        
        return $query->result_array();
    }

    public function getCountKiriman($search = '', $user_id){
        $this->db->like('user_pokir', '"'.$user_id.'"');
        // $this->db->where('id', $dataToken['grup_id']);
        // $this->db->like('nama', $search);
        $query = $this->db->get('ref_grup_musrenbang');
        return $query->num_rows();
    }

    public function getAllKiriman($page = 1, $search = '', $user_id, $all = false){
        $jumlah = $this->jumlah;

        $awal = ($page - 1)*$jumlah;
        // $this->db->select($this->table.'.*, ref_standard_satuan.Uraian as nama_satuan, ref_sub_unit.Nm_Sub_Unit');
        $this->db->like('user_pokir', '"'.$user_id.'"');
        $this->db->order_by("tgl", "desc");
        // $this->db->where('id', $dataToken['grup_id']);
        // $this->db->join('ta_user_unit', '
        //     ta_user_unit.Kd_User = '.$this->table.'.opd_user_id
        //     ', 'left');
        // $this->db->join('ref_sub_unit', '
        //     ref_sub_unit.Kd_Urusan = ta_user_unit.Kd_Urusan
        //     AND ref_sub_unit.Kd_Bidang = ta_user_unit.Kd_Bidang
        //     AND ref_sub_unit.Kd_Unit = ta_user_unit.Kd_Unit
        //     AND ref_sub_unit.Kd_Sub = ta_user_unit.Kd_Sub_Unit
        //     ', 'left');
        // $this->db->like('nama', $search);
        if(!$all){
            $this->db->limit($jumlah,$awal);
        }
        // $this->db->join('ref_standard_satuan', '
        //     ref_standard_satuan.Kd_Satuan = '.$this->table.'.satuan_id
        //     ', 'left');
        
        $query = $this->db->get('ref_grup_musrenbang');
        
        return $query->result_array();
    }

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        
        $id = $post['id'];

        $kec = @$post['kecamatan']?$post['kecamatan']:0;

        $kel = explode("-", $post['kelurahan']);
        $kel[0] = @$kel[0]?$kel[0]:0;
        $kel[1] = @$kel[1]?$kel[1]:0;

        $wil = "72-6-".$kec.'-'.$kel[0].'-'.$kel[1];

        $kd_wil = explode("-", $wil);

        $lastId = $this->getLastId($wil);

        $this->db->where('id', $id);
        
        $data = array(
            'nama' => $post['nama'],
            'alasan' => @$post['alasan'],
            'lokasi' => $post['lokasi'],
            'volume' => $post['volume'],
            'satuan_id' => $post['satuan'],
            'pagu' => @$post['pagu']?$post['pagu']:0,
            'manfaat' => @$post['manfaat'],
            'pengusul' => $post['pengusul'],
            'kategori_id' => @$post['kategori']!=0?$post['kategori']:1,
            'kd_asal' => @$post['kecamatan'].'-'.@$post['kelurahan'],
            'Kd_Prov' => @$kd_wil[0]?$kd_wil[0]:0,
            'Kd_Kab' => @$kd_wil[1]?$kd_wil[1]:0,
            'Kd_Kec' => @$kd_wil[2]?$kd_wil[2]:0,
            'Kd_Kel' => @$kd_wil[3]?$kd_wil[3]:0,
            'Kd_Urut_Kel' => @$kd_wil[4]?$kd_wil[4]:0,
            'Kd_Mus' => $lastId,
        );

        if($post['foto'] != ''){
            $data['file'] = $post['foto'];
        }

        $result = $this->db->update($this->table, $data);

        return $result;
    }

    public function getLastId($kode_wil){
        
        $Kd_Wil = explode("-", $kode_wil);
        
        $this->db->where('Kd_Prov', $Kd_Wil[0]);
        $this->db->where('Kd_Kab', $Kd_Wil[1]);
        $this->db->where('Kd_Kec', $Kd_Wil[2]);
        $this->db->where('Kd_Kel', $Kd_Wil[3]);
        $this->db->where('Kd_Urut_Kel', $Kd_Wil[4]);
        $this->db->order_by("Kd_Mus", "DESC");
        $data = $this->db->get($this->table)->row();

        $id = @$data->Kd_Mus+1;
        return $id;
    }

    public function create($post)
    {
        $post = $this->security->xss_clean($post);
        $date = date("Y-m-d H:i:s");

        $kec = @$post['kecamatan']?$post['kecamatan']:0;

        $kel = explode("-", $post['kelurahan']);
        $kel[0] = @$kel[0]?$kel[0]:0;
        $kel[1] = @$kel[1]?$kel[1]:0;

        $wil = "72-6-".$kec.'-'.$kel[0].'-'.$kel[1];

        $kd_wil = explode("-", $wil);

        $data = array(
            'nama' => $post['nama'],
            'user_id' => $post['session']['id'],
            'alasan' => @$post['alasan'],
            'lokasi' => $post['lokasi'],
            'volume' => $post['volume'],
            'satuan_id' => $post['satuan'],
            'kategori_id' => @$post['kategori']?$post['kategori']:1,
            'pagu' => @$post['pagu']?$post['pagu']:0,
            'manfaat' => @$post['manfaat'],
            'pengusul' => $post['pengusul'],
            'file' => $post['foto'],
            'asal' => 3,
            'tgl_input' => $date,
            'kd_asal' => $wil,
            'Kd_Prov' => @$kd_wil[0]?$kd_wil[0]:0,
            'Kd_Kab' => @$kd_wil[1]?$kd_wil[1]:0,
            'Kd_Kec' => @$kd_wil[2]?$kd_wil[2]:0,
            'Kd_Kel' => @$kd_wil[3]?$kd_wil[3]:0,
            'Kd_Urut_Kel' => @$kd_wil[4]?$kd_wil[4]:0,
            'Kd_Mus' => $this->getLastId($wil),
        );
      
       
        $result = $this->db->insert($this->table, $data);
        return $result;
    }

    public function delete($post, $grup = true){


        $this->db->where('id', $post['id']);
        
        $result = $this->db->delete($this->table);
        return $result;
    }

    public function getGrup($post, $user_id){
        $this->db->like('user_pokir', '"'.$user_id.'"');
        $this->db->where('id', $post['id']);

        $grup = $this->db->get('ref_grup_musrenbang')->row();
        return $grup;
    }

    public function createGrup($tgl, $user_id)
    {
        $arrUser = json_encode(array($user_id));
        $data = array(
            'tgl' => $tgl,
            'posisi' => 5,
            'user_kec' => '0',
            'user_pokir' => $arrUser,
        );
    //    print_r($arrUser);
        $result = $this->db->insert('ref_grup_musrenbang', $data);

        
            $this->db->where('id',$this->db->insert_id());
            $query = $this->db->get('ref_grup_musrenbang');
        

        return $query->row();
    }

    public function createGrubToken($user_id, $grup_id){
        $dataSession = array(
            'user_id' => $user_id,
            'grup_id' => $grup_id,
        );
        $stringSession = json_encode($dataSession);
        $encryption = $this->encryption->encrypt($stringSession);
        return $encryption;
    }

    public function getGrupToken($token){
        // return array();
        $decrypt = $this->encryption->decrypt($token);
		return json_decode($decrypt, true);
    }

    public function getAsal($user_id){
        $this->db->where('Kd_User', $user_id);
        $this->db->join('ref_lingkungan', '
            ref_lingkungan.Kd_Lingkungan = ta_user_kelompok.Kd_Lingkungan
            and ref_lingkungan.Kd_Urut_Kel = ta_user_kelompok.Kd_Urut_Kel
            and ref_lingkungan.Kd_Kel = ta_user_kelompok.Kd_Kel
            and ref_lingkungan.Kd_Kec = ta_user_kelompok.Kd_Kec
            and ref_lingkungan.Kd_Kab = ta_user_kelompok.Kd_Kab
            and ref_lingkungan.Kd_Prov = ta_user_kelompok.Kd_Prov
            ', 'left');
        $this->db->join('ref_kelurahan', '
            ref_kelurahan.Kd_Urut = ta_user_kelompok.Kd_Urut_Kel
            and ref_kelurahan.Kd_Kel = ta_user_kelompok.Kd_Kel
            and ref_kelurahan.Kd_Kec = ta_user_kelompok.Kd_Kec
            and ref_kelurahan.Kd_Kab = ta_user_kelompok.Kd_Kab
            and ref_kelurahan.Kd_Prov = ta_user_kelompok.Kd_Prov
            ', 'left');
        $this->db->join('ref_kecamatan', '
            ref_kecamatan.Kd_Kec = ta_user_kelompok.Kd_Kec
            and ref_kecamatan.Kd_Kab = ta_user_kelompok.Kd_Kab
            and ref_kecamatan.Kd_Prov = ta_user_kelompok.Kd_Prov
            ', 'left');
        $this->db->join('ref_kabupaten', '
            ref_kabupaten.Kd_Kab = ta_user_kelompok.Kd_Kab
            and ref_kabupaten.Kd_Prov = ta_user_kelompok.Kd_Prov
            ', 'left');
        $data = $this->db->get('ta_user_kelompok');
        return $data->row();
    }

    public function uploadBerkas($post){
        $post = $this->security->xss_clean($post);
        
        // $result = $this->ubahGrupPosisi($post['grup_id'], 4);
        $result = true;
        if($result){
            $this->db->where('user_id', $post['user_id']);
            $this->db->where('grup_id', $post['grup_id']);
            
            $data = array(
                'berkas_usulan' => $post['usulan'],
                'posisi' => 2,
            );
    
            $result = $this->db->update($this->table, $data);
        }

        return $result;
    }

    public function ubahGrupPosisi($id, $posisi, $larang = array()){
        $jalan = true;
        $pesan = '';
        $this->db->where('id', $id);
        $grup = $this->db->get('ref_grup_musrenbang')->row();
        if(in_array($grup->posisi, $larang) || $grup->posisi < 5 || $grup->posisi > 9){
            if($grup->posisi == 5){
                $pesan = 'Anda harus Memilih Grup Usulan Terlebih dahulu';
            }else if($grup->posisi == 6){
                $pesan = 'Anda Sudah Melakukan download berkas';
            }else if($grup->posisi == 7){
                $pesan = 'Data Anda Belum Lengkap';
            }else if($grup->posisi == 8){
                $pesan = 'Anda harus Menginput terlebih dahulu';
            }else if($grup->posisi == 9){
                $pesan = 'Usulan Anda Telah Terkirim';
            }else if($grup->posisi < 5){
                $pesan = 'Usulan Telah Ditarik Kembali';
            }else{
                $pesan = 'Usulan ini telah diproses';
            }
            $jalan = false;
        }

        if($jalan){
            if($grup->posisi != $posisi){
                $this->db->where('id', $id);
                $data = array(
                    'posisi' => $posisi,
                );
                $result = $this->db->update('ref_grup_musrenbang', $data);
            }
        }
        $kirim = array(
            'pesan' => $pesan,
            'status' => $jalan
        );
        return $kirim;
    }

    public function kirimBerkas($post){
        
        $result = false;

        $status = true;
        

        $this->db->where($this->table.'.opd_user_id !=', 0);
        $datas = $this->db->get($this->table)->result_array();
        
        if(count($datas)==0){
            $status = false;
        }
        

        if($status){
            
            foreach($datas as $data){
                
                $kirim = array(
                    'user_id' => $data['user_id'],
                    'tahun' => $data['tahun'],
                    'nama' => $data['nama'],
                    'alasan' => $data['alasan'],
                    'lokasi' => $data['lokasi'],
                    'volume' => $data['volume'],
                    'satuan_id' => $data['satuan_id'],
                    'kategori_id' => $data['kategori_id'],
                    'pagu' => $data['pagu'],
                    'pengusul' => $data['pengusul'],
                    'manfaat' => $data['manfaat'],
                    'file' => $data['file'],
                    'berkas_ba' => $data['berkas_ba'],
                    'berkas_usulan' => $data['berkas_usulan'],
                    'tgl_input' => $data['tgl_input'],
                    'asal' => $data['asal'],
                    'skor_keterdesakan' => $data['skor_keterdesakan'],
                    'skor_pertumbuhan' => $data['skor_pertumbuhan'],
                    'skor_potensi' => $data['skor_potensi'],
                    'skor_kemiskinan' => $data['skor_kemiskinan'],
                    'skor_manfaat' => $data['skor_manfaat'],
                    'skor_partisipasi' => $data['skor_partisipasi'],
                    'skor_pelaksanaan' => $data['skor_pelaksanaan'],
                    'skor_dokumen' => $data['skor_dokumen'],
                    'skor_total' => $data['skor_total'],
                    'opd_user_id' => $data['opd_user_id'],
                    'Kd_Prov' => $data['Kd_Prov'],
                    'Kd_Kab' => $data['Kd_Kab'],
                    'Kd_Kec' => $data['Kd_Kec'],
                    'Kd_Kel' => $data['Kd_Kel'],
                    'Kd_Urut_Kel' => $data['Kd_Urut_Kel'],
                    'Kd_Mus' => $data['Kd_Mus'],
                    'terima' => @$data['terima']?$data['terima']:1,
                    'terimaKet' => @$data['terimaKet']?$data['terimaKet']:'-',
                );

                $this->db->where("Kd_User", $data['opd_user_id']);
				$dataOpd = $this->db->get("ta_user_unit")->row();

				$kirim['Kd_Urusan'] = @$dataOpd->Kd_Urusan?$dataOpd->Kd_Urusan:0;
				$kirim['Kd_Bidang'] = @$dataOpd->Kd_Bidang?$dataOpd->Kd_Bidang:0;
				$kirim['Kd_Unit'] = @$dataOpd->Kd_Unit?$dataOpd->Kd_Unit:0;
				$kirim['Kd_Sub'] = @$dataOpd->Kd_Sub_Unit?$dataOpd->Kd_Sub_Unit:0;

                $result = $this->db->insert('ref_musrenbang_opd', $kirim);
            }

            // $user_kec = $this->cariUserKecamatan($data['user_id']);

            // $this->ubahGrupPosisi($post['grup_id'], 5);
            
            // $this->delete($post, false);
        }
        return $status;

    }

    public function cariUserKecamatan($user_kel){
        $this->db->where('Kd_User', $user_kel);
        $data = $this->db->get('ta_user_kelompok');
        $user = $data->row();

        $this->db->where('Kd_Prov', $user->Kd_Prov);
        $this->db->where('Kd_Kab', $user->Kd_Kab);
        $this->db->where('Kd_Kec', $user->Kd_Kec);
        $this->db->where('Kd_Kel', 0);
        $data = $this->db->get('ta_user_kelompok');

        $data = $data->result_array();

        $user_kec = array();
        if(count($data) == 1)
        {
            foreach($data as $dataUser){
                array_push($user_kec, $dataUser['Kd_User']);
            }
        }
        $kirim = json_encode($user_kec);

        return $kirim;
    }

    public function getUser($user_id){
        $this->db->where('Kd_User', $user_id);
        $query = $this->db->get('ta_user_dapil');
        $set = $query->result_array();

        $this->db->where('Kd_Dapil', $set[0]['Kd_Dapil']);
        $query = $this->db->get('ref_dapil');
        $user['dapil'] = $query->row();

        $this->db->where('Kd_Dapil', $set[0]['Kd_Dapil']);
        $this->db->where('Kd_Dewan', $set[0]['Kd_Dewan']);
        $query = $this->db->get('ref_dewan');
        $user['dewan'] = $query->row();
        return $user;

    }

    public function createSkor($post){
        $post = $this->security->xss_clean($post);
        
        $id = $post['id'];
        // $skor = $this->hitungSkor($post);

        $this->db->where('id', $id);
        
        
        $data = array(
            'opd_user_id' => $post['opd'],
        );

        $result = $this->db->update($this->table, $data);

        return $result;
    }

    public function hitungSkor($post){
        $hasil = 0;
        // print_r($post);
        // echo $post['skor_keterdesakan'];
        // $this->db->where('Kd_Bobot', 23);
        // $skor = $this->db->get('ref_kecamatan_kriteria_bobot')->row();
        // $hasil = 1;
        // $hasil = $this->getSkor(2);
        // $hasil += $this->getSkor(23);
        $hasil += $this->getSkor(@$post['skor_keterdesakan']);
        $hasil += $this->getSkor(@$post['skor_pertumbuhan']);
        $hasil += $this->getSkor(@$post['skor_potensi']);
        $hasil += $this->getSkor(@$post['skor_kemiskinan']);
        $hasil += $this->getSkor(@$post['skor_manfaat']);
        $hasil += $this->getSkor(@$post['skor_partisipasi']);
        $hasil += $this->getSkor(@$post['skor_pelaksanaan']);
        $hasil += $this->getSkor(@$post['skor_dokumen']);

        return (float)$hasil;
    }

    public function getSkor($isi){
        
        $mySkor = 0;
        if($isi != null && $isi != 0){
            $this->db->where('Kd_Bobot', $isi);
            $skor = $this->db->get('ref_kecamatan_kriteria_bobot')->row();
            $mySkor = $skor->Skor;
        }
        return (float)$mySkor;
    }

}