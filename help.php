<?php
$path = "services/";
$diretorio = dir($path);
 
echo "Lista de Arquivos do diretório '<strong>".$path."</strong>':<br />";
while($arquivo = $diretorio -> read()){
	if($arquivo != "." && $arquivo != ".."){
		echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
	}

}
$diretorio -> close();
?>