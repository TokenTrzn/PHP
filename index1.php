<?php
$rooms = [
    ['ID' => 1, 'Name' => 'Suite Deluxe', 'Number' => 101, 'Price' => 200, 'Discount' => 10],
    ['ID' => 2, 'Name' => 'Habitación Doble', 'Number' => 102, 'Price' => 150, 'Discount' => 5],
    ['ID' => 3, 'Name' => 'Habitación Sencilla', 'Number' => 103, 'Price' => 100, 'Discount' => 0]
];

echo "<pre>" . print_r($rooms, true) . "</pre>";
?>