<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "hotel_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}

$check_in = $_GET['check_in'];
$check_out = $_GET['check_out'];

$room_types = [
    "ekonom" => 10,
    "standart" => 6,
    "lux" => 3,
    "simeynyy" => 2,
    "apartaments" => 3
];

$available_rooms = [];

foreach ($room_types as $room => $total) {
    $sql = "SELECT COUNT(*) as booked FROM bookings 
            WHERE room_type = '$room' 
            AND ('$check_in' < check_out AND '$check_out' > check_in)";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $booked = $row['booked'];
    
    $available = $total - $booked;
    
    if ($available > 0) {
        $available_rooms[$room] = "Вільно: $available";
    } else {
        $available_rooms[$room] = "На цю дату всі номери заброньовані";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перевірка доступності номерів</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Результати перевірки доступності</h2>

<ul>
    <?php foreach ($available_rooms as $room => $status): ?>
        <li><strong><?php echo ucfirst($room); ?>:</strong> <?php echo $status; ?></li>
    <?php endforeach; ?>
</ul>

<a href="rooms.html">Повернутися назад</a>

</body>
</html>
