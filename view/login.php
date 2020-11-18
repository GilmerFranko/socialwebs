  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>

<style type="text/css">
.tablalogin {
	font-family: Verdana, Geneva, sans-serif;
	text-align: center;
	font-size: 12px;
	box-shadow: #09F 0px 2px 3px 1px;
	border: 1px solid #666;
	filter:blur(0px);
}
</style>
<link href="reglasgenerales.css" rel="stylesheet" type="text/css" />
<style type="text/css">
body {

	
}
</style>
</head>
<body bgcolor="#f3f3f3">
  <?php 
    include_once($_SERVER['DOCUMENT_ROOT']."/model/checklogin.php");
    if (!empty($_POST['email']) and !empty($_POST['password'])){
       $checklogin=new login();
      $checklogin->checklogin();
  }
   ?>
<img src="../../../ShotGfra/7jpg" width="100%" height="100%" style="position:absolute;filter:blur(0px);">
<table width="100%" height="cool" border="0">
  <form action="" method="post">
    <tr>
      <th height="43" colspan="4" scope="col">&nbsp;</th>
    </tr>
    <tr>
      <th width="35%" scope="row">&nbsp;</th>
      <td height="50%" colspan="2" rowspan="2"><table width="100%" height="217" border="0" cellpadding="0" cellspacing="0" class="tablalogin" id="login" style=>
        <tr>
          <td colspan="2" scope="col" style="background-color:#FC3; font-style:italic">Iniciar Sesión</td>
          </tr>
        <tr>
          <td height="49" colspan="2" scope="row">Correo Electronico</td>
          </tr>
        <tr>
          <td colspan="2" scope="row">
            <input type="text" name="email" id="correologin" placeholder="preciostoday@preciostoday.com" />
          </td>
          </tr>
        <tr>
          <td height="23" colspan="2" scope="row">Contraseña</td>
          </tr>
        <tr>
          <td height="47" colspan="2" scope="row">
            <input type="password" name="password" id="passwordlogin" placeholder="********" />
          </td>
          </tr>
        <tr>
        <td height="38" scope="row">
          <input type="checkbox" name="saveuser" id="guardarusuario" />
          <label for="guardarusuario">Recordar Usuario</label>
        </td>
          <td colspan="2"><input name="button" type="submit" class="boton" id="button" value="Entrar" /></td>
          </tr>
          <tr><th>¿No estas registrado?<a href="/view/register.php">¿Registrate aqui?</a></th></tr>
  </form>
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
</table>
</body>
</html>
