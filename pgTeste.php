<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<style>
			div{
				max-width: 250px;
				width: 100%;
			}
			input.botaoTop{
				margin-top:15px;
			}
			form{
				margin-top: 15px;
			}
		</style>
		<?php
				if(isset($_POST["salvar"]))
				{
					$id = "";
					$nome = $_POST["nome"];
					$celular = $_POST["celular"];
					$grupo = $_POST["grupo"];
					$operadora = $_POST["operadora"];
					$email = $_POST["email"];
					$fixo = $_POST["fixo"];
					$data_nascimento = $_POST["data_nascimento"];
					$sexo = $_POST["sexo"];
					$endereco = $_POST["endereco"];
					$obs = $_POST["obs"];
					
					
					include "conexao.php";
					$sql = "INSERT INTO agenda_tb VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($id, $nome, $celular, $grupo, $operadora, $email, $fixo, $data_nascimento, $sexo, $endereco, $obs));
					$contatos = NULL;
				}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Agenda - Gabriel Braz</center></h2>
			<hr>
		</header>
		
		<center>
		<div>

			<form action="" method="POST">
				<fieldset>
					<legend>
						Dados do Cadastro:
					</legend>
					
					
					
					<p>
						Operadora:<br>
						<select name="operadora">
							<option>TESTE</option>
							<option>TESTE</option>
							<option>TESTE</option>
						</select>
					</p>
					
					<hr>
					
					<p>
						<input type="submit" value="salvar" name="salvar">
					</p>
				</fieldset>
			
			<form>
		</div>
		</center>
	</body>
</html>

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