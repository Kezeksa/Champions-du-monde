<?php
/**
 * Created by PhpStorm.
 * User: wilder12
 * Date: 05/10/17
 * Time: 19:19
 */


/*$o = new GuzzleHttp\Client();
echo get_class($o);die();*/

/*$client = new GuzzleHttp\Client([
        'base_uri' => 'http://openlibrary.org/search.json',
    ]
);

$response = $client->request('GET', 'test', [
        '?author' => 'tolkien',
    ]
);

$body = $response->getBody();
echo $body->getContents();*/

$request = 'http://openlibrary.org/search.json?author=tolkien';
$response  = file_get_contents($request);
$jsonobj  = json_decode($response, true);
var_dump($jsonobj);
