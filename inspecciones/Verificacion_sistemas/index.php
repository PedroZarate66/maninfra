<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Nueva Inspeccíon diaria</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style> @import url('../../css_estilos/propiedades_menu_inicial.css'); </style>
        <link rel="stylesheet" href="../../css_estilos/pantalla.css">
    </head>
    <div
        class="p-3 text-center text-white" id="banner"
    >
        <div class="row">
                <div class="col d-flex justify-content-start">
                <img src="../../LNS.png" height="64" width="170">
            </div>
            <div class="col">
                <h2>Inspeccíones</h2>
                <h4>Entrada Nueva</h4>
            </div>
            <div class="col d-flex justify-content-end">
                <img src="../../buap-negativo.png" height="64" width="64">
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="btn text-dark nav-item nav-link" data-bs-toggle="modal" data-bs-target="#regreso" aria-current="step" onclick="saveForm()">
                Regresar 
            </a>
            <a class="btn text-dark nav-item nav-link" data-bs-toggle="modal" data-bs-target="#menu_inicial" aria-current="step" onclick="saveForm()">
                Inicio
            </a>
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
                    <a name="boton_salida" id="boton_salida" class="btn btn-success" href="../../menu_inicial/" role="button">Aceptar</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="menu_inicial">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h4>Advertencia</h4>
                </div>
                <div class="modal-body">
                    ¿Esta seguro que desea salir?
                </div>
                <div class="modal-footer">
                    <a name="boton_salida" id="boton_salida" class="btn btn-success" href="../../menu_inicial/" role="button">Aceptar</a>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<body><main class="content">
    <?php
    include_once '../../include/obtener_ultimo_Id.php';
    include_once '../../funciones_php/Configuracion_sesion.php';
    $obj_obt_ult_id = new Obtener_Ultimo_Id;
    $idactual = $obj_obt_ult_id->obtener_ultimo_id();
    $idactual++;
    
    ?>
    <form class="needs-validation" action="../../include/guardar_registro_inspeccion.php" method="post" novalidate>
            <div class="container-fluid mt-3">
                <h5 class="text-center">Formulario de datos</h5>
                <br>
                <div class="form-check">
                    <input class="btn-check" type="radio" name="entrada_salida" id="Entrada" value="Entrada" required>
                    <label class="btn btn-outline-primary" for="Entrada"> Entrada </label>
                </div>
                <div class="form-check position-relative">
                    <input
                        class="btn-check"
                        type="radio"
                        name="entrada_salida"
                        id="salida"
                        Value="Salida"
                        required
                    >
                    <label class="btn btn-outline-primary" for="salida">
                        Salida
                    </label>
                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                </div>
                <div
                    class="row align-items-center g-2"
                >
                    <div class="col d-flex justify-content-start"><div class="mb-3 position-relative">
                        <label for="identidad" class="form-label">ID</label>
                        <textarea class="form-control" name="identificador" id="identidad" rows="1" required><?php echo $idactual;?></textarea>
                        <div class="invalid-tooltip">El registro debe tener un identificador</div>
                    </div>
                    </div>
                    <div class="col d-flex justify-content-end"><input type="date" id="fecha" name="fecha" disabled></div>
                </div>
                
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="datos_inspeccion" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link active"
                            id="biometricos-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#biometricos"
                            type="button"
                            role="tab"
                            aria-controls="biometricos"
                            aria-selected="true"
                            onclick="saveForm()"
                        >
                            Biometricos
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="Lamparas-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#Lamparas"
                            type="button"
                            role="tab"
                            aria-controls="Lamparas"
                            aria-selected="false"
                            onclick="saveForm()"
                        >
                            Lámparas de emergencia
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="camaras-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#camaras"
                            type="button"
                            role="tab"
                            aria-controls="camaras"
                            aria-selected="false"
                            onclick="saveForm()"
                        >
                            Cámaras de CCTV
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="aap-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#aap"
                            type="button"
                            role="tab"
                            aria-controls="aap"
                            aria-selected="false"
                            onclick="saveForm()"
                        >
                            AA-P
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="hidraulica_aap-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#hidraulica_aap"
                            type="button"
                            role="tab"
                            aria-controls="hidraulica_aap"
                            aria-selected="false"
                            onclick="saveForm()"
                        >
                            Instalació hidráulica de AA-P
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="incendios-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#incendios"
                            type="button"
                            role="tab"
                            aria-controls="incendios"
                            aria-selected="false"
                            onclick="saveForm()"
                        >
                            Sistema contra incendios
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="ups-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#ups"
                            type="button"
                            role="tab"
                            aria-controls="ups"
                            aria-selected="false"
                            onclick="saveForm()"
                        >
                            UPS
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button
                            class="nav-link"
                            id="electrogeno-tab"
                            data-bs-toggle="tab"
                            data-bs-target="#electrogeno"
                            type="button"
                            role="tab"
                            aria-controls="electrogeno"
                            aria-selected="false"
                            onclick="saveForm()"
                        >
                            Grupo de electrógeno de emergencia
                        </button>
                    </li>
                    <!-- a partir de aqui van nuevas pestañas -->

                </ul>
                
                <!-- Tab panes -->
                <div class="tab-content">
                    <div
                        class="tab-pane active"
                        id="biometricos"
                        role="tabpanel"
                        aria-labelledby="biometricos-tab"
                    >
                        <div
                            class="container"
                        >
                        <br>
                        <h5>¿La lectura de huella digital es correcta?</h5>
                        <div class="row">
                            <div class="col-2">
                            Acceso Principal:
                            </div>
                            <div class="col-2">
                            <div class="form-check">
                                <input class="btn-check" type="radio" name="bio_acce_prin" id="bio_acce_posi" value="Si" required>
                                <label class="btn btn-outline-success" for="bio_acce_posi"> Si </label>
                            </div>
                            </div>
                            <div class="col-8">
                            <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="bio_acce_prin"
                                    id="bio_acce_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="bio_acce_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                            </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                            Oficinas:
                            </div>
                            <div class="col-2">
                            <div class="form-check">
                                <input class="btn-check" type="radio" name="bio_oficina" id="bio_office_pos" value="Si" required>
                                <label class="btn btn-outline-success" for="bio_office_pos"> Si </label>
                            </div>
                            </div>
                            <div class="col-8">
                            <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="bio_oficina"
                                    id="bio_office_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="bio_office_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                            </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                            Vigilancia:
                            </div>
                            <div class="col-2">
                            <div class="form-check">
                                <input class="btn-check" type="radio" name="bio_vigilancia" id="bio_vigil_pos" value="Si" required>
                                <label class="btn btn-outline-success" for="bio_vigil_pos"> Si </label>
                            </div>
                            </div>
                            <div class="col-8">
                            <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="bio_vigilancia"
                                    id="bio_vigil_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="bio_vigil_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                            </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                            Pasillo de triage:
                            </div>
                            <div class="col-2">
                            <div class="form-check">
                                <input class="btn-check" type="radio" name="bio_triage" id="bio_triage_pos" value="Si" required>
                                <label class="btn btn-outline-success" for="bio_triage_pos"> Si </label>
                            </div>
                            </div>
                            <div class="col-8">
                            <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="bio_triage"
                                    id="bio_triage_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="bio_triage_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                            </div>
                            </div>
                        </div>
                <br>
                <div class="row">
                            <div class="col-2">
                            Cuarto Electrico:
                            </div>
                            <div class="col-2">
                            <div class="form-check">
                                <input class="btn-check" type="radio" name="bio_ce" id="bio_ce_pos" value="Si" required/>
                                <label class="btn btn-outline-success" for="bio_ce_pos"> Si </label>
                            </div>
                            </div>
                            <div class="col-8">
                            <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="bio_ce"
                                    id="bio_ce_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="bio_ce_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                            </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                            Puerta esclusa 1:
                            </div>
                            <div class="col-2">
                            <div class="form-check">
                                <input class="btn-check" type="radio" name="bio_esclusa" id="bio_esclusa_pos" value="Si" required>
                                <label class="btn btn-outline-success" for="bio_esclusa_pos"> Si </label>
                            </div>
                            </div>
                            <div class="col-8">
                            <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="bio_esclusa"
                                    id="bio_esclusa_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="bio_esclusa_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                            </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                            Puerta esclusa 2:
                            </div>
                            <div class="col-2">
                            <div class="form-check">
                                <input class="btn-check" type="radio" name="bio_cpd" id="bio_cpd_pos" value="Si" required>
                                <label class="btn btn-outline-success" for="bio_cpd_pos"> Si </label>
                            </div>
                            </div>
                            <div class="col-8">
                            <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="bio_cpd"
                                    id="bio_cpd_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="bio_cpd_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                            </div>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="bio_observaciones" class="form-label">Observaciones:</label>
                            <textarea class="form-control" name="bio_observaciones" id="bio_observaciones" placeholder="Sin observaciones" rows="5"></textarea>
                        </div>
                        </div>
                    </div>
                    <div
                        class="tab-pane"
                        id="Lamparas"
                        role="tabpanel"
                        aria-labelledby="Lamparas-tab"
                    >
                        <div
                            class="container"
                        >
                        <br>
                        <h5>¿El LED está encendido sin parpadear?</h5>
                        <div class="row">
                            <div class="col-2">
                                Recepcion:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="lamp_emer_recepcion" id="lamp_recepcion_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="lamp_recepcion_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="lamp_emer_recepcion"
                                        id="lamp_recepcion_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="lamp_recepcion_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Pasillos triage:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="lamp_emer_pasillos" id="lamp_pasillos_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="lamp_pasillos_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="lamp_emer_pasillos"
                                        id="lamp_pasillos_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="lamp_pasillos_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                <div class="row">
                            <div class="col-2">
                                Cuarto Electico 1:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="lamp_emer_ce1" id="lamp_ce1_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="lamp_ce1_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="lamp_emer_ce1"
                                        id="lamp_ce1_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="lamp_ce1_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Cuarto Electico 2:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="lamp_emer_ce2" id="lamp_ce2_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="lamp_ce2_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="lamp_emer_ce2"
                                        id="lamp_ce2_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="lamp_ce2_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                <br>
                        <div class="row">
                            <div class="col-2">
                                Esclusa 1:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="lamp_emer_cpd1" id="lamp_cpd1_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="lamp_cpd1_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="lamp_emer_cpd1"
                                        id="lamp_cpd1_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="lamp_cpd1_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Esclusa 2:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="lamp_emer_cpd2" id="lamp_cpd2_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="lamp_cpd2_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="lamp_emer_cpd2"
                                        id="lamp_cpd2_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="lamp_cpd2_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="mb-3">
                                <label for="lamp_emer_obser" class="form-label">Observaciones</label>
                                <textarea class="form-control" name="lamp_emer_obser" id="lamp_emer_obser" placeholder="Sin observaciones" rows="5"></textarea>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div
                        class="tab-pane"
                        id="camaras"
                        role="tabpanel"
                        aria-labelledby="camaras-tab"
                    >
                        <div
                            class="container"
                        >
                        <br>
                        <h5>¿Las Cámaras presentan imagen?</h5>
                        <div class="row">
                            <div class="col-2">
                                Pasillos:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="cctv_pasillo" id="cctv_pasillo_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="cctv_pasillo_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="cctv_pasillo"
                                        id="cctv_pasillo_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="cctv_pasillo_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                CPD 1:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="cctv_cpd1" id="cctv_cpd1_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="cctv_cpd1_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="cctv_cpd1"
                                        id="cctv_cpd1_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="cctv_cpd1_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                CPD 2:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="cctv_cpd2" id="cctv_cpd2_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="cctv_cpd2_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="cctv_cpd2"
                                        id="cctv_cpd2_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="cctv_cpd2_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Recepción:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="cctv_recepcion" id="cctv_recepcion_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="cctv_recepcion_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="cctv_recepcion"
                                        id="cctv_recepcion_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="cctv_recepcion_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                CE:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="cctv_ce" id="cctv_ce_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="cctv_ce_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="cctv_ce"
                                        id="cctv_ce_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="cctv_ce_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Entrada 360:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="cctv_entrada360" id="cctv_entrada360_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="cctv_entrada360_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="cctv_entrada360"
                                        id="cctv_entrada360_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="cctv_entrada360_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                            Salida de emergencia:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="cctv_sal_emer" id="cctv_sal_emer_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="cctv_sal_emer_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="cctv_sal_emer"
                                        id="cctv_sal_emer_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="cctv_sal_emer_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Cuarto de máquinas:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="cctv_cuart_maqui" id="cctv_cuart_maqui_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="cctv_cuart_maqui_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="cctv_cuart_maqui"
                                        id="cctv_cuart_maqui_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="cctv_cuart_maqui_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Entrada Principal:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="cctv_entra_princ" id="cctv_entra_princ_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="cctv_entra_princ_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="cctv_entra_princ"
                                        id="cctv_entra_princ_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="cctv_entra_princ_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Esclusa:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="cctv_esclusa" id="cctv_esclusa_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="cctv_esclusa_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="cctv_esclusa"
                                        id="cctv_esclusa_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="cctv_esclusa_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip"> Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                            <div class="mb-3">
                                <label for="cctv_observaciones" class="form-label">Observaciones</label>
                                <textarea class="form-control" name="cctv_observaciones" id="cctv_observaciones" placeholder="Sin observaciones" rows="5"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div
                        class="tab-pane"
                        id="aap"
                        role="tabpanel"
                        aria-labelledby="aap-tab"
                    >
                        <div
                            class="container"
                        >
                        <br>
                        <h5>¿El tablero de eventos presenta mensaje de alerta?</h5>
                        <div class="row">
                            <div class="col-2">
                                AA-P-1 CPD:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="aap_1_cpd_alert" id="aap_1_cpd_alert_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="aap_1_cpd_alert_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="aap_1_cpd_alert"
                                        id="aap_1_cpd_alert_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="aap_1_cpd_alert_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                AA-P-2 CPD:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="aap_2_cpd_alert" id="aap_2_cpd_alert_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="aap_2_cpd_alert_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="aap_2_cpd_alert"
                                        id="aap_2_cpd_alert_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="aap_2_cpd_alert_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                AA-P-1 CE:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="aap_1_ce_alert" id="aap_1_ce_alert_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="aap_1_ce_alert_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="aap_1_ce_alert"
                                        id="aap_1_ce_alert_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="aap_1_ce_alert_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                AA-P-2 CE:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                <input class="btn-check" type="radio" name="aap_2_ce_alert" id="aap_2_ce_alert_pos" value="Si" required/>
                                <label class="btn btn-outline-success" for="aap_2_ce_alert_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="aap_2_ce_alert"
                                    id="aap_2_ce_alert_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="aap_2_ce_alert_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <h5>¿Inyecta y enfría el aire?</h5>
                        <div class="row">
                            <div class="col-2">
                                AA-P-1 CPD:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                <input class="btn-check" type="radio" name="aap_1_cpd_aire" id="aap_1_cpd_aire_pos" value="Si" required/>
                                <label class="btn btn-outline-success" for="aap_1_cpd_aire_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="aap_1_cpd_aire"
                                    id="aap_1_cpd_aire_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="aap_1_cpd_aire_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                AA-P-2 CPD:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                <input class="btn-check" type="radio" name="aap_2_cpd_aire" id="aap_2_cpd_aire_pos" value="Si" required/>
                                <label class="btn btn-outline-success" for="aap_2_cpd_aire_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="aap_2_cpd_aire"
                                    id="aap_2_cpd_aire_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="aap_2_cpd_aire_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                AA-P-1 CE:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                <input class="btn-check" type="radio" name="aap_1_ce_aire" id="aap_1_ce_aire_pos" value="Si" required/>
                                <label class="btn btn-outline-success" for="aap_1_ce_aire_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="aap_1_ce_aire"
                                    id="aap_1_ce_aire_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="aap_1_ce_aire_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                AA-P-2 CE:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                <input class="btn-check" type="radio" name="aap_2_ce_aire" id="aap_2_ce_aire_pos" value="Si" required/>
                                <label class="btn btn-outline-success" for="aap_2_ce_aire_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                <input
                                    class="btn-check"
                                    type="radio"
                                    name="aap_2_ce_aire"
                                    id="aap_2_ce_aire_neg"
                                    value="No"
                                    required
                                />
                                <label class="btn btn-outline-danger" for="aap_2_ce_aire_neg">
                                    No
                                </label>
                                <div class="invalid-tooltip">Por favor seleccione una opción</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <label for="aap_observaciones" class="form-label">Observaciones</label>
                            <textarea class="form-control" name="aap_observaciones" id="aap_observaciones" placeholder="Sin observaciones" rows="5"></textarea>
                        </div>
                        </div>
                        
                    </div>
                    <div
                        class="tab-pane"
                        id="hidraulica_aap"
                        role="tabpanel"
                        aria-labelledby="hidraulica_aap-tab"
                    >
                        <div
                            class="container"
                        >
                        <br>
                        <h5>¿El manómetro tiene una presión diferente a "0"?</h5>
                        <div class="row">
                            <div class="col-2">
                                Manómetro 1 CPD:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="hidra_mano1_cpd" id="hidra_mano1_cpd_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="hidra_mano1_cpd_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="hidra_mano1_cpd"
                                        id="hidra_mano1_cpd_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="hidra_mano1_cpd_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Manómetro 2 CPD:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="hidra_mano2_cpd" id="hidra_mano2_cpd_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="hidra_mano2_cpd_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="hidra_mano2_cpd"
                                        id="hidra_mano2_cpd_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="hidra_mano2_cpd_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                            <br>
                            <div class="mb-3">
                                <label for="hidra_mano_observaciones" class="form-label">Observaciones</label>
                                <textarea class="form-control" name="hidra_mano_observaciones" id="hidra_mano_observaciones" placeholder="Sin observaciones" rows="5"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div
                        class="tab-pane"
                        id="incendios"
                        role="tabpanel"
                        aria-labelledby="incendios-tab"
                    >
                        <div
                            class="container"
                        >
                        <br>
                        <h5>¿La aguja del manómetro marca el color verde?</h5>
                        <div class="row">
                            <div class="col-2">
                                Cilindro CPD:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="incendia_cpd" id="incendia_cpd_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="incendia_cpd_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="incendia_cpd"
                                        id="incendia_cpd_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="incendia_cpd_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Cilindro CE:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="incendia_ce" id="incendia_ce_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="incendia_ce_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="incendia_ce"
                                        id="incendia_ce_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="incendia_ce_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                            <div class="mb-3">
                                <label for="incendia_observaciones" class="form-label">Observaciones</label>
                                <textarea class="form-control" name="incendia_observaciones" id="incendia_observaciones" placeholder="Sin observaciones" rows="5"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div
                        class="tab-pane"
                        id="ups"
                        role="tabpanel"
                        aria-labelledby="ups-tab"
                    >
                        <div
                            class="container"
                        >
                        <br>
                        <h5>¿El tablero de eventos presenta mensaje de alerta?</h5>
                        <div class="row">
                            <div class="col-2">
                                UPS 1:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="ups_1" id="ups_1_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="ups_1_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="ups_1"
                                        id="ups_1_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="ups_1_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                UPS 2:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="ups_2" id="ups_2_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="ups_2_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="ups_2"
                                        id="ups_2_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="ups_2_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3 d-flex justify-content-start">
                                Consumo red electrica (TT):
                            </div>
                            <div class="col-4 d-flex justify-content-start position-relative">
                                <div class="input-group has-validation">
                                    <input type="number" min="0" max="1000" step="0.01" inputmode="decimal" name="kwred_consumo" id="kwred_consumo" class="form-control" oninput="sumaWatts()" aria-label="cantidad total de potencia" required>
                                    <span class="input-group-text">KVA</span>
                                    <div class="invalid-tooltip">Por favor, escriba la informacíon requerida.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3 d-flex justify-content-start">
                                Salida UPS DCyTIC:
                            </div>
                            <div class="col-4 d-flex justify-content-start position-relative">
                                <div class="input-group has-validation">
                                    <input type="number" min="0" max="1000" step="0.01" inputmode="decimal" name="kwsalida_dctyc" id="kwsalida_dctyc" class="form-control" oninput="sumaWatts()" aria-label="cantidad total de potencia">
                                    <span class="input-group-text">KVA</span>
                                    <div class="invalid-tooltip">Por favor, escriba la informacíon requerida.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3 d-flex justify-content-start">
                                Salida UPS LNS 1:
                            </div>
                            <div class="col-4 d-flex justify-content-start position-relative">
                                <div class="input-group has-validation">
                                    <input type="number" min="0" max="1000" step="0.01" inputmode="decimal" name="kwsalida_lns1" id="kwsalida_lns1" class="form-control" oninput="sumaWatts()" aria-label="cantidad total de potencia" required>
                                    <span class="input-group-text">KVA</span>
                                    <div class="invalid-tooltip">Por favor, escriba la informacíon requerida.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3 d-flex justify-content-start">
                                Salida UPS LNS 2:
                            </div>
                            <div class="col-4 d-flex justify-content-start position-relative">
                                <div class="input-group has-validation">
                                    <input type="number" min="0" max="1000" step="0.01" inputmode="decimal" name="kwsalida_lns2" id="kwsalida_lns2" class="form-control" oninput="sumaWatts()" aria-label="cantidad total de potencia" required>
                                    <span class="input-group-text">KVA</span>
                                    <div class="invalid-tooltip">Por favor, escriba la informacíon requerida.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3 d-flex justify-content-start">
                                Potencia total UPS:
                            </div>
                            <div class="col-4 d-flex justify-content-start position-relative">
                                <div class="input-group has-validation">
                                    <input type="number" min="0" max="1000" step="0.01" inputmode="decimal" name="kvatotal" id="kvatotal" class="form-control" aria-label="cantidad total de potencia" required>
                                    <span class="input-group-text">KVA</span>
                                    <div class="invalid-tooltip">Por favor, escriba la informacíon requerida.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                            <div class="mb-3">
                                <label for="ups_observaciones" class="form-label">Observaciones</label>
                                <textarea class="form-control" name="ups_observaciones" id="ups_observaciones" placeholder="Sin observaciones" rows="5"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <div
                        class="tab-pane"
                        id="electrogeno"
                        role="tabpanel"
                        aria-labelledby="electrogeno-tab"
                    >
                        <div
                            class="container"
                        >
                        <br>
                        <h5>¿El generador presenta algún tipo de fuga?</h5>
                        <div class="row">
                            <div class="col-2">
                                Generador A:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="electrogeno_fugagenerador_a" id="electrogeno_fugagenerador_a_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="electrogeno_fugagenerador_a_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="electrogeno_fugagenerador_a"
                                        id="electrogeno_fugagenerador_a_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="electrogeno_fugagenerador_a_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                            Generador B:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="electrogeno_fugagenerador_b" id="electrogeno_fugagenerador_b_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="electrogeno_fugagenerador_b_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="electrogeno_fugagenerador_b"
                                        id="electrogeno_fugagenerador_b_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="electrogeno_fugagenerador_b_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <h5>¿El pre-calentador emite calor, produce ruido y vibra?</h5>
                        <div class="row">
                            <div class="col-2">
                                Generador A:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="electrogeno_ruidogenerador_a" id="electrogeno_ruidogenerador_a_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="electrogeno_ruidogenerador_a_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="electrogeno_ruidogenerador_a"
                                        id="electrogeno_ruidogenerador_a_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="electrogeno_ruidogenerador_a_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-2">
                                Generador B:
                            </div>
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="btn-check" type="radio" name="electrogeno_ruidogenerador_b" id="electrogeno_ruidogenerador_b_pos" value="Si" required/>
                                    <label class="btn btn-outline-success" for="electrogeno_ruidogenerador_b_pos"> Si </label>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-check position-relative">
                                    <input
                                        class="btn-check"
                                        type="radio"
                                        name="electrogeno_ruidogenerador_b"
                                        id="electrogeno_ruidogenerador_b_neg"
                                        value="No"
                                        required
                                    />
                                    <label class="btn btn-outline-danger" for="electrogeno_ruidogenerador_b_neg">
                                        No
                                    </label>
                                    <div class="invalid-tooltip">Por favor seleccione una opción.</div>
                                </div>
                            </div>
                        </div>
                        <br>
                            <div class="mb-3">
                                <label for="electrogeno_observaciones" class="form-label">Observaciones</label>
                                <textarea class="form-control" name="electrogeno_observaciones" id="electrogeno_observaciones" placeholder="Sin observaciones" rows="5"></textarea>
                            </div>
                            
                        </div>
                        
                    </div>
                    <!-- a partir de aqui van los nuevos espacios de las pestañas -->


                </div>
            </div>
            <div class="modal" id="termino">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-warning">
                            <h4 class="modal-title">Advertencia</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            Por favor asegure que todos los datos sean correctos antes de continuar.
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" data-bs-dismiss="modal" onclick="clearForm()">Aceptar</button>
                        </div>
                    </div>
                </div>
            </div>
  </form>
        </main> 
        <footer class="bg-body-tertiary text-center">
            <!-- Grid container -->
            <div class="container-fluid bg-white d-flex justify-content-end">
                <button type="button" class="btn btn-lg" id="botones" data-bs-toggle="modal" data-bs-target="#termino">Finalizar</button>
            </div>
            <div class="container p-4 bg-light"></div>
            <!-- Grid container -->
        
            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            Benemerita Universidad Autonoma de Puebla:
            <a class="text-body">Laboratorio Nacional de Supercomputo del Sureste de Mexico</a>
            </div>
            <!-- Copyright -->
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="../../scripts_mantenimiento/scripts_rutinarios.js"></script>
        </body>


    <!--
    codigo para nueva pestaña
    <li class="nav-item" role="presentation">
        <button
            class="nav-link active"
            id="Nombre-tab"
            data-bs-toggle="tab"
            data-bs-target="#Nombre"
            type="button"
            role="tab"
            aria-controls="Nombre para nueva seccion"
            aria-selected="true"
            onclick="saveForm()"
            >
            Nombre de la seccion
        </button>
    </li>


    codigo para el espacio de la nueva pestaña
    <div
        class="tab-pane"
        id="Nombre"
        role="tabpanel"
        aria-labelledby="Espacio para nuevo formulario"
    >
        <div
        class="container">
            Aqui se colocan nuevos componentes para añadir al formulario
        </div>
    </div>


    codigo para nuevo componente a comprobar.
    <h5>pregunta para preguntar</h5>
    <div class="row">
        <div class="col-2">
            nombre componente nuevo:
        </div>
        <div class="col-2">
            <div class="form-check">
                <input class="btn-check" type="radio" name="identificador_formulario" id="identificador_para_texto_positivo" value="Si" required/>
                <label class="btn btn-outline-success" for="identificador_para_texto_positivo"> Si </label>
            </div>
        </div>
        <div class="col-8">
            <div class="form-check position-relative">
                <input
                    class="btn-check"
                    type="radio"
                    name="identificador_formulario"
                    id="identificador_para_texto_negativo"
                    value="No"
                    required
                />
                <label class="btn btn-outline-danger" for="identificador_para_texto_negativo">
                    No
                </label>
                <div class="invalid-tooltip">Por favor seleccione una opción, escriba en el campo, etc.</div>
            </div>
        </div>
    </div>


    si son inputs de texto numerioco u otro
    <div class="row">
        <div class="col-3 d-flex justify-content-start">
            nombre de componente nuevo:
        </div>
        <div class="col-4 d-flex justify-content-start position-relative">
            <div class="input-group has-validation">
                <input type="number" min="0" max="1000" step="0.01" inputmode="decimal" name="identificador_formulario" id="identificador_formulario" class="form-control" required>
                <span class="input-group-text">KVA</span>
                <div class="invalid-tooltip">Por favor, escriba la informacíon requerida.</div>
            </div>
        </div>
    </div>
    -->
</html>
