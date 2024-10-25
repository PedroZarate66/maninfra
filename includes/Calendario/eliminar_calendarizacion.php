<!DOCTYPE html>
<html lang="es">
    <head>
    <title>Calendarizacion de mantenimiento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style> @import url('../../css_estilos/menu_inicial.css'); </style>
    </head>
    <body>
    <?php
        require 'eliminar_registro_calendarizacion.php';

        $ayudante = new Eliminar_Registro_Calendarizacion;

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['q']))
        {
            $ayudante->eliminar_reg_calT1();
            $ayudante->eliminar_reg_calT2();
        }
        else
        {
            echo 'q no esta definida '.$sal;
        }
        
    ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</html>