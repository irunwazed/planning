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
                                                        <th colspan="14" class="align-middle">Target (Tahun)</th>
                                                    </tr>
                                                    <tr class="mytable-head">
                                                        <th colspan="2">Awal</th>
                                                        <th colspan="2"><?=@$dataRpjmd->tb_rpjmd_tahun?></th>
                                                        <th colspan="2"><?=@$dataRpjmd->tb_rpjmd_tahun+1?></th>
                                                        <th colspan="2"><?=@$dataRpjmd->tb_rpjmd_tahun+2?></th>
                                                        <th colspan="2"><?=@$dataRpjmd->tb_rpjmd_tahun+3?></th>
                                                        <th colspan="2"><?=@$dataRpjmd->tb_rpjmd_tahun+4?></th>
                                                        <th colspan="2">Akhir</th>
                                                    </tr>
                                                    <tr class="mytable-head">
                                                        <th>K</th>
                                                        <th>R</th>
                                                        <th>K</th>
                                                        <th>R</th>
                                                        <th>K</th>
                                                        <th>R</th>
                                                        <th>K</th>
                                                        <th>R</th>
                                                        <th>K</th>
                                                        <th>R</th>
                                                        <th>K</th>
                                                        <th>R</th>
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
