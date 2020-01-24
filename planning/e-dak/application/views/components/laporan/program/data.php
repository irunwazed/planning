    
    <?php
    $name = "laporan Program";
    
    ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?=@$name?>
        <small>Mengolah <?=@$name?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active"><?=@$name?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title"><?=@$name?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <button class="btn btn-default" onclick="setHide('filter')">Filter</button>
              <button class="btn btn-default" onclick="doSave('pdf')">PDF</button>
              <button class="btn btn-default" onclick="doSave('print')">PRINT</button>
              <div id="filter" class="set-hide">
                <div class="row">
                  <div class="col-sm-3">
                    <h4>PROGRAM</h4>
                    <div class="form-group">
                      <label>Tahun</label>
                      <select name="kegiatan_tahun" class="form-control select" required autofocus>
                        <option value="">Pilih Tahun</option>
                        <?php for($i = date("Y")-10; $i <= date("Y")+4; $i++){ ?>
                        <option <?=$i==date("Y")?'selected':''?> value="<?=$i?>" ><?=$i?></option>
                        <?php } ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Program</label>
                      <select name="program_jenis" class="form-control select" required autofocus>
                        <option value="">Pilih Program</option>
                        <option value="1">Program yang telah di terima</option>
                        <option value="2">Program yang di harapkan</option>
                        <option value="3">Program yang akan di terima</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control select" required autofocus>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="1">Laki - Laki</option>
                        <option value="2">Perempuan</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label>Sumber Dana</label>
                      <select name="kegiatan_sumber_dana" class="form-control select" required autofocus>
                        <option value="">Pilih Sumber Dana</option>
                        <?php foreach($dataDana as $row){ ?>
                        <option value="<?=$row['id_sumber_dana']?>"><?=$row['sumber_dana_nama']?></option>
                        <?php } ?>
                      </select>
                    </div>

                  </div>
                  <div class="col-sm-3">

                    
                  </div>
                  <div class="col-sm-3">
                  </div>
                  
                </div>
              </div>
              <button class="btn btn-primary" onclick="doSearch()">Cari</button>
              <div id="laporan-table" class="table-responsive text-nowrap">

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


