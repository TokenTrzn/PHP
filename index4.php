<?php
if (isset($_GET['id'])) {
    $roomId = $_GET['id'];

    $jsonData = file_get_contents("rooms.json");
    $rooms = json_decode($jsonData, true);

    $foundRoom = null;
    foreach ($rooms as $room) {
        if ($room['id'] == $roomId) {
            $foundRoom = $room;
            break;
        }
    }

    if ($foundRoom) {
        echo "<h2>{$foundRoom['name']}</h2>";
        echo "<p><strong>Número:</strong> {$foundRoom['number']}</p>";
        echo "<p><strong>Precio:</strong> {$foundRoom['price']}</p>";
        echo "<p><strong>Descuento:</strong> {$foundRoom['offerPrice']}</p>";
    } else {
        echo "<p>Habitación no encontrada.</p>";
    }
} else {
    echo "<p>No se proporcionó un ID.</p>";
}
?>
