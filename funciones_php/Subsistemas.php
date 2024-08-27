<?php
require 'fachada.php';
class adminMariaDB extends Admin_sql{
    protected function crear_conexion()
    {
        $this->nombreservidor = "localhost";
        $this->nombreusuario = "root";
        $this->contrasenna = "";
        $this->baseDatos = "infraharx";
        $this->conexionBD = new mysqli($this->nombreservidor, $this->nombreusuario, $this->contrasenna, $this->baseDatos);
    }

    protected function cerrar_conxion()
    {
        $this->conexionBD->close();
    }
    
    protected function obtenerVariableconfiguracion()
    {
        // Nombre del archivo de configuración
        $configFile = 'config.conf';

        // Leer el contenido del archivo de configuración
        $configContent = file_get_contents($configFile);

        // Verificar que el archivo fue leído correctamente
        if ($configContent === false)
        {
        die("Error al leer el archivo de configuración.");
        }

        // Usar una expresión regular para encontrar la asignación
        if (preg_match('/pepper\s*=\s*(.+)/', $configContent, $matches)) {
            // Guardar el valor de la variable en una variable de PHP
            $myVariable = $matches[1];
        } else {
            echo "No se encontró la variable en el archivo de configuración.";
        }
        return $myVariable;
    }

    public function tratamiento_registro()
    {
        $dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domiengo');
        $registroentrada = array();
        $registroentrada[0] = $_POST["identificador"];
        $registroentrada[1] = $dias[(date('N'))-1];
        $registroentrada[2] = date('Y-m-d');
        $registroentrada[3] = $_POST["entrada_salida"];
        $registroentrada[4] = $_POST["bio_acce_prin"];
        $registroentrada[5] = $_POST["bio_oficina"];
        $registroentrada[6] = $_POST["bio_vigilancia"];
        $registroentrada[7] = $_POST["bio_esclusa"];
        $registroentrada[8] = $_POST["bio_triage"];
        $registroentrada[9] = $_POST["bio_cpd"];
        $registroentrada[10] = $_POST["bio_ce"];
        if (empty($_POST["bio_observaciones"])){$registroentrada[11] = "Sin observaciones";}else{$registroentrada[11] = $_POST["bio_observaciones"];}
        $registroentrada[12] = $_POST["lamp_emer_recepcion"];
        $registroentrada[13] = $_POST["lamp_emer_pasillos"];
        $registroentrada[14] = $_POST["lamp_emer_cpd1"];
        $registroentrada[15] = $_POST["lamp_emer_cpd2"];
        $registroentrada[16] = $_POST["lamp_emer_ce1"];
        $registroentrada[17] = $_POST["lamp_emer_ce2"];
        if (empty($_POST["lamp_emer_obser"])){$registroentrada[18] = "Sin observaciones";}else{$registroentrada[18] = $_POST["lamp_emer_obser"];}
        $registroentrada[19] = $_POST["cctv_pasillo"];
        $registroentrada[20] = $_POST["cctv_cpd1"];
        $registroentrada[21] = $_POST["cctv_cpd2"];
        $registroentrada[22] = $_POST["cctv_recepcion"];
        $registroentrada[23] = $_POST["cctv_ce"];
        $registroentrada[24] = $_POST["cctv_entrada360"];
        $registroentrada[25] = $_POST["cctv_sal_emer"];
        $registroentrada[26] = $_POST["cctv_cuart_maqui"];
        $registroentrada[27] = $_POST["cctv_entra_princ"];
        $registroentrada[28] = $_POST["cctv_esclusa"];
        if (empty($_POST["cctv_observaciones"])){$registroentrada[29] = "Sin observaciones";}else{$registroentrada[29] = $_POST["cctv_observaciones"];}
        $registroentrada[30] = $_POST["aap_1_cpd_alert"];
        $registroentrada[31] = $_POST["aap_2_cpd_alert"];
        $registroentrada[32] = $_POST["aap_1_ce_alert"];
        $registroentrada[33] = $_POST["aap_2_ce_alert"];
        $registroentrada[34] = $_POST["aap_1_cpd_aire"];
        $registroentrada[35] = $_POST["aap_2_cpd_aire"];
        $registroentrada[36] = $_POST["aap_1_ce_aire"];
        $registroentrada[37] = $_POST["aap_2_ce_aire"];
        if (empty($_POST["aap_observaciones"])){$registroentrada[38] = "Sin observaciones";}else{$registroentrada[38] = $_POST["aap_observaciones"];}
        $registroentrada[39] = $_POST["hidra_mano1_cpd"];
        $registroentrada[40] = $_POST["hidra_mano2_cpd"];
        if (empty($_POST["hidra_mano_observaciones"])){$registroentrada[41] = "Sin observaciones";}else{$registroentrada[41] = $_POST["hidra_mano_observaciones"];}
        $registroentrada[42] = $_POST["incendia_cpd"];
        $registroentrada[43] = $_POST["incendia_ce"];
        if (empty($_POST["incendia_observaciones"])){$registroentrada[44] = "Sin observaciones";}else{$registroentrada[44] = $_POST["incendia_observaciones"];}
        $registroentrada[45] = $_POST["ups_1"];
        $registroentrada[46] = $_POST["ups_2"];
        $registroentrada[54] = $_POST["kwred_consumo"];
        $registroentrada[47] = $_POST["kvatotal"];
        if (empty($_POST["ups_observaciones"])){$registroentrada[48] = "Sin observaciones";}else{$registroentrada[48] = $_POST["ups_observaciones"];}
        $registroentrada[49] = $_POST["electrogeno_fugagenerador_a"];
        $registroentrada[50] = $_POST["electrogeno_fugagenerador_b"];
        $registroentrada[51] = $_POST["electrogeno_ruidogenerador_a"];
        $registroentrada[52] = $_POST["electrogeno_ruidogenerador_b"];
        if (empty($_POST["electrogeno_observaciones"]))
        {$registroentrada[53] = "Sin observaciones";}
        else{$registroentrada[53] = $_POST["electrogeno_observaciones"];}
        //a partir de este punto se pueden escribir nuevas entradas del formulario, enlazalos con el arreglo
        //$registroentrada[55] = $_POST["nombre_nuevo_elemento"];
        
        $consultasql = "INSERT INTO `registrosdiarios` 
        (`IdRegistro`, `DiaSemana`, `Fecha`, `EntradaoSalida`, 
        `BioAccesoPrincipal`, `BioOficina`, `BioVigilancia`, `BioEsclusa`, `BioTriage`, `BioCpd`, `BioCe`, `BioObservaciones`, 
        `LamparaRecepcion`, `LamparaPasillos`, `LamparaCpdUno`, `LamparaCpdDos`, `LamparaCeUno`, `LamparaCeDos`, `LamparaObservaciones`, 
        `CamaraPasillo`, `CamaraCpduno`, `CamaraCpdDos`, `CamaraRecepcion`, `CamaraCe`, `CamaraEntrada360`, `CamaraSalidaEmergencia`, `CamaraCuartoMaquinas`, `CamaraEntradaPrincipal`, `CamaraEsclusa`, `CamaraObsevaciones`, 
        `AlertAapUnoCpd`, `AlertAapDosCpd`, `AlertAapUnoCe`, `AlertAapDosCe`, `AireAapUnoCpd`, `AireAapDosCpd`, `AireAapUnoCe`, `AireAapDosCe`, `AlertAireObservaciones`, 
        `HidraManometroUnoCpd`, `HidraManometroDosCpd`, `HidraManometroObservaciones`, 
        `IncendioCilindroCpd`, `IncendioCilindroCe`, `IncendioObservaciones`, 
        `AlertaUpsUno`, `AlertaUpsDos`, `KwRedConsumo`, `KVaTotal`, `AlertaUpsObservaciones`, 
        `FugaElectrogenoGenA`, `FugaElectrogenoGenB`, `RuidoElectrogenoGenA`, `RuidoElectrogenoGenB`, `FugaRuidoElectrogenoObservaciones`)
        VALUES ('$registroentrada[0]',
                '$registroentrada[1]',
                '$registroentrada[2]',
                '$registroentrada[3]',
                '$registroentrada[4]',
                '$registroentrada[5]',
                '$registroentrada[6]',
                '$registroentrada[7]',
                '$registroentrada[8]',
                '$registroentrada[9]',
                '$registroentrada[10]',
                '$registroentrada[11]',
                '$registroentrada[12]',
                '$registroentrada[13]',
                '$registroentrada[14]',
                '$registroentrada[15]',
                '$registroentrada[16]',
                '$registroentrada[17]',
                '$registroentrada[18]',
                '$registroentrada[19]',
                '$registroentrada[20]',
                '$registroentrada[21]',
                '$registroentrada[22]',
                '$registroentrada[23]',
                '$registroentrada[24]',
                '$registroentrada[25]',
                '$registroentrada[26]',
                '$registroentrada[27]',
                '$registroentrada[28]',
                '$registroentrada[29]',
                '$registroentrada[30]',
                '$registroentrada[31]',
                '$registroentrada[32]',
                '$registroentrada[33]',
                '$registroentrada[34]',
                '$registroentrada[35]',
                '$registroentrada[36]',
                '$registroentrada[37]',
                '$registroentrada[38]',
                '$registroentrada[39]',
                '$registroentrada[40]',
                '$registroentrada[41]',
                '$registroentrada[42]',
                '$registroentrada[43]',
                '$registroentrada[44]',
                '$registroentrada[45]',
                '$registroentrada[46]',
                '$registroentrada[54]',
                '$registroentrada[47]',
                '$registroentrada[48]',
                '$registroentrada[49]',
                '$registroentrada[50]',
                '$registroentrada[51]',
                '$registroentrada[52]',
                '$registroentrada[53]')";
        return $consultasql;
    }

