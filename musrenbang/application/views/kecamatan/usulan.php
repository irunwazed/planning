<?php error_reporting(0); ?>
<div style="font-size: 13px;">
    <div style="text-align: center;">
        <h3>BERITA ACARA</h3>
        <h4>MUSRENBANG RKPD KABUPATEN MOROWALI</h4>
        <h4>TINGKAT KECAMATAN TAHUN <?=date("Y")?></h4>
    </div>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada hari ini   
    bertempat di Kecamatan <?=ucwords(@$asal->Nm_Kec)?> telah diselenggarakan Musrenbang Kecamatan yang dihadiri 
    pemangku kepentingan sesuai dengan daftar hadir peserta yang tercantum dalam LAMPIRAN I berita 
    acara ini. </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Setelah memperhatikan, mendengar dan mempertimbangkan:
    <table style="font-size: 13px;">
        <tr>
            <td width="20px">1.</td>
            <td>Sambutan-sambutan dan Pemaparan Materi  yang disampaikan oleh : Camat, Kepala Bappeda atau yang mewakili, 
            Bupati Morowali atau yang mewakili, dan Kepala Desa/Lurah</td>
        </tr>
        <tr>
            <td>2.</td>
            <td>Tanggapan dan saran dari seluruh peserta musrenbang kecamatan terhadap materi yang 
    dipaparkan oleh masing-masing ketua kelompok diskusi sebagaimana telah dirangkum menjadi hasil 
    keputusan kelompok diskusi musrenbang kecamatan, maka pada:</td>
        </tr>
        <tr>
            <td></td>
            <td>
                <table>
                    <tr>
                        <td>Hari dan Tanggal</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Jam</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>tempat</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Musrenbang Kecamatan</td>
                        <td>:</td>
                        <td><?=ucwords(@$asal->Nm_Kec)?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    </p>
    <div style="text-align: center;">
        <h4>MENYEPAKATI</h4>
    </div>
    <table style="font-size: 13px;">
        <tr>
            <td>KESATU</td>
            <td>:</td>
            <td>Kegiatan Prioritas, Sasaran, yang disertai target dan kebutuhan pendanaan dalam Daftar 
            Prioritas Kecamatan <?=ucwords(@$asal->Nm_Kec)?> Tahun 2021  sebagaimana tercantum dalam LAMPIRAN II 
            berita acara ini. </td>
        </tr>
        <!-- <tr>
            <td>KEDUA</td>
            <td>:</td>
            <td>Usulan program dan kegiatan yang belum dapat diakomodir dalam rancangan RKPD Kabupaten 
            Morowali Tahun 2020 beserta alasan penolakannya sebagaimana tercantum dalam LAMPIRAN III 
            berita acara ini.</td>
        </tr> -->
        <tr>
            <td>KEDUA</td>
            <td>:</td>
            <td>Hasil kesepakatan Musrenbang Kecamatan <?=ucwords(@$asal->Nm_Kec)?> Kabupaten Morowali Tahun 2020 dan 
            Daftar hadir Peserta Musrenbang sebagaimana tercantum dalam Lampiran I merupakan satu 
            kesatuan dan merupakan bagian yang tidak terpisahkan dari berita acara ini.</td>
        </tr>
        <tr>
            <td>KETIGA</td>
            <td>:</td>
            <td>Berita acara ini dijadikan sebagai salah satu bahan penyusunan rancangan RKPD Kabupaten 
            Morowali Tahun 2021 </td>
        </tr>
    </table>
    <div style="text-align: center;">
        <h4>Yang Melaksanakan Musrenbang</h4>
    </div>
    <table style="width: 100%;">
        <tr>
            <td>
                <center>
                    <table style="font-size: 13px;">
                        <tr>
                            <td>Tim Pendamping / BAPPEDA</td>
                        </tr>
                        <tr>
                            <td style="height: 100px;"></td>
                        </tr>
                        <tr>
                            <td>_________________________</td>
                        </tr>
                    </table>
                </center>
            </td>
            <td>
                <center>
                    <table style="font-size: 13px;">
                        <tr>
                            <td>Camat <?=ucwords(@$asal->Nm_Kec)?></td>
                        </tr>
                        <tr>
                            <td style="height: 100px;"></td>
                        </tr>
                        <tr>
                            <td>_________________________</td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="height: 20px"></td>
        </tr>
        <tr>
            <td colspan="2">
                <center>
                    <table>
                        <tr>
                            <td>Unsur Pimpinan Kab. Morowali</td>
                        </tr>
                        <tr>
                            <td style="height: 100px;"></td>
                        </tr>
                        <tr>
                            <td>_______________________________</td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div style="text-align: center;">Lampiran Musrenbang Kecamatan</div>
