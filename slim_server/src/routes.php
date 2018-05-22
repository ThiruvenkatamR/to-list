<?php

// use Slim\Http\Request;
// use Slim\Http\Response;
use Slim\Http\LoginController;
use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods : PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept , Access-Control-Allow-Methods , Access-Control-Allow-Origin");
header("Content-Type", "application/json");
// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $x = 0;
    // Render index view
    return $this->view->render($response,'login_view.html', array('x'=>$x));
});
$app->post('/login','LoginController:index');
$app->get('/{x}', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    $x = $args['x'];
    echo $x;
    // Render index view
    return $this->view->render($response,'login_view.html', array('x'=>$x));
});

$app->get('/tasks/todos', 'TaskController:view');
$app->get('/tasks/logout', 'TaskController:logout');
$app->put('/tasks/check/{id}', 'TaskController:check');
$app->get('/tasks/delete/{id}', 'TaskController:delete');
$app->post('/tasks/insert', 'TaskController:insert');
$app->post('/tasks/edit', 'TaskController:edit');
