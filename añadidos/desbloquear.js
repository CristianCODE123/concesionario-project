let nombre = document.getElementById("nombre");
let inputNombre = document.getElementById("inputNombre");

nombre.addEventListener("click",(Event)=>{
    event.preventDefault();
    inputNombre.readOnly = false;
});

let apellido = document.getElementById("apellido");
let inputApellido = document.getElementById("inputApellido");

apellido.addEventListener("click",(Event)=>{
    event.preventDefault();
    inputApellido.readOnly = false;
});


let correo = document.getElementById("correo");
let inputCorreo = document.getElementById("inputCorreo");

correo.addEventListener("click",(Event)=>{
    event.preventDefault();
    inputCorreo.readOnly = false;
});

let dni = document.getElementById("dni");
let inputDni = document.getElementById("inputDni");

dni.addEventListener("click",(Event)=>{
    event.preventDefault();
    inputDni.readOnly = false;
});


let telefono = document.getElementById("telefono");
let inputTelefono = document.getElementById("inputTelefono");

telefono.addEventListener("click",(Event)=>{
    event.preventDefault();
    inputTelefono.readOnly = false;
});

let direccion = document.getElementById("direccion");
let inputDireccion = document.getElementById("inputDireccion");

direccion.addEventListener("click",(Event)=>{
    event.preventDefault();
    inputDireccion.readOnly = false;
});

let password = document.getElementById("password");
let inputPassword = document.getElementById("inputPassword");

password.addEventListener("click",(Event)=>{
    event.preventDefault();
    inputPassword.readOnly = false;
});