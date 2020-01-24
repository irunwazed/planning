<?php

$bulanArr = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'
, 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
?>
<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="modal-form" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form <?=@$judul?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-data">
                    <input type="hidden" name="kode" value="<?=@$kode?>">
                    <div class="position-relative form-group">
                        <label>Rekening</label>
                        <select name="tb_rekening5_kode" class="form-control select2" style="width:100%" required>
                            <option value="">-= Pilih Rekening =-</option>
                            <?php foreach($dataRekening as $row){ ?>
                                <option value="<?=$row['tb_rekening5_kode']?>"><?=$row['tb_rekening5_nama']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label>Bulan</label>
                        <select name="tb_monev_lra_rek5_bulan" class="form-control select2" style="width:100%" required>
                            <option value="">-= Pilih Bulan =-</option>
                            <?php for($i = 1; $i <= 12; $i++){ ?>
                                <option value="<?=$i?>"><?=$bulanArr[$i]?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label>Anggaran</label>
                        <input name="tb_monev_lra_rek5_anggaran" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Realisasi</label>
                        <input name="tb_monev_lra_rek5_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Fisik</label>
                        <input name="tb_monev_lra_rek5_fisik" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Pelaksana</label>
                        <input name="tb_monev_lra_rek5_pelaksana" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Sumber Dana</label>
                        <select name="id_tb_sumber_dana" class="form-control select2" style="width:100%" required>
                            <option value="">-= Pilih Sumber Dana =-</option>
                            <?php foreach($dataSumberDana as $row){ ?>
                                <option value="<?=$row['id_tb_sumber_dana']?>"><?=$row['tb_sumber_dana_nama']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label>Lokasi</label>
                        <input name="tb_monev_lra_rek5_lokasi" type="text" class="form-control" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="form-data">Simpan</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
      
    $(document).ready(function() {
        
    } );
    var dataAll;
    var dataPilih;
    var kode = '<?=@$kode?>';
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'opd/penyusunan/lra/rek5';
    var page = 1;
    var bulan = 1;
    getData();

    $('select[name="bulan"]').change(function(){
        bulan = $(this).val();
        getData();
    });
    
    function getData(_page = 1){
        page = _page;
        let url = base_url+link+"/get-data";
        let data = {
            page : page,
            kode : kode,
            bulan : bulan,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                setTable(respon.data);
                dataAll = respon.data;
            }else{

            }
        });
    }
        
    function setTable(data){
        myTable.clear().draw();
        no = 1;
        let kodeOneData;
        let bulanArr = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        data.forEach(element => {
            kodeOneData = element['tb_program_kode']
                        +'-'+element['tb_kegiatan_kode']
                        +'-'+element['tb_rekening3_kode']
                        +'-'+element['tb_rekening4_kode']
                        +'-'+element['tb_rekening5_kode'];
            kodeShow =  element['tb_rekening1_kode']
                        +'.'+element['tb_rekening2_kode']
                        +'.'+element['tb_program_kode']
                        +'.'+element['tb_kegiatan_kode']
                        +'.'+element['tb_rekening3_kode']
                        +'.'+element['tb_rekening4_kode']
                        +'.'+element['tb_rekening5_kode'];
            tempData = [
                no,
                kodeShow,
                bulanArr[element['tb_monev_lra_rek5_bulan']],
                element['tb_rekening5_nama'],
                convertToRupiah(element['tb_monev_lra_rek5_anggaran']),
                convertToRupiah(element['tb_monev_lra_rek5_realisasi']),
                element['tb_monev_lra_rek5_fisik'],
                element['tb_monev_lra_rek5_pelaksana'],
                element['tb_sumber_dana_nama'],
                element['tb_monev_lra_rek5_lokasi'],
                '<a class="btn btn-info"  href="#" onclick="setUpdate(\''+kodeOneData+'\')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>'+
                '<a class="btn btn-danger"  href="#"  data-setFunction="doDelete(\''+kodeOneData+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"><i class="fa fa-trash"></i></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate(){
        formClean();
        formData.attr("action", base_url+link+"/create");
    }

    function setUpdate(id){
        formClean();
        formData.attr("action", base_url+link+"/update");
        dataPilih = getDataPilih(id);
        setForm(dataPilih);
    }

    
    function formClean(){
        formData[0].reset();
        $("select[name='tb_rekening5_kode']").val('').trigger('change');
        $("select[name='tb_monev_lra_rek5_bulan']").val('').trigger('change');
        $("select[name='id_tb_sumber_dana']").val('').trigger('change');
    }

    function getDataPilih(id){
        dataPilih = {};
        let setKode = id.split("-");
        dataAll.forEach(element => {
            if(setKode[0] == element['tb_program_kode']
            && setKode[1] == element['tb_kegiatan_kode'] 
            && setKode[2] == element['tb_rekening3_kode']
            && setKode[3] == element['tb_rekening4_kode'] 
            && setKode[4] == element['tb_rekening5_kode']  ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("select[name='tb_rekening5_kode']").val(data['tb_rekening5_kode']).trigger('change');
        $("select[name='tb_monev_lra_rek5_bulan']").val(data['tb_monev_lra_rek5_bulan']).trigger('change');
        $("select[name='id_tb_sumber_dana']").val(data['id_tb_sumber_dana']).trigger('change');
        $("input[name='tb_monev_lra_rek5_anggaran']").val(data['tb_monev_lra_rek5_anggaran']);
        $("input[name='tb_monev_lra_rek5_realisasi']").val(data['tb_monev_lra_rek5_realisasi']);
        $("input[name='tb_monev_lra_rek5_fisik']").val(data['tb_monev_lra_rek5_fisik']);
        $("input[name='tb_monev_lra_rek5_pelaksana']").val(data['tb_monev_lra_rek5_pelaksana']);
        $("input[name='tb_monev_lra_rek5_lokasi']").val(data['tb_monev_lra_rek5_lokasi']);
        
    }
    
    formData.submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        myModalHide();
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){

                bulan = $("select[name='tb_monev_lra_rek5_bulan']").val();
                $("select[name='bulan']").val($("select[name='tb_monev_lra_rek5_bulan']").val()).trigger('change');
                getData();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

    function doDelete(id){
        
        let url = base_url+link+"/delete";
        let data = {
            kode : id,
        }
        myModalHide();
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
        });
    }

    function myModalHide(){
        $('.close').click(); 
    }



</script>
