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
			<a href="listar.php">
				<input class="botaoTop" type="button" value="Listar Contatos" name="index" align="center">
			</a>
			
			<form action="" method="POST">
				<fieldset>
					<legend>
						Dados do Cadastro:
					</legend>
					
					<p>
						Nome:<br>
						<input type="text" name="nome" autofocus>
					</p>
					
					<hr>
					
					<p>
						Celular:<br>
						<input type="text" name="celular">
					</p>
					
					<hr>
					
					<p>
						Grupo:<br>
						<input type="text" name="grupo">
					</p>
					
					<hr>
					
					<p>
						Operadora:<br>
						<input type="text" name="operadora">
					</p>
					
					<hr>
					
					<p>
						E-mail:<br>
						<input type="text" name="email">
					</p>
					
					<hr>
					
					<p>
						Fixo:<br>
						<input type="text" name="fixo">
					</p>
					
					<hr>
					
					<p>
						Data de Nascimento:<br>
						<input type="date" name="data_nascimento">
					</p>
					
					<hr>
					
					<p>
						Sexo:<br>
						<input type="radio" value="m" name="sexo">M
						<input type="radio" value="f" name="sexo">F
					</p>
					
					<hr>
					
					<p>
						Endereço:<br>
						<input type="text" name="endereco">
					</p>
					
					<hr>
					
					<p>
						Obs:<br>
						<input type="text" name="obs">
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