<?php
// $judul = "Data Kota";
$des = "";
// echo "<pre>";
// print_r($dataHak);
// echo "</pre>";



function setLevel($level, $id = null){
    $arrLevel = ['', "Super Admin", "Admin", "OPD"];
    $nama = $arrLevel[$level];

    if($level == 3){

        // $this->db->join("tb_user_opd", "tb_user_opd.id_tb_user = tb_user.id_tb_user", "left");

        // $this->db->join("tb_user_opd", "tb_user_opd.id_tb_user = tb_user.id_tb_user", "left");

        // $this->db->where("id_tb_user", $id);
        // $data = $this->db->get("tb_user")->row();
    }

    return $nama;
}

?>
    <div class="app-main__inner">
        <div class="app-page-title" >
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div><?=@$judul?>
                        <div class="page-title-subheading"><?=@$des?>
                        </div>
                    </div>
                </div>
            </div>
        </div>            
        <div class="row">
            <div class="col-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-header bg-primary">
                        <h5 class="card-title" style="color: #fff"><i class="pe-7s-ribbon"></i> <?=@$judul?></h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('') ?>pengaturan/data/hak/set" method="POST" id="form-tahun">
                            <div class="row">
                                <div class="form-group col-4">
                                    <label>RPJMD</label>
                                    <select class="form-control select2" style="width: 100%" name="id">  
                                        <option value="">-= Pilih Pengguna =-</option>
                                        <?php foreach($dataUser as $row){ ?>
                                        <option <?=$id==$row['id_tb_user']?'selected':''?> value="<?=$row['id_tb_user']?>"><?=$row['tb_user_username']?> (<?=setLevel($row['tb_user_level'], $row['id_tb_user'])?>)</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>RPJMD</label>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['rpjmd']['misi']==1?' checked ':''?> name="rpjmd-misi">  
                                            </div>
                                            <div class="col-9">
                                                <span>Misi</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['rpjmd']['tujuan']==1?' checked ':''?> name="rpjmd-tujuan">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tujuan</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['rpjmd']['sasaran']==1?' checked ':''?> name="rpjmd-sasaran">  
                                            </div>
                                            <div class="col-9">
                                                <span>Sasaran</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['rpjmd']['opd']==1?' checked ':''?> name="rpjmd-opd">  
                                            </div>
                                            <div class="col-9">
                                                <span>OPD</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['rpjmd']['program']==1?' checked ':''?> name="rpjmd-program">  
                                            </div>
                                            <div class="col-9">
                                                <span>Program</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>RENSTRA</label>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['renstra']['kegiatan']==1?' checked ':''?> name="renstra-kegiatan">  
                                            </div>
                                            <div class="col-9">
                                                <span>Kegiatan</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>RKPD PENETAPAN</label>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['rkpdPenetapan']['program']==1?' checked ':''?> name="rkpd-penetapan-program">  
                                            </div>
                                            <div class="col-9">
                                                <span>Program</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['rkpdPenetapan']['kegiatan']==1?' checked ':''?> name="rkpd-penetapan-kegiatan">  
                                            </div>
                                            <div class="col-9">
                                                <span>Kegiatan</span> 
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(1,$dataHak['rkpdPenetapan']['tahun'])?' checked ':''?> name="rkpd-penetapan-tahun1">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 1</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(2,$dataHak['rkpdPenetapan']['tahun'])?' checked ':''?> name="rkpd-penetapan-tahun2">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 2</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(3,$dataHak['rkpdPenetapan']['tahun'])?' checked ':''?> name="rkpd-penetapan-tahun3">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 3</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(4,$dataHak['rkpdPenetapan']['tahun'])?' checked ':''?> name="rkpd-penetapan-tahun4">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 4</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(5,$dataHak['rkpdPenetapan']['tahun'])?' checked ':''?> name="rkpd-penetapan-tahun5">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 5</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label>RKPD Perubahan</label>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['rkpdPerubahan']['program']==1?' checked ':''?> name="rkpd-perubahan-program">  
                                            </div>
                                            <div class="col-9">
                                                <span>Program</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['rkpdPerubahan']['kegiatan']==1?' checked ':''?> name="rkpd-perubahan-kegiatan">  
                                            </div>
                                            <div class="col-9">
                                                <span>Kegiatan</span> 
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(1,$dataHak['rkpdPerubahan']['tahun'])?' checked ':''?> name="rkpd-perubahan-tahun1">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 1</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(2,$dataHak['rkpdPerubahan']['tahun'])?' checked ':''?> name="rkpd-perubahan-tahun2">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 2</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(3,$dataHak['rkpdPerubahan']['tahun'])?' checked ':''?> name="rkpd-perubahan-tahun3">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 3</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(4,$dataHak['rkpdPerubahan']['tahun'])?' checked ':''?> name="rkpd-perubahan-tahun4">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 4</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(5,$dataHak['rkpdPerubahan']['tahun'])==1?' checked ':''?> name="rkpd-perubahan-tahun5">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 5</span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>LRA</label>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['lra']['program']==1?' checked ':''?> name="lra-program">  
                                            </div>
                                            <div class="col-9">
                                                <span>Program</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['lra']['kegiatan']==1?' checked ':''?> name="lra-kegiatan">  
                                            </div>
                                            <div class="col-9">
                                                <span>kegiatan</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['lra']['rek3']==1?' checked ':''?> name="lra-rek3">  
                                            </div>
                                            <div class="col-9">
                                                <span>Rek 3</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['lra']['rek4']==1?' checked ':''?> name="lra-rek4">  
                                            </div>
                                            <div class="col-9">
                                                <span>Rek 4</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['lra']['rek5']==1?' checked ':''?> name="lra-rek5">  
                                            </div>
                                            <div class="col-9">
                                                <span>Rek 5</span> 
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(1,$dataHak['lra']['tahun'])?' checked ':''?> name="lra-tahun1">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 1</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(2,$dataHak['lra']['tahun'])?' checked ':''?> name="lra-tahun2">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 2</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(3,$dataHak['lra']['tahun'])?' checked ':''?> name="lra-tahun3">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 3</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(4,$dataHak['lra']['tahun'])==1?' checked ':''?> name="lra-tahun4">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 4</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(5,$dataHak['lra']['tahun'])?' checked ':''?> name="lra-tahun5">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 5</span> 
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(1,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan1">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 1</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(2,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan2">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 2</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(3,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan3">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 3</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(4,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan4">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 4</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(5 ,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan5">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 5</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(6 ,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan6">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 6</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(7 ,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan7">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 7</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(8 ,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan8">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 8</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(9 ,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan9">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 9</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(10,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan10">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 10</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(11 ,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan11">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 11</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(12,$dataHak['lra']['bulan'])?' checked ':''?> name="lra-bulan12">  
                                            </div>
                                            <div class="col-9">
                                                <span>Bulan 12</span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>PK</label>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['pk']['sasaran']==1?' checked ':''?> name="pk-sasaran">  
                                            </div>
                                            <div class="col-9">
                                                <span>Sasaran</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['pk']['program']==1?' checked ':''?> name="pk-program">  
                                            </div>
                                            <div class="col-9">
                                                <span>Program</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=$dataHak['pk']['kegiatan']==1?' checked ':''?> name="pk-kegiatan">  
                                            </div>
                                            <div class="col-9">
                                                <span>kegiatan</span> 
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(1,$dataHak['pk']['tahun'])?' checked ':''?> name="pk-tahun1">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 1</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(2 ,$dataHak['pk']['tahun'])?' checked ':''?> name="pk-tahun2">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 2</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(3 ,$dataHak['pk']['tahun'])?' checked ':''?> name="pk-tahun3">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 3</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(4 ,$dataHak['pk']['tahun'])?' checked ':''?> name="pk-tahun4">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 4</span> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-1">
                                                <input type="checkbox" <?=in_array(5 ,$dataHak['pk']['tahun'])?' checked ':''?> name="pk-tahun5">  
                                            </div>
                                            <div class="col-9">
                                                <span>Tahun 5</span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button type="submit" class="btn btn-primary" form="form-tahun">Ubah</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
