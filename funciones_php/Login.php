<?php
require 'Subsistemas.php';
// login.php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario']))
{
    $ayudante = new Cliente();
    $pepper = $ayudante->manejador->comprobar_usuario(); //aqui marca error
}
if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'sesion_expirada') {
    echo 'Tu sesión ha expirado. Por favor, inicia sesión de nuevo.';
    header("Location: /maninfra/?mensaje=sesion_expirada");
}
?>