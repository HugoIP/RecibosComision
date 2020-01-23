<?php
// Always start this first
session_start();

// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
$username=$_SESSION['user_id'];
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Salir</title>
</head>
<body>
<?php

echo ("<h1>".$username." haz terminado tu sesion</h1>");



	echo ('<a href="login.php">Identificarse</a> ');
?>
</body>
</html>