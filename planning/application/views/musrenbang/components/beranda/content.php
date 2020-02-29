<div class="row">
    <!-- Column -->
    <div class="col-lg-12 col-xlg-12 col-md-12">
        <div class="card">
            <div class="card-body"> 
                <h3>
                    Selamat datang pada Musrenbang Elektronik
                </h3>
            </div>
            <div class="card-body">
                <center class="mt-4"> 
                    <img src="<?=base_url()?>public/template/musrenbang/assets/images/logo_morowali.png" width="150" />
                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->

<script type="text/javascript">
	$('#username').val(dataSession.username);
	$('#telepon').val(dataSession.telepon);
	$('#idx').val(dataSession.id_user);
    $('input[name=user_akun]').val(dataSession.akun);
    $('input[name=user_level]').val(dataSession.level);

    $('.tampil_username').html(dataSession.username);
    $('.tampil_telepon').html(dataSession.telepon);
    var posisix;
    if (dataLokasi.data.kelurahan.tb_deskel_level == 1) {
        posisix = 'Kelurahan ';
    }
    else{
        posisix = 'Desa '
    }
    $('#level-lokasi').html(posisix+dataLokasi.data.kelurahan.tb_deskel_nama);

    $("#form-data").submit(function(e){   
      e.preventDefault();
      var form = $(this);
      var url = config.apiRoot+link+'updateUser';
      var data = form.serializeArray();
      data.push({name: 'session',  value:getCookie('codexv-session')});
      $.when(sendAjax(url, data)).done(function(a1){
        $('#alert').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button><i class="fa fa-check"></i> Perubahan tersimpan. Silahkan login kembali</div>');
        setTimeout(function() {
            logout();
        }, 2000);
      });
    });
</script>