<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title"><i class="mdi mdi-clipboard-outline"></i> Masukkan Usulan</h4>
                <hr>
                <div class="row">
                    <div class="table-responsive ml-3 mr-3" style="overflow: auto;">
                    	<div id="alert">
                            
                        </div>
                        <button class="btn btn-outline-success mb-2" onclick="initTambah()" data-toggle="modal" data-target="#modal-tambah"><i class="mdi mdi-plus-box-outline"></i> Tambah Usulan</button>
	                    <table id="zero_config" class="table table-striped table-bordered table-hover">
	                        <thead>
	                            <tr class="text-white" style="background-color: #4fc3f7">
	                                <th>Nama Usulan</th>
	                                <th>Alasan Usulan</th>
	                                <th>Volume Usulan</th>
	                                <th>Satuan Usulan</th>
	                                <th>Pagu Anggaran</th>
	                                <th>Penerima Manfaat</th>
	                                <th>Nama Pengusul</th>
	                                <th>Kategori</th>
	                                <th width="170" class="text-center">File</th>
	                                <th class="text-center" width="160">Menu</th>
	                            </tr>
	                        </thead>
	                        <tbody id="data-table">
	                           
	                        </tbody>
	                    </table>
	                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- sample modal content -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h4 class="modal-title" id="myLargeModalLabel"><i class="mdi mdi-plus-box-outline"></i> <span id="judul-modal"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="tambah_usulan" action="" enctype="multipart/form-data">
            <div class="modal-body">
            <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Nama Usulan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nama" id="nama" required>
                    <!-- <small class="form-text text-muted"> with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label>Alasan Usulan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="alasan" id="alasan" required>
                </div>
                <div class="form-group">
                    <label>Lokasi Detail <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="lokasi" id="lokasi" required>
                </div>
                <div class="form-group">
                    <label>Volume Usulan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="volume" id="volume" required>
                </div>
                <div class="form-group">
                    <label>Satuan Usulan <span class="text-danger">*</span></label>
                    <select class="form-control" name="satuan" id="satuan" required>
                    	
                    </select>
                </div>
            </div>
            <input type="hidden" name="id_grub" id="id_grub">
            <input type="hidden" name="id_usulan" id="id_usulan">
            <input type="hidden" name="level" id="levelx">
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Kategori <span class="text-danger">*</span></label>
                    <select class="form-control" name="kategori" id="kategori" required>
                    	
                    </select>
                </div>
                <div class="form-group">
                    <label>Pagu Anggaran <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="aggaran" id="aggaran" required>
                </div>
                <div class="form-group">
                    <label>Penerima Manfaat <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="penerima" id="penerima" required>
                </div>
                <div class="form-group">
                    <label>Nama Pengusul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="pengusul" id="pengusul" required>
                </div>
                <div class="form-group">
                    <label>Upload Foto <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="foto" name="foto">
                            <label class="custom-file-label" for="inputGroupFile01">Pilih file</label>
                        </div>
                    </div>
                    <span class="text-info" id="info"></span>
                </div>
            </div>
            </div>
            </div>
            <div class="modal-footer">
            	<button type="submit" class="btn btn-success" id="btn-modal"><i class="fa fa-save"></i> Simpan</button>
                <button type="reset" class="btn btn-danger waves-effect">Reset</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- sample modal content -->
<div class="modal fade" id="modal-gambar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
            	<div class="row">
                    <div class="col-md-12">
                        <img src="" class="img img-responsive" id="tampil_gambar" alt="Gambar" width="100%">
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
