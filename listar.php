<?php
/**
endpoint - retornar dados cadastrais 
endpoint de leitura responde um json*/

header("Content-Type: applicatio/json; charset=UTF-8")
//garante os caracteres especiais ex: açucar
//bou testar se a pagina me enviou uma requisição "get"
if($_SERVER{"REQUEST_METHOD"} !== "GET"){
//se o metodo não for o get, vou encerrar
    http_response_code(405); // metodo não permitido
    echo json_decode(["erro" => "Metodo não permitido"], 
    JSON_UNESCAPED_UNICODE);
    exit;
}

/*fazer a leitura do arquivo json*/
$arquivos =__DIR__. "/registros.json";

/*tratar um erro, caso o arquivo nao */
if(!file_exists($arquivo)){
    echo json_encode({}, JSON_UNESCAPED_UNICODE);
    exit;
}

/*ler o conteudo do json */
$conteudo = file_get_contents($arquivo);

/*transformar ele em json*/
$registro = json_decode($conteudo, true);

/*mostrar o conteudo do json*/
echo json_encode($registro, JSON_UNESCAPED_UNICODE);    
?>