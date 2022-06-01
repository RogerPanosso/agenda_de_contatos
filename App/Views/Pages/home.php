<!-- view home(Principal) -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 my-5">
			<div class="page-header">
				<h3>Meus Contatos <small><a href="#" data-toggle="modal" data-target="#meusContatos">[?]</a></small></h3>
			</div>
			<hr>
			<div id="result_del" class="my-1">
				<!-- html result -->
			</div>
			<div class="card mb-3">
				<div class="card-header d-flex justify-content-between">
					<span class="align-self-center"><i class="fas fa-users"></i> Meus Contatos Cadastrados</span>
					<div class="btn-group">
						<a class="btn btn-primary" title="Gerar Relatório" href="<?=BASE_URL;?>relatorio">Gerar Relatório</a>
					</div>
				</div>
				<div class="card-body">
					<?php if(!empty($contatos)): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-hover" id="dataTable">
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
									<th>Ações</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($contatos as $contato): ?>
								<?php
									//formatação com str_replace() em string de(celular) para acessar whatsapp web(api)
									$substitui = array("(", ")", " ", "-");
									$por = array("", "", "", "");
									$fone_whatsapp = str_replace($substitui, $por, $contato["celular"]);
									$mensagem_whatsapp = "Olá ".$contato["nome"]."...";
								?>
								<tr>
									<td><?=$contato["id"];?></td>
									<td><?=$contato["nome"];?></td>
									<td><?=$contato["sobrenome"];?></td>
									<td><?=$contato["email"];?></td>
									<td><?=$contato["telefone"];?></td>
									<td><?=$contato["celular"];?></td>
									<td><?=$contato["estado"];?></td>
									<td><?=$contato["cidade"];?></td>
									<td>
										<a class="btn btn-success" title="Editar Contato" href="<?=BASE_URL;?>home/editarContato/<?=$contato["id"];?>"><i class="fas fa-edit"></i></a>
										<a class="btn btn-danger excluir" title="Excluir Contato" href="#" data-id="<?=$contato["id"];?>"><i class="fas fa-trash"></i></a>
										<a class="btn btn-dark" title="Whatsapp Mensagem" target="_blank" href="https://api.whatsapp.com/send?phone=55<?=$fone_whatsapp;?>&text=<?=$mensagem_whatsapp;?>"><i class="fab fa-whatsapp"></i></a>
									<?php if($contato["email"] != NULL): ?>
										<a class="btn btn-primary" title="Enviar E-Mail" href="<?=BASE_URL;?>home/envioEmail/<?=$contato["id"];?>"><i class="fas fa-paper-plane"></i></a>
									<?php endif; ?>
									</td>
								</tr>

								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Nome</th>
									<th>Sobrenome</th>
									<th>E-Mail</th>
									<th>Telefone</th>
									<th>Celular</th>
									<th>Estado</th>
									<th>Cidade</th>
									<th>Ações</th>
								</tr>
							</tfoot>
						</table>
					</div>

					<?php else: ?>
					
					<div class="alert alert-warning my-0 shadow-sm" role="alert">
						<h6 class="alert-heading m-1">Não foram econtrados nenhum registro de contatos</h6>
					</div>

					<?php endif; ?>
				</div>
				<div class="card-footer">
					<span>Data Atual: <?=$data_atual;?></span>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal info -->
<div class="modal fade" id="meusContatos" tabindex="-1" role="dialog" aria-labelledby="MyModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" id="heading">
				<h5 class="modal-title" aria-labelledby="heading">Sobre</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-info my-0" role="alert">
					user está funcionalidade foi desenvolvida para que você possa obter acessos aos seus principais contatos cadastrados diante sua agenda bem como realizando possíveis manipulações em determinados cadastros.
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>