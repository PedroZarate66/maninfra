<!DOCTYPE html>
<html lang="es">
    <head>
    <title>Calendarizacion de mantenimiento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style> @import url('../css_estilos/propiedades_menu_inicial.css'); </style>
    </head>
    <body>
    <?php
    //require 'Subsistemas.php';
    include_once '../include/Calendario/actualizacion_dinamica_calendario.php';
    include_once '../include/Telegram/EnviarMensaje.php';
    include_once '../include/Calendario/consulta_calendario_individual.php';
    include_once '../include/recadelario_dinamica_calendatio.php';
    include_once 'Configuracion_sesion.php';
    $obj_env_mens = new Enviar_Mensaje;
    $obj_consul_cal = new Consulta_Calend_Individual;
    $obj_actua_dina = new Actualizacion_Dina_Calendario;
    $obj_Recaledario = new Recadelario_Dinamica_Calendatio;

    //$ayudante = new Cliente();

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if(isset($_GET['r']) && $_GET['r'] == 'Reprogramado')
        {
            $anno = date('Y');
            $annomasuno = $anno++;
            $id = $_GET['q'];
            $cambio = $_GET['r'];
            
            
            //CODIGO DONDE SE MANDA EL MENSAJE DE EDICION DE ARCHIVO

            //CODIGO DONDE SE INVOCA AL METODO PARA ENVIAR EL MENSAJE DE ELMINACION
            $registro = $obj_consul_cal->consulta_registro_individual($id);
            
            //SE OBTIENE EL NOMBRE DE USUARIO
            $usuario = $_SESSION['usuario'];
            //SE CREA EL MENSAJE Y DESPUES SE ENVIA
            $mensaje = 'Se ha reprogramado el registro: '.$registro["DescBien"]. ' el dia de hoy por el usuario '.$usuario;
            
           
            $consulta = $obj_Recaledario->RecadelarioDinamicaCalendatio();

            //$consulta = $ayudante->manejador->recadelario_dinamica_calendatio();
            //$consulta = $obj_Recaledario->RecaledarioDinamicaCalendario();
            echo '<input type="hidden" class="form-control" id="id_origen" name="id_origen" value="'.$id.'" aria-describedby="id de mantenimiento" readonly>
            <input type="hidden" class="form-control" id="actualizacion" name="actualizacion" value="'.$cambio.'" aria-describedby="id de mantenimiento" readonly>';

            
            //$obj_env_mens->EnviarMensaje($mensaje);

        }else
        {
            

            $id = $_GET["q"];
            $cambio = $_GET['r'];
            

         
            //CODIGO DONDE SE MANDA EL MENSAJE DE EDICION DE ARCHIVO
            //CODIGO DONDE SE INVOCA AL METODO PARA ENVIAR EL MENSAJE DE ELMINACION
            $registro = $obj_consul_cal->consulta_registro_individual($id);
            
            //SE OBTIENE EL NOMBRE DE USUARIO
            $usuario = $_SESSION['usuario'];
            //SE CREA EL MENSAJE Y DESPUES SE ENVIA
            $mensaje = 'Se cambio el estatus del registro: '.$registro["DescBien"]. ' a ' . $cambio. ' el dia de hoy por el usuario '.$usuario;
            $obj_env_mens->EnviarMensaje($mensaje);

            //SE ACTUALIZA EL STATUS DEL REGISTRO
            $obj_actua_dina->actualizacion_dinamica_calendario($id,$cambio);
        }
    }
    else
    {
        echo 'q no esta definida '.$sal;
    }
    ?>
    </body>
    <script src="../js/bootstrap.bundle.min.js"></script>
</html>