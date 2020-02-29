    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Sub Bidang
        <small>Mengolah data sub bidang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Usulan</a></li>
        <li><a href="<?=base_url()."usulan/".@$tahun."/bidang"?>">Bidang</a></li>
        <li class="active">Sub Bidang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Sub Bidang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="margin: 15px;">
              <?php $level = array(1); if(in_array($_SESSION['level'], $level)){ ?>
              <button data-toggle="modal" onclick="setCreate()" data-target="#modal-form" class="btn btn-primary" style="margin: 10px"><i class="fa fa-plus"></i> Tambah</button>
              <?php } ?>
              <div class="table-responsive">
                <table id="table-user" class="table table-bordered table-striped">
                  <thead class="my-head">
                    <tr>
                      <th>No</th>
                      <th>KODE</th>
                      <th>NOMENKLATUR SUB BIDANG</th>
                      <th>JENIS</th>
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
            <input type="hidden" name="kode" value="<?=@$tahun."-".@$kode?>">
            <div class="form-group">
              <label>Kode</label>
              <input name="sub_bidang_kode" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Nomenklatur Sub Bidang</label>
              <input name="sub_bidang_nama" type="text" class="form-control" required autofocus>
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

