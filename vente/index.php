<?php
define('URL', 'localhost/projet_dec_janv');

function autoloader($class){
    require 'model/'. $class . '.php';
}

spl_autoload_register('autoloader');

$db = new connexion();

if(isset($_GET['controller'])){
    $controller=$_GET["controller"] . 'controller';
    $view=$_GET["controller"];
}
else{
    $controller = "usercontroller";
    $view = "user";
}

if(isset($_GET['action']))
{
    $action = $_GET['action'] . 'Action';
    $viewfile=isset($_GET['view'])?$_GET['view']:$_GET['action'];
}
else{
    $action = "loginAction";
    $viewfile="login";
}

require_once "controller/{$controller}.php";

$obj = new $controller($db);
$donnees=$obj->$action();

ob_start();
require_once "views/{$view}/{$viewfile}.php";
$datas = ob_get_clean();

require_once "template/template.php";

?>