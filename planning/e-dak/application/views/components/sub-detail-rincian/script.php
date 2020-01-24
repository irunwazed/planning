<script>
    var link = "usulan/sub-detail-rincian";
    var myTable = $('#table-user').DataTable();
    var page = 1;
    var dataAll = [];
    var tahun = '<?=@$tahun?>';
    var dataPilih = {};
    var kode = '<?=@$tahun."-".@$kode?>';
    var triwulan = '1';
    getData();
    function getData(_page = 1){
        page = _page;
        let url = base_url+link+"/page-"+page;
        let data = {
            page : page,
            tahun : tahun,
            kode : kode,
            triwulan : triwulan,
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
            pagu = parseInt(element['sub_detail_rincian_pagu']);
            uang = parseInt(element['sub_detail_rincian_keuangan']);
            urlKode = element['bidang_kode']+'-'+element['sub_bidang_kode']+'-'+element['kegiatan_kode']+'-'+element['rincian_kode']+'-'+element['detail_rincian_kode'];
            isiKode = urlKode.split("-").join(".");
            setKode = tahun+'-'+urlKode;
            tempData = [
                no,
                isiKode,
                element['sub_detail_rincian_nama'],
                element['sub_detail_rincian_volume'],
                element['satuan_nama'],
                element['sub_detail_rincian_penerima'],
                convertToRupiah(element['sub_detail_rincian_pagu']),
                convertToRupiah(element['sub_detail_rincian_swakelola']),
                convertToRupiah(element['sub_detail_rincian_kontrak']),
                element['sub_detail_rincian_pembayaran'],
                convertToRupiah(element['sub_detail_rincian_keuangan']),
                100*(uang/pagu),
                element['sub_detail_rincian_fisik_volume'],
                '%',
                element['masalah_nama'],
                '<a class="fa fa-pencil" style="padding:5px;" href="#" onclick="setUpdate(\''+element['id_sub_detail_rincian']+'\')" data-toggle="modal" data-target="#modal-form" > </a>'+
                '<a class="fa fa-trash" style="padding:5px;" href="#"  data-setFunction="doDelete(\''+element['id_sub_detail_rincian']+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate(){
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
            if(setKode[0] == element['id_sub_detail_rincian'] ){
                dataPilih = element;
                kode = tahun+'-'+element['bidang_kode']+'-'+element['sub_bidang_kode']+'-'+element['kegiatan_kode']+'-'+element['rincian_kode']+'-'+element['detail_rincian_kode'];
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='id_sub_detail_rincian']").val(data['id_sub_detail_rincian']);
        $("select[name='sub_detail_rincian_triwulan']").val(data['sub_detail_rincian_triwulan']);
        $("input[name='sub_detail_rincian_nama']").val(data['sub_detail_rincian_nama']);
        $("input[name='sub_detail_rincian_volume']").val(data['sub_detail_rincian_volume']);
        $("select[name='id_satuan']").val(data['id_satuan']);
        $("input[name='sub_detail_rincian_penerima']").val(data['sub_detail_rincian_penerima']);
        $("input[name='sub_detail_rincian_pagu']").val(data['sub_detail_rincian_pagu']);
        $("input[name='sub_detail_rincian_swakelola']").val(data['sub_detail_rincian_swakelola']);
        $("input[name='sub_detail_rincian_kontrak']").val(data['sub_detail_rincian_kontrak']);
        $("input[name='sub_detail_rincian_pembayaran']").val(data['sub_detail_rincian_pembayaran']);
        $("input[name='sub_detail_rincian_keuangan']").val(data['sub_detail_rincian_keuangan']);
        $("input[name='sub_detail_rincian_fisik_volume']").val(data['sub_detail_rincian_fisik_volume']);
        $("select[name='id_masalah']").val(data['id_masalah']);
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
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });


</script>