<?php
require 'Subsistemas.php';

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario']))
{
    $ayudante = new Cliente();
    $pepper = $ayudante->manejador->comprobar_usuario();
}
if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'sesion_expirada') {
    echo 'Tu sesión ha expirado. Por favor, inicia sesión de nuevo.';
    header("Location: /maninfrax/?mensaje=sesion_expirada");
}
?>
