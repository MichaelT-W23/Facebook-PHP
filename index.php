<?php

$request = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/");

switch ($request) {
    case '':
    case 'index.php':
        require 'pages/home.php';
        break;
    case 'posts':
        require 'pages/user_posts.php';
        break;
    default:
        http_response_code(404);
        echo "404 - Page Not Found";
        break;
}

?>

