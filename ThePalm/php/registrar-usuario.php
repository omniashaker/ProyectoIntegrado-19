<?php
include 'conexion.php';

//buscar si el usuario existe dentro de la base de datos o no 
 $buscarUsuario = "SELECT * FROM $tbl_name
 WHERE email = '$_POST[email]' ";
 $result = $conexion->query($buscarUsuario);
 $count = mysqli_num_rows($result);
 //si ya existe se le dirige a la pagina principal
 if ($count == 1) {
 echo '<script type="text/javascript">'
   , 'window.location.href = "../index.html";'
   , 'alert("El usuario ya está registrado.");'
   , '</script>';
 }
 //sino se añade los datos a la tabla de usuarios
 else{
 $query = "INSERT INTO Usuarios (nombre, apellidos,email,password,tipo_usuario)
           VALUES ('$_POST[nombre]', '$_POST[apellidos]','$_POST[email]','$_POST[password]','c')";
 if ($conexion->query($query) === TRUE) {
    echo '<script type="text/javascript">'
    , 'window.location.href = "../index.html";'
    , 'alert("<h2>El usuario se ha creado correctamente.</h2>");'
    , '</script>';
 }
 else {
    echo '<script type="text/javascript">'
    , 'window.location.href = "../index.html";'
    , 'alert("Error al crear el usuario.' . $query . '<br>' . $conexion->error .'");'
    , '</script>';
   }
 }
 mysqli_close($conexion);
?>
