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
    require 'Subsistemas.php';
    $ayudante = new Cliente();
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if(isset($_GET['r']) && $_GET['r'] == 'Reprogramado')
        {
            $anno = date('Y');
            $annomasuno = $anno++;
            $id = $_GET['q'];
            $cambio = $_GET['r'];
            $consulta = $ayudante->manejador->recadelario_dinamica_calendatio();
            echo '<input type="hidden" class="form-control" id="id_origen" name="id_origen" value="'.$id.'" aria-describedby="id de mantenimiento" readonly>
            <input type="hidden" class="form-control" id="actualizacion" name="actualizacion" value="'.$cambio.'" aria-describedby="id de mantenimiento" readonly>';
        }else
        {
            $id = $_GET['q'];
            $cambio = $_GET['r'];
            $ayudante->manejador->actualizacion_dinamica_calendario($id,$cambio);
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