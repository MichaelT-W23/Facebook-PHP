<?php 
require_once __DIR__ . '/vendor/autoload.php';

// Load environment variables from .env file. __DIR__ is the path of .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); 
$dotenv->safeLoad();

DEFINE('DB_USER', $_ENV['DB_USER']);
DEFINE('DB_PASSWORD', $_ENV['DB_PASSWORD']);
DEFINE('DB_HOST', $_ENV['DB_HOST']);
DEFINE('DB_NAME', $_ENV['DB_NAME']);

$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$dbc) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
}

?>