<br>
<br>
<table style="border-collapse: collapse; width:100%;">
    <thead>
        <tr style="background-color: #1DAE94; color: #FFFFFF;">
            <td style="border: 1px solid; padding: 10px;">No</td>
            <td style="border: 1px solid; padding: 10px;">Asal Usulan</td>
            <td style="border: 1px solid; padding: 10px;">Nama Usulan</td>
            <td style="border: 1px solid; padding: 10px;">Alasan Usulan</td>
            <td style="border: 1px solid; padding: 10px;">Lokasi Detail</td>
            <td style="border: 1px solid; padding: 10px;">Volume Usulan</td>
            <td style="border: 1px solid; padding: 10px;">Satuan Usulan</td>
            <td style="border: 1px solid; padding: 10px;">Pagu Anggaran (Rp)</td>
            <td style="border: 1px solid; padding: 10px;">Penerima Manfaat</td>
            <td style="border: 1px solid; padding: 10px;">Nama Pengusul</td>
            <td style="border: 1px solid; padding: 10px;">OPD</td>
            <td style="border: 1px solid; padding: 10px;">Verifikasi</td>
            <td style="border: 1px solid; padding: 10px;">Alasan Tertolak</td>
            <!-- <td style="border: 1px solid; padding: 10px;">Skor</td> -->
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 0;
        foreach ($data as $key) { 
        $no++;    
        ?>
        <tr>
            <td style="border: 1px solid; padding: 10px;"><?=$no?></td>
            <td style="border: 1px solid; padding: 10px;"><?=@$key['asal']==1?"Desa ".@$key['Nm_Kel']:"Kecamatan ".@$key['Nm_Kec']?></td>
            <td style="border: 1px solid; padding: 10px;"><?=$key['nama']?></td>
            <td style="border: 1px solid; padding: 10px;"><?=$key['alasan']?></td>
            <td style="border: 1px solid; padding: 10px;"><?=$key['lokasi']?></td>
            <td style="border: 1px solid; padding: 10px; text-align: right;"><?=$key['volume']?></td>
            <td style="border: 1px solid; padding: 10px;"><?=$key['nama_satuan']?></td>
            <td style="border: 1px solid; padding: 10px; text-align: right;"><?=number_format($key['pagu'], 2, ',', '.')?></td>
            <td style="border: 1px solid; padding: 10px;"><?=$key['manfaat']?></td>
            <td style="border: 1px solid; padding: 10px;"><?=$key['pengusul']?></td>
            <td style="border: 1px solid; padding: 10px;"><?=$key['Nm_Sub_Unit']?></td>
            <td style="border: 1px solid; padding: 10px;"><?=$key['terima']==1?"Diterima":"Ditolak"?></td>
            <td style="border: 1px solid; padding: 10px;"><?=$key['terima']==2?$key['terimaKet']:""?></td>
            <!-- <td style="border: 1px solid; padding: 10px;"><?=$key['skor_total']?></td> -->
        </tr>
        <?php } ?>
    </tbody>
</table>
<br>
<br>
<!-- <table style="width:1200px">
    <tr>
        <td>
            <table style="width:1200px">
                <tr>
                    <td style="text-align: center;" colspan="3"></td>
                </tr>
                <tr>
                    <td style="width:30%; text-align: center;">
                    Tim Pendamping / BAPPEDA<br><br><br><br><br>
                    (...............................................)<br>
                    </td>
                    <td></td>
                    <td style="width:30%; text-align: center;">
                    Camat<br><br><br><br><br>
                    (...............................................)<br>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table> -->
<div style="font-size: 13px; text-align: center;">
Ditetapkan Di Kecamatan <?=ucwords(@$asal->Nm_Kec)?>, ..................... <?=date("Y")?>
</div>
<table style="width: 100%;">
        <tr>
            <td>
                <center>
                    <table style="font-size: 13px;">
                        <tr>
                            <td>Tim Pendamping / BAPPEDA</td>
                        </tr>
                        <tr>
                            <td style="height: 100px;"></td>
                        </tr>
                        <tr>
                            <td>_________________________</td>
                        </tr>
                    </table>
                </center>
            </td>
            <td>
                <center>
                    <table style="font-size: 13px;">
                        <tr>
                            <td>Camat <?=ucwords(@$asal->Nm_Kec)?></td>
                        </tr>
                        <tr>
                            <td style="height: 100px;"></td>
                        </tr>
                        <tr>
                            <td>_________________________</td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
        <tr>
            <td colspan="2" style="height: 20px"></td>
        </tr>
        <tr>
            <td colspan="2">
                <center>
                    <table>
                        <tr>
                            <td>Unsur Pimpinan Kab. Morowali</td>
                        </tr>
                        <tr>
                            <td style="height: 100px;"></td>
                        </tr>
                        <tr>
                            <td>_______________________________</td>
                        </tr>
                    </table>
                </center>
            </td>
        </tr>
    </table>
