<?php
require 'Subsistemas.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $ayudante = new Cliente();
    $idconsulta = $_POST["origen"];
    $consulta = $ayudante->manejador->actualizar_contrasenna($idconsulta);
    header('Location: ../Lista_usuarios/');
}
?>