<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verification Code</title>
    <link rel="stylesheet" href="{{asset('css\interview.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    </style>
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
              <li><a href="../hommme 2/home 2.html" class="hover:text-[#349BDB] animate__animated animate__fadeInDown ">Home</a></li>
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
    <div class="flex flex-col lg:flex-row gap-5 items-center justify-center p-4  mt-12">
        <div class="p-8 rounded-lg max-w-xl w-full animate__animated animate__fadeInLeft">
            <h1 class="text-[#11477B] text-2xl md:text-4xl font-bold inter-bold mb-4">
                You're Almost There!
            </h1>
            <p class="text-[#3498DB] text-2xl md:text-4xl mb-6 font-light inter-light">
            
              One final step to<br/>complete your journey.
            </p>
            <p class="text-[#11477B] mb-6 font-normal inter-normal text-xl">
              Thank you for completing the first stage of the application process!
              If your application is successful, you'll receive a verification code
              in your<br/>email. Kindly check your inbox (and spam/junk<br/>folder just in
              case). Enter the code in the box<br/>below to proceed to the next step.
            </p>
            <div class="mb-4">
                <label for="verification-code" class="block text-[#11477B] text-sm font-medium inter-medium mb-2">
                    Verification Code
                </label>
                <input
                    type="text"
                    id="verification-code"
                    class="shadow appearance-none border border-[#11477B] rounded-2xl w-[436px] py-3 md:py-5 px-3 text-gray-700 leading-tight focus:outline focus:outline-[#11477b] focus:shadow-outline"
                    placeholder="Enter your verification code"
                    autocomplete="off"
                />
            </div>
            <button onclick="verifyCode()" class="bg-white w-[250px] md:w-[250px] md:ml-[180px] bg-inherit text-[#3498DB] text-[26px] font-light inter-light border-[1px] border-[#3498DB] rounded-3xl hover:text-white hover:bg-[#11477b]" >
                Verify & Continue
            </button>
        </div>

        <div class="mt-8 lg:mt-0 animate__animated animate__fadeInRight">
            <img src="{{asset('images\interview\verificationCode.png')}}" class="w-full max-w-[550px] h-auto transform transition-all duration-500 ease-in-out hover:scale-105 hover:rotate-2" alt="Verification Code Image" />
        </div>
    </div>
    <script src="{{asset('js\assessment\verification-code.js')}}"></script>
  </body>
</html>