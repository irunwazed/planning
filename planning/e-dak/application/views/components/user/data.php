    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengguna
        <small>Mengolah data pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Pengaturan</a></li>
        <li class="active">Pengguna</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="margin: 15px;">
              <button data-toggle="modal" onclick="setCreate()" data-target="#modal-form" class="btn btn-primary" style="margin: 10px"><i class="fa fa-plus"></i> Tambah</button>
              <div class="table-responsive">
                <table id="table-user" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th>Level</th>
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
            <input type="hidden" name="id_users">
            <div class="form-group">
              <label>Nama</label>
              <input name="nama" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Username</label>
              <input name="username" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Password</label>
              <input name="password" type="password" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Level</label>
              <select name="level" class="form-control select" style="width: 100%" required autofocus>
                <option value="">Pilih Level</option>
                <option value="1">Super Admin</option>
                <option value="2">Admin</option>
                <option value="3">Verifikator</option>
              </select>
            </div>
            <div class="form-group" id="tahun">
              <label>Tahun</label>
              <select name="tahun" class="form-control select" style="width: 100%" required autofocus>
                <option value="">Pilih Tahun</option>
              </select>
            </div>
            <div class="form-group" id="indikator">
              <label>Indikator</label>
              <select name="indikator" class="form-control select" style="width: 100%" required autofocus>
                <option value="">Pilih Indikator</option>
                <option value="1">Sosial Budaya</option>
                <option value="2">Ekonomi</option>
                <option value="3">Infrastruktur</option>
              </select>
            </div>
            <div class="form-group" id="id_opd">
              <label>OPD</label>
              <select name="id_opd" class="form-control select" style="width: 100%" required autofocus>
                <option value="">Pilih OPD</option>
                <?php foreach($dataOpd as $row){ ?>
                <option value="<?=$row['id_opd']?>"><?=$row['opd_nama']?></option>
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

