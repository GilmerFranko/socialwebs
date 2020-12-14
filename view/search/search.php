<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="/favicon.ico" type="image/ico">
	<link rel="stylesheet" href="/view/css/reglasgenerales.css">
	<link rel="stylesheet" href="/view/css/tablestyles.css">
	<link rel="stylesheet" href="/src/fonts/remixicon.css">
	<link rel="stylesheet" href="/view/css/csspageprofile.css">
	<link rel="stylesheet" href="/src/bootstrap4/css/bootstrap.min.css">
	<script src="/view/script/jquery-3.4.1.min.js"></script>
	<script src="/view/script/getsetreactions.js"></script>
	<title><?php echo $_GET['search'] ?></title>
	<style>
		
	</style>
	<script>
		var pagina=1;
		var found=false;
		var seacabo=false;
		$(document).ready(function() {
			cargardatos();	
		});
		function getParameterByName(name){//captura un _get segun su parametro
			name=name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
			var regex=new RegExp("[\\?&]" + name + "=([^&#]*)");
			results = regex.exec(location.search);
			return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
		}
		function cargardatos(){
			search=$("title").html();
			var formdate={search:search};
  			$.get("/model/search/getsetsearch.php?urlpage="+pagina,formdate,
   				function(data){
   					if (data!="none" & data!="nonenone"){
	    				if (data != "" & data !="end") {
	     					$(".beforeafter:last").before(data);
	     					found=true;
	    				}
    				}else if(data == "nonenone" & seacabo==false & found==true) {//si mostro contenido pero ya no hay mas entonces...
	    				$(".beforeafter:last").before("<span class='info'>Vaya... Ya no hay que mostrar!</span");
	    					seacabo=true;
    				}else if(data=="none" & found==false & seacabo==false || data=="nonenone" & found==false & seacabo==false){//si en ningun momento encontro contenido entonces...
	     				$(".beforeafter:last").before("<span class='info'>Without Results</span");
    				}
   				});				
		}
		$(window).scroll(function(){
			if ($(window).scrollTop() == $(document).height() - $(window).height()){
				pagina++;
				cargardatos();
			}					
		});
		function showinfoimg($urlimg){
			 $(function(){
		            var formData = new FormData($("#uploadimage")[0]);
		            var ruta = "imagen-ajax.php";
		            $.ajax({
		                url: ruta,
		                type: "POST",
		                data: formData,
		                contentType: false,
		                processData: false,
		                success: function(datos)
		                {
                    $("#respuesta").html(datos);
                }
            });
		       	});
			}

		
</script>
</head>
<body>
    <?php
    session_start();
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])){
        header("location: /view/login.php");
    }
    /*if (!empty($_GET['user'])){
    	header("location: /view/login.php");
    }*/
	include_once($_SERVER['DOCUMENT_ROOT']."/view/barnav.php");#incluir barnav
	include_once($_SERVER['DOCUMENT_ROOT']."/model/dateprofile.php");#incluir dateprofile
	$data=new dateprofile();
	$data->getdateprofile($_SESSION['id']); #enviarle como parametros el id del usuario
	?>
	<section class="section" align="">
		<div class="container">
			<table cellspacing="3" class="containprofile" width="100%" border="0">
				<tr>
					<td>
						<table cellspacing="3" class="bar2" width="100%">
							<tr>
								<td><a href="/profile" class="enlaces2bar">Perfil</a></td>
								<td><input type="text" placeholder="Buscar en @<?php echo $data->nickname; ?>"></td>
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
						<div class="col-sm-4">
							<a href="#" class="socialnets"><span class="ri-whatsapp-fill iconwhatsapp"></span></a>
						</div>
						<div class="col-sm-4">
							<a href="#" class="socialnets"><span class="ri-facebook-box-fill iconfacebook"></span></a>
						</div>
						<div class="col-sm-4">
							<a href="#" class="socialnets"><span class="ri-github-fill icongithub"></span></a>
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
								<input type="submit" value="Publicar	">
								<button>Adjuntar Archivos</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-8" align="center">
					<div class="row" style="" align="">
						<div class="col-sm-12" align="">
								<span class="beforeafter"></span>
						</div>
				</div>
				</div>
			</div>
		</div>
	</section>
</body>
</html>