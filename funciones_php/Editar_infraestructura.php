<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Actualización, Mejoras y preservacion de infraestructura - Edición</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style> @import url('../css_estilos/propiedades_menu_inicial.css'); </style>
        <link rel="stylesheet" href="../css_estilos/pantalla.css">
    </head>

    <div class="p-3 text-center text-white" id="banner">
    <div class="row">
      <div class="col d-flex justify-content-start">
        <img src="../LNS.png" height="64" width="170">
      </div>
      <div class="col">
        <h3>Actualización, Mejoras y Preservacion de Infraestructura</h3>
        <h4>Edición de entrada</h4>
      </div>
      <div class="col d-flex justify-content-end">
        <img src="../buap-negativo.png" height="64" width="64">
      </div>
    </div>
    </div>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="btn text-dark nav-item nav-link" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step"
                >Regresar</a
            >
            <a class="btn text-dark nav-item nav-link" data-bs-toggle="modal" data-bs-target="#menu_inicial" aria-current="step">Menu inicial</a>
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
                    <a name="boton_salida" id="boton_salida" class="btn btn-success" href="../mantenimientos/Entrada_calendario/" role="button">Aceptar</a>
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
                    <a name="boton_salida" id="boton_salida" class="btn btn-success" href="../menu_inicial/" role="button">Aceptar</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <body><main class="content">
    
        <div class="container-fluid mt-3">
            <?php
            require 'Subsistemas.php';
            require 'Configuracion_sesion.php';
            $ayudante = new Cliente();
            if ($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $Id_destino = $_POST["direccion"];
                $consulta = $ayudante->manejador->actualizacion_infraestructura($Id_destino);
                echo "<div class='container-fluid'><h5 class='text-center'>Registro de infraestructura guardado con exito</h5>";
                echo "<div class='table-responsive'><table class='table table-bordered'><thead><tr><th scope='col'>Id</th><th scope='col'>Aspecto</th><th scope='col'>Descripción</th><th scope='col'>Beneficios</th>
                <th scope='col'>Tipo de mantenimiento</th><th scope='col'>Frecuencia</th><th scope='col'>Fecha Propuesta para realización</th><th scope='col'>Prioridad</th>
                <th scope='col'>Costo estimado</th><th scope='col'>Ultima fecha de calendarizacion</th></tr></thead>";
                echo "<tbody><tr><th scope='row'>".$consulta["IdMejora"]."</th><td>".$consulta["Aspecto"]."</td><td>".$consulta["Descripcion"]."</td><td>".$consulta["Beneficios"]."</td><td>".$consulta["TipoMantenimiento"]."</td>
                <td>".$consulta["Frecuencia"]."</td><td>".$consulta["MesPropuesto"]." ".$consulta["AnnoPropuesto"]."</td><td>".$consulta["Prioridad"]."</td><td>$".$consulta["Costo"]."</td><td>".$consulta["UltimaActualizacion"]."</td></tr></tbody></table></div></div>";
                echo '<form action="../mantenimientos/Entrada_infraestrucutra" method="get">
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
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['reg_eliminar']))
            {
                $regeliminar = $_GET["reg_eliminar"];
                $ayudante->manejador->eliminar_mejora_infraestructura($regeliminar);
                header('Location: ../mantenimientos/Entrada_calendario');
            }
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['origen']))
            {
                $regeditar = $_GET["origen"];
                $infraestructura = $ayudante->manejador->consulta_infraestructura_individual($regeditar);
            }
            ?>
            <h5 class='text-center'>Formulario de entrada</h5>
            <br>
    <form action="Editar_infraestructura.php" method="post">
            <div class="row align-items-center">
                <div class="col-3">
                    Aspecto
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="infra_aspecto" class="form-label"></label>
                        <textarea class="form-control" name="infra_aspecto" id="infra_aspecto" rows="3" required><?php echo $infraestructura["Aspecto"]; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-3">
                    Descripción
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="infra_desc" class="form-label"></label>
                        <textarea class="form-control" name="infra_desc" id="infra_desc" rows="3" required><?php echo $infraestructura["Descripcion"]; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-3">
                    Beneficios
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="infra_beneficios" class="form-label"></label>
                        <textarea class="form-control" name="infra_beneficios" id="infra_beneficios" rows="3" required><?php echo $infraestructura["Beneficios"]; ?></textarea>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-3">Tipo de mantenimiento</div>
                <div class="col-4">
                    <input class="form-control" type="text" name="infra_tipo_mantenimiento" value="<?php echo $infraestructura["TipoMantenimiento"]; ?>" placeholder="Ejemplo: Preventivo, Correctivo, Actualizacion o Mejora" aria-label="tipo de mantenimiento" required>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">Frecuencia</div>
                <div class="col-4">
                    <input class="form-control" type="text" name="infra_frecuencia" value="<?php echo $infraestructura["Frecuencia"]; ?>" placeholder="Una vez, Trimestral, Semestral, Anual" aria-label="frecuencia del registro" required>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">Fecha propuesta para realización</div>
                <div class="col-2">
                    <select class="form-select" name="infra_mes_propuesto" aria-label="Nivel de prioridad" required>
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
                <div class="col-2">
                    <input class="form-control" type="number" name="infra_anno_propuesta" placeholder="Año" aria-label="No confundir con la fecha para calendarizar" required>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">Prioridad</div>
                <div class="col-2">
                    <select class="form-select" name="infra_prioridad" aria-label="Nivel de prioridad" required>
                        <option selected value="<?php echo $infraestructura["Prioridad"]; ?>"><?php echo $infraestructura["Prioridad"]; ?></option>
                        <option value="Alta">Alta</option>
                        <option value="Media">Media</option>
                        <option value="Baja">Baja</option>
                      </select>
                </div>
            </div>
            <br>
            <div class="row align-items-center">
                <div class="col-3">Costo estimado</div>
                <div class="col-2">
                    <div class="input-group mb-3">
                        <span class="input-group-text bg-light" id="basic-addon1">$</span>
                        <input type="number" class="form-control" name="infra_costo_estimado" value="<?php echo $infraestructura["Costo"]; ?>" placeholder=" " aria-label="campo para presupuesto" required>
                    </div>
                </div>
            </div>
        </div>

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
                        <button class="btn btn-success" type="submit" name="direccion" value="<?php echo $infraestructura["IdMejora"]; ?>" data-bs-dismiss="modal">Aceptar</button>
                    </div>
                </div>
            </div>
        </div>
        
    </main>
    </form>
    <footer class="bg-body-tertiary text-center">
        <!-- Grid container -->
        <div class="container-fluid bg-white d-flex justify-content-end">
            <button type="button" class="btn btn-lg" id="botones" data-bs-toggle="modal" data-bs-target="#termino">Finalizar</button>
        </div>
        <div class="container p-4 bg-light"></div>
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