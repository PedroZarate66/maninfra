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
  <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
    <a class="navbar-brand" href="../funciones_php/Logout.php">Cerrar sesion</a>
    <a class="navbar-brand"><?php echo "Usuario: ". $_SESSION['id'].", ".$_SESSION['usuario'].", ".$_SESSION['tipo']; ?></a>
    </div>
  </nav>

    <!--Esto corresponde a los botones que se muestran en en menu de inicio-->
    <div class="container text-center">
      <!--Esto es para alinearlos horizontalmente-->
      <div class="row justify-content-center align-items-center g-2">
            <!-- El codigo siguiente pertenece al primer boton

            <div class="col d-flex justify-content-center align-self-start"><a
                name="inspeccion"
                id="botones"
                class="btn btn-lg"
                href="../inspecciones/"
                role="button"
            >Inspeccion diaria</a>
            </div> -->


            <?php
          
              echo
                '<div class="col">
                <a
                  name="Inspeccion"
                  id="botones"
                  class="btn btn-lg"
                  data-bs-toggle="collapse"
                  data-bs-target="#contenidoInspeccion"
                  role="button"
                  >Inspeccion diaria</a
                >
                <div class="collapse" id="contenidoInspeccion">
                  <br>
                  <div class="container">
                  <a
                    name="Entrada_inspeccion"
                    id="Calendario_mantenimiento"
                    class="btn btn-primary"
                    href="../inspecciones/Verificacion_sistemas/"
                    role="button"
                    >Entrada nueva</a
                  >
                  </div>
                  <br>
                  <div class="container">
                  <a
                    name="Historial_ispecciones"
                    id="Historial_inspecciones"
                    class="btn btn-primary"
                    href="../inspecciones/Historial_Inspecciones/"
                    role="button"
                    >Historial</a
                  >
                  </div>
                </div>
                
              </div>';
            
            ?>
          
          <!--El codigo siguiente pertenece al segundo boton-->

          <!-- <div class="col d-flex justify-content-center align-self-start"><a
              name="Mantenimiento"
              id="botones"
              class="btn btn-lg"
              href="../mantenimientos/"
              role="button"
          >Mantenimiento</a> -->

          <?php
          
            echo
            '<div class="col">
            <a
              name="Mantenimiento"
              id="botones"
              class="btn btn-lg"
              data-bs-toggle="collapse"
              data-bs-target="#contenidoCalendario"
              role="button"
              >Mantenimiento</a
            >
            <div class="collapse" id="contenidoCalendario">
              <br>
              <div class="container">
              <a
                name="Calendario_manenimiento"
                id="Calendario_mantenimiento"
                class="btn btn-primary"
                href="../mantenimientos/Calendario/"
                role="button"
                >Calendario de mantenimiento</a
              >
              </div>
              <br>
              <div class="container">
              <a
                name="Entrada_infraestructura"
                id="Entrada_infraestructura"
                class="btn btn-primary"
                href="../mantenimientos/Entrada_infraestructura/"
                role="button"
                >Preservacion de Infraestructura</a
              >
              </div>
              <br>
              <div class="container">
              <a
                name="Entrada_calendario"
                id="Entrada_calendario"
                class="btn btn-primary"
                href="../mantenimientos/Entrada_calendario/"
                role="button"
                >Entrada calendario</a
              >
              </div>
            </div>
            
          </div>';
          
          ?>

          </div>
          <!--El codigo siguiente pertenece al tercer boton, donde primero verifica que tipo de 
          usuario es, al verificar el tipo, despliega el boton de usuarios solo si es administrador-->
          <?php
          if($_SESSION['tipo'] == "Administrador"){
            echo
            '<div class="col">
            <a
              name="Usuarios"
              id="botones"
              class="btn btn-lg"
              data-bs-toggle="collapse"
              data-bs-target="#contenidoUsuarios"
              role="button"
              >Usuarios</a
            >
            <div class="collapse" id="contenidoUsuarios">
              <br>
              <div class="container">
              <a
                name="Reg_usuario"
                id="Registrar_usuario"
                class="btn btn-primary"
                href="../Registrar_usuario/"
                role="button"
                >Registrar usuario</a
              >
              </div>
              <br>
              <div class="container">
              <a
                name="tabla_usuarios"
                id="tabla_usuarios"
                class="btn btn-primary"
                href="../Lista_usuarios/"
                role="button"
                >Tabla de usuarios</a
              >
              </div>
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

  