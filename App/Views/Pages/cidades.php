<!-- view(cidades) -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 my-5">
			<div class="page-header">
				<h3>Cidades Existentes <small><a href="#" data-toggle="modal" data-target="#cidades">[?]</a></small></h3>
			</div>
			<hr>
			<div class="card mb-3">
				<div class="card-header">
					<span><i class="fas fa-city"></i> Cidades existentes para vinculação a contatos</span>
				</div>
				<div class="card-body">
					<?php if(!empty($cidades)): ?>
					
					<div class="table-responsive">
						<table class="table table-striped table-hover" id="dataTable">
							<thead>
								<tr>
									<th>Id</th>
									<th>Cidade</th>
									<th>Estado(UF)</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($cidades as $cidade): ?>
								<tr>
									<td><?=$cidade["id"];?></td>
									<td><?=$cidade["cidade"];?></td>
									<td><?=$cidade["estado"];?></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Cidade</th>
									<th>Estado(UF)</th>
								</tr>
							</tfoot>
						</table>
					</div>

					<?php else: ?>

					<div class="alert alert-warning my-0 shadow-sm" role="alert">
						<h6 class="alert-heading m-1">Não foram encontrados nenhum registro</h6>
					</div>

					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>