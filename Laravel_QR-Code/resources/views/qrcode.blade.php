<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Generate QR Code in Laravel</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>

    <div class="card">
    <div class="card-header">
    <h2>Simple QR Code</h2>
    </div>
    <div class="card-body">
    {!! QrCode::size(150)->generate('https://codehafeez.com/') !!}
    </div>
    </div>

</body>
</html>