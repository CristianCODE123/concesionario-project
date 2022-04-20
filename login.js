const btnRegistro = document.getElementById("btn-registro");

const btnInicio = document.getElementById("btn-inicio");

const formRegister = document.getElementById("form-register");

const formLogin = document.getElementById("form-login");



btnRegistro.classList.add("blue");

formLogin.style.visibility = "hidden";

btnInicio.addEventListener("click",(e)=>{
    e.preventDefault();
    formRegister.style.visibility = "hidden";
    formLogin.style.visibility = "visible";
    btnInicio.classList.add("blue");
    btnRegistro.classList.remove("blue")

});



btnRegistro.addEventListener("click",(e)=>{
    e.preventDefault();
    formLogin.style.visibility = "hidden";
    formRegister.style.visibility = "visible";

    btnInicio.classList.remove("blue");
    btnRegistro.classList.add("blue")
});