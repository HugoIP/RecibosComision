<?php
include "db.php";
$msg="NoProcess";
echo "init";
if(isset($_GET['barCode'])){
	$con = connect();

  $serviceNum=$_GET['serviceNum'];
  $barCode=$_GET['barCode'];
  $dateIntro= date("Y-m-d");
  $texStatus=$_GET['texStatus'];
  $orderGrup=$_GET['orderGrup'];
  $limitPay=$_GET['limitPay'];
echo " get ";
	$consulta="UPDATE Servicios SET barCode='$barCode', dateIntro='$dateIntro',texStatus='$texStatus', orderGrup='$orderGrup', limitPay='$limitPay' WHERE serviceNum='$serviceNum'";
  mysqli_query($con , $consulta);
  echo " get 2";
  $msg="Ok";
}
echo $msg;
  


?>