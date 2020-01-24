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
                                <div class="page-title-actions">
                                    <a href="<?=base_url()?>pengaturan/data/sotk/bidang/<?=@$kode?>" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
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
                                                        <td width="80">Urusan</td>
                                                        <td width="10">:</td>
                                                        <td><a href="<?=base_url()?>pengaturan/data/sotk/bidang/<?=@$kode?>">(<?=@$dataSotk->tb_urusan_kode?>) <?=@$dataSotk->tb_urusan_nama?></a></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="80">Bidang</td>
                                                        <td width="10">:</td>
                                                        <td>(<?=@$dataSotk->tb_bidang_kode?>) <?=@$dataSotk->tb_bidang_nama?></td>
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
                                                    <tr class="mytable-head" >
                                                        <th width="20">No</th>
                                                        <th width="20">Kode</th>
                                                        <th>Unit</th>
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
