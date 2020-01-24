<script>

    // var myTable = $('#table-action').DataTable();

    var page = 1;
    var dataAll = [];
    function doSearch(){
        getData();
    }
    function doSave(save){
        console.log(save);
        getData(save);
    }
    getData();
    function getData(save = ''){

        kegiatan_tahun = $("select[name=kegiatan_tahun]").val();
        jenis_kelamin = $("select[name=jenis_kelamin]").val();
        kegiatan_sumber_dana = $("select[name=kegiatan_sumber_dana]").val();
        program_jenis = $("select[name=program_jenis]").val();
        
        let data = {
            kegiatan_tahun : kegiatan_tahun,
            jenis_kelamin: jenis_kelamin,
            kegiatan_sumber_dana: kegiatan_sumber_dana,
            program_jenis: program_jenis,
        }
        if(save == 'pdf'){
            let url = base_url+"laporan/program/save/pdf";
            $.when(sendAjax(url, data)).done(function(respon){});
        }else if(save == 'print'){
            let url = base_url+"laporan/program/save/print";
            $.when(sendAjaxNewTab(url, data)).done(function(respon){});
        }else{
            let url = base_url+"laporan/program/data";
            $.when(sendAjax(url, data)).done(function(respon){
                if(respon.status){
                    setTable(respon.data);
                    dataAll = respon.data;
                }else{

                }
            });
        }
        
    }

    function jenisKelamin(no){
        if(no == 1){
            jk = "Laki -Laki";
        }else{
            jk = "Perempuan";
        }
        return jk;
    }

    function jenisProgram(no){
        if(no == 1){
            program = "Program yang telah di terima";
        }else if(no == 3){
            program = "Program yang telah akan di terima";
        }else{
            program = "Program yang di harapkan";
        }
        return program;
    }

    function setTable(data){
        
        let table = 
                    '<table id="table-laporan" class="table table-bordered table-hover table-striped">'+
                      '<thead>'+
                        '<tr class="set-thead">'+
                            '<th>NO</th>'+
                            '<th>TAHUN</th>'+
                            '<th>NIK</th>'+
                            '<th>NAMA</th>'+
                            '<th>UMUR</th>'+
                            '<th>JENIS KELAMIN</th>'+
                            '<th>JENIS PROGRAM</th>'+
                            '<th>JENIS KEGIATAN</th>'+
                            '<th>SUMBER DANA</th>'+
                        '</tr>'+
                      '</thead>'+
                      '<tbody>';
                      
            for(let i = 0; i < data.length; i++){
                table +='<tr class="set-tbody">'+
                            '<td>'+(i+1)+'</td>'+
                            '<td>'+data[i]['kegiatan_tahun']+'</td>'+
                            '<td>'+data[i]['nik']+'</td>'+
                            '<td>'+data[i]['penduduk_nama']+'</td>'+
                            '<td>'+data[i]['umur']+'</td>'+
                            '<td>'+jenisKelamin(data[i]['jenis_kelamin'])+'</td>';
                table +=    '<td>'+jenisProgram(data[i]['program_jenis'])+'</td>';
                table +=    '<td>'+data[i]['kegiatan_nama']+'</td>';
                table +=    '<td>'+data[i]['sumber_dana_nama']+'</td>';
                table +=    '</tr>';
            }
            
            table +=  '</tbody>'+
                    '</table>';
        $("#laporan-table").html(table);
        $('#table-laporan').DataTable()
    }


</script>