    public function guardar_registro()
    {
        $this->crear_conexion();
        $sql = $this->tratamiento_registro();
        if ($this->conexionBD->query($sql) === TRUE){
            echo "<br>";
        }else {
            echo "Error: ".$sql."<br>".$this->conexionBD->error;
        }
        $this->cerrar_conxion();
        $idconsulta = $this->obtener_ultimo_Id();
        $salida = $this->consulta_registro_individual($idconsulta);
        return $salida;
    }

    public function obtener_ultimo_Id()
    {
        $this->crear_conexion();
        $sql = "SELECT IdRegistro FROM registrosdiarios ORDER BY IdRegistro DESC LIMIT 1;";
        $resultado = $this->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $this->cerrar_conxion();
        if(is_null($fila)){
            return 0;
        }
        else{
            $salida = $fila['IdRegistro'];
            return $salida;
        }
    }

    public function obtener_historial_registro()
    {
        $this->crear_conexion();
        $sql = "SELECT IdRegistro, DiaSemana, DATE_FORMAT(`Fecha`, '%d-%m-%Y') AS Fecha, EntradaoSalida FROM `registrosdiarios` ORDER BY IdRegistro DESC;";
        $resultado = $this->conexionBD->query($sql);
        if ($resultado->num_rows >0)
        {
            while($fila = $resultado->fetch_assoc())
            {
                echo "<tr> <th scope='row'>" .$fila["IdRegistro"]. "</th> <td>" .$fila["DiaSemana"]. "</td> <td>" .$fila["Fecha"]. "</td> <td>" .$fila["EntradaoSalida"]. "</td> <td><button class='btn btn-success' type='submit' name='reg_detalles' id='reg_detalles' value='".$fila["IdRegistro"]."'>Detalles</button></td> </tr>";
            }
        }else
        {
            echo "Cero resultados";
        }
        $this->cerrar_conxion();
    }

