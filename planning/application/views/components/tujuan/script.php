<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="modal-form" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form <?=@$judul?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-data">
                    <input type="hidden" name="kode" value="<?=$kode?>">
                    <div class="position-relative form-group">
                        <label>Kode Tujuan</label>
                        <input name="tb_rpjmd_tujuan_kode" type="number" class="form-control col-sm-2" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Tujuan</label>
                        <input name="tb_rpjmd_tujuan_nama" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Indikator</label>
                        <input name="tb_rpjmd_tujuan_indikator" type="text" class="form-control" required>
                    </div>
                    <!-- <div class="position-relative form-group">
                        <label>Target Awal Kinerja</label>
                        <input name="tb_rpjmd_tujuan_th_awal_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Awal Pagu</label>
                        <input name="tb_rpjmd_tujuan_th_awal_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kenirja Tahun 1</label>
                        <input name="tb_rpjmd_tujuan_th1_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun 1</label>
                        <input name="tb_rpjmd_tujuan_th1_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kenirja Tahun 2</label>
                        <input name="tb_rpjmd_tujuan_th2_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun 2</label>
                        <input name="tb_rpjmd_tujuan_th2_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kenirja Tahun 3</label>
                        <input name="tb_rpjmd_tujuan_th3_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun 3</label>
                        <input name="tb_rpjmd_tujuan_th3_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kenirja Tahun 4</label>
                        <input name="tb_rpjmd_tujuan_th4_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun 4</label>
                        <input name="tb_rpjmd_tujuan_th4_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kenirja Tahun 5</label>
                        <input name="tb_rpjmd_tujuan_th5_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun 5</label>
                        <input name="tb_rpjmd_tujuan_th5_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kenirja Tahun Akhir</label>
                        <input name="tb_rpjmd_tujuan_th_akhir_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun Akhir</label>
                        <input name="tb_rpjmd_tujuan_th_akhir_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div> -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="form-data">Simpan</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function() {
        
    } );
    var dataAll;
    var dataPilih;
    var kode = '<?=$kode?>';
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'rpjmd/penyusunan/tujuan';
    var page = 1;
    getData();
    
    function getData(_page = 1){
        page = _page;
        let url = base_url+link+"/get-data";
        let data = {
            page : page,
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
        myTable.clear().draw();
        no = 1;
        let kodeOneData;
        data.forEach(element => {
            kodeOneData = element['tb_rpjmd_misi_kode']+'-'+element['tb_rpjmd_tujuan_kode'];
            kodeShow = element['tb_rpjmd_tujuan_kode'];
            tempData = [
                no,
                kodeShow,
                '<a href="'+base_url+'rpjmd/penyusunan/sasaran/'+kodeOneData+'">'+element['tb_rpjmd_tujuan_nama']+'</a>',
                element['tb_rpjmd_tujuan_indikator'],
                // element['tb_rpjmd_tujuan_th_awal_target_kinerja'],
                // convertToRupiah(element['tb_rpjmd_tujuan_th_awal_target_realisasi']),
                // element['tb_rpjmd_tujuan_th1_target_kinerja'],
                // convertToRupiah(element['tb_rpjmd_tujuan_th1_target_realisasi']),
                // element['tb_rpjmd_tujuan_th2_target_kinerja'],
                // convertToRupiah(element['tb_rpjmd_tujuan_th2_target_realisasi']),
                // element['tb_rpjmd_tujuan_th3_target_kinerja'],
                // convertToRupiah(element['tb_rpjmd_tujuan_th3_target_realisasi']),
                // element['tb_rpjmd_tujuan_th4_target_kinerja'],
                // convertToRupiah(element['tb_rpjmd_tujuan_th4_target_realisasi']),
                // element['tb_rpjmd_tujuan_th5_target_kinerja'],
                // convertToRupiah(element['tb_rpjmd_tujuan_th5_target_realisasi']),
                // element['tb_rpjmd_tujuan_th_akhir_target_kinerja'],
                // convertToRupiah(element['tb_rpjmd_tujuan_th_akhir_target_realisasi']),
                '<a class="btn btn-info"  href="#" onclick="setUpdate(\''+kodeOneData+'\')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>'+
                '<a class="btn btn-danger"  href="#"  data-setFunction="doDelete(\''+kodeOneData+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"><i class="fa fa-trash"></i></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate(){
        formData[0].reset();
        formData.attr("action", base_url+link+"/create");
    }

    function setUpdate(id){
        formData[0].reset();
        formData.attr("action", base_url+link+"/update");
        dataPilih = getDataPilih(id);
        setForm(dataPilih);
    }

    function getDataPilih(id){
        dataPilih = {};
        let setKode = id.split("-");
        dataAll.forEach(element => {
            if(setKode[0] == element['tb_rpjmd_misi_kode'] 
            && setKode[1] == element['tb_rpjmd_tujuan_kode'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }
    
    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='tb_rpjmd_tujuan_kode']").val(data['tb_rpjmd_tujuan_kode']);
        $("input[name='tb_rpjmd_tujuan_nama']").val(data['tb_rpjmd_tujuan_nama']);
        $("input[name='tb_rpjmd_tujuan_indikator']").val(data['tb_rpjmd_tujuan_indikator']);
        // $("input[name='tb_rpjmd_tujuan_th_awal_target_kinerja']").val(data['tb_rpjmd_tujuan_th_awal_target_kinerja']);
        // $("input[name='tb_rpjmd_tujuan_th_awal_target_realisasi']").val(data['tb_rpjmd_tujuan_th_awal_target_realisasi']);
        // $("input[name='tb_rpjmd_tujuan_th1_target_kinerja']").val(data['tb_rpjmd_tujuan_th1_target_kinerja']);
        // $("input[name='tb_rpjmd_tujuan_th1_target_realisasi']").val(data['tb_rpjmd_tujuan_th1_target_realisasi']);
        // $("input[name='tb_rpjmd_tujuan_th2_target_kinerja']").val(data['tb_rpjmd_tujuan_th2_target_kinerja']);
        // $("input[name='tb_rpjmd_tujuan_th2_target_realisasi']").val(data['tb_rpjmd_tujuan_th2_target_realisasi']);
        // $("input[name='tb_rpjmd_tujuan_th3_target_kinerja']").val(data['tb_rpjmd_tujuan_th3_target_kinerja']);
        // $("input[name='tb_rpjmd_tujuan_th3_target_realisasi']").val(data['tb_rpjmd_tujuan_th3_target_realisasi']);
        // $("input[name='tb_rpjmd_tujuan_th4_target_kinerja']").val(data['tb_rpjmd_tujuan_th4_target_kinerja']);
        // $("input[name='tb_rpjmd_tujuan_th4_target_realisasi']").val(data['tb_rpjmd_tujuan_th4_target_realisasi']);
        // $("input[name='tb_rpjmd_tujuan_th5_target_kinerja']").val(data['tb_rpjmd_tujuan_th5_target_kinerja']);
        // $("input[name='tb_rpjmd_tujuan_th5_target_realisasi']").val(data['tb_rpjmd_tujuan_th5_target_realisasi']);
        // $("input[name='tb_rpjmd_tujuan_th_akhir_target_kinerja']").val(data['tb_rpjmd_tujuan_th_akhir_target_kinerja']);
        // $("input[name='tb_rpjmd_tujuan_th_akhir_target_realisasi']").val(data['tb_rpjmd_tujuan_th_akhir_target_realisasi']);
    }
    
    formData.submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        myModalHide();
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

    function doDelete(id){

        let url = base_url+link+"/delete";
        let data = {
            kode : id,
        }
        myModalHide();
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
        });
    }

    function myModalHide(){
        $('.close').click(); 
    }


</script>
