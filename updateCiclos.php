<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1); 
include "db.php";
$ciclo=$_GET['ciclo'];
$msg="Log ". $ciclo;
if(isset($_GET['ciclo'])){
	$con = connect();
  //if($_GET['status']=="open")
  //{
    //var params = {ciclo:getCiclo, poblacion:getPoblacion, importe:getImporte,total:getTotal, operador:getOperador, paq:getPaq, paq:getPaq, grupo:getGrupo, ordinal:getOrdinal, status:getStatus};
    $dateInit= date("Y-m-d H:i:s");
    $poblacion=$_GET['poblacion'];
    $importe=$_GET['importe'];
    $total=$_GET['total'];
    $operador=$_GET['operador'];
    $paq=$_GET['paq'];
    $grupo=$_GET['grupo'];
    $ordinal=$_GET['ordinal'];
    $status=$_GET['status'];
$msg=$msg." :p: ".$poblacion;
    $consulta="INSERT INTO Ciclos (fechaCiclo, ciclo, poblacion, importe, totalRecibos, operador, paquetesTam, groupOrder, ordinal, status) VALUES ($dateInit,$ciclo,$poblacion,$importe,$total,$operador,$paq,$grupo,$ordinal,$status)";
    //$consulta="UPDATE Servicios SET barCode='$barCode', limitPay=$limitPay, dateIntro=$dateIntro, texStatus=$texStatus, orderGrup=$orderGrup WHERE serviceNum=$serviceNum";
    mysqli_query($con,$consulta);
    mysqli_close($con);
  //}

 
$msg=$msg." :st: ";
  $con = connect();
   $result = mysqli_query($con,"SELECT * FROM Ciclos WHERE ciclo=$ciclo");

 while($row = mysqli_fetch_array($result))
 {
    $msg =$msg."    ".$row['poblacion'];
  }
}
mysqli_close($con);
echo $msg;
  


?>