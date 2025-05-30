<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>

    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css\error.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    </style>

</head>
<body>
    <div id="error">
        <div class="container">
            
            <div class="content">
                <img class="anim   animate__fadeInDown  " src="{{ asset('images\error\Broken Robot.png') }}" alt="error">
                <h1 class="anim">Error 404</h1>
                <h2 class="anim">Page not found</h2>
                
            </div>
        </div>
    </div>
</body>
</html>