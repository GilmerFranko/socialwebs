<!DOCTYPE html>
<html>
<head>
	<title>Sitios Webs</title>
    <link rel="stylesheet" type="text/css" href="/view/css/reglasgenerales.css">
</head>
<body>
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
	 <section class="section">
        <a href="/view/profile/addwebsite.php" class="enlacesconcolor"> Agregar Pagina</a>
        mis paginas agregadas
        paginas que sigo
        sugerencias
        administrar paginas que tengo
	 </form>
		<div></div>
		<div></div>
		<div></div>
		<div></div>

	 </section>

</body>
</html>