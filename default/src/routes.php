<?php
use Slim\Http\Request;
use Slim\Http\Response;


// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
 
    $data_json = file_get_contents('https://gateway.marvel.com:443/v1/public/characters?limit=20&offset=100&ts=1&apikey=8f634b134cb22f391b45bb0d077c9de4&hash=50177e95bf2d758c0e2f2d6646df67b4');
    $data_array = json_decode($data_json, true);
    $_SESSION['data'] = $data_array;
    $_SESSION['currentId'] = 0;
    // var_dump($data_array['data']['results'][0]);
    // Render index view
    return $this->view->render($response, 'index.twig', [
        'dataM' => $data_array
    ]);
})->setName('index');

$app->get('/detail-character/{id}', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/detail-character' route");
    
    $dataM = $_SESSION['data']['data']['results'][$args['id']];
    
    // Render index view
    return $this->view->render($response, 'detail-character.twig', [
        'dataM' =>  $dataM
    ]);
})->setName('detail-character');

$app->get('/page1/{id}', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/page1' route");

    if ($_SESSION['currentId'] > 0) {

    }
    $data_json = file_get_contents('https://gateway.marvel.com:443/v1/public/characters?limit=20&offset=100&ts=1&apikey=8f634b134cb22f391b45bb0d077c9de4&hash=50177e95bf2d758c0e2f2d6646df67b4');
    
    if ($args['id'] === 1) {
        $data_json = file_get_contents('https://gateway.marvel.com:443/v1/public/characters?limit=20&offset=100&ts=1&apikey=8f634b134cb22f391b45bb0d077c9de4&hash=50177e95bf2d758c0e2f2d6646df67b4');
        $data_array = json_decode($data_json, true);
    }
     
    // Render index view
    return $this->view->render($response, 'page1.twig', [
        'dataM' =>  $dataM
    ]);
})->setName('page1');

