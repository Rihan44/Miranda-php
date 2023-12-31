<?php
    require_once('lib/BladeOne.php');

    use eftec\bladeone\BladeOne;

    $views = __DIR__ . '/views';
    $cache = __DIR__ . '/cache';
    $blade = new BladeOne($views,$cache,BladeOne::MODE_DEBUG); 

    $envFile = __DIR__.'/.env';

    if (file_exists($envFile)) {
        $envVariables = parse_ini_file($envFile);

        foreach ($envVariables as $key => $value) {
            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }

    $server_name = $_ENV['SERVER_NAME'];
    $username = $_ENV['USERNAME'];
    $password = $_ENV['PASSWORD'];
    $database = $_ENV['DATABASE'];

    // Create connection
    $conn = new mysqli($server_name, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>