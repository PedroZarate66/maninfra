<?php
include_once '../include/Calendario/consulta_calendario_individual.php';
include_once '../include/Usuario/Eliminar_Usuario.php';
include_once '../include/Telegram/EnviarMensaje.php';
include_once 'Configuracion_sesion.php';



$ayudante        = new Eliminar_Usuario;
$obj_consul_cal  = new Consulta_Calend_Individual;
$obj_enviar_mens = new Enviar_Mensaje;

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    $idconsulta = $_POST["origen"];
    $codigo     = $_POST["codigoCreado"];//captura el codigo creado
    $codigoV    = $_POST["codigo"]; //captura el codigo que ingresa el usuario

    if($codigoV == $codigo){
        //CODIGO DONDE SE INVOCA AL METODO PARA ENVIAR EL MENSAJE DE ELMINACION
        $registro = $obj_consul_cal->consulta_usuario_individual($idconsulta);
            
        $consulta = $ayudante->EliminarUsuario($idconsulta);
        

        //     //SE OBTIENE EL NOMBRE DE USUARIO
        $usuario = $_SESSION['usuario'];
        //     //SE CREA EL MENSAJE Y DESPUES SE ENVIA
        $mensaje = 'Se ha eliminado al usuario: '.$registro["nombreUsuario"]. ' el dia de hoy por el usuario '.$usuario;
        
        $obj_enviar_mens->EnviarMensaje($mensaje);
        
        
        
        header('Location: ../Lista_usuarios/');
    }elseif($codigo != $codigoV || empty($codigoV)){
        //si se puede agregar un mensaje de error

        echo "  <script>
                        alert('Codigo incorrecto');
                        window.location= '../Lista_usuarios/'
                </script>";


        //header('Location: ../Lista_usuarios/');
    }




   
}
?>