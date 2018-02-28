<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$id = $_GET['idExclusao'];
			$nome = $_GET['nomeExclusao'];
			if(isset($_POST['sim']))
			{
				include "conexao.php";
				$sql = "DELETE FROM agenda_tb WHERE idAgenda = $id";
				$contatos = $conex -> prepare($sql);
				$contatos -> execute();
				$contatos: NULL;
				header("Location: listar.php");
			}
		?>
	</head>
	<body>
		<header>
			<hr>
			<h2><center>Projeto Agenda - Apagar - Gabriel Braz</center></h2>
			<hr>
		</header>
		<div>
			<h2 align="center">Deseja apagar o contato "<?php echo $nome;?>"</h2>
				<span align="center">
					<form action="" method="POST">
						<input type="submit" name="sim" value="Sim">
						<a href="listar.php">
							<input type="button" value="Não" >
						</a>
					</form>
				</span>
		</div>
	</body>
</html>