    public function consulta_registro_individual($idconsulta)
    {
        $this->crear_conexion();
        $sql = "SELECT `IdRegistro`, 
        `DiaSemana`,  
        DATE_FORMAT(`Fecha`, '%d-%m-%Y') AS Fecha, 
        `EntradaoSalida`, 
        `BioAccesoPrincipal`, `BioOficina`, `BioVigilancia`, `BioEsclusa`, `BioTriage`, `BioCpd`, `BioCe`, `BioObservaciones`, 
        `LamparaRecepcion`, `LamparaPasillos`, `LamparaCpdUno`, `LamparaCpdDos`, `LamparaCeUno`, `LamparaCeDos`, `LamparaObservaciones`, 
        `CamaraPasillo`, `CamaraCpduno`, `CamaraCpdDos`, `CamaraRecepcion`, `CamaraCe`, `CamaraEntrada360`, `CamaraSalidaEmergencia`, `CamaraCuartoMaquinas`, `CamaraEntradaPrincipal`, `CamaraEsclusa`, `CamaraObsevaciones`, 
        `AlertAapUnoCpd`, `AlertAapDosCpd`, `AlertAapUnoCe`, `AlertAapDosCe`, `AireAapUnoCpd`, `AireAapDosCpd`, `AireAapUnoCe`, `AireAapDosCe`, `AlertAireObservaciones`, 
        `HidraManometroUnoCpd`, `HidraManometroDosCpd`, `HidraManometroObservaciones`, 
        `IncendioCilindroCpd`, `IncendioCilindroCe`, `IncendioObservaciones`, 
        `AlertaUpsUno`, `AlertaUpsDos`, `KwRedConsumo`, `KVaTotal`, `AlertaUpsObservaciones`, 
        `FugaElectrogenoGenA`, `FugaElectrogenoGenB`, `RuidoElectrogenoGenA`, `RuidoElectrogenoGenB`, `FugaRuidoElectrogenoObservaciones`
        FROM `registrosdiarios` WHERE IdRegistro =".$idconsulta." ;";
        $resultado = $this->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $this->cerrar_conxion();
        return $fila;
    }

    public function tratamiento_infraestructura()
    {
        $identrada = $this->obtener_ultimo_Id_Infraestructura();
        $identrada++;
        $entradainfra = array();
        $entradainfra[0] = $identrada;
        $entradainfra[1] = $_POST["infra_aspecto"];
        $entradainfra[2] = $_POST["infra_desc"];
        $entradainfra[3] = $_POST["infra_beneficios"];
        $entradainfra[4] = $_POST["infra_tipo_mantenimiento"];
        $entradainfra[5] = $_POST["infra_frecuencia"];
        $entradainfra[6] = $_POST["infra_mes_propuesto"];
        $entradainfra[7] = $_POST["infra_anno_propuesta"];
        $entradainfra[8] = $_POST["infra_prioridad"];
        $entradainfra[9] = $_POST["infra_costo_estimado"];
        $entradainfra[10] = date('Y-m-d');
        $consultasql = "INSERT INTO `actualizacionmejoramantenimietos` (`IdMejora`, `Aspecto`, `Descripcion`, `Beneficios`, `TipoMantenimiento`, `Frecuencia`, `MesPropuesto`, `AnnoPropuesto`, `Prioridad`, `Costo`, `UltimaActualizacion`, `HaSidoPlaneado`) 
                        VALUES ('$entradainfra[0]', '$entradainfra[1]', '$entradainfra[2]', '$entradainfra[3]', '$entradainfra[4]', '$entradainfra[5]', '$entradainfra[6]', '$entradainfra[7]', '$entradainfra[8]', '$entradainfra[9]', '$entradainfra[10]', 'No');";
        return $consultasql;
    }

    public function guardar_infraestructura()
    {
        $sql = $this->tratamiento_infraestructura();
        $this->crear_conexion();
        if ($this->conexionBD->query($sql) === TRUE){
            echo "<br>";
        }else {
            echo "Error: ".$sql."<br>".$this->conexionBD->error;
        }
        $this->cerrar_conxion();
        $idconsulta = $this->obtener_ultimo_Id_Infraestructura();
        $salida = $this->consulta_infraestructura_individual($idconsulta);
        return $salida;
    }

