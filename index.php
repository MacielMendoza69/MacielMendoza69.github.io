<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>VaidrollTeamLogin6</title>
     <link rel="stylesheet" href="vaidroll.css">	
</head>
<body>
  <div class="cajafuera" align="center">
 
<div class="formulariocaja">
<form method="post" action="sesiones.php" name="vaidrollteam">
<div class="formtitulo">Login</div>

<div align="left" class="textoscajas">
&#128273; Ingresar usuario</div>
<input type="text" name="nickname" class="cajaentradatexto">

<div align="left" class="textoscajas">
&#128274; Ingresar password
</div>
<input type="password" name="txtpassword" id="txtpassword"
 class="cajaentradatexto">
 <div class="afcheckbox1" align="left">
 <div style="float:left;">
 <input type="checkbox" onclick="verpassword()" >
 </div>
 <div style="float:left;	color:white;">
 Mostrar contraseña
 </div>
 </div>
 
<input type="submit" value="Iniciar sesión" class="botonenviar">

<!-- <div style="margin-top:5%;	color:white;">¿Necesitas una cuenta?  <a href="#">Registrar</a></div> -->

<?php
if(isset($_GET['error'])){
  $error = $_GET['error'];
  if($error == "Incorrecto"){
    echo "<h1> El usuario o contraseña no son correctos intente de nuevo</h1>";
  }
  if($error == "vacio"){
    echo "<h1>Los datos enviados estan vacios</h1>";
  }
}
?>
</form>
</div>
<div class="autor">
FRANCISCO MACIEL MENDOZA HERNANDEZ
<div>
</div>
</body>

<script>
  function verpassword(){
      var tipo = document.getElementById("txtpassword");
      if(tipo.type == "password")
	  {
          tipo.type = "text";
      }
	  else
	  {
          tipo.type = "password";
      }
  }
</script>

</html>
