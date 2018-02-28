<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$nome_entidade = $_GET["nomeExpansao"];
			$id_entidade = $_GET['idExpansao'];
		?>
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
			
				<fieldset>
					<legend>
						Dados de '<?php echo $nome_entidade; ?>':
					</legend>
					
					<table border="1" style ="margin : 0 auto">
						<th>Primeiro Nome</th>
						<th>Sobre Nome</th>
						<th>Grupo</th>
						<th>Sexo</th>	
						<th>Data de Nascimento</th>
						<th>Apelido</th>
						<th>Website</th>
						<th>Obs</th>
						<th colspan="2">Opções</th>
						
						
						<?php
							include "callListarEntidade.php"
						?>
					
					</table>
				</fieldset>
			
				<fieldset>
					<legend>
						Telefones de '<?php echo $nome_entidade; ?>':
					</legend>
					
					<table border="1" style ="margin : 0 auto">
						<th>ID</th>
						<th>DDD</th>
						<th>Numero</th>	
						<th>Operadora</th>
						<th colspan="2">Opções</th>
						<th>
							<a href='addTelefone.php?idEntidade=$id_entidade'>
								<img src='imagens/Add01.png' width='20px'>
							</a>
						</th>
						
						<?php
							include "callListarTelefone.php";
						?>
					
					</table>
				</fieldset>
			
				<fieldset>
					<legend>
						E-mails de '<?php echo $nome_entidade; ?>':
					</legend>
					
					<table border="1" style ="margin : 0 auto">
						<th>ID</th>
						<th>Endereço</th>
						<th colspan="2">Opções</th>
						<th>
							<a href='addEmail.php?idEntidade=$id_entidade'>
								<img src='imagens/Add01.png' width='20px'>
							</a>
						</th>
						<?php
							include "callListarEmail.php";
						?>
					</table>
				</fieldset>
			
				<fieldset>
					<legend>
						Endereços de '<?php echo $nome_entidade; ?>':
					</legend>
					
					<table border="1" style ="margin : 0 auto">
						<th>ID</th>
						<th>Cidade</th>
						<th>Rua</th>	
						<th>Numero</th>
						<th>Complemento</th>
						<th>Bairro</th>
						<th colspan="2">Opções</th>
						<th>
							<a href='addEndereco.php?idEntidade=$id_entidade'>
								<img src='imagens/Add01.png' width='20px'>
							</a>
						</th>
						
						<?php
							include "callListarEndereco.php";
						?>
					
					</table>
				</fieldset>
				
			</div>
	</body>
</html>