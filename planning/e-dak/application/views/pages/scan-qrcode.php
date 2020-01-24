<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Demo</title>
    </head>
    <body>
    	<h3>Simple initalization with default settings</h3>
        <hr>
        <canvas style="width: 100%;"></canvas>
        <hr>
        <ul></ul>
        <script>
            var base_url = '<?=base_url()?>';
        </script>
		<script type="text/javascript" src="<?=base_url()?>public/qrcode/js/jquery.js"></script>
        <script type="text/javascript" src="<?=base_url()?>public/qrcode/js/qrcodelib.js"></script>
        <script type="text/javascript" src="<?=base_url()?>public/qrcode/js/webcodecamjquery.js"></script>
        <script type="text/javascript">
            var arg = {
                resultFunction: function(result) {
                    $('body').append($('<li>' + result.format + ': ' + result.code + '</li>'));
                }
            };
            $("canvas").WebCodeCamJQuery(arg).data().plugin_WebCodeCamJQuery.play();
        </script>
    </body>
</html>