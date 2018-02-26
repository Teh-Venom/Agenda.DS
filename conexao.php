<?php
	try
	{
		header('Content-Type: text/html; charset=utf-8');
		$conex = new PDO("mysql:host=localhost;dbname=agenda_db","root","");
		$conex -> query("SET NAMES 'utf8'"); 
	}
	catch(PDOexception $e)
	{
		echo $e->getMessage();
	}
?>