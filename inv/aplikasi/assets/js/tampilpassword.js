// proses 1
var masukanpassa = document.getElementById('pswda'),
 masukanpassb = document.getElementById('pswdb'),
      chk  = document.getElementById('chk'),
      label = document.getElementById('showhide');


     chk.onclick = function () {

      if(chk.checked) {

           masukanpassa.setAttribute('type', 'text');
           masukanpassb.setAttribute('type', 'text');   

          

       } else {

           masukanpassa.setAttribute('type', 'password');
           masukanpassb.setAttribute('type', 'password');
          
       }
 
     }