<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Phishing Emails Test</title>
    <link rel="stylesheet" href="{{asset('css\interview.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{asset('js\assessment\assessment.js')}}" defer></script>
    <script>
      function toggleMenu() {
        const menu = document.getElementById("menu");
        menu.classList.toggle("hidden");
      }
    </script>
  </head>
  <body class="bg-gray-50">
    <!-- Navbar -->
    <nav class="bg-white fixed w-full top-0 left-0">
      <div class="max-w-9xl mx-auto px-4">
        <div class="flex justify-between items-center py-1">
          <div>
            <img src="{{asset('images\interview\logo1.png')}}" alt="logo" class="h-[60px] w-full animate__animated animate__fadeInDown" />
          </div>
          <div class="hidden md:flex">
            <ul class="text-xl text-[#11477B] flex gap-5 items-center font-medium inter-medium">
              <li><a href="../hommme 2/home 2.html" class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Home</a></li>
              <li><a href="../services/services.html" class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Services</a></li>
              <li><a href="../contactus/contact.html" class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Contact Us</a></li>
              <li><a href="../about/about.html" class="hover:text-[#349BDB] animate__animated animate__fadeInDown">About</a></li>
              <li>
                <a
                href="../profile/profile.html"
                class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown"
                >Profile</a
                >
              </li>
            </ul>
          </div>
          <div class="md:hidden">
            <button
              onclick="toggleMenu()"
              class="text-[#349BDB] focus:outline-none"
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
            <li><a href="../hommme 2/home 2.html" class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Home</a></li>
            <li><a href="../services/services.html" class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Services</a></li>
            <li><a href="../contactus/contact.html" class="hover:text-[#349BDB] animate__animated animate__fadeInDown">Contact Us</a></li>
            <li><a href="../about/about.html" class="hover:text-[#349BDB] animate__animated animate__fadeInDown">About</a></li>
            <li>
              <a
                href="../profile/profile.html"
                class="block bg-[#349BDB] rounded-full py-2 px-5 text-white hover:bg-[#11477B] animate__animated animate__fadeInDown"
                >Profile</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Main Content -->

    <div class=" p-4 flex justify-center items-center pt-20 mt-[50px]">
      <div
        class="bg-white border border-[#3498db] rounded-lg shadow-md w-full max-w-7xl p-6 animate__animated animate__fadeInUp"
      >
     
      <div class="flex flex-col justify-between items-center mb-4 md:flex-row">
      
      <!-- <span class="text-blue-600 text-lg font-semibold">00:00</span> -->
        </div>

        <form id="question-form" onsubmit="handleSubmit(event)">
          <div id="question-container" class="border border-[#3498db] rounded-lg p-4 overflow-auto space-y-2 py-32 bg-gray-50 animate__animated animate__fadeInUp">
            <!-- الأسئلة ستظهر هنا -->
          </div>
          <div class="flex justify-end mt-4">
            <button type="submit" class="bg-[#3498DB] text-white font-light inter-light text-[26px] px-6 py-2 rounded-full hover:bg-[#11477b] transition animate__animated animate__fadeInUp">
              Submit
            </button>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>