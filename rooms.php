<?php
require_once('setup.php');
require_once('config.php');


if(isset($_GET['check_in']) && isset($_GET['check_out'])) {
    $check_in = $_GET['check_in'];
    $check_out = $_GET['check_out'];

    $sql = "SELECT check_in, check_out, room_id FROM bookings 
            WHERE check_in >= '$check_in' AND check_out <= '$check_out'";
    
    $result_bookings = $conn->query($sql);
    $rooms_bookings = $result_bookings->fetch_all(MYSQLI_ASSOC);

    $room_queries = array();

    foreach ($rooms_bookings as $row) { 
        $room_queries[] = "SELECT r.*, COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), 'https://tinyurl.com/RoomPhoto1') AS URL FROM rooms r LEFT JOIN room_photos rp ON r.id = rp.room_id WHERE r.id = ".$row['room_id'];
    }

    $rooms = array();

    foreach ($room_queries as $sql_rooms) {
        $result_rooms = $conn->query($sql_rooms);

        while ($roomRow = $result_rooms->fetch_assoc()) {
            $rooms[] = $roomRow;
        }
    }
    
    if(count($rooms) <= 0){
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

$today_date = date("Y-m-d");

echo $blade->run('rooms', ['rooms' => $rooms, 'no_rooms' => $no_rooms, 'today_date' => $today_date]);

$conn->close();
?>
