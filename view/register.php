  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="/view/script/jquery-3.4.1.min.js"></script>
<title>Registrar</title>

<style type="text/css">
.tablalogin {
	font-family: Verdana, Geneva, sans-serif;
	text-align: center;
	font-size: 12px;
	filter:blur(0px);
	background-color: whitesmoke;
	border-radius: 8px;
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
			/* Asigna las funciones del ‘botonfuncional’ al input  identificado como ‘botonadjuntararchivo’ */
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
<link href="reglasgenerales.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {
}
</style>
</head>
<body bgcolor="#f3f3f3">
 <?php
    include_once($_SERVER['DOCUMENT_ROOT']."/model/sqlregister.php");
    $register=new register();
    $register->registeruser();
   ?>
<img src="/src/img/background/background.jpg" width="100%" height="150%" style="position:absolute;filter:blur();">
<table width="100%" height="cool" border="0">
	<form method="post" enctype="multipart/form-data">
	  <tr>
	    <th height="43" colspan="4" scope="col">&nbsp;</th>
	  </tr>
	  <tr>
	    <th width="35%" scope="row">&nbsp;</th>
	    <td height="50%" colspan="2" rowspan="2"><table width="100%" height="217" border="0" cellpadding="0" cellspacing="0" class="tablalogin" id="login" style=>
	      <tr>
	        <td colspan="2" scope="col" style="background-color:#FC3; font-style:italic">Registrate</td>
	        </tr>
	      <tr>
	        <td height="49" colspan="2" scope="row">Nombre</td>
	        </tr>
	     <tr>
	        <td colspan="2" scope="row">
	          <input type="text" name="name" id="correologin" placeholder="" />
	          <p></p>
	        </td>
	     </tr>
	      <tr>
	        <td height="23" colspan="2" scope="row">NickName</td>
	        </tr>
	      <tr>
	        <td height="47" colspan="2" scope="row">
	          <input type="text" name="nickname" id="nickname" placeholder />
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
	          <input type="text" name="email" id="email" placeholder />
	          <p id="infoemail"></p>
	        </td>
	        </tr>
	        <tr>
	        <td height="23" colspan="2" scope="row">Contraseña</td>
			</tr>
	      <tr>
	        <td height="47" colspan="2" scope="row">
	          <input type="password" name="pass" id="passwordlogin" placeholder />
	        </td>
			</tr>
			<tr>
	        	<td height="47" colspan="2" scope="row">
				<input type="button" id="botonadjuntararchivo" value="Foto de perfil">
	          	<input type="file" name="pictureprofile" id="botonfuncional" accept="image/png, .jpeg, .jpg" style="display:none;"/></td>
			</tr>
	      <tr>
	      <td height="38" scope="row">
	        <input type="checkbox" name="saveuser" id="saveuser" />
	        <label for="saveuser">Logearme al registrarme</label>
	     </td>
	        <td colspan="2"><input name="button" type="submit" class="boton" id="button" value="Entrar" /></td>
	        </tr>
	        <tr><th>¿Estas registrado?<a href="/view/register.php">Inicia Session aqui</a></th></tr>
	    </table></td>
	    <td width="35%">&nbsp;</td>
	  </tr>
	  <tr>
	    <th height="219" scope="row">&nbsp;</th>
	    <td>&nbsp;</td>
	  </tr>
	  <tr>
	    <th height="21" colspan="4" scope="row" style="">&nbsp;</th>
	  </tr>
	</form>
</table>
</body>
</html>