<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Before Interview</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{ asset('css/before-interview.css') }}">
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
  <body class="bg-gray-50">
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
                    <a
                      href="{{ route('profile') }}"
                      class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown"
                      >Profile</a
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
            <li><a href="{{ route('home') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Home</a></li>
                  <li><a href="{{ route('services') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Services</a></li>
                  <li><a href="{{ route('contact') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Contact Us</a></li>
                  <li><a href="{{ route('about') }}" class="hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
                  <li>
                    <a
                      href="{{ route('profile') }}"
                      class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown"
                      >Profile</a
                    >
                  </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="container flex items-center justify-center gap-16 p-4 md:p-10 mt-14 md:mt-8">
      <div class="rounded-lg w-full max-w-6xl">
        <!-- العنوان والصورة -->
        <div class="flex flex-col md:flex-row justify-center items-center gap-4 text-center md:text-left animate__animated animate__fadeInUp">
          <img src="{{ asset('images/interview/tips.png') }}" alt="bigfour" class="w-28 md:w-40 animate__animated animate__zoomIn" />
          <h1 class="text-2xl md:text-4xl font-bold inter-bold text-[#11477B] text-center mt-6">
            Tips before you start<br/>the interview
          </h1>
        </div>

        <!-- قسم النصائح -->
        <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-[99px] mt-10">
          <!-- نصيحة 1 -->
          <div class="flex items-center space-x-4 md:space-x-0 md:space-y-6 animate__animated animate__fadeInUp">
            <div class="flex items-center justify-center bg-[#EBF5FB] rounded-full w-20 h-20 md:w-24 md:h-24">
              <img src="{{ asset('images/interview/1st.png') }}" alt="" class="w-14 h-14 md:w-20 md:h-20 animate__animated animate__zoomIn" />
            </div>
            <div class="relative flex-1">
              <img src="{{ asset('images/interview/bg.png') }}" class="w-full h-24 md:h-28" />
              <p class="absolute top-1 left-4 text-[#3498DB] font-bold inter-bold text-sm md:text-xl p-4">
                Listen Actively, Pay attention to the questions.
              </p>
            </div>
          </div>

          <!-- نصيحة 2 -->
          <div class="flex items-center space-x-4 md:space-x-0 md:space-y-6 animate__animated animate__fadeInUp">
            <div class="flex items-center justify-center bg-[#EBF5FB] rounded-full w-20 h-20 md:w-24 md:h-24">
              <img src="{{ asset('images/interview/2.png') }}" alt="" class="w-14 h-14 md:w-20 md:h-20 animate__animated animate__zoomIn" />
            </div>
            <div class="relative flex-1">
              <img src="{{ asset('images/interview/bg.png') }}" class="w-full h-24 md:h-28" />
              <p class="absolute top-1 left-4 text-[#3498DB] font-bold inter-bold text-sm md:text-xl p-4">
                Each question has a specific time to answer it.
              </p>
            </div>
          </div>

          <!-- نصيحة 3 -->
          <div class="flex items-center space-x-4 md:space-x-0 md:space-y-6 animate__animated animate__fadeInUp">
            <div class="flex items-center justify-center bg-[#EBF5FB] rounded-full w-20 h-20 md:w-24 md:h-24">
              <img src="{{ asset('images/interview/3.png') }}" alt="" class="w-14 h-14 md:w-20 md:h-20 animate__animated animate__zoomIn" />
            </div>
            <div class="relative flex-1">
              <img src="{{ asset('images/interview/bg.png') }}" class="w-full h-24 md:h-28" />
              <p class="absolute top-0 left-4 text-[#3498DB] font-bold inter-bold text-sm md:text-xl p-4">
                Be Clear and Concise. Avoid rambling keep your answers relevant and to the point.
              </p>
            </div>
          </div>

          <!-- نصيحة 4 -->
          <div class="flex items-center space-x-4 md:space-x-0 md:space-y-6 animate__animated animate__fadeInUp">
            <div class="flex items-center justify-center bg-[#EBF5FB] rounded-full w-20 h-20 md:w-24 md:h-24">
              <img src="{{ asset('images/interview/4.png') }}" alt="" class="w-12 h-12 md:w-20 md:h-20 animate__animated animate__zoomIn" />
            </div>
            <div class="relative flex-1">
              <img src="{{ asset('images/interview/bg.png') }}" class="w-full h-24 md:h-28" />
              <p class="absolute top-2 left-4 text-[#3498DB] font-bold inter-bold text-sm md:text-xl p-4">
                The interview is recorded to be analyzed.
              </p>
            </div>
          </div>
        </div>

        <!-- زر البدء -->
        <div class="text-center mt-12 animate__animated animate__fadeInUp">
          <a href="{{ route('pathways') }}" class="text-[#3498DB] font-light inter-light text-[26px] w-full md:w-[337px] border border-[#3498DB] px-20 py-1 rounded-3xl focus:outline-none focus:shadow-outline hover:bg-[#11477b] hover:text-white transition-all duration-300">
            Start Now
          </a>
        </div>
      </div>
    </div>
  </body>
</html>