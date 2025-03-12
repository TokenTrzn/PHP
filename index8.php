<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $number = $_POST["number"];
    $price = $_POST["price"];
    $offerPrice = $_POST["offerPrice"];

    echo "<h2>Habitación Creada</h2>";
    echo "<strong>Nombre:</strong> " . htmlspecialchars($name) . "<br>";
    echo "<strong>Número:</strong> " . htmlspecialchars($number) . "<br>";
    echo "<strong>Precio:</strong> $" . number_format($price, 2, ".", ",") . "<br>";
    echo "<strong>Precio con Oferta:</strong> $" . number_format($offerPrice, 2, ".", ",") . "<br>";
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
