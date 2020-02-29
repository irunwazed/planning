<?php

class KelurahanModel extends CI_Model
{
    private $jumlah, $tahun;
    public function __construct()
    {
        parent::__construct();
        $this->jumlah = 20;
        $this->tahun = date("Y");
    }

    public function setQuery($post){

        
        $this->db->join("ref_kelurahan", "ref_kelurahan.Kd_Prov = ref_musrenbang.Kd_Prov
                AND ref_kelurahan.Kd_Kab = ref_musrenbang.Kd_Kab
                AND ref_kelurahan.Kd_Kec = ref_musrenbang.Kd_Kec
                AND ref_kelurahan.Kd_Kel = ref_musrenbang.Kd_Kel
                AND ref_kelurahan.Kd_Urut = ref_musrenbang.Kd_Urut_Kel", "left");

        $Kd_Wil = explode("-", $post['session']['kd_wilayah']);
        $this->db->where('ref_musrenbang.tahun', $post['session']['tahun']);
        $this->db->where('ref_musrenbang.Kd_Prov', $Kd_Wil[0]);
        $this->db->where('ref_musrenbang.Kd_Kab', $Kd_Wil[1]);
        $this->db->where('ref_musrenbang.Kd_Kec', $Kd_Wil[2]);
        $this->db->where('ref_musrenbang.Kd_Kel', $Kd_Wil[3]);
        $this->db->where('ref_musrenbang.Kd_Urut_Kel', $Kd_Wil[4]);
        $this->db->like('nama', $post['search']);
        // print_r($post);
    }

    public function getCount($post){
        $this->setQuery($post);
        $query = $this->db->get('ref_musrenbang');
        // return count($query->result_array());
        return $query->num_rows();
    }

    public function getJumlahInPage(){
        return $this->jumlah;
    }

    public function getAll($post, $all = false){
        $jumlah = $this->jumlah;
        $this->db->select('ref_musrenbang.*, ref_standard_satuan.Uraian as nama_satuan, ref_musrenbang_kategori.kategori,ref_kelurahan.Nm_Kel  ');
        
        $awal = ($post['page'] - 1)*$jumlah;
        $this->setQuery($post);

        if(!$all){
            $this->db->limit($jumlah,$awal);
        }
        $this->db->join('ref_standard_satuan', '
            ref_standard_satuan.Kd_Satuan = ref_musrenbang.satuan_id
            ', 'left');
        $this->db->join('ref_musrenbang_kategori', '
        ref_musrenbang_kategori.id = ref_musrenbang.kategori_id
            ', 'left');
        
        $query = $this->db->get('ref_musrenbang');
        
        return $query->result_array();
    }

    public function setQueryKiriman($post){
        $table = "ref_musrenbang";

        $this->db->join("ref_kelurahan", "ref_kelurahan.Kd_Prov = $table.Kd_Prov
        AND ref_kelurahan.Kd_Kab = $table.Kd_Kab
        AND ref_kelurahan.Kd_Kec = $table.Kd_Kec
        AND ref_kelurahan.Kd_Kel = $table.Kd_Kel
        AND ref_kelurahan.Kd_Urut = $table.Kd_Urut_Kel", "left");

        $Kd_Wil = explode("-", $post['session']['kd_wilayah']);
        $this->db->where($table.'.tahun', $post['session']['tahun']);
        $this->db->where($table.'.Kd_Prov', $Kd_Wil[0]);
        $this->db->where($table.'.Kd_Kab', $Kd_Wil[1]);
        $this->db->where($table.'.Kd_Kec', $Kd_Wil[2]);
        $this->db->where($table.'.Kd_Kel', $Kd_Wil[3]);
        $this->db->where($table.'.Kd_Urut_Kel', $Kd_Wil[4]);

        $this->db->group_by(array(
            $table.".tahun", $table.".Kd_Prov", $table.".Kd_Kab", $table.".Kd_Kec", $table.".Kd_Kel", $table.".Kd_Urut_Kel",
        ), 'desc');
        // $this->db->like('user_kel', $post['session']['id']);

    }

    public function getCountKiriman($post){
        $this->setQueryKiriman($post);
        $query = $this->db->get('ref_musrenbang');
        return $query->num_rows();
    }

    public function getAllKiriman($post, $all = false){
        $jumlah = $this->jumlah;

        $awal = ($post['page'] - 1)*$jumlah;
        $this->setQueryKiriman($post);
        // $this->db->select($this->table.'.*, ref_standard_satuan.Uraian as nama_satuan, ref_sub_unit.Nm_Sub_Unit');
      
        $this->db->order_by("tahun", "desc");
        if(!$all){
            $this->db->limit($jumlah,$awal);
        }
        
        $query = $this->db->get('ref_musrenbang');
        
        return $query->result_array();
    }

    public function update($post){
        
        $post = $this->security->xss_clean($post);
        
        $id = $post['id'];

        $this->db->where('id', $id);
        
        if($post['foto'] != ''){
            $data = array(
                'nama' => $post['nama'],
                'alasan' => $post['alasan'],
                'lokasi' => $post['lokasi'],
                'volume' => $post['volume'],
                'satuan_id' => $post['satuan'],
                'pagu' => $post['pagu'],
                'manfaat' => $post['manfaat'],
                'pengusul' => $post['pengusul'],
                'file' => $post['foto'],
                'kategori_id' => $post['kategori'],
            );
        }else{
            $data = array(
                'nama' => $post['nama'],
                'alasan' => $post['alasan'],
                'lokasi' => $post['lokasi'],
                'volume' => $post['volume'],
                'satuan_id' => $post['satuan'],
                'pagu' => $post['pagu'],
                'manfaat' => $post['manfaat'],
                'pengusul' => $post['pengusul'],
                'kategori_id' => $post['kategori'],
            );
        }

        $result = $this->db->update('ref_musrenbang', $data);

        return $result;
    }

    public function getLastId($post){
        
        $Kd_Wil = explode("-", $post['session']['kd_wilayah']);
        
        $this->db->where('Kd_Prov', $Kd_Wil[0]);
        $this->db->where('Kd_Kab', $Kd_Wil[1]);
        $this->db->where('Kd_Kec', $Kd_Wil[2]);
        $this->db->where('Kd_Kel', $Kd_Wil[3]);
        $this->db->where('Kd_Urut_Kel', $Kd_Wil[4]);
        $this->db->order_by("Kd_Mus", "DESC");
        $data = $this->db->get('ref_musrenbang')->row();

        $id = @$data->Kd_Mus+1;
        return $id;
    }

    public function create($post)
    {
        // $this->load->library('MyConfig');
        $post = $this->security->xss_clean($post);
        
        $date = date("Y-m-d H:i:s");
        $Kd_Wil = explode("-", $post['session']['kd_wilayah']);
        $data = array(
            'tahun' => $post['session']['tahun'],
            'user_id' => $post['session']['id'],
            'nama' => $post['nama'],
            'alasan' => $post['alasan'],
            'lokasi' => $post['lokasi'],
            'volume' => $post['volume'],
            'satuan_id' => $post['satuan'],
            'kategori_id' => $post['kategori'],
            'pagu' => $post['pagu'],
            'manfaat' => $post['manfaat'],
            'pengusul' => $post['pengusul'],
            'file' => $post['foto'],
            'asal' => 1,
            'Kd_Prov' => $Kd_Wil[0],
            'Kd_Kab' => $Kd_Wil[1],
            'Kd_Kec' => $Kd_Wil[2],
            'Kd_Kel' => $Kd_Wil[3],
            'Kd_Urut_Kel' => $Kd_Wil[4],
            'Kd_Mus' => $this->getLastId($post),
            'tgl_input' => $date,
            'posisi' => 1,
        );

        $result = $this->db->insert('ref_musrenbang', $data);
        return $result;
    }

    public function createGrup($tgl, $user_id)
    {

        $data = array(
            'tgl' => $tgl,
            'posisi' => 1,
            'user_kel' => $user_id,
        );
       
        $result = $this->db->insert('ref_grup_musrenbang', $data);

        
            $this->db->where('id',$this->db->insert_id());
            $query = $this->db->get('ref_grup_musrenbang');
        

        return $query->row();
    }


    // public function getGrup($post, $user_id){
    //     $this->db->like('user_kel', $user_id);
    //     $this->db->where('id', $post['id']);

    //     $grup = $this->db->get('ref_grup_musrenbang')->row();
    //     return $grup;
    // }

    public function getGrup($post, $user_id){
        // $this->db->like('user_kel', $user_id);
        $this->db->where('tahun', $this->tahun);
        // $this->group_by('tahun');
        $grup = $this->db->get('ref_musrenbang')->row();
        return $grup;
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
        
        // $result = $this->ubahGrupPosisi($post['grup_id'], 2);
        $result = true;
        if($result){
            // $this->db->where('user_id', $post['user_id']);
            // $this->db->where('grup_id', $post['grup_id']);
            
            
            $Kd_Wil = explode("-", $post['session']['kd_wilayah']);
            $this->db->where('asal', 1);
            $this->db->where('tahun', $post['session']['tahun']);
            $this->db->where('Kd_Prov', $Kd_Wil[0]);
            $this->db->where('Kd_Kab', $Kd_Wil[1]);
            $this->db->where('Kd_Kec', $Kd_Wil[2]);
            $this->db->where('Kd_Kel', $Kd_Wil[3]);
            $this->db->where('Kd_Urut_Kel', $Kd_Wil[4]);

            $data = array(
                'berkas_ba' => $post['ba'],
                'berkas_usulan' => $post['usulan'],
                'posisi' => 1,
            );
    
            $result = $this->db->update('ref_musrenbang', $data);
        }

        return $result;
    }

    
    public function ubahGrupPosisi($id, $posisi, $larang = array(), $user_kel = NULL, $user_kec = NULL){
        $jalan = true;
        $pesan = '';
        $this->db->where('id', $id);
        $grup = $this->db->get('ref_grup_musrenbang')->row();
        if(in_array($grup->posisi, $larang) || $grup->posisi > 5){
            if($grup->posisi == 1){
                $pesan = 'Anda harus Memilih Grup Usulan Terlebih dahulu';
            }else if($grup->posisi == 2){
                $pesan = 'Anda Sudah Melakukan download berkas';
            }else if($grup->posisi == 3){
                $pesan = 'Data Anda Belum Lengkap';
            }else if($grup->posisi == 4){
                $pesan = 'Anda harus Menginput terlebih dahulu';
            }else if($grup->posisi == 5){
                $pesan = 'Usulan Anda Telah Terkirim';
            }else{
                $pesan = 'Usulan ini telah diproses';
            }
            // $jalan = false;
        }
        
        if($jalan){
            $this->db->where('id', $id);
            $data = array(
                'posisi' => $posisi,
            );
            if($user_kel != NULL){
                $data['user_kel'] = $user_kel;
            }
            if($user_kec != NULL){
                $data['user_kec'] = $user_kec;
            }
            $result = $this->db->update('ref_grup_musrenbang', $data);
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

        $Kd_Wil = explode("-", $post['session']['kd_wilayah']);
        $this->db->where('tahun', $post['session']['tahun']);
        $this->db->where('Kd_Prov', $Kd_Wil[0]);
        $this->db->where('Kd_Kab', $Kd_Wil[1]);
        $this->db->where('Kd_Kec', $Kd_Wil[2]);
        $this->db->where('Kd_Kel', $Kd_Wil[3]);
        $this->db->where('Kd_Urut_Kel', $Kd_Wil[4]);
        $this->db->where('user_id', $post['session']['id']);
        
        
        $result = $this->db->delete('ref_musrenbang_kecamatan');
        
        
        $Kd_Wil = explode("-", $post['session']['kd_wilayah']);
        $this->db->where('tahun', $post['session']['tahun']);
        $this->db->where('Kd_Prov', $Kd_Wil[0]);
        $this->db->where('Kd_Kab', $Kd_Wil[1]);
        $this->db->where('Kd_Kec', $Kd_Wil[2]);
        $this->db->where('Kd_Kel', $Kd_Wil[3]);
        $this->db->where('Kd_Urut_Kel', $Kd_Wil[4]);
        $this->db->where('user_id', $post['session']['id']);



        $datas = $this->db->get('ref_musrenbang')->result_array();
        // print_r($datas);
        if(count($datas)==0){
            $status = false;
        }
        // $status = false;

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
                    'Kd_Prov' => $data['Kd_Prov'],
                    'Kd_Kab' => $data['Kd_Kab'],
                    'Kd_Kec' => $data['Kd_Kec'],
                    'Kd_Kel' => $data['Kd_Kel'],
                    'Kd_Urut_Kel' => $data['Kd_Urut_Kel'],
                    'Kd_Mus' => $data['Kd_Mus'],
                );
                $result = $this->db->insert('ref_musrenbang_kecamatan', $kirim);
            }

            // $user_kec = $this->cariUserKecamatan($data['user_id']);

            // $this->ubahGrupPosisi($post['grup_id'], 3, $data['user_id'], $user_kec);
            
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
            // $user_kec = $data[0]['Kd_User'];
            foreach($data as $dataUser){
                array_push($user_kec, $dataUser['Kd_User']);
            }
        }
        $kirim = json_encode($user_kec);

        return $kirim;
        

    }

    public function delete($post, $grup = true){

        $this->db->where('id', $post['id']);
        
        $result = $this->db->delete('ref_musrenbang');
        return $result;
    }

}