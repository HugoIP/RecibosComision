<?php
include "db.php";
$msg="NoProcess";
echo "init";
if(isset($_POST['barCode'])){
  echo "in _";
	$con = connect();

  $serviceNum=$_POST['serviceNum'];
  $barCode=$_POST['barCode'];
  $dateIntro= date("Y-m-d");
  $texStatus=$_POST['texStatus'];
  $orderGrup=$_POST['orderGrup'];
  $limitPay=$_POST['limitPay'];
echo "get";
	$consulta="UPDATE servicios SET barCode='$barCode', dateIntro='$dateIntro',texStatus='$texStatus', orderGrup='$orderGrup', limitPay='$limitPay' WHERE serviceNum='$serviceNum'";
  mysqli_query($con , $consulta);
  echo "update";
  $sql = "SELECT * FROM servicios WHERE serviceNum='$serviceNum'";
  $result = $conn->query($sql);
  echo "select";

  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {  
  //name, telefono, email, Dia, Mes, UltimoCelebrado
          $barCode = $row['barCode'];
        
      }
      $msg= $barCode;
  }
  else
  {
    $msg= "Error";
  }
}
echo $msg;
  


?>