<?php
require_once('config.php');

if(isset($_GET['check_in']) && isset($_GET['check_out'])) {
    $check_in = htmlspecialchars($_GET['check_in']);
    $check_out = htmlspecialchars($_GET['check_out']);

    $sql = "SELECT r.*, COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), 'https://tinyurl.com/RoomPhoto1') AS URL 
        FROM rooms r
        LEFT JOIN room_photos rp ON r.id = rp.room_id
        LEFT JOIN bookings b ON r.id = b.room_id
        WHERE (
            ('$check_in' >= b.check_out OR '$check_out' <= b.check_in)
        )
        OR b.room_id IS NULL
        GROUP BY r.id";

    $result = $conn->query($sql);

    $rooms = array();

    while ($row = $result->fetch_assoc()) {
        $rooms[] = $row;
    }

    if (count($rooms) <= 0) {
        $no_rooms = true;
    } else {
        $no_rooms = false;
    }
    
} else {
    
    $sql = "SELECT r.*, COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), 'https://tinyurl.com/RoomPhoto1') AS URL FROM rooms r LEFT JOIN room_photos rp ON r.id = rp.room_id GROUP BY r.id";

    $result = $conn->query($sql);

    $rooms = $result->fetch_all(MYSQLI_ASSOC);

    $no_rooms = false;
}

echo $blade->run('rooms', ['rooms' => $rooms, 'no_rooms' => $no_rooms]);

$conn->close();
?>
