<?php
include_once 'guardar_usuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $obj_gua_usu = Guardar_Usu;
    $consulta = $obj_gua_usu->guardar_usuario();
    header('Location: ../Registrar_usuario/?mensaje=usuario_guardado');
}
?>
