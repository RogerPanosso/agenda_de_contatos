<!-- view(novocontato) -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 my-5">
			<div class="page-header">
				<h3>Cadastrar Novo Contato <small style="font-size: 14px!important;"><a href="#" data-toggle="modal" data-target="#novoContato">[?]</a></small></h3>
			</div>
			<hr>
			<div class="card mb-3">
				<div class="card-header">
					<span><i class="fab fa-wpforms"></i> Formulário de cadastro de novo contato</span>
				</div>
				<div class="card-body">
					<div id="result_novo" class="my-1">
						<!-- html result -->
					</div>
					<form id="form_novo" name="form_novo" enctype="multipart/form-data" method="POST">
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nome" class="form-label">Nome</label>
									<input type="text" name="nome" class="form-control" autofocus="on" autocomplete="off" placeholder="Nome" id="nome"/>
									<small class="text-muted">*Obrigatório</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="sobrenome" class="form-label">Sobrenome</label>
									<input type="text" name="sobrenome" class="form-control" autocomplete="off" placeholder="Sobrenome" id="sobrenome"/>
									<small class="text-muted">*Obrigatório</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email" class="form-label">E-Mail</label> 
									<input type="email" name="email" class="form-control" autocomplete="off" placeholder="exemplo@hotmail.com" id="email"/>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="telefone" class="form-label">Telefone</label>
									<input type="text" name="telefone" class="form-control" autocomplete="off" placeholder="Telefone" id="telefone"/>
									<small class="text-muted">*Obrigatório</small>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="celular" class="form-label">Celular</label>
									<input type="text" name="celular" class="form-control" autocomplete="off" placeholder="Celular" id="celular"/>
									<small class="text-muted">*Obrigatório</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="id_estado" class="form-label">Estado(UF)</label>
									<select name="id_estado" class="form-control" onautocomplete id="id_estado" onchange="getIdEstado(this)">
										<option value="" selected="selected">SELECIONE</option>
										<?php foreach($estados as $estado): ?>
										<option value="<?=$estado["id"];?>"><?=$estado["estado"];?></option>
										<?php endforeach; ?>
									</select>
									<small class="text-muted">*Obrigatório</small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="cidades" class="form-label">Cidade</label>
									<select name="cidades" class="form-control" onautocomplete id="cidades">
										<option value="" selected="selected">SELECIONE</option>
										<!-- options dinâmicos -->
									</select>
									<small class="text-muted">*Obrigatório</small>
								</div>
							</div>
						</div>
						<button type="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
						<button type="button" class="btn btn-danger" id="cancelar" onclick="resetForm()">Cancelar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal info -->
<div class="modal fade" id="novoContato" tabindex="-1" role="dialog" aria-labelledby="MyModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" id="heading">
				<h5 class="modal-title" aria-labelledby="heading">Sobre</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-info my-0" role="alert">
					user está funcionalidade foi desenvolvida para que você possa realizar um novo cadastro específico de contato. Para isso preencha os devidos campos necessários perante o formulário de cadastro.
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>