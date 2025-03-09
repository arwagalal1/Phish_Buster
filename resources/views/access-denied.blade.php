{{-- it is a view file that will be displayed when the user enters the wrong verification code. 
The user will be redirected to this page if the verification code is incorrect. --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access Denied</title>

    <!-- style -->

    <link rel="stylesheet" href="{{ asset('css\access-denied.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap');
    </style>

</head>
<body>
    <div id="accessdenied">
        <div class="container">
            
            <div class="content">
                <img class=" animate__animated animate__shakeX " src="{{ asset('images\accessdenied\Unavailable.png')}}" alt="accessdenied">
                <h1 class=" anim"> Access Denied</h1>
                <p class="part anim">You do not have permission<br/>to access this page.</p>
                <p class="anim">The verification code you entered is incorrect.<br/>Please double-check the code you received in<br/>your email and try again</p>
                <span class=" anim">Any problem?<a href="../contactus/contact.html">Contact us</a></span>
                <!-- <a href="../hommme 2/home 2.html" class="anim" target="_blank">< Back to Home</a> -->
            </div>
        </div>
    </div>
</body>
</html>