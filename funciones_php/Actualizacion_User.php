<?php
include_once '../include/Usuario/actualizar_contrasenna.php';
include_once '../include/Telegram/EnviarMensaje.php';
include_once 'Configuracion_sesion.php';
include_once '../include/Calendario/consulta_calendario_individual.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $ayudante = new Actualizar_Contrasenna;
    $env_mens = new Enviar_Mensaje;
    $consul_usu = new Consulta_Calend_Individual;

    $idconsulta = $_POST["origen"];
    $codigoCreado = $_POST["codigoCreado"];
    $codigoV     = $_POST["codigo"];

    if($codigoCreado == $codigoV){
        $consulta = $ayudante->ActualizarContrasenna($idconsulta);
        $usuario = $consul_usu->consulta_usuario_individual($idconsulta);
    
        $mensaje = "La contraseña del usuario " . $usuario['nombreUsuario'] . " a sido actualizada por ".$_SESSION["usuario"];
        $env_mens->EnviarMensaje($mensaje);
    
        header('Location: ../Lista_usuarios/');
    }else{
        echo "  <script>
                    alert('Codigo incorrecto');
                    window.location= '../Lista_usuarios/'
                </script>";
    }

   
}
?>
