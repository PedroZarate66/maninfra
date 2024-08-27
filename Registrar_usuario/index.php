<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registrar usuario</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style> @import url('../css_estilos/propiedades_menu_inicial.css'); </style>
        <link rel="stylesheet" href="../css_estilos/pantalla.css">
    </head>
    <body>
        <?php
        require '../funciones_php/Configuracion_sesion.php';
        ?>
        <div class="p-3 text-center text-white" id="banner">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <img src="../LNS.png" height="64" width="170">
                </div>
                <div class="col">
                    <h1>Registrar usuario</h1>
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
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-lg-12 col-xl-11">
                        <div class="card text-black" style="border-radius: 25px;">
                            <div class="card-body p-md-5">
                                <div class="row justify-content-center">
                                    <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registrar Usuario</p>

                                        <form class="mx-1 mx-md-4 needs-validation" action="../funciones_php/Guardar_usuario.php" method="post" novalidate>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                    <input type="text" name="nuevo_nombre" class="form-control" required/>
                                                    <label class="form-label" for="nuevo_nombre">Nombre de usuario</label>
                                                    <div class="valid-feedback">¡Se ve bien!</div>
                                                    <div class="invalid-feedback">Por favor, Escriba un nombre de usuario.</div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                    <p>Tipo de usuario</p>
                                                    <input type="radio" class="btn-check" name="tipo_usuario" id="Administrador" value="Administrador" autocomplete="off" required>
                                                    <label class="btn btn-outline-primary" for="Administrador">Administrador</label>
    
                                                    <input type="radio" class="btn-check" name="tipo_usuario" id="User_estandar" value="Normal" autocomplete="off" required>
                                                    <label class="btn btn-outline-primary" for="User_estandar">Normal</label>
                                                    
                                                    <div class="valid-feedback">¡Se ve bien!</div>
                                                    <div class="invalid-feedback">Por favor, seleccione tipo de usuario.</div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                    <input type="password" name="nueva_contrasenna" class="form-control" required/>
                                                    <label class="form-label" for="nueva_contrasenna">Contraseña</label>
                                                    <div class="valid-feedback">¡Se ve bien!</div>
                                                    <div class="invalid-feedback">Por favor, Escriba una contraseña.</div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-row align-items-center mb-4">
                                                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                                <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                    <input type="password" name="nueva_contrasenna" class="form-control" required/>
                                                    <label class="form-label" for="nueva_contrasenna">Repita su contraseña</label>
                                                    <div class="valid-feedback">¡Se ve bien!</div>
                                                    <div class="invalid-feedback">Por favor, repita la contraseña</div>
                                                </div>
                                            </div>

                                            <div class="form-check d-flex justify-content-center mb-5">
                                                
                                            </div>

                                            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Registrar</button>
                                            </div>

                                        </form>

                                    </div>
                                    <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center justify-item-center order-1 order-lg-2">

                                        <img src="../favicon.ico"
                                            class="img-fluid" alt="Sample image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    </body>
    <script src="../scripts_mantenimiento/scripts_consultas.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
</html>