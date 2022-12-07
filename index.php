<?php

//Criação de Token JWT (Que será reutilizado no futuro)

function base64UrlEncode($data){
    return str_replace(['+', '/', '='], ['-', '_', ''], base64_Encode($data));
}

//Cabeçalho
$header = base64UrlEncode('{"alg":"HS256" , "typ": "JWT"}');
//Variável que armazenará dados do usuário (login, senha, chave pix)
$payload = base64UrlEncode('{"sub":"'.md5(time()).'", "name": "Olavo Carvalho", "iat": '.time().'}');
//Assinatura
$signature = base64UrlEncode(hash_hmac('sha256', $header.'.'.$payload, 'confirma', true));

echo $header.'.'.$payload.'.'.$signature;


?>