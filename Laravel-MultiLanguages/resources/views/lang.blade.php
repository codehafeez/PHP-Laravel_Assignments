<!DOCTYPE html>
<html>
<head>
<title>Multi Languages Example</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body class="bg-dark">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header">
                        <h5>Multi Languages Example <span class="text-primary">www.codehafeez.com</span></h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-md-offset-6 text-right">
                                <strong>Select Language: </strong>
                            </div>
                            <div class="col-md-9">
                                <select class="form-control changeLang">
                                    <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                                    <option value="ar" {{ session()->get('locale') == 'ar' ? 'selected' : '' }}>Arabic</option>
                                    <option value="ur" {{ session()->get('locale') == 'ur' ? 'selected' : '' }}>Urdu</option>
                                </select>
                            </div>
                        </div>
                        <h2 class="mt-4 text-center">{{ __('messages.title') }}</h2>
                    </div>
                </div>
            </div>
        </div>
</div>
</body>
<script>
var url = "{{ route('lan.change') }}";
$('.changeLang').change(function(){
    window.location.href = url + "?lang=" + $(this).val();
});
</script>
</html>