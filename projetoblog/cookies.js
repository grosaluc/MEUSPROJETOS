
var mgsCookies = document.getElementById('cookies__msg')

function ok(){
    localStorage.lgpd = "sim"
    mgsCookies.classList.remove('mostrar')
}

if(localStorage.lgpd == 'sim'){
    mgsCookies.classList.remove('mostrar')
}else{
    mgsCookies.classList.add('mostrar')
}