<!DOCTYPE html>
<html>
<head>
<meta characters="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<title>Interoperabilidade de Aplicações</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href="css/foundation.css" rel="stylesheet" media="screen">
<style>
body {padding-left:20px;padding-top:20px;}
table {width: 100%;}
</style>
</head>
<body>
<?php
$semestre = simplexml_load_file('data.xml');
if(isset($_POST['submitSave'])) {
if (strip_tags($_POST['codigo']) != "" && strip_tags($_POST['creditos']) != "")
{
$disciplina = $semestre->addChild('disciplina');
$disciplina->addAttribute('id', strip_tags($_POST['id']));
$disciplina->addChild('codigo', strip_tags($_POST['codigo']));
$disciplina->addChild('creditos', strip_tags($_POST['creditos']));
$disciplina->addChild('professor', strip_tags($_POST['professor']));
$disciplina->addChild('sala', strip_tags($_POST['sala']));
$disciplina->addChild('requisito', strip_tags($_POST['requisito']));
$disciplina->addChild('descricao', strip_tags($_POST['descricao']));
file_put_contents('data.xml', $semestre->asXML());
header('location: index.php');
}else {?>
<script>alert("Não é possível preencher um campo vazio");</script>
<?php
}
}
?>
<div class="row">
	
	<div class="column">
		<div class="large-12 columns">
			<form method="post">
				<table cellpadding="2" cellspacing="2">
					<tr>
						<td>Disciplina</td>
						<td><input type="text" name="id"></td>
					</tr>
					<tr>
						<td>Código</td>
						<td><input type="text" name="codigo"></td>
					</tr>
					<tr>
						<td>Créditos</td>
						<td><input type="text" name="creditos"></td>
					</tr>
					<tr>
						<td>Professor</td>
						<td><input type="text" name="professor"></td>
					</tr>
					<tr>
						<td>Sala</td>
						<td><input type="text" name="sala"></td>
					</tr>
					<tr>
						<td>Requisito</td>
						<td><input type="text" name="requisito"></td>
					</tr>
					<tr>
						<td>Descrição</td>
						<td><input type="text" name="descricao"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input class="primary button" type="submit" name="submitSave" value="Salvar"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<body>
</html>
