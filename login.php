
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cssLogin/css.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php require_once("cabecera.php")

?>

    <div id = "flex-container" class = "flex-container">
        <div class = "form-container">
            <div class = "selector-mode">
                <ul>
                    <li><a id = "btn-inicio" href="">Iniciar sesion</a></li>
                    <li><a id = "btn-registro"  href="">Registrarse</a></li>
                </ul>
            </div>
            <div class = "slider-container" >
    

                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" style="height: 650px;">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="height: 100%;">
                      <div class="carousel-item active">
                        <img style="height: 300px;" src="imgProyecto/slider1.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          <h5 style="margin-top: 50em;" ></h5>
                          
                        </div>
                        <div style="margin-top: 4em;">
                          <p style="text-align: center; font-size: 15px; color: white">Aprovecha todas las ventajas de nuestro
                            nuevo e innovador</p>
                          <p style="text-align: center; font-size: 15px; color: white; font-family: roboto;" >sistema de ventas</p>
                          <p style="text-align: center; font-size: 15px; color: white" >se parte de nuestra familia</p>
                        </div>
                       
                      </div>
                      <div class="carousel-item">
                        <img style="height: 300px;"  src="imgProyecto/highlight-1.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          
                        </div>
                        <div style="margin-top: 4em;">
                          <p style="text-align: center; font-size: 15px; color: white">Aprovecha todas las ventajas de nuestro
                            nuevo e innovador</p>
                          <p style="text-align: center; font-size: 15px; color: white; font-family: roboto;" >sistema de ventas</p>
                          <p style="text-align: center; font-size: 15px; color: white" >se parte de nuestra familia</p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img style="height: 300px;"  src="imgProyecto/slider3.png" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                          
                        </div>
                        <div style="margin-top: 4em;">
                          <p style="text-align: center; font-size: 15px; color: white">Aprovecha todas las ventajas de nuestro
                            nuevo e innovador</p>
                          <p style="text-align: center; font-size: 15px; color: white; font-family: roboto;" >sistema de ventas</p>
                          <p style="text-align: center; font-size: 15px; color: white" >se parte de nuestra familia</p>
                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>


            </div>
            <form  id = "form-register" method="post" action = "registrar.php">
                <input class = "nombre" type="text" placeholder="Nombre" name = "txtNombre" required>
                <input class ="nombre"type="text" placeholder="Apellido" name = "txtApellido" required>
                <input type="text" placeholder="Correo" name = "txtCorreo" required>
                <input type="text" placeholder="Direccion" name = "txtDireccion" required>
                <input type="password" placeholder="Contraseña" name = "txtPassword" required>
                <input type="date" >
                
                <div class ="check-section">
                    <input type="checkbox" id="cbox2" value="second_checkbox"> <label for="cbox2">Confirmo que soy mayor de 18 años</label> <br>
                    <input type="checkbox" id="cbox2" value="second_checkbox"> <label for="cbox2">He leido y acepto las potilicas de privacidad y terminos de uso</label>
                </div>
                
                <input type="submit" value="Registrarse">
                <div id = "faltanDatos"></div>
            </form>
              <?php
              if(isset($_GET['mensaje']) and $_GET["mensaje"] = "error"){
              ?>
              <script>
                let formulario = document.getElementById("faltanDatos");
                formulario.innerHTML = "";
              </script>

              <?php
              }
              ?>
            <form  id = "form-login" method = "post" action = "iniciarSesion.php">
              <input type="text" placeholder="Correo" name = "txtCorreoLogin">
              <input type="password" placeholder="Contraseña" name = "txtContraseñaLogin">
             <br>
              <input type="checkbox" id="cbox2" value="second_checkbox"> <label for="cbox2">Recordarme</label> <br>
              <div class ="check-section">
                <input type="submit" value="Iniciar sesion" name = "submit">
              
              </div>
              
              <input class ="olvide" type="submit" value="Olvide mi contraseña">
          </form>
        </div>
    
       
    </div>
    <script>
      const mobile_btn = document.getElementById("menu")
          nav = document.querySelector("nav")
          btn_extit = document.getElementById("exit"); 
         const flexContainer = document.getElementById("flex-container") 
           mobile_btn.addEventListener("click",() =>{
               nav.classList.add("menu-btn")
               flexContainer.classList.add("hidden")
           });
   
           btn_extit.addEventListener("click", () =>{
               nav.classList.remove("menu-btn");
               flexContainer.classList.remove("hidden")
           });
     </script>
    <script src="login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html> 

<?php

?>