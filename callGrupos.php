<?php
	include "conexao.php";
	$sql = "SELECT * FROM listaGrupo ORDER BY nome";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute();
	
	foreach($contatos as $bolacha)
	{
			$idEstado = $bolacha['idListaGrupo'];
			$nomeGrupo = $bolacha['nome'];
			echo "<option value='$idListaGrupo'>$nomeGrupo</option>";
	}
	$contatos = NULL;
?>