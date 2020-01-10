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
                        <th <?=$style?> rowspan="3">NO</th>
                        <th <?=$style?> rowspan="3">Kode</th>
                        <th <?=$style?> rowspan="3">Sasaran / Program / Kegiatan</th>
                        <th <?=$style?> rowspan="3">Indikator  Kinerja </th>
                        <th <?=$style?> rowspan="2" colspan="2">Data Capaian Pada Awal Tahun Perencanaan</th>
                        <th <?=$style?> rowspan="2" colspan="2">Target Pada Akhir Tahun Perencanaan</th>
                        <th <?=$style?> colspan="10">Target RPJMD Kabupaten / Kota Pada RKPD Kabupaten / Kota Tahun ke-</th>
                        <th <?=$style?> colspan="10">Capaian Target Kabupaten / Kota Melalui Pelaksanaan RKPD Tahun ke-</th>
                        <th <?=$style?> colspan="10">Tingkat Capaian RPJMD Kabupaten / Kota Hasil Pelaksanaan RKPD Kabupaten / Kota Tahun Ke-</th>
                        <th <?=$style?> rowspan="2" colspan="2">Capaian Pada Akhir Tahun Perencanaan</th>
                        <th <?=$style?> rowspan="2" colspan="2">Rasio Capaian Akhir (%)</th>
                        <th <?=$style?> rowspan="3">Perangkat Daerah  Penanggung Jawab </th>
                    </tr>
                    <tr style="background-color: #1DAE94; color: #FFFFFF;">
                        <th <?=$style?> colspan="2"><?=$tahun?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+1?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+2?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+3?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+4?></th>
                        <th <?=$style?> colspan="2"><?=$tahun?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+1?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+2?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+3?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+4?></th>
                        <th <?=$style?> colspan="2"><?=$tahun?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+1?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+2?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+3?></th>
                        <th <?=$style?> colspan="2"><?=$tahun+4?></th>
                    </tr>
                    <tr style="background-color: #1DAE94; color: #FFFFFF;">
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>K</th>
                        <th <?=$style?>>Rp</th>
                    </tr>
                    <tr style="background-color: #1DAE94; color: #FFFFFF;">
                    <?php for($i = 1; $i <= 43; $i++){ ?>
                        <th <?=$style?>><?=$i?></th>
                    <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; for($i = 0; $i < count($data); $i++){ ?>
                        <?php if($data[$i]['level'] == 1){ ?>
                        <tr>
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_sasaran_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_sasaran_nama']?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_sasaran_indikator']?></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_sasaran_th1_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_sasaran_th1_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_sasaran_th2_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_sasaran_th2_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_sasaran_th3_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_sasaran_th3_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_sasaran_th4_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_sasaran_th4_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_sasaran_th5_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_sasaran_th5_target_realisasi'],2,',','.')?></td>
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
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                        </tr>
                        <?php }else if($data[$i]['level'] == 2){ ?>
                        <tr>
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_sasaran_kode'].".".@$data[$i]['tb_program_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_program_nama']?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_indikator']?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th1_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th1_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th_akhir_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th_akhir2_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th1_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th1_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th2_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th2_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th3_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th3_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th4_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th4_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th5_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th5_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th1_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th1_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th2_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th2_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th3_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th3_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th4_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th4_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th5_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th5_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th1_tingkat_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th1_tingkat_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th2_tingkat_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th2_tingkat_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th3_tingkat_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th3_tingkat_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th4_tingkat_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th4_tingkat_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th5_tingkat_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th5_tingkat_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th_akhir_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th_akhir_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_program_th_akhir_rasio_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_program_th_akhir_rasio_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_sub_unit_nama']?></td>
                        </tr>
                        <?php }else if($data[$i]['level'] == 3){ ?>
                        <tr>
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_rpjmd_sasaran_kode'].".".@$data[$i]['tb_program_kode'].".".@$data[$i]['tb_kegiatan_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_kegiatan_nama']?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_indikator']?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th1_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th1_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th_akhir_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th_akhir2_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th1_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th1_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th2_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th2_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th3_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th3_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th4_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th4_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th5_target_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th5_target_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th1_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th1_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th2_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th2_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th3_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th3_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th4_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th4_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th5_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th5_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th1_tingkat_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th1_tingkat_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th2_tingkat_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th2_tingkat_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th3_tingkat_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th3_tingkat_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th4_tingkat_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th4_tingkat_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th5_tingkat_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th5_tingkat_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th_akhir_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th_akhir_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_rpjmd_kegiatan_th_akhir_rasio_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['tb_rpjmd_kegiatan_th_akhir_rasio_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>><?=$data[$i]['tb_sub_unit_nama']?></td>
                        </tr>
                        <?php } ?>
                    <?php $no++; } ?>
                </tbody>

            </table>
        </div>
    </body>
</html>