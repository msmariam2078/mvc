<?php
// public/index.php
require_once __DIR__ . '/app/controllers/UserController.php';
require_once __DIR__ .'/app/models/UserModel.php';
require_once __DIR__ .'/config/config.php';
require_once __DIR__ . '/lib/DB/MysqliDb.php';


// $action = isset($_GET['action']) ? $_GET['action'] : 'index';

$config = require 'config/config.php';
$db = new MysqliDb(
    $config['db_host'],
    $config['db_user'],
    $config['db_pass'],
    $config['db_name']
);

$url=$_SERVER["REQUEST_URI"];

define("PAGE_PATH","/mvc_new/");





$model = new User\UserModel($db);
$controller = new controller\UserController($model);
switch ($url){
case PAGE_PATH;
$controller->index();
break;
case PAGE_PATH.'add';
var_dump($url);
$controller->addUser();
break;
case PAGE_PATH.'updateUser?id='.$_GET['id'];

$controller->updateUser($_GET['id']);
break;
case PAGE_PATH.'delete?id='.$_GET['id'];

$controller->deleteUser($_GET['id']);
break;
}
?>
