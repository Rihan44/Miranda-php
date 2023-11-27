
<?php 
require_once('config.php');

$id_room = $_GET['id'];

$sql = "SELECT r.*, 
COALESCE(rp.room_photo_url, 'https://tinyurl.com/RoomPhoto1') AS URL 
FROM rooms r 
LEFT JOIN (SELECT room_id, room_photo_url FROM room_photos ORDER BY id LIMIT 1) rp 
ON r.id = rp.room_id 
WHERE r.id = " . $id_room;

$sql_rooms = "SELECT r.*, COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), 'https://tinyurl.com/RoomPhoto1') AS URL FROM rooms r LEFT JOIN room_photos rp ON r.id = rp.room_id GROUP BY r.id LIMIT 2";

$result = $conn->query($sql);
$result_rooms = $conn->query($sql_rooms);

$room = $result->fetch_all(MYSQLI_ASSOC);
$two_rooms = $result_rooms->fetch_all(MYSQLI_ASSOC);

$form_sent = false;

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['check-in']) && isset($_POST['check-out'])
    && isset($_POST['name']) && isset($_POST['email'])
    && isset($_POST['phone']) && isset($_POST['message'])) {

        $full_name = htmlspecialchars($_POST['name']);
        $phone_number = htmlspecialchars($_POST['phone']);
        $order_date = date('Y-m-d');
        $check_in = htmlspecialchars($_POST['check-in']);
        $check_out = htmlspecialchars($_POST['check-out']);
        $message = htmlspecialchars($_POST['message']);
        $price = $room[0]['price'];
        $email = htmlspecialchars($_POST['email']);
        $room_id = htmlspecialchars($_GET['id']);

        $sql = "INSERT INTO bookings (guest, phone_number, order_date, check_in, check_out, special_request, price, email, room_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssi", $full_name, $phone_number, $order_date, $check_in, $check_out, $message, $price, $email, $room_id);
        $stmt->execute();
        
        $form_sent = true;
        $notification = 'Booked done successfully!';
        
        $stmt->close();
    } 
}

echo $blade->run('rooms_details', ['rooms' => $room, 'two_rooms' => $two_rooms, 'form_sent' => $form_sent, 'notification' =>  $notification]);

$conn->close();
?>

