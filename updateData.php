<?php
include "db.php";

if(isset($_POST['barCode'])){
	$con = connect();
  $serviceNum=$_POST['serviceNum'];
  $barCode=$_POST['barCode'];
  $dateIntro= date("Y-m-d");
  $texStatus=$_POST['texStatus'];
  $orderGrup=$_POST['orderGrup'];
  $limitPay=$_POST['limitPay'];

	$consulta="UPDATE servicios SET barCode='$barCode', dateIntro='$dateIntro',texStatus='$texStatus', orderGrup='$orderGrup', limitPay='$limitPay'WHERE serviceNum='$serviceNum'";
  mysqli_query($con , $consulta);
  echo "Ok";
}

?>