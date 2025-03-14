<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Import Fonts and Styles -->
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    </style>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-white overflow-x-hidden">
    <div class="max-w-screen-2xl mx-auto min-h-screen px-6 pt-6">

        <!-- Navigation -->
        <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-10">
            <div class="max-w-9xl mx-auto px-4">
                <div class="flex justify-between items-center py-1">
                    <div>
                        <img src="{{ asset('images/profile/logo1.png') }}" alt="logo" class="h-[60px] w-full" />
                    </div>
                    <div class="hidden md:flex">
                        <ul class="text-xl text-[#11477B] flex gap-5 items-center font-medium inter-medium">
                            <li><a href="{{ route('home') }}" class="hover:text-[#349BDB]">Home</a></li>
                            <li><a href="{{ route('services') }}" class="hover:text-[#349BDB]">Services</a></li>
                            <li><a href="{{ route('contact') }}" class="hover:text-[#349BDB]">Contact us</a></li>
                            <li><a href="{{ route('about') }}" class="hover:text-[#349BDB]">About</a></li>
                            <li>
                                <a href="{{ route('profile') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B]">Profile</a>
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
                        <li><a href="{{ route('home') }}" class="block hover:text-[#349BDB]">Home</a></li>
                        <li><a href="{{ route('services') }}" class="block hover:text-[#349BDB]">Services</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-[#349BDB]">Contact us</a></li>
                        <li><a href="{{ route('about') }}" class="block hover:text-[#349BDB]">About</a></li>
                        <li>
                            <a href="{{ route('profile') }}" class="block bg-[#349BDB] py-2 px-5 rounded-full text-white hover:bg-[#11477B]">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="bg-[url(images/Group.png)] mt-4 lg:flex-col">
            <div class="mx-auto mt-16">
                <h1 class="font-bold px-4 py-2 text-center text-4xl text-[#3498DB]">___Profile___</h1>
            </div>
            <div class="flex flex-wrap justify-evenly mt-20 gap-6 ml-3">
                <!-- Profile Form -->
                <div class="bg-[#EBF5FB] rounded-3xl w-[336px] md:w-[336px] p-5">
                    @if (session('success'))
                        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('profile.update') }}" method="POST" class="flex flex-col">
                        @csrf
                        <label for="name" class="text-[#11477B] block pb-1 font-medium inter-medium text-[14px]">Name</label>
                        <input class="bg-inherit focus:bg-white rounded-xl focus:outline focus:outline-[#11477b] outline outline-[#11477b] border-[#11477B] w-full h-10 mb-5 text-[#11477B] p-3" type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>

                        <label for="email" class="text-[#11477B] block pb-1 font-medium inter-medium text-[14px]">E-mail</label>
                        <input class="bg-inherit focus:bg-white rounded-xl focus:outline focus:outline-[#11477b] outline outline-[#11477b] border-[#11477B] w-full h-10 mb-5 text-[#11477B] p-3" type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>

                        <label for="phone" class="text-[#11477B] block pb-1 font-medium inter-medium text-[14px]">Phone</label>
                        <input class="bg-inherit focus:bg-white rounded-xl focus:outline focus:outline-[#11477b] outline outline-[#11477b] border-[#11477B] w-full h-10 mb-5 text-[#11477B] p-3" type="tel" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">

                        <label for="gender" class="text-[#11477B] block pb-1 font-medium inter-medium text-[14px]">Gender</label>
                        <select name="gender" id="gender" class="rounded-xl border-[#11477B] w-1/2 h-8 mb-10 px-2 text-[#11477B] focus:outline focus:outline-[#11477b] outline outline-[#11477b] bg-inherit focus:bg-white">
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>

                        <button type="submit" class="bg-[#11477B] text-[#ffff] px-4 py-2 cursor-pointer rounded-[16px] font-bold inter-bold text-[16px] w-1/3">Save</button>
                    </form>
                </div>

                <!-- Interview and Assessment Stats -->
                <div class="bg-[#EBF5FB] flex flex-col rounded-3xl px-3 py-4 w-[336px] md:w-[336px] h-fit">
                    <div class="pl-4 flex flex-col justify-between">
                        <div class="pb-6 mb-20 mt-3">
                            <label for="accepted" class="text-[#11477B] block pb-2 font-medium inter-medium text-[14px]">Interview stats</label>
                            <button class="{{ $interviewStats === 'accepted' ? 'bg-[#56EC5933] text-[#12DA16]' : 'bg-gray-200 text-gray-700' }} px-2 py-1 rounded-full font-bold inter-bold text-[20px] w-[114px]">
                                {{ ucfirst($interviewStats) }}
                            </button>
                        </div>

                        <div class="pb-6">
                            <label for="rejected" class="text-[#11477B] block pb-2 font-medium inter-medium text-[14px]">Assessment stats</label>
                            <button class="{{ $assessmentStats === 'rejected' ? 'bg-[#EC565633] text-[#DA1512]' : 'bg-gray-200 text-gray-700' }} px-2 py-1 rounded-full font-bold inter-bold text-[20px] w-[114px]">
                                {{ ucfirst($assessmentStats) }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logout Button -->
            <div class="flex flex-wrap sm:flex-wrap justify-between py-8 sm:flex-row flex-col">
                <form action="{{ route('logout') }}" method="POST" class="ml-auto">
                    @csrf
                    <button type="submit" class="bg-[#11477B] text-[#ffff] px-4 py-2 cursor-pointer rounded-[16px] lg:w-[113px] text-[#11477B] font-bold inter-bold ml-auto mr-63">Log out</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Link JavaScript -->
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>
