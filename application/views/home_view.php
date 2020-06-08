<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<title><?= $titulo ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
	<h1>hello word</h1>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">unidade</th>
				<th scope="col">valor de venda</th>
				<th scope="col">estoque</th>
				<th scope="col">ação</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($produtos as $produto) : ?>
			<tr>
					<td><?= $produto['id']?></td>
					<td><?= $produto['unidade']?></td>
					<td><?= $produto['valorvenda']?></td>
					<td><?= $produto['qtdeestoque']?></td>
					<td>xxx</td>				
				
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
	</div>
</div>

</body>
</html>