<!DOCTYPE html>
<html>
<head>
	<title>Incial cilclo</title>
</head>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script type="text/javascript">
$(document).ready(function () {
  var getCiclo;
  var getPoblacion;
  var getImporte;
  var getTotal;
  var getOperador;
  var getPaq;
  var getGrupo;
  var getOrdinal;
  var getStatus;


  function ActualizarRecibo()
  { 
    updateData();
    var params = {ciclo:getCiclo, poblacion:getPoblacion, importe:getImporte,total:getTotal, operador:getOperador, paq:getPaq, paq:getPaq, grupo:getGrupo, ordinal:getOrdinal, status:getStatus}; // etc.

    var ser_data = jQuery.param( params );
    console.log(ser_data);
    /*$.ajax({
      type: "GET",
      url: "updateCiclos.php",
      data:  ser_data,
        success: function( msg )
        {
            location.reload();
        }
      });*/
  }
  function updateData()
  {
	  getCiclo= $("#ciclo").val();
	  getPoblacion= $("#poblacion").val();
	  getImporte= $("#importe").val();
	  getTotal= $("#total").val();
	  getOperador= $("#operador").val();
	  getPaq= $("#paq").val();
	  getGrupo= $("#grupo").val();
	  getOrdinal= $("#ordinal").val();
	  getStatus= $("#status").val();
  }
  (function($) {
        $( "#Enviar" ).click(function( ) {
            ActualizarRecibo();
            event.preventDefault();
        });                       
  }(jQuery));


});
</script> 
<body>
<?php
/*
include "db.php";
$con = connect();
*/
?>
<div>
	<label for="ciclo">Ciclo </label>
	<input type="number" id="ciclo" name="ciclo">
	<label for="poblacion">Poblacion </label>
	<input type="text" id="poblacion" name="poblacion">
	<label for="importe">Importe </label>
	<input type="number" id="importe" name="importe">
	<label for="total">Total de recibos </label>
	<input type="number" id="total" name="total">
	<label for="operador">Operador </label>
	<input type="text" id="operador" name="operador">
	<label for="paq">Tamaño de paquete </label>
	<input type="number" id="paq" name="paq">
	<label for="grupo">Grupo </label>
	<input type="number" id="grupo" name="grupo">
	<label for="ordinal">Orden </label>
	<input type="number" id="ordinal" name="ordinal">
	<label for="status">Estatus </label>
	<input type="text" id="status" name="status">
	<input type="submit" name="Enviar" id="Enviar" value="Enviar">

	 <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
</div>
</body>
</html>