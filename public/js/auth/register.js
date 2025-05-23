// document.addEventListener('DOMContentLoaded', function () {
//     // تفعيل الحركات عند تحميل الصفحة
//     // Retrieve the user data from local storage

//     const animElements = document.querySelectorAll('.anim');
//     animElements.forEach((element) => {
//         element.style.opacity = '0';
//         element.style.transform = 'translateY(20px)';
//     });

//     setTimeout(() => {
//         animElements.forEach((element) => {
//             element.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
//             element.style.opacity = '1';
//             element.style.transform = 'translateY(0)';
//         });
//     }, 100);

//     // تفعيل النموذج
//     const signupForm = document.querySelector('#register .content form');
//     signupForm.addEventListener('submit', function (event) {
//         event.preventDefault(); // منع إرسال النموذج بالطريقة التقليدية
//         // جمع بيانات النموذج
//         const name = document.getElementById('name').value;
//         const email = document.getElementById('email').value;
//         const password = document.getElementById('password').value;
//         const confirmPassword = document.getElementById('password1').value;

//         // التحقق من صحة البيانات
//         if (password !== confirmPassword) {
//             alert('كلمة المرور غير متطابقة!');
//             return;
//         }
// var storedUserJSON = localStorage.getItem("user");
// // Convert the JSON string back to an object
// var storedUser = storedUserJSON ? JSON.parse(storedUserJSON) : null;

// if (storedUser && email === storedUser.email) {
//             alert('البريد الإلكتروني موجود بالفعل!');
//             document.getElementById("email").value = '';
//             return;
//         }else{
//             const userData = { name, email, password };

//             // حفظ البيانات في LocalStorage (للتجربة)
//             saveToLocalStorage('user', userData);   
//             console.log('تم الحفظ في LocalStorage:', getFromLocalStorage('user'));
    
//             // عرض رسالة نجاح
//             alert('تم التسجيل بنجاح!');
//             window.location.href = ''; // توجيه المستخدم إلى صفحة تسجيل الدخول
//         }


//         // // حفظ البيانات في Backend (معلقة حتى تحتاجها)
        
//         // saveToBackend('https://your-backend-url.com/signup', userData)
//         //     .then(response => {
//         //         console.log('استجابة الخادم:', response);
//         //         alert('تم التسجيل بنجاح!');
//         //     })
//         //     .catch(error => {
//         //         console.error('حدث خطأ:', error);
//         //         alert('حدث خطأ أثناء التسجيل. يرجى المحاولة مرة أخرى.');
//         //     });
        
//     });

//     // دالة لحفظ البيانات في LocalStorage
//     function saveToLocalStorage(key, data) {
//         localStorage.setItem(key, JSON.stringify(data));
//     }

//     // دالة لاستدعاء البيانات من LocalStorage
//     function getFromLocalStorage(key) {
//         const data = localStorage.getItem(key);
//         return data ? JSON.parse(data) : null;
//     }

//     // // دالة لحفظ البيانات في Backend (معلقة حتى تحتاجها)
    
//     // async function saveToBackend(url, data) {
//     //     const response = await fetch(url, {
//     //         method: 'POST',
//     //         headers: {
//     //             'Content-Type': 'application/json',
//     //         },
//     //         body: JSON.stringify(data),
//     //     });
//     //     return await response.json();
//     // }
    
// });
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
    const signupForm = document.querySelector('#signup .content form');
    signupForm.addEventListener('submit', function (event) {
        event.preventDefault();

        // Get form data
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('password_confirmation').value;

        // // Validate passwords
        // if (password !== confirmPassword) {
        //     alert('Passwords do not match!');
        //     return;
        // }

        // Submit the form
        signupForm.submit();
    });
});