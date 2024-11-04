<body>
    <?php
        //Se incluyen las funciones que se utilizaran, ya que se encuentran en archivos externos
        include_once '../../include/obtener_anno_calendario.php';
        include_once '../../include/guardar_registro_calendario.php';
        include_once '../../include/actualizacion_dinamica_calendario.php';
        include_once '../../include/eliminar_reg_calendario.php';
        include_once '../../funciones_php/Configuracion_sesion.php';

       
        //Se crean los objetos que utilizaremos para llamar a las funciones externas
        $obj_obt_an_cal  = new Obtener_An_Calendario;
        $obj_gua_reg_cal = new Guardar_Reg_Calendario;
        $obj_act_din_cal = new Actualizacion_Dina_Calendario;
        $obj_eli_reg_cal = new Eliminar_Reg_Calendario;

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

        <br>
        <!--******COMIENZA EL CONTENIDO PRINCIPAL*********-->
        <main class="content">

        <div class="txt-title">
            <h1>Editar Calendarizacion</h1>
        </div>

        <div class="menu-anio">
            <div class="seleccionar-anio">
               <label for="anno_calendario" class="form-label">Ver historial del año:</label>
                    
               <select class="form-select form-select-sm" size="3" name="anno_calendario" id="anno_calendario" onchange="eliminarcalendario(this.value)">
                    <!-- <option selected disabled value=" ">Seleccione un año</option> -->
                    <?php $obj_obt_an_cal->obtener_anno_calendario(); ?>
                </select>
            </div>
        </div>

        <br>

                <!--INICIO DEL CODIGO PHP-->
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $Meses = array("Año", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diviembre");
            $idconsulta = $_POST["id_origen"];
            $nuevoestatus = $_POST["actualizacion"];

            //Aqui se llama a las funciones externas para que registren y actualicen el calendario
            $consulta = $obj_gua_reg_cal->guardar_registro_calendario();
            $obj_act_din_cal->actualizacion_dinamica_calendario($idconsulta, $nuevoestatus);

            //$consulta = $ayudante->manejador->guardar_registro_calendario();
            //$ayudante->manejador->actualizacion_dinamica_calendario($idconsulta,$nuevoestatus);



            echo "<div class='container-fluid'><h5 class='text-center'>Registro de calendario guardado con exito</h5>";
                
            echo "<div class='table-responsive'><table class='table table-bordered'><thead><tr><th scope='col'>Id</th><th scope='col'>No. inventario</th><th scope='col'>Descripción del bien</th><th scope='col'>Marca</th>
                <th scope='col'>Modelo</th><th scope='col'>No. serie</th><th scope='col'>Descripción de la ubicación</th><th scope='col'>Proveedor</th>
                <th scope='col'>Tipo de Mantenimiento</th><th scope='col'>Origen</th><th scope='col'>Fecha de realizacion</th><th scope='col'>Estatus</th></tr></thead>";
                
            echo "<tbody><tr><th scope='row'>".$consulta["IdCalendario"]."</th><td>".$consulta["NumInventario"]."</td><td>".$consulta["DescBien"]."</td><td>".$consulta["Marca"]."</td><td>".$consulta["Modelo"]."</td>
                <td>".$consulta["NumSerie"]."</td><td>".$consulta["DescUbicacion"]."</td><td>".$consulta["Proveedor"]."</td><td>".$consulta["TipoMantenimiento"]."</td><td>".$consulta["Origen"]."</td><td>".$Meses[$consulta["FechaMes"]]." ".$consulta["FechaAnno"]."</td><td>".$consulta["Estatus"]."</td></tr></tbody></table></div></div>";
                
            echo '<form action="../Calendario/" method="get">
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
                                    <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Eliminar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="reg_eliminar" value="'.$consulta["IdCalendario"].'" aria-describedby="id de mantenimiento" readonly>
            </form>';
        }

        //ESTO ES PARA QUE SE ELIMINE EL REGISTRO, O EN ESTE CASO, SE INHABILITE EL REGISTRO

        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['reg_eliminar']))
            {
                $calendarioEliminar = $_GET["reg_eliminar"];

                $obj_eli_reg_cal->eliminar_registro_calendario($calendarioEliminar);
                //$ayudante->manejador->eliminar_reg_calendario($calendarioEliminar);
                header('Location: ../Calendario/');
            }
        ?>


            <!--SE INTENTA IMPRIMIR LAS TABLAS PARA QUE SEAN RESPONSIVAS-->
        <button type="button" id="tabla" class="cambiar_vista">Cambiar vista</button>

        <br>
                        <!--COTENEDOR DE LA TABLA DE DATOS-->
        <div class="container-fluid text-center">
            <div class="contenedorPrincipal table-responsive-xs text-center">
                <div id="CalendarioAnual"></div>              
            </div>
        </div>
      
    </main>
             <!--FOOTER EL SITIO-->
        <footer class="text-center">
            <div class="text-center p-3">
                Benemerita Universidad Autonoma de Puebla:
                Laboratorio Nacional de Supercomputo del Sureste de Mexico
            </div>
        </footer>

                <!--MUESTRA EN UNA VENTANA EMERGENTE LOS DATOS DEL REGISTRO QUE HEMOS SELECCIONADO-->
        <div class="modal fade" id="visualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-info">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Datos de infraestructura</h1>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid text-center" id="tabladatos"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

                <!--MUESTRA INFORMACION DE UN REGISTRO VINCULADO A LA CANDELARIZACION-->
        <form action="../Editar_registro" method="post">
            <div class="offcanvas offcanvas-bottom" tabindex="-1" id="reprogramacion" aria-labelledby="offcanvasScrollingLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Recalendarizar infraestructura</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div class="container-fluid text-center" id="consultacalendario"></div>
                    <div class="container-fluid d-flex justify-content-end">
                        <button type="button" class="btn btn-lg" id="botones" data-bs-toggle="modal" data-bs-target="#termino">Finalizar</button>
                    </div>
                </div>
            </div>

                        <!--VENTANA EMERGENTE QUE MUESTRA UN MENSAJE DE CORRECCION DE DATOS-->
            <div class="modal" id="termino">
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


                        <!--MENSAJE EMERGENTE QUE PREGUNTA SI QUIERES ELIMINAR UN REGISTRO-->
        <form action="../Editar_registro/" method="get">
            <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="eliminar">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h1 class="modal-title fs-5 text-white">Advertencia: ¿está seguro de elimininar la siguiente entrada?</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid text-center" id="consultaeliminar"></div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-danger" type="submit" data-bs-dismiss="modal">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="../../favicon.ico" class="rounded me-2" width="20" height="20">
                    <strong class="me-auto">Server</strong>
                    <small>Ahora</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <div class="conteiner text-center" id="respuesta"></div>
                </div>
            </div>
        </div>
    </body>
    <script src="../../scripts_mantenimiento/scripts_consultas.js"></script>
    <script src="../../scripts_mantenimiento/scripts_rutinarios.js"></script>
    <script src="../../js/bootstrap.bundle.min.js"></script>
</html>
