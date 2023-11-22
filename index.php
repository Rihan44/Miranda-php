<?php 
    require_once('setup.php');
    require_once('config.php');

    $sql = "SELECT r.*, COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), 'https://tinyurl.com/RoomPhoto1') AS URL FROM rooms r LEFT JOIN room_photos rp ON r.id = rp.room_id GROUP BY r.id";
    $result = $conn->query($sql);
    $rooms = $result->fetch_all(MYSQLI_ASSOC);

    if(isset($_GET['check_in']) && isset($_GET['check_out'])) {
        header("Location: rooms.php?check_in=".$_GET['check_in']."&check_out=".$_GET['check_out']);
    }

    echo $blade->run('home', ['rooms' => $rooms]);

    $conn->close();
?>