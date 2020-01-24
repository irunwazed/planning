<script>
    var link = "data/pegawai";
    var myTable = $('#table-user').DataTable();
    var page = 1;
    var dataAll = [];
    getData();
    function getData(_page = 1){
        page = _page;

        let url = base_url+link+"/page-"+page;
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
        myTable.clear();
        no = 1;
        data.forEach(element => {
            
            tempData = [
                no,
                element['pegawai_nip'],
                element['pegawai_nama'],
                element['pegawai_username'],
                element['pegawai_email'],
                element['pegawai_no_hp'],
                '<a class="fa fa-child" style="padding:5px;" href="#" onclick="setPpk('+element['id_pegawai']+')" data-toggle="modal" data-target="#modal-ppk" > </a>'+
                '<a class="fa fa-pencil" style="padding:5px;" href="#" onclick="setUpdate('+element['id_pegawai']+')" data-toggle="modal" data-target="#modal-form" > </a>'+
                '<a class="fa fa-trash" style="padding:5px;" href="#"  data-setFunction="doDelete('+element['id_pegawai']+')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate(){
        $("#form-action")[0].reset();
        $("#form-action").attr("action", base_url+link+"/create")
    }

    function setUpdate(id){
        $("#form-action")[0].reset();
        $("#form-action").attr("action", base_url+link+"/update");
        
        dataPilih = getDataPilih(id);
        setForm(dataPilih);
    }

    function getDataPilih(id){
        dataPilih = {};
        dataAll.forEach(element => {
            if(id == element['id_pegawai']){
                dataPilih = element;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='id_pegawai']").val(data['id_pegawai']);
        $("input[name='pegawai_nip']").val(data['pegawai_nip']);
        $("input[name='pegawai_nama']").val(data['pegawai_nama']);
        $("input[name='pegawai_username']").val(data['pegawai_username']);
        $("input[name='pegawai_email']").val(data['pegawai_email']);
        $("input[name='pegawai_no_hp']").val(data['pegawai_no_hp']);
        $("input[name='pegawai_password']").val(data['pegawai_password']);
    }

    function doDelete(id){
        let url = base_url+link+"/delete";
        let data = {
            id_pegawai : id
        }
        $("#modal-pesan").modal("hide");
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
        });
    }

    $("#form-action").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        console.log("as");
        $("#modal-form").modal("hide");
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
                $("#form-action")[0].reset();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

    function setPpk(id){
        $("#form-ppk")[0].reset();
        $("input[name=ppk_id_pegawai]").val(id);
        getDataPpk();
    }


    $("select[name=tahun]").change(function(){
        getBidang($(this).val());
    });
    
    function getBidang(kode){
        let url = base_url+"data/get-bidang"
        let data ={
            tahun : kode,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            setBidang(respon.data);
        });
    }
    
    function setBidang(data){
        $("select[name=bidang]").empty();
        $("select[name=bidang]").append('<option value="">Pilih Bidang</option>');
        data.forEach(element => {
            setKode = element['tahun']+'-'+element['bidang_kode'];
            temp = '<option value="'+setKode+'">'+element['bidang_nama']+'</option>';
            $("select[name=bidang]").append(temp)
        });
    }

    $("select[name=bidang]").change(function(){
        getSubBidang($(this).val());
    });
    
    function getSubBidang(kode){
        let url = base_url+"data/get-sub-bidang"
        let data ={
            kode : kode,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            setSubBidang(respon.data);
        });
    }
    
    function setSubBidang(data){
        $("select[name=sub_bidang]").empty();
        $("select[name=sub_bidang]").append('<option value="">Pilih Sub Bidang</option>');
        data.forEach(element => {
            setKode = element['tahun']+'-'+element['bidang_kode']+'-'+element['sub_bidang_kode'];
            temp = '<option value="'+setKode+'">'+element['sub_bidang_nama']+'</option>';
            $("select[name=sub_bidang]").append(temp)
        });
    }

    $("#form-ppk").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = base_url+link+"/set-ppk";
        let data = form.serializeArray();
        // $("#modal-form").modal("hide");
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getDataPpk();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

    function getDataPpk(){
        let url = base_url+"data/get-ppk";
        let data = {
            id_pegawai : $('input[name=ppk_id_pegawai]').val(),
        };
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                setTablePpk(respon.data);
            }
        });
    }

    myTablePpk = $('#table-ppk').DataTable();
    function setTablePpk(data){
        myTablePpk.clear().draw();
        no = 1;
        data.forEach(element => {
            tempData = [
                no,
                element['tahun'],
                element['bidang_nama'],
                element['sub_bidang_nama'],
                element['jenis_nama'],
                '<a class="fa fa-trash" style="padding:5px;" href="#"  data-setFunction="doDeletePpk('+element['id_pegawai_ppk']+')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>',
            ]
            myTablePpk.row.add(tempData).draw(  );
            no++;
        });
    }

    function doDeletePpk(id){
        let url = base_url+link+"/delete-ppk";
        let data = {
            id_pegawai_ppk : id
        }
        $("#modal-pesan").modal("hide");
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getDataPpk();
            }
        });
    }

</script>