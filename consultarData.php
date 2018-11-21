<?php
include "db.php";

if(isset($_POST['barCode'])){
	$con = connect();
  $barCode=$_POST['barCode'];
	$serviceNum=substr($barCode, 2,13);
  $pay=substr($barCode, 20,29);

	$consulta="SELECT  serviceName, barCode, serviceNum, dateIntro,texStatus, orderGrup FROM Servicios WHERE serviceNum='$serviceNum' LIMIT 1";
  $resultado = mysqli_query($con , $consulta);

  $misdatos = mysqli_fetch_assoc($resultado))
  echo $misdatos["serviceName"];
  echo $misdatos["barCode"];
  echo $serviceNum;
  echo $pay;
  echo $misdatos["texStatus"];


}

?>