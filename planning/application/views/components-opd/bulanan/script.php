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
                        <label>Tahun</label>
                        <select name="tb_monev_bulanan_tahun" class="form-control" required>
                            <option value="">-= Pilih Tahun =-</option>
                            <?php for($i = 1; $i <= 5; $i++){ ?>
                                <option value="<?=$i?>"><?=@$dataRpjmd->tb_rpjmd_tahun+$i-1?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label>Bulan</label>
                        <select name="tb_monev_bulanan_bulan" class="form-control" required>
                            <option value="">-= Pilih Bulan =-</option>
                            <?php for($i = 1; $i <= 12; $i++){ ?>
                                <option value="<?=$i?>"><?=$i?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label>Kinerja</label>
                        <input name="tb_monev_bulanan_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Anggaran</label>
                        <input name="tb_monev_bulanan_anggaran" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Realisasi</label>
                        <input name="tb_monev_bulanan_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Fisik</label>
                        <input name="tb_monev_bulanan_fisik" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Pelaksana</label>
                        <input name="tb_monev_bulanan_pelaksana" type="text" class="form-control" required>
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
    var tahun = '<?=@$dataRpjmd->tb_rpjmd_tahun?>';
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'renstra/penyusunan/bulanan';
    var page = 1;
    getData();

    function getData(_page = 1){
        page = _page;
        let url = base_url+link+"/get-data";
        let data = {
            page : page,
            kode : kode,
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
        data.forEach(element => {
            kodeOneData = element['tb_rpjmd_misi_kode']
                        +'-'+element['tb_rpjmd_tujuan_kode']
                        +'-'+element['tb_rpjmd_sasaran_kode']
                        +'-'+element['tb_urusan_kode']
                        +'-'+element['tb_bidang_kode']
                        +'-'+element['tb_unit_kode']
                        +'-'+element['tb_sub_unit_kode']
                        +'-'+element['tb_program_kode']
                        +'-'+element['tb_kegiatan_kode']
                        +'-'+element['tb_monev_bulanan_kode'];
            kodeShow =  element['tb_monev_bulanan_kode'];
            let setTahun = parseInt(tahun)+parseInt(element['tb_monev_bulanan_tahun'])-1;
            tempData = [
                no,
                setTahun,
                element['tb_monev_bulanan_bulan'],
                element['tb_monev_bulanan_kinerja'],
                convertToRupiah(element['tb_monev_bulanan_anggaran']),
                convertToRupiah(element['tb_monev_bulanan_realisasi']),
                element['tb_monev_bulanan_fisik'],
                element['tb_monev_bulanan_pelaksana'],
                '<a class="btn btn-info"  href="#" onclick="setUpdate(\''+kodeOneData+'\')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>'+
                '<a class="btn btn-danger"  href="#"  data-setFunction="doDelete(\''+kodeOneData+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"><i class="fa fa-trash"></i></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate(){
        formData[0].reset();
        formData.attr("action", base_url+link+"/create");
    }

    function setUpdate(id){
        formData[0].reset();
        formData.attr("action", base_url+link+"/update");
        dataPilih = getDataPilih(id);
        setForm(dataPilih);
    }

    function getDataPilih(id){
        dataPilih = {};
        let setKode = id.split("-");
        dataAll.forEach(element => {
            if(setKode[0] == element['tb_rpjmd_misi_kode'] 
            && setKode[1] == element['tb_rpjmd_tujuan_kode']
            && setKode[2] == element['tb_rpjmd_sasaran_kode'] 
            && setKode[3] == element['tb_urusan_kode'] 
            && setKode[4] == element['tb_bidang_kode'] 
            && setKode[5] == element['tb_unit_kode'] 
            && setKode[6] == element['tb_sub_unit_kode']
            && setKode[7] == element['tb_program_kode'] 
            && setKode[8] == element['tb_kegiatan_kode']
            && setKode[9] == element['tb_monev_bulanan_kode'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("select[name='tb_monev_bulanan_tahun']").val(data['tb_monev_bulanan_tahun']);
        $("select[name='tb_monev_bulanan_bulan']").val(data['tb_monev_bulanan_bulan']);
        $("input[name='tb_monev_bulanan_kinerja']").val(data['tb_monev_bulanan_kinerja']);
        $("input[name='tb_monev_bulanan_anggaran']").val(data['tb_monev_bulanan_anggaran']);
        $("input[name='tb_monev_bulanan_realisasi']").val(data['tb_monev_bulanan_realisasi']);
        $("input[name='tb_monev_bulanan_fisik']").val(data['tb_monev_bulanan_fisik']);
        $("input[name='tb_monev_bulanan_pelaksana']").val(data['tb_monev_bulanan_pelaksana']);
    }
    
    formData.submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        myModalHide();
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
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
