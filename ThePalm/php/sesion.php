<?php

include 'conexion.php';


//buscar si el usuario existe dentro de la base de datos o no 
 $buscarUsuario = "SELECT email, password, nombre FROM $tbl_name
 WHERE email = '$_POST[email]' ";
 $result = $conexion->query($buscarUsuario);

 // Resultado de la consulta
 $row = mysqli_fetch_assoc($result);
 $hash = $row['password'];

if ($_POST['password'] == $hash) {	
				
    $_SESSION['loggedin'] = true;
    $_SESSION['name'] = $row['nombre'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;	// 5 minutos de sesion activa					
    
    echo "<div class='alert alert-success mt-4' role='alert'><strong>Bienvenido...</strong> $row[nombre]			
    <p><a href='logout.php'>Cerrar Sesión</a></p></div>";	

} else {
      echo '<script type="text/javascript">'
        , 'window.location.href = "../index.html";'
        , 'alert("<h2>Email ó contraseña son  incorrecto!</h2>");'
        , '</script>';			
}
 
?>