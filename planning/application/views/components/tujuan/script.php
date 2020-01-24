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
                    <input type="hidden" name="kode" value="<?=$kode?>">
                    <div class="position-relative form-group">
                        <label>Kode Tujuan</label>
                        <input name="tb_rpjmd_tujuan_kode" type="number" class="form-control col-sm-2" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Tujuan</label>
                        <input name="tb_rpjmd_tujuan_nama" type="text" class="form-control" required>
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

<!-- Indikator modal -->
<div class="modal fade bd-example-modal-lg" id="modal-indikator" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Form <?=@$judul?> Indikator</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-indikator" action="<?=base_url()?>rpjmd/penyusunan/tujuan/indikator">
                    <input type="hidden" name="kode-indikator" value="<?=$kode?>">
                    <div class="position-relative form-group">
                        <a href="javascript:void(0);" onclick="addIndikator()" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                    </div>
                    <div id="isi-indikator">
                        <div class="form-group" id="indikator-input-1">
                            <label>Indikator</label>
                            <div class="row">
                                <div class="col-12">
                                    <input name="tb_rpjmd_tujuan_indikator_nama[]" type="text" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="form-indikator">Simpan</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function() {
        
    } );
    var dataAll;
    var dataPilih;
    var kode = '<?=$kode?>';
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'rpjmd/penyusunan/tujuan';
    var page = 1;
    var indexIndikator = 1;
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
        let indikatorArr = '';
        let indikatorIndex = 1;
        data.forEach(element => {
            indikatorIndex = 1;
            element['indikator'].forEach(row =>{
                indikatorArr += '<div>'+(element['indikator'].length>1?indikatorIndex+'.) ':'')+row['tb_rpjmd_tujuan_indikator_nama']+'</div>';
                indikatorIndex++;
            });

            kodeOneData = element['tb_rpjmd_misi_kode']+'-'+element['tb_rpjmd_tujuan_kode'];
            kodeShow = element['tb_rpjmd_tujuan_kode'];
            tempData = [
                no,
                kodeShow,
                '<a href="'+base_url+'rpjmd/penyusunan/sasaran/'+kodeOneData+'">'+element['tb_rpjmd_tujuan_nama']+'</a>',
                '<div>'+
                    '<a href="javascript:void(0);" onclick="setIndikator(\''+kodeOneData+'\')" data-toggle="modal" data-target="#modal-indikator"><i class="fa fa-cogs"></i></a>'+
                '</div>'+
                '<div id="indikator-'+kodeOneData+'">'+
                indikatorArr+
                '</div>',
                '<a class="btn btn-info"  href="javascript:void(0);" onclick="setUpdate(\''+kodeOneData+'\')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>'+
                '<a class="btn btn-danger"  href="javascript:void(0);"  data-setFunction="doDelete(\''+kodeOneData+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"><i class="fa fa-trash"></i></a>',
            ]
            myTable.row.add(tempData).draw(  );
            indikatorArr = '';
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
            && setKode[1] == element['tb_rpjmd_tujuan_kode'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }
    
    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='tb_rpjmd_tujuan_kode']").val(data['tb_rpjmd_tujuan_kode']);
        $("input[name='tb_rpjmd_tujuan_nama']").val(data['tb_rpjmd_tujuan_nama']);
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

    function setIndikator(id){
        indexIndikator = 1;
        getDataPilih(id);
        setIsiIndikator();
        if(dataPilih['indikator'].length > 0){
            isiIndikator(indexIndikator, dataPilih['indikator'][0]['tb_rpjmd_tujuan_indikator_nama']);
        }
        for(let i = 1; i < dataPilih['indikator'].length; i++){
            addIndikator();
            isiIndikator(indexIndikator, dataPilih['indikator'][i]['tb_rpjmd_tujuan_indikator_nama']);
        }
        $("input[name='kode-indikator']").val(id);
    }

    function setIsiIndikator(){
        let frame = $("#isi-indikator");
        let isi =   '<div class="form-group" id="indikator-input-'+indexIndikator+'">'+
                        '<label>Indikator</label>'+
                        '<div class="row">'+
                            '<div class="col-12">'+
                                '<input name="tb_rpjmd_tujuan_indikator_nama[]" id="indikator-'+indexIndikator+'" type="text" class="form-control" required>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
        frame.empty();
        frame.append(isi);
    }

    function addIndikator(){
        let frame = $("#isi-indikator");
        indexIndikator++;
        let isi =   '<div class="form-group" id="indikator-input-'+indexIndikator+'">'+
                        '<label>Indikator</label>'+
                        '<div class="row">'+
                            '<div class="col-11">'+
                                '<input name="tb_rpjmd_tujuan_indikator_nama[]" id="indikator-'+indexIndikator+'" type="text" class="form-control" required>'+
                            '</div>'+
                            '<div class="col-1">'+
                                '<a href="javascript:void(0);" onclick="deleteIndikator(\''+indexIndikator+'\')" class="btn btn-primary"><i class="fa fa-minus"></i></a>'+
                            '</div>'+
                        '</div>'+
                    '</div>';
        frame.append(isi);
    }

    function isiIndikator(id, val){
        $("#indikator-"+id).val(val);

    }

    function deleteIndikator(id){
        $("#indikator-input-"+id).empty();
    }

    $("#form-indikator").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        myModalHide();
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
        });
    });


</script>
