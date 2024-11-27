<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Historial de registros</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
        <link rel="stylesheet" href="../../inspecciones/Historial_Inspecciones/estilos.css">
    </head>

    <?php include_once '../../funciones_php/Configuracion_sesion.php';?>

    <body>

        <div class="p-3 text-center text-white" id="banner">
            <div class="row">
                <div class="col lns-logo d-flex justify-content-start">
                    <img src="../../LNS.png">
                </div>
                
                <div class="col minerva d-flex justify-content-end">
                    <img src="../../buap-negativo.png">
                </div>
            </div>
        </div>
        


        <nav class="banner2 ">
            <div class="nav">
                <a class="btn btn-lg" id="botones-lat" href="../../menu_inicial/" aria-current="page"
                    >Regresar</a>
            </div>
        </nav>


        <main class="content">


            <?php
                include_once '../Registro/consulta_registro_individual.php';
                $obj_con_reg_ind = new Consulta_Reg_Individual;
                
                
                $color      = array("Si"=>"btn-success", "No"=>"btn-danger");
                if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $idconsulta = $_GET["reg_detalles"];
                
                $consulta   = $obj_con_reg_ind->consulta_registro_individual($idconsulta);
                }
                if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["mensaje"]))
                {
                    echo "<div class='container text-center'>Cambio Realizado con exito</div>";
                }
            ?>


            <div class="txt-title">
                <h1>Registro Diario</h1>
            </div>
            

        <div class="container">
            <div class="row d-flex align-items-end g-2">
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
        <div class="container">
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
                            <th scope="col">Puerta<br>esclusa 1</th>
                            <th scope="col">Pasillo de<br>triage</th>
                            <th scope="col">Puerta<br>esclusa 2</th>
                            <th scope="col">Cuarto<br>electrico</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><button type="button" class="btn <?php echo $color[$consulta["BioAccesoPrincipal"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'BioAccesoPrincipal','<?php echo $consulta['BioAccesoPrincipal']; ?>')"> <?php echo $consulta["BioAccesoPrincipal"]; ?> </button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["BioOficina"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'BioOficina','<?php echo $consulta['BioOficina']; ?>')"> <?php echo $consulta["BioOficina"]; ?> </button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["BioVigilancia"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'BioVigilancia','<?php echo $consulta['BioVigilancia']; ?>')"> <?php echo $consulta["BioVigilancia"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["BioEsclusa"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'BioEsclusa','<?php echo $consulta['BioEsclusa']; ?>')"> <?php echo $consulta["BioEsclusa"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["BioTriage"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'BioTriage','<?php echo $consulta['BioTriage']; ?>')"> <?php echo $consulta["BioTriage"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["BioCpd"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'BioCpd','<?php echo $consulta['BioCpd']; ?>')"> <?php echo $consulta["BioCpd"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["BioCe"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'BioCe','<?php echo $consulta['BioCe']; ?>')"> <?php echo $consulta["BioCe"]; ?></button></td>
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
        <div class="container">
            <h5 class="d-flex justify-content-center">Lamparas de emergencia</h5>
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
                            <th scope="col">Pasillo<br>triage</th>
                            <th scope="col">Esclusa 1</th>
                            <th scope="col">Esclusa 2</th>
                            <th scope="col">Cuarto<br>electrico 1</th>
                            <th scope="col">Cuarto<br>electrico 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><button type="button" class="btn <?php echo $color[$consulta["LamparaRecepcion"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'LamparaRecepcion','<?php echo $consulta['LamparaRecepcion']; ?>')"> <?php echo $consulta["LamparaRecepcion"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["LamparaPasillos"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'LamparaPasillos','<?php echo $consulta['LamparaPasillos']; ?>')"> <?php echo $consulta["LamparaPasillos"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["LamparaCpdUno"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'LamparaCpdUno','<?php echo $consulta['LamparaCpdUno']; ?>')"> <?php echo $consulta["LamparaCpdUno"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["LamparaCpdDos"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'LamparaCpdDos','<?php echo $consulta['LamparaCpdDos']; ?>')"> <?php echo $consulta["LamparaCpdDos"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["LamparaCeUno"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'LamparaCeUno','<?php echo $consulta['LamparaCeUno']; ?>')"> <?php echo $consulta["LamparaCeUno"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["LamparaCeDos"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'LamparaCeDos','<?php echo $consulta['LamparaCeDos']; ?>')"> <?php echo $consulta["LamparaCeDos"]; ?></button></td>
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
                            <th scope="col">Pasillo de<br>oficinas</th>
                            <th scope="col">Pasillo<br>caliente CPD</th>
                            <th scope="col">Pasillo<br>frio CPD</th>
                            <th scope="col">Recepción</th>
                            <th scope="col">Cuarto<br>electrico</th>
                            <th scope="col">Triage 360</th>
                            <th scope="col">Salida de<br>emergencia</th>
                            <th scope="col">Cuarto de<br>Maquinas</th>
                            <th scope="col">Entrada<br>Principal</th>
                            <th scope="col">Esclusa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><button type="button" class="btn <?php echo $color[$consulta["CamaraPasillo"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'CamaraPasillo','<?php echo $consulta['CamaraPasillo']; ?>')"> <?php echo $consulta["CamaraPasillo"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["CamaraCpduno"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'CamaraCpduno','<?php echo $consulta['CamaraCpduno']; ?>')"> <?php echo $consulta["CamaraCpduno"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["CamaraCpdDos"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'CamaraCpdDos','<?php echo $consulta['CamaraCpdDos']; ?>')"> <?php echo $consulta["CamaraCpdDos"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["CamaraRecepcion"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'CamaraRecepcion','<?php echo $consulta['CamaraRecepcion']; ?>')"> <?php echo $consulta["CamaraRecepcion"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["CamaraCe"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'CamaraCe','<?php echo $consulta['CamaraCe']; ?>')"> <?php echo $consulta["CamaraCe"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["CamaraEntrada360"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'CamaraEntrada360','<?php echo $consulta['CamaraEntrada360']; ?>')"> <?php echo $consulta["CamaraEntrada360"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["CamaraSalidaEmergencia"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'CamaraSalidaEmergencia','<?php echo $consulta['CamaraSalidaEmergencia']; ?>')"> <?php echo $consulta["CamaraSalidaEmergencia"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["CamaraCuartoMaquinas"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'CamaraCuartoMaquinas','<?php echo $consulta['CamaraCuartoMaquinas']; ?>')"> <?php echo $consulta["CamaraCuartoMaquinas"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["CamaraEntradaPrincipal"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'CamaraEntradaPrincipal','<?php echo $consulta['CamaraEntradaPrincipal']; ?>')"> <?php echo $consulta["CamaraEntradaPrincipal"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["CamaraEsclusa"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'CamaraEsclusa','<?php echo $consulta['CamaraEsclusa']; ?>')"> <?php echo $consulta["CamaraEsclusa"]; ?></button></td>
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
                                    <td><button type="button" class="btn <?php echo $color[$consulta["AlertAapUnoCpd"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'AlertAapUnoCpd','<?php echo $consulta['AlertAapUnoCpd']; ?>')"> <?php echo $consulta["AlertAapUnoCpd"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["AlertAapDosCpd"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'AlertAapDosCpd','<?php echo $consulta['AlertAapDosCpd']; ?>')"> <?php echo $consulta["AlertAapDosCpd"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["AlertAapUnoCe"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'AlertAapUnoCe','<?php echo $consulta['AlertAapUnoCe']; ?>')"> <?php echo $consulta["AlertAapUnoCe"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["AlertAapDosCe"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'AlertAapDosCe','<?php echo $consulta['AlertAapDosCe']; ?>')"> <?php echo $consulta["AlertAapDosCe"]; ?></button></td>
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
                                    <td><button type="button" class="btn <?php echo $color[$consulta["AireAapUnoCpd"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'AireAapUnoCpd','<?php echo $consulta['AireAapUnoCpd']; ?>')"> <?php echo $consulta["AireAapUnoCpd"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["AireAapDosCpd"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'AireAapDosCpd','<?php echo $consulta['AireAapDosCpd']; ?>')"> <?php echo $consulta["AireAapDosCpd"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["AireAapUnoCe"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'AireAapUnoCe','<?php echo $consulta['AireAapUnoCe']; ?>')"> <?php echo $consulta["AireAapUnoCe"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["AireAapDosCe"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'AireAapDosCe','<?php echo $consulta['AireAapDosCe']; ?>')"> <?php echo $consulta["AireAapDosCe"]; ?></button></td>
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
                            <th scope="col">Manómetro<br>edificio</th>
                            <th scope="col">Manómetro<br>aire acondicionado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><button type="button" class="btn <?php echo $color[$consulta["HidraManometroUnoCpd"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'HidraManometroUnoCpd','<?php echo $consulta['HidraManometroUnoCpd']; ?>')"> <?php echo $consulta["HidraManometroUnoCpd"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["HidraManometroDosCpd"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'HidraManometroDosCpd','<?php echo $consulta['HidraManometroDosCpd']; ?>')"> <?php echo $consulta["HidraManometroDosCpd"]; ?></button></td>
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
                            <th scope="col">Cilindro grande CPD</th>
                            <th scope="col">Cilindro chico CE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><button type="button" class="btn <?php echo $color[$consulta["IncendioCilindroCpd"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'IncendioCilindroCpd','<?php echo $consulta['IncendioCilindroCpd']; ?>')"> <?php echo $consulta["IncendioCilindroCpd"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["IncendioCilindroCe"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'IncendioCilindroCe','<?php echo $consulta['IncendioCilindroCe']; ?>')"> <?php echo $consulta["IncendioCilindroCe"]; ?></button></td>
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
                            <th scope="col">LNS UPS 1</th>
                            <th scope="col">LNS UPS 2</th>
                            <th scope="col">Consumo red electrica</th>
                            <th scope="col">Potencia total UPS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><button type="button" class="btn <?php echo $color[$consulta["AlertaUpsUno"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'AlertaUpsUno','<?php echo $consulta['AlertaUpsUno']; ?>')"> <?php echo $consulta["AlertaUpsUno"]; ?></button></td>
                            <td><button type="button" class="btn <?php echo $color[$consulta["AlertaUpsDos"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'AlertaUpsDos','<?php echo $consulta['AlertaUpsDos']; ?>')"> <?php echo $consulta["AlertaUpsDos"]; ?></button></td>
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
                                    <th scope="col">Generador<br>LNS A 300KW</th>
                                    <th scope="col">Generador<br>LNS B 300KW</th>
                                    <th scope="col">Generador<br>DCyTIC 1 A 150KW</th>
                                    <th scope="col">Generador<br>DCyTIC 1 B 300KW</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["FugaElectrogenoGenA"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'FugaElectrogenoGenA','<?php echo $consulta['FugaElectrogenoGenA']; ?>')"> <?php echo $consulta["FugaElectrogenoGenA"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["FugaElectrogenoGenB"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'FugaElectrogenoGenB','<?php echo $consulta['FugaElectrogenoGenB']; ?>')"> <?php echo $consulta["FugaElectrogenoGenB"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["FugaElectrogenoGenC"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'FugaElectrogenoGenC','<?php echo $consulta['FugaElectrogenoGenC']; ?>')"> <?php echo $consulta["FugaElectrogenoGenC"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["FugaElectrogenoGenD"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'FugaElectrogenoGenD','<?php echo $consulta['FugaElectrogenoGenD']; ?>')"> <?php echo $consulta["FugaElectrogenoGenD"]; ?></button></td>
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
                                    <th scope="col">Generador<br>LNS A 300KW</th>
                                    <th scope="col">Generador<br>LNS B 300KW</th>
                                    <th scope="col">Generador<br>DCyTIC 1 A 150KW</th>
                                    <th scope="col">Generador<br>DCyTIC 1 B 300KW</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["RuidoElectrogenoGenA"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'RuidoElectrogenoGenA','<?php echo $consulta['RuidoElectrogenoGenA']; ?>')"> <?php echo $consulta["RuidoElectrogenoGenA"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["RuidoElectrogenoGenB"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'RuidoElectrogenoGenB','<?php echo $consulta['RuidoElectrogenoGenB']; ?>')"> <?php echo $consulta["RuidoElectrogenoGenB"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["RuidoElectrogenoGenC"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'RuidoElectrogenoGenC','<?php echo $consulta['RuidoElectrogenoGenC']; ?>')"> <?php echo $consulta["RuidoElectrogenoGenC"]; ?></button></td>
                                    <td><button type="button" class="btn <?php echo $color[$consulta["RuidoElectrogenoGenD"]];?>" onclick="cambio('<?php echo $consulta['IdRegistro']; ?>', 'RuidoElectrogenoGenD','<?php echo $consulta['RuidoElectrogenoGenD']; ?>')"> <?php echo $consulta["RuidoElectrogenoGenD"]; ?></button></td>
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
         

        <form class="needs-validation" action="actualizar_registro.php" method="post" novalidate>
            <div class="modal" id="cambio">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-info">
                            <h4>Seleccione la nueva opcion.</h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" class="form-control" name="idnuevo" id="idnuevo" aria-describedby="idactializar" placeholder="idconsulta"/>
                            <input type="hidden" class="form-control" name="columna" id="columna" aria-describedby="cadenacolumn" placeholder="columnatabla"/>
                            <div class="mb-3">
                                    Seleccion actual:
                            </div>
                            <div class="row">
                                <div class="col d-flex justify-content-center">
                                    <div class="form-check">
                                        <input class="btn-check" type="radio" name="nueva_entrada" id="nueva_entrada_positivo" value="Si" required/>
                                        <label class="btn btn-outline-success" for="nueva_entrada_positivo"> Si </label>
                                    </div>
                                </div>
                                <div class="col d-flex justify-content-center">
                                    <div class="form-check position-relative">
                                        <input class="btn-check" type="radio" name="nueva_entrada" id="nueva_entrada_negativo" value="No" required/>
                                        <label class="btn btn-outline-danger" for="nueva_entrada_negativo"> No </label>
                                        <div class="invalid-tooltip">Por favor seleccione una opción, escriba en el campo, etc.</div>
                                    </div>
                                </div>
                            </div>
                            <?php if(!isset($_SESSION['pass']))
                            { echo '
                                    <div class="mb-3 position-relative">
                                        <label for="pass" class="form-label">Contraseña</label>
                                        <input type="password" class="form-control" name="password" id="password" aria-describedby="contrasenna" required/>
                                        <small id="contrasenna" class="form-text text-muted">Porfavor escriba su contraseña para realizar el cambio.</small>
                                        <div class="invalid-tooltip">La contraseña es necesaria.</div>
                                    </div>';}
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit">Aceptar</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <footer class="text-center">
            <div class="text-center p-3">
                    Benemerita Universidad Autonoma de Puebla:
                    Laboratorio Nacional de Supercomputo del Sureste de Mexico
            </div>
        </footer>

    </main>
       
    <script src="../scripts_mantenimiento/scripts_consultas.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>
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