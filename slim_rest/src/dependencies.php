<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__ . '/../templates/', [
        'cache' => false
    ]);
  $view->addExtension( new \Slim\Views\TwigExtension(
    $container->router,
    $container->request->getUri()
  ));
  return $view;
};
$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};
$container['LoginController'] = function ($c){
    $table = $c->get('db')->table('users');
    return new Slim\Http\LoginController($table);
};
$container['TaskController'] = function ($c){
    $table = $c->get('db')->table('tasks');
    $view = $c->get('view');
    return new Slim\Http\TaskController($table,$view);
};