    public function obtener_datos_infraestructura()
    {
        $this->crear_conexion();
        $sql = "SELECT `IdMejora`, `Aspecto`, `Descripcion`, `Beneficios`, `TipoMantenimiento`, `Frecuencia`, `MesPropuesto`, `AnnoPropuesto`, `Prioridad`, `Costo`, DATE_FORMAT(`UltimaActualizacion`, '%d-%m-%Y') AS UltimaActualizacion, `HaSidoPlaneado` FROM `actualizacionmejoramantenimietos` ORDER BY `UltimaActualizacion` ASC;";
        $resultado = $this->conexionBD->query($sql);
        if($resultado->num_rows > 0)
        {
            while($fila = $resultado->fetch_assoc())
            {
                if ($fila["HaSidoPlaneado"] == 'Si')
                {
                    echo "<tr class='align-middle table-warning'>
                            <th scope='row'>" .$fila["Aspecto"]. "</th>
                            <td>" .$fila["Descripcion"]. "</td>
                            <td>" .$fila["Beneficios"]. "</td>
                            <td>" .$fila["TipoMantenimiento"]. "</td>
                            <td>" .$fila["Frecuencia"]. "</td>
                            <td>" .$fila["MesPropuesto"]." ".$fila["AnnoPropuesto"]. "</td>
                            <td>" .$fila["Prioridad"]. "</td>
                            <td>$" .$fila["Costo"]. "</td>
                            <td>" .$fila["UltimaActualizacion"]. "</td> 
                            <td>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>Accion</button>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasScrolling' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Calendarizar</a></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#editar' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Editar</a></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>";
                }
                else
                {
                    echo "<tr class='align-middle'>
                            <th scope='row'>" .$fila["Aspecto"]. "</th>
                            <td>" .$fila["Descripcion"]. "</td>
                            <td>" .$fila["Beneficios"]. "</td>
                            <td>" .$fila["TipoMantenimiento"]. "</td>
                            <td>" .$fila["Frecuencia"]. "</td>
                            <td>" .$fila["MesPropuesto"]." ".$fila["AnnoPropuesto"]. "</td>
                            <td>" .$fila["Prioridad"]. "</td>
                            <td>$" .$fila["Costo"]. "</td>
                            <td>" .$fila["UltimaActualizacion"]. "</td> 
                            <td>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>Accion</button>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasScrolling' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Calendarizar</a></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#editar' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Editar</a></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='mostrarmejora(\"".$fila["IdMejora"]."\")'>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>";
                }
            }
        }
        else
        {
            echo "Cero resultados";
        }
        $this->cerrar_conxion();
    }

    public function obtener_ultimo_Id_Infraestructura()
    {
        $this->crear_conexion();
        $sql = "SELECT IdMejora FROM actualizacionmejoramantenimietos ORDER BY IdMejora DESC LIMIT 1;";
        $resultado = $this->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $this->cerrar_conxion();
        if(is_null($fila))
        {
            return 0;
        }
        else
        {
            $salida = $fila["IdMejora"];
            return $salida;
        }
    }

    public function consulta_infraestructura_individual($idconsulta)
    {
        $this->crear_conexion();
        $sql = "SELECT IdMejora, Aspecto, Descripcion, Beneficios,TipoMantenimiento,Frecuencia,MesPropuesto,AnnoPropuesto,Prioridad,Costo,DATE_FORMAT(`UltimaActualizacion`, '%d-%m-%Y') AS UltimaActualizacion FROM `actualizacionmejoramantenimietos` WHERE IdMejora =".$idconsulta." ;";
        $resultado = $this->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $this->cerrar_conxion();
        return $fila;
    }

    public function eliminar_mejora_infraestructura($idconsulta)
    {
        $this->crear_conexion();
        $sql = "DELETE FROM actualizacionmejoramantenimietos WHERE IdMejora = ".$idconsulta.";";
        if ($this->conexionBD->query($sql) === TRUE) {
            echo "<h5 class='text-center'>Registro eliminado exitosamente</h5>";
        } else {
            echo "Error deleting record: " . $this->conexionBD->error;
        }
        $this->cerrar_conxion();
    }

