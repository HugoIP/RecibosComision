 <?php
include ("database.php");
$count =0;
$string1 = file_get_contents('Recibos052022.json');
$json = json_decode($string1,true);
$servicios =  $json;

foreach($servicios as $servicio){
    $serviceNum= $servicio['serviceNum']; 
    $barCode= $servicio['barCode'];
    $monto= $servicio['monto'];
    $orderGrup= $servicio['orderGrup'];
    $ordinal= $servicio['ordinal'];
        $query = "UPDATE `servicios` SET `barCode`='$barCode',`serviceNum`='$serviceNum',`limitPay`='2022-05-30',`pay`='$monto',`dateDeliver`='0000-00-00',`texStatus`='-No-',`orderGrup`='$orderGrup',`ordinal`='$ordinal',`geoLoc`=1 WHERE serviceNum='$serviceNum'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            echo "No agregados:   ".$barCode." --- ".$serviceNum."   ++++++   \n";   
            die("Query error ".mysqli_error($connection));
            
        } 
        $count++;
        
}
echo $count;
?>