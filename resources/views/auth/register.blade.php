<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <!-- style -->
    <link rel="stylesheet" href="{{asset('css\auth\register.css')}}" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap");
  </style>

  <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body>
    <div id="signup">
      <div class="container">
        
        <div class="content">
          <form action="#" class="anim">
            <div class="chatbot">
              <img src="{{asset('images\register\chatbot.png')}}"  alt="logo" />
            </div>
            <h2>Sign up to start your journey</h2>
            <h3>Your trusted partner</h3>

            <label for="name">Full Name</label>
            <input class="inp focus:outline focus:outline-[#11477b]" type="text" id="name" name="name" required />

            <label for="email">Email Address</label>
            <input class="inp focus:outline focus:outline-[#11477b]" type="email" id="email" name="email" required />

            <label for="password">Password</label>
            <input
              class="inp focus:outline focus:outline-[#11477b]"
              type="password"
              id="password"
              name="password"
              required
            />

            <label for="password">Confirm Password</label>
            <input
              class="inp focus:outline focus:outline-[#11477b]"
              type="password"
              id="password1"
              name="password"
              required
            />

            <button type="submit">Sign Up</button>
            <p>
              Already have an account?
              <a class="login" href="{{route('login')}}" 
                >Log In</a
              >
            </p>
          </form>
        </div>
      </div>
    </div>
    <script src="{{asset('js\auth\register.js')}}"></script>
  </body>
</html>
