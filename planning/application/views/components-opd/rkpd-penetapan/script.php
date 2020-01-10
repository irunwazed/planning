<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="modal-form" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form <?=@$judul?> <?=@$dataRpjmd->tb_rpjmd_tahun+@$dataRpjmd->tb_rpjmd_status_tahun-1?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-data">
                    <input type="hidden" name="kode" value="<?=@$kode?>">
                    <div class="position-relative form-group">
                        <label>Sasaran</label>
                        <select name="sasaran" class="form-control select2" required style="width:100%">
                            <option value="">-= Pilih Sasaran =-</option>
                            <?php foreach($dataSasaran as $row){ ?>
                                <option value="<?=@$row['tb_rpjmd_misi_kode']."-".@$row['tb_rpjmd_tujuan_kode']."-".@$row['tb_rpjmd_sasaran_kode']?>"><?=@$row['tb_rpjmd_misi_kode'].".".@$row['tb_rpjmd_tujuan_kode'].".".@$row['tb_rpjmd_sasaran_kode']." - ".$row['tb_rpjmd_sasaran_nama']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label>Program</label>
                        <select name="tb_program_kode" class="form-control select2" required style="width:100%">
                            <option value="">-= Pilih Program =-</option>
                            <?php foreach($dataProgram as $row){ ?>
                                <option value="<?=$row['tb_program_kode']?>"><?=$row['tb_program_nama']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label>Satuan</label>
                        <select name="id_tb_satuan" class="form-control select2" required style="width:100%">
                            <option value="">-= Pilih Satuan =-</option>
                            <?php foreach($dataSatuan as $row){ ?>
                                <option value="<?=$row['id_tb_satuan']?>"><?=$row['tb_satuan_nama']?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label>Indikator</label>
                        <input name="tb_rpjmd_program_indikator" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kinerja</label>
                        <input name="tb_rpjmd_program_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi</label>
                        <input name="tb_rpjmd_program_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Catatan</label>
                        <textarea class="form-control" name="tb_rpjmd_program_catatan" id="" cols="30" rows="5"></textarea>
                    </div>
                    <!-- <div class="position-relative form-group">
                        <label>Target Kenirja Tahun 1</label>
                        <input name="tb_rpjmd_program_th1_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kenirja Tahun 2</label>
                        <input name="tb_rpjmd_program_th2_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kenirja Tahun 3</label>
                        <input name="tb_rpjmd_program_th3_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kenirja Tahun 4</label>
                        <input name="tb_rpjmd_program_th4_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Kenirja Tahun 5</label>
                        <input name="tb_rpjmd_program_th5_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun 1</label>
                        <input name="tb_rpjmd_program_th1_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun 2</label>
                        <input name="tb_rpjmd_program_th2_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun 3</label>
                        <input name="tb_rpjmd_program_th3_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun 4</label>
                        <input name="tb_rpjmd_program_th4_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target Realisasi Tahun 5</label>
                        <input name="tb_rpjmd_program_th5_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
                    </div> -->
                    <!-- <div class="position-relative form-group">
                        <label>Akhir Target</label>
                        <input name="tb_rpjmd_program_th_akhir_target_kinerja" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Akhir Pagu</label>
                        <input name="tb_rpjmd_program_th_akhir_target_realisasi" onchange="inputToRupiah(this)" type="text" class="form-control" required>
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
    var kode;
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'opd/penyusunan/rkpd-penetapan';
    var page = 1;
    var tahunKe = '<?=@$dataRpjmd->tb_rpjmd_status_tahun?>'
    getData();

    function cariProgram(){
        kode = $('select[name="sasaran"]').val();
        getData();
    }
    
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
            kodeOneData = element['tb_rpjmd_misi_kode']
                        +'-'+element['tb_rpjmd_tujuan_kode']
                        +'-'+element['tb_rpjmd_sasaran_kode']
                        +'-'+element['tb_urusan_kode']
                        +'-'+element['tb_bidang_kode']
                        +'-'+element['tb_unit_kode']
                        +'-'+element['tb_sub_unit_kode']
                        +'-'+element['tb_program_kode']
                        +'-'+element['tb_rpjmd_program_tahun'];
            kodeShow =  element['tb_urusan_kode']
                        +'.'+element['tb_bidang_kode']
                        +'.'+element['tb_program_kode'];

            tempData = [
                no,
                kodeShow,
                '<a href="'+base_url+'opd/penyusunan/rkpd-penetapan/kegiatan/'+kodeOneData+'">'+element['tb_program_nama']+'</a>',
                element['tb_rpjmd_program_indikator'],
                element['tb_satuan_nama'],
                element['tb_rpjmd_program_target_kinerja'],
                convertToRupiah(element['tb_rpjmd_program_target_realisasi']),
                element['tb_rpjmd_program_catatan'],
                '<a class="btn btn-info"  href="#" onclick="setUpdate(\''+kodeOneData+'\')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>'+
                '<a class="btn btn-danger"  href="#"  data-setFunction="doDelete(\''+kodeOneData+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"><i class="fa fa-trash"></i></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate(){
        formClean()
        formData.attr("action", base_url+link+"/create");
    }

    function setUpdate(id){
        formClean()
        formData.attr("action", base_url+link+"/update");
        dataPilih = getDataPilih(id);
        setForm(dataPilih);
    }

    function formClean(){
        formData[0].reset();
        $("select[name='sasaran']").val('').trigger('change');
        $("select[name='tb_program_kode']").val('').trigger('change');
        $("select[name='id_tb_satuan']").val('').trigger('change');
    }

    function getDataPilih(id){
        dataPilih = {};
        let setKode = id.split("-");
        dataAll.forEach(element => {
            if(setKode[0] == element['tb_rpjmd_misi_kode'] 
            && setKode[1] == element['tb_rpjmd_tujuan_kode']
            && setKode[2] == element['tb_rpjmd_sasaran_kode'] 
            && setKode[3] == element['tb_urusan_kode'] 
            && setKode[4] == element['tb_bidang_kode'] 
            && setKode[5] == element['tb_unit_kode'] 
            && setKode[6] == element['tb_sub_unit_kode']
            && setKode[7] == element['tb_program_kode']
            && setKode[8] == element['tb_rpjmd_program_tahun'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        let kodeSasaran = data['tb_rpjmd_misi_kode']+'-'+data['tb_rpjmd_tujuan_kode']+'-'+data['tb_rpjmd_sasaran_kode'];
        $("select[name='sasaran']").val(kodeSasaran).trigger('change');
        $("select[name='tb_program_kode']").val(data['tb_program_kode']).trigger('change');
        $("select[name='id_tb_satuan']").val(data['id_tb_satuan']).trigger('change');
        $("input[name='tb_rpjmd_program_indikator']").val(data['tb_rpjmd_program_indikator']).trigger('change');
        $("input[name='tb_rpjmd_program_target_kinerja']").val(data['tb_rpjmd_program_target_kinerja']);
        $("input[name='tb_rpjmd_program_target_realisasi']").val(data['tb_rpjmd_program_target_realisasi']);
        $("textarea[name='tb_rpjmd_program_catatan']").val(data['tb_rpjmd_program_catatan']);
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
