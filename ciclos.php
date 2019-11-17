<!DOCTYPE html>
<html>
<head>
	<title>Incial cilclo</title>
</head>
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
    var params = {ciclo:getCiclo, poblacion:getPoblacion, importe:getImporte,total:getTotal, operador:getOperador, paq:getPaq, paq:getPaq, grupo:getGrupo, ordinal:getOrdinal, status:getSatatus}; // etc.

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
	<label for="ordinal">Orden </label>
	<input type="number" id="ordinal" name="ordinal">
	<label for="status">Estatus </label>
	<input type="text" id="status" name="status">
	<input type="submit" name="Enviar" id="Enviar" value="Enviar">
</div>
</body>
</html>