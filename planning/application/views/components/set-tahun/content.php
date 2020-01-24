<?php
// $judul = "Data Kota";
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
                    <div class="card-header bg-primary">
                        <h5 class="card-title" style="color: #fff"><i class="pe-7s-ribbon"></i> <?=@$judul?></h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('') ?>pengaturan/data/tahun/set" method="POST" id="form-tahun">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pilih Tahun</label>
                                        <select name="tahun" class="form-control" required>
                                            <option value="">-- Pilih Tahun --</option>
                                            <?php for($i = 1; $i <= 5; $i++){ ?>
                                            <option <?=$dataRpjmd->tb_rpjmd_status_tahun==$i?'selected':''?> value="<?=$i?>"><?=($dataRpjmd->tb_rpjmd_tahun+$i-1)?></option>
                                            <?php } ?>
                                        </select>
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
