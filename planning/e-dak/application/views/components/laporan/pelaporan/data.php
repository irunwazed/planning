    
    <?php
    $name = "laporan Indikator";
    
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
            <form action="<?=base_url()?>usulan/laporan/save/pdf" id="laporan" method="POST">
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                    <label>Tahun</label>
                      <select name="tahun" class="form-control select" required autofocus>
                        <option value="">Pilih Tahun</option>
                        <?php for($i = date("Y")-10; $i <= date("Y")+4; $i++){ ?>
                        <option <?=$i==date("Y")?'selected':''?> value="<?=$i?>" ><?=$i?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Bidang</label>
                      <select name="bidang" class="form-control" required autofocus>
                        <option value="">-= Pilih Bidang =-</option>
                        <?php foreach($dataBidang as $row){ ?>
                        <option value="<?=$row['bidang_kode']?>"><?=$row['tahun']."-".$row['bidang_nama']?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Jenis</label>
                      <select name="id_jenis" class="form-control" required autofocus>
                        <option value="">-= Pilih Jenis =-</option>
                        <?php foreach($dataJenis as $row){ ?>
                        <option value="<?=$row['id_jenis']?>"><?=$row['jenis_nama']?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Triwulan</label>
                      <select name="triwulan" class="form-control" required autofocus>
                        <option value="">-= Pilih Triwulan =-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <br>
                      <input class="btn btn-default" type="submit" name="tombol" value="PDF" />
                      <span class="btn btn-default" onclick="doSave('print')">PRINT</span>
                    </div>
                  </div>
                </div>
                <!-- <button class="btn btn-primary" onclick="doSearch()">Cari</button> -->
                <div id="laporan-table" class="table-responsive text-nowrap">
                </div>
              </div>
              <!-- /.box-body -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


