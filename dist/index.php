<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);

$routes = array(
  'index' => array(
    'controller' => 'Alpacas',
    'action' => 'index'
  ),
  'home' => array(
    'controller' => 'Alpacas',
    'action' => 'home'
  ),
  'addproject' => array(
    'controller' => 'Alpacas',
    'action' => 'addproject'
  ),
  'detail' => array(
    'controller' => 'Alpacas',
    'action' => 'detail'
  ),
  'merries' => array(
    'controller' => 'Alpacas',
    'action' => 'merries'
  ),
  'dekhengsten' => array(
    'controller' => 'Alpacas',
    'action' => 'dekhengsten'
  ),
  'dealpaca' => array(
    'controller' => 'Alpacas',
    'action' => 'dealpaca'
  ),
  'tekoop' => array(
    'controller' => 'Alpacas',
    'action' => 'tekoop'
  ),
  'showresultaten' => array(
    'controller' => 'Alpacas',
    'action' => 'showresultaten'
  ),
  'gallerij' => array(
    'controller' => 'Alpacas',
    'action' => 'gallerij'
  ),
  'contact' => array(
    'controller' => 'Alpacas',
    'action' => 'contact'
  ),
  'showresultaten' => array(
    'controller' => 'Alpacas',
    'action' => 'showresultaten'
  )
);

if(empty($_GET['page'])) {
  $_GET['page'] = 'home';
}
if(empty($routes[$_GET['page']])) {
  header('Location: index.php');
  exit();
}

if (file_exists("../.env")) {
  $variables = parse_ini_file("../.env", true);
  foreach ($variables as $key => $value) {
    putenv("$key=$value");
  }
}
$route = $routes[$_GET['page']];
$controllerName = $route['controller'] . 'Controller';

require_once __DIR__ . '/controllers/' . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->route = $route;
$controllerObj->filter();
$controllerObj->render();
