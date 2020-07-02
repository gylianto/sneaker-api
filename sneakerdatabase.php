<?php

$base_url = 'https://api.thesneakerdatabase.com/v1/sneakers?limit=100';

foreach ($_GET as $key => $value) {
    if ($value) {
        $base_url .= "&$key=$value";
    }
}

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $base_url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPGET, 1);

$response  = curl_exec($ch);

curl_close($ch);

echo(json_encode($response));
?>