let divPrincipal22  = document.getElementById("registrar");
let divPrincipal  = document.getElementById("ventas");
let div = document.getElementById("primary-nav");

    div.style.marginLeft = "-0.1em";
    div.style.marginLeft = "6.1em";
 

 div.innerHTML = `<li class = "inicio"><a href="index.php">Inicio</a></li>
 <li><a href="registrarvendedor.php">Registrar vendedor</a></li>
 <a href="interfaz.php">Ver ventas</a>
 <li id = "registrar"></li>
<li><a href="">Sobre nosotros</a></li>
<li><a href="catalogo.php">Catalogo</a></li>
<li><a href="vendedores.php">Vendedores</a></li>
<li style = "margin-top:-0.3em; margin-left:1em;"> <div class="btn-group" >

<div class="dropdown">
<div class="dropdown">
<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
 Perfil
</button>
<ul class="dropdown-menu" id = "dd-menu" style = "display:block;" style = "margin-top:1em;">
 <li style = "margin-left:-2em;width:130px;"><a class="dropdown-item" href="#">Action</a></li>
  <li style = "margin-left:-2em;width:130px;"><a class="dropdown-item" href="verPedidos.php">Pedidos</a></li>
  <li style = "margin-left:-2em; width:130px;" ><a class="dropdown-item" href="configurarCuenta.php">Configuracion</a></li>
  <li style = "margin-left:-2em;width:130px;"><a class="dropdown-item" href="cerrarSesion.php">Cerrar sesion</a></li>
</ul>
</div>

</div> </li>`;