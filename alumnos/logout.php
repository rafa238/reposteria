<?php
// Iniciar la sesión
session_start();

// Eliminar todas las variables de sesión
$_SESSION = array();

// Destruir la sesión
session_destroy();

// Redirigir a la página de inicio de sesión u otra página
header("Location: ./../login.php");
exit;
?>