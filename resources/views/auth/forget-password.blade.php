<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forget Password</title>
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css/auth/forget-password.css') }}" />
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
  <body >
              <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-10">
      <div class="max-w-9xl mx-auto px-4">
        <div class="flex justify-between items-center py-1">
          <div>
            <img src="{{ asset('images/forget-password/logo1.png') }}" alt="logo" class="h-[60px] w-full" />
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
    <div id="forgetpass1" class="overflow-hidden pr-36 bg-gray-50 max-w-screen-2xl">
      <div class="container ">
        <div class="content">
          <div class="part1">
            <div class="content-text">
              <h1 class="anim">Forgot Password?</h1>
              <p class="anim font-light">
                Don’t worry it happens.<br />Please enter the address<br />associated
                with your account.
              </p>
            </div>
            {{-- @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
            @endif --}}
            {{-- @if ($errors->any())
              <div class="alert alert-danger">
                {{ $errors->first() }}
              </div> --}}
            {{-- @endif --}}
            <form action="{{ route('password.email') }}" method="POST" class="anim" id="forgetpass1-form">
              @csrf
              <label for="email" class="text-[#11477b] font-medium">Email Address</label>
              <input class="focus:outline-none focus:ring-2 focus:ring-[#349BDB]" type="email" id="email" name="email" required />
              
              @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror

            </form>

            <button type="submit" form="forgetpass1-form" class="btn anim bg-[#11477B] font-bold">Submit</button>

            <!-- type="Submit"
              class="btn anim bg-[#11477B]"
              >Submit</button> -->

            <a href="{{ route('login') }}" class="btn1 anim"> < Back to Log In</a>
          </div>

          <img class="anim" src="{{ asset('images/forget-password/forgetpass1.png') }}" alt="forgetpass1" />
        </div>
      </div>
    </div>
    <script src="{{ asset('js/auth/forget-password.js') }}"></script>
  </body>
</html>