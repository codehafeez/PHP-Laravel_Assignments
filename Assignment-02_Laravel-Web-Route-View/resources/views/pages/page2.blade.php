<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel Page2</title>
</head>
<body>

    <h2>Page2 View</h2>

    @if(count($users) > 0)
        <ul>
        @foreach($users as $user)
            <li>ID: {{ $user['id'] }}, Name: {{ $user['name'] }}</li>
        @endforeach
        </ul>
    @else
        <p>No users found.</p>
    @endif


</body>
</html>
