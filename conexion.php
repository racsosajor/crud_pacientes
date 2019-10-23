<?php
	$servidor='localhost';
	$database="crud";
	$user='postgres';
	$password='pgadmin';	
	
	$con=new PDO('pgsql:host='.$servidor.';dbname='.$database,$user,$password);
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>