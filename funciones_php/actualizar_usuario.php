<!DOCTYPE html>
<html lang="es">
    <head>
    <title>Calendarizacion de mantenimiento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style> @import url('../css_estilos/estilos.css'); </style>
    </head>
    <body>
    <?php
    
    include_once '../include/Usuario/consulta_actualizar_usuario.php';


    $ayudante = new Consulta_Actualizar_Usuario;

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['q']))
    {
        if(is_null($_GET['q']))
        {
            echo "Este usuario no existe o ha sido eliminado.";
        }
        else
        {
            $ayudante->consultaActualizarUsuario();
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