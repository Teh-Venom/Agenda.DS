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
			include "conexao.php";
			
			$id = $_GET['idEdicao'];
			
			$sql = "SELECT * FROM agenda_tb WHERE idAgenda = $id";
			$contatos = $conex -> prepare($sql);
			$contatos -> execute();


			foreach($contatos as $bolacha)
			{
				$id = $bolacha['idAgenda'];
				$nome = $bolacha['nome'];
				$celular = $bolacha['celular'];
				$grupo = $bolacha['grupo'];
				$operadora = $bolacha['operadora'];
				$email = $bolacha['email'];
				$fixo = $bolacha['fixo'];
				$data_nascimento = $bolacha['dataNascimento'];
				$sexo = $bolacha['sexo'];
				$endereco = $bolacha['endereco'];
				$obs = $bolacha['obs'];
			}
			
			if(isset($_POST["salvar"]))
				{
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
					$sql = "UPDATE `agenda_tb` SET 
					`nome`= ?,
					`celular`= ?,
					`grupo`= ?,
					`operadora`= ?,
					`email`= ?,
					`fixo`= ?,
					`dataNascimento`= ?,
					`sexo`= ?,
					`endereco`= ?,
					`obs`= ? 
					WHERE `idAgenda`= ?
							";
					$contatos = $conex -> prepare($sql);
					$contatos -> execute(array($nome, $celular, $grupo, $operadora, $email, $fixo, $data_nascimento, $sexo, $endereco, $obs, $id));
					$contatos = NULL;
					header("Location: listar.php");
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
						Dados para Edição:
					</legend>
					
					<p>
						Nome:<br>
						<input type="text" value="<?php echo $nome; ?>" name="nome" autofocus>
					</p>
					
					<hr>
					
					<p>
						Celular:<br>
						<input type="text" value="<?php echo $celular; ?>" name="celular">
					</p>
					
					<hr>
					
					<p>
						Grupo:<br>
						<input type="text" value="<?php echo $grupo; ?>"  name="grupo">
					</p>
					
					<hr>
					
					<p>
						Operadora:<br>
						<input type="text" value="<?php echo $operadora; ?>" name="operadora">
					</p>
					
					<hr>
					
					<p>
						E-mail:<br>
						<input type="text" value="<?php echo $email; ?>" name="email">
					</p>
					
					<hr>
					
					<p>
						Fixo:<br>
						<input type="text" value="<?php echo $fixo; ?>" name="fixo">
					</p>
					
					<hr>
					
					<p>
						Data de Nascimento:<br>
						<input type="date" value="<?php echo $data_nascimento; ?>" name="data_nascimento">
					</p>
					
					<hr>
					
					<p>
						Sexo:<br>
						<input type="radio" value="m" <?php if ($sexo == "m") echo "checked";?> name="sexo">M
						<input type="radio" value="f" <?php if ($sexo == "f") echo "checked";?> name="sexo">F
					</p>
					
					<hr>
					
					<p>
						Endereço:<br>
						<input type="text" value="<?php echo $endereco; ?>" name="endereco">
					</p>
					
					<hr>
					
					<p>
						Obs:<br>
						<input type="text" value="<?php echo $obs; ?>" name="obs">
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