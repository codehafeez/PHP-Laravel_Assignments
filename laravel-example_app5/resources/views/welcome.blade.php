<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Laravel</title>
</head>
<body>

<p>Standard date is {{ dateToDMY('2020-10-5') }}</p>
<p>Helper Function => {{ myFunction() }}.</p>

</body>
</html>
