<!DOCTYPE html>
<html lang="es">
    <head>
    <title>Calendarizacion de mantenimiento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style> @import url('../css_estilos/menu_inicial.css'); </style>
    </head>
    <body>
    <?php
    require_once '../Calendario/generar_consulta_calendario.php';
    $ayudante = new Generar_Consulta_Cal;
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['q']))
    {
        if($_GET['q'] == "N/A")
        {
            echo "Este registro no proviene de ninguna Actualización, Mejoras o Preservacion de Infraestructura.";
        }
        else
        {
            $ayudante->generar_consulta_calendario();
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