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
                                                        <label>Bulan</label>
                                                            <select class="form-control" name="bulan" required>
                                                                <option value="">-= Pilih Bulan =-</option>
                                                                <?php for($i =1; $i <=12; $i++){ ?>
                                                                <option value="<?=$i?>"><?=$i?></option>
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
