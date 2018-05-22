<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

// $app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });

$app->get('/todos', function ($request, $response, $args) {
    $sth = $this->db->prepare("SELECT * FROM tasks");
    $sth->execute();
    $todos = $sth->fetch_assoc();
    
    $response = $this->view->render($response, 'todo.phtml', ['todos' => $todos]);
    
    return $response;
    // return $this->/response->withJson($todos);
});
$app->get('/todos/{id}', function ($request, $response, $args) {
    $id = $args['id'];
    $sth = $this->db->prepare("SELECT * FROM tasks where id='$id'");
    $sth->execute();
    $todos = $sth->fetchAll();
    return $this->response->withJson($todos);
 });
 


