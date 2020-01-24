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

        tahun = $("select[name=tahun]").val();
        jenis_kelamin = $("select[name=jenis_kelamin]").val();
        id_kesejahteraan = $("select[name=id_kesejahteraan]").val();
        
        let data = {
            tahun : tahun,
            jenis_kelamin: jenis_kelamin,
            id_kesejahteraan: id_kesejahteraan,
        }
        if(save == 'pdf'){
            let url = base_url+"laporan/kesejahteraan/save/pdf";
            $.when(sendAjax(url, data)).done(function(respon){
                // if(respon.status){
                //     setTable(respon.data);
                //     dataAll = respon.data;
                // }else{

                // }
            });
        }else if(save == 'print'){
            let url = base_url+"laporan/kesejahteraan/save/print";
            $.when(sendAjaxNewTab(url, data)).done(function(respon){
                // if(respon.status){
                //     setTable(respon.data);
                //     dataAll = respon.data;
                // }else{

                // }
            });
        }else{
            let url = base_url+"laporan/kesejahteraan/data";
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
                            '<th colspan="11">KESEJAHTERAAN</th>'+
                        '</tr>'+
                      '</thead>'+
                      '<tbody>';

            for(let i = 0; i < data.length; i++){
                table +='<tr class="set-tbody">'+
                            '<td>'+(i+1)+'</td>'+
                            '<td>'+data[i]['tahun']+'</td>'+
                            '<td>'+data[i]['nik']+'</td>'+
                            '<td>'+data[i]['penduduk_nama']+'</td>'+
                            '<td>'+data[i]['umur']+'</td>'+
                            '<td>'+jenisKelamin(data[i]['jenis_kelamin'])+'</td>';
                table +=    '<td>'+data[i]['kesejahteraan_nama']+'</td>';
                table +=    '</tr>';
            }
            
            table +=  '</tbody>'+
                    '</table>';
        $("#laporan-table").html(table);
        $('#table-laporan').DataTable();
    }

</script>