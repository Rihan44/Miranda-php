<?php
require_once('config.php');

$amenity_icons = [
    'Bed Space' => '/img/bed-icon.png',
    '24-Hour Guard' => '/img/gym-icon.png',
    'Free Wifi' => '/img/wifi-icon.png',
    'Air Conditioner' => '/img/cold-icon.png',
    'Television' => '/img/bed-icon.png',
    'Towels' => '/img/no-smoking-icon.png',
    'Mini Bar' => '/img/cocktail-icon.png',
    'Coffee Set' => '/img/bed-icon.png',
    'Bathtub' => '/img/bed-icon.png',
    'Jacuzzi' => '/img/bed-icon.png',
    'Nice Views' => '/img/bed-icon.png',
];

if (isset($_GET['check_in']) && isset($_GET['check_out'])) {
    $check_in = htmlspecialchars($_GET['check_in']);
    $check_out = htmlspecialchars($_GET['check_out']);

    // $sql = "SELECT 
    //         r.*, 
    //         COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), 'https://tinyurl.com/RoomPhoto1') AS URL,
    //         GROUP_CONCAT(DISTINCT a.amenity_name) AS amenities
    //     FROM 
    //         rooms r
    //         LEFT JOIN room_photos rp ON r.id = rp.room_id
    //         LEFT JOIN bookings b ON r.id = b.room_id
    //         LEFT JOIN amenity_to_room atr ON r.id = atr.room_id
    //         LEFT JOIN amenities a ON atr.amenity_id = a.id
    //     WHERE (
    //         ('$check_in' >= b.check_out OR '$check_out' <= b.check_in)
    //     )
    //     OR b.room_id IS NULL
    //     GROUP BY r.id";

    $sql = "SELECT r.*,
        GROUP_CONCAT(DISTINCT p.photo_url) as photo,
        GROUP_CONCAT(a.amenity) as amenity
        FROM room r
        LEFT JOIN photos p ON r.id = p.room_id
        LEFT JOIN room_amenities ra ON r.id = ra.room_id
        LEFT JOIN amenity a ON ra.amenity_id = a.id
        WHERE r.availability = 'Available'
        AND NOT EXISTS (
            SELECT 1
            FROM booking b
            WHERE r.id = b.room_id
            AND (
                ('$check_in' BETWEEN b.check_in AND b.check_out)
                OR ('$check_out' BETWEEN b.check_in AND b.check_out)
                OR (b.check_in BETWEEN '$check_in' AND '$check_out')
                OR (b.check_out BETWEEN '$check_in' AND '$check_out')
                )
        )
        GROUP BY r.id;
    ";

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

    foreach ($rooms as $room) {
        $amenities_array = explode(',', $room['amenities']);
    }

    $items_perPage = 5; 
    $total_rooms = count($rooms);
    $total_pages = ceil($total_rooms / $items_perPage);
    $current_pag = isset($_GET['pag']) ? $_GET['pag'] : 1;
    $offset = ($current_pag - 1) * $items_perPage;

    $paginated_rooms = array_slice($rooms, $offset, $items_perPage);
    
} else {

    $sql = "SELECT 
            r.*, 
            COALESCE(GROUP_CONCAT(DISTINCT rp.room_photo_url), 'https://tinyurl.com/RoomPhoto1') AS URL,
            GROUP_CONCAT(DISTINCT a.amenity_name) AS amenities
        FROM 
            rooms r
            LEFT JOIN room_photos rp ON r.id = rp.room_id
            LEFT JOIN amenity_to_room atr ON r.id = atr.room_id
            LEFT JOIN amenities a ON atr.amenity_id = a.id
        GROUP BY r.id";

    $result = $conn->query($sql);

    $rooms = $result->fetch_all(MYSQLI_ASSOC);

    foreach ($rooms as $room) {
        $amenities_array = explode(',', $room['amenities']);
    }
}

echo $blade->run('rooms', 
    [
        'rooms' => $rooms, 
        'no_rooms' => $no_rooms, 
        'amenity_icons' => $amenity_icons, 
        'amenities_array' => $amenities_array, 
        'current_pag' => $current_pag, 
        'total_pages' => $total_pages,
        'paginated_rooms' => $paginated_rooms
    ]
);

$conn->close();
