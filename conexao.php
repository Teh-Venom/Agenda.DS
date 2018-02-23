<?php
	try
	{
		$conex = new PDO("mysql:host=localhost;dbname=agenda_bd","root","");
	}
	catch(PDOexception $e)
	{
		echo $e->getMessage();
	}
?>