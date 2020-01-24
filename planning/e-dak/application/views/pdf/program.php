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
                <th <?=$style?> >NO</th>
                <th <?=$style?> >TAHUN</th>
                <th <?=$style?> >NIK</th>
                <th <?=$style?> >NAMA</th>
                <th <?=$style?> >UMUR</th>
                <th <?=$style?> >JENIS KELAMIN</th>
                <th <?=$style?> >JENIS PROGRAM</th>
                <th <?=$style?> >JENIS KEGIATAN</th>
                <th <?=$style?> >SUMBER DANA</th>
            </tr>
            <?php
                $nomor = 1;
                foreach ($data as $row){
                    if($row['jenis_kelamin'] == 1){
                        $jk = "Laki - Laki";
                    }else{
                        $jk = "Perempuan";
                    }
                    if($row['program_jenis'] == 1){
                        $program_jenis = "Program yang telah di terima";
                    }else if($row['program_jenis'] == 3){
                        $program_jenis = "Program yang akan di terima";
                    }else{
                        $program_jenis = "Program yang di harapkan";
                    }
            ?>
            <tr>
                <td <?=$style?> ><?=$nomor?></td>
                <td <?=$style?> ><?=$row['kegiatan_tahun']?></td>
                <td <?=$style?> ><?=$row['nik']?></td>
                <td <?=$style?> ><?=$row['penduduk_nama']?></td>
                <td <?=$style?> ><?=$row['umur']?></td>
                <td <?=$style?> ><?=$jk?></td>
                <td <?=$style?> ><?=$program_jenis?></td>
                <td <?=$style?> ><?=$row['kegiatan_nama']?></td>
                <td <?=$style?> ><?=$row['sumber_dana_nama']?></td>
            </tr>
            <?php
                $nomor++;
                }
            ?>          
        </table>
    </body>
</html>