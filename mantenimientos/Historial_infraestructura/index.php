<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Calendarizacion de mantenimiento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
    </head>
<body>

        <?php
            require_once    '../../include/Calendario/guardar_registro_calendario.php';
            include_once    '../../include/Calendario/eliminar_reg_calendario.php';
            include_once    '../../include/Infraestructura/eliminar_mejora_infraestructura.php';
            include_once    '../../include/Infraestructura/obtener_datos_infraestructura.php';
            include_once '../../include/Telegram/EnviarMensaje.php';
            include_once '../../include/Calendario/consulta_calendario_individual.php';
            include_once '../../include/Infraestructura/consulta_infraestructura_individual.php';
            require_once    '../../funciones_php/Configuracion_sesion.php';

            $guardarRegCal   = new Guardar_Reg_Calendario;
            $obtDatInf       = new Obtener_Dat_Infraestructura;
            $eliminarRegCal  = new Eliminar_Reg_Calendario;
            $eliminarMejInf  = new Eliminar_Mej_Infraestructura;
            $obj_enviar_mens = new Enviar_Mensaje;
            $obj_consul_cal  = new Consulta_Calend_Individual;
            $obj_consul_inf  =new Consulta_Infraestructura_Ind;

            $Meses           = array("Año", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diviembre");
            $anno            = date('Y');
            $annomasuno      = $anno++;
        ?>

            <!-- PRIMER DIV PERTENECIENTE AL BANNER #1 -->
        <div class="p-3 text-center text-white" id="banner">
            <div class="row">
                    <div class="col d-flex justify-content-start">
                    <img src="../../LNS.png" height="64" width="170">
                </div>
                
                <div class="col d-flex justify-content-end">
                    <img src="../../buap-negativo.png" height="64" width="64">
                </div>
            </div>
        </div>

                    <!-- NAV PERTENECIENTE AL BOTON DE SALIR REGRESAR #2-->
        <nav class="banner2 navbar-expand">
            <div class="nav navbar-nav">
                <a class="btn btn-lg" id="botones-lat" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step">
                    Regresar
                </a>
            </div>
        </nav>
                    <!--DIV PERTENECIENTE AL BOTON DE REGRESO #3-->
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


                                        <!-- MAIN PERTENECIENTE AL CONTENIDO PRINCIPAL DEL SITIO #4-->
    <main class="content">

                    <!--PRIMER DIV #1-->
        <div class="container-fluid text-center">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                //Se ha declarado un objeto para que se pueda acceder al metodo que contiene la clase
                //$guardarRegCal = new Guardar_Registro_Calendario();
                $consulta = $guardarRegCal->guardar_registro_calendario();
                //funcion pertenecientes a Subsistemas.php
                //$consulta = $ayudante->manejador->guardar_registro_calendario();
                echo "<div class='container-fluid'><h5 class='text-center'>Registro de calendario guardado con exito</h5>";

                echo "<div class='table-responsive'><table class='table table-bordered'><thead><tr><th scope='col'>Id</th><th scope='col'>No. inventario</th><th scope='col'>Descripción del bien</th><th scope='col'>Marca</th>
                <th scope='col'>Modelo</th><th scope='col'>No. serie</th><th scope='col'>Descripción de la ubicación</th><th scope='col'>Proveedor</th>
                <th scope='col'>Tipo de Mantenimiento</th><th scope='col'>Origen</th><th scope='col'>Fecha de realizacion</th><th scope='col'>Estatus</th></tr></thead>";
                
                echo "<tbody><tr><th scope='row'>".$consulta['IdCalendario']."</th><td>".$consulta['NumInventario']."</td><td>".$consulta['DescBien']."</td><td>".$consulta['Marca']."</td><td>".$consulta['Modelo']."</td>
                <td>".$consulta['NumSerie']."</td><td>".$consulta['DescUbicacion']."</td><td>".$consulta['Proveedor']."</td><td>".$consulta['TipoMantenimiento']."</td><td>".$consulta['Origen']."</td><td>".$Meses[$consulta['FechaMes']]." ".$consulta['FechaAnno']."</td><td>".$consulta['Estatus']."</td></tr></tbody></table></div></div>";
                
                echo '<form action="../Entrada_calendario/" method="get">
                <div class="container-fluid d-flex justify-content-end">
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar</button>
                    <div class="modal" id="eliminar">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header bg-warning">
                                    <h4 class="modal-title">Advertencia</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Esta seguro que desea eliminar el registro?.
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit" name="reg_eliminar" value="'.$consulta['IdCalendario'].'" data-bs-dismiss="modal">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>';
            }
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['reg_eliminar']))
            {
                $calendarioEliminar = $_GET["reg_eliminar"];
                //Se declara el objeto para que se pueda manejar los metodos que contiene la clase
                
                
                //CODIGO DONDE SE INVOCA AL METODO PARA ENVIAR EL MENSAJE DE ELMINACION
                $registro = $obj_consul_cal->consulta_registro_individual($calendarioEliminar);
                //SE OBTIENE EL NOMBRE DE USUARIO
                $usuario = $_SESSION['usuario'];
                //SE CREA EL MENSAJE Y DESPUES SE ENVIA
                $mensaje = 'Se ha eliminado el registro: '.$registro["DescBien"]. ' el dia de hoy por el usuario '.$usuario;
                $obj_enviar_mens->EnviarMensaje($mensaje);

                $eliminarRegCal->eliminar_registro_calendario($calendarioEliminar);
                header('Location: ../Entrada_calendario/');
            }
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['origen']))
            {
                $infraestructuraEliminar = $_GET["origen"];
              
                
                
                //CODIGO DONDE SE INVOCA AL METODO PARA ENVIAR EL MENSAJE DE ELMINACION
                $registro = $obj_consul_inf->consulta_infraestructura_individual($infraestructuraEliminar);
                //SE OBTIENE EL NOMBRE DE USUARIO
                $usuario = $_SESSION['usuario'];
                //SE CREA EL MENSAJE Y DESPUES SE ENVIA
                $mensaje = 'Se ha eliminado el registro: < '.$registro["Descripcion"]. ' > el dia de hoy por el usuario '.$usuario;
                $obj_enviar_mens->EnviarMensaje($mensaje);

                $eliminarMejInf->eliminar_mejora_infraestructura($infraestructuraEliminar);
                header('Location: ../Historial_infraestructura/');
            }
            ?>
        </div>
            
        <div class="txt-title">
            <h1>Historial de Actualizacion, Mejoras y Preservacion de Infraestructura</h1>
        </div>

        <!--SE INTENTA IMPRIMIR LAS TABLAS PARA QUE SEAN RESPONSIVAS-->
                    <!--SEGUNDO ELEMENTO #2-->
        <button type="button" id="tabla" class="cambiar_vista">Cambiar vista</button>
         
                    <!--TERCER ELEMENTO #3-->
        <form action='../../funciones_php/Editar_infraestructura.php' method='get'>
            <div class="contenedortabla">
                <div class="tablauno">
                    <?php $obtDatInf->obtener_datos_infraestructuraT1(); ?>
                
                </div>

                <div class="tablados">
                    <?php $obtDatInf->obtener_datos_infraestructuraT2(); ?>
                </div>
            </div>
        </form>
        <!--********************************************************-->

            <!--TITULO DEL SEGUNDO FORMULARIO #4-->
        <br>
            <h5 class="text-center">Calendarizar infraestructura</h5>
        <br>
            
        <!--ESTE DIV NOS SIRVE PARA IMPRIMIR UN FORMULARIO PARA CORROBORAR QUE
        ES EL REGISTRO QUE QUEREMOS ENLAZAR Y CALENDARIZAR #5-->
        <div class="container-fluid text-center formulariodos" id="tabladatos"></div>

        <!--FORMULARIO DONDE MUESTRA LOS DATOS QUE SE HAN INGRESADO
        CON EL OPORTUNIDAD DE INSERTARLOS EN LA BD #6-->
        <form action="../Entrada_calendario/" method="post">
                <div class="contenedorform">
                    <!--SE HA OPTADO POR DIVIDIR EL FORMULARIO YA QUE SE NECESITA QUE SE
                    ADAPTE A PANTALLAS PEQUEÑAS-->
                    <div class="formuno">
                        <table class="table table-light table-striped align-middle">
                            <thead>
                                <tr>
                                    <th scope="col"><label for="num_inventario" class="form-label">No. inventario</label></th>
                                    <th scope="col"><label for="Desc_bien" class="form-label">Descripción del bien</label></th>
                                    <th scope="col"><label for="marca" class="form-label">Marca</label></th>
                                    <th scope="col"><label for="modelo" class="form-label">Modelo</label></th>
                                    <th scope="col"><label for="num_serie" class="form-label">No. serie</label></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!--PRIMER INPUT DEL FORMULARIO-->
                                    <td scope="row">
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="num_inventario"
                                            id="num_inventario"
                                            aria-describedby="numero de inventario que recibira mantenimiento"
                                            placeholder="Numero de inventario"
                                        />
                                    </td>
                                    <!--SEGUNDO INPUT DEL FORMULARIO-->
                                    <td>
                                        <textarea class="form-control" name="Desc_bien" id="Desc_bien" rows="3" required></textarea>
                                    </td>
                                    <!--TERCER INPUT DEL FORMULARIO-->
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="marca"
                                            id="marca"
                                            aria-describedby="marca de la pieza"
                                            placeholder="Marca"
                                        />
                                    </td>
                                    <!--CUARTO INPUT DEL FORMULARIO-->
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="modelo"
                                            id="modelo"
                                            aria-describedby="modelo de la pieza"
                                            placeholder="Modelo"
                                        />
                                    </td>
                                    <!--QUINTO INPUT DEL FORMULARIO-->
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="num_serie"
                                            id="num_serie"
                                            aria-describedby="numero de serie de la pieza"
                                            placeholder="Numero de serie"
                                        />
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--AQUI INICIA LA SEGUNDA PARTE DEL FORMULARIO-->
                    <div class="formdos">
                        <table class="table table-light table-striped align-middle">
                            <thead>
                                <tr>
                                    <th scope="col"><label for="ubicacion_Desc" class="form-label">Descripción de la ubicación</label></th>
                                    <th scope="col"><label for="proveedor" class="form-label">Proveedor</label></th>
                                    <th scope="col"><label for="tipo_mantenimiento" class="form-label">Tipo de mantenimiento</label></th>
                                    <th scope="col">Fecha de realizacion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <!--PRIMER INPUT DE LA SEGUNDA PARTE-->
                                    <td>
                                        <textarea class="form-control" name="ubicacion_Desc" id="ubicacion_Desc" rows="3" required></textarea>
                                    </td>
                                    <!--SEGUNDO INPUT DE LA SEGUNDA PARTE-->
                                    <td>
                                        <input
                                            type="text"
                                            class="form-control"
                                            name="proveedor"
                                            id="proveedor"
                                            aria-describedby="proveedor de la pieza"
                                            placeholder="Proveedor"
                                            required
                                        />
                                    </td>
                                    <!--TERCERA PARTE DE LA SEGUNDA PARTE-->
                                    <td>
                                        <select class="form-select" name="tipo_mantenimiento" id="tipo_mantenimiento" aria-label="tipo de mantenimiento a realizar" required>
                                            <option selected disabled value="">Porfavor seleccione una opcion</option>
                                            <option value="Correctivo">Correctivo</option>
                                            <option value="Preventivo">Preventivo</option>
                                            <option value="Predictivo">Predictivo</option>
                                        </select>
                                    </td>
                                    <!--CUARTA PARTE DE LA SEGUNDA PARTE-->
                                    <td class="align-top">
                                        <div class="row">
                                            <div class="col">
                                                <label for="mes" class="form-label">Mes</label>
                                                    <select class="form-select" name="mes" id="mes" aria-label="Nivel de prioridad" required>
                                                        <option selected disabled value="">Seleccione mes</option>
                                                        <option value="1">Enero</option>
                                                        <option value="2">Febrero</option>
                                                        <option value="3">Marzo</option>
                                                        <option value="4">Abril</option>
                                                        <option value="5">Mayo</option>
                                                        <option value="6">Junio</option>
                                                        <option value="7">Julio</option>
                                                        <option value="8">Agosto</option>
                                                        <option value="9">Septiembre</option>
                                                        <option value="10">Octubre</option>
                                                        <option value="11">Noviembre</option>
                                                        <option value="12">Diciembre</option>
                                                    </select>
                                            </div>
                                            <div class="col">
                                                <label for="anno" class="form-label">Año</label>
                                                    <select class="form-select form-select-sm" name="anno" id="anno" required>
                                                        <option selected disabled value="">Seleccione año</option>
                                                        <option value="<?php echo $annomasuno; ?>"><?php echo $annomasuno; ?></option>
                                                        <option value="<?php echo $anno; ?>"><?php echo $anno; ?></option>
                                                    </select>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="finalizar">
                    <button type="button" class="btn btn-lg" id="botones_desp" data-bs-toggle="modal" data-bs-target="#termino2">Finalizar</button>
                </div>
      
      
            <!--INICIO DEL BOTON DE TERMINO, PREGUNTA SI ES CORRECTA LA INFORMACION
            INGRESADA ANTES DE CONTINUAR--> 
            <div class="modal" id="termino2">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h4 class="modal-title">Advertencia</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Por favor asegure que todos los datos sean correctos antes de continuar.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

                        <!--FORMULARIO EMERGENTE QUE CORROBORA EL REGISTRO A EDITAR #7-->
        <form action="../../funciones_php/Editar_infraestructura.php" method="get">
        <div class="modal fade" id="editar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Esta seguro de que desea realizar cambios a la siguiente entrada?</h1>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid text-center" id="tabladatosEditar"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!--*********************************************************-->

                        <!--FORMULARIO PARA CORROBORAR EL ELIMINAR EL REGISTRO #8-->
        <form action="../Historial_infraestructura/" method="get">
        <div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">¿Esta seguro de que desea eliminar la siguiente entrada?</h1>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid text-center" id="tabladatosEliminar"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
        <!--*********************************************************-->
                 
                      <!--FOOTER DEL SITIO-->
        <footer class="text-center footer">
            <div class="text-center p-3">
                Benemerita Universidad Autonoma de Puebla:Laboratorio Nacional de Supercomputo del Sureste de Mexico
            </div>
        </footer>
    </main>
                    
    
    <script src="../../scripts_mantenimiento/scripts_consultas.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>