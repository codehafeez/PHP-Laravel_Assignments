<!DOCTYPE html>
<html lang="en">
<head>
<title>Alert Component Example</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body style="margin-top:50px;">
<div class="container">


    <!-- For Success -->
    @component('components.alert')    
   
        @slot('class')
            alert-success
        @endslot
  
        @slot('title')
            Success!
        @endslot
  
        My components with Success
    @endcomponent



    <!-- For danger -->
    @component('components.alert')    
   
        @slot('class')
            alert-danger
        @endslot
  
        @slot('title')
            Danger!
        @endslot
  
        My components with danger
    @endcomponent
  



    <!-- For primary -->
    @component('components.alert')    
   
        @slot('class')
            alert-primary
        @endslot
  
        @slot('title')
            Primary!
        @endslot
  
        My components with primary
    @endcomponent
  


</div>
</body>
</html>
