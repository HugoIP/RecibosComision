<?php
// Always start this first
session_start();

// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
$username=$_SESSION['user_id'];
$past = new DateTime;
$now = new DateTime;
$past =$_SESSION['user_date_init'] ;
$interval = $past->diff($now);
$difTime= $interval->format("%H:%I:%S");
$momentInit=$past->format( 'd-m-Y H:i:s' );
$momentEnd=$now->format( 'd-m-Y H:i:s' );
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Salir</title>
</head>
<body>
<?php

echo ("<h1>".$username." haz terminado tu sesion correctamente</h1>");
echo ("<p>Iniciaste: ".$momentInit."  Saliste: ".$momentEnd."</p>");
echo ("<p>Tiempo de session ".$difTime."</p>");


	echo ('<a href="login.php">Identificarse</a> ');
?>
</body>
</html>