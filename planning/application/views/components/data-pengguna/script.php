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
                    <input type="hidden" name="kode">
                    <div class="position-relative form-group">
                        <label>Username</label>
                        <input name="tb_user_username" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Password</label>
                        <input name="tb_user_password" type="password" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Nomor Hp</label>
                        <input name="tb_user_hp" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Level</label>
                        <select name="tb_user_level" class="form-control" required>
                            <option value="">-= Pilih Level =-</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">OPD</option>
                        </select>
                    </div>
                    <div class="position-relative form-group" id="input-opd">
                        <label>OPD</label>
                        <select name="opd" class="form-control select2" style="width: 100%" required>
                            <option value="">-= Pilih OPD =-</option>
                            <?php foreach(@$dataOpd as $row){ ?>
                                <option value="<?=$row['tb_urusan_kode']."-".$row['tb_bidang_kode']."-".$row['tb_unit_kode']."-".$row['tb_sub_unit_kode']?>"><?=$row['tb_sub_unit_nama']?></option>
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
    var kode;
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'pengaturan/data/pengguna';
    var page = 1;
    getData();
    
    function getData(_page = 1){
        page = _page;
        let url = base_url+link+"/get-data";
        let data = {
            page : page,
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
            kodeOneData = element['id_tb_user'];
            let namaLevel = '';
            if(parseInt(element['tb_user_level']) == 1){
                namaLevel = 'Super Admin';
            }else if(parseInt(element['tb_user_level']) == 2){
                namaLevel = 'Admin';
            }else if(parseInt(element['tb_user_level']) == 3){
                namaLevel = 'OPD ('+element['tb_sub_unit_nama']+')';
            }
            tempData = [
                no,
                element['tb_user_username'],
                element['tb_user_hp'],
                namaLevel,
                '<a class="btn btn-info"  href="#" onclick="setUpdate(\''+kodeOneData+'\')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>'+
                '<a class="btn btn-danger"  href="#"  data-setFunction="doDelete(\''+kodeOneData+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"><i class="fa fa-trash"></i></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate(){
        formData[0].reset();
        setFormInput('opd', false);
        formData.attr("action", base_url+link+"/create");
    }

    function setUpdate(id){
        formData[0].reset();
        setFormInput('opd', false);
        formData.attr("action", base_url+link+"/update");
        dataPilih = getDataPilih(id);
        setForm(dataPilih);
    }

    function getDataPilih(id){
        dataPilih = {};
        dataAll.forEach(element => {
            if(id == element['id_tb_user'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='tb_user_username']").val(data['tb_user_username']);
        $("input[name='tb_user_password']").val(data['tb_user_password']);
        $("input[name='tb_user_hp']").val(data['tb_user_hp']);
        $("select[name='tb_user_level']").val(data['tb_user_level']);
        if(parseInt(data['tb_user_level']) == 3){
            setFormInput('opd', true);
        }
        $("select[name='opd']").val(data['tb_urusan_kode']+'-'+data['tb_bidang_kode']+'-'+data['tb_unit_kode']+'-'+data['tb_sub_unit_kode']);
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


    function setFormInput(name, status, form = "select"){
        if(status){
            $("#input-"+name).show();
            $(form+"[name='"+name+"']").attr("autofocus", true);
            $(form+"[name='"+name+"']").attr("required", true);
        }else{
            $("#input-"+name).hide();
            $(form+"[name='"+name+"']").attr("autofocus", false);
            $(form+"[name='"+name+"']").attr("required", false);
        }
    }

    setFormInput('opd', false);
    $("select[name='tb_user_level']").change(function(){
        
        setFormInput('opd', false);
        if($(this).val() == 3){
            
            setFormInput('opd', true);
        }
    });

</script>
