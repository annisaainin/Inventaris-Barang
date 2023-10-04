// proses 1
var masukanpassa = document.getElementById('pswda'),
      customCheck  = document.getElementById('customCheck'),
      label = document.getElementById('showhide');


     customCheck.onclick = function () {

      if(customCheck.checked) {

           masukanpassa.setAttribute('type', 'text');

          

       } else {

           masukanpassa.setAttribute('type', 'password');
          
       }
 
     }