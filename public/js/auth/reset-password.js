// // document.addEventListener("DOMContentLoaded", function () {
// //     // Function to handle form submission
// //     function handleSubmit(event) {
// //       event.preventDefault();
// //       const passwordInput = document.querySelector("input[name='password']").value;
// //       const confirmPasswordInput = document.querySelector("input[name='password1']").value;
// //       if (passwordInput && confirmPasswordInput) {
// //         if (passwordInput === confirmPasswordInput) {
// //           alert("Password successfully set.");
// //           // Redirect to the next page (replace the URL with your target page)
// //           window.location.href = "../login/login.html";
// //         } else {
// //           alert("Passwords do not match. Please try again.");
// //         }
// //       } else {
// //         alert("Please fill in both fields.");
// //       }
// //     }
  
// //     // Add event listener for form submission
// //     const form = document.querySelector("form");
// //     if (form) {
// //       form.addEventListener("submit", handleSubmit);
// //     }
  
// //     // Function to handle menu toggle
// //     function toggleMenu() {
// //       const menu = document.getElementById("menu");
// //       menu.classList.toggle("hidden");
// //     }
// //     const menuButton = document.querySelector(".md:hidden button");

// //     if (menuButton) {
// //       menuButton.addEventListener("click", toggleMenu);
// //     }
// //     menuButton.addEventListener("click", toggleMenu);
// //   });
  

// document.addEventListener("DOMContentLoaded", function () {
//   async function validateCodeWithBackend(code) {
//     try {
//         const response = await fetch('/validate-code', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify({ code })
//         });
//         const data = await response.json();
//         return  data.isCodeValid;
//     } catch (error) {
//         console.error('Error validating email with backend:', error);
//         return false;
//     }
// }
//     // Function to handle form submission
//     async function handleSubmit(event) {
//       event.preventDefault();
//       const password = document.getElementById("password").value;
//       const password1 = document.getElementById("password1").value;
//       if (password && password1) {
//         if (password === password1) {
//           // alert("Password successfully set.");
//           // Redirect to the next page (replace the URL with your target page)
//           window.location.href = "../login/login.html";
//         } else {
//           alert("Passwords do not match. Please try again.");
//         }
//       }
      
//   }

//     // Function to handle resending the code
//     function handleResend(event) {
//       event.preventDefault();
//       alert("Verification code resent to your email.");
//       // Implement the actual resend code functionality here
//     }
  
//     // Add event listener for form submission
//     const form = document.querySelector("form");
//     form.addEventListener("submit", handleSubmit);
  
//     // Add event listener for resending the code
//     const resendLink = document.querySelector(".resend1");
//     resendLink.addEventListener("click", handleResend);
//   });


// //   //code from copilot
// // document.addEventListener('DOMContentLoaded', function () {
// //   // Function to toggle the navigation menu
// //   function toggleMenu() {
// //     const menu = document.getElementById("menu");
// //     menu.classList.toggle("hidden");
// //   }

// //   // Form submission
// //   const resetPassForm = document.querySelector('#forgetpass3-form');
// //   resetPassForm.addEventListener('submit', function (event) {
// //     event.preventDefault(); // Prevent default form submission

// //     // Submit the form
// //     resetPassForm.submit();
// //   });
// // });
  

// Function to toggle the navigation menu
function toggleMenu() {
  const menu = document.getElementById("menu");
  menu.classList.toggle("hidden");
}

// Function to handle form submission
function handleSubmit(event) {
  event.preventDefault();
  const passwordInput = document.getElementById("password");
  const passwordConfirmationInput = document.getElementById("password_confirmation");
  const password = passwordInput.value.trim();
  const passwordConfirmation = passwordConfirmationInput.value.trim();

  if (password && password === passwordConfirmation) {
    // Submit the form
    event.target.submit();
  } else {
    alert("Passwords do not match or are empty. Please enter matching passwords.");
    passwordInput.focus();
  }
}

// Adding event listener to the form
document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("#forgetpass3-form");
  form.addEventListener("submit", handleSubmit);
});