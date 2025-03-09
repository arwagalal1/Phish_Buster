<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>End</title>

    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
    </style>
    <style>
  @keyframes fadeInScale {
    0% {
      opacity: 0;
      transform: scale(0.8);
    }
    100% {
      opacity: 1;
      transform: scale(1);
    }
  }
  .fade-in-scale {
    animation: fadeInScale 1s ease-in-out;
  }
  .hover-move {
    transition: transform 0.3s ease-in-out;
  }
  .hover-move:hover {
    transform: translateY(-10px);
  }
</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="{{asset('css\end.css')}}" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script>
      function toggleMenu() {
        const menu = document.getElementById("menu");
        menu.classList.toggle("hidden");
      }
    </script>
  </head>
  <body class="bg-gray-50">
    <div class="max-w-screen-2xl mx-auto p-5">
        <!-- Navigation -->
    <nav class="bg-white shadow-md fixed w-full top-0 left-0 z-10">
      <div class="max-w-9xl mx-auto px-4">
        <div class="flex justify-between items-center py-1">
          <div>
            <img src="{{asset('images\interview\logo1.png')}}" alt="logo" class="h-[60px] w-full animate__animated animate__fadeInDown" />
          </div>
          <div class="hidden md:flex">
            <ul class="text-xl text-[#11477B] flex gap-5 items-center font-medium inter-medium">
              <li><a href="../hommme 2/home 2.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Home</a></li>
              <li><a href="../services/services.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Services</a></li>
              <li><a href="../contactus/contact.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Contact Us</a></li>
              <li><a href="../about/about.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
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
            <li><a href="../hommme 2/home 2.html" class="block hover:text-[#3498db] animate__animated animate__fadeInDown">Home</a></li>
                <li><a href="../services/services.html" class="block hover:text-[#3498db] animate__animated animate__fadeInDown">Services</a></li>
                <li><a href="../contactus/contact.html" class="block hover:text-[#3498db] animate__animated animate__fadeInDown">Contact Us</a></li>
                <li><a href="../about/about.html" class="block hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
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


      <!-- content -->
      <div
        class=" flex mt-12 justify-between lg:px-20 px-8 md:flex-row flex-col gap-6 overflow-hidden"
      >
        <div class="w-full  md:w-[460px] md:flex-col md:m-10 md:pl-20">
          <div
            class="text-[#11477b] font-bold inter-bold text-left text-nowrap text-[43px] md:text-[44px] sm:text-3xl lg:text-4xl sm:mt-6 w-fit animate__animated animate__fadeInUp"
          >
          <h1 class="leading-none">🎉Congratulations!</h1>
          
          </div>
          <div>
            <p
              class="text-[#3498DB] mt-2 text-left font-light inter-light text-xl md:text-3xl sm:text-2xl lg:text-4xl animate__animated animate__fadeInUp"
            >
              You’ve Successfully<br />Completed the Process
            </p>
          </div>
          <div class="mt-7">
            <p class="text-[#11477b] text-left font-normal inter-normal text-base animate__animated animate__fadeInUp">
              Thank you for taking the time to complete all the<br />steps in our
              application process. Your responses<br />have been submitted for
              review.<br />
              Please wait for an email from the company with<br />further
              details. If you’re selected, we’ll share the<br />next steps to
              begin your journey with us.
            </p>
          </div>

          <div class="mt-4">
            <p class="text-[#11477b] text-left font-normal inter-normal text-base animate__animated animate__fadeInUp">
              Good luck, and we hope to see you as part of the<br />team soon!
            </p>
          </div>
          
          <div class="mt-11">
            <p class="text-[#3498DB] text-left font-light inter-light text-base animate__animated animate__fadeInUp">
              If you have any questions or need assistance,<br />please don’t
              hesitate to contact us. We’re here to<br />help!
            </p>
          </div>
          <div class="ml-20 mt-10 grid place-content-center">
            <a
              href="../contactus/contact.html"
              class="inter-light text-center bg-[#ffff] text-[#3498DB] text-[26px] px-5 py-0 rounded-full hover:bg-[#3498DB] hover:text-white border font-light w-[252px] cursor-pointer animate__animated animate__fadeInUp"
            >
              Contact us
            </a>
          </div>
        </div>

        <div class="w-full md:w-[482px] h-fit md:m-auto p-5 object-cover">
          <img src="{{asset('images\interview\Illustration.png')}}" alt="end" class="w-full max-w-[550px] h-auto transform transition-all duration-500 ease-in-out hover:scale-105 hover:rotate-2 hover-move animate__animated animate__fadeInRight"/>
        </div>
      </div>
    </div>
  </body>
</html>