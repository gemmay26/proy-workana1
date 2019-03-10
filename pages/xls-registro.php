<?php

require '../vendor/PhpSpreadsheet-master/vendor/autoload.php';
require '../conexion.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Jalar la data
    $sql = "select * from registro where status = 1";
    $query = mysqli_query($conex,$sql);
    $num = mysqli_num_rows($query); 
    
// organizar la data
$archivo = new Spreadsheet();
$hoja = $archivo->getActiveSheet();

// Cargar la data al excel
   $hoja->setCellValueByColumnAndRow(1,1,'id_codigo');
    $hoja->setCellValueByColumnAndRow(2,1,'codigo');
    $hoja->setCellValueByColumnAndRow(3,1,'nombre_ssid');
    $hoja->setCellValueByColumnAndRow(4,1,'contrasena_ssid');
    $hoja->setCellValueByColumnAndRow(5,1,'comentario');
    
$registro = 2;

    while($row = mysqli_fetch_array($query))
    {

    $hoja->setCellValueByColumnAndRow(1,$registro,$row['id_codigo']);
    $hoja->setCellValueByColumnAndRow(2,$registro,$row['codigo']);
    $hoja->setCellValueByColumnAndRow(3,$registro,$row['nombre_ssid']);
    $hoja->setCellValueByColumnAndRow(4,$registro,$row['contrasena_ssid']);
    $hoja->setCellValueByColumnAndRow(5,$registro,$row['comentario']);
    
    $registro++;
    }



// Crear el archvo
$writer = new Xlsx($archivo);
$nombrearchivo = '../export/'.date('Y-m-d').'_export.xlsx';
$writer->save($nombrearchivo);

// Mandar a descargar
header('Location: '.$nombrearchivo );
exit;
// Creación del objeto de la clase heredada
?>