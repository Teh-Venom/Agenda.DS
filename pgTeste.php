<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
						Estado:<br>
						<select name="estado">
							<option value="-"></option>
							<?php
								include "callEstados.php";
							?>							
						</select>
						
					</p>
					<hr>
					
					<p>
						<?php
							if(isset($_POST["enviarEstado"])){
								$estadoEscolhido = $_POST['estado'];
								echo 'Cidades:<br>';
								echo '<select name="cidade">';
								echo '<option value="-"></option>';
								
														
								include "conexao.php";
								$sql = "SELECT * FROM cidade WHERE idEstado = ? ORDER BY nome";
								$contatos = $conex -> prepare($sql);
								$contatos -> execute(array($estadoEscolhido));
								$contatos -> execute();
								
								foreach($contatos as $bolacha)
								{
										$id = $bolacha['idCidade'];
										$nome = $bolacha['nome'];
										echo "<option value='$id' charset='UTF-8'>$nome - $estadoEscolhido</option>";
								}
							
								
								
								echo '</select>';
							} else {
								echo '
								<p>
									<input type="submit" value="enviarEstado" name="enviarEstado">
								</p>';
							}
						?>
											
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