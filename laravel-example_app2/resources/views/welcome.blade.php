<!DOCTYPE html>
<html>
<head>
<title>How to create reusable blade components in Laravel</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css" />
</head>
<body>
  
<div class="container" style="margin-top:50px;">
    <h3 style="text-align:center; margin-bottom:50px;">How to create reusable blade components in Laravel</h3>
   
    <!-- For Primary -->
    @component('components.card')    
   
        @slot('class')
            bg-primary
        @endslot
  
        @slot('title')
            This is from header
        @endslot
  
        My components with Primary
    @endcomponent
  
    <br/>
  
    <!-- For Danger -->
    @component('components.card')    
  
        @slot('class')
            bg-danger
        @endslot
  
        @slot('title')
            This is from header
        @endslot
  
        My components with Danger
    @endcomponent
  
    <br/>
   
    <!-- For Success -->
    @component('components.card')    
  
        @slot('class')
            bg-success
        @endslot
  
        @slot('title')
            This is from header
        @endslot
   
        My components with Success
    @endcomponent
  
</div>
  
</body>
</html>