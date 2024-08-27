<?php
require 'Subsistemas.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $ayudante = new Cliente();
    $consulta = $ayudante->manejador->guardar_usuario();
    header('Location: ../Registrar_usuario/');
}
?>