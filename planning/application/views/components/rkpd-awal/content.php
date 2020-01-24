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
                        <?php if(in_array($this->session->level, array(1,2))){ ?>           
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
                                                            <select class="form-control select2" style="width: 100%;" name="opd" required>
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
                                        <div class="app-page-title" style="padding:0px; margin: 0px">
                                            <div class="row">
                                                <div class="position-relative form-group col-sm-5">
                                                    <!-- <label>Sasaran</label> -->
                                                    <select name="sasaran" class="form-control select2" required>
                                                        <option value="">-= Pilih Sasaran =-</option>
                                                        <?php foreach($dataSasaran as $row){ ?>
                                                            <option value="<?=@$row['tb_rpjmd_misi_kode']."-".@$row['tb_rpjmd_tujuan_kode']."-".@$row['tb_rpjmd_sasaran_kode']?>"><?=@$row['tb_rpjmd_misi_kode'].".".@$row['tb_rpjmd_tujuan_kode'].".".@$row['tb_rpjmd_sasaran_kode']." - ".$row['tb_rpjmd_sasaran_nama']?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group col-sm-1">
                                                    <button class="btn btn-primary" onclick="cariProgram()">Cari</button>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="table-responsive">
                                            <table class="mb-0 table table-bordered table-hover table-striped" id="table-data" style="width: 100%">
                                                <thead>
                                                    <tr class="mytable-head">
                                                        <th width="20" rowspan="3" class="align-middle">No</th>
                                                        <th width="20" rowspan="3" class="align-middle">Kode</th>
                                                        <th rowspan="3" class="align-middle">Program</th>
                                                        <th rowspan="3" class="align-middle">Indikator</th>
                                                        <th rowspan="3" class="align-middle">Satuan</th>
                                                        <th colspan="2" class="align-middle">Target (Tahun)</th>
                                                    </tr>
                                                    <tr class="mytable-head">
                                                        <th colspan="2"><?=@$dataRpjmd->tb_rpjmd_tahun+@$this->session->tahun-1?></th>
                                                    </tr>
                                                    <tr class="mytable-head">
                                                        <th>K</th>
                                                        <th>R</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
