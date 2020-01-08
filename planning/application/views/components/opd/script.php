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
                        <label>OPD</label>
                        <select name="opd" class="form-control" required>
                            <option value="">-= Pilih OPD =-</option>
                            <?php foreach($dataOpd as $row){ ?>
                                <option value="<?=$row['tb_urusan_kode'].'-'.$row['tb_bidang_kode'].'-'.$row['tb_unit_kode'].'-'.$row['tb_sub_unit_kode']?>"><?=$row['tb_sub_unit_nama']?></option>
                            <?php } ?>
                        </select>
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
    var kode = '<?=$kode?>';
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'rpjmd/penyusunan/opd';
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
                        +'-'+element['tb_sub_unit_kode'];
            kodeShow = element['tb_urusan_kode']
                        +'.'+element['tb_bidang_kode']
                        +'.'+element['tb_unit_kode']
                        +'.'+element['tb_sub_unit_kode'];
            tempData = [
                no,
                kodeShow,
                '<a href="'+base_url+'rpjmd/penyusunan/program/'+kodeOneData+'">'+element['tb_sub_unit_nama']+'</a>',
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
            && setKode[6] == element['tb_sub_unit_kode'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        let setKode = kode.split("-");
        $("select[name='opd']").val(setKode[3]+'-'+setKode[4]+'-'+setKode[5]+'-'+setKode[6]);
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
