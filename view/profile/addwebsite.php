<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/view/css/reglasgenerales.css">
    <link rel="stylesheet" href="/view/css/tablestyles.css">
    <script src="/view/script/jquery-3.4.1.min.js"></script>
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
			$("#email").change(verifyemail);
			var a=$("#cantidad_compra").val();
			var num=0;
		});
		function verifyurl(){
            var addhttps="https://"+$("#url").val();//agrega https:// antes de la url ingresada(evita errores)
            //alert(addhttps);
            var formdate={url:addhttps};
			$.post("/model/profile/sqladdwebsite.php",	formdate, getdateurl);
		}
		function verifyemail(){
			var formdate={Email:$("#email").val()};
			$.get("/model/verifyemail.php",	formdate, getdateemail)
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
            <form action="<?php echo $_SERVER['PHP_SELF'];?>"  method="post">
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