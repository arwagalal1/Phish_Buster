<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport"="width=device-width, initial-scale=1.0">
        <title>Access Denied</title>
        <link rel="stylesheet" href="{{ asset('css/access-denied.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
        </style>
    </head>

    <body>
        <div id="accessdenied">
            <div class="container">
                <div class="content">
                    <img class="animate__animated animate__shakeX"
                        src="{{ asset('images/accessdenied/Unavailable.png') }}" alt="accessdenied">
                    <h1 class="anim">Access Denied</h1>
                    <p class="part anim">You do not have permission<br />to access this page.</p>
                    <p class="anim">
                        {{ $message ?? 'Please try again or contact support if you believe this is an error.' }}</p>
                    <span class="anim">Any problem? <a href="{{ route('contact') }}">Contact us</a></span>
                    {{-- <a href="{{ route('home') }}" class="anim">
                        < Back to Home</a> --}}
                </div>
            </div>
        </div>
    </body>

</html>