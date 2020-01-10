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
                        <!-- <form action="<?= base_url('') ?>" method="POST"> -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pilih Tahun</label>
                                        <select name="thn" id="thn" class="form-control" required>
                                            <option value="">-- Pilih Tahun --</option>
                                            <option value="1">2019</option>
                                            <option value="2">2020</option>
                                            <option value="3">2021</option>
                                            <option value="4">2022</option>
                                            <option value="5">2023</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pilih Bulan</label>
                                        <select name="bln" id="bln" class="form-control" required>
                                            <option value="">-- Pilih Bulan --</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    
                                </div> -->
                            </div>
                        <!-- </form> -->
                    </div>
                </div>

                <div class="main-card mb-3 card" id="tampilkan" style="display: none">
                    <div class="card-header">
                        <h5 class="card-title" id="stat">Status Tahun 2020 Bulan Jan Adalah</h5>
                    </div>
                    <div class="card-body">
                        <form id="formKirim">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Status</label>
                                <select name="sts" id="sts" class="form-control" required>
                                    <option value="">-- Pilih Status --</option>
                                    <option value="1">Perancangan Awal</option>
                                    <option value="2">Penetapan</option>
                                    <option value="3">Perubahan</option>
                                </select>
                            </div>
                            <input type="hidden" name="thnPilih" id="thnPilih">
                            <input type="hidden" name="blnPilih" id="blnPilih">
                            <div class="col-md-6">
                                <label class="text-white">Simpan</label><br>
                                <button type="submit" class="btn btn-primary"><i class="pe-7s-diskette"></i> Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