    public function generar_consulta_calendario()
    {
        $fila = array();
        $this->crear_conexion();
        $sql = "SELECT IdMejora, Aspecto, Descripcion, Beneficios,TipoMantenimiento,Frecuencia,MesPropuesto,AnnoPropuesto,Prioridad,Costo,DATE_FORMAT(`UltimaActualizacion`, '%d-%m-%Y') AS UltimaActualizacion FROM `actualizacionmejoramantenimietos` WHERE IdMejora = ? ";
        $stmt = $this->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET['q']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10]);
        $stmt->fetch();
        $stmt->Close();
        $this->cerrar_conxion();
        if (is_null($fila[0]))
        {
            echo "La entrada de infraestructura no existe o ha sido eliminado.";
        }
        else{
        echo "<div class='table-responsive-xxl text-center'>
                <table class='table table-light table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th scope='col'>Aspecto</th>
                            <th scope='col'>Descripción</th>
                            <th scope='col'>Beneficios</th>
                            <th scope='col'>Tipo de mantenimiento</th>
                            <th scope='col'>Frecuencia</th>
                            <th scope='col'>Fecha propuesta</th>
                            <th scope='col'>Prioridad</th>
                            <th scope='col'>Costo</th>
                            <th scope='col'>Ultima Actualizacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='align-middle'>
                            <th scope='row'>" .$fila[1]. "</th>
                            <td>" .$fila[2]. "</td>
                            <td>" .$fila[3]. "</td>
                            <td>" .$fila[4]. "</td>
                            <td>" .$fila[5]. "</td>
                            <td>" .$fila[6]." ".$fila[7]. "</td>
                            <td>" .$fila[8]. "</td>
                            <td>$" .$fila[9]. "</td>
                            <td>" .$fila[10]. "</td> 
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type='hidden' class='form-control' id='origen' name='origen' value='".$fila[0]."' aria-describedby='id de mantenimiento' readonly>";}
    }

    public function obtener_ultimo_Id_calendario()
    {
        $this->crear_conexion();
        $sql = "SELECT IdCalendario FROM calendarios ORDER BY IdCalendario DESC LIMIT 1;";
        $resultado = $this->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $this->cerrar_conxion();
        if(is_null($fila))
        {

            return 0;
        }
        else
        {
            $salida = $fila["IdCalendario"];
            return $salida;
        }
    }

    public function tratamiento_calendario()
    {
        $identrada = $this->obtener_ultimo_Id_calendario();
        $identrada++;
        $calendarioEntrada = array();
        $calendarioEntrada[0] = $identrada;
        if (empty($_POST["num_inventario"])){$calendarioEntrada[1] = "N/A";}else{$calendarioEntrada[1] = $_POST["num_inventario"];}
        $calendarioEntrada[2] = $_POST["Desc_bien"];
        if (empty($_POST["marca"])){$calendarioEntrada[3] = "N/A";}else{$calendarioEntrada[3] = $_POST["marca"];}
        if (empty($_POST["modelo"])){$calendarioEntrada[4] = "N/A";}else{$calendarioEntrada[4] = $_POST["modelo"];}
        if (empty($_POST["num_serie"])){$calendarioEntrada[5] = "N/A";}else{$calendarioEntrada[5] = $_POST["num_serie"];}
        $calendarioEntrada[6] = $_POST["ubicacion_Desc"];
        $calendarioEntrada[7] = $_POST["proveedor"];
        $calendarioEntrada[8] = $_POST["tipo_mantenimiento"];
        if (empty($_POST["origen"])){$calendarioEntrada[9] = "N/A";}else{$calendarioEntrada[9] = $_POST["origen"];}
        $calendarioEntrada[10] = $_POST["mes"];
        $calendarioEntrada[11] = $_POST["anno"];
        $calendarioEntrada[12] = "Pendiente";
        if (empty($_POST["origen"]))
        {
            $consultasql = "INSERT INTO `calendarios` (`IdCalendario`, `NumInventario`, `DescBien`, `Marca`, `Modelo`, `NumSerie`, `DescUbicacion`, `Proveedor`, `TipoMantenimiento`, `Origen`, `FechaMes`, `FechaAnno`, `Estatus`) 
                            VALUES ('$calendarioEntrada[0]', '$calendarioEntrada[1]', '$calendarioEntrada[2]', '$calendarioEntrada[3]', '$calendarioEntrada[4]', '$calendarioEntrada[5]', '$calendarioEntrada[6]', '$calendarioEntrada[7]', '$calendarioEntrada[8]', '$calendarioEntrada[9]', '$calendarioEntrada[10]', '$calendarioEntrada[11]','$calendarioEntrada[12]');";
        }
        else
        {
            $consultasql = "UPDATE actualizacionmejoramantenimietos SET HaSidoPlaneado= 'Si' WHERE IdMejora= '$calendarioEntrada[9]'; INSERT INTO `calendarios` (`IdCalendario`, `NumInventario`, `DescBien`, `Marca`, `Modelo`, `NumSerie`, `DescUbicacion`, `Proveedor`, `TipoMantenimiento`, `Origen`, `FechaMes`, `FechaAnno`, `Estatus`) 
                            VALUES ('$calendarioEntrada[0]', '$calendarioEntrada[1]', '$calendarioEntrada[2]', '$calendarioEntrada[3]', '$calendarioEntrada[4]', '$calendarioEntrada[5]', '$calendarioEntrada[6]', '$calendarioEntrada[7]', '$calendarioEntrada[8]', '$calendarioEntrada[9]', '$calendarioEntrada[10]', '$calendarioEntrada[11]','$calendarioEntrada[12]');";
        }
        return $consultasql;
    }

    public function consulta_calendario_individual($idconsulta)
    {
        $this->crear_conexion();
        $sql = "SELECT * FROM `calendarios` WHERE IdCalendario =".$idconsulta.";";
        $resultado = $this->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $this->cerrar_conxion();
        return $fila;
    }

    public function guardar_registro_calendario()
    {
        $sql = $this->tratamiento_calendario();
        $this->crear_conexion();
        if ($this->conexionBD->multi_query($sql) === TRUE){
            echo "<br>";
        }else {
            echo "Error: ".$sql."<br>".$this->conexionBD->error;
        }
        $this->cerrar_conxion();
        $idconsulta = $this->obtener_ultimo_Id_calendario();
        $salida = $this->consulta_calendario_individual($idconsulta);
        return $salida;
    }
    public function eliminar_reg_calendario($idconsulta)
    {
        $this->crear_conexion();
        $sql = "DELETE FROM calendarios WHERE IdCalendario = ".$idconsulta.";";
        if ($this->conexionBD->query($sql) === TRUE) {
            echo "<h5 class='text-center'>Registro eliminado exitosamente</h5>";
        } else {
            echo "Error deleting record: " . $this->conexionBD->error;
        }
        $this->cerrar_conxion();
    }

    public function tratamiento_actualizacion_infraestructura($idconsulta)
    {
        $entradainfra = array();
        $entradainfra[0] = $idconsulta;
        $entradainfra[1] = $_POST["infra_aspecto"];
        $entradainfra[2] = $_POST["infra_desc"];
        $entradainfra[3] = $_POST["infra_beneficios"];
        $entradainfra[4] = $_POST["infra_tipo_mantenimiento"];
        $entradainfra[5] = $_POST["infra_frecuencia"];
        $entradainfra[6] = $_POST["infra_mes_propuesto"];
        $entradainfra[7] = $_POST["infra_anno_propuesta"];
        $entradainfra[8] = $_POST["infra_prioridad"];
        $entradainfra[9] = $_POST["infra_costo_estimado"];
        $entradainfra[10] = date('Y-m-d');
        $consultasql = "UPDATE actualizacionmejoramantenimietos SET Aspecto= '$entradainfra[1]', Descripcion= '$entradainfra[2]', Beneficios= '$entradainfra[3]', TipoMantenimiento= '$entradainfra[4]', Frecuencia= '$entradainfra[5]', MesPropuesto= '$entradainfra[6]', AnnoPropuesto= '$entradainfra[7]', Prioridad= '$entradainfra[8]', Costo= '$entradainfra[9]', UltimaActualizacion= '$entradainfra[10]', HaSidoPlaneado= 'No' WHERE IdMejora= '$idconsulta';";
        return $consultasql;
    }
    public function actualizacion_infraestructura($idconsulta)
    {
        $this->crear_conexion();
        $sql = $this->tratamiento_actualizacion_infraestructura($idconsulta);
        if ($this->conexionBD->query($sql) === TRUE)
        {
            echo "<h5 class='text-center'>Registro actualizado exiosamente</h5>";
            $salida = $this->consulta_infraestructura_individual($idconsulta);
        } else
        {
            echo "Error updating record: " . $this->conexionBD->error;
        }
        return $salida;
    }
    public function obtener_anno_calendario()
    {
        $this->crear_conexion();
        $sql = "SELECT DISTINCT FechaAnno FROM calendarios ORDER BY FechaAnno ASC;";
        $resultado = $this->conexionBD->query($sql);
        if($resultado->num_rows > 0)
        {
            while($fila = $resultado->fetch_assoc())
            {
                echo '<option value="'.$fila["FechaAnno"].'">'.$fila["FechaAnno"].'</option>';
            }
        }
        else
        {
            echo '<option disabled value=" ">Cero resultados</option>';
        }
        $this->cerrar_conxion();
    }
    public function desplegar_calendario()
    {
        $Meses = array("Año", new Enero, new Febrero, new Marzo, new Abril, new Mayo, new Junio, new Julio, new Agosto, new Septiembre, new Octubre, new Noviembre, new Diciembre);
        $fila = array();
        $this->crear_conexion();
        $sql = "SELECT * FROM `calendarios` WHERE FechaAnno = ? ORDER BY FechaMes ASC;";
        $stmt = $this->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET['q']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12]);
        while ($stmt->fetch())
        {
            $calendario = new tablameses($Meses[$fila[10]]);
            echo "<tr class='align-middle'>
                    <th scope='row'>" .$fila[1]. "</th>
                    <td>" .$fila[2]. "</td>
                    <td>" .$fila[3]. "</td>
                    <td>" .$fila[4]. "</td>
                    <td>" .$fila[5]. "</td>
                    <td>" .$fila[6]. "</td>
                    <td>" .$fila[7]. "</td>
                    <td>" .$fila[8]. "</td>
                    <td><a class='btn' role='button' data-bs-toggle='modal' data-bs-target='#visualizar' onclick='mostrarmejora(\"".$fila[9]."\")'>".$fila[9]."</a></td>
                    <td>
                        <select class='form-select' name='estatus_actual' onchange='cambiarEstatus(\"".$fila[0]."\",this.value)'>
                            <option selected disabled value=''>".$fila[12]."</option>
                            <option value='Realizado'>Realizado</option>
                            <option value='Por realizar'>Por realizar</option>
                            <option value='En adjudicacion'>En Adjudicacion</option>
                            <option value='Reprogramado'>Reprogramar</option>
                            <option value='Pendiente'>Pendiente</option>
                        </select>
                    </td>";
                    $calendario->imprimircalendario();
                echo "<td><button type='button' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#eliminar' onclick='mostrarregistro(\"".$fila[0]."\")'>Elimnar</button></td>
                    </tr>";
        }
        $stmt->Close();
        $this->cerrar_conxion();
    }
    public function actualizacion_dinamica_calendario($idconsulta, $estatus)
    {
        $this->crear_conexion();
        $sql = "UPDATE `calendarios` SET `Estatus`='$estatus' WHERE `IdCalendario`='$idconsulta';";
        if ($this->conexionBD->query($sql) === TRUE) {
            echo "Registro actualizado exitosamente.";
          } else {
            echo "Error updating record: " . $this->conexionBD->error;
          }
        $this->cerrar_conxion();
    }
    public function recadelario_dinamica_calendatio()
    {
        $fila = array();
        $this->crear_conexion();
        $sql = "SELECT * FROM `calendarios` WHERE IdCalendario = ? ";
        $stmt = $this->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET["q"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12]);
        $stmt->fetch();
        $stmt->Close();
        $this->cerrar_conxion();
        $anno = date('Y');
        $annomasuno = $anno++;
        echo '<div
                class="table-responsive-xxl"
            >
                <table
                    class="table table-light table-striped align-middle"
                >
                    <thead>
                        <tr>
                            <th scope="col"><label for="num_inventario" class="form-label">No. inventario</label></th>
                            <th scope="col"><label for="Desc_bien" class="form-label">Descripción del bien</label></th>
                            <th scope="col"><label for="marca" class="form-label">Marca</label></th>
                            <th scope="col"><label for="modelo" class="form-label">Modelo</label></th>
                            <th scope="col"><label for="num_serie" class="form-label">No. serie</label></th>
                            <th scope="col"><label for="ubicacion_Desc" class="form-label">Descripción de la ubicación</label></th>
                            <th scope="col"><label for="proveedor" class="form-label">Proveedor</label></th>
                            <th scope="col"><label for="tipo_mantenimiento" class="form-label">Tipo de mantenimiento</label></th>
                            <th scope="col">Fecha de realizacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="row">
                                <input
                                    type="text"
                                    class="form-control"
                                    name="num_inventario"
                                    id="num_inventario"
                                    aria-describedby="numero de inventario que recivira mantenimiento"
                                    placeholder="Numero de inventario"
                                    value="'.$fila[1].'"
                                />
                            </td>
                            <td>
                                <textarea class="form-control" name="Desc_bien" id="Desc_bien" rows="3" required>'.$fila[2].'</textarea>
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="marca"
                                    id="marca"
                                    aria-describedby="marca de la pieza"
                                    placeholder="Marca"
                                    value="'.$fila[3].'"
                                />
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="modelo"
                                    id="modelo"
                                    aria-describedby="modelo de la pieza"
                                    placeholder="Modelo"
                                    value="'.$fila[4].'"
                                />
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="num_serie"
                                    id="num_serie"
                                    aria-describedby="numero de serie de la pieza"
                                    placeholder="Numero de serie"
                                    value="'.$fila[5].'"
                                />
                            </td>
                            <td>
                                <textarea class="form-control" name="ubicacion_Desc" id="ubicacion_Desc" rows="3" required>'.$fila[6].'</textarea>
                            </td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="proveedor"
                                    id="proveedor"
                                    aria-describedby="proveedor de la pieza"
                                    placeholder="Proveedor"
                                    value="'.$fila[7].'"
                                    required
                                />
                            </td>
                            <td>
                                <select class="form-select" name="tipo_mantenimiento" id="tipo_mantenimiento" aria-label="tipo de mantenimiento a realizar" required>
                                    <option selected disabled value="">Porfavor seleccione una opcion</option>
                                    <option value="Correctivo">Correctivo</option>
                                    <option value="Preventivo">Preventivo</option>
                                    <option value="Predictivo">Predictivo</option>
                                  </select>
                            </td>
                            <td class="align-top">
                                <div
                                    class="row"
                                >
                                    <div class="col">
                                    <label for="mes" class="form-label">Mes</label>
                                        <select class="form-select" name="mes" id="mes" aria-label="Nivel de prioridad" required>
                                            <option selected disabled value="">Seleccione mes</option>
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Septiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                          </select>
                                    </div>
                                    <div class="col">
                                        <label for="anno" class="form-label">Año</label>
                                        <select class="form-select form-select-sm" name="anno" id="anno" required>
                                            <option selected disabled value="">Seleccione año</option>
                                            <option value="'. $annomasuno.'">'.$annomasuno.'</option>
                                            <option value="'.$anno.'">'.$anno.'</option>
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>';
    }
    public function consulta_dinamica_calendario()
    {
        $Meses = array("Año", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diviembre");
        $fila = array();
        $this->crear_conexion();
        $sql = "SELECT * FROM `calendarios` WHERE IdCalendario = ? ";
        $stmt = $this->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET["q"]);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12]);
        $stmt->fetch();
        $stmt->Close();
        $this->cerrar_conxion();
        echo "<div class='table-responsive'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th scope='col'>Id</th>
                            <th scope='col'>No. inventario</th>
                            <th scope='col'>Descripción del bien</th>
                            <th scope='col'>Marca</th>
                            <th scope='col'>Modelo</th>
                            <th scope='col'>No. serie</th>
                            <th scope='col'>Descripción de la ubicación</th>
                            <th scope='col'>Proveedor</th>
                            <th scope='col'>Tipo de Mantenimiento</th>
                            <th scope='col'>Origen</th>
                            <th scope='col'>Fecha de realizacion</th>
                            <th scope='col'>Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope='row'>".$fila[0]."</th>
                            <td>".$fila[1]."</td>
                            <td>".$fila[2]."</td>
                            <td>".$fila[3]."</td>
                            <td>".$fila[4]."</td>
                            <td>".$fila[5]."</td>
                            <td>".$fila[6]."</td>
                            <td>".$fila[7]."</td>
                            <td>".$fila[8]."</td>
                            <td>".$fila[9]."</td>
                            <td>".$Meses[$fila[10]]." ".$fila[11]."</td>
                            <td>".$fila[12]."</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <input type='hidden' class='form-control' name='reg_eliminar' value='".$fila[0]."' aria-describedby='id de mantenimiento' readonly>";
    }
    
    public function tratamiento_usuarios()
    {
        $entradainfra = array();
        $entradainfra[0] = $_POST["nuevo_nombre"];
        $entradainfra[1] = $_POST["tipo_usuario"];
        $entradainfra[2] = $this->tratamiento_contrasenna();
        $consultasql = "INSERT INTO `mantInfraUsuarios` (`nombreUsuario`, `tipoUsuario`, `contraseñaUsuario`) VALUES ('$entradainfra[0]', '$entradainfra[1]', '$entradainfra[2]');";
        return $consultasql;
    }
    public function guardar_usuario()
    {
        $this->crear_conexion();
        $sql = $this->tratamiento_usuarios();
        if ($this->conexionBD->query($sql) === TRUE){
            echo "registro guardado<br>";
        }else {
            echo "Error: ".$sql."<br>".$this->conexionBD->error;
        }
        $this->cerrar_conxion();
    }
    public function generar_tabla_usuarios()
    {
        $this->crear_conexion();
        $sql = "SELECT * FROM `mantinfrausuarios`;";
        $resultado = $this->conexionBD->query($sql);
        if ($resultado->num_rows > 0)
        {
            while($fila = $resultado->fetch_assoc())
            {
                echo "<tr class='align-middle'>
                            <th scope='row'>" .$fila["idusuario"]. "</th>
                            <td>" .$fila["nombreUsuario"]. "</td>
                            <td>" .$fila["tipoUsuario"]. "</td>
                            <td>" .$fila["contraseñaUsuario"]. "</td>
                            <td>
                                <div class='btn-group'>
                                    <button type='button' class='btn btn-primary dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>Accion</button>
                                    <ul class='dropdown-menu'>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#actualizar' onclick='mostrarusuario(\"".$fila["idusuario"]."\")'>Actualizar Contraseña</a></li>
                                        <li><a class='dropdown-item' type='button' data-bs-toggle='modal' data-bs-target='#eliminaruser' onclick='mostrarusuario(\"".$fila["idusuario"]."\")'>Eliminar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>";
            }
        }
        else
        {
            echo "Cero resultados";
        }
        $this->cerrar_conxion();
    }
    public function consulta_usuario()
    {
        $fila = array();
        $this->crear_conexion();
        $sql = "SELECT * FROM `mantinfrausuarios` WHERE idusuario = ? ;";
        $stmt = $this->conexionBD->prepare($sql);
        $stmt->bind_param("s", $_GET['q']);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3],);
        $stmt->fetch();
        $stmt->Close();
        $this->cerrar_conxion();
        echo "<div class='table-responsive-xxl text-center'>
                <table class='table table-light table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th scope='col'>Id Usuario</th>
                            <th scope='col'>Nombre de usuario</th>
                            <th scope='col'>Tipo de usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class='align-middle'>
                            <th scope='row'>" .$fila[0]. "</th>
                            <td>" .$fila[1]. "</td>
                            <td>" .$fila[2]. "</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <input type='hidden' class='form-control' id='origen' name='origen' value='".$fila[0]."' aria-describedby='id de mantenimiento' readonly>";
    }
    public function eliminar_usuario($idconsulta)
    {
        $this->crear_conexion();
        $sql = "DELETE FROM mantinfrausuarios WHERE idusuario = ".$idconsulta.";";
        if ($this->conexionBD->query($sql) === TRUE) {
            echo "<h5 class='text-center'>Registro eliminado exitosamente</h5>";
        } else {
            echo "Error deleting record: " . $this->conexionBD->error;
        }
        $this->cerrar_conxion();
    }
    public function actualizar_contrasenna($idconsulta)
    {
        $this->crear_conexion();
        $nuevopass = $this->tratamiento_contrasenna();
        $sql = "UPDATE mantinfrausuarios SET contraseñaUsuario= '$nuevopass' WHERE idusuario = ".$idconsulta.";";
        if ($this->conexionBD->query($sql) === TRUE)
        {
            echo "<h5 class='text-center'>Registro actualizado exiosamente</h5>";
        } else
        {
            echo "Error updating record: " . $this->conexionBD->error;
        }
    }
    protected function tratamiento_contrasenna()
    {
        $pepper = $this->obtenerVariableconfiguracion();
        $pass = $_POST['nueva_contrasenna'];
        $pass_peppered = hash_hmac("sha256", $pass, $pepper);
        $pass_hashed = password_hash($pass_peppered, PASSWORD_ARGON2ID);
        return $pass_hashed;
    }
    public function comprobar_usuario()
    {
        $this->crear_conexion();
        $usuario = $_POST["usuario"];
        $sql = "SELECT idusuario, nombreUsuario, tipoUsuario FROM mantinfrausuarios WHERE nombreUsuario = '".$usuario."';";
        $resultado = $this->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        $this->cerrar_conxion();
        if (!is_null($fila))
        {
            $id = $fila["idusuario"];
            echo "usuario encontrado: ";
            $this->comprobar_contrasenna($id, $fila);//aqui marca error
        }
        else
        {
            echo "usuario no encontrado: ";
        }
    }

    protected function obtener_contrasenna($id)
    {
        $this->crear_conexion();
        //se tuvo que cambiar el nombre de la variable de contrseña a contrasenna
        $sql = "SELECT contrasennaUsuario FROM `mantinfrausuarios` WHERE idusuario = ".$id.";";
        $resultado = $this->conexionBD->query($sql);
        $fila = $resultado->fetch_assoc();
        //aqui tambien se tuvo que cambiar los valores de contraseña a contrasenna
        $salida = $fila["contrasennaUsuario"];
        $this->cerrar_conxion();
        return $salida;
    }

    public function comprobar_contrasenna($id,$fila)
    {
        $pepper = $this->obtenerVariableconfiguracion();
        $pwd = $_POST['password'];
        $pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
        $pass_hashed = $this->obtener_contrasenna($id);//aqui marca error
        if (password_verify($pwd_peppered, $pass_hashed))
        {
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['usuario'] = $fila["nombreUsuario"];
            $_SESSION['tipo'] = $fila["tipoUsuario"];
            header("Location: ../menu_inicial/");
        }
        else
        {
            echo "Contraseña incorrecta.";
            session_unset();
            session_destroy();
            header("Location: ../");
            exit;
        }
    }
}

?>