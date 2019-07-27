<?php
$path = "services/";
$diretorio = dir($path);
 
print "List of Services '<strong>$path</strong>':<br />";
while($arquivo = $diretorio -> read()){
	if($arquivo != "." && $arquivo != ".."){
		print "<a href='$path$arquivo'>$arquivo</a><br />";
	}

}
$diretorio -> close();


?>