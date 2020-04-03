<?php
//header.payload.signature

//header
$header = [
    'alg' => 'HS256', //HMAC - SHA256
    'typ' => 'JWT'
];

$header_json = json_encode($header);
$header_base64 = base64_encode($header_json);

echo "Cabeçalho JSON: ".$header_json;
echo "\n";
echo "Cabeçalho BASE 64: ".$header_base64;
echo "\n\n";

$payload = [
    'first_name' => 'Juliano',
    'last_name' => 'Monteiro',
    'email' => 'julianodesenv@gmail.com',
    'exp' => (new DateTime())->getTimestamp()
];

$payload_json = json_encode($payload);
$payload_base64 = base64_encode($payload_json);

echo "Payload JSON: ".$payload_json;
echo "\n";
echo "Payload BASE 64: ".$payload_base64;
echo "\n\n";

$key = 's7v2d6fs5ds72b30Fuuu';
$signature = hash_hmac('sha256', "$header_base64.$payload_base64", $key, true);
$signature_base64 = base64_encode($signature);

echo "Signature RAW: ".$signature;
echo "\n";
echo "Signature JWT: ".$signature_base64;
echo "\n\n";

$token = "$header_base64.$payload_base64.$signature_base64";
echo "TOKEN: ".$token;
