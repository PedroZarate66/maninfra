<?php
include_once '../../include/conexion.php';
include_once '../Meses/tabla_meses.php';
include_once '../Meses/enero.php';
include_once '../Meses/febrero.php';
include_once '../Meses/marzo.php';
include_once '../Meses/abril.php';
include_once '../Meses/mayo.php';
include_once '../Meses/junio.php';
include_once '../Meses/julio.php';
include_once '../Meses/agosto.php';
include_once '../Meses/septiembre.php';
include_once '../Meses/octubre.php';
include_once '../Meses/noviembre.php';
include_once '../Meses/diciembre.php';
include_once '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\{Spreadsheet,IOFactory};


$excel = new Spreadsheet;
$hoja = $excel->getActiveSheet();


$conexion = new Crear_Conexion;
$Meses = array("Año", new Enero, new Febrero, new Marzo, new Abril, new Mayo, new Junio, new Julio, new Agosto, new Septiembre, new Octubre, new Noviembre, new Diciembre);
$fila = array();
$conexion->crear_conection();
$sql = "SELECT * FROM `calendarios` WHERE FechaAnno = ? ORDER BY FechaMes ASC;";
$stmt = $conexion->conexionBD->prepare($sql);
$stmt->bind_param("s", $_POST['anio']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8], $fila[9], $fila[10], $fila[11], $fila[12], $fila[13]);

//SE INGRESAN LOS TITULOS DE CADA COLUMNA EN LA TABLA EXCEL
$hoja->setCellValue("A1","inventario");
$hoja->setCellValue("B1","Descripcion del bien");
$hoja->setCellValue("C1","Marca");
$hoja->setCellValue("D1","Modelo");
$hoja->setCellValue("E1","No. de serie");
$hoja->setCellValue("F1","Descripcion de ubicacion");
$hoja->setCellValue("G1","Proveedor");
$hoja->setCellValue("H1","Tipo de mantenimiento");
$hoja->setCellValue("I1","Origen");
$hoja->setCellValue("J1","Estatus");
$hoja->setCellValue("K1","Mes");
$hoja->setCellValue("L1","Estado");

//EL CONTADOR NOS AYUDA A QUE INICIE EN SEGUIDA DE LOS TITULOS
//E IR BAJANDO SEGUN VAYA INCREMENTANDO
$contador = 2;  

while ($stmt->fetch())
    {

        //SE DECLARA LA VARIABLE Y SE INGRESA LA INFORMACION DENTRO DE LA MISMA
        //PARA PODER IMPRIMIR DESPUES
                
        $hoja->setCellValue("A".$contador, $fila[1]); 
        $hoja->setCellValue("B".$contador, $fila[2]); 
        $hoja->setCellValue("C".$contador, $fila[3]); 
        $hoja->setCellValue("D".$contador, $fila[4]); 
        $hoja->setCellValue("E".$contador, $fila[5]); 
        $hoja->setCellValue("F".$contador, $fila[6]); 
        $hoja->setCellValue("G".$contador, $fila[7]); 
        $hoja->setCellValue("H".$contador, $fila[8]); 
        $hoja->setCellValue("I".$contador, $fila[9]); 
        $hoja->setCellValue("J".$contador, $fila[12]); 


        //SE PREGUNTA QUE MES ES Y DEPENDIENDO DEL NUMERO QUE ESTE 
        //REGISTRADO SE INGRESA AL ARCHIVO EL NOMBRE DEL MES
        if($fila[10] == "1"){
            $hoja->setCellValue("K".$contador, "Enero");
        }
        if($fila[10] == "2"){
            $hoja->setCellValue("K".$contador, "Febrero"); 
        }
        if($fila[10] == "3"){
            $hoja->setCellValue("K".$contador, "Marzo"); 
        }
        if($fila[10] == "4"){
            $hoja->setCellValue("K".$contador, "Abril"); 
        }
        if($fila[10] == "5"){
            $hoja->setCellValue("K".$contador, "Mayo"); 
        }
        if($fila[10] == "6"){
            $hoja->setCellValue("K".$contador, "Junio"); 
        }
        if($fila[10] == "7"){
            $hoja->setCellValue("K".$contador, "Julio"); 
        }
        if($fila[10] == "8"){
            $hoja->setCellValue("K".$contador, "Agosto"); 
        }
        if($fila[10] == "9"){
            $hoja->setCellValue("K".$contador, "Septiembre");
        }
        if($fila[10] == "10"){
            $hoja->setCellValue("K".$contador, "Octubre"); 
        }
        if($fila[10] == "11"){
            $hoja->setCellValue("K".$contador, "Noviembre"); 
        }
        if($fila[10] == "12"){
            $hoja->setCellValue("K".$contador, "Diciembre"); 
        }
                
        //SE PREGUNTA CON UN NUMERO SI EL ESTADO DEL ARCHIVO ES 
        //ACTIVO O ELIMINADO, DESPUES SE INGRESA AL DOCUMENTO A
        //IMPRIMIR
        if($fila[13] == 1){
            $hoja->setCellValue("L".$contador, "Eliminado");
        }
        if($fila[13] == 0){
            $hoja->setCellValue("L".$contador, "Activo");
        }

    $contador++;

    }

//HEADERS PARA IMPRIMIR EL DOCUMENTO EN ARCHIVO EXCEL
header("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header("Content-Disposition: attachment; filename=reporte.xlsx");
header('Cache-Control: max-age=0');

//CREA EL ARCHIVO
$writer = IOFactory::createWriter($excel, 'Xlsx');
ob_end_clean();//LIMPIA Y ELIMINA EL BUFFER
$writer->save('php://output');//DESCARGA EL DOCUMENTO
exit;

// $stmt->Close();
// $conexion->cerrar_conxion();
