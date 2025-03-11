<!-- filepath: c:\Users\arwa mohamed saber\Phish_Buster\resources\views\auth\register.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div id="signup">
        <div class="container">
            <div class="content">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('register') }}" method="POST" class="anim">
                    @csrf
                    <div class="chatbot">
                        <img src="{{ asset('images/register/chatbot.png') }}" alt="logo" />
                    </div>
                    <h2>Sign up to start your journey</h2>
                    <h3>Your trusted partner</h3>

                    <label for="name">Full Name</label>
                    <input class="inp focus:outline focus:outline-[#11477b]" type="text" id="name" name="name" value="{{ old('name') }}" required />
                    @error('name')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror

                    <label for="email">Email Address</label>
                    <input class="inp focus:outline focus:outline-[#11477b]" type="email" id="email" name="email" value="{{ old('email') }}" required />
                    @error('email')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror

                    <label for="password">Password</label>
                    <input class="inp focus:outline focus:outline-[#11477b]" type="password" id="password" name="password" required />
                    @error('password')
                        <div class="text-red-500">{{ $message }}</div>
                    @enderror

                    <label for="password_confirmation">Confirm Password</label>
                    <input class="inp focus:outline focus:outline-[#11477b]" type="password" id="password_confirmation" name="password_confirmation" required />

                    <button type="submit">Sign Up</button>
                    <p>
                        Already have an account?
                        <a class="login" href="{{ route('login') }}">Log In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/auth/register.js') }}"></script>
</body>
</html>