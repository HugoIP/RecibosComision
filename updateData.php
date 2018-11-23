<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1); 
include "db.php";
$msg="No procces ";
if(isset($_GET['barCode'])){
	$con = connect();
  $msg=$msg." if ";
  $serviceNum=$_GET['serviceNum'];
  $barCode=$_GET['barCode'];
  $dateIntro= date("Y-m-d");
  $texStatus=$_GET['texStatus'];
  $orderGrup=$_GET['orderGrup'];
  $limitPay=$_GET['limitPay'];

  $msg=$msg." = ".$limitPay."  :".$dateIntro."  :".$texStatus."  :".$orderGrup."  :".$serviceNum."  =";

  $consulta="UPDATE Servicios SET barCode='$barCode',limitPay='$limitPay' WHERE serviceNum=$serviceNum";
	//$consulta="UPDATE Servicios SET barCode='$barCode', limitPay=$limitPay, dateIntro=$dateIntro, texStatus=$texStatus, orderGrup=$orderGrup WHERE serviceNum=$serviceNum";
  mysqli_query($con,$consulta);
  mysqli_close($con);
  $con = connect();
   $result = mysqli_query($con,"SELECT * FROM Servicios WHERE serviceNum=$serviceNum");

 while($row = mysqli_fetch_array($result))
 {
    $msg =$msg."    ".$row['barCode'];
  }
}
$msg=$msg." wi ";
mysqli_close($con);
echo $msg;
  


?>