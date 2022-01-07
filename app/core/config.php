<?php


define('ROOT', str_replace("public/", "", $path));
define('UPLOADS', $path. "uploads/");
define('WEBSITE_TITLE', 'E-commerce_xml');


$arg = explode('/',ROOT);
$index = array_search('localhost', $arg);
$arr = array_slice($arg, $index+1);
$str = implode('/',$arr);
define('ROOT_LOC', $_SERVER['DOCUMENT_ROOT'] . '/' . $str);

$url = 'http://' . $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . str_replace("index.php", "", $_SERVER['PHP_SELF']) . str_replace('url=', "", $_SERVER['QUERY_STRING']);
