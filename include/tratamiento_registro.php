<?php
include_once 'Admin_sql.php';

abstract class tratamiento_registro extends Admin_sql{
    public final function tratamiento_registro()
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
}
?>