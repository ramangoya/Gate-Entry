    <title>Capture webcam image with php and jquery - pakainfo.com</title>
    <script data-minify="1" src="https://www.pakainfo.com/wp-content/cache/min/1/ajax/libs/jquery/3.3.1/jquery.min.js?ver=1698477292"></script>
    <script data-minify="1" src="https://www.pakainfo.com/wp-content/cache/min/1/ajax/libs/webcamjs/1.0.25/webcam.min.js?ver=1698477292"></script>
    <link data-minify="1" rel="stylesheet" href="https://www.pakainfo.com/wp-content/cache/min/1/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css?ver=1698477291">
    <style type="text/css">
        #response { padding:20px; border:1px solid; background:#ccc; }
    </style>


  
<div class="container">
    <form method="post" >
        <div class="dsp row">
            <div class="col-md-6 dsp">
                <div id="web_cam" style="width: 500px; height: 600px;"><div></div><video autoplay="autoplay" style="width: 500px; height: 600px;"></video></div>
                <br>
                <input type="button" value="Take Snapshot" onclick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <div class="dsp col-md-6">
                <div id="response">Your main captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br>
                <button class="btn btn-success" name="btn">Submit</button>
            </div>
        </div>
    </form>
</div>
  
<!-- simple here configuration part a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 400,
        height: 400,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#web_cam' );
  
    function take_snapshot() {
        Webcam.snap( function(web_cam_data) {
            $(".image-tag").val(web_cam_data);
            document.getElementById('response').innerHTML = '<img decoding="async" src="'+web_cam_data+'"/>';
        }
         );Webcam.reset(); 
    }
</script>
<?php
    
    if(isset($_POST["btn"]))
    {


    $img = $_POST['image'];
    $folderPath = "images/";
  
    $fetch_imgParts = explode(";base64,", $img);
    $image_type_aux = explode("images/", $fetch_imgParts[0]);
    //$image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($fetch_imgParts[1]);
    $img_name = uniqid() . '.png';
  
    $file = $folderPath . $img_name;
    file_put_contents($file, $image_base64);
  
}
  
?>