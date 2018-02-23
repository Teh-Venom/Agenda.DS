<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<style>
			th{
				padding-left: 3px;
				padding-right: 4px;
			}
		</style>
	</head>
	<body>
		<div>
			<hr>
			<h2><center>Projeto Agenda - Listar - Gabriel Braz</center></h2>
			<hr>
		</div>
		<div>
				<form action="" method="POST">
					<center>
						<a href="index.php">
							<input type="button" value="Cadastrar Novo Contato" name="index" align="center">
						</a>
					</center>
					
					<fieldset>
						<legend>
							Dados do Cadastro:
						</legend>
						
						<table border="1" style ="margin : 0 auto">
							<th>Nome</th>
							<th>Grupo</th>
							<th>Sexo</th>	
							<th>Data de Nascimento</th>
							<th>Numero de Celular</th>
							<th>Operadora</th>
							<th>Telefone Fixo</th>
							<th>Endereco</th>
							<th>E-mail</th>
							<th>Observação</th>
							<th colspan="2">Opções</th>
							
							<?php
								include "conexao.php";
								$sql = "SELECT * FROM agenda_tb ORDER BY nome";
								$contatos = $conex -> prepare($sql);
								$contatos -> execute();
								foreach($contatos as $bolacha)
								{
										$id = $bolacha['idAgenda'];
										$nome = $bolacha['nome'];
										$grupo = $bolacha['grupo'];
										$sexo = $bolacha['sexo'];
										$nascimento = $bolacha['dataNascimento'];
										$celular = $bolacha['celular'];
										
										$operadora = $bolacha['operadora'];
										$fixo = $bolacha['fixo'];
										$endereco = $bolacha['endereco'];
										$email = $bolacha['email'];
										$obs = $bolacha['obs'];
																	
										
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
										
										echo "<th align='center'>".$data_nascimento."</th>";
										
										echo "<th>".$celular."</th>";
										
										echo "<th>".$operadora."</th>";
										echo "<th>".$fixo."</th>";
										echo "<th>".$endereco."</th>";
										echo "<th>".$email."</th>";
										echo "<th>".$obs."</th>";

										echo "<th>
												<a href='excluir.php?idExclusao=$id&nomeExclusao=$nome'>
													<img src='imagens/Lixo01.png' width='20px'>
												</a>
											  </th>";
											  
										echo "<th>
												<a href='editar.php?idEdicao=$id'>
													<img src='imagens/Editar01.png' width='20px'>
												</a>
											  </th>";
										
										echo "</tr>";
								}
							?>
						
						</table>
					</fieldset>
				</form>
		</div>
	</body>
</html>