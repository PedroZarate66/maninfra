<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Imprimir reporte</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
    </head>
    <body>

    <?php
        //Se incluyen las funciones que se utilizaran, ya que se encuentran en archivos externos
        include_once '../../include/Calendario/obtener_anno_calendario.php';
        include_once '../../funciones_php/Configuracion_sesion.php';

        //Se crean los objetos que utilizaremos para llamar a las funciones externas
        $obj_obt_an_cal  = new Obtener_An_Calendario;
        

        ?> 



        <!--***************BANNER QUE CONTIENE LOS LOGOS************************-->
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
        <!--*******************************************************************-->

        <!--************BANNER DOS CON BOTON DE REGRESAR***********************-->
        <nav class="banner2">
            <div class="nav">
                <a class="btn btn-lg" id="botones-lat" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step"
                    >Regresar</a>
            </div>
        </nav>
        <!--*******************************************************************-->
        
        <!--********MENSAJE DE ALERTA QUE PREGUNTA SI QUIERE SALIR*************-->
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
        <!--********************************************************************-->

 
        <!--******COMIENZA EL CONTENIDO PRINCIPAL*********-->
    <main class="content">
        <div class="txt-title">
            <h1>Imprimir Reporte</h1>
        </div>
        


        <div class="menu-anio">
            <div class="seleccionar-anio">
                <form action="../../include/Calendario/imprimir_datos.php" method="post" onsubmit="return validar()">
                    <label for="anno_calendario" class="form-label">Seleccione año:</label>

                    <select class="form-select form-select-sm" size="3" name="anio" id="anio">
                            <?php $obj_obt_an_cal->obtener_anno_calendario(); ?>
                    </select>

                    <button class="imprimir" type="submit">Imprimir reporte</button>
                </form>
            </div>
        </div>

    </main>
    
    <footer class="text-center">
        <div class="text-center p-3">
            Benemerita Universidad Autonoma de Puebla:Laboratorio Nacional de Supercomputo del Sureste de Mexico</a>
        </div>
    </footer>

    
      
    </body>

    <script src="scripts.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</html>