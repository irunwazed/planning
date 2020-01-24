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
        id_rumah_kepemilikan = $("select[name=id_rumah_kepemilikan]").val();
        id_dinding = $("select[name=id_dinding]").val();
        id_atap = $("select[name=id_atap]").val();
        id_lantai = $("select[name=id_lantai]").val();
        id_penerangan = $("select[name=id_penerangan]").val();
        id_jamban = $("select[name=id_jamban]").val();
        id_sumber_air_minum = $("select[name=id_sumber_air_minum]").val();
        id_kesejahteraan = $("select[name=id_kesejahteraan]").val();
        
        let data = {
            tahun : tahun,
            jenis_kelamin: jenis_kelamin,
            id_rumah_kepemilikan: id_rumah_kepemilikan,
            id_dinding: id_dinding,
            id_atap: id_atap,
            id_lantai: id_lantai,
            id_penerangan: id_penerangan,
            id_jamban: id_jamban,
            id_sumber_air_minum: id_sumber_air_minum,
            id_kesejahteraan: id_kesejahteraan,
        }
        if(save == 'pdf'){
            let url = base_url+"laporan/indikator/save/pdf";
            $.when(sendAjax(url, data)).done(function(respon){
                // if(respon.status){
                //     setTable(respon.data);
                //     dataAll = respon.data;
                // }else{

                // }
            });
        }else if(save == 'print'){
            let url = base_url+"laporan/indikator/save/print";
            $.when(sendAjaxNewTab(url, data)).done(function(respon){
                // if(respon.status){
                //     setTable(respon.data);
                //     dataAll = respon.data;
                // }else{

                // }
            });
        }else{
            let url = base_url+"laporan/indikator/data";
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
                            '<th rowspan="3">NO</th>'+
                            '<th rowspan="3">TAHUN</th>'+
                            '<th rowspan="3">NIK</th>'+
                            '<th rowspan="3">NAMA</th>'+
                            '<th rowspan="3">UMUR</th>'+
                            '<th rowspan="3">JENIS KELAMIN</th>'+
                            '<th colspan="11">INDIKATOR</th>'+
                        '</tr>'+
                        '<tr class="set-thead">'+
                            '<th colspan="3">EKONOMI</th>'+
                            '<th colspan="6">INFRA STRUKTUR </th>'+
                            '<th colspan="2">SOSIAL BUDAYA</th>'+
                        '</tr>'+
                        '<tr class="set-thead">'+
                            '<th>Pendapatan (Bulan)</th>'+
                            '<th>Pengeluaran (Bulan)</th>'+
                            '<th>Aset</th>'+
                            '<th>Ukuran Rumah</th>'+
                            '<th>Kepemilikan Rumah</th>'+
                            '<th>Dinding Terluas</th>'+
                            '<th>Atap Terjual</th>'+
                            '<th>Lantai Terluas</th>'+
                            '<th>Jenis Penerangan</th>'+
                            '<th>Jamban</th>'+
                            '<th>Sumber Air Minum</th>'+
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
                table +=    '<td>'+convertToRupiah(parseFloat(data[i]['pendapatan_utama'])+parseFloat(data[i]['pendapatan_sampingan']))+'</td>';
                table +=    '<td>'+convertToRupiah(data[i]['pengeluaran_total'])+'</td>';
                table +=    '<td>'+data[i]['jenis_aset']+'</td>';
                table +=    '<td>'+data[i]['rumah_ukuran']+'</td>';
                table +=    '<td>'+data[i]['rumah_kepemilikan_nama']+'</td>';
                table +=    '<td>'+data[i]['dinding_nama']+'</td>';
                table +=    '<td>'+data[i]['atap_nama']+'</td>';
                table +=    '<td>'+data[i]['lantai_nama']+'</td>';
                table +=    '<td>'+data[i]['penerangan_nama']+'</td>';
                table +=    '<td>'+data[i]['jamban_nama']+'</td>';
                table +=    '<td>'+data[i]['sumber_air_minum_nama']+'</td>';
                table +=    '</tr>';
            }
            
            table +=  '</tbody>'+
                    '</table>';
        $("#laporan-table").html(table);
        $('#table-laporan').DataTable()
    }

</script>