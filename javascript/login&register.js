
'use strict'
function RegToLogin(){
    window.location.href="./login.php"
}

function loginToReg(){
    window.location.href="./register.php"
}



let today = new Date();
let dd = today.getDate();
let mm = today.getMonth() + 1; //January is 0!
let yyyy = today.getFullYear();

if (dd < 10) {
dd = '0' + dd;
}

if (mm < 10) {
mm = '0' + mm;
} 
    
today = yyyy + '-' + mm + '-' + dd;
document.getElementById("date").setAttribute("max", today);
