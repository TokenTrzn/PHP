<?php
$mysqli = new mysqli("localhost", "root", "root", "hotel_miranda");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$search = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM rooms";

if ($search) {
    $sql .= " WHERE name LIKE '%$search%'";
}

$result = $mysqli->query($sql);

echo "<h2>Lista de Habitaciones</h2>";

echo "<form method='get'>";
echo "<input type='text' name='search' placeholder='Buscar por nombre' value='" . htmlspecialchars($search) . "'>";
echo "<button type='submit'>Buscar</button>";
echo "</form>";

echo "<ul>";

while ($row = $result->fetch_assoc()) {
    $price = number_format($row["price"], 2, ".", ",");
    $offerPrice = number_format($row["offerPrice"], 2, ".", ",");
    
    echo "<li><strong>Nombre:</strong> " . htmlspecialchars($row["name"]) . "<br>";
    echo "<strong>Número:</strong> " . htmlspecialchars($row["number"]) . "<br>";
    echo "<strong>Precio:</strong> $" . $price . "<br>";
    echo "<strong>Precio con Oferta:</strong> $" . $offerPrice . "</li><br>";
}

echo "</ul>";

$result->free_result();
$mysqli->close();
?>
