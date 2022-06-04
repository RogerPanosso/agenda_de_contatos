<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="Agenda de Contatos"/>
	<meta name="author" content="Roger Panosso"/>
	<meta name="keywords" content="Agenda de Contatos, PHP"/>
	<title>Agenda de Contatos</title>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>Public/Bootstrap4.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>Public/Bootstrap4.6/css/bootstrap-reboot.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>Public/Assets/css/style.css"/>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>Public/Datatables/datatables.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>Public/Datatables/DataTables/css/dataTables.bootstrap4.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>Public/Fontawesome/css/all.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?=BASE_URL;?>Public/Fontawesome/css/fontawesome.min.css"/>
</head>
<body>
	<article>
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand mb-0" href="<?=BASE_URL;?>">
							<img src="<?=BASE_URL;?>Public/Assets/imgs/logo.png" width="42" class="img-fluid" alt="Agenda" title="Agenda"/>
						</a>
					</div>
					<button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu" aria-controls="false">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarMenu">
						<ul class="navbar-nav ml-auto mb-0">
							<li class="nav-item active">
								<a class="nav-link" href="<?=BASE_URL;?>home" title="Home">
									<span class="nav-link-text"><i class="fas fa-home"></i> Home</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?=BASE_URL;?>novocontato" title="Adicionar Novo Contato">
									<span class="nav-link-text"><i class="fas fa-user-plus"></i> Novo Contato</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?=BASE_URL;?>novacidade" title="Adicionar Nova Cidade">
									<span class="nav-link-text"><i class="fas fa-city"></i> Nova Cidade</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?=BASE_URL;?>relatorio" title="Gerar Relatório">
									<span class="nav-link-text"><i class="fas fa-list"></i> Gerar Relatório</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
		<section>
			<!-- renderização de views(html) dinâmicos em estrutura de template -->
			<?=$this->loadViewInTemplate($nomeView, $dados);?>
		</section>
		<footer class="bg-light">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 my-3 text-center">
						<span>Copyright <i class="fas fa-copyright"></i> Todos os direitos reservados</span>
					</div>
				</div>
			</div>
		</footer>
	</article>
	<script type="text/javascript">const base_url = '<?=BASE_URL;?>'</script>
	<script src="<?=BASE_URL;?>Public/jQuery/jquery.min.js"></script>
	<script src="<?=BASE_URL;?>Public/jQuery/jquery.form.min.js"></script>
	<script src="<?=BASE_URL;?>Public/jQuery/jquery.mask.js"></script>
	<script src="<?=BASE_URL;?>Public/Bootstrap4.6/js/bootstrap.bundle.min.js"></script>
	<script src="<?=BASE_URL;?>Public/Assets/js/script.js"></script>
	<script src="<?=BASE_URL;?>Public/Datatables/datatables.min.js"></script>
	<script src="<?=BASE_URL;?>Public/Datatables/DataTables/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?=BASE_URL;?>Public/Fontawesome/js/all.min.js"></script>
	<script src="<?=BASE_URL;?>Public/Fontawesome/js/fontawesome.min.js"></script>
</body>
</html>