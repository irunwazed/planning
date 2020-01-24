    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pegawai
        <small>Mengolah data pegawai</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
            <div class="box-body" style="margin: 15px">
              <a class="btn btn-primary" href="<?=base_url()?>entry">Tambah</a>
              <table id="table-user" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>NAMA</th>
                    <th>USERNAME</th>
                    <th>JENIS KELAMIN</th>
                    <th>JABATAN</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
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
            <div class="form-group">
              <label>Nomor Kartu Keluarga</label>
              <input name="no_kk" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>NIK</label>
              <select name="nik_kepala" class="form-control select" style="width: 100%" required autofocus>
                <option value="">Pilih NIK</option>
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

