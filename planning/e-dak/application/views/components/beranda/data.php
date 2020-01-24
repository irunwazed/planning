    <!-- Content Header (Page header) -->
    <section class="content-header">
    <?php if($_SESSION['level'] == 4){ ?>
      <h1>
      REKAPITULASI PERKEMBANGAN DANA ALOKASI KHUSUS (DAK) <?=$judul?>
      </h1>
    <?php }else{ ?>
      <h1>
        Beranda
      </h1>
      <?php } ?>
      <ol class="breadcrumb">
        <li><a href="<?=base_url()?>"><i class="fa fa-dashboard"></i> Beranda</a></li>
      </ol>
    </section>
    <?php if($_SESSION['level'] == 4){ ?>
    <section class="content-header" style="margin: 0px">
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o2">I</i></span>

            <div class="info-box-content">
              <span class="info-box-text">TRIWULAN I</span>
              <div class="progress">
                <div class="progress-bar" style="width: <?=number_format(@$dataTriwulan['totalKeuanganTw'][1],2,",","")?>%"></div>
              </div>
              <span class="progress-description">
                Progres Keuangan <?=number_format(@$dataTriwulan['totalKeuanganTw'][1],2,",","")?>%
              </span>
              
              <div class="progress">
                <div class="progress-bar" style="width: <?=number_format(@$dataTriwulan['totalFisikTw'][1],2,",","")?>%"></div>
              </div>
              <span class="progress-description">
                Progres Fisik <?=number_format(@$dataTriwulan['totalFisikTw'][1],2,",","")?>%
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up2">II</i></span>

            <div class="info-box-content">
              <span class="info-box-text">TRIWULAN II</span>

              <div class="progress">
                <div class="progress-bar" style="width: <?=number_format(@$dataTriwulan['totalKeuanganTw'][2],2,",","")?>%"></div>
              </div>
              <span class="progress-description">
                Progres Keuangan <?=number_format(@$dataTriwulan['totalKeuanganTw'][2],2,",","")?>%
              </span>
              
              <div class="progress">
                <div class="progress-bar" style="width: <?=number_format(@$dataTriwulan['totalFisikTw'][2],2,",","")?>%"></div>
              </div>
              <span class="progress-description">
                Progres Fisik <?=number_format(@$dataTriwulan['totalFisikTw'][2],2,",","")?>%
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon" type="I"><i class="fa fa-calendar2">III</i></span>
            <div class="info-box-content">
              <span class="info-box-text">TRIWULAN III</span>
              <div class="progress">
                <div class="progress-bar" style="width: <?=number_format(@$dataTriwulan['totalKeuanganTw'][3],2,",","")?>%"></div>
              </div>
              <span class="progress-description">
                Progres Keuangan <?=number_format(@$dataTriwulan['totalKeuanganTw'][3],2,",","")?>%
              </span>
              <div class="progress">
                <div class="progress-bar" style="width: <?=number_format(@$dataTriwulan['totalFisikTw'][3],2,",","")?>%"></div>
              </div>
              <span class="progress-description">
                Progres Fisik <?=number_format(@$dataTriwulan['totalFisikTw'][3],2,",","")?>%
              </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-comments-o2">IV</i></span>
            <div class="info-box-content">
              <span class="info-box-text">TRIWULAN IV</span>
              <div class="progress">
                <div class="progress-bar" style="width: <?=number_format(@$dataTriwulan['totalKeuanganTw'][4],2,",","")?>%"></div>
              </div>
              <span class="progress-description">
                Progres Keuangan <?=number_format(@$dataTriwulan['totalKeuanganTw'][4],2,",","")?>%
              </span>
              
              <div class="progress">
                <div class="progress-bar" style="width: <?=number_format(@$dataTriwulan['totalFisikTw'][4],2,",","")?>%"></div>
              </div>
              <span class="progress-description">
                Progres Fisik <?=number_format(@$dataTriwulan['totalFisikTw'][4],2,",","")?>%
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php }else{ ?>
    <!-- . header -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border" style="text-align: center;">
            <h3 class="box-title"><b>REKAPITULASI PERKEMBANGAN DANA ALOKASI KHUSUS (DAK)</b></h3><br>
            <h3 class="box-title"><b><?=$judul?></b></h3><br>
            <h3 class="box-title"><b>TAHUN <?=date('Y')?></b></h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="table-user" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2" style="text-align: center;">No</th>
                      <th rowspan="2" style="text-align: center;">BIDANG DAK</th>
                      <th colspan="2" class="bg-aqua" style="text-align: center;">TRIWULAN 1</th>
                      <th></th>
                      <th colspan="2" class="bg-green" style="text-align: center;">TRIWULAN 2</th>
                      <th></th>
                      <th colspan="2" class="bg-yellow" style="text-align: center;">TRIWULAN 3</th>
                      <th></th>
                      <th colspan="2" class="bg-red" style="text-align: center;">TRIWULAN 4</th>
                    </tr>
                    <tr>
                      <th class="bg-aqua" style="text-align: center;">KEUANGAN (%)</th>
                      <th class="bg-aqua" style="text-align: center;">FISIK (%)</th>
                      <th></th>
                      <th class="bg-green" style="text-align: center;">KEUANGAN (%)</th>
                      <th class="bg-green" style="text-align: center;">FISIK (%)</th>
                      <th></th>
                      <th class="bg-yellow" style="text-align: center;">KEUANGAN (%)</th>
                      <th class="bg-yellow" style="text-align: center;">FISIK (%)</th>
                      <th></th>
                      <th class="bg-red" style="text-align: center;">KEUANGAN (%)</th>
                      <th class="bg-red" style="text-align: center;">FISIK (%)</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; foreach($dataTriwulan['dataHitung'] as $row){ ?>
                    <tr>
                      <td style="text-align: center;"><?=$no?></td>
                      <td><?=$row['bidang_nama']?></td>
                      <td class="bg-aqua" style="text-align: right;"><?=number_format($row['totalKeuanganTw'][1],2,",","")?></td>
                      <td class="bg-aqua" style="text-align: right;"><?=number_format($row['totalFisikTw'][1],2,",","")?></td>
                      <th></th>
                      <td class="bg-green" style="text-align: right;"><?=number_format($row['totalKeuanganTw'][2],2,",","")?></td>
                      <td class="bg-green" style="text-align: right;"><?=number_format($row['totalFisikTw'][2],2,",","")?></td>
                      <th></th>
                      <td class="bg-yellow" style="text-align: right;"><?=number_format($row['totalKeuanganTw'][3],2,",","")?></td>
                      <td class="bg-yellow" style="text-align: right;"><?=number_format($row['totalFisikTw'][3],2,",","")?></td>
                      <th></th>
                      <td class="bg-red" style="text-align: right;"><?=number_format($row['totalKeuanganTw'][4],2,",","")?></td>
                      <td class="bg-red" style="text-align: right;"><?=number_format($row['totalFisikTw'][4],2,",","")?></td>
                    </tr>
                  <?php $no++;  } ?>
                  <?php if(count($dataTriwulan['dataHitung']) > 1){ ?>
                    <tr>
                      <th colspan="2" style="text-align: center;">RATA - RATA</th>
                      <td class="bg-aqua" style="text-align: right;"><?=number_format($dataTriwulan['totalKeuanganTw'][1],2,",","")?></td>
                      <td class="bg-aqua" style="text-align: right;"><?=number_format($dataTriwulan['totalFisikTw'][1],2,",","")?></td>
                      <th></th>
                      <td class="bg-green" style="text-align: right;"><?=number_format($dataTriwulan['totalKeuanganTw'][2],2,",","")?></td>
                      <td class="bg-green"><?=number_format($dataTriwulan['totalFisikTw'][2],2,",","")?></td>
                      <th></th>
                      <td class="bg-yellow" style="text-align: right;"><?=number_format($dataTriwulan['totalKeuanganTw'][3],2,",","")?></td>
                      <td class="bg-yellow" style="text-align: right;"><?=number_format($dataTriwulan['totalFisikTw'][3],2,",","")?></td>
                      <th></th>
                      <td class="bg-red" style="text-align: right;"><?=number_format($dataTriwulan['totalKeuanganTw'][4],2,",","")?></td>
                      <td class="bg-red" style="text-align: right;"><?=number_format($dataTriwulan['totalFisikTw'][4],2,",","")?></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php }?>