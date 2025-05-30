<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wait Our Response</title>
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('css/wait.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    </style>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script>
      function toggleMenu() {
        const menu = document.getElementById("menu");
        menu.classList.toggle("hidden");
      }
    </script>
  </head>
  <body class="bg-gray-50">
    <div id="error">  
      <!-- Navigation -->
      <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-10">
        <div class="max-w-9xl mx-auto px-4">
          <div class="flex justify-between items-center py-1">
            <div>
              <img src="{{ asset('images/interview/logo1.png') }}" alt="logo" class="h-[60px] w-full animate__animated animate__fadeInDown" />
            </div>
            <div class="hidden md:flex">
              <ul class="text-xl text-[#11477B] flex gap-5 items-center font-medium inter-medium">
                <li><a href="{{ route('home') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Home</a></li>
                <li><a href="{{ route('services') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Services</a></li>
                <li><a href="{{ route('contact') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Contact Us</a></li>
                <li><a href="{{ route('about') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
                <li>
                  <a href="{{ route('profile') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Profile</a>
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
              <li><a href="{{ route('home') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Home</a></li>
              <li><a href="{{ route('services') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Services</a></li>
              <li><a href="{{ route('contact') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Contact Us</a></li>
              <li><a href="{{ route('about') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
              <li>
                <a href="{{ route('profile') }}" class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Profile</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- content -->
      <div class="bg-gray-50 flex flex-col justify-between pb-32 pt-24 py-12 px-4 sm:px-8 lg:px-24">
        <!-- Main Content -->
        <div class="flex flex-col justify-around items-center mt-44 sm:mt-16">
          <!-- Image -->
          <div>
            <img class="anim p-4 w-24 h-24 sm:w-32 sm:h-32 animate__animated animate__rotateIn" src="{{ asset('images\interview\Sand Timer.png') }}"
              alt="error" />
          </div>
      
          <!-- Heading -->
          <div class="mt-3">
            <h1
              class="anim text-5xl sm:text-5xl lg:text-6xl text-[#11477B] font-bold inter-bold text-center animate__animated animate__fadeInUp">
              please wait for our response
            </h1>
          </div>
      
          <!-- Subheading -->
          <div class="mt-3">
            <h2
              class="anim text-2xl sm:text-3xl lg:text-4xl text-[#3498db] font-light inter-light text-center animate__animated animate__fadeInUp">
              we will send you an activation code<br class="hidden sm:block" />after Evaluating your result in your<br
                class="hidden sm:block" />mail box for the next step
            </h2>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>