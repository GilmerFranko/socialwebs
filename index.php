<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inicio</title>
<link href="/src/icomoon/style.css" rel="stylesheet" type="text/css" />
<link href="/view/css/reglasgenerales.css" rel="stylesheet" type="text/css" />
<link href="/view/css/allcolors.css" rel="stylesheet" type="text/css" />
<style type="text/css">
.fonticon {
	color: #E3E3E3;
	font-size: 24px;
}
#barbusqueda {
	background-color: var(--seconcolor);
}
#formbuscar {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 18px;
	font-style: italic;
	height: 30px;
	padding: 0;
	border:none;
	outline:none;
	color:gray;
	font-size:14px;
	padding-left:15px;
	overflow:hidden;
}
#tablacontenido {
	border-radius: 8px;

}	
.nombreyperfil {
	font-size: 10px;
	background-color: #F3F3F3;
}

.tablaitem {
	background-color: #FFFFFF;
	text-align: center;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	font-style: italic;
	-webkit-transition: all .3s ease-in-out;
	-moz-transition: all .3s ease-in-out;
	-ms-transition: all .3s ease-in-out;
	-o-transition: all .3s ease-in-out;
	transition: all .3s ease-in-out;
	width: 100%;
	overflow: hidden;
  box-shadow:0px 0px 8px -2px var(--secondcolor),0px 0px 4px 0px black;
}
.butom {
	font-family: Verdana, Geneva, sans-serif;
	background-color: #E3E3E3;
	text-align: center;
	border-radius: 0px;
	text-decoration: none;
	font-style: normal;
	list-style-type: none;
	line-height: normal;
	margin: 0px;
}
.imagenitem {
	-webkit-transition: all .4s;
	-moz-transition: all .4s;
	-ms-transition: all .4s;
	-o-transition: all .4s;
	transition: all .4s;
}
.imagenitem:hover {
	transform: scale(0.95);
	border-radius: 18px;
	background-color: #CCC;
}

