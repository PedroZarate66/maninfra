<?php
include_once 'guardar_usuario.php';
include_once 'EnviarMensaje.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $obj_gua_usu = new Guardar_Usu;
    $obj_env_men = new Enviar_Mensaje;

    $consulta = $obj_gua_usu->guardar_usuario();

    $mensaje = "Se ha registrado a ".$_POST["nuevo_nombre"]." como nuevo usuario";
    $obj_env_men->EnviarMensaje($mensaje);
    

    header('Location: ../../Registrar_usuario/?mensaje=usuario_guardado');
}
?>
