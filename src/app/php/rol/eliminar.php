<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


require("../conexion.php");

$del = "DELETE FROM categoria_c WHERE id_categoria=".$_GET['id'];
mysqli_query($conexion, $del) or die ('no eliminó');

class Result {}

$response = new Result();
$response->resultado = 'OK';
$response->mensaje ='rol borrado';

header('Content-Type: application/json');
echo json_encode($response);

?>