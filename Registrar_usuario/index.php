<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registrar usuario</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="../css_estilos/menu_inicial.css">
    </head>
    <body>

        <?php
        require '../funciones_php/Configuracion_sesion.php';
        ?>

                <!--BANNER PRINCIPAL-->
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

                <!--BANNER SECUNDARIO-->
        <nav class="banner2">
            <div class="nav">
                <a class="btn btn-lg" id="botones-lat" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step"
                    >Regresar</a>
            </div>
        </nav>
        
                <!--VENTANA EMERGENTE CUANDO SE QUIERE SALIR-->
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
        

            <!--INICIO DE CONTENIDO PRINCIPAL-->
        <main class="content">

                    <!--SUBTITULO-->
            <div class="txt-title">
                <h1>Registrar usuario</h1>
            </div>


                    <!--CONTENEDOR PRINCIPAL-->
            <div class="container text-center">

            <?php
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'usuario_guardado') {
                    echo 'Usuario creado con exito.';
                }
            ?>

            </div>

            <div class="contenedorPrincipal">
                <div class="contenedorFormulario">

                                <!--FORMULARIO DE REGISTRO-->
                    <form class="mx-1 mx-md-4 needs-validation" action="../include/registrar_usuario.php" method="post" novalidate>

                        <div class="contentInput d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                <div data-mdb-input-init class="input form-outline flex-fill mb-0">
                                    <input type="text" name="nuevo_nombre" class="form-control" required/>
                                    <label class="form-label" for="nuevo_nombre">Nombre de usuario</label>
                                    <div class="valid-feedback">¡Se ve bien!</div>
                                    <div class="invalid-feedback">Por favor, Escriba un nombre de usuario.</div>
                                </div>
                        </div>

                        <div class="contentInput d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                <div data-mdb-input-init class="input form-outline flex-fill mb-0">
                                    <p>Tipo de usuario</p>
                                    <input type="radio" class="btn-check" name="tipo_usuario" id="Administrador" value="Administrador" autocomplete="off" required>
                                    <label class="btn btn-outline-primary" for="Administrador">Administrador</label>
        
                                    <input type="radio" class="btn-check" name="tipo_usuario" id="User_estandar" value="Normal" autocomplete="off" required>
                                    <label class="btn btn-outline-primary" for="User_estandar">Normal</label>
                                                        
                                    <div class="valid-feedback">¡Se ve bien!</div>
                                    <div class="invalid-feedback">Por favor, seleccione tipo de usuario.</div>
                                </div>
                        </div>

                        <div class="contentInput d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                <div data-mdb-input-init class="input form-outline flex-fill mb-0">
                                    <input type="password" name="nueva_contrasenna" class="form-control" required/>
                                    <label class="form-label" for="nueva_contrasenna">Contraseña</label>
                                    <div class="valid-feedback">¡Se ve bien!</div>
                                    <div class="invalid-feedback">Por favor, Escriba una contraseña.</div>
                                </div>
                        </div>

                        <div class="contentInput d-flex flex-row align-items-center mb-4">
                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                <div data-mdb-input-init class="input form-outline flex-fill mb-0">
                                    <input type="password" name="nueva_contrasenna" class="form-control" required/>
                                    <label class="form-label" for="nueva_contrasenna">Repita su contraseña</label>
                                    <div class="valid-feedback">¡Se ve bien!</div>
                                    <div class="invalid-feedback">Por favor, repita la contraseña</div>
                                </div>
                        </div>

                        <div class="input d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Registrar</button>
                        </div>

                    </form>

                </div>

                <div class="contenedorIcono">
                    <img src="../favicon.ico" class="img-fluid" alt="Sample image">
                </div>
            </div>
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
