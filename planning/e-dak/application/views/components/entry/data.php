    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Entry Data
        <small>Memasukkan data keluarga</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?=base_url()?>entry">Enty</a></li>
        <li class="active">Keluarga</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Data Keluarga</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="row">
                  <div class="col-sm-12">
                  <label>Nomor Urut Kartu Keluarga</label>
                  <span id="pesan-no-kk" class="pesan danger"></span>
                  </div>
                  <div class="form-group col-sm-4"> 
                    <input name="no_kk" type="number" class="form-control" placeholder="Nomor KK" value="<?=@$_GET['no_kk']?>" required autofocus>
                  </div>
                  <div class="form-group col-sm-1">
                    <span class="btn btn-info" onclick="cariKK()">cari</span>
                  </div>
                  <div class="form-group col-sm-1">
                    <span class="btn btn-info" id="btn-tambah-kk" data-setFunction="tambahKK()" data-judul="Tambah Nomor Kartu Keluarga" data-isi="Apakah anda yakin menambah No Kartu Keluarga?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan">Tambah</span>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                  <label>Kepala Keluarga</label>
                  </div>
                  <div class="form-group col-sm-4"> 
                    <input type="text" id="nama-kepala-keluarga" class="form-control" disabled>
                  </div>
                </div>
                
                <div class="row" id="olah-keluarga">
                  <div class="col-sm-4">
                    <label>Daftar Anggota Keluarga</label>
                    <span id="pesan-keluarga-anggota" class="pesan danger"></span>
                  </div>
                  <div class="form-group col-sm-8">
                    <span class="btn btn-info" data-toggle="modal" data-target="#modal-keluarga" onclick="setCreate()">Tambah</span>
                  </div>
                  <div class="col-sm-1">
                    
                  </div>
                  
                  <div class="col-sm-10" id="daftar-keluarga">
                    
                  </div>
                </div>
                
              </form>
            </div>
            <!-- /.box-body -->
          </div>

          <!-- box indikator -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Indikator</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="<?=base_url()?>data/keluarga/indikator" id="form-indikator">
                <span id="pesan-indikator" class="pesan danger"></span>
                <div class="row">
                  <div class="form-group col-sm-4">
                    <label>Tahun</label>
                    <select name="tahun" class="form-control select2" required autofocus>
                      <option value="">Pilih Tahun</option>
                      <?php for($i = date("Y")-10; $i <= date("Y")+4; $i++){ ?>
                      <option <?=$i==date("Y")?'selected':''?> value="<?=$i?>" ><?=$i?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                  <label>Pendapatan Utama</label>
                  </div>
                  <div class="form-group col-sm-4"> 
                    <input name="pendapatan_utama" onblur="inputToRupiah(this)" type="text" class="form-control" required autofocus>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                  <label>Pendapatan Sampingan</label>
                  </div>
                  <div class="form-group col-sm-4"> 
                    <input name="pendapatan_sampingan" onblur="inputToRupiah(this)" type="text" class="form-control" required autofocus>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                  <label>Pengeluaran</label>
                  </div>
                  <div class="form-group col-sm-4"> 
                    <input name="pengeluaran_total" onblur="inputToRupiah(this)" type="text" class="form-control" required autofocus>
                  </div>
                </div>
                
                <div class="form-group">
                  <label>Jenis Aset</label>
                  <textarea name="jenis_aset" class="form-control" rows="3" placeholder="Masukkan Asset yang dimiliki" required autofocus></textarea>
                </div>

                <div class="row">
                  <div class="col-sm-12">
                  <label>Ukuran Rumah (m<sup>2</sup>)</label>
                  </div>
                  <div class="form-group col-sm-4"> 
                    <input name="rumah_ukuran" type="number" step class="form-control" required autofocus>
                  </div>
                </div>
                
                <div class="form-group">
                  <label>Kepemilikan Rumah</label>
                  <select name="id_rumah_kepemilikan" class="form-control select" required autofocus>
                    <option value="">Pilih Kepemilikan Rumah</option>
                    <?php foreach($dataRumahKepemilikan as $row){ ?>
                    <option value="<?=$row['id_rumah_kepemilikan']?>"><?=$row['rumah_kepemilikan_nama']?></option>
                    <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label>Dinding Terluas</label>
                  <select name="id_dinding" class="form-control select" required autofocus>
                    <option value="">Pilih Dinding Terluas</option>
                    <?php foreach($dataDinding as $row){ ?>
                    <option value="<?=$row['id_dinding']?>"><?=$row['dinding_nama']?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Atap Terluas</label>
                  <select name="id_atap" class="form-control select" required autofocus>
                    <option value="">Pilih Atap Terluas</option>
                    <?php foreach($dataAtap as $row){ ?>
                    <option value="<?=$row['id_atap']?>"><?=$row['atap_nama']?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Lantai Terluas</label>
                  <select name="id_lantai" class="form-control select" required autofocus>
                    <option value="">Pilih Lantai Terluas</option>
                    <?php foreach($dataLantai as $row){ ?>
                    <option value="<?=$row['id_lantai']?>"><?=$row['lantai_nama']?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Penerangan</label>
                  <select name="id_penerangan" class="form-control select" required autofocus>
                    <option value="">Pilih Penerangan</option>
                    <?php foreach($dataPenerangan as $row){ ?>
                    <option value="<?=$row['id_penerangan']?>"><?=$row['penerangan_nama']?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Jamban</label>
                  <select name="id_jamban" class="form-control select" required autofocus>
                    <option value="">Pilih Jamban</option>
                    <?php foreach($dataJamban as $row){ ?>
                    <option value="<?=$row['id_jamban']?>"><?=$row['jamban_nama']?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Sumber Air Minum</label>
                  <select name="id_sumber_air_minum" class="form-control select" required autofocus>
                    <option value="">Pilih Sumber Air Minum</option>
                    <?php foreach($dataSumberAirMinum as $row){ ?>
                    <option value="<?=$row['id_sumber_air_minum']?>"><?=$row['sumber_air_minum_nama']?></option>
                    <?php } ?>
                  </select>
                </div>
                
                <!-- <div class="form-group">
                  <label>Status Kesejahteraan</label>
                  <select name="id_kesejahteraan" class="form-control select" required autofocus>
                    <option value="">Pilih Status Kesejahteraan</option>
                    <?php foreach($dataKesejahteraan as $row){ ?>
                    <option value="<?=$row['id_kesejahteraan']?>"><?=$row['kesejahteraan_nama']?></option>
                    <?php } ?>
                  </select>
                </div> -->
                <button class="btn btn-primary">Save</button>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- . box indikator -->

          <!-- box program -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Program</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                
              <div class="row">
                  <div class="col-sm-4">
                    <label>Daftar Program yang Telah Diterima</label>
                    <span id="pesan-program-terima" class="pesan danger"></span>
                  </div>
                  <div class="form-group col-sm-8">
                    <span data-toggle="modal" data-target="#modal-program" onclick="setProgramCreate(1)" class="btn btn-info">Tambah</span>
                  </div>
                  <div class="col-sm-1">
                  </div>
                  <div class="col-sm-10">
                    <table id="table-program-terima" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Aksi</th>
                          <th>No</th>
                          <th>Tahun</th>
                          <th>Jenis Kegiatan</th>
                          <th>Sumber Data</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-4">
                    <label>Daftar Program yang Diharapkan</label>
                    <span id="pesan-program-harap" class="pesan danger"></span>
                  </div>
                  <div class="form-group col-sm-8">
                    <span data-toggle="modal" data-target="#modal-program" onclick="setProgramCreate(2)"  class="btn btn-info">Tambah</span>
                  </div>
                  <div class="col-sm-1">
                  </div>
                  <div class="col-sm-10">
                    <table id="table-program-harap" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Aksi</th>
                          <th>No</th>
                          <th>Tahun</th>
                          <th>Jenis Kegiatan</th>
                          <th>Sumber Data</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <label>Daftar Program yang Akan Diterima</label>
                    <span id="pesan-program-akan" class="pesan danger"></span>
                  </div>
                  <div class="form-group col-sm-8">
                    <span class="btn btn-info" disabled>Tambah</span>
                  </div>
                  <div class="col-sm-1">
                  </div>
                  <div class="col-sm-10">
                    <table id="table-program-akan" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tahun</th>
                          <th>Jenis Kegiatan</th>
                          <th>Sumber Data</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- . box program -->
        
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


    <div class="modal fade" id="modal-keluarga">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Keluarga</h4>
          </div>
          <form action="" id="form-penduduk">
          <div class="modal-body">
              <div class="form-group">
                <label>NIK</label>
                <input name="nik" type="text" class="form-control" required autofocus>
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input name="penduduk_nama" type="text" class="form-control" required autofocus>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="jabatan" class="form-control select" style="width:100%;" required autofocus>
                  <option value="">Pilih Status</option>
                  <option value="1">Ayah</option>
                  <option value="2">Ibu</option>
                  <option value="3">Anak Laki - Laki</option>
                  <option value="3">Anak Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control select" style="width:100%;" required autofocus>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="1">Laki - Laki</option>
                  <option value="2">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label>Tempat Lahir</label>
                <input name="tempat_lahir" type="text" class="form-control" required autofocus>
              </div>
              <div class="form-group">
                <label>Tanggal Lahir</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="tgl_lahir" type="text" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
              <!-- /.form group -->
              <div class="form-group">
                <label>Agama</label>
                <select name="id_agama" class="form-control select2" style="width:100%;" required autofocus>
                  <option value="">Pilih Agama</option>
                  <?php foreach($dataAgama as $row){ ?>
                  <option value="<?=$row['id_agama']?>"><?=$row['agama_nama']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3" required autofocus></textarea>
              </div>
              <div class="form-group">
                <label>Kondisi Fisik</label>
                <textarea name="kondisi_fisik" class="form-control" rows="3" required autofocus></textarea>
              </div>
              <div class="form-group">
                <label>Jenis Keterampilan</label>
                <textarea name="jenis_keterampilan" class="form-control" rows="3" required autofocus></textarea>
              </div>
              <div class="form-group">
                <label>Status Perkawinan</label>
                <select name="id_status_perkawinan" class="form-control select" style="width:100%;" required autofocus>
                  <option value="">Pilih Status Perkawinan</option>
                  <?php foreach($dataPerkawinan as $row){ ?>
                  <option value="<?=$row['id_status_perkawinan']?>"><?=$row['status_perkawinan_nama']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Status Pendidikan</label>
                <select name="id_status_pendidikan" class="form-control select" style="width:100%;" required autofocus>
                  <option value="">Pilih Status Pendidikan</option>
                  <?php foreach($dataPendidikan as $row){ ?>
                  <option value="<?=$row['id_status_pendidikan']?>"><?=$row['status_pendidikan_nama']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Pekerjaan Utama</label>
                <select name="id_pekerjaan" class="form-control select" style="width:100%;" required autofocus>
                  <option value="">Pilih Pekerjaan</option>
                  <?php foreach($dataPekerjaan as $row){ ?>
                  <option value="<?=$row['id_pekerjaan']?>"><?=$row['pekerjaan_nama']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Pekerjaan Sampingan</label>
                <select name="id_pekerjaan_sampingan" class="form-control select" style="width:100%;" required autofocus>
                  <option value="">Pilih Pekerjaan</option>
                  <?php foreach($dataPekerjaan as $row){ ?>
                  <option value="<?=$row['id_pekerjaan']?>"><?=$row['pekerjaan_nama']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Hidup</label>
                <select name="hidup" class="form-control select" style="width:100%;" required autofocus>
                  <option value="1">Ya</option>
                  <option value="0">Tidak</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" form="form-penduduk">Save changes</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal fade" id="modal-program">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Keluarga</h4>
          </div>
          <form action="" id="form-program">
          <div class="modal-body">
            <input type="hidden" name="program_jenis">
            <input type="hidden" name="id_keluarga_program">
              
              <div class="form-group">
                <label>Tahun</label>
                <select name="kegiatan_tahun" class="form-control select2" style="width: 100%" required autofocus>
                  <option value="">Pilih Tahun</option>
                  <?php for($i = date("Y")-10; $i <= date("Y")+4; $i++){ ?>
                  <option <?=$i==date("Y")?'selected':''?> value="<?=$i?>" ><?=$i?></option>
                  <?php } ?>
                </select>
              </div>

              <div class="form-group">
                <label>Jenis Kegiatan</label>
                <input name="kegiatan_nama" type="text" class="form-control" required autofocus>
              </div>
              <div class="form-group">
                <label>Sumber Dana</label>
                <select name="kegiatan_sumber_dana" class="form-control select2" style="width:100%;" required autofocus>
                  <option value="">Pilih Status</option>
                  <option value="1">APBDes</option>
                  <option value="2">APBD</option>
                  <option value="3">APBN</option>
                  <option value="4">Lainnya</option>
                </select>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" form="form-program">Save changes</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
