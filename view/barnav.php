<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/src/fonts/remixicon.css" rel="stylesheet" type="text/css" />
<link href="/view/css/reglasgenerales.css" rel="stylesheet" type="text/css" />
<link href="/view/css/allcolors.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="/favicn.png?v=<?php echo time() ?>" />
	<link rel="stylesheet" href="/src/bootstrap4/css/bootstrap.min.css">
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
	color:var(--secondtextcolor);
}
.fonticon {
	color: #E3E3E3;
	font-size: 24px;
}
#barbusqueda {
	padding: 7px;
	border-radius: 0px;
	background-color: var(--secondcolor);
}
#formbuscar {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 30px;
	font-style: bold;
	height: 30px;
	padding: 4px 4px;
	border:none;
	outline:none;
	color:gray;
	font-size:14px;
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
a {
	font-style: italic;
}
a:active {
	color: #06C;
}
.enlacesconcolorbar{
	font-size:14px;
	color:var(--secondtextcolor);
	text-decoration:none;
	font-style:normal;
	font-family:verdana, Geneva, sans-serif;
}
.iconbar{
	font-style:normal;
	text-decoration:none;
	color:var(--secondtextcolor);
	font-size:30px;
	display: inline-block;
}
.buttonsearch{
	width:100%;
	font-size:20px;
	background-color:var(--secondcolor);
	border:none;
	color:var(--secondtextcolor);
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
<div class="row fixed-top align-items-center" id="barnav">
	<div class="col-lg-2">
		<li>
			<a class="enlacesconcolorbar" href="/index"><span class="ri-fire-fill iconbar"></span>New</a>
		</li>
	</div>
	<div class="col-lg-4" id="barbusqueda">
		<li>
			<div class="row align-items-center">
				<div class="col-lg-8">
					<input type="text" class="barrabuscar" id="formbuscar">
				</div>
				<div class="col-lg-4">
					<button class="buttonsearch"><span class="ri-search-fill " style="color:var(--textcolor)"></span></button>
				</div>
			</div>
			
		</li>
	</div>
	<div class="col-lg-2">
		<li>
			<a class="enlacesconcolorbar"  href="/notifications"><span class="ri-alert-fill iconbar"></span>Notifications</a>
		</li>
	</div>
	<div class="col-lg-2">
		<li>
			<a class="enlacesconcolorbar"  href="/profile"><span class="ri-profile-fill iconbar"></span>Profile</a>
		</li>
	</div>
	<div class="col-lg-2">
		<li>
			<a class="enlacesconcolorbar"  href="/logout"><span class="ri-logout-circle-fill iconbar"></span>Logout</a>
		</li>
	</div>
</div>
</nav>
	<!--<div class="main">
		<div class="row" id="barnav">
			<div class="col-lg-2">
				<li>
					<a href="/index" class="iconbar"><span class="ri-fire-fill foticon iconbar"></span><a href="/index" class="enlacesconcolorbar">Inicio</a></a>
				</li>
			</div>
			<div class="col-lg" id="barbusqueda">
				<li>
					<input name="formbuscar" type="text" class="barrabuscar" id="formbuscar" style="width:95%" placeholder="www.website.com" />
					<button name="buttonsearch" class="buttonsearch"><span class="ri-search-fill" style="color:var(--primarycolor);"></span></button>
				</li>
			</div>
			<div class="col-lg-2">
				<li>
					<a href="/notifications" class="iconbar">
						<span class="ri-notification-fill foticon iconbar">
						</span>
						<a href="/notifications" class="enlacesconcolorbar" style="">Notificacionees</a>
					</a>
				</li>
			</div>
			<div class="col-lg-1">
				<li>
					<span class="ri-profile-fill iconbar">
					</span>
					<a href="/profile" cl-ass="enlacesconcolorbar" style="">Perfil</a>
				</li>
			</div>
			<div class="col-lg-1">
				<li>
					<a href="/logout" class="iconbar">
						<span class="ri-logout-circle-fill iconbar"></span>
						<a href="/logout" class="enlacesconcolorbar" style="">Salir</a></a>
				</li>
			</div>
		</div>
	</div>	
<table width="100%" border="0" align="center" cellspacing="0" id="barnav">
  <tr>
    <td width="14%" height="42"></td>
    <td width="39%" id="barbusqueda">
      <div style="border:none">
        <label for="formbuscar"></label>
        <table width="100%" border="0" cellpadding="4">
          <tr>
            <td width="239"><input name="formbuscar" type="text" class="barrabuscar" id="formbuscar" style="width:95%" placeholder="www.website.com" /></td>
            <td width="53"><button name="buttonsearch" class="buttonsearch"><span class="ri-search-fill" style="color:var(--primarycolor);"></span></button></td>
          </tr>
        </table>
      </div>
    </form></td>
    <td width="21%"><li><a href="/notifications" class="iconbar"><span class="ri-notification-fill foticon iconbar"></span><a href="/notifications" class="enlacesconcolorbar" style="">Notificacionees</a></a></li></td>
    <td width="8%"><li><span class="ri-profile-fill iconbar"></span><a href="/profile" class="enlacesconcolorbar" style="">Perfil</a></li></td>
    <td width="18%"><li><a href="/logout" class="iconbar"><span class="ri-logout-circle-fill iconbar"></span><a href="/logout" class="enlacesconcolorbar" style="">Salir</a></a></li></td>
  </tr>
</table>-->
</body>
</html>
