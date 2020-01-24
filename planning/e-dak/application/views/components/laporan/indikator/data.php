    
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
            <div class="box-body">
              <button class="btn btn-default" onclick="setHide('filter')">Filter</button>
              <button class="btn btn-default" onclick="doSave('pdf')">PDF</button>
              <button class="btn btn-default" onclick="doSave('print')">PRINT</button>
              <div id="filter" class="set-hide">
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
                    <div class="form-group">
                      <label>Jenis Kelamin</label>
                      <select name="jenis_kelamin" class="form-control select" required autofocus>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="1">Laki - Laki</option>
                        <option value="2">Perempuan</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <h4>INDIKATOR INFRA STRUKTUR</h4>
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
                  </div>
                  <div class="col-sm-3">
                    <h4>INDIKATOR BUDAYA</h4>
                    
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


