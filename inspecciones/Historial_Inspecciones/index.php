<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historial de registros</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style> @import url('../../css_estilos/menu_inicial.css'); </style>
        <link rel="stylesheet" href="../../css_estilos/pantalla.css">
        <?php require '../../funciones_php/Configuracion_sesion.php'; ?>
    </head>
    <body>
        <div class="p-3 text-center text-white" id="banner">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <img src="../../LNS.png" height="64" width="170">
                </div>
                <div class="col">
                    <h1>Historial de registros diarios</h1>
                </div>
                <div class="col d-flex justify-content-end">
                    <img src="../../buap-negativo.png" height="64" width="64">
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="btn text-dark nav-item nav-link" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step">
                    Regresar 
                </a>
                <a class="btn text-dark nav-item nav-link" data-bs-toggle="modal" data-bs-target="#menu_inicial" aria-current="step">
                    Inicio
                </a>
            </div>
        </nav>
        <div class="modal" id="regreso">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4>Advertencia</h4>
                    </div>
                    <div class="modal-body">
                        ¿Esta seguro que desea salir?
                    </div>
                    <div class="modal-footer">
                        <a name="boton_salida" id="boton_salida" class="btn btn-success" href="../../menu_inicial/" role="button">Aceptar</a>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="modal" id="menu_inicial">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4>Advertencia</h4>
                    </div>
                    <div class="modal-body">
                        ¿Esta seguro que desea salir?
                    </div>
                    <div class="modal-footer">
                        <a name="boton_salida" id="boton_salida" class="btn btn-success" href="../../menu_inicial" role="button">Aceptar</a>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <main class="content">
        <?php
        include_once '../../include/obtener_historial_registro.php';
        $obj_obt_his_reg = new Obtener_Hist_Registro;
        ?>
        <div class="container text-center">
            <h5 class="text-center">Tabla de registros</h5>
            <form action="../../include/inspeccion_registro.php" method="get">
            <div
                class="table-responsive"
            >
                <table
                    class="table table-light table-hover"
                >
                    <thead>
                        <tr>
                            <th scope="col">ID              </th>
                            <th scope="col">Dia de semana   </th>
                            <th scope="col">Fecha           </th>
                            <th scope="col">Entrada o salida</th>
                            <th scope="col">                </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $obj_obt_his_reg->obtener_historial_registro(); ?>
                    </tbody>
                </table>
            </div>
            </form>
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
    <script src="../../scripts_mantenimiento/scripts_rutinarios.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>