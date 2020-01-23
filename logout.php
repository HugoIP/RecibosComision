<!DOCTYPE html>
<html>
<head>
	<title>Salir</title>
</head>
<body>
<?php
// Always start this first
session_start();

// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
echo ("<h2>"+$_SESSION['user_id']+" haz terminado tu sesion</h2>");
session_destroy();


	echo ('<a href="login.php">Identificarse</a> ');
?>
</body>
</html>