#barrabuscar {
	height: 30px;
	padding: 0;
	margin-left: 0;
	border: none;
}
.foticonprofile {
  background-color: var(--primarycolor);
  color:white;
}
.linknameprofile{
  background-color: var(--primarycolor);
  color:white;
}
</style>
<style type="text/css">
.tablaitem1 {	background-color: #666;
	text-align: center;
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
	font-style: italic;
	-webkit-transition: all .3s ease-in-out;
	-moz-transition: all .3s ease-in-out;
	-ms-transition: all .3s ease-in-out;
	-o-transition: all .3s ease-in-out;
	transition: all .3s ease-in-out;
	width: 100%;
	overflow:hidden;
}
body,td,th {
	font-family: Verdana, Geneva, sans-serif;
	color: #333;
}
a {
	font-style: italic;
}
a:active {
	color: #06C;
}
</style>
</head>
<body bgcolor="#F3F3F3" link="#000066">
  <section>
    <?php 
      session_start();
      if (!isset($_SESSION['id']) || empty($_SESSION['id'])){
        header("location: /view/login.php");
      }
      include_once($_SERVER['DOCUMENT_ROOT']."/view/barnav.php");#incluir barnav
      include_once($_SERVER['DOCUMENT_ROOT']."/model/dateprofile.php");#incluir dateprofile
      $data=new dateprofile();
      $data->getdateprofile($_SESSION['id']); #enviarle como parametros el id del usuario
    ?>
    <h1>Ventas y Precios</h1>
    <table width="100%" height="372" border="0" cellspacing="20" id="tablacontenido">
      <tr>
        <td width="25%" height="1"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablaitem">
       <tr class="nombreyperfil">
            <td height="20" colspan="2"><a href="#" style="text-decoration: none; font-size: 16px;" class="linknameprofile">Gilmer Franko</a></td>
            <td width="80"><a href="#" class="butom, foticonprofile" style="font-size:24px"><img src="<?php echo $data->pictureprofile;?>"alt="perfil" width="30px"></a></td>
          <tr>
            <td colspan="3" class="imagenitem"><em><img src="/src/img/facebook.jpg" width="300" alt="Chimo" /></em></td>
          </tr>
          <tr>
            <td colspan="3"><div>Www.razadeperros.net</div></td>
          </tr>
          <tr class="tablaitem">
            <td width="33%" class="butom"><form id="form1" name="form1" method="post" action="">
              Puntucacion
            </form></td>
            <td width="33%" class="butom">******</td>
            <td width="33%" class="butom"><a href="#" style="background-color:var(--secondcolor); color:white; text-decoration:none;">Puntuar</a></td>
          </tr>
          <tr class="tablaitem">
            <td colspan="3" class="cambiarprecio"><p class="letraengris">Opiniones</p></td>
            </tr>
        </table></td>
        <td width="25%" height="1"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablaitem">
          <tr class="nombreyperfil">
            <td height="20" colspan="2"><a href="#" style="text-decoration: none; font-size: 16px;" class="linknameprofile">Gilmer Franko</a></td>
            <td width="80" ><a href="#" class="butom, foticonprofile" style="font-size:24px"><img src="<?php echo $data->pictureprofile;?>"alt="perfil" width="30px"></a></td>
          </tr>
          <tr>
            <td colspan="3" class="imagenitem"><em><img src="/src/img/facebook.jpg" width="300" alt="Chimo" /></em></td>
          </tr>
          <tr>
            <td colspan="3"><div>Www.razadeperros.net</div></td>
          </tr>
          <tr class="tablaitem">
            <td width="33%" class="butom"><form id="form3" name="form1" method="post" action="">
              Puntucacion
            </form></td>
            <td width="33%" class="butom">******</td>
            <td width="33%" class="butom"><a href="#" style="background-color:var(--secondcolor); color:white; text-decoration:none;">Puntuar</a></td>
          </tr>
          <tr class="tablaitem">
            <td colspan="3" class="cambiarprecio"><p class="letraengris">Opiniones</p></td>
          </tr>
        </table></td>
        <td width="25%"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablaitem">
          <tr class="nombreyperfil">
            <td height="20" colspan="2"><a href="#" style="text-decoration: none; font-size: 16px;" class="linknameprofile">Gilmer Franko</a></td>
            <td width="80" ><a href="#" class="butom, foticonprofile" style="font-size:24px"><img src="<?php echo $data->pictureprofile;?>"alt="perfil" width="30px"></a></td>
          </tr>
          <tr>
            <td colspan="3" class="imagenitem"><em><img src="/src/img/facebook.jpg" width="300" alt="Chimo" /></em></td>
          </tr>
          <tr>
            <td colspan="3"><div>Www.razadeperros.net</div></td>
          </tr>
          <tr class="tablaitem">
            <td width="33%" class="butom"><form id="form4" name="form1" method="post" action="">
              Puntucacion
            </form></td>
            <td width="33%" class="butom">******</td>
            <td width="33%" class="butom"><a href="#" style="background-color:var(--secondcolor); color:white; text-decoration:none;">Puntuar</a></td>
          </tr>
          <tr class="tablaitem">
            <td colspan="3" class="cambiarprecio"><p class="letraengris">Opiniones</p></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table width="91%" border="0" cellpadding="0" cellspacing="0" class="tablaitem">
          <tr class="nombreyperfil">
            <td height="20" colspan="2"><a href="#" style="text-decoration: none; font-size: 16px;" class="linknameprofile">Gilmer Franko</a></td>
            <td width="80" ><a href="#" class="butom, foticonprofile" style="font-size:24px"><img src="<?php echo $data->pictureprofile;?>"alt="perfil" width="30px"></a></td>
          </tr>
          <tr>
            <td colspan="3" class="imagenitem"><em><img src="/src/img/facebook.jpg" width="300" alt="Chimo" /></em></td>
          </tr>
          <tr>
            <td colspan="3"><div>Caja Seca</div></td>
          </tr>
          <tr class="tablaitem">
            <td width="33%" class="butom"><form id="form5" name="form1" method="post" action="">
              <p>
                <select name="select4" size="1" id="select4">
                  <option>Bs.S</option>
                  <option>$</option>
                  <option>E</option>
                </select>
              </p>
            </form></td>
            <td width="33%" class="butom">700.000</td>
            <td width="33%" class="butom"><a href="#" style="background-color:var(--secondcolor); color:white; text-decoration:none;">Puntuar</a></td>
          </tr>
          <tr class="tablaitem">
            <td colspan="3" class="cambiarprecio"><p class="letraengris">17/07/2020</p></td>
          </tr>
        </table></td>
        <td><table width="91%" border="0" cellpadding="0" cellspacing="0" class="tablaitem">
          <tr class="nombreyperfil">
            <td height="20" colspan="2"><a href="#" style="text-decoration: none; font-size: 16px;" class="linknameprofile">Gilmer Franko</a></td>
            <td width="80" ><a href="#" class="butom, foticonprofile" style="font-size:24px"><img src="<?php echo $data->pictureprofile;?>"alt="perfil" width="30px"></a></td>
          </tr>
          <tr>
            <td colspan="3" class="imagenitem"><em><img src="/src/img/facebook.jpg" width="300" alt="Chimo" /></em></td>
          </tr>
          <tr>
            <td colspan="3"><div>Caja Seca</div></td>
          </tr>
          <tr class="tablaitem">
            <td width="33%" class="butom"><form id="form6" name="form1" method="post" action="">
              <p>
                <select name="select5" size="1" id="select5">
                  <option>Bs.S</option>
                  <option>$</option>
                  <option>E</option>
                </select>
              </p>
            </form></td>
            <td width="33%" class="butom">700.000</td>
            <td width="33%" class="butom"><a href="#" style="background-color:var(--secondcolor); color:white; text-decoration:none;">Puntuar</a></td>
          </tr>
          <tr class="tablaitem">
            <td colspan="3" class="cambiarprecio"><p class="letraengris">17/07/2020</p></td>
          </tr>
        </table></td>
        <td><table width="91%" border="0" cellpadding="0" cellspacing="0" class="tablaitem">
          <tr class="nombreyperfil">
            <td height="20" colspan="2"><a href="#" style="text-decoration: none; font-size: 16px;" class="linknameprofile">Gilmer Franko</a></td>
            <td width="80" ><a href="#" class="butom, foticonprofile" style="font-size:24px"><img src="<?php echo $data->pictureprofile;?>"alt="perfil" width="30px"></a></td>
          </tr>
          <tr>
            <td colspan="3" class="imagenitem"><em><img src="/src/img/facebook.jpg" width="300" alt="Chimo" /></em></td>
          </tr>
          <tr>
            <td colspan="3"><div>Caja Seca</div></td>
          </tr>
          <tr class="tablaitem">
            <td width="33%" class="butom"><form id="form7" name="form1" method="post" action="">
              <p>
                <select name="select6" size="1" id="select6">
                  <option>Bs.S</option>
                  <option>$</option>
                  <option>E</option>
                </select>
              </p>
            </form></td>
            <td width="33%" class="butom">700.000</td>
            <td width="33%" class="butom"><a href="#" style="background-color:var(--secondcolor); color:white; text-decoration:none;">Puntuar</a></td>
          </tr>
          <tr class="tablaitem">
            <td colspan="3" class="cambiarprecio"><p class="letraengris">17/07/2020</p></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </td>
</tr>
</table>
</section>
</body>
</html>
