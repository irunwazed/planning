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

    $warnaArr = ["#FFFFFF", "#D4EFDF", "#EBDEF0", "#FCF3CF", "#F6DDCC", "#D0ECE7", "#A569BD", "#D98880"];
   
    function setRkpdColor($kode){
        $warnaArr = ["#FFFFFF", "#D4EFDF", "#EBDEF0", "#FCF3CF", "#F6DDCC", "#D0ECE7", "#A569BD", "#D98880"];
   
        $warna = "#FFFFFF";
        if($kode[0] == 1){
            if($kode[1] == 1){
                if($kode[2] == 1){
                    $warna = $warnaArr[0]; // 1-1-1
                }else{                    
                    $warna = $warnaArr[1]; // 1-1-0
                }
            }else{
                if($kode[2] == 1){
                    $warna = $warnaArr[2]; // 1-0-1
                }else{                    
                    $warna = $warnaArr[3]; // 1-0-0
                }
            }
        }else{
            if($kode[1] == 1){
                if($kode[2] == 1){
                    $warna = $warnaArr[4]; // 0-1-1
                }else{                    
                    $warna = $warnaArr[5]; // 0-1-0
                }
            }else{
                if($kode[2] == 1){
                    $warna = $warnaArr[6]; // 0-0-1
                }else{                    
                    $warna = $warnaArr[7]; // 0-0-0
                }
            }

        }
        return $warna;
    }
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
                <span>Evaluasi Terhadap Hasil Laporan Realisasi Anggaran </span><br>
                <span>Kabupaten Morowali</span><br>
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
                        <th <?=$style?> rowspan="2">KODE</th>
                        <th <?=$style?> rowspan="2">URAIAN</th>
                        <th <?=$style?> colspan="3">JUMLAH</th>
                        <th <?=$style?> colspan="2">BERTAMBAH / BERKURANG</th>
                        <th <?=$style?> rowspan="2">FISIK</th>
                        <th <?=$style?> rowspan="2">PELAKSANA</th>
                        <th <?=$style?> rowspan="2">SUMBER DANA</th>
                        <th <?=$style?> rowspan="2">Perangkat Daerah  Penanggung Jawab </th>
                    </tr>
                    <tr style="background-color: #1DAE94; color: #FFFFFF;">
                        <th <?=$style?>>Anggaran</th>
                        <th <?=$style?>>Kinerja</th>
                        <th <?=$style?>>Rp</th>
                        <th <?=$style?>>Kinerja</th>
                        <th <?=$style?>>Rp</th>
                    </tr>
                    <tr style="background-color: #1DAE94; color: #FFFFFF;">
                    <?php for($i = 1; $i <= 12; $i++){ ?>
                        <th <?=$style?>><?=$i?></th>
                    <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; for($i = 0; $i < count($data); $i++){ ?>
                        <?php if($data[$i]['level'] == 1){ ?>
                        <tr>
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=$data[$i]['tb_urusan_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_urusan_nama']?></td>
                            <td <?=$style?> colspan="17"></td>
                        </tr>
                        <?php }else if($data[$i]['level'] == 2){ ?>
                        <tr>
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_urusan_kode'].".".$data[$i]['tb_bidang_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_bidang_nama']?></td>
                            <td <?=$style?> colspan="17"></td>
                        </tr>
                        <?php }else if($data[$i]['level'] == 3){ 
                            $realisasi_anggaran = @$data[$i]['program_th'.($tahunKe).'_capaian_realisasi_anggaran'];
                        ?>
                        <tr style="background-color: <?=setRkpdColor(@$data[$i]['status-rkpd'])?>;" >
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_urusan_kode'].".".$data[$i]['tb_bidang_kode'].".".$data[$i]['tb_program_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_program_nama']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['program_th'.($tahunKe).'_capaian_anggaran'],2,',','.')?></td>
                            <td <?=$style?>><?=@$data[$i]['program_th'.($tahunKe).'_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['program_th'.($tahunKe).'_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>><?=@$realisasi_anggaran<0?'('.number_format((-1*@$realisasi_anggaran),2,',','.').')':number_format(@$realisasi_anggaran,2,',','.')?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_monev_lra_rek2_program_fisik']?></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>><?=@$data[$i]['tb_sub_unit_nama']?></td>
                        </tr>
                        <?php }else if($data[$i]['level'] == 4){ 
                            $realisasi_anggaran = @$data[$i]['kegiatan_th'.($tahunKe).'_capaian_realisasi_anggaran'];
                        ?>
                        <tr style="background-color: <?=setRkpdColor(@$data[$i]['status-rkpd'])?>;" >
                            <td <?=$style?>><?=$no?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_urusan_kode'].".".$data[$i]['tb_bidang_kode'].".".$data[$i]['tb_program_kode'].".".$data[$i]['tb_kegiatan_kode']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_kegiatan_nama']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['kegiatan_th'.($tahunKe).'_capaian_anggaran'],2,',','.')?></td>
                            <td <?=$style?>><?=@$data[$i]['kegiatan_th'.($tahunKe).'_capaian_kinerja']?></td>
                            <td <?=$style?>><?=number_format(@$data[$i]['kegiatan_th'.($tahunKe).'_capaian_realisasi'],2,',','.')?></td>
                            <td <?=$style?>></td>
                            <td <?=$style?>><?=@$realisasi_anggaran<0?'('.number_format((-1*@$realisasi_anggaran),2,',','.').')':number_format(@$realisasi_anggaran,2,',','.')?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_monev_lra_rek5_fisik']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_monev_lra_rek5_pelaksana']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_monev_lra_rek5_lokasi']?></td>
                            <td <?=$style?>><?=@$data[$i]['tb_sub_unit_nama']?></td>
                        </tr>
                        <?php } ?>
                    <?php $no++; } ?>
                </tbody>

            </table>
        </div>
        <br>
        <br>
        <div>
            <div>
               <h4 style="margin-bottom: 6px">Keterangan Warna</h4>
            </div>
            <table>
                <tr>
                    <td style="border: 2px solid #CCCCCC; width: 100px; background-color: <?=$warnaArr[0]?>"><div></div></td>
                    <td>:</td>
                    <td>Semua RKPD Sesuai</td>
                </tr>
                <tr>
                    <td style="border: 2px solid #CCCCCC; width: 100px; background-color: <?=$warnaArr[1]?>"><div></div></td>
                    <td>:</td>
                    <td>RKPD Perubahan Tidak Ada</td>
                </tr>
                <tr>
                    <td style="border: 2px solid #CCCCCC; width: 100px; background-color: <?=$warnaArr[2]?>"><div></div></td>
                    <td>:</td>
                    <td>RKPD Penetapan Tidak Ada</td>
                </tr>
                <tr>
                    <td style="border: 2px solid #CCCCCC; width: 100px; background-color: <?=$warnaArr[3]?>"><div></div></td>
                    <td>:</td>
                    <td>RKPD Hanya Ada pada RKPD Awal</td>
                </tr>
                <tr>
                    <td style="border: 2px solid #CCCCCC; width: 100px; background-color: <?=$warnaArr[4]?>"><div></div></td>
                    <td>:</td>
                    <td>Penambahan pada RKPD Penetapan dan Perubahan</td>
                </tr>
                <tr>
                    <td style="border: 2px solid #CCCCCC; width: 100px; background-color: <?=$warnaArr[5]?>"><div></div></td>
                    <td>:</td>
                    <td>Penambahan pada RKPD Penetapan</td>
                </tr>
                <tr>
                    <td style="border: 2px solid #CCCCCC; width: 100px; background-color: <?=$warnaArr[6]?>"><div></div></td>
                    <td>:</td>
                    <td>Penambahan pada RKPD Perubahan</td>
                </tr>
                <tr>
                    <td style="border: 2px solid #CCCCCC; width: 100px; background-color: <?=$warnaArr[7]?>"><div></div></td>
                    <td>:</td>
                    <td>Tidak ada pada RKPD</td>
                </tr>
            </table>
        </div>
    </body>
</html>