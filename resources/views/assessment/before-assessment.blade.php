<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Before Assessment</title>
    <link rel="stylesheet" href="{{asset('css\interview.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
      nav {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 10;
  background-color: white; /* تأكد من أن الخلفية بيضاء لتغطية المحتوى عند التمرير */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* إضافة ظل خفيف */
}
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      function toggleMenu() {
        const menu = document.getElementById("menu");
        menu.classList.toggle("hidden");
      }
      document.addEventListener('DOMContentLoaded', async () => {
        try {
          // أي عملية تحتاج إلى تنفيذها عند تحميل الصفحة
        } catch (error) {
          console.error('Error during page load:', error);
          window.location.href = '../error/error.html';
        }
      });
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
              <li><a href="../hommme 2/home 2.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown ">Home</a></li>
              <li><a href="../services/services.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Services</a></li>
              <li><a href="../contactus/contact.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Contact Us</a></li>
              <li><a href="../about/about.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
              <li>
                <a
                  href="../profile/profile.html"
                  class="block bg-[#349BDB] rounded-full py-2 px-5  text-white hover:bg-[#11477B] animate__animated animate__fadeInDown"
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
            <li><a href="../hommme 2/home 2.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Home</a></li>
              <li><a href="../services/services.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Services</a></li>
              <li><a href="../contactus/contact.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">Contact Us</a></li>
              <li><a href="../about/about.html" class="hover:text-[#3498db] animate__animated animate__fadeInDown">About</a></li>
              <li>
                <a
                  href="../profile/profile.html"
                  class="block bg-[#349BDB] rounded-full py-2 px-5  text-white hover:bg-[#11477B] animate__animated animate__fadeInDown"
                  >Profile</a
                >
              </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Main Content -->
    <div class="flex items-center justify-center mt-20 md:mt-16 gap-16 px-4 md:p-10">
      <div class="rounded-lg max-w-6xl w-full">
        <h1 class="text-4xl md:text-4xl font-bold inter-bold text-center text-[#11477B] mb-4 animate__animated animate__fadeInUp">
          Welcome to the Final Assessment!
        </h1>
        <p class="text-center text-[#3498DB] text-3xl md:text-3xl mb-6 font-light inter-light animate__animated animate__fadeInUp">
          Congratulations on making it this far!<br/>This is your chance to
          demonstrate<br/>your ability to identify and handle<br/>phishing attempts.
        </p>

        <h2 class="text-4xl md:text-4xl text-center font-bold inter-bold text-[#11477B] mb-4 animate__animated animate__fadeInUp">
          Instructions
        </h2>


        <!-- /////// -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-1 md:gap-y-14 gap-x-2 md:gap-x-56 mb-10">
          <div class="flex flex-row md:flex-row items-center justify-center animate__animated animate__fadeInUp">
            <div
              class=" flex items-center justify-center bg-[#EBF5FB] rounded-full w-[90px] h-[90px] md:w-[190px] md:h-[80px]"
            >
              <img src="{{asset('images\interview\one.png')}}" alt="" class="w-[60px] h-[60px] md:w-[90px] md:h-[80px] animate__animated animate__zoomIn" />
            </div>
            <div class="relative mt-4 md:mt-0">
              <img src="{{asset('images\interview\bg.png')}}" class="w-full md:w-[950px] h-[110px]" />
              <p class="absolute top-1 text-[#3498DB] font-bold inter-bold text-xl p-4 ml-4">
                Review each email carefully and decide if it is 'Phishing'<br/>or
                'Legitimate'.
              </p>
            </div>
          </div>
          <div class="flex flex-row md:flex-row items-center justify-center animate__animated animate__fadeInUp">
            <div
              class="flex items-center justify-center bg-[#EBF5FB] rounded-full w-[90px] h-[90px] md:w-[190px] md:h-[80px]"
            >
              <img src="{{asset('images\interview\two.png')}}" alt="" class="w-[60px] h-[60px] md:w-[90px] md:h-[80px] animate__animated animate__zoomIn" />
            </div>
            <div class="relative mt-4 md:mt-0">
              <img src="{{asset('images\interview\bg.png')}}" class="w-full md:w-[950px] h-[110px]" />
              <p class="absolute top-1 text-[#3498DB] font-bold inter-bold text-xl p-4 ml-4">
                Look for clues like suspicious links, fake addresses,<br/>or unusual
                requests.
              </p>
            </div>
          </div>

          <div class="flex flex-row md:flex-row items-center justify-center animate__animated animate__fadeInUp">
            <div
              class="flex items-center justify-center bg-[#EBF5FB] rounded-full w-[90px] h-[90px] md:w-[190px] md:h-[80px]"
            >
              <img src="{{asset('images\interview\three.png')}}" alt="" class="w-[60px] h-[60px] md:w-[90px] md:h-[80px] animate__animated animate__zoomIn" />
            </div>

            <div class="relative mt-4 md:mt-0">
              <img src="{{asset('images\interview\bg.png')}}" class="w-full md:w-[950px] h-[110px]" />
              <p class="absolute top-1 text-[#3498DB] font-bold inter-bold text-xl p-4 ml-4">
                Select your answer using the provided buttons and explain your
                reasoning in the text box.
              </p>
            </div>
          </div>
          <div class="flex flex-row md:flex-row items-center justify-center animate__animated animate__fadeInUp">
            <div
              class="flex items-center justify-center bg-[#EBF5FB] rounded-full w-[90px] h-[90px] md:w-[190px] md:h-[80px]"
            >
              <img src="{{asset('images\interview\four.png')}}" alt="" class="w-[60px] h-[60px] md:w-[90px] md:h-[80px] animate__animated animate__zoomIn" />
            </div>
            <div class="relative mt-4 md:mt-0">
              <img src="{{asset('images\interview\bg.png')}}" class="w-full md:w-[950px] h-[110px]" />
              <p class="absolute top-1 text-[#3498DB] font-bold inter-bold text-xl p-4 ml-4">
                Complete the assessment<br/>within the given time to show<br/>yourskills effectively.
              </p>
            </div>
          </div>
        </div>

        <p class="text-center text-xl text-[#3498DB] text-pretty font-light inter-light mb-6 animate__animated animate__fadeInUp">
          "Don’t worry—this is your chance to shine! Your answers will help showcase your
           expertise and readiness to join a top cybersecurity team."
        </p>

        <div class="text-center animate__animated animate__fadeInUp">
          <a href="../new/email.html"
            class="text-[#3498DB] font-light inter-light text-[26px] bg-white border border-[#3498DB] rounded-full px-20 py-1 focus:outline-none focus:shadow-outline hover:bg-[#11477b] hover:text-white"
         > Start Now</a>
        
        
        </div>
      </div>
    </div>
  </body>
</html>