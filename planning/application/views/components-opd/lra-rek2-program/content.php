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
                                <!-- <div class="page-title-actions">
                                    <a href="<?=base_url()?>opd/penyusunan/lra/rek2/<?=@$kode?>" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
                                        <i class="fa fa-reply"></i>
                                    </a>
                                </div> -->
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
                                        <div class="app-page-title" style="padding:0px; margin: 0px">
                                            <div>
                                                <table>
                                                    <tr>
                                                        <td width="100">Rekening 1</td>
                                                        <td width="10">:</td>
                                                        <td><?="(".@$dataLra->tb_rekening1_kode.") ".@$dataLra->tb_rekening1_nama?></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="100">Rekening 2</td>
                                                        <td width="10">:</td>
                                                        <td><?="(".@$dataLra->tb_rekening2_kode.") ".@$dataLra->tb_rekening2_nama?></td>
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
                                                        <th width="20" class="align-middle">No</th>
                                                        <th width="20" class="align-middle">Kode</th>
                                                        <th class="align-middle">Nama</th>
                                                        <th class="align-middle">Fisik</th>
                                                        <th width="80" class="align-middle">Aksi</th>
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
