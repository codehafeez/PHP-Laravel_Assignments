<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel Page3</title>
</head>
<body>

<h2>Page3 View</h2>
<ul>
@foreach($users as $user)
    <li>Name: {{ $user['name'] }}, Email: {{ $user['email'] }}</li>
@endforeach
</ul>


</body>
</html>
