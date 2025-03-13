<!DOCTYPE html>
<html>
<head>
    <title>Rooms</title>
</head>
<body>
    <h1>Rooms</h1>
    <ul>
        @foreach($rooms as $room)
            <li>
                <h2>Habitación {{ $room['id'] }}</h2>
                <p>{{ $room['name'] }} - {{ $room['number'] }}</p>
                <p>Precio: {{ $room['price'] }}</p>
                <p>Precio con Descuento: {{ $room['offerPrice'] }}</p>
                <p>Estado: {{ $room['status'] }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>