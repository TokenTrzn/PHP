<?php
$mysqli = new mysqli("localhost", "root", "root", "hotel_miranda");

if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
}

$sql = "SELECT * FROM rooms";
$result = $mysqli->query($sql);

echo "<ul>";

while ($row = $result->fetch_assoc()) {
    echo "<li><strong>Nombre:</strong> " . htmlspecialchars($row["name"]) . "<br>";
    echo "<strong>Número:</strong> " . htmlspecialchars($row["number"]) . "<br>";
    echo "<strong>Precio:</strong> $" . ($row["price"]) . "<br>";
    echo "<strong>Precio con Oferta:</strong> $" . ($row["offerPrice"]) . "</li><br>";
}

echo "</ul>";

$result->free_result();
$mysqli->close();
?>