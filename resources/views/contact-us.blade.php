<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/contact-us.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-10">
        <div class="max-w-9xl mx-auto px-4">
            <div class="flex justify-between items-center py-1">
                <div>
                    <img src="{{ asset('images/contact_us/logo1.png') }}" alt="logo" class="h-[60px] w-full animate__animated animate__fadeInDown" />
                </div>
                <div class="hidden md:flex">
                    <ul class="text-xl text-[#11477B] flex gap-5 items-center font-medium inter-medium">
                        <li><a href="{{ route('home') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Home</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Services</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#3498db] underline underline-offset-4 animate__animated animate__fadeInDown">Contact Us</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
                        @auth
                            <li><a href="{{ route('profile') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Profile</a></li>
                        @else
                            <li><a href="{{ route('register') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Sign Up</a></li>
                        @endauth
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
                    <li><a href="{{ route('home') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Home</a></li>
                    <li><a href="{{ route('services') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Services</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-[#3498db] underline underline-offset-4 animate__animated animate__fadeInDown">Contact Us</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
                    @auth
                        <li><a href="{{ route('profile') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Profile</a></li>
                    @else
                        <li><a href="{{ route('register') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Sign Up</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="mt-5 py-20 mx-20 max-w-8xl overflow-hidden bg-[url(images/contact.png)]">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold inter-bold text-[#3498DB] mb-8 animate__animated animate__fadeInUp">___Contact Us___</h1>
            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-6">{{ session('success') }}</div>
            @endif
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-3 rounded mb-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="container flex flex-col lg:flex-row gap-8 mt-24 bg-[url('../../imgs/map.png')] bg-center">
                <div class="w-full lg:w-1/3 space-y-16">
                    <div class="flex items-center space-x-4 animate__animated animate__fadeInLeft">
                        <img src="{{ asset('images/contact_us/Address.png') }}" alt="address" class="w-20 h-20" />
                        <div>
                            <a class="text-3xl font-bold inter-bold text-[#11477B] block">Address</a>
                            <a class="text-[#3498DB] font-normal inter-normal text-xl">Kafrelsheikh University</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 animate__animated animate__fadeInLeft">
                        <img src="{{ asset('images/contact_us/Call male.png') }}" alt="call" class="w-20 h-20" />
                        <div>
                            <a class="text-3xl font-bold inter-bold text-[#11477B] block">Call Us</a>
                            <a class="text-[#3498DB] font-normal inter-normal text-xl">01024254678</a>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 animate__animated animate__fadeInLeft">
                        <img src="{{ asset('images/contact_us/Email.png') }}" alt="email" class="w-20 h-20" />
                        <div>
                            <a class="text-3xl font-bold inter-bold text-[#11477B] block">Email Us</a>
                            <a class="text-[#3498DB] font-normal inter-normal text-xl">phishbuster1@gmail.com</a>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-2/3 pt-5 animate__animated animate__fadeInRight">
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div class="flex flex-col sm:flex-row gap-6">
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Your Name" required class="w-full sm:w-1/2 p-3 border bg-inherit placeholder:text-[#3498DB] border-[#3498DB] rounded-none focus:outline-none focus:ring-2 focus:ring-[#3498DB]" />
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="Your Email" required class="w-full sm:w-1/2 p-3 bg-inherit placeholder:text-[#3498DB] border border-[#3498DB] rounded-none focus:outline-none focus:ring-2 focus:ring-[#3498DB]" />
                        </div>
                        <input type="text" autocomplete="off" name="subject" value="{{ old('subject') }}" placeholder="Subject" required class="w-full p-3 border bg-inherit placeholder:text-[#3498DB] border-[#3498DB] rounded-none focus:outline-none focus:ring-2 focus:ring-[#3498DB]" />
                        <textarea name="message" placeholder="Message" required class="w-full p-3 border bg-inherit placeholder:text-[#3498DB] border-[#3498DB] rounded-none focus:outline-none focus:ring-2 focus:ring-[#3498DB] resize-none" rows="6" autocomplete="off">{{ old('message') }}</textarea>
                        <button type="submit" class="bg-[#3498db] text-white px-4 py-2 rounded-md font-normal inter-normal hover:bg-[#11477b] animate__animated animate__fadeInUp">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/contact-us.js') }}"></script>
</body>
</html>