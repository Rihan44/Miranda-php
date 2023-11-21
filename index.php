<?php 
    require_once('setup.php');
    require_once('config.php');

    $sql = "SELECT * FROM rooms";
    $result = $conn->query($sql);

    $rooms = $result->fetch_all(MYSQLI_ASSOC);

    // echo $blade->run('prueba', ['rooms' => $rooms]);
    echo $blade->run('home');

    $conn->close();

?>