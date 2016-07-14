<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Maximiano TIC 3B UTSOE</title>
        <link rel="stylesheet" type="text/css" href="css/general.css">
        <link rel="stylesheet" type="text/css" href="css/formatomenu.css">
        <link rel="stylesheet" type="text/css" href="css/slidestyle.css">
        <link rel="stylesheet" type="text/css" href="css/galeria.css">
    </head>
    <body>
        <div class="caja">
            <div class="login" id="datos">
              <form action="proceso.php" method="post">
                    <label for="Usuario">Usuario</label>
                    <input tyte = "text" id = "txtusr" name="txtusr" autofocus placeholder="Usuario" class="input-l">
                    <label for="Contrasena">Contraseña </label>
                    <input type="password" id="txtpwd" name="txtpwd" placeholder="********" class="input-l">
                    <input type="submit" name="btn" value="Iniciar sesión " id="btn" class="bnt-login">
              </form>
            </div>
            <div class="slider">
                <ul>
                    <li><img src="img/slider/1.jpg" alt="ot1"></li>
                    <li><img src="img/slider/2.jpg" alt="ot2"></li>
                    <li><img src="img/slider/3.jpg" alt="ot3"></li>
                    <li><img src="img/slider/4.jpg" alt="ot4"></li>
                </ul>
            </div>
            <div class="menu">
                <nav>
                   <ul>
	            <li><a href="index.html" class="welcome">Welcome</a></li>
	            <li><a href="http://mendezmorales-cps.blogspot.com" target="_blank">Blog</a></li>
	            <li><a href="Mapa.html" class="mapaz">Mapa</a></li>
	            <li><a href="#" class="featured">Featured</a></li>
	            <li><a href="#" class="people">People</a></li>
	            <li><a href="#" class="music">Music</a></li>
	            <li><a href="#" class="mixes">Mixes </a></li>
	            <li><a href="#" class="videos">Videos</a></li>
	            <li><a href="#" class="radio">Radio</a></li>
            </ul>
                </nav>
            </div>

            <div class="registro">
               <h1 id="titulo2">Registrate</h1>
                <input type="text" placeholder="Ingresa tu nombre" class="input-95">
                <input type="password" placeholder="Ingresa una contraseña" class="input-95">
                <input type="password" placeholder="Confirma tu contraseña" class="input-95">
                <input type="submit" value="Registrar" id="reg">
            </div>

            <div class="tablaUsers">
               <h1 id="titulo1">Tabla de usuarios</h1>
                <?php
                    require_once 'control/usuarios.php';
                    $clsUsuarios = new usuarios();
                    $dsUsuarios= $clsUsuarios->getUsers();
                    $tablausuarios="<table id='listaUsuarios'>";
                    $tablausuarios=$tablausuarios."<thead>";
                    $tablausuarios=$tablausuarios."<tr>";
                    $tablausuarios=$tablausuarios."<th id = 'tituList'> </th>";
                    $tablausuarios=$tablausuarios."<th id = 'tituList'>&nbsp;&nbsp;ID</th>";
                    $tablausuarios=$tablausuarios."<th id = 'tituList'>USUARIO</th>";
                    $tablausuarios=$tablausuarios."</tr>";
                    $tablausuarios=$tablausuarios."</thead>";
                    $tablausuarios=$tablausuarios."<tbody>";
                    if(sizeof($dsUsuarios) > 0) {
                        foreach ($dsUsuarios as $usuario) {
                            $tablausuarios=$tablausuarios."<tr>";
                            $tablausuarios=$tablausuarios."<td><input type='checkbox' name='seleccionar' id='".$usuario->getId()."'/></td>";
                            $tablausuarios=$tablausuarios."<td>&nbsp;&nbsp;&nbsp;".$usuario->getId().'&nbsp;&nbsp;&nbsp;</td>';
                            $tablausuarios=$tablausuarios."<td>".$usuario->getUsername().'&nbsp;&nbsp;&nbsp;</td>';
                            $tablausuarios = $tablausuarios."<td><input type='button' value='' class='actualizar' id='".$usuario->getId()."'></td>";
                            $tablausuarios=$tablausuarios."</tr>";
                        }
                    }else{
                            $tablausuarios=$tablausuarios."<tr>";
                            $tablausuarios=$tablausuarios."<td>No existen Usuarios</td>";
                            $tablausuarios=$tablausuarios."</tr>";
                    }
                    $tablausuarios=$tablausuarios."</tbody>";
                    $tablausuarios=$tablausuarios."</table>";
                    echo $tablausuarios;
                ?>
             <div class="btn">
                 <button id="btn-del">Eliminar</button>
                 <button id="btn-act">Actualizar</button>
             </div>
            </div>
            <div class="destacados">


            </div>
             <div class="pie">
            <p id="pie">Pie de pagina</p>
            </div>
        </div>
        <script src="Public/plugins/jquery-2.2.4.min.js"></script>
        <script>
    $(document).ready(function(){
	// this is the id of the form
	$("#datos").find("form").on("submit", function (event) {
     event.preventDefault();
		$.ajax({
          url: "proceso.php",
          type: "POST",
          //datos del formulario
          data: $(this).serialize(),
          //una vez finalizado correctamente
          success: function (response) {
		 	if(response!=""){
				alert(response);
				// show response from the php script.
			}
          }
       });
	});

	$("#btn-del").click(function (event) {
		$("input:checkbox[name=seleccionar]:checked").each(function() {
          var parametros = {
          		"ID": $(this).attr("id")
		  	  };

		  $.ajax({
	      url: "borrar.php",
          type: "POST",
          //datos del formulario
          data: parametros,
          //una vez finalizado correctamente
          success: function (response) {
               location.reload();
		  },
          error: function (response) {
               alert(response);
		  },
		  });

    	});
		//window.location.href = path + 'xls/articulosCica2016.xlsx';
     });


});
        </script>

        <!--<script src="Public/plugins/jquery-2.2.4.min.js"></script>
        <script>
            $(document).ready(function(){
                // this is the id of the form
                $("#datos").find("form").on("submit", function (event) {
                 event.preventDefault();
                    $.ajax({
                      url: "proceso.php",
                      type: "POST",
                      //datos del formulario
                      data: $(this).serialize(),
                      //una vez finalizado correctamente
                      success: function (response) {
                        if(response!=""){
                            alert(response);
                            // show response from the php script.
                        }
                      }
                 });
                });
            });
        </script>-->
    </body>
</html>
