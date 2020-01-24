<?php
    $style = 'style="border: 1px solid; padding: 10px;"';
    $name = 'Data Keluarga Indikator';
?>
<html>
    <head>
        <title></title>
        <?php if(@$print){ ?>
        
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
        <h1><?=@$name?></h1>
        <table style="border-collapse: collapse; width:100%;">

            <tr>
                <th rowspan="3" <?=$style?> >NO</th>
                <th rowspan="3" <?=$style?> >TAHUN</th>
                <th rowspan="3" <?=$style?> >NIK</th>
                <th rowspan="3" <?=$style?> >NAMA</th>
                <th rowspan="3" <?=$style?> >UMUR</th>
                <th rowspan="3" <?=$style?> >JENIS KELAMIN</th>
                <th colspan="11" <?=$style?> >INDIKATOR</th>
            </tr>
            <tr>
                <th colspan="3" <?=$style?> >EKONOMI</th>
                <th colspan="6" <?=$style?> >INFRA STRUKTUR </th>
                <th colspan="2" <?=$style?> >SOSIAL BUDAYA</th>
            </tr>
            <tr>
                <th <?=$style?> >Pendapatan (Bulan)</th>
                <th <?=$style?> >Pengeluaran (Bulan)</th>
                <th <?=$style?> >Aset</th>
                <th <?=$style?> >Ukuran Rumah</th>
                <th <?=$style?> >Kepemilikan Rumah</th>
                <th <?=$style?> >Dinding Terluas</th>
                <th <?=$style?> >Atap Terjual</th>
                <th <?=$style?> >Lantai Terluas</th>
                <th <?=$style?> >Jenis Penerangan</th>
                <th <?=$style?> >Jamban</th>
                <th <?=$style?> >Sumber Air Minum</th>
            </tr>
            <?php
                $nomor = 1;
                foreach ($data as $row){
                    if($row['jenis_kelamin'] == 1){
                        $jk = "Laki - Laki";
                    }else{
                        $jk = "Perempuan";
                    }
            ?>
            <tr>
                <td <?=$style?> ><?=$nomor?></td>
                <td <?=$style?> ><?=$row['tahun']?></td>
                <td <?=$style?> ><?=$row['nik']?></td>
                <td <?=$style?> ><?=$row['penduduk_nama']?></td>
                <td <?=$style?> ><?=$row['umur']?></td>
                <td <?=$style?> ><?=$jk?></td>
                <td <?=$style?> ><?=number_format(($row['pendapatan_utama']+$row['pendapatan_sampingan']),2,",",".")?></td>
                <td <?=$style?> ><?=number_format($row['pengeluaran_total'],2,",",".")?></td>
                <td <?=$style?> ><?=$row['jenis_aset']?></td>
                <td <?=$style?> ><?=$row['rumah_ukuran']?></td>
                <td <?=$style?> ><?=$row['rumah_kepemilikan_nama']?></td>
                <td <?=$style?> ><?=$row['dinding_nama']?></td>
                <td <?=$style?> ><?=$row['atap_nama']?></td>
                <td <?=$style?> ><?=$row['lantai_nama']?></td>
                <td <?=$style?> ><?=$row['penerangan_nama']?></td>
                <td <?=$style?> ><?=$row['jamban_nama']?></td>
                <td <?=$style?> ><?=$row['sumber_air_minum_nama']?></td>
            </tr>
            <?php
                $nomor++;
                }
            ?>          
        </table>
    </body>
</html>