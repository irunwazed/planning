<?php
$des = "";
// echo "<pre>";
// print_r($dataPk);
// echo "</pre>";
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
                                    <div class="card-header">
                                        <h5 class="card-title"><?=@$judul?></h5>
                                    </div>
                                    <div class="card-body">
                                        <form id="form-pk" action="<?= base_url('') ?>opd/penyusunan/pk-sasaran/set" method="POST">
                                            <div class="row">
                                                <div class="col-md-6" id="jenis">
                                                    <div class="form-group">
                                                        <label>Pilih Jenis Kinerja</label>
                                                        <select name="jenis" class="form-control select2" style="width:100%" required>
                                                            <option value="">-- Pilih Jenis Kinerja --</option>
                                                            <option value="1">Sasaran</option>
                                                            <option value="2">Program</option>
                                                            <option value="3">Kegiatan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="tb_rpjmd_sasaran_kode">
                                                    <div class="form-group">
                                                        <label>Pilih Sasaran</label>
                                                        <select name="tb_rpjmd_sasaran_kode" class="form-control select2" style="width:100%" required>
                                                            <option value="">-- Pilih Sasaran --</option>
                                                            <?php foreach(@$dataPkOpd as $row){ ?>
                                                            <option value="<?=$row['tb_rpjmd_misi_kode']."-".$row['tb_rpjmd_tujuan_kode']."-".$row['tb_rpjmd_sasaran_kode']?>"><?="(".$row['tb_rpjmd_sasaran_kode'].") ".$row['tb_rpjmd_sasaran_nama']?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="tb_program_kode">
                                                    <div class="form-group">
                                                        <label>Pilih Program</label>
                                                        <select name="tb_program_kode" class="form-control select2" style="width:100%" required>
                                                            <option value="">-- Pilih Program --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="tb_kegiatan_kode">
                                                    <div class="form-group">
                                                        <label>Pilih Kegiatan</label>
                                                        <select name="tb_kegiatan_kode" class="form-control select2" style="width:100%"  >
                                                            <option value="">-- Pilih Kegiatan --</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6" id="kinerja">
                                                    <div class="form-group">
                                                        <label>Kinerja Tahun <?=@$dataRpjmd->tb_rpjmd_tahun+$this->session->tahun-1?></label>
                                                        <input type="text" class="form-control" name="kinerja" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary" value="Simpan" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="main-card mb-3 card">
                                    <div class="card-header">
                                        <h5 class="card-title"><?=@$judul?></h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="mb-0 table table-bordered table-hover table-striped" id="table-data" style="width: 100%">
                                                <thead>
                                                    <tr class="mytable-head">
                                                        <th width="20" class="align-middle">No</th>
                                                        <th width="20" class="align-middle">Kode</th>
                                                        <th class="align-middle">Sasaran / Program / Kegiatan</th>
                                                        <th class="align-middle">Kinerja Tahun <?=@$dataRpjmd->tb_rpjmd_tahun+$this->session->tahun-1?></th>
                                                        <!-- <th width="30" class="align-middle">Aksi</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php for($i = 0; $i < count($dataPk); $i++){ ?>
                                                        <?php if($dataPk[$i]['level'] == 1){ ?>
                                                    <tr>
                                                        <td><?=($i+1)?></td>
                                                        <td><?=$dataPk[$i]['tb_rpjmd_misi_kode'].".".$dataPk[$i]['tb_rpjmd_tujuan_kode'].".".$dataPk[$i]['tb_rpjmd_sasaran_kode']?></td>
                                                        <td><?=$dataPk[$i]['tb_rpjmd_sasaran_nama']?></td>
                                                        <td><?=$dataPk[$i]['tb_rpjmd_opd_th'.$this->session->tahun.'_capaian_kinerja']?></td>
                                                        <!-- <td>
                                                            <a class="btn btn-info"  href="#" onclick="setUpdate('kodeOneData')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>
                                                        </td> -->
                                                    </tr>
                                                        <?php }else if($dataPk[$i]['level'] == 2){ ?>
                                                    <tr>
                                                        <td><?=($i+1)?></td>
                                                        <td><?=@$dataPk[$i]['tb_rpjmd_misi_kode'].".".$dataPk[$i]['tb_rpjmd_tujuan_kode'].".".$dataPk[$i]['tb_rpjmd_sasaran_kode'].".".$dataPk[$i]['tb_program_kode']?></td>
                                                        <td><?=@$dataPk[$i]['tb_program_nama']?></td>
                                                        <td><?=@$dataPk[$i]['tb_rpjmd_program_th'.$this->session->tahun.'_capaian_kinerja']?></td>
                                                        <!-- <td>
                                                            <a class="btn btn-info"  href="#" onclick="setUpdate('kodeOneData')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>
                                                        </td> -->
                                                    </tr>
                                                        <?php }else if($dataPk[$i]['level'] == 3){ ?>
                                                    <tr>
                                                        <td><?=($i+1)?></td>
                                                        <td><?=@$dataPk[$i]['tb_rpjmd_misi_kode'].".".$dataPk[$i]['tb_rpjmd_tujuan_kode'].".".$dataPk[$i]['tb_rpjmd_sasaran_kode'].".".$dataPk[$i]['tb_program_kode'].".".$dataPk[$i]['tb_kegiatan_kode']?></td>
                                                        <td><?=@$dataPk[$i]['tb_kegiatan_nama']?></td>
                                                        <td><?=@$dataPk[$i]['tb_rpjmd_kegiatan_th'.$this->session->tahun.'_capaian_kinerja']?></td>
                                                        <!-- <td>
                                                            <a class="btn btn-info"  href="#" onclick="setUpdate('kodeOneData')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>
                                                        </td> -->
                                                    </tr>
                                                        <?php }
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
