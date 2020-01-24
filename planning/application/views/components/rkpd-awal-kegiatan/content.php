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
                                <div class="page-title-actions">
                                    <a href="<?=base_url()?>opd/penyusunan/rkpd-awal" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
                                        <i class="fa fa-reply"></i>
                                    </a>
                                </div>
                            </div>
                        </div>          
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?=@$judul?></h5>
                                        <div class="app-page-title" style="padding:0px; margin: 0px">
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td width="80">Sasaran</td>
                                                        <td width="10">:</td>
                                                        <td><a href="<?=base_url()?>opd/penyusunan/rkpd-awal"><?="(".@$dataRpjmd->tb_rpjmd_misi_kode.".".@$dataRpjmd->tb_rpjmd_tujuan_kode.".".@$dataRpjmd->tb_rpjmd_sasaran_kode.") ".@$dataRpjmd->tb_rpjmd_sasaran_nama?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Urusan</td>
                                                        <td width="10">:</td>
                                                        <td><?="(".@$dataRpjmd->tb_urusan_kode.") ".@$dataRpjmd->tb_urusan_nama?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Bidang</td>
                                                        <td width="10">:</td>
                                                        <td><?="(".@$dataRpjmd->tb_urusan_kode.".".@$dataRpjmd->tb_bidang_kode.") ".@$dataRpjmd->tb_bidang_nama?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">OPD</td>
                                                        <td width="10">:</td>
                                                        <td><?="(".@$dataRpjmd->tb_urusan_kode.".".@$dataRpjmd->tb_bidang_kode.".".@$dataRpjmd->tb_unit_kode.".".@$dataRpjmd->tb_sub_unit_kode.") ".@$dataRpjmd->tb_sub_unit_nama?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Program</td>
                                                        <td width="10">:</td>
                                                        <td><?="(".@$dataRpjmd->tb_program_kode.") ".@$dataRpjmd->tb_program_nama?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- <div class="page-title-wrapper">
                                                <div class="page-title-actions">
                                                    <button onclick="setCreate()" type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target="#modal-form">
                                                        <i class="fa fa-plus"> Tambah</i> 
                                                    </button>
                                                </div>
                                            </div> -->
                                        </div>  
                                        <div class="table-responsive">
                                            <table class="mb-0 table table-bordered table-hover table-striped" id="table-data" style="width: 100%">
                                                <thead>
                                                    <tr class="mytable-head">
                                                        <th width="20" rowspan="3" class="align-middle">No</th>
                                                        <th width="20" rowspan="3" class="align-middle">Kode</th>
                                                        <th rowspan="3" class="align-middle">Kegiatan</th>
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
