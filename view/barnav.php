<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/src/fonts/remixicon.css" rel="stylesheet" type="text/css" />
<link href="/view/css/reglasgenerales.css" rel="stylesheet" type="text/css" />
<link href="/view/css/allcolors.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicn.png?v=<?php echo time() ?>" />
<style type="text/css">
#barnav {
	/*background: -webkit-linear-gradient(var(--primarycolor) 80%,var(--secondcolor));*/
	background-color: var(--primarycolor);
  /*007a9ecolorimportante!*/
	font-family: Verdana, Geneva, sans-serif;
	font-size: 16px;
	font-style: normal;
	text-align: center;
	border-bottom-width: medium;
	border-left-width: medium;
	border-top-style: none;
	border-right-style: none;
	border-bottom-style: solid;
	border-left-style: none;
	border-top-color: #999;
	border-right-color: #999;
	border-bottom-color: var(--secondcolor);
	border-left-color: #999;
	-webkit-transition: all .3s;
	-moz-transition: all .3s;
	-ms-transition: all .3s;
	-o-transition: all .3s;
	transition: all .3s;
	border-radius: 0px;
	position:fixed;
	top:0;
	left:0;
	z-index:1;
}
.fonticon {
	color: #E3E3E3;
	font-size: 24px;
}
#barbusqueda {
	border-radius: 0px;
	background-color: var(--secondcolor);
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
	border: thin none #000;
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
#barrabuscar {
	height: 30px;
	padding: 0;
	margin-left: 0;
	border: none;
}
.precioyver {
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
.enlacesconcolorbar{
	font-size:17px;
	color:var(--textcolor);
	text-decoration:none;
	font-style:normal;
	font-family:verdana, Geneva, sans-serif;
}
.iconbar{
	font-style:normal;
	text-decoration:none;
	color:var(--textcolor);
	font-size:30px;
	display: block;
}
.buttonsearch{
	width:100%;
	font-size:20px;
	background-color:var(--seconcolor);
	border:none;
	color:var(--textcolor);
}
li{
	list-style: none;
}
/*a{
	display: block;
}*/
</style>
</head>
<body bgcolor="#F3F3F3" link="#000066">	
<table width="100%" border="0" align="center" cellspacing="0" id="barnav">
  <tr>
    <td width="14%" height="42"><li><a href="/index" class="iconbar"><span class="ri-fire-fill foticon iconbar"></span><a href="/index" class="enlacesconcolorbar">Inicio</a></a></li></td>
    <td width="39%" id="barbusqueda">
      <div style="border:none">
        <label for="formbuscar"></label>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="239"><input name="formbuscar" type="text" class="barrabuscar" id="formbuscar" style="width:95%"/></td>
            <td width="53"><button name="buttonsearch" class="buttonsearch"><span class="ri-search-fill"></span></button></td>
          </tr>
        </table>
      </div>
    </form></td>
    <td width="21%"><li><a href="/notifications" class="iconbar"><span class="ri-notification-fill foticon iconbar"></span><a href="/notifications" class="enlacesconcolorbar" style="">Notificacionees</a></a></li></td>
    <td width="8%"><li><span class="ri-profile-fill iconbar"></span><a href="/profile" class="enlacesconcolorbar" style="">Perfil</a></li></td>
    <td width="18%"><li><a href="/logout" class="iconbar"><span class="ri-logout-circle-fill iconbar"></span><a href="/logout" class="enlacesconcolorbar" style="">Salir</a></a></li></td>
  </tr>
</table>
</body>
</html>
