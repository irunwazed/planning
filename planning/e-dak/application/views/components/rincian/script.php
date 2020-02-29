<script>
    var link = "usulan/rincian";
    var myTable = $('#table-user').DataTable();
    var page = 1;
    var dataAll = [];
    var tahun = parseInt('<?=@$tahun?>');
    var levelUser = parseInt('<?=@$_SESSION["level"]?>');
    var dataPilih = {};
    var kode = '<?=@$tahun."-".@$kode?>';
    getData();
    function getData(_page = 1){
        page = _page;
        let url = base_url+link+"/page-"+page;
        let data = {
            page : page,
            tahun : tahun,
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
        myTable.clear();
        no = 1;
        data.forEach(element => {
            urlKode = element['bidang_kode']+'-'+element['sub_bidang_kode']+'-'+element['kegiatan_kode']+'-'+element['rincian_kode'];
            isiKode = urlKode.split("-").join(".");
            setKode = tahun+'-'+urlKode;
            if(element['jumlah_isi'] > 0){
                isi = "isi-ada";
            }else{
                isi = "isi-tidak-ada";
            }

            action = '';
            if(levelUser == 1){
                action = '<a class="fa fa-pencil" style="padding:5px;" href="#" onclick="setUpdate(\''+setKode+'\')" data-toggle="modal" data-target="#modal-form" > </a>'+
                '<a class="fa fa-trash" style="padding:5px;" href="#"  data-setFunction="doDelete(\''+setKode+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>';
            }

            tempData = [
                no,
                isiKode,
                '<a href="'+base_url+'usulan/'+tahun+'/detail-rincian/'+urlKode+'" class="'+isi+'">'+element['rincian_nama']+'</a>',
                '',
                action,
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
        $("#form-action").attr("action", base_url+link+"/update");
        
        dataPilih = getDataPilih(id);
        setForm(dataPilih);
    }

    function getDataPilih(id){
        dataPilih = {};
        setKode = id.split("-");
        dataAll.forEach(element => {
            if(setKode[0] == element['tahun'] &&
                setKode[1] == element['bidang_kode'] &&
                setKode[2] == element['sub_bidang_kode'] &&
                setKode[3] == element['kegiatan_kode'] &&
                setKode[4] == element['rincian_kode']){
                dataPilih = element;
                console.log(dataPilih);
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='rincian_nama']").val(data['rincian_nama']);
        $("input[name='rincian_kode']").val(data['rincian_kode']);
    }

    function doDelete(id){

        let url = base_url+link+"/delete";
        let data = {
            kode : id,
        }
        $("#modal-pesan").modal("hide");
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
                // message(respon.pesan);
            }
            // setPesanIsi("pesan-keluarga-anggota", respon.status, respon.pesan)
            // $("#pesan-no-kk").text(respon.pesan);
        });
    }

    $("#form-action").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        $("#modal-form").modal("hide");
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
                $("#form-action")[0].reset();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });


</script>