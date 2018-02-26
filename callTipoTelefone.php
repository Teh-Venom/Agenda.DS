<?php
	include "conexao.php";
	$sql = "SELECT * FROM listatipotelefone ORDER BY nome";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute();
	
	foreach($contatos as $bolacha)
	{
			$idTipoTelefone = $bolacha['idListaTipoTelefone'];
			$nomeTipoTelefone = $bolacha['nome'];
			echo "<option value='$idTipoTelefone'>$nomeTipoTelefone</option>";
	}
	$contatos = NULL;
?>