<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $number = $_POST["number"];
    $price = $_POST["price"];
    $offerPrice = $_POST["offerPrice"];
    
    $mysqli = new mysqli("localhost", "root", "root", "hotel_miranda");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("INSERT INTO rooms (name, number, price, offerPrice) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sidd", $name, $number, $price, $offerPrice);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        echo "<h2>Habitación Creada Exitosamente</h2>";
        echo "<strong>Nombre:</strong> " . htmlspecialchars($name) . "<br>";
        echo "<strong>Número:</strong> " . htmlspecialchars($number) . "<br>";
        echo "<strong>Precio:</strong> $" . number_format($price, 2, ".", ",") . "<br>";
        echo "<strong>Precio con Oferta:</strong> $" . number_format($offerPrice, 2, ".", ",") . "<br>";
    } else {
        echo "<h2>Error al crear la habitación</h2>";
    }

    $stmt->close();
    $mysqli->close();
}
?>

<h2>Crear Nueva Habitación</h2>
<form method="POST">
    <label for="name">Nombre:</label><br>
    <input type="text" name="name" id="name" required><br><br>

    <label for="number">Número:</label><br>
    <input type="number" name="number" id="number" required><br><br>

    <label for="price">Precio:</label><br>
    <input type="text" name="price" id="price" required><br><br>

    <label for="offerPrice">Precio con Oferta:</label><br>
    <input type="text" name="offerPrice" id="offerPrice" required><br><br>

    <button type="submit">Crear Habitación</button>
</form>
