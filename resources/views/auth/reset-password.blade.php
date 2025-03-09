<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>

    <link rel="stylesheet" href="{{asset('css\auth\reset-password.css')}}" />

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
  <body>
    <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-10">
      <div class="max-w-9xl mx-auto px-4">
        <div class="flex justify-between items-center py-1">
          <div>
            <img src="{{asset('images\reset-password\logo1.png')}}" alt="logo" class="h-[60px] w-full" />
          </div>
          <div class="hidden md:flex">
            <ul class="text-xl text-[#11477B] flex gap-5 items-center font-medium inter-medium">
              <li><a href="../hommme/home.html" class="hover:text-[#349BDB]">Home</a></li>
              <li><a href="../login/login.html" class="hover:text-[#349BDB]">Services</a></li>
              <li><a href="../contactus 2/contact.html" class="hover:text-[#349BDB]">Contact Us</a></li>
              <li><a href="../about 2/about.html" class="hover:text-[#349BDB]">About</a></li>
              <li>
                <a
                href="../signup/signup.html"
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
            <li><a href="../hommme/home.html" class="block hover:text-[#349BDB]">Home</a></li>
            <li><a href="../login/login.html" class="block hover:text-[#349BDB]">Services</a></li>
            <li><a href="../contactus 2/contact.html" class="block hover:text-[#349BDB]">Contact Us</a></li>
            <li><a href="../about 2/about.html" class="block hover:text-[#349BDB]">About</a></li>
            <li>
              <a
              href="../signup/signup.html"
              class="block bg-[#349BDB] rounded-full py-2 px-5  text-white hover:bg-[#11477B]"
              >Sign up</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- <div > -->
      <div class="container bg-gray-50 overflow-hidden">
        <div
          class="flex flex-col items-center justify-center min-h-screen  px-4"
        >
          <div
            class="w-full max-w-2xl bg-[#EBF5FB59] mt-20 p-8 rounded-lg shadow-md text-center"
          >
            <!-- Heading -->
            <div class="mb-8">
              <h1 class="text-3xl font-bold inter-bold text-[#11477B] mb-2">
                Set New Password
              </h1>
              <p class="text-[#3498DB] text-3xl font-light inter-light">
                Your new password must be different from previously used
                passwords.
              </p>
            </div>

            <div class="flex items-center justify-center">
              <form action="#" class="space-y-6 w-[336px] max-w-sm bg-[#EBF5FB] rounded-2xl p-8" id="forgetpass3-form"> 
                <!-- Password Field -->
                <div class="text-left">
                  <label
                    for="password"
                    class="block text-sm font-medium inter-medium text-[#11477b] mb-1"
                    >Password</label
                  >
                  <input
                    type="password"
                    id = "password"
                    name="password"
                    required
                    class="w-full px-4 py-2 border bg-white border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#349BDB]"
                  />
                </div>
  
                <!-- Confirm Password Field -->
                <div class="text-left">
                  <label
                    for="password1"
                    class="block text-sm font-medium inter-medium text-[#11477b] mb-1"
                    >Confirm Password</label
                  >
                  <input
                    type="password"
                    id="password1"
                    name="password"
                    required
                    class="w-full px-4 py-2 border bg-white border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-[#349BDB]"
                  />
                </div>
                
                <!-- Submit Button -->
              </form>
             
            </div>
            <!-- Form -->
            <button
              type="submit"
              form="forgetpass3-form"
              class="block w-[217px] font-bold inter-bold mt-6 md:w-44 md:ml-52 sm:ml-20 sm:w-44 bg-[#11477B] text-white py-2 px-4 rounded-2xl hover:bg-[#349BDB] transition duration-300 lg:text-center sm:text-center md:text-center"
            >
              Submit
              </button>
              

          </div>
          <a
          href="../login/login.html"
          class="btn1 block text1 hover:underline anim lg:ml-60 sm:ml-30"
          target=""
        >
          < Back to Log In
        </a>
        </div>
      </div>
    <!-- </div> -->
     <script src="{{asset('js\auth\reset-password.js')}}"></script>
  </body>
</html>