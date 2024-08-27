<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Mantenimiento e Inspeccion diaria - Menu inicial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css_estilos/menu_inicial.css">
    <!-- <link rel="stylesheet" href="../css_estilos/pantalla.css"> -->
  </head>
    <!--Esto pertenece a el banner del menu inicial. se agregan los logos y titulos 
    correspondientes-->
  <div class="p-3 text-center text-white" id="banner">
    <div class="row">
      <div class="col d-flex justify-content-start">
        <img id="lns-logo" src="../LNS.png">
      </div>
      <div class="col">
        <h1>Menu inicial</h1>
      </div>
      <div class="col d-flex justify-content-end">
        <img id = "minerva" src="../buap-negativo.png">
      </div>
    </div>
  </div>

  <body>
    <main class="content">
    <!--Se llaman las funciones de inicio de sesion-->
    <?php
    require '../funciones_php/Configuracion_sesion.php';
    ?>
    <!--Muestra un pequeño banner donde se muestra el cierre de sesion y la
    informacion del usuario que esta activo en el sistema-->
  <nav class="navbar bg-body-tertiary border-bottom border-body">
    <div class="container-fluid">
    <a class="navbar-brand" href="../funciones_php/Logout.php">Cerrar sesion</a>
    <a class="navbar-brand"><?php echo "Usuario: ". $_SESSION['id'].", ".$_SESSION['usuario'].", ".$_SESSION['tipo']; ?></a>
    </div>
  </nav>

    <!--Esto corresponde a los botones que se muestran en en menu de inicio-->
    <div class="container text-center">
      <!--Esto es para alinearlos horizontalmente-->
      <div class="row justify-content-center align-items-center g-2">
            <!-- El codigo siguiente pertenece al primer boton-->

            <div class="col align-self-start">
              <div class="col d-flex justify-content-center align-self-start"><a
                  name="inspeccion"
                  id="botones"
                  class="btn btn-lg"
                  href=""
                  role="button"
              >Inspeccion diaria</a>
              </div> 

              
              <div class="row d-flex justify-content-center align-self-start"><a
                  name="EntradaNueva"
                  id="botones_desp"
                  class="btn btn-lg"
                  href="../inspecciones/Verificacion_sistemas"
                  role="button"
              >Entrada nueva</a>
              </div>

            
              <div class="row d-flex justify-content-center align-self-start"><a
                  name="Historial"
                  id="botones_desp"
                  class="btn btn-lg"
                  href="../inspecciones/Historial_inspecciones"
                  role="button"
              >Historial</a>
              </div> 
      
            <!--Aqui tiene que ir la linea de division entre columnas-->
             <hr class="hr1">
            <!-- *************************************************** -->
            </div>
            
            <!--El codigo siguiente pertenece al segundo boton-->
            <div class="col align-self-start">
              <div class="col d-flex justify-content-center align-self-start"><a
                    name="Mantenimiento"
                    id="botones"
                    class="btn btn-lg"
                    href=""
                    role="button"
                >Mantenimiento</a>
              </div>

            
              <div class="row d-flex justify-content-center align-self-start"><a
                    name="Calendario"
                    id="botones_desp"
                    class="btn btn-lg"
                    href="../mantenimientos/Calendario"
                    role="button"
                >Calendario de mantenimiento</a>
              </div>

              <div class="row d-flex justify-content-center align-self-start"><a
                    name="EntradaCalendario"
                    id="botones_desp"
                    class="btn btn-lg"
                    href="../mantenimientos/Entrada_nueva"
                    role="button"
                >Entrada nueva</a>
              </div>

              <div class="row d-flex justify-content-center align-self-start"><a
                    name="EntradaInfraestructura"
                    id="botones_desp"
                    class="btn btn-lg"
                    href="../mantenimientos/Entrada_infraestructura"
                    role="button"
                >Preservacion de infraestructura</a>
              </div>
              <hr class="hr2">
            </div>
          <!--El codigo siguiente pertenece al tercer boton, donde primero verifica que tipo de 
          usuario es, al verificar el tipo, despliega el boton de usuarios solo si es administrador-->
          <?php
            if($_SESSION['tipo'] == "Administrador"){
              echo'
              <div class="col align-self-start">
                <div class="col d-flex justify-content-center align-self-start"><a
                      name="Usuario"
                      id="botones"
                      class="btn btn-lg"
                      href=""
                      role="button"
                  >Usuario</a>
                </div>

              
                <div class="row d-flex justify-content-center align-self-start"><a
                      name="RegistrarUsuario"
                      id="botones_desp"
                      class="btn btn-lg"
                      href="../Registrar_usuario"
                      role="button"
                  >Registrar usuario</a>
                </div>

                <div class="row d-flex justify-content-center align-self-start"><a
                      name="ListaUsuarios"
                      id="botones_desp"
                      class="btn btn-lg"
                      href="../mantenimientos/Lista_usuarios"
                      role="button"
                  >Lista de usuarios</a>
                </div>

              </div>';
            }
          ?>
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
  <script src="../js/bootstrap.bundle.js"></script>
  </body>
</html>

  
