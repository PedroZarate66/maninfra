<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Tabla usuarios</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style> @import url('../css_estilos/propiedades_menu_inicial.css'); </style>
        <link rel="stylesheet" href="../css_estilos/pantalla.css">
    </head>
    <body>
        <?php
        require '../funciones_php/Subsistemas.php';
        require '../funciones_php/Configuracion_sesion.php';
        $ayudante = new Cliente();
        ?>
        <div class="p-3 text-center text-white" id="banner">
            <div class="row">
                    <div class="col d-flex justify-content-start">
                    <img src="../LNS.png" height="64" width="170">
                </div>
                <div class="col">
                    <h1>Lista de usuarios</h1>
                </div>
                <div class="col d-flex justify-content-end">
                    <img src="../buap-negativo.png" height="64" width="64">
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="btn text-dark nav-item nav-link" type="button" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step">Regresar</a>
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
            <form action=""><div class="container text-center">
                <div class="table-responsive-xxl">
                    <table class="table table-light table-bordered table-hover">
                        <thead>
                            <tr>
                            <th scope="col">Id Usuario</th>
                            <th scope="col">Nombre de usuario</th>
                            <th scope="col">Tipo de usuario</th>
                            <th scope="col">Contraseña del usuario</th>
                            <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $ayudante->manejador->generar_tabla_usuarios(); ?>
                        </tbody>
                    </table>
                </div>
            </div></form>

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
    </body>
    <script src="../scripts_mantenimiento/scripts_consultas.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</html>