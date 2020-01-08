<?php
    $style = 'style="border: 1px solid #aaaaaa; padding: 10px;"';
    $styleLeft = 'style="border: 1px solid #aaaaaa; padding: 10px; text-align: left;"';
    $styleRight = 'style="border: 1px solid #aaaaaa; padding: 10px; text-align: right;"';
    $styleEdit = 'border: 1px solid #aaaaaa; padding: 10px; ';
    $name = "INDIKATOR CAPAIAN TAHUN ";
    // echo "<pre>";
    // print_r($data);
    // echo "</pre>";
    $tahun = @$dataRpjmd->tb_rpjmd_tahun+$tahunKe-1;
    $jenisArr = ['','Rancangan Awal', 'Penetapan', 'Perubahan'];
    $bulanArr = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
?>
<html>
    <head>
        <?php if(@$print){ ?>
        
        <title><?=$name?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,maximum-scale=1.0">
        <style type="text/css" media="screen"></style>
        <style type="text/css" media="print">
            @page {
                size: A4 landscape;
            }
            /* Size in mm */    
            @page {
                size: 100mm 200mm landscape;
            }
            /* Size in inches */    
            @page {
                size: 4in 6in landscape;
            }
        </style>
        <?php } ?>
    </head>

    <body onload="window.print()">
        <div style="width: 100%; text-align: center">
            <div style="width: 10%; text-align: left; float:left">
                <img src="<?=base_url()?>public/images/logo.png" style="height: 100px"/>
            </div>
            <div style="width: 90%; text-align: center; float:left; font-size: 20px">
                <span>Evaluasi Terhadap Hasil RKPD (<?=$jenisArr[$jenis]?>) </span><br>
                <span>KABUPATEN MOROWALI</span><br>
                <span>Tahun <?=$tahun?></span>
            </div>
        </div>
        <div>
        </div>
        <br>
        <div style="width: 100%;">
            <table style="border-collapse: collapse; width:100%;">
                <thead>
                    <tr style="background-color: #1DAE94; color: #FFFFFF;">
                        <th <?=$style?> rowspan="2">NO</th>
                        <th <?=$style?> rowspan="2">SASARAN</th>
                        <th <?=$style?> rowspan="2">KODE</th>
                        <th <?=$style?> rowspan="2">Urusan/Bidang Urusan Pemerintahan Daerah Dan Program/Kegiatan </th>
                        <th <?=$style?> rowspan="2">Indikator  Kinerja Program (Outcome)/ Kegiatan (output) </th>
                        <th <?=$style?> colspan="2">Target RPJMD Kabupaten/kota pada Tahun <?=$dataRpjmd->tb_rpjmd_tahun+4?> (Akhir Periode RPJMD) </th>
                        <th <?=$style?> colspan="2">Realisasi Capaian Kinerja RPJMD Kabupaten/kota sampai dengan RKPD Kabupaten/kota Tahun Lalu (<?=($tahun-1)?>) Target </th>
                        <th <?=$style?> colspan="2">Target Kinerja dan Anggaran RKPD Kabupaten/kota Tahun Berjalan (Tahun <?=($tahun)?>) yang Dievaluasi </th>
                        <th <?=$style?> colspan="3">Realisasi Kinerja Pada Bulan <?=$bulanArr[$bulanKe]?> </th>
                        <th <?=$style?> colspan="2">Realisasi Capaian Kinerja dan Anggaran RKPD Kabupaten/kota yang Dievaluasi </th>
                        <th <?=$style?> colspan="2">Realisasi Kinerja dan Anggaran RPJMD Kabupaten/kota s/d Tahun <?=($tahun)?> (Akhir Tahun Pelaksanaan RKPD tahun <?=@$dataRpjmd->tb_rpjmd_tahun+4?>) </th>
                        <th <?=$style?> colspan="2">Tingkat Capaian Kinerja dan Realisasi Anggaran RPJMD Kabupaten/kota  s/d Tahun <?=($tahun)?> (%) </th>
                        <th <?=$style?> rowspan="2">Perangkat Daerah  Penanggung Jawab </th>
                    </tr>
                    <tr style="background-color: #1DAE94; color: #FFFFFF;">
                        
                    <th <?=$style?>>Kinerja</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>Kinerja</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>Kinerja</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>Anggaran</th>
                        <th <?=$style?>>Kinerja</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>Kinerja</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>Kinerja</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>Kinerja</th>
                        <th <?=$style?>>Rp</th>
                    </tr>
                    <tr style="background-color: #1DAE94; color: #FFFFFF;">
                    <?php for($i = 1; $i <= 21; $i++){ ?>
                        <th <?=$style?>><?=$i?></th>
                    <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; for($i = 0; $i < count($data); $i++){ ?>
                        <?php if($data[$i]['level'] == 1){ ?>
                        <tr>
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_sasaran_nama']?></td>
                            <td <?=$style?>><?=$data[$i]['tb_urusan_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_urusan_nama']?></td>
                            <td <?=$style?> colspan="17"></td>
                        </tr>
                        <?php }else if($data[$i]['level'] == 2){ ?>
                        <tr>
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_sasaran_nama']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_urusan_kode'].".".$data[$i]['tb_bidang_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_bidang_nama']?></td>
                            <td <?=$style?> colspan="17"></td>
                        </tr>
                        <?php }else if($data[$i]['level'] == 3){ ?>
                        <tr>
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_sasaran_nama']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_urusan_kode'].".".$data[$i]['tb_bidang_kode'].".".$data[$i]['tb_program_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_program_nama']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_program_indikator']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_program_th5_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th5_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_program_th'.($tahunKe-1).'_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th'.($tahunKe-1).'_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_program_th'.($tahunKe).'_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th'.($tahunKe).'_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                        </tr>
                        <?php }else if($data[$i]['level'] == 4){ 
                            $realisasi_anggaran = @$data[$i]['tb_rpjmd_kegiatan_th'.($tahunKe).'_capaian_realisasi_anggaran'];

                            
                        ?>
                        <tr>
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_sasaran_nama']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_urusan_kode'].".".$data[$i]['tb_bidang_kode'].".".$data[$i]['tb_program_kode'].".".$data[$i]['tb_kegiatan_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_kegiatan_nama']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_kegiatan_indikator']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_kegiatan_th5_target_kinerja']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_kegiatan_th5_target_realisasi']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_kegiatan_th'.($tahunKe-1).'_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th'.($tahunKe-1).'_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_kegiatan_th'.($tahunKe).'_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th'.($tahunKe).'_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th'.($tahunKe).'_capaian_anggaran'],2,',','.')?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_kegiatan_th'.($tahunKe).'_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th'.($tahunKe).'_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>><?=$realisasi_anggaran<0?'('.ABS(number_format($realisasi_anggaran,2,',','.')).')':number_format($realisasi_anggaran,2,',','.')?></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th'.($tahunKe).'_capaian_realisasi_semua'],2,',','.')?></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th'.($tahunKe).'_capaian_realisasi_persen'],2,',','.')?>%</td>
                            <td <?=$style?>><?=@$data[$i]['tb_sub_unit_nama']?></td>
                        </tr>
                        <?php } ?>
                    <?php $no++; } ?>
                </tbody>

            </table>
        </div>
    </body>
</html>