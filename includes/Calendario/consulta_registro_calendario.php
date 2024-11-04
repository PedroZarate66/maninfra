<!DOCTYPE html>
<html lang="es">
    <head>
    <title>Calendarizacion de mantenimiento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <style> @import url('../../mantenimientos/Editar_registro/estilos.css'); </style>
    </head>
    <body>
    <?php
    include_once 'consulta_dinamica_calendario.php';
    
    $ayudante = new Consulta_Dinamica_Calendario;

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['q']))
    {
        $ayudante->ConsultaDinamicaCalendario();
        
    }
    else
    {
        echo 'q no esta definida ';
    } 
    ?>
    </body>
    <script src="../js/bootstrap.bundle.min.js"></script>
</html>
