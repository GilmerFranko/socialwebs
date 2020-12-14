<?php 
$file=fopen("archivo.txt", 'w');
$a=0;
for ($i=500001; $i < 1000001; $i++) { 
	$a=$a+1;
	if ($a==4000){
		fwrite($file, '('.$i .", 'calida".$i . "');".PHP_EOL);
		fwrite($file, "INSERT INTO `prueba` (`id`, `name`) VALUES".PHP_EOL);
		$a=0;
	}else{
		fwrite($file, '('.$i .", 'calida".$i . "'),".PHP_EOL);
	}
}
	fclose($file); 
 ?>