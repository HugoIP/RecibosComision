<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
<title>Comprobar Recibos</title>
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
  var ValorBusqueda;
  var orderG;
  var texSta;


  function EntregarRecibo()
  { 
    updateData();
    var params = {serviceNum:getServiceNum, barCode:getBarCode, texStatus:texSta, action:"Comprobar"}; // etc.

    var ser_data = jQuery.param( params );
    $.ajax({
      type: "GET",
      url: "updateData.php",
      data:  ser_data,
        success: function( msg )
        {
            location.reload();
        }
      });
  }
  function updateData()
  {
      getBarCode = $(".BusquedaRapida tr #BARC").html();
      getServiceNum = $(".BusquedaRapida tr #SNUM").html();
      getPay = $(".BusquedaRapida tr #SPAY").html();
      getDate = $(".BusquedaRapida tr #LIMI").html();
      orderG = $(".BusquedaRapida tr #ORDE").html();
      texSta = $(".BusquedaRapida tr #STAT input").val();
  }
   (function($) {
       $('#FiltrarContenido').keyup(function () {
        contentString= String($(this).val());
        if(contentString.length==30)
        {
            getBarCode = contentString;
            getServiceNum = contentString.substring(2,14);
            getPay = parseInt(contentString.substring(20,29));
            getDate = "20"+contentString.substring(14,16)+"-"+contentString.substring(16,18)+"-"+contentString.substring(18,20);
            ValorBusqueda = new RegExp(getServiceNum, 'i');
            orderG=1;
            texSta="-Si-";

            $('.BusquedaRapida tr').hide();

             $('.BusquedaRapida tr').filter(function () {
                return ValorBusqueda.test($(this).text());
              }).show();
             $('.BusquedaRapida tr').find(":hidden").remove();
           
            $(".BusquedaRapida tr #STAT" ).html('<input class="form-control mr-sm-2" type="text" value="'+texSta+'">');
            $("#updateDat" ).html('<div id="updateData" class="btn btn-outline-success my-1 my-sm-0">Entregar</div>');

            $( "#updateDat #updateData" ).click(function( ) {
              EntregarRecibo();
              event.preventDefault();
            });
        }
        else
        {
          getServiceNum= contentString;
        }

            var ValorBusqueda = new RegExp(getServiceNum, 'i');

            $('.BusquedaRapida tr').hide();

             $('.BusquedaRapida tr').filter(function () {
                return ValorBusqueda.test($(this).text());
              }).show();            
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
 <h1 class="mt-5">Busqueda</h1>
 <hr>
<?php
if(isset($_GET["option"])){?>
 <div class="alert alert-success" role="alert">
  <strong>Hecho!</strong> El registro ha sido guardado con exito.
</div>
<?php }?>
<div class="row">
  <div class="col-12 col-md-12">

   <!-- Contenido -->    
			

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">Buscar</span>
  </div>
  <input id="FiltrarContenido" type="text" class="form-control" placeholder="Ingrese Nombre del servicio" aria-label="Alumno" aria-describedby="basic-addon1">
</div>
	    <table class="table table-hover">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Codigo de barras</th>
            <th>Servicio</th>            
            <th>Monto</th>
            <th>Fecha pago</th>
          </tr>
        </thead>
        <tbody class="BusquedaRapida">
<?php
include "db.php";
$con = connect();
$strDate="";
if(isset($_GET["fecha"])){
  $strDate=$_GET["fecha"];
}
$consulta = "select * from Cobros where DATE(`dateCobro`)=$strDate";
$resultado = mysqli_query($con , $consulta);
$contador=0;
$totalMonto=0;

while($misdatos = mysqli_fetch_assoc($resultado)){ $contador++;?>
<tr>
  <td id="NAME"><?php echo $misdatos["serviceName"]; ?></td>
  <td id="BARC"><?php echo $misdatos["barCode"]; ?></td>
  <td id="SNUM"><?php echo $misdatos["serviceNum"]; ?></td>
  <td id="SPAY"><?php echo $misdatos["pay"]; ?></td>
  <td id="LIMI"><?php echo $misdatos["dateCobro"]; ?></td>
</tr> 
<tr>   
<?php
  $totalMonto+=(((float)$misdatos["pay"])-6.5);
 }?>
<tr>
  <td > Total  </td>
  
  <td ><?php echo $contador ?></td>
  <td ><?php echo $totalMonto ?></td>
  <td ><?php echo $contador*6.5 ?></td>
  <td ><?php echo $totalMonto+($contador*6.5) ?> </td>

</tr>            
</tbody>
      </table>		
<!-- Fin Contenido --> 
</div>



</div><!-- Fin row -->
<div id="updateDat"></div>

</div><!-- Fin container -->
    <footer class="footer">
      <div class="container">
        <span class="text-muted"><p>Ayuda <a href="https://www.google.com/" target="_blank">vNova Internet</a></p></span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
     <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    
  </body>
</html>