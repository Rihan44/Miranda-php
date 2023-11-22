
<?php 
require_once('setup.php');
require_once('config.php');

$id_room = $_GET['id'];

$sql = "SELECT r.*, 
COALESCE(rp.room_photo_url, 'https://tinyurl.com/RoomPhoto1') AS URL 
FROM rooms r 
LEFT JOIN (SELECT room_id, room_photo_url FROM room_photos ORDER BY id LIMIT 1) rp 
ON r.id = rp.room_id 
WHERE r.id = " . $id_room;

$sql_rooms = "SELECT r.*, COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), 'https://tinyurl.com/RoomPhoto1') AS URL FROM rooms r LEFT JOIN room_photos rp ON r.id = rp.room_id GROUP BY r.id LIMIT 2";
/* TODO HACER CHECK AVALIBILITY Y ME MANDE DE VUELTA A ROOMS */
/* TODO SI LE DOY A BOOK NOW Y ESTÁ EN OFERTA SE MANTEGA LA OFERTA EN ROOM DETAILS */
$result = $conn->query($sql);
$result_rooms = $conn->query($sql_rooms);

$room = $result->fetch_all(MYSQLI_ASSOC);
$two_rooms = $result_rooms->fetch_all(MYSQLI_ASSOC);

echo $blade->run('rooms_details', ['rooms' => $room, 'two_rooms' => $two_rooms]);
$conn->close();
?>

