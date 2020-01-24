<?php
$des = "";
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
                        <?php if(in_array($this->session->level, array(1))){ ?>           
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Pengaturan OPD</h5>
                                        <div>
                                            <form action="<?=base_url()?>pengaturan/set-opd" method="POST" id="form-cetak">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                        <!-- <label>OPD</label> -->
                                                            <select class="form-control select2" name="opd" required>
                                                                <option value="">-= Pilih OPD =-</option>
                                                                <?php foreach($dataOpd as $row){ ?>
                                                                <option <?=$this->session->kodeOpd==$row['tb_urusan_kode']."-".$row['tb_bidang_kode']."-".$row['tb_unit_kode']."-".$row['tb_sub_unit_kode']?'selected':''?> value="<?=$row['tb_urusan_kode']."-".$row['tb_bidang_kode']."-".$row['tb_unit_kode']."-".$row['tb_sub_unit_kode']?>"><?=@$row['tb_sub_unit_nama']?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-primary mr-2">Gunakan</button>
                                                    
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="col-3">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <?php } ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=@$judul?></h5>
                                        <div>
                                            <form action="<?=base_url()?>laporan/rkpd/save/pdf" method="POST" id="form-cetak">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                        <label>Tahun</label>
                                                            <select class="form-control" name="tahun" required>
                                                                <option value="">-= Pilih Tahun =-</option>
                                                                <?php for($i =1; $i <=5; $i++){ ?>
                                                                <option value="<?=$i?>"><?=@$dataRpjmd->tb_rpjmd_tahun+$i-1?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div class="form-group">
                                                        <label>Jenis</label>
                                                            <select class="form-control" name="jenis" required>
                                                                <option value="">-= Pilih Jenis =-</option>
                                                                <option value="1">Rancangan Awal</option>
                                                                <option value="2">Penetapan</option>
                                                                <option value="3">Perubahan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="col-3">
                                                    <button type="submit" class="btn btn-primary mr-2">PDF</button>
                                                    <span onclick="doSave('print')" class="btn btn-info">Print</span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
