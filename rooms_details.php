
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

$result = $conn->query($sql);
$result_rooms = $conn->query($sql_rooms);

$room = $result->fetch_all(MYSQLI_ASSOC);
$two_rooms = $result_rooms->fetch_all(MYSQLI_ASSOC);

/* TODO QUE NO SE PUEDA ELEGIR FECHA MAS ATRÁS QUE LA QUE HE PUESTO EN CHECK AVAILABILITY */
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['check-in']) && isset($_POST['check-out'])
    && isset($_POST['name']) && isset($_POST['email'])
    && isset($_POST['phone']) && isset($_POST['message'])) {
        $full_name = $_POST['name'];
        $phone_number = $_POST['phone'];
        $order_date = date('Y-m-d');
        $check_in = $_POST['check-in'];
        $check_out = $_POST['check-out'];
        $message = $_POST['message'];
        $price = $room[0]['price'];
        $email = $_POST['email'];
        $room_id = $_GET['id'];

        $sql = "INSERT INTO bookings (guest, phone_number, order_date, check_in, check_out, special_request, price, email, room_id) VALUES ('$full_name', '$phone_number', '$order_date', '$check_in', '$check_out', '$message', '$price', '$email', '$room_id')";

        $form_sent = true;
        $notification = 'Booked done successfully!';

        $conn->query($sql);
        $conn->close();

    } else {
        $form_sent = false;
    }
}

$today_date = date("Y-m-d");

echo $blade->run('rooms_details', ['rooms' => $room, 'two_rooms' => $two_rooms, 'today_date' => $today_date]);

$conn->close();
?>

