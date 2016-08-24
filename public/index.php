<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Cargar librerias automaticamente
require '../vendor/autoload.php';

// Mostrar errores
$config['displayErrorDetails'] = true;
// Donde va a estar el codigo de nuestra aplicacion
$config['base_url'] = "app/";

// Crear la aplicacion de Slim y pasar la configuracion
$app = new \Slim\App(["settings" => $config]);
// Obtener el container para configurar
$container = $app->getContainer();

// Utilizar Twig para las vistas
$container['view'] = function ($container) {
    // Los templates estaran en app/templates
    $view = new \Slim\Views\Twig('../app/templates', [
        'cache' => 'false', // No cachear los templates
        'debug' => 'true', // Mostrar errores
    ]);
    
    // Decirle a Twig cual es el root de nuestro servidor
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

// Descomentar esto para configurar la base de datos
/*$database_data = "mysql:dbname=basedatos;host=127.0.0.1";
$pdo = new PDO($database_data, "root", "root");
$structure = new NotORM_Structure_Discovery($pdo, $cache = null, $foreign = '%s');
$database = new NotORM($pdo, $structure);
$database->debug = true;*/

session_start();

require '../app/router.php';

$app->run();

?>