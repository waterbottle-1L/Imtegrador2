const dataload=() =>{
    const sec_title = document.getElementById("sec_title");
    const h6_dot = document.getElementsByTagName("h6");

    setTimeout(() => {
        sec_title.innerHTML = "AHORA PUEDES TENER <br> NUESTRO MENU DIGITAL <br>ESCANEANDO EL SIGUIENTE QR"
        h6_dot[1].classList.add("head_dots_main");
        h6_dot[2].classList.remove("head_dots_main");
     
    }, 0000);
    setTimeout(() => {
        sec_title.innerHTML = "INICIA TU CUENTA  <br> Y REALIZA TU RESERVACION"
        h6_dot[1].classList.remove("head_dots_main");
        h6_dot[2].classList.add("head_dots_main");
     
    }, 3000);
}
setInterval(dataload,12000);
dataload();