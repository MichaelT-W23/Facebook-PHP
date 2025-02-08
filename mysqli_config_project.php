<?php 

// Require Composer's autoloader
require_once __DIR__ . '/vendor/autoload.php';

// Load environment variables from .env file
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); // Ensure path points to where .env is stored
$dotenv->safeLoad();

// Define constants using environment variables
DEFINE('DB_USER', $_ENV['DB_USER']);
DEFINE('DB_PASSWORD', $_ENV['DB_PASSWORD']);
DEFINE('DB_HOST', $_ENV['DB_HOST']);
DEFINE('DB_NAME', $_ENV['DB_NAME']);

// Make the connection:
$dbc = mysqli_connect(
    DB_HOST, 
    DB_USER, 
    DB_PASSWORD, 
    DB_NAME
) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

?>

