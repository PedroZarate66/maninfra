<?php
require 'Configuracion_sesion.php';

// Eliminar todas las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

header("Location: ../");
exit;

?>