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
</style>
</head>
<body>
<?php
$semestre = simplexml_load_file('data.xml') or die("xml not loading");

if(isset($_POST['submitSave'])) {
	foreach ($semestre->disciplina as $disciplina) {
		if($disciplina['id'] == $_POST['id']){
		$disciplina['id'] =  strip_tags($_POST['id']);
		$disciplina->codigo = strip_tags($_POST['codigo']);
		$disciplina->creditos = strip_tags($_POST['creditos']);
		$disciplina->professor = strip_tags($_POST['professor']);
		$disciplina->sala = strip_tags($_POST['sala']);
		$disciplina->requisito = strip_tags($_POST['requisito']);
		$disciplina->descricao = strip_tags($_POST['descricao']);
		break;
}
}
file_put_contents('data.xml', $semestre->asXML());
header('location: index.php');
}

foreach ($semestre->disciplina as $disciplina) {
		if($disciplina['id'] == $_GET['id']) {
		$id =  $disciplina['id'];
         	$codigo = $disciplina->codigo;
		$creditos = $disciplina->creditos;
		$professor = $disciplina->professor;
		$sala = $disciplina->sala;
		$requisito = $disciplina->requisito;
		$descricao = $disciplina->descricao;
       } 
    }

?>
<form method="post" onsubmit="SpecialChars();">

	<table cellpadding="2" cellspacing="2">

		<tr>
			<td>Disciplina</td>
			<td><input type="text" name="id" value="<?php echo $id; ?>"readonly></td>
		</tr>
	
		<tr>
			<td>Código</td>
			<td><input type="text" name="codigo" value="<?php echo $codigo; ?>"></td>
		</tr>

		<tr>
			<td>Créditos</td>
			<td><input type="text" name="creditos" value="<?php echo $creditos; ?>"></td>
		</tr>

		<tr>
			<td>Professor</td>
			<td><input type="text" name="professor" value="<?php echo $professor; ?>"></td>
		</tr>

		<tr>
			<td>Sala</td>
			<td><input type="text" name="sala" value="<?php echo $sala; ?>"></td>
		</tr>

		<tr>
			<td>Requisito</td>
			<td><input type="text" name="requisito" value="<?php echo $requisito; ?>"></td>
		</tr>

		<tr>
			<td>Descrição</td>
			<td><input type="text" name="descricao" value="<?php echo $descricao; ?>"></td>
		</tr>

		<tr>
		<td>&nbsp;</td>
		<td><input type="submit"  name="submitSave"></td>
		</tr>

	</table>

</form>
</body>
</html>
