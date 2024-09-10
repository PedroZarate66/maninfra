<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Mantenimiento e Inspeccion diaria - Menu inicial</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <link rel="stylesheet" href="../css_estilos/menu_inicial.css">
    <!-- <link rel="stylesheet" href="../css_estilos/pantalla.css"> -->
  </head>
    <!--Esto pertenece a el banner del menu inicial. se agregan los logos y titulos 
    correspondientes-->
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



  <body>
      <main class="content">
      <!--Se llaman las funciones de inicio de sesion-->
      <?php
      require '../funciones_php/Configuracion_sesion.php';
      ?>
      


      <!--Aqui va en titulo de la pagina-->
          <div class="txt-title">
            <h1>Menu inicial</h1>
          </div>

      <!--Esto corresponde a los botones que se muestran en en menu de inicio-->
      <div class="container text-center">
        <!--Esto es para alinearlos horizontalmente-->
        <div class="row justify-content-center align-items-center g-2">



            <!--PRIMER BOTON "USUARIOS"-->
            <?php
              if($_SESSION['tipo'] == "Administrador"){
                echo'
                <div class="col align-self-start">
                  <div class="col sub-title d-flex justify-content-center align-self-start">
                    Usuarios
                  </div>

                
                  <div class="row d-flex justify-content-center align-self-start"><a
                        name="RegistrarUsuario"
                        id="botones_desp"
                        class="btn btn-lg"
                        href="../Registrar_usuario"
                        role="button"
                    >Registrar</a>
                  </div>

                  <div class="row d-flex justify-content-center align-self-start"><a
                        name="ListaUsuarios"
                        id="botones_desp"
                        class="btn btn-lg"
                        href="../Lista_usuarios"
                        role="button"
                    >Lista</a>
                  </div>

                </div>';
              }
            ?>






            <!--SEGUNDO BOTON "ISPECCION DIARIA"-->

              <div class="col align-self-start conten_btn">
                <div class="col sub-title d-flex justify-content-center align-self-start">
                  Inspección diaria
                </div> 

                
                <div class="row d-flex justify-content-center align-self-start"><a
                    name="EntradaNueva"
                    id="botones_desp"
                    class="btn btn-lg"
                    href="../inspecciones/Verificacion_sistemas"
                    role="button">
                    Nueva Entrada</a>
                </div>

              
                <div class="row d-flex justify-content-center align-self-start"><a
                    name="Historial"
                    id="botones_desp"
                    class="btn btn-lg"
                    href="../inspecciones/Historial_Inspecciones"
                    role="button">
                    Historial</a>
                </div> 
              </div>


            <!--SEGUNDO SEPARADOR-->
            <hr class="hr2">
            <!--PRIMER SEPARADOR-->
            <hr class="hr1">


              
            <!--TERCER BOTON "MANTENIMIENTO"-->
              <div class="col align-self-start">
                <div class="col sub-title d-flex justify-content-center align-self-start">
                  Mantenimiento
                </div>

              
                <div class="row d-flex justify-content-center align-self-start"><a
                      name="Calendario"
                      id="botones_desp"
                      class="btn btn-lg"
                      href="../mantenimientos/Calendario"
                      role="button"
                  >Calendario</a>
                </div>

                <div class="row d-flex justify-content-center align-self-start"><a
                      name="EntradaCalendario"
                      id="botones_desp"
                      class="btn btn-lg"
                      href="../mantenimientos/Entrada_calendario"
                      role="button"
                  >Entrada Nueva</a>
                </div>

                <div class="row d-flex justify-content-center align-self-start"><a
                      name="EntradaInfraestructura"
                      id="botones_desp"
                      class="btn btn-lg"
                      href="../mantenimientos/Entrada_infraestructura"
                      role="button"
                  >Preservacion Inf</a>
                </div>
              </div>


              

            </div>
          </div>
        </main>




        <!--Banner donde se muestra el cierre de sesion-->
        <div class="banner2 bg-body-tertiary">
            <a class="btn btn-lg cerrar-sesion" href="../funciones_php/Logout.php">Cerrar sesion</a>
        </div>





      <!--Codigo correspondiente al Footer-->
      <footer class="bg-body-tertiary text-center">
            <div class="text-center p-3 footer">
              Benemerita Universidad Autonoma de Puebla: Laboratorio Nacional de Supercomputo del Sureste de Mexico
            </div>
      </footer>



      <!--Scripts-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


  </body>
</html>

  
