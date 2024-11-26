<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historial de registros</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style> @import url('../css_estilos/propiedades_menu_inicial.css'); </style>
        <link rel="stylesheet" href="../css_estilos/pantalla.css">
        <div class="p-3 text-center text-white" id="banner">
            <div class="row">
                <div class="col d-flex justify-content-start">
                    <img src="../LNS.png" height="64" width="170">
                </div>
                <div class="col">
                    <h1>Registro Diario</h1>
                </div>
                <div class="col d-flex justify-content-end">
                    <img src="../buap-negativo.png" height="64" width="64">
                </div>
            </div>
        </div>
    </head>
    <body>
        
        <nav class="navbar navbar-expand navbar-light bg-light">
            <div class="nav navbar-nav">
                <a class="nav-item nav-link active" href="../inspecciones/Verificacion_sistemas/" aria-current="page"
                    >Regresar</a>
                    <a class="nav-item nav-link active" href="../menu_inicial/" aria-current="page"
                    >Inicio</a>
            </div>
        </nav>
        <?php
            require 'Subsistemas.php';
            require 'Configuracion_sesion.php';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $ayudante = new Cliente();
            $consulta = $ayudante->manejador->guardar_registro();
            header('Location: Inspeccion_registro.php?reg_detalles='.$consulta["IdRegistro"].'');
            }
        ?>
        <br>
        <main class="content">
        <div
            class="container"
        >
            <h3 class="d-flex justify-content-center">Registro guardado con exito</h3>
            <div
                class="row d-flex align-items-end g-2"
            >
                <div class="col d-flex justify-content-start">
                    <div class="mb-3">
                        <label for="identificador" class="form-label">ID</label>
                        <input
                            type="text"
                            class="form-control"
                            name="identificador"
                            id="identificador"
                            aria-describedby="id de registros"
                            placeholder="identificador"
                            value="<?php echo $consulta["IdRegistro"]; ?>"
                            disabled readonly
                        />
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="mb-3">
                        <label for="dia" class="form-label">Dia</label>
                        <input
                            type="text"
                            class="form-control"
                            name="dia"
                            id="dia"
                            aria-describedby="dia de registros"
                            placeholder="dia"
                            value="<?php echo $consulta["DiaSemana"]; ?>"
                            disabled readonly
                        />
                    </div>
                </div>
                <div class="col d-flex justify-content-center">
                    <div class="mb-3">
                        <label for="Fecha" class="form-label">Fecha</label>
                        <input
                            type="text"
                            class="form-control"
                            name="Fecha"
                            id="Fecha"
                            aria-describedby="Fecha de registros"
                            placeholder="Fecha"
                            value="<?php echo $consulta["Fecha"]; ?>"
                            disabled readonly
                        />
                    </div>
                </div>
                <div class="col d-flex justify-content-end">
                    <div class="mb-3">
                        <label for="entradaosalida" class="form-label">  </label>
                        <input
                            type="text"
                            class="form-control"
                            name="entradaosalida"
                            id="entradaosalida"
                            aria-describedby="entradaosalida de registros"
                            placeholder="Entrada o salida"
                            value="<?php echo $consulta["EntradaoSalida"]; ?>"
                            disabled readonly
                        />
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div
            class="container"
        >
            <h5 class="d-flex justify-content-center">Biometricos</h5>
            <div
                class="table-responsive"
            >
                <label class="form-label d-flex justify-content-center">¿La lectura de huella digital es correcta?</label>
                <table
                    class="table"
                >
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Acceso<br>Principal</th>
                            <th scope="col">Oficinas</th>
                            <th scope="col">Vigilancia</th>
                            <th scope="col">Esclusa</th>
                            <th scope="col">Triage</th>
                            <th scope="col">CPD</th>
                            <th scope="col">CE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $consulta["BioAccesoPrincipal"]; ?></td>
                            <td><?php echo $consulta["BioOficina"]; ?></td>
                            <td><?php echo $consulta["BioVigilancia"]; ?></td>
                            <td><?php echo $consulta["BioEsclusa"]; ?></td>
                            <td><?php echo $consulta["BioTriage"]; ?></td>
                            <td><?php echo $consulta["BioCpd"]; ?></td>
                            <td><?php echo $consulta["BioCe"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <label for="biometrico_observ" class="form-label">Observaciones</label>
                <textarea class="form-control" name="biometrico_observ" id="biometrico_observ" rows="5" disabled readonly><?php echo $consulta["BioObservaciones"]; ?></textarea>
            </div>
            
        </div>
        <br>
        <div
            class="container"
        >
            <h5 class="d-flex justify-content-center">Lampatas de emergencia</h5>
            <div
                class="table-responsive"
            >
                <label class="form-label d-flex justify-content-center">¿El LED está encendido sin parpadear?</label>
                <table
                    class="table"
                >
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Recepcion</th>
                            <th scope="col">Pasillos</th>
                            <th scope="col">CPD 1</th>
                            <th scope="col">CPD 2</th>
                            <th scope="col">CE 1</th>
                            <th scope="col">CE 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $consulta["LamparaRecepcion"]; ?></td>
                            <td><?php echo $consulta["LamparaPasillos"]; ?></td>
                            <td><?php echo $consulta["LamparaCpdUno"]; ?></td>
                            <td><?php echo $consulta["LamparaCpdDos"]; ?></td>
                            <td><?php echo $consulta["LamparaCeUno"]; ?></td>
                            <td><?php echo $consulta["LamparaCeDos"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <label for="lampara_observ" class="form-label">Observaciones</label>
                <textarea class="form-control" name="lampara_observ" id="lampara_observ" rows="5" disabled readonly><?php echo $consulta["LamparaObservaciones"]; ?></textarea>
            </div>
        </div>
        <br>
        <div
            class="container"
        >
            <h5 class="d-flex justify-content-center">Cámaras de CCTV</h5>
            <div
                class="table-responsive"
            >   
                <label class="form-label d-flex justify-content-center">¿Las cámaras presentan imagen?</label>
                <table
                    class="table"
                >
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Pasillo</th>
                            <th scope="col">CPD 1</th>
                            <th scope="col">CPD 2</th>
                            <th scope="col">Recepción</th>
                            <th scope="col">CE</th>
                            <th scope="col">Entrada 360</th>
                            <th scope="col">Salida de<br>emergencia</th>
                            <th scope="col">Cuarto de<br>Maquinas</th>
                            <th scope="col">Entrada<br>Principal</th>
                            <th scope="col">Esclusa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $consulta["CamaraPasillo"]; ?></td>
                            <td><?php echo $consulta["CamaraCpduno"]; ?></td>
                            <td><?php echo $consulta["CamaraCpdDos"]; ?></td>
                            <td><?php echo $consulta["CamaraRecepcion"]; ?></td>
                            <td><?php echo $consulta["CamaraCe"]; ?></td>
                            <td><?php echo $consulta["CamaraEntrada360"]; ?></td>
                            <td><?php echo $consulta["CamaraSalidaEmergencia"]; ?></td>
                            <td><?php echo $consulta["CamaraCuartoMaquinas"]; ?></td>
                            <td><?php echo $consulta["CamaraEntradaPrincipal"]; ?></td>
                            <td><?php echo $consulta["CamaraEsclusa"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <label for="camara_observ" class="form-label">Observaciones</label>
                <textarea class="form-control" name="camara_observ" id="camara_observ" rows="5" disabled readonly><?php echo $consulta["CamaraObsevaciones"]; ?></textarea>
            </div>
        </div>
        <br>
        <div
            class="container"
        >
            <h5 class="d-flex justify-content-center">AA-P</h5>
            <div
                class="row d-flex justify-content-center align-items-end g-2"
            >
                <div class="col">
                    <div
                        class="table-responsive"
                    >
                        <label class="form-label d-flex justify-content-center">¿El tablero de eventos presinta mensaje de alerta?</label>
                        <table
                            class="table"
                        >
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">AA-P 1 CPD</th>
                                    <th scope="col">AA-P 2 CPD</th>
                                    <th scope="col">AA-P 1 CE</th>
                                    <th scope="col">AA-P 2 CE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $consulta["AlertAapUnoCpd"]; ?></td>
                                    <td><?php echo $consulta["AlertAapDosCpd"]; ?></td>
                                    <td><?php echo $consulta["AlertAapUnoCe"]; ?></td>
                                    <td><?php echo $consulta["AlertAapDosCe"]; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <div
                        class="table-responsive"
                    >
                        <label class="form-label d-flex justify-content-center">¿Inyecta y enfria el aire?</label>
                        <table
                            class="table"
                        >
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">AA-P 1 CPD</th>
                                    <th scope="col">AA-P 2 CPD</th>
                                    <th scope="col">AA-P 1 CE</th>
                                    <th scope="col">AA-P 2 CE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $consulta["AireAapUnoCpd"]; ?></td>
                                    <td><?php echo $consulta["AireAapDosCpd"]; ?></td>
                                    <td><?php echo $consulta["AireAapUnoCe"]; ?></td>
                                    <td><?php echo $consulta["AireAapDosCe"]; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="aap_observ" class="form-label">Observaciones</label>
                <textarea class="form-control" name="aap_observ" id="aap_observ" rows="5" disabled readonly><?php echo $consulta["AlertAireObservaciones"]; ?></textarea>
            </div>
        </div>
        <br>
        <div
            class="container"
        >
            <h5 class="d-flex justify-content-center">Instalación hidráulica de AA-P</h5>
            <div
                class="table-responsive"
            >
                <label class="form-label d-flex justify-content-center">¿El manómetro tiene una presión diferente a "0"?</label>
                <table
                    class="table"
                >
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Manómetro 1 CPD</th>
                            <th scope="col">Manómetro 2 CPD</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $consulta["HidraManometroUnoCpd"]; ?></td>
                            <td><?php echo $consulta["HidraManometroDosCpd"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <label for="hidraulico_aap_observ" class="form-label">Observaciones</label>
                <textarea class="form-control" name="hidraulico_aap_observ" id="hidraulico_aap_observ" rows="5" disabled readonly><?php echo $consulta["HidraManometroObservaciones"]; ?></textarea>
            </div>
        </div>
        <br>
        <div
            class="container"
        >
            <h5 class="d-flex justify-content-center">Sistema contraincendio</h5>
            <div
                class="table-responsive"
            >
                <label class="form-label d-flex justify-content-center">¿La aguja del manómetro marca el color verde?</label>
                <table
                    class="table"
                >
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">Cilindro CPD</th>
                            <th scope="col">Cilindro CE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $consulta["IncendioCilindroCpd"]; ?></td>
                            <td><?php echo $consulta["IncendioCilindroCe"]; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <label for="incedio_observ" class="form-label">Observaciones</label>
                <textarea class="form-control" name="incedio_observ" id="incedio_observ" rows="5" disabled readonly><?php echo $consulta["IncendioObservaciones"]; ?></textarea>
            </div>
        </div>
        <br>
        <div
            class="container"
        >
            <h5 class="d-flex justify-content-center">UPS</h5>
            <div
                class="table-responsive"
            >
                <label class="form-label d-flex justify-content-center">¿El tablero de eventos presenta mensaje de alerta?</label>
                <table
                    class="table"
                >
                    <thead>
                        <tr class="table-primary">
                            <th scope="col">UPS 1</th>
                            <th scope="col">UPS 2</th>
                            <th scope="col">Consumo red electrica</th>
                            <th scope="col">Potencia total UPS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $consulta["AlertaUpsUno"]; ?></td>
                            <td><?php echo $consulta["AlertaUpsDos"]; ?></td>
                            <td><?php echo $consulta["KwRedConsumo"]; ?> KW</td>
                            <td><?php echo $consulta["KVaTotal"]; ?> KW</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mb-3">
                <label for="ups_observ" class="form-label">Observaciones</label>
                <textarea class="form-control" name="ups_observ" id="ups_observ" rows="5" disabled readonly><?php echo $consulta["AlertaUpsObservaciones"]; ?></textarea>
            </div>
        </div>
        <br>
        <div
            class="container"
        >
            <h5 class="d-flex justify-content-center">Grupo electrógeno de emergencia</h5>
            <div
                class="row d-flex justify-content-center align-items-end g-2"
            >
                <div class="col">
                    <div
                        class="table-responsive"
                    >
                        <label class="form-label d-flex justify-content-center">¿El generador presenta algún tipo de fuga?</label>
                        <table
                            class="table"
                        >
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">Generador A</th>
                                    <th scope="col">Generador B</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $consulta["FugaElectrogenoGenA"]; ?></td>
                                    <td><?php echo $consulta["FugaElectrogenoGenB"]; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col">
                    <div
                        class="table-responsive"
                    >
                        <label class="form-label d-flex justify-content-center">¿El pre calentador emite calor, produce ruido y vibra?</label>
                        <table
                            class="table"
                        >
                            <thead>
                                <tr class="table-primary">
                                    <th scope="col">Generador A</th>
                                    <th scope="col">Generador B</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $consulta["RuidoElectrogenoGenA"]; ?></td>
                                    <td><?php echo $consulta["RuidoElectrogenoGenB"]; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="electrogeno_observ" class="form-label">Observaciones</label>
                <textarea class="form-control" name="electrogeno_observ" id="electrogeno_observ" rows="5" disabled readonly><?php echo $consulta["FugaRuidoElectrogenoObservaciones"]; ?></textarea>
            </div>
        </div>

        <!-- a partir de aqui se pegan los nuevas tablas de los nuevos elementos del fromulario -->
         
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
    <script src="../scripts_mantenimiento/scripts_rutinarios.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!--
    codigo para crear nueva tabla
    <div
        class="container"
    >
        <h5 class="d-flex justify-content-center">nombre de la pestaña</h5>
        <div
            class="table-responsive"
        >
            <label class="form-label d-flex justify-content-center">pregunta del formulario</label>
            <table
                class="table"
            >
                <thead>
                    <tr class="table-primary">
                        <th scope="col">Nombre de elemento nuevo</th>
                        <th scope="col">Nombre de elemento nuevo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php //echo $consulta["AtributoNuevo Base de datos"]; ?></td>
                        <td><?php //echo $consulta["AtributoNuevo Base de datos"]; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mb-3">
            <label for="incedio_observ" class="form-label">Observaciones</label>
             <textarea class="form-control" name="nombre" id="nombre" rows="5" disabled readonly><?php //echo $consulta["atributo nuevo base de datos"]; ?></textarea>
        </div>
    </div>
    -->
</html>