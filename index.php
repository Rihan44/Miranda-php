<?php 
    require_once('setup.php');
    require_once('config.php');

    $sql = "SELECT rooms.*, COALESCE(p.room_photo_url, 'https://picsum.photos/seed/WsPyhTrC/640/480') AS URL FROM rooms LEFT JOIN room_photos p ON rooms.id = p.room_id";
    $result = $conn->query($sql);
    
    $rooms = $result->fetch_all(MYSQLI_ASSOC);
    
    echo $blade->run('home', ['rooms' => $rooms]);

    $conn->close();
?>