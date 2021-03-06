<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once './database.php';
include_once './dados.php';
$database = new Database();
$db = $database->conectaBanco();
$item = new Dados($db);
$item->id = isset($_GET['id']) ? $_GET['id'] : die();
$item->pegarUmDado();
if($item->name != null){

// create array
$dado_arr = array(
"id" => $item->id,
"nome" => $item->nome,
"data" => $item->data,
"numero" => $item->numero,
);

http_response_code(200);
echo json_encode($dado_arr);
}
else{
http_response_code(404);
echo json_encode("Dado não encontrado.");
}
?>