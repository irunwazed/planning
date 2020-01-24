<script>

    var myTable = $('#table-user').DataTable();
    var page = 1;
    var dataAll = [];
    getData();
    function getData(_page = 1){
        page = _page;
        let url = base_url+"data/pengaturan/keluarga/page-"+page;
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
            if(element['jenis_kelamin'] == 1){
                jk = "Laki - Laki";
            }else{
                jk = "Perempuan";
            }
            tempData = [
                no,
                element['no_kk'],
                element['nik'],
                element['penduduk_nama'],
                jk,
                element['umur'],
                '<a class="fa fa-search" style="padding:5px;" href="'+base_url+'entry?no_kk='+element['no_kk']+'"  > </a>'+
                '<a class="fa fa-pencil" style="padding:5px;" href="#" onclick="setUpdate('+element['no_kk']+')" data-toggle="modal" data-target="#modal-form" > </a>'+
                '<a class="fa fa-trash" style="padding:5px;" href="#"  data-setFunction="doDelete('+element['no_kk']+')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate(){
        $("#form-action").attr("action", base_url+"data/pengaturan/keluarga/create")
    }

    function setUpdate(id){
        $("#form-action").attr("action", base_url+"data/pengaturan/keluarga/update");
        $("input[name='no_kk']").val(id);
        cariKK(id);
    }


    function doDelete(id){
        let url = base_url+"data/pengaturan/keluarga/delete";
        let data = {
            no_kk : id
        }
        $("#modal-pesan").modal("hide");
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
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
            getData();
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });
    
    function cariKK(id){
        let no_kk = id;
        let url = base_url+"data/cek/no-kk";
        let data = {
            no_kk: no_kk,
            tahun: 2019,
        }
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                setPenduduk(respon.data);
            }else{
                
            }
            // setPesanIsi("pesan-no-kk", respon.status, respon.pesan)
            // $("#pesan-no-kk").text(respon.pesan);

        });
    }

    function setPenduduk(data){
        // $("select[name='nik_kepala']").empty().append('<option value="">Pilih NIK</option>');
        $("select[name='nik_kepala']").empty();
        data.forEach(element => {
            
            $("select[name='nik_kepala']").append('<option value="'+element['nik']+'" >'+element['penduduk_nama']+'</option>');
        });
    }

</script>