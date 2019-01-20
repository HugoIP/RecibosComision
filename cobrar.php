<?php
include "db.php";

if(isset($_POST["btnCobrar"])){
	$con = connect();

	$barCode=$_POST['barCode'];
  $limitPay=$_POST['limitPay'];
	$serviceNum=$_POST['serviceNum'];
  $pay=$_POST['total'];
  $atm=$_POST['atm'];
  $location=$_POST['location'];
  $dateIntro=date("Y-m-d H:i:s");
  $provider=$_POST['provider'];
  $platform=$_POST['platform'];
	

  $con->query("INSERT INTO `Cobros`(`pay`,`serviceNum`, `barCode`, `atm`, `location`, `platform`, `provider`, `dateCobro`) VALUES ('$pay','$serviceNum','$barCode','$atm','$location','$provider','$platform','$dateIntro')");
	header("Location: index.php?option=ok");
}

?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Registrar Recibos - vNova Internet</title>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script type="text/javascript">
$(document).ready(function () {
  var getBarCode;
  var getServiceNum;
  var getPay;
  var getDate;
  var contentString;
  var atm;
  var location;
  var getName;
  var provider;
  var comision;
  var platform;

   (function($) {
       $('#getContenido').keyup(function () {
        contentString= String($(this).val());
        if(contentString.length==30)
        {
            //Validar la existencia previa
            getBarCode = contentString;
            getServiceNum = contentString.substring(2,14);
            getPay = parseInt(contentString.substring(20,29));
            getDate = "20"+contentString.substring(14,16)+"-"+contentString.substring(16,18)+"-"+contentString.substring(18,20);

            
            atm=String($("#ATM" ).val());
            platform=String($("#PLAT" ).val());
            provider=String($("#PROV" ).val());
            comision=String($("#COMI" ).val());

            if(atm=="")
            {
              atm="Daniel";
            }
            if(comision=="")
            {
              comision="6.5";
            }
            if(provider=="")
            {
              provider="CFE";
            }
            if(platform=="")
            {
              platform="YASTAS";
            }
            if(location=="")
            {
              location="vNova Internet SCV";
            }

            $("#SNUM" ).val(getServiceNum);
            $("#ATM" ).val(atm);
            $("#PLAT" ).val(platform);
            $("#PROV" ).val(provider);
            $("#COMI" ).val(comision);
            $("#SPAY" ).val(getPay);
            $("#LOCA" ).val(location);
            $("#TOTA" ).val(getPay+ parseInt(comision));
         }
       })     
      }(jQuery));
});
</script> 
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="index.php">RecibosComision</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
 
            <li class="nav-item active">
              <a class="nav-link" href="actualizar.php">Actualizar <span class="sr-only">(current)</span></a>
              <a class="nav-link" href="registro.php">Registrar <span class="sr-only">(current)</span></a>
            </li>  
                  
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
          </form>
        </div>
      </nav>
    </header>

    <!-- Begin page content -->

<div class="container">
 <h1 class="mt-5">Cobrar Recibo</h1>
 <hr>

<div class="row">
  <div class="col-10 col-md-6">

   <!-- Contenido --> 
 
<form id="frmLogin" action="" method="post">
      <div class="row">
      <div class="col">
    <label for="barCode">Codigo de barras:</label>
    <input id="getContenido" required class="form-control" type="text" name="barCode"  placeholder="Codigo de barras" value="">
     </div>
    <div class="col">
    <label for="serviceNum">Numero de servicio:</label>
    <input id="SNUM" class="form-control" type="text" name="serviceNum"  placeholder="Numero de servicio 12 d" value="">
    </div>
 	   </div>
     <div class="row">
     <div class="col">
    <label for="pay">Cantidad:</label>
    <input id="SPAY" class="form-control" type="text" name="pay"  placeholder="Monto" value="">
     </div>
      <div class="col">
    <label for="comi">Comision:</label>
    <input id="COMI" class="form-control" type="text" name="comi"  placeholder="6.5" value="">
     </div>
     <div class="col">
    <label for="total">Total a pagar:</label>
    <input id="TOTA" class="form-control form-control-danger" type="text" name="total"  placeholder="Total" value="">
     </div>
     </div>
     <div class="row">
    <label for="platform">Plataforma de pago:</label>
    <input id="PLAT" class="form-control" type="text" name="platform"  placeholder="Yastas /  vNova Internet" value="">
     </div>
       <div class="row">
    <label for="atm">Cajero:</label>
    <input id="ATM" type="text" class="form-control" name="atm" placeholder="Daniel" value="">
     </div>
       <div class="row">
    <label for="provider">Tipo de cobro:</label>
    <input id="PROV" class="form-control" type="text" name="provider"  placeholder="CFE" value="">
     </div>
    <div class="row">
    <label for="location">Lugar:</label>
    <input id="LOCA" class="form-control" type="text" name="location"  placeholder="vNova Internet SCV" value="">
     </div>
       
       
<input class="btn btn-primary" name="btnCobrar" type="submit" value="Cobrar recibo">
             

</form>

 <!-- Fin Contenido --> 
</div>
</div><!-- Fin row -->


</div><!-- Fin container -->
    <footer class="footer">
      <div class="container">
        <span class="text-muted"><p>Ayuda <a href="https://www.google.com/" target="_blank">vNova Internet</a></p></span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>