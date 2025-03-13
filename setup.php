<?php
require_once 'BladeOne.php';

use eftec\bladeone\BladeOne;

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($views, $cache, BladeOne::MODE_DEBUG);

function fetchRoomsFromJSON() {
    $json = file_get_contents('rooms.json');
    return json_decode($json, true);
}

function fetchRoomFromDB($id) {
    $rooms = fetchRoomsFromJSON();
    foreach ($rooms as $room) {
        if ($room['id'] == $id) {
            return $room;
        }
    }
    return null;
}

class Room {
    public $id;
    public $photo;
    public $number;
    public $name;
    public $type;
    public $amenities;
    public $price;
    public $offerPrice;
    public $status;

    public function __construct($id, $photo, $number, $name, $type, $amenities, $price, $offerPrice, $status) {
        $this->id = $id;
        $this->photo = $photo;
        $this->number = $number;
        $this->name = $number;
        $this->type = $type;
        $this->amenities = $amenities;
        $this->price = $price;
        $this->offerPrice = $offerPrice;
        $this->status = $status;
    }

    public static function getAllRoomsFromJson() {
        $roomsData = fetchRoomsFromJSON();
        $rooms = [];
        foreach ($roomsData as $roomData) {
            $rooms[] = new Room(
                $roomData['id'],
                $roomData['photo'],
                $roomData['number'],
                $roomData['name'],
                $roomData['type'],
                $roomData['amenities'],
                $roomData['price'],
                $roomData['offerPrice'],
                $roomData['status']
            );
        }
        return $rooms;
    }

    public static function getRoomFromJsonById($id) {
        $rooms = self::getAllRoomsFromJson();
        foreach ($rooms as $room) {
            if ($room->id == $id) {
                return $room;
            }
        }
        return null;
    }
}
?>