<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<title>Minha Agenda</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="stylesheet.css" />
		<?php
			$nome_entidade = $_GET["nomeExpansao"];
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
		<center>
			<div>
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
						
						<?php
							include "conexao.php";
							$id_expansao = $_GET['idExpansao'];
							$id_edicao = $_GET['nomeExpansao'];
	
							$sql = "SELECT idEntidade, listagrupo.nome as nomeGrupo, primeiroNome, sobreNome, ultimoNome, sexo, dataNascimento, apelido, website, Obs FROM entidade 
INNER JOIN listagrupo ON listagrupo.idListaGrupo = entidade.IdListaGrupo_Entidade
WHERE idEntidade = ?";
							$contatos = $conex -> prepare($sql);
							$contatos -> execute(array($id_expansao));
							
						
							foreach($contatos as $bolacha)
							{
									$id = $bolacha['idEntidade'];
									$primeiroNome = $bolacha['primeiroNome'];
									$sobreNome = $bolacha['sobreNome'];
									$ultimoNome = $bolacha['ultimoNome'];
									$sexo = $bolacha['sexo'];
									$dataNascimento = $bolacha['dataNascimento'];
									$apelido = $bolacha['apelido'];
									$website = $bolacha['website'];
									$Obs = $bolacha['Obs'];
									$grupo = $bolacha['nomeGrupo'];
																
									
									if($dataNascimento == "0000-00-00")
									{
											$dataNascimento = "-";
									} else
									{
										$data_nascimento =  date("d/m/Y",strtotime($bolacha['dataNascimento']));
									}
									
									
									echo "<tr>";
									echo "<th>".$primeiroNome."</th>";
									echo "<th>".$sobreNome." ".$ultimoNome."</th>";
									
									echo "<th>".$grupo."</th>";
									
									echo "<th align='center'>".$sexo."</th>";
									
									echo "<th align='center'>".$dataNascimento."</th>";
									
									echo "<th>".$apelido."</th>";
									
									echo "<th>".$website."</th>";
									echo "<th>".$Obs."</th>";	
									echo "</tr>";									
							}
							$contatos = NULL;
						?>
					
					</table>
				</fieldset>
				
				<fieldset>
					<legend>
						Telefones de '<?php echo $nome_entidade; ?>':
					</legend>
					
					<table border="1" style ="margin : 0 auto">
						<th>Primeiro Nome</th>
						<th>Sobre Nome</th>
						<th>Sexo</th>	
						<th>Data de Nascimento</th>
						<th>Apelido</th>
						<th>Website</th>
						<th>Obs</th>
						
						
					
					</table>
				</fieldset>
				
				<fieldset>
					<legend>
						E-mails de '<?php echo $nome_entidade; ?>':
					</legend>
					
					<table border="1" style ="margin : 0 auto">
						<th>Primeiro Nome</th>
						<th>Sobre Nome</th>
						<th>Sexo</th>	
						<th>Data de Nascimento</th>
						<th>Apelido</th>
						<th>Website</th>
						<th>Obs</th>
						
						
					
					</table>
				</fieldset>
				
				<fieldset>
					<legend>
						Endereços de '<?php echo $nome_entidade; ?>':
					</legend>
					
					<table border="1" style ="margin : 0 auto">
						<th>Primeiro Nome</th>
						<th>Sobre Nome</th>
						<th>Sexo</th>	
						<th>Data de Nascimento</th>
						<th>Apelido</th>
						<th>Website</th>
						<th>Obs</th>
						
						
					
					</table>
				</fieldset>
				
			</div>
		</center>
	</body>
</html>