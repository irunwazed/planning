<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><i class="mdi mdi-cloud-download"></i> Download Berita Acara</h4>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                    	<form id="form-donlot" method="POST" action="" target="_blank">
                    		<div class="col-md-12">
	                    		<div class="form-group row">
	                                <label class="col-md-2 col-xs-12 text-left control-label col-form-label">Masukkan Jumlah Peserta</label>
	                                <div class="col-md-3 col-xs-12">
	                                    <input type="number" class="form-control" name="jml" id="jml" min="1" placeholder="" required>
	                                </div>
                                    <input type="hidden" name="levelx" id="levelx">
                                    <input type="hidden" name="id_userx" id="id_userx">
                                    <input type="hidden" name="kode_lokasix" id="kode_lokasix">
                                    <input type="hidden" name="id_grubx" id="id_grubx">
	                                <div class="col-md-5 col-xs-12">
	                        			<button type="submit" class="btn btn-primary"> <i class="mdi mdi-file-document"></i> Download Berita Acara</button>
	                        		</div>
	                            </div>
	                        </div>
                    	</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var url = config.apiRoot+link+'downloadBerita';
    $('#form-donlot').attr('action', url);

    $('#id_grubx').val(idUsul);
    $('#id_userx').val(dataSession.id_user);
    $('#kode_lokasix').val(dataLokasi.data.lokasi);
    $('#levelx').val(level);
</script>
