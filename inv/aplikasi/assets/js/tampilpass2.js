// proses 1
var masukanpass = document.getElementById('pswd'),
      chk  = document.getElementById('chk'),
      label = document.getElementById('showhide');


     chk.onclick = function () {

      if(chk.checked) {

           masukanpass.setAttribute('type', 'text');
       } else {

           masukanpass.setAttribute('type', 'password');
       }
 
     }