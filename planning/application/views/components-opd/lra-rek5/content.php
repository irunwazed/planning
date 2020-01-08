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
                                    <a href="<?=base_url()?>opd/penyusunan/lra/rek4/<?=@$kode?>" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
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
                                                        <td width="80">Rekening 1</td>
                                                        <td width="10">:</td>
                                                        <td><a href="<?=base_url()?>opd/penyusunan/lra/rek2/<?=@$kode?>"><?="(".@$dataLra->tb_rekening1_kode.") ".@$dataLra->tb_rekening1_nama?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Rekening 2</td>
                                                        <td width="10">:</td>
                                                        <td><a href="<?=base_url()?>opd/penyusunan/lra/rek2-program/<?=@$kode?>"><?="(".@$dataLra->tb_rekening2_kode.") ".@$dataLra->tb_rekening2_nama?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Program</td>
                                                        <td width="10">:</td>
                                                        <td><a href="<?=base_url()?>opd/penyusunan/lra/rek2-kegiatan/<?=@$kode?>"><?="(".@$dataLra->tb_program_kode.") ".@$dataLra->tb_program_nama?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Kegiatan</td>
                                                        <td width="10">:</td>
                                                        <td><a href="<?=base_url()?>opd/penyusunan/lra/rek3/<?=@$kode?>"><?="(".@$dataLra->tb_kegiatan_kode.") ".@$dataLra->tb_kegiatan_nama?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Rekening 3</td>
                                                        <td width="10">:</td>
                                                        <td><a href="<?=base_url()?>opd/penyusunan/lra/rek4/<?=@$kode?>"><?="(".@$dataLra->tb_rekening3_kode.") ".@$dataLra->tb_rekening3_nama?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Rekening 4</td>
                                                        <td width="10">:</td>
                                                        <td><?="(".@$dataLra->tb_rekening4_kode.") ".@$dataLra->tb_rekening4_nama?></td>
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
                                            <table class="mb-0 table table-bordered table-hover table-striped" id="table-data" style="width: 100%">
                                                <thead>
                                                    <tr class="mytable-head">
                                                        <th rowspan="2" width="20" class="align-middle">No</th>
                                                        <th rowspan="2" width="20" class="align-middle">Kode</th>
                                                        <th rowspan="2" class="align-middle">Nama</th>
                                                        <th colspan="2" class="align-middle">Capaian</th>
                                                        <th rowspan="2" class="align-middle">Fisik</th>
                                                        <th rowspan="2" class="align-middle">Pelaksana</th>
                                                        <th rowspan="2" width="80" class="align-middle">Aksi</th>
                                                    </tr>
                                                    <tr class="mytable-head">
                                                        <th class="align-middle">Anggaran</th>
                                                        <th class="align-middle">Realisasi</th>
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
