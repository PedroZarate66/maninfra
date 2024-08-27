<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Inspeccion diaria</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css_estilos/menu_inicial.css">
        <link rel="stylesheet" href="../css_estilos/pantalla.css">
    </head>
    <div
        class="p-3 text-center text-white" id="banner"
    >
        <div class="row">
                <div class="col d-flex justify-content-start">
                <img src="../LNS.png" height="64" width="170">
            </div>
            <div class="col">
                <h1>Inspecciones diarias</h1>
            </div>
            <div class="col d-flex justify-content-end">
                <img src="../buap-negativo.png" height="64" width="64">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="../menu_inicial/" aria-current="page"
                >Regresar</a>
        </div>
    </nav>
    <body><main class="content">
    <?php require '../funciones_php/Configuracion_sesion.php'; ?>
    <div
        class="container-fluid text-center"
    >
        <div
            class="row justify-content-center align-items-center g-2"
        >
            <div class="col"><a
                name="nueva_entrada"
                id="botones"
                class="btn btn-lg"
                href="Verificacion_sistemas/"
                role="button"
                >Entrada Nueva</a
            >
            </div>
            <div class="col">
                <a
                    name="historia_reg"
                    id="botones"
                    class="btn btn-lg"
                    href="Historial_Inspecciones/"
                    role="button"
                    >Historial</a
                >
            </div>
        </div>        
    </div>
    </main>
    <footer class="bg-body-tertiary text-center">
        <!-- Grid container -->
        
        <!-- Grid container -->
      
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
          Benemerita Universidad Autonoma de Puebla:
          <a class="text-body">Laboratorio Nacional de Supercomputo del Sureste de Mexico</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="../js/bootstrap.bundle.min.js"></script>
    </body>
</html>