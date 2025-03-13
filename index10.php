<?php

require_once 'setup.php';

$rooms = fetchRoomsFromJSON();

echo $blade->run("rooms", ["rooms" => $rooms]);
?>