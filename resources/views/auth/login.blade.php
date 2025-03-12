<!-- filepath: c:\Users\arwa mohamed saber\Phish_Buster\resources\views\auth\login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div id="login">
        <div class="container">
            <div class="content">

                <form action="{{ route('login') }}" method="POST" class="anim">
                    @csrf
                    <div class="chatbot">
                        <img src="{{ asset('images/login/chatbot.png') }}" alt="logo" />
                    </div>
                    <h1>Log In</h1>
                    <p class="text-center mb-4 text-[#11477b] font-extralight inter-extralight text-[30px] leading-[41.15px]">Your trusted partner</p>
                    
                    {{-- @error('email', 'password')
                        
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    
                    @enderror --}}

                    <label for="email">Email Address</label>
                    <input class="inp focus:outline focus:outline-[#11477b]" type="email" id="email" name="email" value="{{ old('email') }}" required />


                    <label for="password">Password</label>
                    <input class="inp focus:outline focus:outline-[#11477b]" type="password" id="password" name="password" required />

                    <button type="submit">Log In</button>
                    <p>
                        <a href="{{ route('password.request') }}" class="forget">Forgot Password?</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/auth/login.js') }}"></script>
</body>
</html>