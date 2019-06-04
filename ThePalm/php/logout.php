<?php
//Cerrar la sesion actual 
session_start();
session_unset($_SESSION['email']);
session_destroy();
header('location: ../index.html');
?>