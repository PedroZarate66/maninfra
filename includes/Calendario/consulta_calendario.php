
    <?php
    include_once 'desplegar_calendario.php';
    $ayudante = new Desplegar_Calendario;

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['q']))
    {
        $ayudante->desplegar_calT1();
        $ayudante->desplegar_calT2();
    }
    else
    {
        echo 'q no esta definida '.$sal;
    }
    ?>
