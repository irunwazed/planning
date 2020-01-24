<script type="text/javascript">

    $(document).ready(function() {
        
    } );
    var dataAll;
    var dataPilih;
    var kode = '<?=@$kode?>';
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'opd/penyusunan/pk-sasaran';
    var tahunKe = '<?=@$this->session->tahun?>';
    var page = 1;
    var dataSasaran = JSON.parse('<?=json_encode(@$dataPkOpd)?>');
    var dataProgram;
    var dataKegiatan;
    var value = 0;
    // getData();

    setHide("tb_rpjmd_misi_kode", false);
    setHide("tb_rpjmd_tujuan_kode", false);
    setHide("tb_rpjmd_sasaran_kode", false);
    setHide("tb_program_kode", false);
    setHide("tb_kegiatan_kode", false);
    setHide("kinerja", false, 'input');
    $('select[name=jenis]').change(function(){
        let val = $(this).val();
        $("input[name='kinerja']").val("");
        setHide("tb_rpjmd_misi_kode", false);
        setHide("tb_rpjmd_tujuan_kode", false);
        setHide("tb_rpjmd_sasaran_kode", false);
        setHide("tb_program_kode", false);
        setHide("tb_kegiatan_kode", false);
        setHide("kinerja", false, 'input');
        
        if(val == 1){
            setHide("tb_rpjmd_misi_kode", true);
            setHide("tb_rpjmd_tujuan_kode", true);
            setHide("tb_rpjmd_sasaran_kode", true);
            setHide("kinerja", true, 'input');
        }else if(val == 2){
            setHide("tb_rpjmd_misi_kode", true);
            setHide("tb_rpjmd_tujuan_kode", true);
            setHide("tb_rpjmd_sasaran_kode", true);
            setHide("tb_program_kode", true);
            setHide("kinerja", true, 'input');
        }else if(val == 3){
            setHide("tb_rpjmd_misi_kode", true);
            setHide("tb_rpjmd_tujuan_kode", true);
            setHide("tb_rpjmd_sasaran_kode", true);
            setHide("tb_program_kode", true);
            setHide("tb_kegiatan_kode", true);
            setHide("kinerja", true, 'input');
        }
    });

    function setHide(nama, status, jenis = 'select'){
            $(jenis+'[name='+nama+']').attr('required', status);
        if(status){
            $('#'+nama).show();
        }else{
            $('#'+nama).hide();
        }
    }

    $('#form-pk').submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                setTimeout(function(){ window.location.reload(); }, 2000);
                
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

    $('select[name="tb_rpjmd_misi_kode"]').change(function(){
        getDataTujuan($(this).val());
    });
    
    function getDataTujuan(kode){
        let url = base_url+"/get-data/tujuan";
        let data = {
            kode: kode,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                setInputTujuan(respon.data);
            }
        });
    }

    function setInputTujuan(data){
        $('select[name="tb_rpjmd_tujuan_kode"]').empty();
        $('select[name="tb_rpjmd_tujuan_kode"]').append('<option value="">-= Pilih Tujuan =-</option>');
        let isi;
        let setKode;
        data.forEach(element => {
            setKode = element['tb_rpjmd_misi_kode']
                    +"-"+ element['tb_rpjmd_tujuan_kode'];
            isi = '<option value="'+setKode+'">('+element['tb_rpjmd_tujuan_kode']+') '+element['tb_rpjmd_tujuan_nama']+'</option>';
            $('select[name="tb_rpjmd_tujuan_kode"]').append(isi);
        });
    }
    
    $('select[name="tb_rpjmd_tujuan_kode"]').change(function(){
        let url = base_url+"/get-data/sasaran";
        let data = {
            kode: $(this).val(),
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                dataSasaran = respon.data;
                $('select[name="tb_rpjmd_sasaran_kode"]').empty();
                $('select[name="tb_rpjmd_sasaran_kode"]').append('<option value="">-= Pilih Sasaran =-</option>');
                let isi;
                let setKode;
                respon.data.forEach(element => {
                    setKode = element['tb_rpjmd_misi_kode']
                            +"-"+ element['tb_rpjmd_tujuan_kode']
                            +"-"+ element['tb_rpjmd_sasaran_kode'];
                    isi = '<option value="'+setKode+'">('+element['tb_rpjmd_sasaran_kode']+') '+element['tb_rpjmd_sasaran_nama']+'</option>';
                    $('select[name="tb_rpjmd_sasaran_kode"]').append(isi);
                });
            }
        });
    });
    
    $('select[name="tb_rpjmd_sasaran_kode"]').change(function(){
        let val = $(this).val();
        if($('select[name=jenis]').val() == 1){
            dataSasaran.forEach(element => {
                if(val == element['tb_rpjmd_misi_kode']
                +'-'+element['tb_rpjmd_tujuan_kode']
                +'-'+element['tb_rpjmd_sasaran_kode']){
                    $('input[name=kinerja]').val(element['tb_rpjmd_opd_th'+tahunKe+'_capaian_kinerja']);
                }

            });
        }else{
            $("input[name='kinerja']").val("");
        }
        if(val != ''){

            let url = base_url+"/get-data/program";
            let data = {
                kode: val,
            }
            $.when(sendAjax(url, data)).done(function(respon){
                if(respon.status){
                    dataProgram = respon.data;
                    $('select[name="tb_program_kode"]').empty();
                    $('select[name="tb_program_kode"]').append('<option value="">-= Pilih Program =-</option>');
                    let isi;
                    let setKode;
                    respon.data.forEach(element => {
                        setKode = element['tb_rpjmd_misi_kode']
                                +"-"+ element['tb_rpjmd_tujuan_kode']
                                +"-"+ element['tb_rpjmd_sasaran_kode']
                                +"-"+ element['tb_program_kode'];
                        isi = '<option value="'+setKode+'">('+element['tb_program_kode']+') '+element['tb_program_nama']+'</option>';
                        $('select[name="tb_program_kode"]').append(isi);
                    });
                }
            });
        }
    });
    
    $('select[name="tb_program_kode"]').change(function(){
        let val = $(this).val();
        if($('select[name=jenis]').val() == 2){
            dataProgram.forEach(element => {
                if(val == element['tb_rpjmd_misi_kode']
                +'-'+element['tb_rpjmd_tujuan_kode']
                +'-'+element['tb_rpjmd_sasaran_kode']
                +'-'+element['tb_program_kode']){
                    $('input[name=kinerja]').val(element['tb_rpjmd_program_th'+tahunKe+'_capaian_kinerja']);
                }

            });
        }else{
            $("input[name='kinerja']").val("");
        }
        let url = base_url+"/get-data/kegiatan";
        let data = {
            kode: val,
        }
        if(val != ""){
            $.when(sendAjax(url, data)).done(function(respon){
                if(respon.status){
                    dataKegiatan = respon.data;
                    $('select[name="tb_kegiatan_kode"]').empty();
                    $('select[name="tb_kegiatan_kode"]').append('<option value="">-= Pilih Kegiatan =-</option>');
                    let isi;
                    let setKode;
                    respon.data.forEach(element => {
                        setKode = element['tb_rpjmd_misi_kode']
                                +"-"+ element['tb_rpjmd_tujuan_kode']
                                +"-"+ element['tb_rpjmd_sasaran_kode']
                                +"-"+ element['tb_program_kode']
                                +"-"+ element['tb_kegiatan_kode'];
                        isi = '<option value="'+setKode+'">('+element['tb_kegiatan_kode']+') '+element['tb_kegiatan_nama']+'</option>';
                        $('select[name="tb_kegiatan_kode"]').append(isi);
                    });
                }
            });
        }
    });

    $('select[name="tb_kegiatan_kode"]').change(function(){
        let val = $(this).val();
        if($('select[name=jenis]').val() == 3){
            dataKegiatan.forEach(element => {
                if(val == element['tb_rpjmd_misi_kode']
                +'-'+element['tb_rpjmd_tujuan_kode']
                +'-'+element['tb_rpjmd_sasaran_kode']
                +'-'+element['tb_program_kode']
                +'-'+element['tb_kegiatan_kode']){
                    $('input[name=kinerja]').val(element['tb_rpjmd_kegiatan_th'+tahunKe+'_capaian_kinerja']);
                }
            });
        }else{
            $("input[name='kinerja']").val("");
        }
    });

</script>
