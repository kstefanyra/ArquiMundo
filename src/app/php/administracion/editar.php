<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$json = file_get_contents('php://input');

$params = json_decode($json);

require("../conexion.php");

$ins = "UPDATE  administracion SET nombre='$params->nombre', usuario='$params->usuario', clave=shal('$params->clave'), tipo='$params->tipo'  WHERE id_usuario=$params->id_usuario";

mysqli_query($conexion, $ins) or die ('no se editó');

class Result {}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje ='datos modificados';

header('Content-Type: application/json');
echo json_encode($response);

?>