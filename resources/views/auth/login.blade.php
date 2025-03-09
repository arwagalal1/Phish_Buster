<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in</title>
    <!-- style -->
    <link rel="stylesheet" href="{{asset('css\auth\login.css')}}" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
  </style>

  <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div id="login">
      <div class="container">
        
        <div class="content">
          <form action="#" class="anim">
            <div>
              <img src="{{asset('images\login\chatbot.png')}}" alt="logo" />
            </div>
            <h1>Log In</h1>
            <p class="text-center mb-4 text-[#11477b] font-extralight inter-extralight text-[30px] leading-[41.15px]">Your trusted partner </p>

            <label class="label" for="email">Email Address</label>
            <input class="inp" type="email" id="email" name="email" required />

            <label class="label" for="password">Password</label>
            <input
              class="inp"
              type="password"
              id="password"
              name="password"
              required
            />
            
            <button type="submit">Log in</button>
            
            <a
              href="../forgetpass1/forgetpass1.html"
              class="forget"
              >Forgot Password?</a
            >
          </form>
        </div>
      </div>
    </div>
    <script src="{{asset('js\auth\login.js')}}"></script>
  </body>
</html>
