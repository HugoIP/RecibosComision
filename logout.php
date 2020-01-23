<?php
// Always start this first
session_start();

// Destroying the session clears the $_SESSION variable, thus "logging" the user
// out. This also happens automatically when the browser is closed
$username=$_SESSION['user_id'];
$userlocation=$_SESSION['user_location'];
$past = new DateTime;
$now = new DateTime;
$past =$_SESSION['user_date_init'] ;
if(isset($username))
{
$interval = $past->diff($now);
$difTime= $interval->format("%H:%I:%S");
$momentInit=$past->format( 'd-m-Y H:i:s' );
$momentEnd=$now->format( 'd-m-Y H:i:s' );
}


session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Cerrar de Sesion</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />

  </head>

<body>
<?php
	if(isset($username)){
		echo ('<h1 class="h3 mb-3 font-weight-normal">'.$username." haz terminado tu sesion correctamente</h1>");
		echo ("<p>".$userlocation."    Iniciaste: ".$momentInit."  Saliste: ".$momentEnd."</p>");
		echo ("<p>Tiempo de session ".$difTime."</p>");
		echo ('<a href="login.php">Identificarse</a> ');
	}
	else
	{
		echo ('<a href="login.php">Identificarse</a> ');
	}
?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
</body>
</html>