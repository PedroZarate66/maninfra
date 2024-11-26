<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historial de registros</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <style> @import url('estilos.css'); </style>
        <?php require '../../funciones_php/Configuracion_sesion.php'; ?>
    </head>
    <body>
        <div class="p-3 text-center text-white" id="banner">
            <div class="row">
                <div class="col lns-logo d-flex justify-content-start">
                    <img src="../../LNS.png">
                </div>
                
                <div class="col minerva d-flex justify-content-end">
                    <img src="../../buap-negativo.png">
                </div>
            </div>
        </div>
        
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
 
        <nav class="banner2 navbar-expand">
            <div class="nav navbar-nav">
                <a class="btn btn-lg" id="botones-lat" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step">
                    Regresar 
                </a>
            </div>
        </nav>
        <main class="content">

        <div class="txt-title">
            <h1>Historial de registros diarios</h1>
        </div>

        <?php
            include_once '../../include/Registro/obtener_historial_registro.php';
            $obj_obt_his_reg = new Obtener_Hist_Registro;
        ?>
            <div class="container text-center">
                <h5 class="text-center">Tabla de registros</h5>
                <form action="../../include/inspeccion/inspeccion_registro.php" method="get">
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
    

    <footer class="text-center">
        <div class="text-center p-3">
                Benemerita Universidad Autonoma de Puebla:
                Laboratorio Nacional de Supercomputo del Sureste de Mexico
            
        </div>
    </footer>
    <script src="../../scripts_mantenimiento/scripts_rutinarios.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
    </body>
</html>