  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/view/css/reglasgenerales.css" rel="stylesheet" type="text/css" />
<link href="/view/css/allcolors.css" rel="stylesheet" type="text/css" />
<link href="/view/css/tablestyles.css" rel="stylesheet" type="text/css" />
<title>Login</title>

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
</head>
<body bgcolor="#f3f3f3">
  <?php 
    include_once($_SERVER['DOCUMENT_ROOT']."/model/checklogin.php");
    if (!empty($_POST['email']) and !empty($_POST['password'])){
       $checklogin=new login();
      $checklogin->checklogin();
  }
   ?>
   <div class="vid-container">
      <img src="/src/img/backgrounds/background2.jpg"class="bgvid" alt="">
    </div>
<table width="100%" height="cool" border="0" class="tablecss">
  <form action="" method="post">
    <tr>
      <th width="35%" scope="row">&nbsp;</th>
      <td height="50%" colspan="2" rowspan="2" class="inner-container">
        <div>
          <img src="/src/img/backgrounds/background2.jpg" class="bgvid inner" alt="">
        </div>
        <table width="100%" height="217" border="0" cellpadding="0" cellspacing="0" class="tablalogin" id="login" style=>
        <tr>
          <td colspan="2" scope="col" style="background-color:var(--primarycolor); font-style:italic;color:white">Iniciar Sesión</td>
          </tr>
        <tr>
          <td height="49" colspan="2" scope="row">Correo Electronico</td>
          </tr>
        <tr>
          <td colspan="2" scope="row">
            <input class="inputtext" type="text" name="email" id="correologin" placeholder="preciostoday@preciostoday.com" />
          </td>
          </tr>
        <tr>
          <td height="23" colspan="2" scope="row">Contraseña</td>
          </tr>
        <tr>
          <td height="47" colspan="2" scope="row">
            <input class="inputtext" type="password" name="password" id="passwordlogin" placeholder="********" />
          </td>
          </tr>
        <tr>
        <td height="38" scope="row">
          <input class="inputtext" type="checkbox" name="saveuser" id="guardarusuario" />
          <label for="guardarusuario">Recordar Usuario</label>
        </td>
          <td colspan="2"><input class="inputtext" name="button" type="submit" class="boton" id="button" value="Entrar" /></td>
          </tr>
          <tr><th>¿No estas registrado?<a href="/register">¿Registrate aqui?</a></th></tr>
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
