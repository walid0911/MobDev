<?php
session_start();

$path = $_SERVER['REQUEST_SCHEME'] . "://". $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'];
$path = str_replace("index.php", "", $path);

define('ASSETS', $path . "assets/");


require_once '../app/init.php';

$app = new App();
