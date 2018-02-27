<?php
	include "conexao.php";

	$sql = "SELECT idTelefone, ddd, numero, listatipotelefone.nome as operadora 
				FROM telefone
				INNER JOIN listatipotelefone ON listatipotelefone.idListaTipoTelefone = telefone.idListaTipoTelefone_Telefone
			WHERE idEntidade_Telefone = ?";
	$contatos = $conex -> prepare($sql);
	$contatos -> execute(array($id_entidade));
	

	foreach($contatos as $bolacha)
	{
			$id_email = $bolacha['idTelefone'];
			$endereco_email = $bolacha['ddd'];
			
			echo "<tr>";
			echo "<th>".$id_email."</th>";
			echo "<th>".$endereco_email."</th>";
			
			echo "<th>
					<a href='listarExpandir.php?idEntidade=$id_entidade&idEmail=$id_email'>
						<img src='imagens/Expandir01.png' width='20px'>
					</a>
				  </th>";
			echo "<th>
					<a href='excluir.php?idEntidade=$id_entidade&idendereco_email=$id_email'>
						<img src='imagens/Lixo01.png' width='20px'>
					</a>
				  </th>";
			
			echo "</tr>";									
	}
	$contatos = NULL;
	?>