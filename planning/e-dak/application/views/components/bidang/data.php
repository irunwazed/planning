    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bidang
        <small>Mengolah data bidang</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Usulan</a></li>
        <li class="active">Bidang</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bidang</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="margin: 15px;">
              <?php $level = array(1); if(in_array($_SESSION['level'], $level)){ ?>
              <button data-toggle="modal" onclick="setCreate()" data-target="#modal-form" class="btn btn-primary" style="margin: 10px"><i class="fa fa-plus"></i> Tambah</button>
              <?php }
              if($_SESSION['level'] == 1 && $_SESSION['id'] == 17){ ?>
              <div style="float: right;">
              <select name="triwulan">
                <option value="1">Pilih Triwulan</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
              <button  onclick="tandaTangan()"  class="btn btn-primary" style="margin: 10px"><i class="fa fa-check-circle-o"></i> TANDA TANGAN</button>
              
              </div>
              <?php  } ?>
              <div class="table-responsive">
                <table id="table-user" class="table table-bordered table-striped">
                  <thead class="my-head">
                    <tr>
                      <th>No</th>
                      <th>KODE</th>
                      <th>NOMENKLATUR BIDANG</th>
                      <?php if($_SESSION['level'] == 3 || $_SESSION['level'] == 2){ ?>
                        <th>JENIS</th>
                      <?php }else if($_SESSION['level'] == 1 && $_SESSION['id'] == 17){?>
                        <th>JENIS</th>
                      <?php }else{ ?>
                        <th>JENIS</th>
                      <?php } ?>
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

    <section class="content" id="verifikator-bappeda" style="display: none;">
      <div class="row">
        <div class="col-md-12">
          <div>
            <div class="box-body">
            <button class="btn btn-success col-sm-12" style="height: 50px" onclick="setVeriBappeda()">TERIMA</button>
            </div>
          </div>
        </div>
      </div>
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
            <input type="hidden" name="kode">
            <input type="hidden" name="tahun" value="<?=@$tahun?>">
            <div class="form-group">
              <label>Kode</label>
              <input name="bidang_kode" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Nomenklatur Bidang</label>
              <input name="bidang_nama" type="text" class="form-control" required autofocus>
            </div>
            <div class="form-group">
              <label>Indikator</label>
              <select name="id_indikator" class="form-control" required autofocus>
                <option value="">Pilih Indikator</option>
                <option value="1">Sosial Budaya</option>
                <option value="2">Ekonomi</option>
                <option value="3">Infrastruktur</option>
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

