<!-- filepath: c:\Users\arwa mohamed saber\Phish_Buster\resources\views\services.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
      
        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        .fade-in-scale {
            animation: fadeInScale 1s ease-in-out;
        }
        .hover-zoom:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
    </style>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="bg-white">
    <div class="max-w-screen-2xl mx-auto min-h-screen p-6">

        <!-- Navigation -->
        <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-10">
            <div class="max-w-9xl mx-auto px-4">
                <div class="flex justify-between items-center py-1">
                    <div>
                        <img src="{{ asset('images/services/logo1.png') }}" alt="logo" class="h-[60px] w-full animate__animated animate__fadeInDown" />
                    </div>
                    <div class="hidden md:flex">
                        <ul class="text-xl text-[#11477B] flex gap-5 items-center font-medium inter-medium">
                            <li><a href="{{ route('home') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Home</a></li>
                            <li><a href="{{ route('services') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown underline underline-offset-4">Services</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Contact Us</a></li>
                            <li><a href="{{ route('about') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
                            <li>
                                @auth
                                    <a href="{{ route('profile') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Profile</a>
                                @else
                                    <a href="{{ route('register') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Sign Up</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                    <div class="md:hidden">
                        <button onclick="toggleMenu()" class="text-[#349BDB] focus:outline-none cursor-pointer">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div id="menu" class="hidden md:hidden">
                    <ul class="text-xl text-[#11477B] flex flex-col gap-3 pb-4 font-medium inter-medium">
                        <li><a href="{{ route('home') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Home</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown underline underline-offset-4">Services</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Contact Us</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
                        <li>
                            @auth
                                <a href="{{ route('profile') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Profile</a>
                            @else
                                <a href="{{ route('register') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Sign Up</a>
                            @endauth
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="bg-[#FCFCFC] py-8">
            <!-- Heading Section -->
            <div>
                <div class="mt-6">
                    <h1 class="text-center text-[44px] md:text-[44px] text-[#3498DB] inter-bold font-bold px-4 py-1 animate__animated animate__fadeInUp">
                        ___Services___
                    </h1>
                </div>
            </div>

            <!-- Subheading Section -->
            <div>
                <p class="text-center text-[20px] md:text-[20px] text-[#3498DB] inter-light font-light px-4 py-0 animate__animated animate__fadeInUp">
                    xxxx xxx xxxxxxxx xxxx
                </p>
            </div>

            <!-- Cards Section -->
            <div class="flex flex-col sm:flex-row justify-center gap-28 mt-5 mx-4 md:mx-28 max-w-screen-2xl">
                <!-- Card 1: Interview -->
                <div class="w-full sm:w-[431px] h-[534px]">
                    <div class="bg-[#EBF5FB] rounded-3xl flex flex-col justify-between fade-in-scale hover-zoom animate__animated animate__fadeInUp">
                        <!-- Image -->
                        <div class="bg-white rounded-3xl w-full h-[300px] md:h-[300px]">
                            <img src="{{ asset('images/services/image2.png') }}" alt="Interview" class="w-full h-full object-cover rounded-3xl animate__animated animate__zoomIn">
                        </div>
                        <!-- Title -->
                        <div class="text-[#11477b] font-bold inter-bold text-center text-[32px] md:text-[40px]">
                            Interview
                        </div>
                        <!-- Description -->
                        <div class="text-[#11477b] font-normal inter-normal text-center text-[16px] md:text-[20px] px-4 pb-4">
                            We present an interview simulation in a<br class="hidden md:block" />new way, zzzzzz
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="mt-7 flex justify-center">
                        <a href="{{ route('before-interview') }}" class="bg-white text-[#3498DB] px-[100px] py-0 rounded-full text-nowrap hover:bg-[#11477b] hover:text-white border border-[#3498DB] font-light inter-light text-[26px] transition duration-300">
                            Start Now
                        </a>
                    </div>
                </div>

                <!-- Card 2: Phishing Email -->
                <div class="w-full sm:w-[431px] h-[534px]">
                    <div class="bg-[#EBF5FB] rounded-3xl flex flex-col justify-between fade-in-scale hover-zoom animate__animated animate__fadeInUp">
                        <!-- Image -->
                        <div class="bg-white rounded-3xl w-full h-[300px] md:h-[300px]">
                            <img src="{{ asset('images/services/image1.png') }}" alt="Phishing Email" class="w-full h-full object-cover rounded-3xl animate__animated animate__zoomIn">
                        </div>
                        <!-- Title -->
                        <div class="text-[#11477b] font-bold inter-bold text-center text-[32px] md:text-[40px] ">
                            Phishing Email
                        </div>
                        <!-- Description -->
                        <div class="text-[#11477b] font-normal inter-normal text-center text-[16px] md:text-[20px] px-4 pb-4">
                            We train you how to detect phishing<br class="hidden md:block" />emails by our way, zzzzzzzzzzzzzzzzzz
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="mt-7 flex justify-center">
                        <a href="{{ route('verification-code') }}" class="bg-white text-[#3498DB] px-[100px] py-0 rounded-full text-nowrap hover:bg-[#11477b] hover:text-white border border-[#3498DB] font-light inter-light text-[26px] transition duration-300">
                            Start Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/services.js') }}"></script>
</body>
</html>