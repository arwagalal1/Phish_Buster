<!-- filepath: c:\Users\arwa mohamed saber\Phish_Buster\resources\views\home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    </style>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <script>
        function toggleMenu() {
          const menu = document.getElementById("menu");
          menu.classList.toggle("hidden");
        }
    </script>
</head>
<body class="bg-white">
    <div>
        <!-- Navigation -->
        <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-10">
            <div class="max-w-9xl mx-auto px-4">
                <div class="flex justify-between items-center py-1">
                    <div>
                        <img src="{{ asset('images/home/logo1.png') }}" alt="logo" class="h-[60px] w-full" />
                    </div>
                    <div class="hidden md:flex">
                        <ul class="text-xl text-[#11477B] flex gap-5 items-center font-medium inter-medium">
                            <li><a href="{{ route('home') }}" class="hover:text-[#349BDB] underline underline-offset-4">Home</a></li>
                            <li><a href="{{ route('services') }}" class="hover:text-[#349BDB]">Services</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-[#349BDB]">Contact Us</a></li>
                            <li><a href="{{ route('about') }}" class="hover:text-[#349BDB]">About</a></li>
                            <li>
                                {{-- if user is signed in then show the profile link else show the sign up link --}}
                                @auth
                                    <a href="{{ route('profile') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B]">Profile</a>
                                @else
                                    <a href="{{ route('register') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B]">Sign Up</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                    <div class="md:hidden">
                        <button onclick="toggleMenu()" class="text-[#349BDB] focus:outline-none cursor-pointer">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="menu" class="hidden md:hidden">
                    <ul class="text-xl text-[#11477B] flex flex-col gap-3 pb-4 font-medium inter-medium">
                        <li><a href="{{ route('home') }}" class="block hover:text-[#349BDB] underline underline-offset-4">Home</a></li>
                        <li><a href="{{ route('services') }}" class="block hover:text-[#349BDB]">Services</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#349BDB]">Contact Us</a></li>
                        <li><a href="{{ route('about') }}" class="block hover:text-[#349BDB]">About</a></li>
                        <li>
                       @auth
                        <li><a href="{{ route('profile') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Profile</a></li>
                       @else
                        <li><a href="{{ route('register') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Sign Up</a></li>
                      @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="bg-white flex md:mt-40 mt-20 justify-between mx-20 sm:flex-row flex-col gap-6">
            <div class="w-full md:w-[594px] md:flex-col m-12 sm:w-[450px]">
                <div class="mb-12">
                    <h1 class="anim text-[#11477B] text-left text-[44px] font-bold inter-bold leading-none">
                        Prove Your Worth,<br/>Be the Candidate<br/>Companies Can’t Ignore.
                    </h1>
                </div>
                <div class="mb-12">
                    <p class="anim text-left text-[#11477b] font-light inter-light text-xl leading-none">
                        Showcase your cybersecurity skills, ace the<br/>challenges, and take the first step toward<br/>landing your dream job.
                    </p>
                </div>
                <div class="items-center mt-4">
                    <a href="{{ route('services') }}" class="btn anim font-light inter-light text-[26px] outline bg-[#ffff] text-[#3498DB] px-28 py-1 rounded-full hover:bg-[#11477b] hover:text-white border w-auto cursor-pointer">
                        Services
                    </a>
                </div>
            </div>
            <div class="w-full md:w-[666px] h-fit sm:m-auto object-cover">
                <img class="anim" src="{{ asset('images/home/home-1.png') }}" alt="home">
            </div>
        </div>
    </div>
</body>
</html>