<script>
    var link = "usulan/kegiatan";
    var myTable = $('#table-user').DataTable();
    var page = 1;
    var dataAll = [];
    var tahun = parseInt('<?=@$tahun?>');
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
    function replaceAll(str, find, replace) {
        return str.replace(new RegExp(escapeRegExp(find), 'g'), replace);
    }

    function setTable(data){
        myTable.clear();
        no = 1;
        data.forEach(element => {
            urlKode = element['bidang_kode']+'-'+element['sub_bidang_kode']+'-'+element['kegiatan_kode'];
            isiKode = urlKode.split("-").join(".");
            setKode = tahun+'-'+urlKode;
            if(element['jumlah_isi'] > 0){
                isi = "isi-ada";
            }else{
                isi = "isi-tidak-ada";
            }
            tempData = [
                no,
                isiKode,
                '<a href="'+base_url+'usulan/'+tahun+'/rincian/'+urlKode+'" class="'+isi+'">'+element['kegiatan_nama']+'</a>',
                element['opd_nama'],
                element['jenis_nama'],
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
                setKode[3] == element['kegiatan_kode']){
                dataPilih = element;
                console.log(dataPilih);
                // kode = element['tahun']+'-'+element['bidang_kode']+'-'+element['bidang_kode'];
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='kegiatan_nama']").val(data['kegiatan_nama']);
        $("input[name='kegiatan_kode']").val(data['kegiatan_kode']);
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

<script>
    var link2 = "usulan/kegiatan-penunjang";
    var myTable2 = $('#table-user2').DataTable();
    var page2 = 1;
    var dataAll2 = [];
    var tahun2 = parseInt('<?=@$tahun?>');
    var dataPilih2 = {};
    var kode2 = '<?=@$tahun."-".@$kode?>';
    var userLevel = <?=$_SESSION['level']?>;
    userLevel = parseInt(userLevel);
    var triwulan = 1;
    getData2();
    function getData2(_page = 1){
        page2 = _page;
        let url = base_url+link2+"/page-"+page2;
        let data = {
            page : page2,
            tahun : tahun2,
            kode : kode2,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                setTable2(respon.data);
                dataAll2 = respon.data;
            }else{

            }
        });
    }

    function setTable2(data){
        myTable2.clear();
        no = 1;
        data.forEach(element => {
            urlKode = element['bidang_kode']+'-'+element['sub_bidang_kode']+'-'+element['kegiatan_penunjang_kode'];
            isiKode = urlKode.split("-").join(".");
            setKode = tahun+'-'+urlKode;
            if(userLevel==4){
                setIsiTriwulan = '<a class="fa fa-file-text-o" style="padding:5px;" href="#" onclick="setTriwulan(\''+setKode+'\')" data-toggle="modal" data-target="#modal-triwulan" > </a>';
            }else{
                setIsiTriwulan = '';
            }

            if(parseInt(element['kegiatan_penunjang_jenis']) == 1){
                pagu = element['kegiatan_penunjang_swakelola_rp'];
                
            }else{
                pagu = element['kegiatan_penunjang_konstraktual_rp'];
            }

            uang = parseInt(element['kegiatan_penunjang_tw'+triwulan+'_keuangan_rp']);
            persen = (100*(uang/pagu));

            tempData = [
                no,
                isiKode,
                element['kegiatan_penunjang_nama'],
                element['kegiatan_penunjang_volume'],
                element['satuan_nama'],
                element['kegiatan_penunjang_penerima_manfaat'],
                'Rp. '+convertToRupiah(element['kegiatan_penunjang_pagu']),
                element['kegiatan_penunjang_swakelola_volume'],
                'Rp. '+convertToRupiah(element['kegiatan_penunjang_swakelola_rp']),
                element['kegiatan_penunjang_konstraktual_volume'],
                'Rp. '+convertToRupiah(element['kegiatan_penunjang_konstraktual_rp']),
                element['kegiatan_penunjang_pembayaran'],
                'Rp. '+convertToRupiah(element['kegiatan_penunjang_tw'+triwulan+'_keuangan_rp']),
                persen.toFixed(2),
                element['kegiatan_penunjang_tw'+triwulan+'_fisik_volume'],
                element['kegiatan_penunjang_tw'+triwulan+'_fisik_persen'],
                element['masalah_nama'],
                // element['kegiatan_penunjang_jenis'],
                setIsiTriwulan+
                // '<a class="fa fa-file-image-o" style="padding:5px;" href="#" onclick="setFile(\''+setKode+'\')" data-toggle="modal" data-target="#modal-file" > </a>'+
                '<a class="fa fa-pencil" style="padding:5px;" href="#" onclick="setUpdate2(\''+setKode+'\')" data-toggle="modal" data-target="#modal-form2" > </a>'+
                '<a class="fa fa-trash" style="padding:5px;" href="#"  data-setFunction="doDelete2(\''+setKode+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>',
            ]
            myTable2.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate2(){
        $("#form-action2")[0].reset();
        $("#form-action2").attr("action", base_url+link2+"/create")
    }

    function setUpdate2(id){
        $("#form-action2").attr("action", base_url+link2+"/update");
        
        dataPilih2 = getDataPilih2(id);
        setForm2(dataPilih2);
    }

    function getDataPilih2(id){
        dataPilih2 = {};
        setKode = id.split("-");
        dataAll2.forEach(element => {
            if(setKode[0] == element['tahun'] &&
                setKode[1] == element['bidang_kode'] &&
                setKode[2] == element['sub_bidang_kode'] &&
                setKode[3] == element['kegiatan_penunjang_kode']){
                dataPilih2 = element;
                kode2 = id;
            }
        });
        return dataPilih2;
    }

    function setForm2(data){
        setMekanisme(parseInt(data['kegiatan_penunjang_jenis']));
        $("input[name='kode2']").val(kode2);
        $("input[name='kegiatan_penunjang_kode']").val(data['kegiatan_penunjang_kode']);
        $("input[name='kegiatan_penunjang_nama']").val(data['kegiatan_penunjang_nama']);
        $("input[name='kegiatan_penunjang_volume']").val(data['kegiatan_penunjang_volume']);
        $("select[name='id_satuan']").val(data['id_satuan']);
        $("input[name='kegiatan_penunjang_penerima_manfaat']").val(data['kegiatan_penunjang_penerima_manfaat']);
        $("input[name='kegiatan_penunjang_pagu']").val(data['kegiatan_penunjang_pagu']);
        $("input[name='kegiatan_penunjang_swakelola_volume']").val(data['kegiatan_penunjang_swakelola_volume']);
        $("input[name='kegiatan_penunjang_swakelola_rp']").val(data['kegiatan_penunjang_swakelola_rp']);
        $("input[name='kegiatan_penunjang_konstraktual_volume']").val(data['kegiatan_penunjang_konstraktual_volume']);
        $("input[name='kegiatan_penunjang_konstraktual_rp']").val(data['kegiatan_penunjang_konstraktual_rp']);
        $("input[name='kegiatan_penunjang_pembayaran']").val(data['kegiatan_penunjang_pembayaran']);
        // $("input[name='kegiatan_penunjang_tw1_keuangan_rp']").val(data['kegiatan_penunjang_tw1_keuangan_rp']);
        // $("input[name='kegiatan_penunjang_tw1_fisik_volume']").val(data['kegiatan_penunjang_tw1_fisik_volume']);
        // $("input[name='kegiatan_penunjang_tw1_fisik_persen']").val(data['kegiatan_penunjang_tw1_fisik_persen']);
        $("select[name='kegiatan_penunjang_jenis']").val(data['kegiatan_penunjang_jenis']);
        $("select[name='id_masalah']").val(data['id_masalah']);
        $("select[name='id_jenis2']").val(data['id_jenis']);
    }

    function doDelete2(id){

        let url = base_url+link2+"/delete";
        let data = {
            kode : id,
        }
        $("#modal-pesan").modal("hide");
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData2();
                // message(respon.pesan);
            }
            // setPesanIsi("pesan-keluarga-anggota", respon.status, respon.pesan)
            // $("#pesan-no-kk").text(respon.pesan);
        });
    }

    $("#form-action2").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        $("#modal-form2").modal("hide");
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData2();
                $("#form-action2")[0].reset();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

    $("select[name='kegiatan_penunjang_jenis']").change(function(){
        setMekanisme(parseInt($(this).val()));
    });

    function setMekanisme(no){
        setInputForm('input', 'kegiatan_penunjang_swakelola_volume', false);
        setInputForm('input', 'kegiatan_penunjang_swakelola_rp', false);
        setInputForm('input', 'kegiatan_penunjang_konstraktual_volume', false);
        setInputForm('input', 'kegiatan_penunjang_konstraktual_rp', false);
        if(no == 1){
            setInputForm('input', 'kegiatan_penunjang_swakelola_volume', true);
            setInputForm('input', 'kegiatan_penunjang_swakelola_rp', true);
        }else if (no == 2){
            setInputForm('input', 'kegiatan_penunjang_konstraktual_volume', true);
            setInputForm('input', 'kegiatan_penunjang_konstraktual_rp', true);
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
        getData2();
    });

    function setTriwulan(kode){
        $('#form-triwulan')[0].reset();
        $("input[name='kode_triwulan']").val(kode);
        dataPilih = getDataPilih2(kode);
        $("select[name='triwulan']").val(triwulan);
        setInputTriwulan(triwulan);

        
        $("input[name='kegiatan_penunjang_tw"+triwulan+"_keuangan_rp']").val(dataPilih['kegiatan_penunjang_tw'+triwulan+'_keuangan_rp']);
        $("input[name='kegiatan_penunjang_tw"+triwulan+"_fisik_volume']").val(dataPilih['kegiatan_penunjang_tw'+triwulan+'_fisik_volume']);
        $("input[name='kegiatan_penunjang_tw"+triwulan+"_fisik_persen']").val(dataPilih['kegiatan_penunjang_tw'+triwulan+'_fisik_persen']);


        $("#paket-nama").val(dataPilih['kegiatan_penunjang_nama']);
    }

    $("#set-form-triwulan").hide();
    $("select[name='triwulan']").change(function(){
        let triwulan2 = $(this).val();
        setInputTriwulan(triwulan2);
    });

    function setInputTriwulan(triwulan2){
        if(triwulan2 > 0){
            $("#set-form-triwulan").show();
            $('#triwulan-keuangan').attr('name', 'kegiatan_penunjang_tw'+triwulan2+'_keuangan_rp');
            $('#triwulan-volume').attr('name', 'kegiatan_penunjang_tw'+triwulan2+'_fisik_volume');
            $('#triwulan-persen').attr('name', 'kegiatan_penunjang_tw'+triwulan2+'_fisik_persen');
        }else{
            $("#set-form-triwulan").hide();
        }
    }

    $("#form-triwulan").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = base_url+link2+"/triwulan";
        let data = form.serializeArray();
        $("#modal-triwulan").modal("hide");
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData2();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

</script>