<?php
// moduling search by $_POST

$request = '';
$response  = file_get_contents($request);
$jsonobj  = json_decode($response);