



<script>

    // console.log("sfd");
    var tableProgramTerima = $('#table-program-terima').DataTable()
    $('#table-program-harap').DataTable()
    $('#table-program-akan').DataTable()

    var dataAnggotaKeluarga = [];
    var dataAnggotaKeluargaPilih = [];


    function tambahKK(){
        $('#modal-pesan').modal("hide");
        let no_kk = $("input[name='no_kk']").val();
        let url = base_url+"data/no-kk/tambah";
        let data ={
            no_kk:no_kk,
        };
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                $('#olah-keluarga').show();
            }

        });
        
    }

    $('#olah-keluarga').hide();
    $('#btn-tambah-kk').hide();
    function cariKK(){
        let no_kk = $("input[name='no_kk']").val();
        let tahun = $("select[name='tahun']").val();
        let url = base_url+"data/cek/no-kk";
        let data = {
            no_kk : no_kk,
            tahun:tahun,
        }
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                dataAnggotaKeluarga = respon.data;
                setDataKK(respon.data); 
                getDataProgram();
                $('#btn-tambah-kk').hide();
                $('#olah-keluarga').show();

                if(respon.dataIndikator.length == 1){
                    setIndikator(respon.dataIndikator[0]);
                }
            }else{
                $("#daftar-keluarga").html("");
                $('#btn-tambah-kk').show();
                $('#olah-keluarga').hide();
            }
            setPesanIsi("pesan-no-kk", respon.status, respon.pesan)
            // $("#pesan-no-kk").text(respon.pesan);

        });
    }

    function setIndikator(data){
        $("input[name=pendapatan_utama]").val(data['pendapatan_utama']);
        $("input[name=pendapatan_sampingan]").val(data['pendapatan_sampingan']);
        $("input[name=pengeluaran_total]").val(data['pengeluaran_total']);
        $("textarea[name=jenis_aset]").val(data['jenis_aset']);
        $("input[name=rumah_ukuran]").val(data['rumah_ukuran']);
        $("select[name=id_rumah_kepemilikan]").val(data['id_rumah_kepemilikan']);
        $("select[name=id_dinding]").val(data['id_dinding']);
        $("select[name=id_atap]").val(data['id_atap']);
        $("select[name=id_lantai]").val(data['id_lantai']);
        $("select[name=id_penerangan]").val(data['id_penerangan']);
        $("select[name=id_jamban]").val(data['id_jamban']);
        $("select[name=id_sumber_air_minum]").val(data['id_sumber_air_minum']);
        $("select[name=id_kesejahteraan]").val(data['id_kesejahteraan']);
    }

    function setDataKK(data){

        let table = 
                    '<table id="table-daftar-keluarga" class="table table-bordered table-striped">'+
                      '<thead>'+
                        '<tr>'+
                            '<th>Aksi</th>'+
                            '<th>No</th>'+
                            '<th>NIK</th>'+
                            '<th>Nama</th>'+
                            '<th>Hubungan Keluarga</th>'+
                            '<th>Tempat, Tanggal lahir</th>'+
                            '<th>Jenis Kelamin</th>'+
                            '<th>Status Perkawinan</th>'+
                            '<th>Status Pendidikan</th>'+
                        '</tr>'+
                      '</thead>'+
                      '<tbody>';

            for(let i = 0; i < data.length; i++){

                if(data[i]['jenis_kelamin'] == 1){
                    jenis_kelamin = "Laki - Laki";
                }else{
                    jenis_kelamin = "Perempuan";
                }

                jabatan = ['', 'Ayah', 'Ibu', 'Anak Laki-Laki', 'Anak Perempuan'];

                table +='<tr>';
                if(data[i]['nik'] != data[i]['nik_kepala']){
                    table +=    '<td>'+
                                    '<a class="fa fa-trash" style="padding:5px;" data-id="'+data[i]['nik']+'" href="#"  data-setFunction="doDelete('+data[i]['nik']+')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>'+
                                    '<a class="fa fa-pencil" style="padding:5px;" data-id="'+data[i]['nik']+'" onclick="setUpdate('+data[i]['nik']+')" href="#" data-toggle="modal" data-target="#modal-keluarga" > </a>'+
                                    '<a class="fa fa-user" style="padding:5px;" data-id="'+data[i]['nik']+'" href="#"  data-setFunction="doKepala('+data[i]['no_kk']+', '+data[i]['nik']+')" data-judul="Peringatan!" data-isi="Apakah anda yakin menjadikan kepala keluarga?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>'+
                                '</td>';
                }else{
                    $("#nama-kepala-keluarga").val(data[i]['penduduk_nama']);
                    table +=    '<td>'+
                                '<a class="fa fa-pencil" style="padding:5px;" data-id="'+data[i]['nik']+'" onclick="setUpdate('+data[i]['nik']+')" href="#" data-toggle="modal" data-target="#modal-keluarga" > </a>'+
                            '</td>';
                }
                table +=    '<td>'+(i+1)+'</td>'+
                            '<td>'+data[i]['nik']+'</td>'+
                            '<td>'+data[i]['penduduk_nama']+'</td>'+
                            '<td>'+jabatan[data[i]['jabatan']]+'</td>'+
                            '<td>'+data[i]['tempat_lahir']+', '+data[i]['tgl_lahir']+'</td>'+
                            '<td>'+jenis_kelamin+'</td>'+
                            '<td>'+data[i]['status_perkawinan_nama']+'</td>'+
                            '<td>'+data[i]['status_pendidikan_nama']+'</td>'+
                        '</tr>';
            }
            
            table +=  '</tbody>'+
                    '</table>';
        $("#daftar-keluarga").html(table);
        $('#table-daftar-keluarga').DataTable()
    }

    function setCreate(){
        $("#form-penduduk").attr("action", base_url+"data/penduduk/tambah");
    }

    function setUpdate(id){
        $("#form-penduduk").attr("action", base_url+"data/penduduk/edit");
        dataPilih = findDataByNik(id);
        setFormKeluarga(dataPilih);
    }

    function findDataByNik(nik){
        for(let i = 0; i < dataAnggotaKeluarga.length; i++){
            if(dataAnggotaKeluarga[i]['nik'] == nik){
                dataAnggotaKeluargaPilih = dataAnggotaKeluarga[i];
            }
        }
        return dataAnggotaKeluargaPilih;
    }

    function setFormKeluarga(data){
        $("input[name=nik]").val(data['nik']);
        $("input[name=penduduk_nama]").val(data['penduduk_nama']);
        $("select[name=jenis_kelamin]").val(data['jenis_kelamin']);
        $("input[name=tempat_lahir]").val(data['tempat_lahir']);
        $("input[name=tgl_lahir]").val(data['tgl_lahir']);
        $("textarea[name=alamat]").text(data['alamat']);
        $("textarea[name=kondisi_fisik]").text(data['kondisi_fisik']);
        $("textarea[name=jenis_keterampilan]").text(data['jenis_keterampilan']);
        $("select[name=id_status_pendidikan]").val(data['id_status_pendidikan']);
        $("select[name=id_status_perkawinan]").val(data['id_status_perkawinan']);
        $("select[name=id_pekerjaan]").val(data['id_pekerjaan']);
        $("select[name=id_agama]").val(data['id_agama']);
        $("select[name=jabatan]").val(data['jabatan']);

        // $('select[name=id_status_pendidikan] option[value='+data["id_status_pendidikan"]+']').attr('selected','selected');
        
    }

    function doDelete(nik){
        console.log(nik);
        let url = base_url+"data/penduduk/hapus";
        let data = {
            nik : nik
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                cariKK();
            }
            setPesanIsi("pesan-keluarga-anggota", respon.status, respon.pesan)
            // $("#pesan-no-kk").text(respon.pesan);
            $("#modal-pesan").modal("hide");

        });
    }

    function doKepala(no_kk, nik){
        let url = base_url+"data/keluarga/kepala/update";
        let data = {
            nik : nik,
            no_kk : no_kk,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                cariKK();
            }
            cariKK();
            setPesanIsi("pesan-keluarga-anggota", respon.status, respon.pesan)
            // $("#pesan-no-kk").text(respon.pesan);
            $("#modal-pesan").modal("hide");

        });
    }


    $("#form-penduduk").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        data.push({name: 'tahun',  value:$('select[name=tahun]').val()});
        data.push({name: 'no_kk',  value:$('input[name=no_kk]').val()});
        // console.log(data);
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                cariKK();
                $("#modal-keluarga").modal("hide");
            }
            setPesanIsi("pesan-keluarga-anggota", respon.status, respon.pesan)
        });
    });

    $("#form-indikator").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        data.push({name: 'no_kk',  value:$('input[name=no_kk]').val()});
        // console.log(data);
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
            }
            setPesanIsi("pesan-indikator", respon.status, respon.pesan);
            
        });
    });

    function getProgramName(jenis = 1, tag = 'pesan'){
        let nama = tag+"-program-terima";
        if(jenis == 1){
            nama = tag+"-program-terima";
        }else if(jenis == 2){
            nama = tag+"-program-harap";
        }else if(jenis == 3){
            nama = tag+"-program-akan";
        }
        return nama;
    }

    
    function getDataProgram(){
        let no_kk = $("input[name='no_kk']").val();
        let url = base_url+"data/keluarga/program/ambil";
        let data = {
            no_kk : no_kk,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                inputTableProgram(1, respon.dataProgramTerima);
                inputTableProgram(2, respon.dataProgramHarap);
                inputTableProgram(3, respon.dataProgramAkan);
            }else{

            }
        });
    }

    function inputTableProgram(jenis, data){
        name = getProgramName(jenis, 'table');
        $("#"+name).DataTable().clear();
                
        for(let i = 0; i < data.length; i++){
            $("#"+name).DataTable().row.add( [
                    '<a class="fa fa-pencil" style="padding:5px;" data-id="'+data[i]['id_keluarga_program']+'" onclick="setProgramUpdate('+jenis+', '+data[i]['id_keluarga_program']+')" href="#" data-toggle="modal" data-target="#modal-program" > </a>'+
                    '<a class="fa fa-trash" style="padding:5px;" data-id="'+data[i]['id_keluarga_program']+'" href="#"  data-setFunction="doProgramDelete('+jenis+', '+data[i]['id_keluarga_program']+')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"></a>',
                    i+1,
                    data[i]['kegiatan_tahun'],
                    data[i]['kegiatan_nama'],
                    data[i]['sumber_dana_nama'],
                ] ).draw(  );
        }

        // $("#"+name).DataTable();
        // $('#table-program-terima').DataTable();
    }

    function setProgramCreate(jenis){
        $("input[name=program_jenis]").val(jenis);
        $("#form-program").attr("action", base_url+"data/keluarga/program/terima/create");
    }

    function setProgramUpdate(jenis, id){
        $("input[name=id_keluarga_program]").val(id);
        $("input[name=program_jenis]").val(jenis);
        $("#form-program").attr("action", base_url+"data/keluarga/program/terima/update");
        
    }

    function doProgramDelete(jenis, id){
        
        let url = base_url+"data/keluarga/program/hapus";
        let data = {
            program_jenis : jenis,
            id_keluarga_program: id,
        }
        $("#modal-pesan").modal("hide");
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                cariKK();
            }
            setPesanIsi(getProgramName(jenis, 'pesan'), respon.status, respon.pesan)
        });
    }

    $("#form-program").submit(function(event){
        event.preventDefault();
        let jenis = $('input[name=program_jenis]').val();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        data.push({name: 'no_kk',  value:$('input[name=no_kk]').val()});
        
        $("#modal-program").modal("hide");
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                cariKK();
            }
            setPesanIsi(getProgramName(jenis, 'pesan'), respon.status, respon.pesan)
        });
    });

</script>
<?php if(@$_GET['no_kk']){ ?>
<script>
cariKK();
</script>
<?php } ?>