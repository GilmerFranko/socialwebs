<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/reglasgenerales.css">
    <link rel="stylesheet" href="/view/css/tablestyles.css">
    <link rel="stylesheet" href="/src/amaran/dist/css/amaran.min.css">
    <link rel="stylesheet" href="/view/css/csspageprofile.css">
    <link rel="stylesheet" href="/src/bootstrap4/css/bootstrap.min.css">
    <script src="/view/script/jquery-3.4.1.min.js"></script>
    <script src="/src/amaran/dist/js/jquery.amaran.min.js"></script>
	<title>Agregar Sitio Web</title>
	<style>
		.section{
			left:10%;
			position: absolute;
			width: 80%;
		}
    </style>
<script>
		$(document).ready(function(){
            $("#url").on('keyup',verifyurl);
            $("#formweb").submit(function(){});
            $("#formweb").submit(verifyurlrepeatinfo);
			var a=$("#cantidad_compra").val();
            var num=0;
        });
        $(function(){
            if(location.hash=="#pageadded"){
                $.amaran({
                'content':{
                    title:'Aviso',
                    message:'Pagina web agregada exitosamente!',
                    info:$("#url").val(),
                    icon:'ri-alarm-warning-fill'
                },
                theme:'awesome ok'
                });
            }
        });
        $("#formweb").submit(function(){return true;});
                $("#formweb").submit();
		function verifyurl(){
            var addhttps="https://"+$("#url").val();//agrega https:// antes de la url ingresada(evita errores)
            //alert(addhttps);
            var formdate={url:addhttps, option:'1'};
			$.post("/model/profile/sqladdwebsite.php",	formdate, getdateurl);
		}
		function getdateurl(getdates){
            //alert(getdates);
            if (getdates=="web used"){
                $("#infoweb").text("Esta web ya esta registrada");
            }
			else if (getdates=="url invalid"){
                $("#url").css("border", "solid 1px red");
				$("#infonick").css("color","green");
                $("#infonick").text("Nick disponible");
			}
			else if(getdates=="url valid"){
                $("#url").css("border", "solid 1px green");
				$("#infonick").css("color","red");
				$("#infonick").text("Nick no disponible");
            }
        }
        function verifyurlrepeatinfo(){
            var addhttps="https://"+$("#url").val();//agrega https:// antes de la url ingresada(evita errores)
            //alert(addhttps);
            var formdates={url:addhttps, option:'2'};
            $.post("/model/profile/sqladdwebsite.php",	formdates   , getdateurlinfo);
        }
        function getdateurlinfo(getdateinfo){
            if (getdateinfo=="url added"){
                location.assign("#pageadded");
                location.reload();
            }
        }
</script>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])){
        header("location: /view/login.php");
    }
	include_once($_SERVER['DOCUMENT_ROOT']."/view/barnav.php");#incluir barnav
    include_once($_SERVER['DOCUMENT_ROOT']."/model/dateprofile.php");#incluir dateprofile
    include_once($_SERVER['DOCUMENT_ROOT']."/model/profile/sqladdwebsite.php");
	$data=new dateprofile();
	$data->getdateprofile($_SESSION['id']); #enviarle como parametros el id del usuario
    if(!empty($_POST['name']) and !empty($_POST['url'])){
        $addwebsite=new addwebsite();
        $addwebsite->setaddwebsite($_SESSION['id']);
    }
    ?>
    <section class="section" align="">
        <div class="container">
            <table cellspacing="3" class="containprofile" width="100%" border="0">
                <tr>
                    <td>
                        <table cellspacing="3" class="bar2" width="100%">
                            <tr>
                                <td><a href="#" class="enlaces2bar">Perfil</a></td>
                                <td><input  class="searchinprofile" type="text" placeholder="Buscar en @<?php echo $data->nickname; ?>"></td>
                                <td><a href="/profile/websites" class="enlaces2bar">Sitios Webs</a></td>
                                <td><a href="/view/profile/opinions(prueba).php" class="enlaces2bar">Opiniones</a></td>
                                <td><a href="#" class="enlaces2bar">Informacion</a></td>
                                <td><a href="profile/settings" class="enlaces2bar">Mas</a></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <div class="row">
                <div class="col-sm-4" align="center">
                    <div class="row">
                        <div class="col-sm-12">
                            <img class="photoprofile" src="<?php echo $data->pictureprofile;?>"alt="perfil" width="250px" onclick="showinfoimg(<?php echo $data->pictureprofile;?>)"/>
                            <figcaption><?php echo '@'.$data->nickname;?></figcaption>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="#" class="socialnets"><span class="ri-whatsapp-fill iconwhatsapp"></span></a>
                        </div>
                        <div class="col-sm-3">
                            <a href="#" class="socialnets"><span class="ri-facebook-box-fill iconfacebook"></span></a>
                        </div>
                        <div class="col-sm-3">
                            <a href="#" class="socialnets"><span class="ri-github-fill icongithub"></span></a>
                        </div>
                        <div class="col-sm-3">
                            <a href="#" class="socialnets"><span class="ri-message-fill"></span></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="" id="formtopost" method="post">
                                <span class="info">Title</span><br>
                                <input type="text" name="titlepost" placeholder=""><br>
                                <input type="hidden" name="userid" value="<?php echo $_SESSION['id'];?>"><br>
                                <span class="info">Think it and Write it</span><br>
                                <textarea name="contentpost" id="" cols="27" rows="10"></textarea><br>
                                <input type="submit" value="Publicar    ">
                                <button>Adjuntar Archivos</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8" align="center">
                    <div class="row" style="" align="">
                        <div class="col-sm-12" align="">
                            <form id="formweb" action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" on>
                            <div class="row">
                                <div class="col-sm-12">
                                    <span>Website name</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input class="inputtext" type="text" name="name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <p>Url</p>
                                    <p id="infoweb" class="info"></p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-10">
                                    <span class="enlacesconcolor">https://www.</span>
                                    <input  class="inputtext" type="text" name="url" id="url" focus="false">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <p>Imagen(opcional)</p>
                                            <input class="inputtext" type="text" name="image">
                                            <input class="inputtext" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>