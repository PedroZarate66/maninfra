<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Actualización, Mejoras y preservacion de infraestructura - Entrada Nueva</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <!--<style> @import url('../../css_estilos/propiedades_menu_inicial.css'); </style>-->
        <link rel="stylesheet" href="estilos.css">
    </head>
         <!--PERTENECE AL BANNER PRINCIPAL-->
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

            <!--PERTENECE AL SEGUNDO BANNER-->
    <nav class="banner2 navbar-expand">
        <div class="nav navbar-nav">
            <a class="btn btn-lat" id="botones-lat" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step"
                >Regresar</a>
        </div>
    </nav>
    
            <!--PERTENECE AL MENSAJE EMERGENTE SE REGRESO-->
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

            <!--COMIENZA EL CONTENIDO PRINCIPAL-->
    <body>
        <main class="content">
            
            <div class="container-fluid mt-3">

                        <!--SE INSERTA CODIGO PHP PARA LA INSERCION DE REGISTROS-->
                <?php
                //Se incluyen las funciones que se encuentran en archivos externos
                include_once '../../include/guardar_infraestructura.php';
                include_once '../../include/eliminar_mejora_infraestructura.php';
                include_once '../../funciones_php/Configuracion_sesion.php';

                //Se instancian los objetos que se utilizaran para llamar a las funciones
                $obj_gua_inf     = new Guardar_Infra;
                $obj_eli_mej_inf = new Eliminar_Mej_Infraestructura;

                            //EN CASO DE QUE SE INSERTE SE IMPRIMEN LOS REGISTROS RECIEN INGRESADOS
                if ($_SERVER["REQUEST_METHOD"] == "POST")
                {
                    $consulta = $obj_gua_inf->guardar_infraestructura();
                    echo "<div class='container-fluid'><h5 class='text-center'>Registro de infraestructura guardado con exito</h5>";
                    echo "<div class='table-responsive'><table class='table table-bordered'><thead><tr><th scope='col'>Id</th><th scope='col'>Aspecto</th><th scope='col'>Descripción</th><th scope='col'>Beneficios</th>
                    <th scope='col'>Tipo de mantenimiento</th><th scope='col'>Frecuencia</th><th scope='col'>Fecha Propuesta para realización</th><th scope='col'>Prioridad</th>
                    <th scope='col'>Costo estimado</th><th scope='col'>Ultima fecha de calendarizacion</th></tr></thead>";
                    echo "<tbody><tr><th scope='row'>".$consulta["IdMejora"]."</th><td>".$consulta["Aspecto"]."</td><td>".$consulta["Descripcion"]."</td><td>".$consulta["Beneficios"]."</td><td>".$consulta["TipoMantenimiento"]."</td>
                    <td>".$consulta["Frecuencia"]."</td><td>".$consulta["MesPropuesto"]." ".$consulta["AnnoPropuesto"]."</td><td>".$consulta["Prioridad"]."</td><td>$".$consulta["Costo"]."</td><td>".$consulta["UltimaActualizacion"]."</td></tr></tbody></table></div></div>";
                    echo '<form action="../Entrada_infraestrucutra/" method="get">
                    <div class="container-fluid d-flex justify-content-start">
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
                                        <button class="btn btn-success" type="submit" name="reg_eliminar" value="'.$consulta["IdMejora"].'" data-bs-dismiss="modal">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>';
                }
                        //EN CASO DE QUE SE QUIERA ELIMINAR EL REGISTRO RECIEN INGRESADO
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['reg_eliminar']))
                {
                    $regeliminar = $_GET["reg_eliminar"];
                    $obj_eli_mej_inf->eliminar_mejora_infraestructura($regeliminar);
                }
                
                ?>
            

                <div class="txt-title">
                    <h3>Actualización, Mejoras y Preservacion de Infraestructura</h3>
                    <h4>Entrada Nueva</h4>
                </div>

                <div class="contenedorform">

                    <div class="formprincipal">
                        <!--FORMULARIO DE INSERCION DE DATOS-->
                        <form action="../Entrada_infraestructura/" method="post">
                                    <!--PRIMER INPUT DEL FORMULARIO-->
                                <div class="row align-items-center">
                                    <div class="titulo-input">
                                        Aspecto
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="infra_aspecto" class="form-label"></label>
                                            <textarea class="input-area" name="infra_aspecto" id="infra_aspecto" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                    <!--SEGUNDO INPUT DEL FORMULARIO-->
                                <div class="row align-items-center">
                                    <div class="titulo-input">
                                        Descripción
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="infra_desc" class="form-label"></label>
                                            <textarea class="input-area" name="infra_desc" id="infra_desc" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                    <!--TERCER INPUT DEL FORMULARIO-->
                                <div class="row align-items-center">
                                    <div class="titulo-input">
                                        Beneficios
                                    </div>

                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="infra_beneficios" class="form-label"></label>
                                            <textarea class="input-area" name="infra_beneficios" id="infra_beneficios" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                    <!--CUARTO INPUT DEL FORMULARIO-->
                                <div class="row align-items-center">
                                    <div class="titulo-input">Tipo de mantenimiento</div>

                                    <div class="contenedor-input">
                                        <input class="input-area" type="text" name="infra_tipo_mantenimiento" placeholder="Ejemplo: Preventivo, Correctivo, Actualizacion o Mejora" aria-label="tipo de mantenimiento" required>
                                    </div>
                                </div>
                    </div>
                                        <!--AQUI SE DIVIDE EL FORMULARIO-->
                    <div class="form2">
                                <br>
                                    <!--QUINTO INPUT DEL FORMULARIO-->
                                <div class="row align-items-center">
                                    <div class="titulo-input">Frecuencia</div>

                                    <div class="contenedor-input">
                                        <input class="input" type="text" name="infra_frecuencia" placeholder="Una vez, Trimestral, Semestral, Anual" aria-label="frecuencia del registro" required>
                                    </div>
                                </div>
                                <br>
                                    <!--SEXTO INPUT DEL FORMULARIO-->
                                <div class="row align-items-center">
                                    <div class="titulo-input">Fecha propuesta para realización</div>

                                    <div class="contenedor-input">
                                        <select class="input" name="infra_mes_propuesto" aria-label="Nivel de prioridad" required>
                                            <option selected disabled value="">Porfavor seleccione mes</option>
                                            <option value="Enero">Enero</option>
                                            <option value="Febrero">Febrero</option>
                                            <option value="Marzo">Marzo</option>
                                            <option value="Abril">Abril</option>
                                            <option value="Mayo">Mayo</option>
                                            <option value="Junio">Junio</option>
                                            <option value="Julio">Julio</option>
                                            <option value="Agosto">Agosto</option>
                                            <option value="Septiembre">Septiembre</option>
                                            <option value="Octubre">Octubre</option>
                                            <option value="Noviembre">Noviembre</option>
                                            <option value="Diciembre">Diciembre</option>
                                        </select>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="contenedor-input">
                                        <input class="input" type="number" name="infra_anno_propuesta" placeholder="Año" aria-label="No confundir con la fecha para calendarizar" required>
                                    </div>
                                </div>
                                <br>
                                    <!--SEPTIMO INPUT DEL FORMULARIO-->
                                <div class="row align-items-center">
                                    <div class="titulo-input">Prioridad</div>

                                    <div class="contenedor-input">
                                        <select class="input" name="infra_prioridad" aria-label="Nivel de prioridad" required>
                                            <option selected disabled value="">Porfavor seleccione una opcion</option>
                                            <option value="Alta">Alta</option>
                                            <option value="Media">Media</option>
                                            <option value="Baja">Baja</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                    <!--OCTAVO INPUT DEL FORMULARIO-->
                                <div class="row align-items-center">
                                    <div class="titulo-input">Costo estimado</div>
                                    
                                    <div class="contenedor-input">
                                        <input type="number" class="input" name="infra_costo_estimado" placeholder="$Costo estimado" aria-label="campo para presupuesto" required>
                                    </div>
                                </div>
                            
                            
                            
                                <button type="button" class="btn btn-lg" id="botones_desp" data-bs-toggle="modal" data-bs-target="#termino">Finalizar</button>
                        
                                    <!--     PREGUNTA SI LOS DATOS SON CORRECTOS
                                    ESTE NO SE MUESTRA HASTA QUE SE DA CLIC EN FINALIZAR-->
                                <div class="modal" id="termino">
                                    <div class="modal-dialog">
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
                    </div>
                
                </div>
        </main>
            <!--FOOTER DEL SITIO-->
        <footer class="text-center footer">
            <div class="text-center p-3">
                    Benemerita Universidad Autonoma de Puebla:
                    Laboratorio Nacional de Supercomputo del Sureste de Mexico
            </div>
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
</html>
