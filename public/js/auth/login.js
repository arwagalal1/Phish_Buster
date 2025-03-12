document.addEventListener('DOMContentLoaded', function () {
    // Animation for form elements
    const animElements = document.querySelectorAll('.anim');
    animElements.forEach((element) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(20px)';
    });

    setTimeout(() => {
        animElements.forEach((element) => {
            element.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            element.style.opacity = '1';
            element.style.transform = 'translateY(0)';
        });
    }, 100);

    // Form submission
    const loginForm = document.querySelector('#login .content form');
    loginForm.addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent default form submission

        // Submit the form
        loginForm.submit();
    });
});