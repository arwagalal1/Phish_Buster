<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify Code</title>

    <link rel="stylesheet" href="{{ asset('css/auth/verify-code.css') }}" />

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      function toggleMenu() {
        const menu = document.getElementById("menu");
        menu.classList.toggle("hidden");
      }
    </script>
  </head>
  <body>
            <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-10">
      <div class="max-w-9xl mx-auto px-4">
        <div class="flex justify-between items-center py-1">
          <div>
            <img src="{{ asset('images/verify-code/logo1.png') }}" alt="logo" class="h-[60px] w-full" />
          </div>
          <div class="hidden md:flex">
            <ul class="text-xl text-[#11477B] flex gap-5 items-center font-medium inter-medium">
              <li><a href="{{ route('home') }}" class="hover:text-[#349BDB]">Home</a></li>
              <li><a href="{{ route('services') }}" class="hover:text-[#349BDB]">Services</a></li>
              <li><a href="{{ route('contact') }}" class="hover:text-[#349BDB]">Contact Us</a></li>
              <li><a href="{{ route('about') }}" class="hover:text-[#349BDB]">About</a></li>
              <li>
                <a
                href="{{ route('register') }}"
                class="block bg-[#349BDB] rounded-full py-2 px-5  text-white hover:bg-[#11477B]"
                >Sign up</a
              >
                
              </li>
            </ul>
          </div>
          <div class="md:hidden">
            <button
              onclick="toggleMenu()"
              class="text-[#349BDB] focus:outline-none cursor-pointer"
            >
              <svg
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 6h16M4 12h16m-7 6h7"
                ></path>
              </svg>
            </button>
          </div>
        </div>
        <div id="menu" class="hidden md:hidden">
          <ul class="text-xl text-[#11477B] flex flex-col gap-3 pb-4 font-medium inter-medium">
            <li><a href="{{ route('home') }}" class="block hover:text-[#349BDB]">Home</a></li>
            <li><a href="{{ route('services') }}" class="block hover:text-[#349BDB]">Services</a></li>
            <li><a href="{{ route('contact') }}" class="hover:text-[#349BDB]">Contact Us</a></li>
            <li><a href="{{ route('about') }}" class="block hover:text-[#349BDB]">About</a></li>
            <li>
              <a
              href="{{ route('register') }}"
              class="block bg-[#349BDB] rounded-full py-2 px-5  text-white hover:bg-[#11477B]"
              >Sign up</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div id="forgetpass2" class="overflow-hidden bg-gray-50 max-w-7.5xl">
      <div class="container   sm:px-6 lg:px-8 ">
            <div
                class="content flex flex-col lg:flex-row items-center justify-between"
                >
                <!-- Part 1: Verification Code Section -->
                <div class="part1 w-full lg:w-1/2 pl-14">
                    <!-- Content Text -->
                    <div class="content-text mb-8">
                    <h2 class="text-2xl sm:text-3xl font-bold mb-4 anim">
                        Enter Verification Code
                    </h2>
                    <p class="text-gray-600 anim">
                        We’ve sent a code to your<br/>email. Enter it below to<br/>continue.
                    </p>
                    </div>

                    {{-- @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div> --}}
                    {{-- @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif --}}

                    <!-- Form -->
                    <form action="{{ route('verify.code.post') }}" method="POST" class="mb-6 anim" id="forgetpass2-form">
                        @csrf
                        <label
                        for="code"
                        class="block text-sm font-bold text-[#11477b] mb-2"
                        >The code</label
                    >
                    <input
                        type="text"
                        id="code"
                        name="code"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#349BDB]"
                    />
                    @error('code')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror 
                   
                    </form>

                   <button
                    type="submit"
                    form="forgetpass2-form"
                    class="btn anim text-center rounded-2xl"
                    >
                    Submit
                    </button>
                
                   

                    <!-- Resend Code Link -->
                    <p class="resend text-sm text-gray-600 text-nowrap anim">
                    Didn’t receive the code?
                    <a class="resend1 text-[#11477B] hover:underline anim" href=""
                        >Resend</a
                    >
                    </p>

                    <!-- Back to Log In Link -->
                    <!-- <a
                    href="login.html"
                    class="btn1 block text-center text-blue-500 hover:underline anim"
                    target="_blank"
                    >
                    < Back to Log In
                    </a> -->
                </div>

                <!-- Part 2: Image -->
                <div class="lg:w-3/4 flex justify-center anim mr-8">
                    <img
                    class="w-full max-w-md lg:max-w-lg"
                    src="{{ asset('images/verify-code/forgetpass2.png') }}"
                    alt="forgetpass2"
                    />
            </div>

            </div>
            <a
                href="{{ route('login') }}"
                class="btn1 block text1 hover:underline anim"
            >
                < Back to Log In
            </a>
        </div>
    </div>
    <script src="{{ asset('js/auth/verify-code.js') }}"></script>
  </body>
</html>