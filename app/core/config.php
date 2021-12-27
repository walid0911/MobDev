<?php


define('ROOT', str_replace("public/", "", $path));
define('UPLOADS', $path. "uploads/");
define('WEBSITE_TITLE', 'E-commerce_xml');

$url = 'http://' . $_SERVER['SERVER_NAME'] .':'. $_SERVER['SERVER_PORT'] . str_replace("index.php", "", $_SERVER['PHP_SELF']) . str_replace('url=', "", $_SERVER['QUERY_STRING']);
