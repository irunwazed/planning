<script>
    var link = "usulan/detail-rincian";
    var myTable = $('#table-user').DataTable();
    var page = 1;
    var dataAll = [];
    var tahun = parseInt('<?=@$tahun?>');
    var dataPilih = {};
    var kode = '<?=@$tahun."-".@$kode?>';
    var triwulan = 1;
    var userLevel = <?=$_SESSION['level']?>;
    userLevel = parseInt(userLevel);

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

    function ceklis(no, verifikasi = false){
        let ico = '<i class="fa fa-close"></i>';

        if(no == 1){
            ico = '<i class="fa fa-check"></i>';
        }
        if(verifikasi){
            ico = '<a href="#">'+ico+'</a>';
        }

        return ico;
    }
    

    function setTable(data){
        myTable.clear();
        no = 1;
        data.forEach(element => {

            // pagu = parseInt(element['detail_rincian_pagu']);
            if(element['detail_rincian_pelaksanaan_jenis'] == 1){
                pagu = element['detail_rincian_swakelola_rp'];
            }else{
                pagu = element['detail_rincian_konstraktual_rp'];
            }
            uang = parseInt(element['detail_rincian_tw'+triwulan+'_keuangan_rp']);
            persen = (100*(uang/pagu));

            if(element['detail_rincian_cost'] == null){
                element['detail_rincian_cost'] = 0;
            }
            if(element['detail_rincian_nilai'] == null){
                element['detail_rincian_nilai'] = 0;
            }
            if(element['pegawai_nama'] == null){
                element['pegawai_nama'] = '';
            }
            urlKode = element['bidang_kode']+'-'+element['sub_bidang_kode']+'-'+element['kegiatan_kode']+'-'+element['rincian_kode']+'-'+element['detail_rincian_kode'];
            isiKode = urlKode.split("-").join(".");
            setKode = tahun+'-'+urlKode;
            if(userLevel==4){
                setIsiTriwulan = '<a class="fa fa-file-text-o" style="padding:5px;" href="#" onclick="setTriwulan(\''+setKode+'\')" data-toggle="modal" data-target="#modal-triwulan" > </a>';
            }else{
                setIsiTriwulan = '';
            }
            

            tempData = [
                no,
                isiKode,
                element['detail_rincian_nama'],
                element['detail_rincian_volume'],
                element['satuan_nama'],
                element['detail_rincian_penerima_manfaat'],
                'Rp '+convertToRupiah(element['detail_rincian_pagu']),
                element['detail_rincian_swakelola_volume'],
                'Rp '+convertToRupiah(element['detail_rincian_swakelola_rp']),
                element['detail_rincian_konstraktual_volume'],
                'Rp '+convertToRupiah(element['detail_rincian_konstraktual_rp']),
                element['detail_rincian_pembayaran'],
                'Rp '+convertToRupiah(element['detail_rincian_tw'+triwulan+'_keuangan_rp']),
                persen.toFixed(2),
                element['detail_rincian_tw'+triwulan+'_fisik_volume'],
                element['detail_rincian_tw'+triwulan+'_fisik_persen'],
                element['masalah_nama'], 
                setIsiTriwulan+
                // '<a class="fa fa-file-image-o" style="padding:5px;" href="#" onclick="setFile(\''+setKode+'\')" data-toggle="modal" data-target="#modal-file" > </a>'+
                '<a class="fa fa-pencil" style="padding:5px;" href="#" onclick="setUpdate(\''+setKode+'\')" data-toggle="modal" data-target="#modal-form" > </a>'+
                '<a class="fa fa-trash" style="padding:5px;" href="#"  data-setFunction="doDelete(\''+setKode+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>',
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
                setKode[4] == element['rincian_kode'] &&
                setKode[5] == element['detail_rincian_kode']){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='detail_rincian_kode']").val(data['detail_rincian_kode']);
        $("input[name='detail_rincian_nama']").val(data['detail_rincian_nama']);
        $("input[name='detail_rincian_volume']").val(data['detail_rincian_volume']);
        $("select[name='id_satuan']").val(data['id_satuan']);
        $("input[name='detail_rincian_penerima_manfaat']").val(data['detail_rincian_penerima_manfaat']);
        $("input[name='detail_rincian_pagu']").val(data['detail_rincian_pagu']);
        $("input[name='detail_rincian_swakelola_volume']").val(data['detail_rincian_swakelola_volume']);
        $("input[name='detail_rincian_swakelola_rp']").val(data['detail_rincian_swakelola_rp']);
        $("input[name='detail_rincian_konstraktual_volume']").val(data['detail_rincian_konstraktual_volume']);
        $("input[name='detail_rincian_konstraktual_rp']").val(data['detail_rincian_konstraktual_rp']);
        $("input[name='detail_rincian_pembayaran']").val(data['detail_rincian_pembayaran']);
        // $("input[name='kegiatan_penunjang_tw1_keuangan_rp']").val(data['kegiatan_penunjang_tw1_keuangan_rp']);
        // $("input[name='kegiatan_penunjang_tw1_fisik_volume']").val(data['kegiatan_penunjang_tw1_fisik_volume']);
        // $("input[name='kegiatan_penunjang_tw1_fisik_persen']").val(data['kegiatan_penunjang_tw1_fisik_persen']);
        $("select[name='detail_rincian_pelaksanaan_jenis']").val(data['detail_rincian_pelaksanaan_jenis']);
        $("select[name='id_masalah']").val(data['id_masalah']);
        setMekanisme(parseInt(data['detail_rincian_pelaksanaan_jenis']));
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

    function setPpk(kode_ppk){
        $("input[name='kode_ppk']").val(kode_ppk);
    }
    
    $("#form-ppk").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = base_url+"data/set-ppk";
        let data = form.serializeArray();
        $("#modal-ppk").modal("hide");
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

    function setFile(kode_file){
        $("input[name='kode_file']").val(kode_file);
    }

    $("#form-file").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = base_url+link+"/file";
        let data = form.serializeArray();
        $("#modal-ppk").modal("hide");
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

    $("select[name='detail_rincian_pelaksanaan_jenis']").change(function(){
        setMekanisme(parseInt($(this).val()));
    });

    function setMekanisme(no){
        setInputForm('input', 'detail_rincian_swakelola_volume', false);
        setInputForm('input', 'detail_rincian_swakelola_rp', false);
        setInputForm('input', 'detail_rincian_konstraktual_volume', false);
        setInputForm('input', 'detail_rincian_konstraktual_rp', false);
        if(no == 1){
            setInputForm('input', 'detail_rincian_swakelola_volume', true);
            setInputForm('input', 'detail_rincian_swakelola_rp', true);
        }else if (no == 2){
            setInputForm('input', 'detail_rincian_konstraktual_volume', true);
            setInputForm('input', 'detail_rincian_konstraktual_rp', true);
        }
    }

    function setInputForm(jenis = "input", name= "", status){
        if(status){
            $(jenis+'[name='+name+']').attr('required', true);
            $(jenis+'[name='+name+']').attr('autofocus', true);
            $(jenis+'[name='+name+']').attr('disabled', false);
            $('#'+name).show();
        }else{
            $(jenis+'[name='+name+']').attr('required', false);
            $(jenis+'[name='+name+']').attr('autofocus', false);
            $(jenis+'[name='+name+']').attr('disabled', true);
            $('#'+name).hide();
        }
    }

    $("#pilih-triwulan").change(function(){
        triwulan = $(this).val();
        getData();
    });

    function setTriwulan(kode){
        $('#form-triwulan')[0].reset();
        $("input[name='kode_triwulan']").val(kode);
        $("select[name='triwulan']").val(triwulan);
        setInputTriwulan(triwulan);
        dataPilih = getDataPilih(kode);

        $("input[name='detail_rincian_tw"+triwulan+"_keuangan_rp']").val(dataPilih['detail_rincian_tw'+triwulan+'_keuangan_rp']);
        $("input[name='detail_rincian_tw"+triwulan+"_fisik_volume']").val(dataPilih['detail_rincian_tw'+triwulan+'_fisik_volume']);
        $("input[name='detail_rincian_tw"+triwulan+"_fisik_persen']").val(dataPilih['detail_rincian_tw'+triwulan+'_fisik_persen']);

        $("#paket-nama").val(dataPilih['detail_rincian_nama']);
    }

    $("#set-form-triwulan").hide();
    $("select[name='triwulan']").change(function(){
        let triwulan2 = $(this).val();
        setInputTriwulan(triwulan2);
    });

    function setInputTriwulan(triwulan2){
        if(triwulan2 > 0){
            $("#set-form-triwulan").show();
            $('#triwulan-keuangan').attr('name', 'detail_rincian_tw'+triwulan2+'_keuangan_rp');
            $('#triwulan-volume').attr('name', 'detail_rincian_tw'+triwulan2+'_fisik_volume');
            $('#triwulan-persen').attr('name', 'detail_rincian_tw'+triwulan2+'_fisik_persen');
        }else{
            $("#set-form-triwulan").hide();
        }
    }

    $("#form-triwulan").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = base_url+link+"/triwulan";
        let data = form.serializeArray();
        $("#modal-triwulan").modal("hide");
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

</script>