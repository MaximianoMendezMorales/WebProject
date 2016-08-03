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

            <div class="destacados">
                <p id="titulos">Area de destacados y relacionado</p>
            <table>
                <tr>
                    <td><img src="img/desc/11070218_355977054596028_6492898790641398687_n.jpg" alt="Maximiano" width="150px" height="150px"  id="img"></td>
                </tr>
            </table>
               <h2 id="titulo1">Información</h2>
                <p id="info">Hola mi nombre es Maximiano Méndez Morales y estudio la carrera de TSU en TIC (Tecnologías de la Información y la Comunicación) en la Universidad Tecnológica del Suroeste del Estado (UTSOE) y desarrolle esta página para la materia de Desarrollo de Aplicaciones Web.</p>
            <table>
                <tr>
                    <td><a href="http://mendezmorales-cps.blogspot.com" target="_blank"><img src="img/socialnetworks/blogger.png" alt="Blogger" width="45"></a></td>
                    <td><p id="enlace">Mi blog personal</p></td>
                    <td></td>
                </tr>
                <tr>
                    <td><a href="Mapa.html" target="_self"><img src="img/socialnetworks/map.png" alt="Mapa" width="45" height="45" ></a></td>
                    <td><p id="enlace">Mapa Geolocalización</p></td>
                    <td></td>
                </tr>
            </table>
            </div>


            <div id="frmuser" class="registro">
              <form action="agregar.php" id="frmcapuser" method="POST">
                <h1 id="titulo2">Registrate</h1>

                <table id="tbl">
                   <tr>
                       <td>
                            <input type="text" placeholder="Ingresa tu ID" id="ins_id" name="ins_id" class="input-95">
                        </td>
                   </tr>
                    <tr>
                        <td>
                            <input type="text" placeholder="Ingresa tu nombre" class="input-95" name="ins_user" id="ins_user">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" placeholder="Ingresa una contraseña" class="input-95" id="ins_pass" name="ins_pass">
                        </td>
                        <td>

                        </td>
                         <td>
                            <!--<input type="submit" value="Nuevo" id="btn-new">-->
                        </td>
                    </tr>
                    <tr>
                        <td>
                        <input type="password" placeholder="Confirma tu contraseña" class="input-95" id="ins_pass_confirm" name="ins_pass_confirm">
                        </td>
                    </tr>
                </table>
                <div id="btns">

                        <input type="submit" value="Aceptar" id="btn-acep">
                        <input type="submit" id="btn-new" value="Nuevo">
                </div>
              </form>
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
                    //echo $tablausuarios;
                ?>


                <div class="as">
                <?php
                echo $tablausuarios;
                ?>
            </div>

            <div class="btnes">
                 <button id="btn-del">Eliminar</button>
                 <button id="btn-act">Actualizar</button>
             </div>

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


    $("#frmuser").find("form").on("submit", function (event) {
     event.preventDefault();
		if($('#ins_pass').val()==$("#ins_pass_confirm").val()){
            if($('#ins_id').val()==''){
        if($("#ins_user").val() == '' || $("#ins_pass").val() == '' || $("#ins_pass_confirm").val() == ''){
            alert("Campos vacios")
            }else{
                $.ajax({
                      url: "agregar.php",
                      type: "POST",
                      //datos del formulario
                      data: $(this).serialize(),
                      //una vez finalizado correctamente
                      success: function (response) {
                          location.reload();
                      },
                      error: function (response) {
                           alert(response);
                      },
                   });
            }

            }else{
                    $.ajax({
                  url: "actualizar.php",
                  type: "POST",
                  //datos del formulario
                  data: $(this).serialize(),
                  //una vez finalizado correctamente
                  success: function (response) {
                      location.reload();
                  },
                  error: function (response) {
                       alert(response);
                  },
               });
            }

         }else{
			alert('Error password incorrecto');
		 }
	});

     $("#btn-new").click(function (event) {
		$(":text").each(function() {
            $($(this)).val('');

    	});
         $(":password").each(function() {
            $($(this)).val('');

    	});
		//window.location.href = path + 'xls/articulosCica2016.xlsx';
     });



});
        </script>
    </body>
</html>
