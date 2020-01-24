<script>
    var link = "usulan/bidang";
    var myTable = $('#table-user').DataTable();
    var page = 1;
    var dataAll = [];
    var tahun = parseInt('<?=@$tahun?>');
    var levelUser = parseInt('<?=@$_SESSION["level"]?>');
    var dataPilih = {};
    var kode;
    var triwulan = 1;
    getData();
    function getData(_page = 1){
        page = _page;
        let url = base_url+link+"/page-"+page;
        let data = {
            page : page,
            tahun : tahun,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                setTable(respon.data);
                dataAll = respon.data;
            }else{

            }
        });
    }
    $("#verifikator-bappeda").hide();
    function setTable(data){
        myTable.clear();
        no = 1;
        let statusVeri = true;
        data.forEach(element => {
            urlKode = element['bidang_kode'];
            setKode = tahun+'-'+urlKode;
            if(element['jumlah_isi'] > 0){
                isi = "isi-ada";
            }else{
                isi = "isi-tidak-ada";
            }

            // if(element['bidang_verifikasi'] != 1){
            //     statusVeri = false;
            // }

            if(levelUser == 3){
                if(element['bidang_verifikasi'] == 1){
                    veri = '<button class="btn btn-danger" onclick="setVerifikasi(\''+setKode+'\', 2)">Tolak</button> Telah Diterima';
                }else if(element['bidang_verifikasi'] == 2){
                    veri = '<button class="btn btn-success" onclick="setVerifikasi(\''+setKode+'\', 1)">Terima</button> Telah Ditolak';
                }else{
                    veri = '<button class="btn btn-success" onclick="setVerifikasi(\''+setKode+'\', 1)">Terima</button><button class="btn btn-danger" onclick="setVerifikasi(\''+setKode+'\', 2)">Tolak</button>';
                }
            }else if(levelUser == 2){
                if(element['bidang_verifikasi_bappeda'] == 1){
                    veri = '<button class="btn btn-danger" onclick="setVeriBappeda(\''+setKode+'\', 2)">Tolak</button> Telah Diterima';
                }else if(element['bidang_verifikasi_bappeda'] == 2){
                    veri = '<button class="btn btn-success" onclick="setVeriBappeda(\''+setKode+'\', 1)">Terima</button> Telah Ditolak';
                }else{
                    veri = '<button class="btn btn-success" onclick="setVeriBappeda(\''+setKode+'\', 1)">Terima</button><button class="btn btn-danger" onclick="setVerifikasi(\''+setKode+'\', 2)">Tolak</button>';
                }
            }else{
                veri = '';
            }
            veri = '';

            tempData = [
                no,
                element['bidang_kode'],
                '<a href="'+base_url+'usulan/'+tahun+'/sub-bidang/'+urlKode+'" class="'+isi+'">'+element['bidang_nama']+'</a>',
                veri,
                '<a class="fa fa-pencil" style="padding:5px;" href="#" onclick="setUpdate(\''+setKode+'\')" data-toggle="modal" data-target="#modal-form" > </a>'+
                '<a class="fa fa-trash" style="padding:5px;" href="#"  data-setFunction="doDelete(\''+setKode+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });

        if(statusVeri && levelUser == 2 && data.length > 0){
            // $("#verifikator-bappeda").show();
        }

    }

    function setVeriBappeda(id, status){
        let url = base_url+link+"/set-verifikasi-bappeda";
        let data = {
            kode : id,
            status : status
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
        });
    }

    function setVerifikasi(id, status){
        let url = base_url+link+"/set-verifikasi-bidang";
        console.log(id);
        let data = {
            kode : id,
            status : status
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
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
                setKode[1] == element['bidang_kode']){
                dataPilih = element;
                kode = element['tahun']+'-'+element['bidang_kode'];
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("select[name='id_indikator']").val(data['id_indikator']);
        $("input[name='bidang_nama']").val(data['bidang_nama']);
        $("input[name='bidang_kode']").val(data['bidang_kode']);
        $("input[name='tahun']").val(data['tahun']);
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

    $("select[name='triwulan']").change(function(){
        triwulan = $(this).val();
        console.log(triwulan);
    });

    function tandaTangan(){
        let url = base_url+link+"/set-ttd";
        let data = {
            bidang: 1,
            triwulan: triwulan,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
        });
    }


</script>