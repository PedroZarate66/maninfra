<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Tabla usuarios</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
            <link rel="stylesheet" href="estilos.css">
    </head>
    <body>

          <?php
        include_once '../include/generar_tabla_usuarios.php';
        include_once '../funciones_php/Configuracion_sesion.php';
        $obj_gen_tab_usu = new Generar_Tabla_Usu;
        ?>

        <div class="p-3 text-center text-white" id="banner">
            <div class="row">
                    <div class="col lns-logo d-flex justify-content-start">
                    <img src="../LNS.png">
                </div>
               
                <div class="col minerva d-flex justify-content-end">
                    <img src="../buap-negativo.png">
                </div>
            </div>
        </div>

        <nav class="banner2">
            <div class="nav navbar-nav">
                <a class="btn btn-lg" id="botones-lat" type="button" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step">Regresar</a>
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
                        <a name="boton_salida" id="boton_salida" class="btn btn-success" href="../menu_inicial/" role="button">Aceptar</a>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <main class="content">
            <div class="txt-title">
                <h1>Lista de usuarios</h1>
            </div>

            <form action="">
                <div class="contenedorTabla">
                    <div class="table-responsive-xxl">
                        <table class="table table-light table-bordered table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Id Usuario</th>
                                <th scope="col">Nombre de usuario</th>
                                <th scope="col">Tipo de usuario</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $obj_gen_tab_usu->generar_tabla_usuariosT1(); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="table-responsive-xxl">
                        <table class="table table-light table-bordered table-hover">
                            <thead>
                                <tr>
                                <th scope="col">Contraseña del usuario</th>
                                <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $obj_gen_tab_usu->generar_tabla_usuariosT2(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>

            <!-- FORMULARIO PARA CAMBIAR CONTRASENA DE USUARIO -->
            <form class="needs-validation" action="../funciones_php/Actualizacion_User.php" method="post" novalidate>
                <div class="modal fade" id="actualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                    <div class="modal-dialog modal-dialog-centered">

                        <div class="modal-content">

                            <div class="modal-header bg-info text-white">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Escriba una nueva contraseña.</h1>
                            </div>

                            <div class="modal-body">

                                <div class="container-fluid text-center" id="tabladatosusuarios"></div>

                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                    <input type="password" name="nueva_contrasenna" class="form-control" required/>
                                    <label class="form-label" for="nueva_contrasenna">Contraseña</label>
                                    <div class="valid-feedback">¡Se ve bien!</div>
                                    <div class="invalid-feedback">Por favor, Escriba una contraseña.</div>
                                </div>

                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                    <input type="password" name="nueva_contrasenna" class="form-control" required/>
                                    <label class="form-label" for="nueva_contrasenna">Repita su contraseña</label>
                                    <div class="valid-feedback">¡Se ve bien!</div>
                                    <div class="invalid-feedback">Por favor, repita la contraseña</div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button class="btn btn-success" type="submit" data-bs-dismiss="modal">Aceptar</button>
                            </div>

                        </div>

                    </div>

                </div>
            </form>
            <!--------------------------------------------------------------------------------------------------------->
            
            <form action="../funciones_php/Eliminar_user.php" method="post">
                <div class="modal fade" id="eliminaruser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header bg-danger text-white">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">¿Esta seguro de que desea eliminar la siguiente entrada?</h1>
                            </div>
                            <div class="modal-body">
                                <div class="container-fluid text-center" id="tabladatosusuariosb"></div>
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

        <footer class="text-center">
            <div class="text-center p-3">

                    Benemerita Universidad Autonoma de Puebla:
                    Laboratorio Nacional de Supercomputo del Sureste de Mexico
            </div>
        </footer>
        
    </body>
    <script src="../scripts_mantenimiento/scripts_consultas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>
