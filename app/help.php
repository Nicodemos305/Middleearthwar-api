<?php
$path = "services/";
$diretorio = dir($path);
 
echo "List of Services '<strong>$path</strong>':<br />";
while($arquivo = $diretorio -> read()){
	if($arquivo != "." && $arquivo != ".."){
		echo "<a href='$path$arquivo'>$arquivo</a><br />";
	}

}
$diretorio -> close();


?>