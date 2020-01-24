
<script type="text/javascript">

    $(document).ready(function() {
        
    });
    
    $("select[name='id']").change(function(){
        window.location.href = base_url+'pengaturan/data/hak/'+$(this).val();
    });

    $("#form-tahun").submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
        });
    });
    
</script>
