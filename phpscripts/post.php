<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<div class="container">
<?php 
  
// Récupérer le contenu de la page Web à partir de l'url.
$url = "http://127.0.0.1:8000/article/add"; 
  
// Initialisez une session CURL.
$ch = curl_init();  
 
$apiKey = "b99543ac-4f36-4b9f-b3ca-8f57fda60205";

$article = (object) array(
    'titre' => 'Bonjour',
    'description' => "je viens d'un script php"
);

$request = json_encode($article);

// Récupérer le contenu de la page
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
// On met la clé api dans le header
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Authorization: ' . $apiKey
    ));
// On déclare la requête POST
curl_setopt($ch, CURLOPT_POST, 1);
// On met l'article dans le body
curl_setopt($ch, CURLOPT_POSTFIELDS,  $request); 
//Saisir l'URL et la transmettre à la variable.
curl_setopt($ch, CURLOPT_URL, $url); 

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//Exécutez la requête 
$result = curl_exec($ch); 

var_dump($result);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
echo('code reçu : '.$httpcode);
?>
</div>
    
</body>
</html>
