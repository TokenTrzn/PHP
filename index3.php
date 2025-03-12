<?php
$jsonData = file_get_contents("rooms.json");
$rooms = json_decode($jsonData, true);
?>

<ol>
    <?php foreach ($rooms as $room): ?>
        <li>
            <strong><?php echo $room['name']; ?></strong><br>
            Número: <?php echo $room['number']; ?><br>
            Precio: <?php echo $room['price']; ?><br>
            Descuento: <?php echo $room['offerPrice']; ?>
        </li>
    <?php endforeach; ?>
</ol>
