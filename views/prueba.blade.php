<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
    @foreach ($rooms as $room)
        <li>{{$room['room_type']}}</li>
    @endforeach
    </ul>
</body>
</html>
