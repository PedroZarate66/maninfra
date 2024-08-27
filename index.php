<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Prueba en servicio</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style> @import url('css_estilos/propiedades_menu_inicial.css'); </style>
        <link rel="stylesheet" href="css_estilos/pantalla.css">
    </head>
    <body>
        <div class="p-3 text-center" id="banner">
			<img src="LNS.png" height="64" width="170">
        </div>
        <br>
        <main class="content">
			<div class="container text-center">
            <?php
			if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'sesion_expirada') {
				echo 'Tu sesión ha expirado. Por favor, inicia sesión de nuevo.';
			}elseif (isset($_GET['mensaje']) && $_GET['mensaje'] == 'sesion_no_iniciada') {
				echo 'Debes iniciar sesión para acceder a esta página.';
			}
			?>
            </div>
            <section class="h-100">
		    <div class="container h-100">
			    <div class="row justify-content-md-center h-100">
				    <div class="card-wrapper">
					    <div class="brand d-flex justify-content-center">
							<img src="favicon.ico">
					    </div>
					    <div class="card fat">
						    <div class="card-body">
							    <h4 class="card-title">Login</h4>
							    <form action="funciones_php/Login.php" method="post" class="needs-validation" novalidate>
								    <div class="form-group">
									    <label for="email">Nombre de usuario</label>
									    <input id="email" type="text" class="form-control" name="usuario" value="" required autofocus>
									    <div class="invalid-feedback">
										    Nombre de usuario es invalido
									    </div>
								    </div>
								    <div class="form-group">
									    <label for="password">Contraseña, olvido contraseña solicita cambio con un administrador
									    </label>
									    <input id="password" type="password" class="form-control" name="password" required data-eye>
								        <div class="invalid-feedback">
								    	    Contraseña es requerida
							    	    </div>
								    </div>
								    <br>
								    <div class="form-group m-0">
									    <button type="submit" class="btn btn-primary btn-block">
										    Login
									    </button>
								    </div>
								    <div class="mt-4 text-center">
									    Pida una cuenta a un administrador.
								    </div>
							    </form>
						    </div>
					    </div>
				    </div>
			    </div>
		    </div>
	        </section>
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
    <script src="scripts_mantenimiento/scripts_consultas.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</html>