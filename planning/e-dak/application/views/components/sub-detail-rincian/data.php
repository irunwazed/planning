    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Laporan Detail
        <small>Mengolah data laporan detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Usulan</a></li>
        <li><a href="<?=base_url()."usulan/".@$tahun."/bidang"?>">Bidang</a></li>
        <li><a href="<?=base_url()."usulan/".@$tahun."/sub-bidang/".@$kode?>">Sub Bidang</a></li>
        <li><a href="<?=base_url()."usulan/".@$tahun."/kegiatan/".@$kode?>">Kegiatan</a></li>
        <li><a href="<?=base_url()."usulan/".@$tahun."/rincian/".@$kode?>">Rincian</a></li>
        <li><a href="<?=base_url()."usulan/".@$tahun."/detail-rincian/".@$kode?>">Detail Rincian</a></li>
        <li class="active">Laporan Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="margin: 15px;">
              <button data-toggle="modal" onclick="setCreate()" data-target="#modal-form" class="btn btn-primary" style="margin: 10px"><i class="fa fa-plus"></i> Tambah</button>
              <div class="table-responsive">
                <table id="table-user" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="3">No</th>
                      <th rowspan="3">KODE</th>
                      <th rowspan="3">JENIS KEGIATAN</th>
                      <th colspan="4">PERENCANAAN KEGIATAN</th>
                      <th colspan="3">MEKANISME PELAKSANAAN</th>
                      <th colspan="4">REALISASI (%)</th>
                      <th rowspan="3">Kodefikasi Masalah</th>
                      <th rowspan="3">Aksi</th>
                    </tr>
                    <tr>
                      <th rowspan="2">VOLUME</th>
                      <th rowspan="2">SATUAN</th>
                      <th rowspan="2">JUMLAH PENERIMA MANFAAT</th>
                      <th rowspan="2">PAGU DAK</th>
                      <th rowspan="2">SWAKELOLA (Rp)</th>
                      <th rowspan="2">KONTRAK (Rp)</th>
                      <th rowspan="2">METODE PEMBAYARAN</th>
                      <th colspan="2">KEUANGAN</th>
                      <th colspan="2">FISIK</th>
                    </tr>
                    <tr>
                      <th>(Rp)</th>
                      <th>%</th>
                      <th>Volume</th>
                      <th>%</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <div class="modal fade" id="modal-form">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Pengguna</h4>
          </div>
          <form action="" id="form-action">
          <div class="modal-body">
            <input type="hidden" name="kode" value="<?=@$tahun."-".@$kode?>">
            <input type="hidden" name="id_sub_detail_rincian">
            <div class="form-group">
              <label>Triwulan</label>
              <select name="sub_detail_rincian_triwulan" type="text" class="form-control" required autofocus>
                <option value="">-= Pilih Triwulan =-</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jenis Kegiatan</label>
              <input name="sub_detail_rincian_nama" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Volume</label>
              <input name="sub_detail_rincian_volume" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Satuan</label>
              <select name="id_satuan" type="text" class="form-control" required autofocus>
                <option value="">-= Pilih Satuan =-</option>
                <?php foreach($dataSatuan as $row){ ?>
                <option value="<?=$row['id_satuan']?>"><?=$row['satuan_nama']?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Penerima</label>
              <input name="sub_detail_rincian_penerima" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Pagu</label>
              <input name="sub_detail_rincian_pagu" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Swakelola</label>
              <input name="sub_detail_rincian_swakelola" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Kontrak</label>
              <input name="sub_detail_rincian_kontrak" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Pembayaran</label>
              <input name="sub_detail_rincian_pembayaran" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Keuangan</label>
              <input name="sub_detail_rincian_keuangan" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Fisik Volume</label>
              <input name="sub_detail_rincian_fisik_volume" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Masalah</label>
              <select name="id_masalah" type="text" class="form-control" required autofocus>
                <option value="">-= Pilih Masalah =-</option>
                <?php foreach($dataMasalah as $row){ ?>
                <option value="<?=$row['id_masalah']?>"><?=$row['masalah_nama']?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

