
<script type="text/javascript">

    $(document).ready(function() {
        
    });

    let refTahun = ['','2019','2020','2021','2022','2023'];
    let refBulan = ['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];

    var link = 'status/';
    let url = base_url+link+"get-data";

    function tampil(){
        let tahun = $('#thn').val();
        let bulan = $('#bln').val();
        let data = { tahun : tahun, bulan : bulan };

        if (tahun == '' || bulan == '') {}
        else{
            $.when(sendAjax(url, data)).done(function(respon){
                if(respon.status){
                    // console.log(respon.data.bulan);
                    $('#stat').html();
                    $('#stat').html('Status Tahun '+refTahun[tahun]+' Bulan '+refBulan[bulan]+' Adalah');
                    $('#sts').val(respon.data.bulan);
                    $('#thnPilih').val(tahun);
                    $('#blnPilih').val(bulan);
                    $('#tampilkan').fadeIn(1000);
                }else{

                }
            });
        }
    }

    $('#bln, #thn').on('change', function(){
        tampil();
    });

    let formData = $('#formKirim');
    formData.submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = base_url+link+"ubah-data";
        let data = form.serializeArray();
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                alert('Perubahan Tersimpan');
            }
        });
    });

    // OLD
    var dataAll;
    var dataPilih;
    var kode;
    var myTable = $('#table-data').DataTable();
    
    var page = 1;
    // getData();
    

</script>
