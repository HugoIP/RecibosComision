<?php
error_reporting(E_ALL); 
ini_set("display_errors", 1); 
include "db.php";
if(isset($_GET['ciclo'])){
	$con = connect();
  if($_GET['status']=="open")
  {
    $dateInit= date("Y-m-d H:i:s");

    $consulta="UPDATE Ciclos SET barCode='$barCode',dateDeliver='$dateDeliver',texStatus='$texStatus' WHERE serviceNum='$serviceNum'";
    //$consulta="UPDATE Servicios SET barCode='$barCode', limitPay=$limitPay, dateIntro=$dateIntro, texStatus=$texStatus, orderGrup=$orderGrup WHERE serviceNum=$serviceNum";
    mysqli_query($con,$consulta);
    mysqli_close($con);
  }

 
  mysqli_close($con);
  $con = connect();
   $result = mysqli_query($con,"SELECT * FROM Servicios WHERE serviceNum=$serviceNum");

 while($row = mysqli_fetch_array($result))
 {
    $msg =$msg."    ".$row['barCode'];
  }
}
mysqli_close($con);
echo $msg;
  


?>