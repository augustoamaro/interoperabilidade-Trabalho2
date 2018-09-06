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
table{width:100%;}
</style>
</head>
<body>
<?php
    $semestre = simplexml_load_file("data.xml") or die("XML não carregado");
if(isset($_GET['action'])) {

    $id = $_GET['id'];
    $index = 0;
    $i = 0;
     
    foreach($semestre->disciplina as $disciplina) {
        if ($disciplina['id'] == $id) {
            $index = $i;
            break;
        }
        $i++;
    }
    unset($semestre->disciplina[$index]);
    file_put_contents('data.xml', $semestre->asXML());
    }
?>
<div class="row">
	
	<div class="column">
<div class="large-12 columns">
<table class="table table-hover table-bordered table-sieve" celppadding="2" cellspacing="2" border="1">
<thead>
        <tr>
	    <th>Disciplina</th>
            <th>Código</th>
            <th>Créditos</th>
            <th>Professor</th>
            <th>Sala</th>
            <th>Requisito</th>
            <th>Descricão</th>
	    <th>&nbsp;</th>
        </tr>
</thead>
<tbody>
<?php

foreach($semestre->disciplina as $disciplina) { ?>
<tr>
<td> <?php echo $disciplina['id']; ?> </td>
<td> <?php echo $disciplina->codigo; ?> </td>
<td><?php echo $disciplina->creditos; ?></td>
<td><?php echo $disciplina->professor; ?></td>
<td><?php echo $disciplina->sala; ?></td>
<td><?php echo $disciplina->requisito; ?></td>
<td><?php echo $disciplina->descricao; ?></td>
<td align="center"><a class="small button" href="edit.php?id=<?php echo $disciplina['id']; ?>"><i class="fa fa-pencil fa-fw"></i>&nbsp; Editar</a> <a class="small button secondary" href="index.php?action=delete&id=<?php echo $disciplina['id']; ?>" onclick="return confirm('Você tem certeza?')"> <i class="fa fa-trash-o fa-lg"></i> Deletar</a></td>
</tr>
<?php } ?>
</tbody>
</table>
				
		<div class="show-for-medium">
		<a class="primary button" href="add.php"><i class="fa fa-plus"></i> Adicionar disciplina</a>
		</div>
		
		<div class="show-for-small-only">
			<a class="small button"><i class="fa fa-plus"></i>Add</a>
			
		</div>
</div>
</div>
</div>
</body>
  <!-- JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/jquery-1.9.1.min.js"><\/script>')</script>
    <script src="js/jquery.sieve.js"></script>
  <script>
$(document).ready(function() {
    var searchTemplate = "<div class='row form-inline'><label style='float: right;'>Pesquisar <input type='text' class='form-control' placeholder='Pesquisar'></label></div>"
    $(".table-sieve").sieve({ searchTemplate: searchTemplate });
}); 
  </script>

</html>
