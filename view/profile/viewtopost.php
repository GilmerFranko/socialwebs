<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $data->title?></title>
	<link rel="icon" href="/favicon.ico" type="image/ico">
	<link rel="stylesheet" href="/view/css/reglasgenerales.css">
	<link rel="stylesheet" href="/view/css/tablestyles.css">
	<link rel="stylesheet" href="/src/fonts/remixicon.css">
	<link rel="stylesheet" href="/view/css/csspageprofile.css">
	<style>
		.nombreyperfil {
			font-size: 10px;
		}
		.tablaitem {
			background-color: #FFFFFF;
			text-align: center;
			font-family: Verdana, Geneva, sans-serif;
			font-size: 12px;
			font-style: italic;
			transition: all .4s linear;
			width: 100%;
			overflow: hidden;
		  box-shadow:0px 0px 0px 0px var(--secondcolor);
		}
		.linknameprofile{
		  color:var(--secondcolor);
		}
		.containpost{
			background-color: #FAFAFA;
			border:solid 1px var(--secondcolor);
		}
	</style>
</head>
<body>
	<?php
    session_start();
    if (!isset($_SESSION['id']) || empty($_SESSION['id'])){
        header("location: /view/login.php");
    }
	include_once($_SERVER['DOCUMENT_ROOT']."/view/barnav.php");#incluir barnav
	include_once($_SERVER['DOCUMENT_ROOT']."/model/profile/getdatapost.php");#incluir dateprofile
	include_once($_SERVER['DOCUMENT_ROOT']."/model/dateprofile.php");#incluir dateprofile
	$data=new dataposts();
	$data->getdataposts(2); #enviarle como parametros el id del usuario
	$datauser=new dateprofile();
	$datauser->getdateprofile($_SESSION['id']);
	$datauserpost=new dateprofile();
	$datauserpost->getdateprofile($data->owner);
	
?>
	<section class="section" align="center">
		<table cellspacing="3" class="containprofile" width="100%" border="0" >
			<tr>
				<td>
					<table cellspacing="3" class="bar2" width="100%">
						<tr>
							<td><a href="/profile" class="enlaces2bar">Perfil</a></td>
							<td><input type="text" placeholder="Buscar en este perfil"></td>
							<td><a href="/profile/websites" class="enlaces2bar">Sitios Webs</a></td>
							<td><a href="#" class="enlaces2bar">Opiniones</a></td>
							<td><a href="#" class="enlaces2bar">Informacion</a></td>
							<td><a href="profile/settings" class="enlaces2bar">Mas</a></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table width="100%" align="center" class="containpost">
						<tr>
							<td>
								<span class="info">Publicado el <?php echo $data->date ?></span>
							</td>
						</tr>
						<tr>
        					<td width="25%" height="2">
        						<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tablaitem">
       								<tr class="nombreyperfil">
            							<td height="80%" colspan="2"><a href="#" style="text-decoration: none; font-size: 16px;" class="linknameprofile"><?php echo $datauserpost->nick ?></a></td>
           								 <td width="20%"><a href="#" class="butom, foticonprofile" style="font-size:24px"><img src="<?php echo $datauserpost->pictureprofile;?>"alt="perfil" width="50px"></a></td>
           							</tr>
           						</table>
           					</td>
           				</tr>
						<tr>
							<td>
								<h3><?php echo $data->title?></h3>
							</td>
						</tr>
						<tr>
							<td>
								<img src="/src/img/screenshot.png" width="60%" alt="">
								<?php if(!empty($data->img)){echo "";}?>
							</td>
						</tr>
						<tr>
							<td style="padding: 20px">
								<span class="info">content: </span>
								<br>
								<span style="word-break:break-all;"><?php echo $data->content;?></span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<div class="reactionsbuttons">
						<a href="#"><i class="ri-dislike-fill"></i></a>
						<?php echo $data->likes;?>
						<a href="#"><i class="ri-dislike-line"></i></a>
						<?php echo $data->dislikes;?>
						<a href="#"><i class="ri-chat-1-fill"></i></a>
						<?php echo $data->comments;?>
						<span><i class="ri-eye-fill"></i><?php echo $data->views;?></span>
					</div>
				</td>
				
			</tr>
			<tr>
				<td>
					<span class="info">Comments</span>
					<br>
					<table>
						<tr>
							<td>
								
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</section>
</body>
</html>