<!DOCTYPE html>
<html lang="es">
    <head>
    <title>Calendarizacion de mantenimiento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
        <style> @import url('../css_estilos/menu_inicial.css'); </style>
    </head>
    <body>
    <?php
    require_once 'generar_consulta_calendario.php';
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>