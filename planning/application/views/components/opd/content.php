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
                                    <a href="<?=base_url()?>rpjmd/penyusunan/sasaran/<?=$kode?>" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
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
                                                        <td width="80">Visi</td>
                                                        <td width="10">:</td>
                                                        <td><a href="<?=base_url()?>rpjmd/penyusunan/misi"><?=@$dataRpjmd->tb_rpjmd_visi?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Misi</td>
                                                        <td width="10">:</td>
                                                        <td><a href="<?=base_url()?>rpjmd/penyusunan/tujuan/<?=$kode?>"><?="(".@$dataRpjmd->tb_rpjmd_misi_kode.") ".@$dataRpjmd->tb_rpjmd_misi_nama?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Tujuan</td>
                                                        <td width="10">:</td>
                                                        <td><a href="<?=base_url()?>rpjmd/penyusunan/sasaran/<?=$kode?>"><?="(".@$dataRpjmd->tb_rpjmd_tujuan_kode.") ".@$dataRpjmd->tb_rpjmd_tujuan_nama?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Sasaran</td>
                                                        <td width="10">:</td>
                                                        <td><?="(".@$dataRpjmd->tb_rpjmd_sasaran_kode.") ".@$dataRpjmd->tb_rpjmd_sasaran_nama?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="page-title-wrapper">
                                                <div class="page-title-actions">
                                                    <button onclick="setCreate()" type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target="#modal-form">
                                                        <i class="fa fa-plus"> Tambah</i> 
                                                    </button>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="table-responsive">
                                            <table class="mb-0 table table-bordered table-hover table-striped" id="table-data">
                                                <thead>
                                                    <tr class="mytable-head">
                                                        <th width="20">No</th>
                                                        <th width="20">Kode</th>
                                                        <th>OPD</th>
                                                        <th width="80">Aksi</th>
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
