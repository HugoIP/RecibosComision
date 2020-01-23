<?php
// Always start this first
session_start();
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
    	$usernam=$_POST['username'];
        $tryCheck=0;
        // Getting submitted user data from database
        $con = new mysqli("localhost","ihuancom_hugoip","MONICA","ihuancom_RecibosComision");
        $stmt = $con->prepare("SELECT * FROM Usuarios WHERE txt_userName = '$usernam'");
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $result = $stmt->get_result();
    	$user = $result->fetch_object();
    	// Verify user password and set $_SESSION
    	if ( $_POST['password'] == $user->txt_pass ) {
    		$_SESSION['user_id'] = $user->txt_userName;
            $_SESSION['user_location'] = $_POST['selectLocation'];
            $now   = new DateTime;
            $moment=$now->format( 'd-m-Y H:i:s' );
            $_SESSION['user_date_init'] = $now;
            $tryCheck=0;
    	}
        else
        {
            $tryCheck=2;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Inicio de Sesion</title>

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

  <body class="text-center">
    <?php
    // You'd put this code at the top of any "protected" page you create

    if ( isset( $_SESSION['user_id'] ) ) {
        // Grab user data from the database using the user_id
        // Let them access the "logged in only" pages
        echo ('<h1 class="h3 mb-3 font-weight-normal">Bienvenido/a  '.$_SESSION['user_id']."</h1>");
        echo ('<a href="logout.php">Salir</a> ');
          
    } 
    else 
    {
        if($tryCheck==2)
        {
            ?>
            <div class="alert alert-danger" role="alert">
 ! Datos incorrectos ¡
</div>
            <?php
        }

    ?>
    

    <form class="form-signin" action="" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Ingresar</h1>
      <div class="form-group">
      <label for="user" class="sr-only">Identificador</label>
      <input type="text" id="user" name="username" class="form-control" placeholder="Ingresa tu Identificador" required autofocus>
      </div>
      <div class="form-group">
      <label for="inputPassword" class="sr-only">Clave</label>
      <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Clave personal" required>
      </div>
      <div class="form-group">
      <select name="selectLocation" class="form-control">
          <option value="999" selected>Ubicacion</option> 
          <option value="0">vNova (Jardin 4, Santa Catarina Villanueva, Quecholac)</option>
          <option value="1">wNova (Guadalupe Victoria s/n, Barrio Guadalupe Analco, Gral. Felipe Angeles)</option>
        </select>
      </div>
      <div class="form-group">
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      </div>
      <p class="mt-5 mb-3 text-muted">&copy; 2020</p>
    </form>
    <?php
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>