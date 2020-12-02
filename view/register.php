<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitionial.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/view/css/tablestyles.css">
<link rel="stylesheet" href="/view/css/reglasgenerales.css">
<link rel="stylesheet" href="/view/css/allcolors.css">
<script src="/view/script/jquery-3.4.1.min.js"></script>
<title>Registrar</title>

<style type="text/css">
.tablecss{
}
.tablalogin {
	font-family: Verdana, Geneva, sans-serif;
	text-align: center;
	font-size: 12px;
    z-index: 10;
   	position: relative;
	width: 450px;
	margin: 0 auto;
}
.tablaitem{
	position: fixed;
	left: 0;
	right: 0;
	left: 0;
	right: 0;
	z-index: 2;
    margin: auto;
  
}
body{
  padding:0;
  margin:0;
}
.vid-container{
  position:relative;
  height:100vh;
  overflow:hidden;
}
.bgvid{
  position:absolute;
  left:0;
  top:0;
  width:100vw;
}
.inner-container{
	color:var(--textcolor);
	position:absolute;
	top:calc(50vh - 200px);
	left:calc(50vw - 200px);
	overflow:hidden;
}
.bgvid.inner{
  top:calc(-50vh + 200px);
  left:calc(-50vw + 200px);
  -webkit-filter:blur(4px);
  -ms-filter: blur(4px);
  -o-filter: blur(4px);
  filter:blur(4px);
}

</style>
<script>
		$(document).ready(function(){
			$("#nickname").change(verifynickname);
			$("#email").change(verifyemail);
			var a=$("#cantidad_compra").val();
			var num=0;
			$("#botonadjuntararchivo").click(addbuttonfile);/*Asigna las funciones del ‘botonfuncional’ al campo de texto identificado como  ‘archivoadjuntado’ */
		});
		function addbuttonfile(){
			$("#botonfuncional").click()
			/* Asigna las funciones del ‘botonfuncional’ al input class="inputtext"  identificado como ‘botonadjuntararchivo’ */
			$("#botonadjuntararchivo").click(function() {
				$("#botonfuncional").click()
			});
			/*Muestra el archivo seleccionado en el campo de texto identificado como ‘archivoadjuntado’ */
			$("#botonfuncional").change(function() {
				$("#botonadjuntararchivo").val($(this).val());
			});
		}

		function verifynickname(){
			var formdate={Nickname:$("#nickname").val()};
			$.get("/model/verifynickname.php",	formdate, getdatenickname)
		}
		function verifyemail(){
			var formdate={Email:$("#email").val()};
			$.get("/model/verifyemail.php",	formdate, getdateemail)
		}
		function getdatenickname(getdates){
			if (getdates=="yes"){
				$("#infonick").css("color","green");
				$("#infonick").text("Nick disponible");
			}
			else if(getdates=="no"){
				$("#infonick").css("color","red");
				$("#infonick").text("Nick no disponible");
			}
		}
		function getdateemail(getdates){
			if (getdates=="used"){
				$("#infoemail").css("color","red");
				$("#infoemail").text("Este email ya esta en uso");
			}
			else if(getdates=="no"){
				$("#email").css("border-color","red");
				$("#infoemail").css("color","red");
				$("#infoemail").text("Esto no es un email");
			}
			else if(getdates=="yes"){
				$("#infoemail").css("color","red");
				$("#infoemail").text("");
			}
		}
</script>
</head>
<body>
 <?php
    include_once($_SERVER['DOCUMENT_ROOT']."/model/sqlregister.php");
    $register=new register();
    $register->registeruser();
   ?>
   <div class="vid-container">
      <img src="/src/img/backgrounds/background2.jpg"class="bgvid" alt="">
    </div>
<table width="100%" height="cool" border="0" class="tablecss">
	<form method="post" enctype="multipart/form-data">
	  <tr>
	    <th width="35%" scope="row">&nbsp;</th>
	    <td colspan="2" rowspan="2" class="inner-container">
	    	<div>
    			<img src="/src/img/backgrounds/background2.jpg" class="bgvid inner" alt="">
    		</div>
	    	<table width="100%" height="217" border="0" cellpadding="0" cellspacing="0" class="tablalogin" id="login" style=>
	      <tr>
	        <td colspan="2" scope="col" style="background-color:var(--primarycolor);color:var(--textcolor); font-style:italic; height: 30px;">Registrate</td>
	        </tr>
	      <tr>
	        <td height="49" colspan="2" scope="row">Nombre</td>
	        </tr>
	     <tr>
	        <td colspan="2" scope="row">
	          <input class="inputtext" type="text" name="name" id="correologin" placeholder="" />
	          <p></p>
	        </td>
	     </tr>
	      <tr>
	        <td height="23" colspan="2" scope="row">NickName</td>
	        </tr>
	      <tr>
	        <td height="47" colspan="2" scope="row">
	          <input class="inputtext" type="text" name="nickname" id="nickname" placeholder />
	        </td>
	        </tr>
	        <tr>
	        	<td>
	        		<p id="infonick" style="color:red;"></p>
	        	</td>
	        </tr>
	        <tr>
	        <td height="23" colspan="2" scope="row">Email</td>
	        </tr>
	      <tr>
	        <td height="47" colspan="2" scope="row">
	          <input class="inputtext" type="text" name="email" id="email" placeholder />
	          <p id="infoemail"></p>
	        </td>
	        </tr>
	        <tr>
	        <td height="23" colspan="2" scope="row">Contraseña</td>
			</tr>
	      <tr>
	        <td height="47" colspan="2" scope="row">
	          <input class="inputtext" type="password" name="pass" id="passwordlogin" placeholder />
	        </td>
			</tr>
			<tr>
	        	<td height="47" colspan="2" scope="row">
				<input class="inputtext" type="button" id="botonadjuntararchivo" value="Foto de perfil">
	          	<input class="inputtext" type="file" name="pictureprofile" id="botonfuncional" accept="image/png, .jpeg, .jpg" style="display:none;"/></td>
			</tr>
	      <tr>
	      <td height="38" scope="row">
	        <input class="inputtext" type="checkbox" name="saveuser" id="saveuser" />
	        <label for="saveuser">Logearme al registrarme</label>
	     </td>
	        <td colspan="2"><input class="inputtext" name="button" type="submit" class="boton" id="button" value="Entrar" /></td>
	        </tr>
	        <tr><th>¿Estas registrado?<a href="/login" rel="hola">Inícia sesión aquí</a></th></tr>
	    </table></td>	  
	</form>
</table>
</tr>
</form>
</table>
</body>
</html>