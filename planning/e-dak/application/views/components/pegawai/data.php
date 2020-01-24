    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pegawai
        <small>Mengolah data pegawai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Data</a></li>
        <li class="active">Pegawai</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pegawai</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="margin: 15px;">
              <button data-toggle="modal" onclick="setCreate()" data-target="#modal-form" class="btn btn-primary" style="margin: 10px"><i class="fa fa-plus"></i> Tambah</button>
              <div class="table-responsive">
                <table id="table-user" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>No Hp</th>
                      <th>Aksi</th>
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
            <input type="hidden" name="id_pegawai">
            <div class="form-group">
              <label>NIP</label>
              <input name="pegawai_nip" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Nama</label>
              <input name="pegawai_nama" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input name="pegawai_username" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Email</label>
              <input name="pegawai_email" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>No Hp</label>
              <input name="pegawai_no_hp" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input name="pegawai_password" type="password" class="form-control" required autofocus>
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

    <div class="modal fade" id="modal-ppk">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Form Pengguna</h4>
          </div>
          <form action="" id="form-ppk">
          <div class="modal-body">
            <div style="margin: 15px;">
              <div class="table-responsive">
                <table id="table-ppk" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tahun</th>
                      <th>Bidang</th>
                      <th>Sub Bidang</th>
                      <th>Jenis</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  </tbody>
                </table>
              </div>
            </div>
            <input type="hidden" name="ppk_id_pegawai">
            <div class="form-group">
              <label>Tahun</label>
              <select name="tahun" class="form-control" required autofocus>
                <option value="">Pilih Tahun</option>
                <?php for($x = 2010; $x <= date("Y")+2; $x++){ ?>
                  <option value="<?=$x?>"><?=$x?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label>Bidang</label>
              <select name="bidang" class="form-control" required autofocus>
                <option value="">Pilih Bidang</option>
              </select>
            </div>
            <div class="form-group">
              <label>Sub Bidang</label>
              <select name="sub_bidang" class="form-control" required autofocus>
                <option value="">Pilih Sub Bidang</option>
              </select>
            </div>
            <div class="form-group">
              <label>Jenis</label>
              <select name="id_jenis" type="text" class="form-control" required autofocus>
                <option value="">-= Pilih Jenis =-</option>
                <?php foreach($dataJenis as $row){ ?>
                <option value="<?=$row['id_jenis']?>"><?=$row['jenis_nama']?></option>
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

