<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/src/icomoon/style.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="/view/css/reglasgenerales.css">
    <link rel="stylesheet" href="/view/css/tablestyles.css">
    <link href="/src/icomoon/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/src/amaran/dist/css/amaran.min.css">
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
                content:{
                    title:'Aviso',
                    message:'Pagina web agregada exitosamente!',
                    info:$("#url").val(),
                    icon:'icon-warning'
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
    echo "<br><br>";
    if(!empty($_POST['name']) and !empty($_POST['url'])){
        $addwebsite=new addwebsite();
        $addwebsite->setaddwebsite($_SESSION['id']);
    }
    ?>
	<section class="section" align="center">
        <table class="tablecss">
            <form  id="formweb" action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post" on>
            <tr>
                <td><p>Nombre Del Sitio</p></td>
                <td>
                    <input class="inputtext" type="text" name="name">
                </td>
            </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p>Url</p>
                        <p id="infoweb" class="info"></p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="enlacessincolor">https://www.</span>
                    </td>
                    <td>
                        <input  class="inputtext"text" type="text" name="url" id="url" focus="false">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <p>Imagen(opcional)</p>
                        <input class="inputtext" type="text" name="image">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="inputtext" type="submit">
                    </td>
                </tr>

            </form>
        </table>
    </section>
</body>
</html>