<!-- view(htmlrelatorio) -->
<title>Relatório de Contatos.</title>
<h3>Relatório de Contatos.</h3>
<span>Total de contatos: <?=count($contatos);?></span>
<hr>
<table border="1" width="100%" cellpadding="3" cellspacing="3">
	<thead>
		<tr>
			<th>Id</th>
			<th>Nome</th>
			<th>Sobrenome</th>
			<th>E-Mail</th>
			<th>Telefone</th>
			<th>Celular</th>
			<th>Estado</th>
			<th>Cidade</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($contatos as $contato): ?>
		<tr>
			<td><?=$contato["id"];?></td>
			<td><?=$contato["nome"];?></td>
			<td><?=$contato["sobrenome"];?></td>
			<td><?=$contato["email"];?></td>
			<td><?=$contato["telefone"];?></td>
			<td><?=$contato["celular"];?></td>
			<td><?=$contato["estado"];?></td>
			<td><?=$contato["cidade"];?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>