<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registrar usuario</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style> @import url('../css_estilos/menu_inicial.css'); </style>
        <link rel="stylesheet" href="estilos.css">
    </head>



    <body>

        <?php
        require '../funciones_php/Configuracion_sesion.php'; 
        ?>


        <!--Banner superior -->
        <div class="p-3 text-center text-white" id="banner">
            <div class="row">
                <div class="col d-flex justify-content-start">
                <img src="../LNS.png" height="64" width="170">
                </div>
               
                <div class="col d-flex justify-content-end">
                <img src="../buap-negativo.png" height="64" width="64">
                </div>
            </div>  
        </div>
   
        

        <!--Ventana emergente de advertencia -->
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



        <!--Contenedor del Regostro de Usuarios -->
        <main class="content">   
            
             
                <div class="row justify-content-center">
                <div class="col-lg-6 contenedor_registro">

                <p class="texto_registro">Registrar Usuario</p>

                        
                             <!--Empieza el formulario -->
                            <form class="mx-1 mx-md-4 needs-validation" action="../funciones_php/Guardar_usuario.php" method="post" novalidate>


                                    <!--Contenedor Nombre del tipo de usuario a registrar -->
                                    <div class="d-flex flex-row align-items-center mb-4 aling_btn">
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="radio" class="btn-check " name="tipo_usuario" id="Administrador" value="Administrador" autocomplete="off" required>
                                            <label class="btn btn-outline-primary botones" for="Administrador">Administrador</label>
    
                                            <input type="radio" class="btn-check" name="tipo_usuario" id="User_estandar" value="Normal" autocomplete="off" required>
                                            <label class="btn btn-outline-primary botones" for="User_estandar">Mantenimiento</label>
                                                    
                                            <div class="invalid-feedback">Por favor, seleccione tipo de usuario.</div>
                                        </div>
                                    </div>

                            
                                    <!--Contenedor Nombre del nuevo Usuario -->
                                    <div class="d-flex flex-row align-items-center mb-4">  
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="text" name="nuevo_nombre" class="form-control" required/>
                                            <label class="form-label" for="nuevo_nombre">Nombre de usuario</label>

                                            <div class="invalid-feedback">Nombre de usuario no válido.</div>
                                        </div>
                                    </div>


                                   
                                    <!--Contenedores Contraseñas del nuevo Usuario -->
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="password" name="nueva_contrasenna" class="form-control" required/>
                                            <label class="form-label" for="nueva_contrasenna">Contraseña</label>
                                            <div class="invalid-feedback">Contraseña no válida.</div>
                                        </div>
                                    </div>



                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                            <input type="password" name="nueva_contrasenna" class="form-control" required/>
                                            <label class="form-label" for="nueva_contrasenna">Repita su contraseña</label>
                                            <div class="invalid-feedback">Por favor, repita su contraseña</div>
                                        </div>
                                    </div>

                                            
                                     <!--Boton que guarda el registro -->
                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                    <button  type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Registrar</button>
                                    </div>

                            </form>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>