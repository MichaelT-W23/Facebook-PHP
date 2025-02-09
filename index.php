<?php

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($request) {
    case '/':
        require 'pages/home.php';
        break;
    case '/posts':
        require 'pages/user_posts.php';
        break;
}

?>
