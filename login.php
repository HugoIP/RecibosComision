<?php
// Always start this first
session_start();
if ( ! empty( $_POST ) ) {
    if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
    	$usernam=$_POST['username'];

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
    	}
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Identificacion</title>
</head>
<body>

<h1>Recibos CFE</h1>

<?php
// You'd put this code at the top of any "protected" page you create

if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
	echo ("<h2>Bienvenido/a  ".$_SESSION['user_id']."</h2>");
	echo ('<a href="logout.php">Salir</a> ');
	  
} else {
    // Redirect them to the login page
    echo ('
    <form action="" method="post">
	    <input type="text" name="username" placeholder="Ingresa tu Identificador" required>
	    <input type="password" name="password" placeholder="Clave personal" required>
        <!-- The second value will be selected initially -->
        <select name="selectLocation">
          <option value="0" selected>Ubicacion</option> 
          <option value="1">vNova (Jardin 4, Santa Catarina Villanueva, Quecholac)</option>
          <option value="2">wNova (Guadalupe Victoria s/n, Barrio Guadalupe Analco, Gral. Felipe Angeles)</option>
        </select>
	    <input type="submit" value="Ingresar">');  
}
?>

</form>
</body>
</html>