<?php
    $style = 'style="border: 1px solid; padding: 10px;"';
    $styleEdit = 'border: 1px solid; padding: 10px; ';
    $name = 'Data Keluarga Indikator';
    $triwulan = @$post['triwulan']?$post['triwulan']:1;
    $bidang = @$post['bidang']?$post['bidang']:1;
    $tahun = @$post['tahun']?$post['tahun']:1;
    $bidang_nama = @$dataTambahan['dataBidang'][0]['bidang_nama'];
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
    <?php if(@$print){ ?>
        <img style="padding-left: 45%; width: 10%;" src="<?=base_url()."public/images/Lambang_Kabupaten_Kolaka_Utara.png"?>" alt="">
       
        <!-- <div style="font-size: 12px;">
            <p style="text-align: center">PRESIDEN</p>
            <p style="text-align: center">REPUBLIK INDONESIA</p>
        </div> -->
    <?php } ?>
        <!-- <div style="width: 100%; height: 210px">
            <div style="float: left; width: 60%"> '</div>
            <div style="float: left; ">
                <p>LAMPIRAN III</p>
                <p>PERATURAN PRESIDEN REPUBUK INDONESIA</p>
                <p>NOMOR 5 TAHUN 2018</p>
                <p>TENTANG PERUBAHAN ATAS PERATURAN PRESIDEN</p>
                <p>NOMOR 123 TAHUN 2016 TENTANG PETUNJUK TEKNIS</p>
                <p>DANA ALOKASI KHUSUS FISIK</p>
            </div>
        </div> -->
        <div style="width: 100%; text-align: center">
            <p style="margin-bottom: 6px;">LAPORAN KEMAJUAN PELAKSANAAN KEGIATAN</p>
            <p style="margin-bottom: 6px;margin-top: 0px;">DANA ALOKASI KHUSUS (DAK) FISIK <?=strtoupper(@$data[0]['jenis_nama'])?></p>
            <!-- <p>DANA ALOKASI KHUSUS (DAK) FISIK REGULER/PENUGASAN/AFIRMASI *}</p> -->
            <p style="margin-bottom: 6px;margin-top: 0px;">BIDANG <?=strtoupper(@$bidang_nama)?> </p>
            <p style="margin-bottom: 6px;margin-top: 0px;">TAHUN ANGGARAN <?=$tahun?> </p>
        </div>
        <div>
            <table>
                <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td>Sulawesi Tengah</td>
                </tr>
                <tr>
                    <td>Kabupaten Kota</td>
                    <td>:</td>
                    <td>Morowali</td>
                </tr>
                <tr>
                    <td>Triwulan</td>
                    <td>:</td>
                    <td><?=@$triwulan?></td>
                </tr>
            </table>
        </div>
        <div style="width: 100%;">
            <table style="border-collapse: collapse; width:100%;">
                <tr>
                    <th rowspan="3" <?=$style?> >No</th>
                    <th rowspan="3" colspan="4" style="<?=$styleEdit?>" >SUB BIDANG / KEGIATAN</th>
                    <th colspan="4" <?=$style?> >PERENCANAAN KEGIATAN</th>
                    <th colspan="5" <?=$style?> >MEKANISME PELAKSANAAN</th>
                    <th colspan="4" <?=$style?> >REALISASI (%)</th>
                    <th rowspan="3" <?=$style?> >Kodefikasi/ Keterangan/ Permasalahan</th>
                </tr>
                <tr>
                    <th rowspan="2" <?=$style?> >Volume</th>
                    <th rowspan="2" <?=$style?> >Satuan</th>
                    <th rowspan="2" <?=$style?> >Jumlah Penerima Manfaat</th>
                    <th rowspan="2" <?=$style?> >PAGU DAK</th>
                    <th colspan="2" <?=$style?> >Swakelola</th>
                    <th colspan="2" <?=$style?> >Kontraktual</th>
                    <th rowspan="2" <?=$style?> >Metode Pembayaran</th>
                    <th colspan="2" <?=$style?> >Keuangan</th>
                    <th colspan="2" <?=$style?> >Fisik</th>
                </tr>
                <tr>
                    <th <?=$style?> >Volume</th>
                    <th <?=$style?> >(Rp. Dalam Ribuan)</th>
                    <th <?=$style?> >Volume</th>
                    <th <?=$style?> >(Rp. Dalam Ribuan)</th>
                    <th <?=$style?> >(Rp. Dalam Ribuan)</th>
                    <th <?=$style?> >%</th>
                    <th <?=$style?> >Volume</th>
                    <th <?=$style?> >%</th>
                </tr>
                <tr>
                    <th <?=$style?> >(1)</th>
                    <th colspan="4" <?=$style?> >(2)</th>
                    <th <?=$style?> >(3)</th>
                    <th <?=$style?> >(4)</th>
                    <th <?=$style?> >(5)</th>
                    <th <?=$style?> >(6)</th>
                    <th <?=$style?> >(7)</th>
                    <th <?=$style?> >(8)</th>
                    <th <?=$style?> >(9)</th>
                    <th <?=$style?> >(10)</th>
                    <th <?=$style?> >(11)</th>
                    <th <?=$style?> >(12)</th>
                    <th <?=$style?> >(13)</th>
                    <th <?=$style?> >(14)</th>
                    <th <?=$style?> >(15)</th>
                    <th <?=$style?> ></th>
                </tr>
                <?php
                        $nomor = 1;
                        $noKeg = 1;
                        $noRin = 1;
                        $noIsi = 1;
                        $noPenunjang = 1;
                        $alpa = ['', 'a', 'b', 'c', 'd', 'e', 'f', 'g',
                                    'h', 'i', 'j', 'k', 'l', 'm', 'n',
                                    'o', 'p', 'q', 'r', 's', 't', 'u',
                                    'v', 'w', 'x', 'y', 'z'];
                        $sub_bidang_kode = 0;
                        $kegiatan_kode = 0;
                        $rincian_kode = 0;
                        $totalAll = 0;
                        $totalKonstraktual = 0;
                        $totalSwakelola = 0;
                        $totalKeuangan = 0;
                        $arrPersen = array();
                        $totalUangPersen = array();
                        foreach ($data as $row){
                            
                            
                            if($row['level'] == 1){
                                ?>
                                <tr style="background-color: #FF5733;">
                                    <td <?=$style?> ><?=$nomor?></td>
                                    <td colspan="4" style="<?=$styleEdit?> border-left: 0px;" ><?="Sub Bidang ".ucwords(strtolower($row['sub_bidang_nama']))?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['pagu_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['swakelola_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['konstraktual_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['keuangan_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ><?=number_format($row['keuangan_persen'],2,",","")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['fisik_persen'],2,",","")?></td>
                                    <td <?=$style?> ></td>
                                </tr>
                                <?php
                                $noKeg = 1;
                                $nomor++;
                            }else if($row['level'] == 2){
                                ?>
                                <tr style="background-color: #FFCA33;">
                                    <td <?=$style?> ></td>
                                    <td style="<?=$styleEdit?> border-right: 0px; border-left: 0px;"><?=$alpa[$noKeg]?>.</td>
                                    <td colspan="3" style="<?=$styleEdit?> border-left: 0px;" ><?="Menu Kegiatan ".ucwords(strtolower($row['kegiatan_nama']))?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['pagu_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['swakelola_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['konstraktual_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['keuangan_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ><?=number_format($row['keuangan_persen'],2,",","")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['fisik_persen'],2,",","")?></td>
                                    <td <?=$style?> ></td>
                                </tr>
                                <?php
                                $noRin = 1;
                                $noKeg++;
                            }else if($row['level'] == 3){
                                ?>
                                <tr style="background-color: #55FF33;">
                                    <td <?=$style?> ></td>
                                    <td style="<?=$styleEdit?> border-right: 0px; border-left: 0px;"></td>
                                    <td style="<?=$styleEdit?> border-right: 0px; border-left: 0px;"><?=$noRin?>)</td>
                                    <td colspan="2" style="<?=$styleEdit?> border-left: 0px;" ><?="Rincian Kegiatan ".ucwords(strtolower($row['rincian_nama']))?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['pagu_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['swakelola_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['konstraktual_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['keuangan_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ><?=number_format($row['keuangan_persen'],2,",","")?></td>
                                    <td <?=$style?> ></td>
                                    <td <?=$style?> ><?=number_format($row['fisik_persen'],2,",","")?></td>
                                    <td <?=$style?> ></td>
                                </tr>
                                <?php
                                $noIsi = 1;
                                $noRin++;
                            }else if($row['level'] == 4){
                                ?>
                            <tr>
                                <td <?=$style?> ></td>
                                <td colspan="2" style="<?=$styleEdit?> border-right: 0px; border-left: 0px;"></td>
                                <td style="<?=$styleEdit?> border-right: 0px; border-left: 0px;"><?=$noIsi?></td>
                                <td style="<?=$styleEdit?> border-left: 0px;"  ><?=$row['detail_rincian_nama']?></td>
                                <td <?=$style?> ><?=$row['detail_rincian_volume']?></td>
                                <td <?=$style?> ><?=$row['satuan_nama']?></td>
                                <td <?=$style?> ><?=$row['detail_rincian_penerima_manfaat']?></td>
                                <td <?=$style?> ><?=number_format($row['detail_rincian_pagu'],2,",",".")?></td>
                                <td <?=$style?> ><?=$row['detail_rincian_swakelola_volume']?></td>
                                <td <?=$style?> ><?=number_format($row['detail_rincian_swakelola_rp'],2,",",".")?></td>
                                <td <?=$style?> ><?=$row['detail_rincian_konstraktual_volume']?></td>
                                <td <?=$style?> ><?=number_format($row['detail_rincian_konstraktual_rp'],2,",",".")?></td>
                                <td <?=$style?> ><?=$row['detail_rincian_pembayaran']?></td>
                                <td <?=$style?> ><?=number_format($row['keuangan_jumlah'],2,",",".")?></td>
                                <td <?=$style?> ><?=number_format($row['keuangan_persen'],2,",","")?></td>
                                <td <?=$style?> ><?=number_format($row['detail_rincian_tw'.$triwulan.'_fisik_volume'],2,",","")?></td>
                                <td <?=$style?> ><?=number_format($row['detail_rincian_tw'.$triwulan.'_fisik_persen'],2,",","")?></td>
                                <td <?=$style?> ><?=$row['id_masalah']?></td>
                            </tr>
                            <?php
                                $totalAll += $row['detail_rincian_pagu'];
                                $totalKonstraktual += $row['detail_rincian_konstraktual_rp'];
                                $totalSwakelola += $row['detail_rincian_swakelola_rp'];
                                
                                array_push($arrPersen, @$row['detail_rincian_tw'.$triwulan.'_fisik_persen']);
                                $noIsi++;
                            }
                        
                        if(count(@$row['dataPenunjang']) > 0){
                            for($k = 0; $k < count(@$row['dataPenunjang']); $k++){
                                
                                $fisikPersen = @$row['persen_jumlah'];
                                if(count($fisikPersen) > 0){
                                    $jumFisikPersen = array_sum($fisikPersen)/count($fisikPersen);
                                }else{
                                    $jumFisikPersen = 0;
                                }

                                if($k == 0){
                                    ?>
                                    <tr style="background-color: #FFCA33;">
                                        <td <?=$style?> ></td>
                                        <td colspan="4" style="<?=$styleEdit?> border-left: 0px;" ><?=ucwords(strtolower('Biaya Penunjang'))?></td>
                                        <td <?=$style?> ></td>
                                        <td <?=$style?> ></td>
                                        <td <?=$style?> ></td>
                                        <td <?=$style?> ><?=number_format(@$row['dataPenunjang'][$k]['pagu_jumlah'],2,",",".")?></td>
                                        <td <?=$style?> ></td>
                                        <td <?=$style?> ><?=number_format(@$row['dataPenunjang'][$k]['swakelola_jumlah'],2,",",".")?></td>
                                        <td <?=$style?> ></td>
                                        <td <?=$style?> ><?=number_format(@$row['dataPenunjang'][$k]['konstraktual_jumlah'],2,",",".")?></td>
                                        <td <?=$style?> ></td>
                                        <td <?=$style?> ><?=number_format(@$row['dataPenunjang'][$k]['keuangan_jumlah'],2,",",".")?></td>
                                        <td <?=$style?> ><?=number_format($row['dataPenunjang'][$k]['keuangan_persen'],2,",","")?></td>
                                        <td <?=$style?> ></td>
                                        <td <?=$style?> ><?=number_format($row['dataPenunjang'][$k]['fisik_persen'],2,",","")?></td>
                                        <td <?=$style?> ></td>
                                    </tr>
                                    <?php
                                    $noKeg = 1;
                                }else{
                                ?>
                                <tr>
                                    <td <?=$style?> ></td>
                                    <td colspan="2" style="<?=$styleEdit?> border-right: 0px; border-left: 0px;"></td>
                                    <td style="<?=$styleEdit?> border-right: 0px; border-left: 0px;"><?=$noIsi?></td>
                                    <td style="<?=$styleEdit?> border-left: 0px;"  ><?=$row['dataPenunjang'][$k]['kegiatan_penunjang_nama']?></td>
                                    <td <?=$style?> ><?=$row['dataPenunjang'][$k]['kegiatan_penunjang_volume']?></td>
                                    <td <?=$style?> ><?=$row['dataPenunjang'][$k]['satuan_nama']?></td>
                                    <td <?=$style?> ><?=$row['dataPenunjang'][$k]['kegiatan_penunjang_penerima_manfaat']?></td>
                                    <td <?=$style?> ><?=number_format($row['dataPenunjang'][$k]['kegiatan_penunjang_pagu'],2,",",".")?></td>
                                    <td <?=$style?> ><?=$row['dataPenunjang'][$k]['kegiatan_penunjang_swakelola_volume']?></td>
                                    <td <?=$style?> ><?=number_format($row['dataPenunjang'][$k]['kegiatan_penunjang_swakelola_rp'],2,",",".")?></td>
                                    <td <?=$style?> ><?=$row['dataPenunjang'][$k]['kegiatan_penunjang_konstraktual_volume']?></td>
                                    <td <?=$style?> ><?=number_format($row['dataPenunjang'][$k]['kegiatan_penunjang_konstraktual_rp'],2,",",".")?></td>
                                    <td <?=$style?> ><?=$row['dataPenunjang'][$k]['kegiatan_penunjang_pembayaran']?></td>
                                    <td <?=$style?> ><?=number_format(@$row['dataPenunjang'][$k]['keuangan_jumlah'],2,",",".")?></td>
                                    <td <?=$style?> ><?=number_format($row['dataPenunjang'][$k]['keuangan_persen'],2,",","")?></td>
                                    <td <?=$style?> ><?=number_format(@$row['dataPenunjang'][$k]['kegiatan_penunjang_tw'.$triwulan.'_fisik_volume'],2,",","")?></td>
                                    <td <?=$style?> ><?=number_format(@$row['dataPenunjang'][$k]['kegiatan_penunjang_tw'.$triwulan.'_fisik_persen'],2,",","")?></td>
                                    <td <?=$style?> ><?=$row['dataPenunjang'][$k]['id_masalah']?></td>
                                </tr>
                            <?php
                           
                                // $totalAll += $row['dataPenunjang'][$k]['kegiatan_penunjang_pagu'];
                                // array_push($totalUangPersen, $persen);
                                // $totalKonstraktual += $row['dataPenunjang'][$k]['kegiatan_penunjang_konstraktual_rp'];
                                // $totalSwakelola += $row['dataPenunjang'][$k]['kegiatan_penunjang_swakelola_rp'];
                                // $totalKeuangan += $uang;
                                // array_push($arrPersen, $row['dataPenunjang'][$k]['kegiatan_penunjang_tw'.$triwulan.'_fisik_persen']);
                                $noIsi++;
                                $noPenunjang++;
                                }
                            }
                        }
                    }
                ?>
                <tr>
                    <td colspan="8" style="<?=$styleEdit?> text-align: right;">TOTAL</td>
                    <td <?=$style?> ><?=number_format(@$totalBidang[0]['pagu_jumlah'],2,",",".")?></td>
                    <td <?=$style?> ></td>
                    <td <?=$style?> ><?=number_format(@$totalBidang[0]['swakelola_jumlah'],2,",",".")?></td>
                    <td <?=$style?> ></td>
                    <td <?=$style?> ><?=number_format(@$totalBidang[0]['konstraktual_jumlah'],2,",",".")?></td>
                    <td <?=$style?> ></td>
                    <td <?=$style?> ><?=number_format(@$totalBidang[0]['keuangan_jumlah'],2,",",".")?></td>
                    <td <?=$style?> ><?=number_format(@$totalBidang[0]['keuangan_persen'],2,",","")?></td>
                    <td <?=$style?> ></td>
                    <td <?=$style?> ><?=number_format(@$totalBidang[0]['fisik_persen'],2,",","")?></td>
                    <td <?=$style?> ></td>
                </tr>
            </table>
        </div>
        <div style="height: 220px; width: 100%;">
           <div style="float: right; width: 300px;">
           <br>
           <br>
           <?php
           $bulanTri = array('', 'April', 'Juli', 'Oktober', 'January');
           if($triwulan == 4){
               $tahun ++;
           }
           
           ?>
           <?php
           if(@$dataTambahan['dataBidang'][0]['ttd'.$triwulan] == 1){ ?>
           
           <table style="padding-left: 24%;">
            <tr>
                    <td></td>
                    <td>Morowali, ..........................</td>
                </tr>
                <tr>
                    <th>An.</th>
                    <th style="text-align: left;"></th>
                </tr>
                <tr>
                    <th></th>
                    <th style="text-align: left; padding-bottom: 100px;"></th>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            </table>
           <!-- <img style="" src="<?=base_url()."public/images/ttd21.png"?>" alt="ttd"> -->
           <!-- <img style="position: absolute; width: 20%; right: 80px; margin-top: 20px" src="<?=base_url()."public/images/ttd.png"?>" alt="ttd"> -->
           <?php }else{ ?>
           
            <table style="padding-left: 11%;">
                <tr>
                    <td></td>
                    <td>Morowali, ..........................</td>
                </tr>
                <tr>
                    <th>An.</th>
                    <th style="text-align: left;"></th>
                </tr>
                <tr>
                    <th></th>
                    <th style="text-align: left; padding-bottom: 100px;"></th>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            </table>
           <!-- <img style="" src="<?=base_url()."public/images/ttd31.png"?>" alt="ttd"> -->

           <?php } ?>
           <!-- <img style="position: absolute; width: 20%; right: 80px; margin-top: 20px" src="<?=base_url()."public/images/ttd.png"?>" alt="ttd">
            <table>
                <tr>
                    <td></td>
                    <td>Lasusua, .... <?=$bulanTri[$triwulan]?> <?=$tahun?></td>
                </tr>
                <tr>
                    <th>An.</th>
                    <th style="text-align: left;">BUPATI KOLAKA UTARA</th>
                </tr>
                <tr>
                    <th></th>
                    <th style="text-align: left; padding-bottom: 100px;">SEKRETARIS DAERAH</th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: center; padding:1px; border-bottom: 1px solid #000000;">TAUFIQ S., SP, MM</th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: center; padding:1px;">Pembina TK I GOL IV/b</th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: center; padding:1px;">NIP. 196806031997031007</th>
                </tr>
            </table> -->
            <!-- <h4 style="text-align: center; margin: 0px; padding: 0px;">An. BUPATI KOLAKA UTARA</h4>
            <h4 style="text-align: center; margin: 0px; padding: 0px;"> SEKRETARIS DAERAH</h4> -->
            <!-- <p style="text-align: right">Keterangan...</p> -->
            </div> 
        </div>
        <div>
            <!-- <u><b>Keterangan :</b></u> -->
            <!-- <table>
                <tr>
                    <td>Kolom (1)</td>
                    <td>:</td>
                    <td><b>No.</b> diisi Nomor Subbidang </td>
                </tr>
                <tr>
                    <td>Kolom (2)</td>
                    <td>:</td>
                    <td><b>Subbidang/Kegiatan</b> diisi Nama Sub Bidang dengan rincian: Menu Kegiatan dan Rincian Kegiatan per paket pekerjaan </td>
                </tr>
                <tr>
                    <td>Kolom (3)</td>
                    <td>:</td>
                    <td><b>volume Kegiatan</b> diisi tcsar"an rla6ing-masing ncian keAiatan </td>
                </tr>
                <tr>
                    <td>Kolom (4)</td>
                    <td>:</td>
                    <td><b>Satuan Kegiatan</b>  diisi standar satuan untuk masing-masing kcgiatan </td>
                </tr>
                <tr>
                    <td>Kolom (5)</td>
                    <td>:</td>
                    <td><b>Jumlah Penerima Manfaat</b> diisi besaran penerima manfaat atas pelayanan publik yang didanai dari DAK Fisik </td>
                </tr>
                <tr>
                    <td>Kolom (6)</td>
                    <td>:</td>
                    <td><b>Pagu Alokasi DAK Fisik</b> diisi besaran alokasi DAK Fisik per subbidang </td>
                </tr>
                <tr>
                    <td>Kolom (7)</td>
                    <td>:</td>
                    <td><b>Volume Kegiatan Swalokasi</b> diisi besaran output masing-masing rincian kegiatan yang dilaksanakan secara swakelola (Tidak perlu diisi jika secara kontraktual)</td>
                </tr>
                <tr>
                    <td>Kolom (8)</td>
                    <td>:</td>
                    <td><b>Nilai Dana Swalokasi</b> diisi besaran dana dari masing-masing rincian kegiatan yang dilaksanakan secara kontraktual (Tidak perlu diisi jika secara kontraktual)</td>
                </tr>
                <tr>
                    <td>Kolom (9)</td>
                    <td>:</td>
                    <td><b>Volume Kegiatan Kontraktual</b> dihi besaran output masina-maoing rincian kegiatan yang dilaksanakan secara kontlaktual (tidak perlu diisi jika secara swakelola)</td>
                </tr>
                <tr>
                    <td>Kolom (10)</td>
                    <td>:</td>
                    <td><b>Nilai Dana Kontraktual</b> diisi besaran dana masing-masing rincian kegiatan yang dilaksanakan secara kontraktual (tida} perlu diisi jika secara swakelola)</td>
                </tr>
                <tr>
                    <td>Kolom (11)</td>
                    <td>:</td>
                    <td><b>Metode Pembayaran</b> diisi dengan bentuk pembayaran sekaligus atau bertahap</td>
                </tr>
                <tr>
                    <td>Kolom (12)</td>
                    <td>:</td>
                    <td><b>Realisasi Keuangan dalam Rupiah</b> diisi dengan nilai realisasi kegiatan dalam besaran rupiah</td>
                </tr>
                <tr>
                    <td>Kolom (13)</td>
                    <td>:</td>
                    <td><b>Realisasi Keuangan dalam Persentase</b> diisi dengan nilai realisasi kegiatan dalam persentase</td>
                </tr>
                <tr>
                    <td>Kolom (14)</td>
                    <td>:</td>
                    <td><b>Realisasi Fisik Dalam Rupiah</b> diisi dengan nilai realisasi kegiatan dalam volume output</td>
                </tr>
                <tr>
                    <td>Kolom (15)</td>
                    <td>:</td>
                    <td><b>Realisasi Fisik Dalam Persentase</b> diisi dengan nilai realisasi kegiatan dalam persentase volume output</td>
                </tr>
                <tr>
                    <td>Kolom (16)</td>
                    <td>:</td>
                    <td><b>Kodefikasi Permasalahan</b> diisi dengan masalah-masalah yang terjadi di lapangan terkait dengan kode masalah yang tersedia</td>
                </tr>
            </table> -->
        </div>
        <br>
        <br>
        <div>
            <table>
                <tr>
                    <td>
                        <b>Kodefikasi Masalah :</b>
                        <br>
                        <b>Kode Masalah : <i>(diberi penjelasan)</i></b>
                        <ol style="padding-top: 0px; margin-top: 0px;">
                            <li>Permasalahan terkait dengan <b>Peraturan Perundangan</b></li>
                            <li>Permasalahan terkait dengan <b>Petunjuk Teknis</b></li>
                            <li>Permasalahan terkait dengan <b>Rencana Kerja dan Anggaran SKPD</b></li>
                            <li>Permasalahan terkait dengan <b>DPA-SKPD</b></li>
                            <li>Permasalahan terkait dengan <b>SK Penetapan Pelaksana Kegiatan</b></li>
                            <li>Permasalahan terkait dengan <b>Pelaksanaan Tender Pekerjaan Kontrak</b></li>
                            <li>Permasalahan terkait dengan <b>Persiapan Pekerjaan Swakelola</b></li>
                            <li>Permasalahan terkait dengan <b>Penerbitan SP2D</b></li>
                            <li>Permasalahan terkait dengan <b>Pelaksanaan Pekerjaan Kontrak</b></li>
                            <li>Permasalahan terkait dengan <b>Pelaksanaan Pekerjaan Swakelola</b></li>
                            <li>Permasalahan <b>Lain-lain</b></li>
                        </ol> 
                    </td>
                </tr>
            </table>
        </div>
        <!-- <div style="height: 200px; width:100%;">
            <div style="float: right; width: 300px;">
                <p style="text-align: center">PRESIDEN REPUBLIK INDONESIA,</p>
                <br>
                <p style="text-align: center">ttd.</p>
                <br>
                <p style="text-align: center">JOKO WIDODO</p>
            </div>
        </div>
        <div>
            
            <img style=" width: 35%;" src="<?=base_url()."public/img/pdf/ttd.png"?>" alt="">
        </div> -->
    </body>
</html>