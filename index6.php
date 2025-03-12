<?php
$conn = new mysqli("localhost", "root", "root", "hotel_miranda");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $stmt = $conn->prepare("SELECT * FROM rooms WHERE id = ?");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $room = $result->fetch_assoc();
    
    if ($room) {
        echo "<h2>{$room['name']}</h2>";
        echo "<p><strong>Número:</strong> {$room['number']}</p>";
        echo "<p><strong>Precio:</strong> {$room['price']}</p>";
        echo "<p><strong>Descuento:</strong> {$room['offerPrice']}</p>";
    } else {
        echo "<p>Habitación no encontrada.</p>";
    }

    $stmt->close();
} else {
    echo "<p>No se proporcionó un ID.</p>";
}

$conn->close();
?>
