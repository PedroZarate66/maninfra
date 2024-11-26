<?php
require 'Configuracion_sesion.php';
require 'Subsistemas.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["idnuevo"])) 
{
    $ayudante = new Cliente();
    $idconsulta = $_POST["idnuevo"];
    $columna = $_POST["columna"];
    $entrada = $_POST["nueva_entrada"];
    $consulta = $ayudante->manejador->comprobar_contrasenna($_SESSION['id'], null);
    if($consulta || isset($_SESSION['pass']))
    {
        $_SESSION['pass'] = 'Si';
        $resultado = $ayudante->manejador->actualizar_inpeccion($idconsulta,$columna,$entrada);
        header('Location: Inspeccion_registro.php?'.$resultado.'&reg_detalles='.$idconsulta.'');
    }
    else
    {
        echo 'contraseña incorrecta';
    }
}
?>
