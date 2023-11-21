<?php 
require_once('setup.php');
require_once('config.php');

$sql = "SELECT r.*, COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), 'https://tinyurl.com/RoomPhoto1') AS URL 
FROM rooms r 
LEFT JOIN room_photos rp ON r.id = rp.room_id 
WHERE r.offer_price = true
GROUP BY r.id";

$sql_rooms = "SELECT r.*, COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), 'https://tinyurl.com/RoomPhoto1') AS URL FROM rooms r LEFT JOIN room_photos rp ON r.id = rp.room_id GROUP BY r.id LIMIT 2";

$result = $conn->query($sql);
$result_rooms = $conn->query($sql_rooms);

$rooms = $result->fetch_all(MYSQLI_ASSOC);
$two_rooms = $result_rooms->fetch_all(MYSQLI_ASSOC);

echo $blade->run('offers', ['rooms' => $rooms, 'two_rooms' => $two_rooms]);
?>