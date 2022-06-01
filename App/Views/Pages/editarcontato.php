<!-- view(editarcontato) -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 my-5">
			<div class="page-header">
				<h3>Editar Contato <small style="font-size: 14px!important;"><a href="#" data-toggle="modal" data-target="#editarContato">[?]</a></small></h3>
			</div>
			<hr>
			<div class="card mb-3">
				<div class="card-header">
					<span><i class="fab fa-wpforms"></i> Formulário de edição de cadastro de contato</span>
				</div>
				<div class="card-body">
					<div id="result_save" class="my-1">
						<!-- html result -->
					</div>
					<form id="form_save" name="form_save" enctype="multipart/form-data" method="POST">
						<input type="hidden" name="id" class="form-control" autocomplete="off" readonly="on" value="<?=$contato["id"];?>" id="id"/>
						<div class="form-row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nome" class="form-label">Nome</label>
									<input type="text" name="nome" class="form-control" autocomplete="off" value="<?=$contato["nome"];?>" id="nome"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="sobrenome" class="form-label">Sobrenome</label>
									<input type="text" name="sobrenome" class="form-control" autocomplete="off" value="<?=$contato["sobrenome"];?>" id="sobrenome"/>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="email" class="form-label">E-Mail</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-at"></i></span>
										</div>
										<input type="email" name="email" class="form-control" autocomplete="off" value="<?=$contato["email"];?>" id="email"/>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="telefone" class="form-label">Telefone</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-phone"></i></span>
										</div>
										<input type="text" name="telefone" class="form-control" autocomplete="off" value="<?=$contato["telefone"];?>" id="telefone"/>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="celular" class="form-label">Celular</label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fas fa-mobile"></i></span>
										</div>
										<input type="text" name="celular" class="form-control" autocomplete="off" value="<?=$contato["celular"];?>" id="celular"/>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="id_estado" class="form-label">Estado(UF)</label>
									<select name="id_estado" class="form-control" onautocomplete id="id_estado" onchange="getIdEstado(this)">
										<option value="" selected="selected">SELECIONE</option>
										<?php foreach($estados as $estado): ?>
										<option value="<?=$estado["id"];?>" <?=($estado["id"] == $contato["id_estado"])?"selected='selected'":"";?>><?=$estado["estado"];?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="cidades" class="form-label">Cidades</label>
									<select name="cidades" class="form-control" onautocomplete onselect id="cidades">
										<option value="" selected="selected">SELECIONE</option>
										<!-- options dinâmicos -->
									</select> 
								</div>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success" id="salvar">Salvar Dados</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal info -->
<div class="modal fade" id="editarContato" tabindex="-1" role="dialog" aria-labelledby="MyModal">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" id="heading">
				<h5 class="modal-title" aria-labelledby="heading">Sobre</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="alert alert-info my-0" role="alert">
					user está funcionalidade foi desenvolvida para que você possa realizar possíveis edições diante o cadastro de contato específico.
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>