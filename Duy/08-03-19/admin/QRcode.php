<?php
    // $_GETsession_start;
    if(isset($_GET["id"]) && isset($_GET["ISBN"])){
        // echo "asdasdasd";
        $id = $_GET["id"];
        $ISBN = $_GET["ISBN"];
    }
?>
<html>
  <head>
    <style>
    
    </style>
    <!-- <script src="http://code.jquery.com/jquery-latest.min.js"></script> -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- <script type="text/javascript" src="../assets/QRcode/jquery-barcode.min.js"></script> -->
    <script type="text/javascript" src="../assets/QRcode/jquery-barcode.js"></script>
    <script type="text/javascript">
        // $("#canvasTarget").barcode(
        //     "1234567890128", // Value barcode (dependent on the type of barcode)
        //     "ean13 " // type (string)
        // );
// codabar
// code11 (code 11)
// code39 (code 39)
// code93 (code 93)
// code128 (code 128)
// ean8 (ean 8)
// ean13 (ean 13)
// std25 (standard 2 of 5 - industrial 2 of 5)
// int25 (interleaved 2 of 5)
// msi
// datamatrix (ASCII + extended)
var defaultSettings = {
      barWidth: 2,
      barHeight: 100,
      moduleSize: 5,
      showHRI: true,
      addQuietZone: true,
      marginHRI: 5,
      bgColor: "#FFFFFF",
      color: "#000000",
      fontSize: 20,
      output: "css",
      posX: 0,
      posY: 0
    };

        $(document).ready(function(){
            $("#demo").barcode(
                "<?php echo '0016979797979'; ?>", // Value barcode (dependent on the type of barcode)
                "codabar",defaultSettings // type (string)
            ); 
        });
    </script>
  </head>
  <body>
  <div id="demo"  width="150" height="150">  </div>
<!-- ádasd
    <canvas id="canvasTarget" width="150" height="150"> aaaaaaaaa</canvas>  -->
  
  </body>
</html>