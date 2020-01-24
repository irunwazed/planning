    

    
    <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

    


  <!-- <script language="javascript">

document.write(unescape('%3C%66%6F%6F%74%65%72%20%63%6C%61%73%73%3D%22%6D%61%69%6E%2D%66%6F%6F%74%65%72%22%3E%0A%20%20%20%20%3C%64%69%76%20%63%6C%61%73%73%3D%22%70%75%6C%6C%2D%72%69%67%68%74%20%68%69%64%64%65%6E%2D%78%73%22%3E%0A%20%20%20%20%20%20%3C%21%2D%2D%20%3C%62%3E%56%65%72%73%69%6F%6E%3C%2F%62%3E%20%31%2E%30%2E%30%20%2D%2D%3E%0A%20%20%20%20%3C%2F%64%69%76%3E%0A%20%20%20%20%3C%73%74%72%6F%6E%67%3E%43%6F%70%79%72%69%67%68%74%20%26%63%6F%70%79%3B%20%32%30%31%39%20%3C%61%20%68%72%65%66%3D%22%68%74%74%70%73%3A%2F%2F%77%77%77%2E%69%6E%73%74%61%67%72%61%6D%2E%63%6F%6D%2F%63%6F%64%65%78%76%2E%67%72%6F%75%70%2F%22%3E%43%6F%64%65%58%56%3C%2F%61%3E%2E%3C%2F%73%74%72%6F%6E%67%3E%20%0A%20%20%3C%2F%66%6F%6F%74%65%72%3E'));

</script> -->



  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <!-- <b>Version</b> 1.0.0 -->
    </div>
    <strong>Copyright &copy; 2019 <a href="https://www.instagram.com/codexv.group/">BAPPEDA MOROWALI</a>.</strong> 
  </footer>

  
  <!-- <div>
      <div class="loro">
      <div class="circ">

      </div>
      <div class="circ3"></div>
      <div class="circ5"></div>

      <div class="circ7"></div>
      <div class="ojo"></div>
    </div>
  </div> -->

  <div class="modal fade" id="modal-pesan">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="pesan-judul"></h4>
        </div>
        <div class="modal-body" id="pesan-isi">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary" id="pesan-tombol">Ya</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
  
  <div class="modal fade" id="modal-tahun">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" >Pilih Tahun</h4>
        </div>
        <div class="modal-body" >
          <?php $setTahun = date("Y"); ?>
          <div class="row">
            <div class="col-sm-2">DAK</div>
            <div class="col-sm-2">
              <a href="<?=base_url()?>beranda/<?=@$setTahun-1?>" class="btn btn-primary"><span><?=@$setTahun-1?></span></a>
            </div>
            <div class="col-sm-2">
              <a href="<?=base_url()?>beranda/<?=@$setTahun?>" class="btn btn-primary"><span><?=@$setTahun?></span></a>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-2">SELARAS</div>
            <div class="col-sm-2">
            <a href="<?=base_url()?>beranda/<?=@$setTahun+1?>" class="btn btn-primary"><span><?=@$setTahun+1?></span></a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?=base_url()?>public/admin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url()?>public/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<!-- <script src="<?=base_url()?>public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script> -->
<!-- Select2 -->
<script src="<?=base_url()?>public/admin/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?=base_url()?>public/admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?=base_url()?>public/admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?=base_url()?>public/admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?=base_url()?>public/admin/bower_components/moment/min/moment.min.js"></script>
<script src="<?=base_url()?>public/admin/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=base_url()?>public/admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?=base_url()?>public/admin/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?=base_url()?>public/admin/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="<?=base_url()?>public/admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?=base_url()?>public/admin/plugins/iCheck/icheck.min.js"></script>
<!-- DataTables -->
<script src="<?=base_url()?>public/admin/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>public/admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url()?>public/admin/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url()?>public/admin/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url()?>public/admin/dist/js/demo.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    // $('#datepicker').datepicker({ dateFormat: 'dd-mm-yyyy' }).val();
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd',
    })
      // console.log($('#datepicker').datepicker({ dateFormat: 'dd-mm-yy' }).val());
    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>

<!-- datatable -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

<script>

  var base_url = "<?=base_url()?>";

  function setHide(name){
    let obj = $("#"+name);
    if(obj.hasClass("set-hide")){
      obj.removeClass("set-hide");
    }else{
      obj.addClass("set-hide");
    }
  }
  
  function setPesan(obj){
    let judul = $(obj).attr("data-judul");
    let isi = $(obj).attr("data-isi");
    let setFunction = $(obj).attr("data-setFunction");

    $('#pesan-judul').text(judul);
    $('#pesan-isi').text(isi);
    $('#pesan-tombol').attr("onclick", setFunction);
  }

  function setPesanIsi(id, status = false, pesan=""){
    $('#'+id).text(pesan);
    $("html, body").animate({
        scrollTop: $('#'+id).offset().top-50
    }, 500);  
    if(status){
        $('#'+id).removeClass("danger");
        $('#'+id).addClass("success");
    }else{
        $('#'+id).addClass("danger");
        $('#'+id).removeClass("success");
    }
  }

  function sendAjax(url, dataKirim){
    loading();
    return $.ajax({
      type: "POST",
      url: url,
      dataType: "JSON",
      data: dataKirim, 
      success: function(respon)
      {   
        loading(false);
        if(respon.status){
            message(respon.pesan);
        }else{
          message(respon.pesan, '', 'warning');
        }
        console.log(respon);
      },
      error:function(error){
        loading(false);
        message('Gagal terhubung pada server!', '', 'error');
        console.log(error);
        $("#myerror").html(error.responseText);
      }
    });
  }

  function sendAjaxNewTab(url, dataKirim){
    loading();
    return $.ajax({
      type: "POST",
      url: url,
      dataType: "html",
      data: dataKirim, 
      success: function(respon)
      {   
        var myWindow = window.open("", "_blank");
        myWindow.document.write(respon);
        loading(false);
      },
      error:function(error){
        loading(false);
      }
    });
  }

  function loading(status = true){
    if(status){
      $("#loading").text("loading");
    }else{
      $("#loading").text("");
    }
  }

  function message(pesan = "", judul = '', status = 'success'){
    if(pesan != '')
      toastr[status](judul, pesan)
  }

  function inputToRupiah(obj){
    let val = $(obj).val();
    val = convertToAngka(val);
    $(obj).val(convertToRupiah(val));
  }

  function convertToRupiah(angka)
  {
    if(angka == null){
      angka = 0;
    }
    var rupiah = '';		
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    return rupiah.split('',rupiah.length-1).reverse().join('');
  }
  
  function convertToAngka(rupiah)
  {
    return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
  }

  

</script>

<script type="text/javascript">


// toastr["info"]("tes", "sdfsf")


toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": true,
  "rtl": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": 300,
  "hideDuration": 1000,
  "timeOut": 5000,
  "extendedTimeOut": 1000,
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}


   
</script>

<?=@$script?>


</body>
</html>
