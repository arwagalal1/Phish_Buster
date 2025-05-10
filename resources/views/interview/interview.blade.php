<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Interview</title>
    <link rel="stylesheet" href="{{ asset('css/interview.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- Add SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");

      #sound-waves-canvas {
        width: 100%;
        height: 100%;
        background-color: #e4eff8;
      }

      .alert-message {
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .alert-message .close {
        cursor: pointer;
        font-size: 20px;
        line-height: 1;
      }

      .success-message {
        background-color: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
        position: relative;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .success-message .close {
        cursor: pointer;
        font-size: 20px;
        line-height: 1;
      }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/interview/interview.js') }}" defer></script>

    <script>
      function toggleMenu() {
        const menu = document.getElementById("menu");
        menu.classList.toggle("hidden");
      }

      window.questions = @json($questions);
    </script>
  </head>

  <body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white fixed w-full top-0 left-0">
      <div class="max-w-9xl mx-auto px-4">
        <div class="flex justify-between items-center py-1">
          <div>
            <img src="{{ asset('images/interview/logo1.png') }}" alt="logo"
              class="h-[60px] w-full animate__animated animate__fadeInDown" />
          </div>
          <div class="hidden md:flex">
            <ul class="text-xl text-[#11477B] flex gap-5 items-center font-medium inter-medium">
              <li><a href="{{ route('home') }}"
                  class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Home</a></li>
              <li><a href="{{ route('services') }}"
                  class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Services</a></li>
              <li><a href="{{ route('contact') }}"
                  class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Contact Us</a></li>
              <li><a href="{{ route('about') }}"
                  class="hover:text-[#349BDB] animate__animated animate__fadeInDown">About</a></li>
              <li>
                <a href="{{ route('profile') }}"
                  class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Profile</a>
              </li>
            </ul>
          </div>
          <div class="md:hidden">
            <button onclick="toggleMenu()" class="text-[#349BDB] focus:outline-none">
              <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
              </svg>
            </button>
          </div>
        </div>
        <div id="menu" class="hidden md:hidden">
          <ul class="text-xl text-[#11477B] flex flex-col gap-3 pb-4 font-medium inter-medium">
            <li><a href="{{ route('home') }}"
                class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Home</a></li>
            <li><a href="{{ route('services') }}"
                class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Services</a></li>
            <li><a href="{{ route('contact') }}"
                class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Contact Us</a></li>
            <li><a href="{{ route('about') }}"
                class="hover:text-[#349BDB] animate__animated animate__fadeInDown">About</a></li>
            <li>
              <a href="{{ route('profile') }}"
                class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown">Profile</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="bg-gray-50 flex flex-col justify-center items-center pt-12 min-h-screen overflow-hidden mt-4">
      <!-- Server-side Alerts -->
      @if ($error)
      <div class="alert-message">
      <span>{{ $error }}</span>
      <span class="close" onclick="this.parentElement.remove()">×</span>
      </div>
    @endif
      @if (session('error'))
      <div class="alert-message">
      <span>{{ session('error') }}</span>
      <span class="close" onclick="this.parentElement.remove()">×</span>
      </div>
    @endif
      @if (session('success'))
      <div class="success-message">
      <span>{{ session('success') }}</span>
      <span class="close" onclick="this.parentElement.remove()">×</span>
      </div>
    @endif

      <div
        class="rounded-lg p-3 w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-20 md:gap-40 mt-6 animate__animated animate__fadeInUp">

        <!-- Robot Section -->
        <div class="flex flex-col items-center rounded-2xl space-y-4 pt-24 pb-5 px-5 bg-[#3498DB14] w-full max-w-2xl">
          <img src="{{ asset('images/interview/robot.png') }}" alt="Robot"
            class="pb-8 w-[240px] h-[300px] transform transition-transform ease-in-out duration-500 hover:scale-110 hover:rotate-6" />
          <div class="w-full h-8 rounded">
            <img id="robot-bottom-img" src="{{ asset('images/interview/robot-botom.png') }}" alt="Robot Bottom"
              class="w-32 h-32 mx-auto mb-6" />
            <canvas id="sound-waves-canvas" width="800" height="200"></canvas>
          </div>
          <div
            class="bg-white p-3 mx-5 flex items-start justify-center gap-8 rounded-xl w-full text-gray-500 animate__animated animate__fadeInUp">
            <img src="{{ asset('images/interview/text.png') }}" alt="text" class="w-6 items-start" />
            <p id="question-text" class="font-bold inter-bold text-[#11477b] my-5 whitespace-normal overflow-visible">
              Click "Start Recording" to begin.
            </p>
          </div>
        </div>

        <!-- Video and Timer Section -->
        <div class="flex flex-col items-center space-y-4">
          <div id="countdown"
            class="text-[#349BDB] text-3xl font-normal inter-normal animate__animated animate__fadeInDown">
            00:00
          </div>
          <div id="video-container"
            class="w-full md:w-[488px] h-100 rounded-full border-[#11477B] shadow-md animate__animated animate__fadeInRight"
            style="position: relative;">
            <img id="person-placeholder" src="{{ asset('images/interview/person.png') }}" alt="Person Placeholder"
              style="width: 100%; height: 100%; position: absolute; top: 0; left: 0;" />
          </div>
          <div id="listen-control" style="margin-top: 20px;" class="flex justify-center items-center w-full">
            <button id="listen-button"
              class="flex items-center justify-center gap-5 bg-inherit text-[#8EA1B6] border-[#8EA1B6] border-[1px] px-3 py-2 rounded-lg w-full hover:bg-[#349BDB] hover:text-white hover:border-[#349BDB] duration-200 animate__animated animate__pulse animate__infinite"
              disabled>
              <span class="font-semibold inter-semibold text-[14px]">Start Listening</span>
              <img src="{{ asset('images/interview/listing.png') }}" alt="Listen Icon" />
            </button>
          </div>
          <div id="controls" style="margin-top: 20px;" class="flex justify-center items-center gap-2 w-full">
            <button id="record-button"
              class="flex items-center justify-center gap-5 bg-inherit text-[#8EA1B6] border-[#8EA1B6] border-[1px] px-3 py-2 rounded-lg w-full hover:bg-[#349BDB] hover:text-white hover:border-[#349BDB] duration-200 animate__animated animate__pulse animate__infinite">
              <span class="font-semibold inter-semibold text-[14px]">Start Rec</span>
              <img src="{{ asset('images/interview/mic.png') }}" alt="Record Icon" />
            </button>
            <button id="action-button"
              class="flex items-center justify-center gap-1 bg-inherit text-[#8EA1B6] border-[#8EA1B6] border-[1px] px-2 py-2 rounded-lg w-sm hover:bg-[#3498DB] hover:text-white hover:border-[#3498DB] duration-200 animate__animated animate__pulse animate__infinite"
              disabled>
              <img class="pl-1" src="{{ asset('images/interview/sent.png') }}" alt="Action Icon" />
              <span class="mr-2 font-semibold inter-semibold text-[14px]">Send</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>