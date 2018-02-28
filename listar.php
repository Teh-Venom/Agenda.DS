<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Agenda - Listar - Gabriel Braz</center></h2>
			<hr>
		</header>
		
		<nav>
			<center>
				<a href="index.html">
					<input type="button" value="Voltar ao Menu" name="index" align="center">
				</a>
			</center>		
		</nav>
			<div class="listagrupo">
				<form action="" method="POST">
					
					
					<fieldset>
						<legend>
							Dados do Cadastro:
						</legend>
						
						<table border="1" style ="margin : 0 auto">
							<th>Nome</th>
							<th>Grupo</th>
							<th>Sexo</th>	
							<th>Data de Nascimento</th>
							<th>Numero de Telefone</th>
							<th>Endereco</th>
							<th>E-mail</th>
							<th>Observação</th>
							<th colspan="2">Opções</th>
							
							<?php
								include "conexao.php";
								$sql = "SELECT entidade.idEntidade, entidade.primeiroNome, 
											listagrupo.nome, entidade.sexo, 
											entidade.dataNascimento, telefone.numero, 
											endereco.rua, email.endereco, entidade.Obs 
										FROM entidade 
										INNER JOIN listagrupo ON listagrupo.idListaGrupo = entidade.IdListaGrupo_Entidade 
										INNER JOIN telefone ON telefone.idEntidade_Telefone = entidade.idEntidade 
										INNER JOIN endereco ON endereco.idEntidade_Endereco = entidade.idEntidade 
										INNER JOIN email ON email.idEntidade_Email = entidade.idEntidade
										GROUP BY entidade.idEntidade";
								$contatos = $conex -> prepare($sql);
								$contatos -> execute();
								foreach($contatos as $bolacha)
								{
										$id = $bolacha['idEntidade'];
										$nome = $bolacha['primeiroNome'];
										$grupo = $bolacha['nome'];
										$sexo = $bolacha['sexo'];
										$nascimento = $bolacha['dataNascimento'];
										$celular = $bolacha['numero'];
										$endereco = $bolacha['rua'];
										$email = $bolacha['endereco'];
										$obs = $bolacha['Obs'];
																	
										
										if($nascimento == "0000-00-00")
										{
												$nascimento = "-";
										} else
										{
											$data_nascimento =  date("d/m/Y",strtotime($bolacha['dataNascimento']));
										}
										
										
										echo "<tr>";
										echo "<th>".$nome."</th>";
										
										echo "<th>".$grupo."</th>";
										
										echo "<th align='center'>".$sexo."</th>";
										
										echo "<th align='center'>".$nascimento."</th>";
										
										echo "<th>".$celular."</th>";
										
										echo "<th>".$endereco."</th>";
										echo "<th>".$email."</th>";
										echo "<th>".$obs."</th>";
										
										echo "<th>
												<a href='listarExpandir.php?idExpansao=$id&nomeExpansao=$nome'>
													<img src='imagens/Expandir01.png' width='20px'>
												</a>
											  </th>";
										echo "<th>
												<a href='excluir.php?idExclusao=$id&nomeExclusao=$nome'>
													<img src='imagens/Lixo01.png' width='20px'>
												</a>
											  </th>";
										
										echo "</tr>";
								}
								$contatos= NULL;
							?>
						
						</table>
					</fieldset>
				</form>
			</div>
	</body>
</html>