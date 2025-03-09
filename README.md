# Phish_Buster

1- change html files to blade.php
   and put them in (resources\views)

2- put css files in (public\css)

3- put js files in (public\js)

4- put images of each page in (public\images)

----------------------------------------------------------
files of blade.php:

1- home.blade.php

2- about.blade.php

3- contact-us.blade.php

4- profile.blade.php

5- services.blade.php

6- folder:auth   ==> it has the files of authentication files

   1- register.blade.php  => signup.html
   
   2- login.blade.php
   
   3- forget-password.blade.php  => forgetpass1.html

   4- verify-code.blade.php  => forgetpass2.html
   
   5- reset-password.blade.php  => forgetpass3.html

7- folder:errors   ==> This is the default location in Laravel for storing custom error pages

   1- 404.blade.php  => error.html
   
   2- 403.blade.php  => access.html  (and it's in views with name [access-denied] and still working ont it)

8- folder:interview  ==> it is for interview only without phishing test

   1- before-interview.blade.php  => bef-inter.html
   
   2- pathways.blade.php  => desk.html
   
   3- interview.blade.php
   
   4- wait.blade.php

9- folder:assessment  ==> it is for phishing emails assessment

   1- verification-code.blade.php  => vc.html
   
   2- before-assessment.blade.php  => beforeAsses.html
   
   3- assessment.blade.php  => email.html
   
   4- end.blade.php

-------------------------------------------------------------------------------------------
