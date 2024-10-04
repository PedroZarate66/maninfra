<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Calendarizacion de mantenimiento</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style> @import url('../../css_estilos/menu_inicial.css'); </style>
        <link rel="stylesheet" href="../../css_estilos/pantalla.css">
    </head>
   <body>

        <?php
                   //SE LLAMAN LOS ARCHIVOS QUE SE VAN A UTILIZAR
            require_once    '../../include/guardar_registro_calendario.php';
            include_once    '../../include/eliminar_reg_calendario.php';
            include_once    '../../include/eliminar_mejora_infraestructura.php';
            include_once    '../../include/obtener_datos_infraestructura.php';
            require_once    '../../funciones_php/Configuracion_sesion.php';

                    //SE DECLARAN LOS OBJETOS QUE UTILIZARAN LOS METODOS NECESARIOS
            $guardarRegCal   = new Guardar_Reg_Calendario;
            $obtDatInf       = new Obtener_Dat_Infraestructura;
            $eliminarRegCal  = new Eliminar_Reg_Calendario;
            $eliminarMejInf  = new Eliminar_Mej_Infraestructura;

            $Meses           = array("Año", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diviembre");
            $anno            = date('Y');
            $annomasuno      = $anno++;
        ?>
                <!--PERTENECE AL BANNER PRINCIPAL DONDE ESTAN LOS LOGOS-->
        <div class="p-3 text-center text-white" id="banner">
            <div class="row">
                    <div class="col lns-logo d-flex justify-content-start">
                    <img src="../../LNS.png" >
                </div>
                
                <div class="col minerva d-flex justify-content-end">
                    <img src="../../buap-negativo.png">
                </div>
            </div>
        </div>

                <!--PERTENECE AL BANNER SECUNDARIO DONDE SE ENCUENTRA EL BOTON "REGRESAR"-->
        <nav class="banner2 navbar-expand">
            <div class="nav navbar-nav">
                <a class="btn btn-lat" id="botones-lat" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step"
                    >Regresar</a>
            </div>
        </nav>
        
                <!--ESTE NO ES VISIBLE HASTA QUE SE PRESIONA EL BOTON "REGRESAR"-->
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

        <br>

                <!--COMIENZA EL CONTENIDO PRINCIPAL-->

        <main class="content">
            <div class="container-fluid text-center">
                            <!--SE INSERTA CODIGO PHP PARA CUANDO SE HAGA UNA INSERCION SE CAPTURE
                                    Y REALICE EL PROCEDIMIENTO CORRESPONDIENTE-->
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    //Se ha declarado un objeto para que se pueda acceder al metodo que contiene la clase
                    $consulta = $guardarRegCal->guardar_registro_calendario();

                                //AQUI SE REIMPRIME HASTA ARRIBA DE LA PAGINA EL REGISTRO RECIEN INGRESADO
                                //CON LA OPCION DE QUE SE PUEDA ELIMINAR O REVISAR SU CONTENIDO
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
                        //ESTE METODO ES POR SI ES PARA ELIMINAR EL REGISTRO UNA VES INGRESADO
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['reg_eliminar']))
                {
                    $calendarioEliminar = $_GET["reg_eliminar"];
                    //Se declara el objeto para que se pueda manejar los metodos que contiene la clase
                    $eliminarRegCal->eliminar_registro_calendario($calendarioEliminar);
                    //Funcion perteneciente a Subsistemas.php
                    //$ayudante->manejador->eliminar_reg_calendario($calendarioEliminar);
                    header('Location: ../Entrada_calendario/');
                }
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['origen']))
                {
                    $infraestructuraEliminar = $_GET["origen"];
                    //Se declara el objeto para que se pueda utilizar los metodos que contiene la clase          
                    $eliminarMejInf->eliminar_mejora_infraestructura($infraestructuraEliminar);
                    //Funcion perteneciente a Subsistemas.php
                    //$ayudante->manejador->eliminar_mejora_infraestructura($infraestructuraEliminar);
                    header('Location: ../Entrada_calendario/');
                }
                ?>


            <div class="txt-title">
                <h1>Entrada Calendario</h1>
            </div>
                        <!--AQUI COMIENZA LA INSERCION AL FORMULARIO-->

            <form action="../Entrada_calendario/" method="post">
                <h5 class="text-center">Calendarizar Mantenimiento</h5>
                <div class="contenedorform">

                    <div class="formuno">
                        <!--COMIENZO DE LA TABLA DONDE SE ENCUENTRA EL FORMULARIO-->
                        <table class="table table-light table-striped align-middle">
                            <!--TITULOS DE LA TABLA-->
                                <thead>
                                    <tr>
                                        <th scope="col"><label for="num_inventario" class="form-label">No. inventario</label></th>
                                        <th scope="col"><label for="Desc_bien" class="form-label">Descripción del bien</label></th>
                                        <th scope="col"><label for="marca" class="form-label">Marca</label></th>
                                        <th scope="col"><label for="modelo" class="form-label">Modelo</label></th>
                                        <th scope="col"><label for="num_serie" class="form-label">No. serie</label></th>
                                    </tr>
                                </thead>

                                <!--CONTENIDO DE LA TABLA, BAJO LOS TITULOS-->
                                <tbody>
                                    <tr>
                                        <!--PRIMER INPUT DEL FORMULARIO-->
                                        <td scope="row">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="num_inventario"
                                                id="num_inventario"
                                                aria-describedby="numero de inventario que recivira mantenimiento"
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

                                        <!--FIN DE INPUTS DE LA TABLA-->
                                    </tr>
                                </tbody>
                                            <!--FIN DEL CONTENIDO DE LA TABLA-->
                            </table>
                    </div>

                    <div class="formdos">
                        <!--COMIENZO DE LA TABLA DONDE SE ENCUENTRA EL FORMULARIO-->
                        <table class="table table-light table-striped align-middle">
                            <!--TITULOS DE LA TABLA-->
                            <thead>
                                <tr>
                                    <th scope="col"><label for="ubicacion_Desc" class="form-label">Descripción de la ubicación</label></th>
                                    <th scope="col"><label for="proveedor" class="form-label">Proveedor</label></th>
                                    <th scope="col"><label for="tipo_mantenimiento" class="form-label">Tipo de mantenimiento</label></th>
                                    <th scope="col">Fecha de realizacion</th>
                                </tr>
                            </thead>

                            <!--CONTENIDO DE LA TABLA, BAJO LOS TITULOS-->
                            <tbody>
                                <tr>
                                    <!--SEXTO INPUT DEL FORMULARIO-->
                                    <td>
                                        <textarea class="form-control" name="ubicacion_Desc" id="ubicacion_Desc" rows="3" required></textarea>
                                    </td>

                                    <!--SEPTIMO INPUT DEL FORMULARIO-->
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

                                    <!--OCTAVO INPUT DEL FORMULARIO-->
                                    <td>
                                        <select class="form-select" name="tipo_mantenimiento" id="tipo_mantenimiento" aria-label="tipo de mantenimiento a realizar" required>
                                            <option selected disabled value="">Porfavor seleccione una opcion</option>
                                            <option value="Correctivo">Correctivo</option>
                                            <option value="Preventivo">Preventivo</option>
                                            <option value="Predictivo">Predictivo</option>
                                        </select>
                                    </td>

                                    <!--NOVENO INPUT DEL FORMULARIO-->
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
                                    <!--FIN DE INPUTS DE LA TABLA-->
                                </tr>
                            </tbody>
                            <!--FIN DEL CONTENIDO DE LA TABLA-->
                        </table>
                    </div>
                </div>

                            <!--ESTE DIV ES PARA PREGUNTAR SI ES QUE ESTA LISTO PARA INSERTAR LOS DATOS-->
                <div class="container-fluid d-flex justify-content-end">
                        <button type="button" class="btn btn-lg" id="botones_desp" data-bs-toggle="modal" data-bs-target="#termino">Finalizar</button>
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
                    </div>
                </div>

            </form>

            <br>
                <!--ESTO SIRVE PARA PREGUNTAR CON UN MENSJAE SI QUIERE ELIMINAR EL REGISTRO RECIEN INGRESADO-->
            <form action="../Entrada_calendario/" method="get">
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

        </main>

                    <!--FOOTER DEL SITIO-->
        <footer class="text-center footer">
            <div class="text-center p-3">
                Benemerita Universidad Autonoma de Puebla:Laboratorio Nacional de Supercomputo del Sureste de Mexico
            </div>
        </footer>
    </body>
    <script src="../../scripts_mantenimiento/scripts_consultas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
