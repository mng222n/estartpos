<?php

/**
 * Start up Slim
 */
$app = new \Slim\Slim();

// http://help.slimframework.com/discussions/problems/7171-the-function-urlfor-does-not-exist
$twigView = new \Slim\Views\Twig(); 

$app = new \Slim\Slim(array(
    'debug' => true,
    'view' => $twigView,
    'templates.path' => 'templates/',
));

$app->get('/', function () {
    echo "{'message':'Welcome to Web Services API Using Slim Framework'}";
});

require 'routes.php';

$app->run();