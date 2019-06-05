<?php

 function token(){
 	$key = 'imap';

	$header = [
		'typ' => 'JWT',
		'alg' => 'HS256'
	];
	$header = json_encode($header);
	$header = base64_encode($header);

	$payload = [
		'iss' => 'sigem.com.br',
		'username' => 'D4vid',
		'email' => 'david.souza@imap.org.br'
	];

	$payload = json_encode($payload);
	$payload = base64_encode($payload); 

	$signature = hash_hmac('sha256', "$header.$payload", $key, true);
	$signature = base64_encode($signature);

	$token = "$header.$payload.$signature";
	return $token;
 }

$received_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJzaWdlbS5jb20uYnIiLCJ1c2VybmFtZSI6IkQ0dmlkIiwiZW1haWwiOiJkYXZpZC5zb3V6YUBpbWFwLm9yZy5iciJ9.YXb9KyI1Cr4KvJtzbuCNhfvd8Fq8nL3S5tVN9z7IqkU=';

if ($received_token === token()) {
	echo 'Token OK';
}else{
	echo 'Incorrect Token';
}

?>