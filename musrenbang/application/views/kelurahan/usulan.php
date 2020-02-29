<?php error_reporting(0); ?>
<div style="height: 1000px">
<div style="text-align: center;"><strong>BERITA ACARA MUSRENBANG TAHUN 2020</strong></div>

<p style="text-align: center;"><strong><?php 
if(@$asal->Kd_Kel == 1){echo "KELURAHAN";}
else if(@$asal->Kd_Kel == 2){echo "DESA";} ?> 
<?=strtoupper(@$asal->Nm_Kel)?> KECAMATAN <?=strtoupper(@$asal->Nm_Kec)?></strong></p>
<p>&nbsp;</p>
<p>Musrenbang telah dilaksanakan pada :</p>
<p>Hari/Tanggal&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : </p>
<p>Waktu&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&ensp; : </p>
<p>Tempat&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;: </p>
<p>Usulan&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&thinsp;&thinsp;: <?=count($data)?> Usulan <em>(terlampir)</em></p>
Materi yang dibahas dalam Musrenbang ini adalah menetapkan usulan-usulan kegiatan lingkungan.<br>
Hasil pertemuan ditetapkan menjadi keputusan akhir Musrenbang adalah :<br>
Menyepakati usulan-usulan kegiatan dalam rangka menyelesaikan permasalahan yang terjadi untuk diusulkan dalam Musrenbang Kelurahan <em>(terlampir)</em>.<br>
Demikian berita acara ini dibuat dan disahkan untuk digunakan sebagaimana mestinya.<br>
<p>&nbsp;</p>
</div>

<div style="text-align: center;">Lampiran Musrenbang Desa / Kelurahan <?=ucwords(@$asal->Nm_Kel)?></div>
<br>
<table>
    <tr>
        <td>Waktu Pelaksanaan Musrenbang</td>
        <td>:</td>
        <td></td>
    </tr>
    <tr>
        <td>Tempat Pelaksanaan Musrenbang</td>
        <td>:</td>
        <td></td>
    </tr>
</table>
<br>
<table style="border-collapse: collapse; width:100%;">
    <tr>
        <!-- <td style="border: 1px solid; padding: 10px;">Asal Usulan</td> -->
        <td style="border: 1px solid; padding: 10px;">No</td>
        <td style="border: 1px solid; padding: 10px;">Nama Usulan</td>
        <td style="border: 1px solid; padding: 10px;">Alasan Usulan</td>
        <td style="border: 1px solid; padding: 10px;">Lokasi Detail</td>
        <td style="border: 1px solid; padding: 10px;">Volume Usulan</td>
        <td style="border: 1px solid; padding: 10px;">Satuan Usulan</td>
        <td style="border: 1px solid; padding: 10px;">Pagu Anggaran (Rp)</td>
        <td style="border: 1px solid; padding: 10px;">Penerima Manfaat</td>
        <td style="border: 1px solid; padding: 10px;">Nama Pengusul</td>
    </tr>
    <?php
    $no = 0;
    foreach ($data as $key) { 
    $no++;    
    ?>
    <tr>
        <!-- <td style="border: 1px solid; padding: 10px;"><?="Desa ".@$key['Nm_Kel']?></td> -->
        <td style="border: 1px solid; padding: 10px;"><?=$no?></td>
        <td style="border: 1px solid; padding: 10px;"><?=$key['nama']?></td>
        <td style="border: 1px solid; padding: 10px;"><?=$key['alasan']?></td>
        <td style="border: 1px solid; padding: 10px;"><?=$key['lokasi']?></td>
        <td style="border: 1px solid; padding: 10px; text-align: right;"><?=$key['volume']?></td>
        <td style="border: 1px solid; padding: 10px;"><?=$key['nama_satuan']?></td>
        <td style="border: 1px solid; padding: 10px; text-align: right;"><?=number_format($key['pagu'], 2, ',', '.')?></td>
        <td style="border: 1px solid; padding: 10px;"><?=$key['manfaat']?></td>
        <td style="border: 1px solid; padding: 10px;"><?=$key['pengusul']?></td>
    </tr>
    <?php } ?>
</table>
<br>
<br>
<table style="width:1200px">
    <tr>
        <td>
            <table style="width:1200px">
                <tr>
                    <td style="text-align: center;" colspan="3">Ditetapkan Di <?=ucwords(@$asal->Nm_Kel)?>, ..................... <?=date("Y")?></td>
                </tr>
                <tr>
                    <td style="width:30%; text-align: center;">
                    Ketua BPD / Perwakilan Masyarakat<br><br><br><br><br>
                    (...............................................)<br>
                    </td>
                    <td></td>
                    <td style="width:30%; text-align: center;">
                    Lurah / Kepala Desa<br><br><br><br><br>
                    (...............................................)<br>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>