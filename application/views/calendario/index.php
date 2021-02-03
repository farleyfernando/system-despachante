<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/images/ffsofticone.png')?>">

	<?php echo (isset($titulo) ? '<title> SysDES - Sistema de Gestão de Despachantes | '. $titulo.'</title>' :
		'<System></title>') ?>

	<!-- Bootstrap -->
	<link href="<?php echo base_url('public/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
	<!-- Font Awesome -->
	<link href="<?php echo base_url('public/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
	<!-- NProgress -->
	<link href="<?php echo base_url('public/vendors/nprogress/nprogress.css')?>" rel="stylesheet">
	<!-- Custom styling plus plugins -->
	<link href="<?php echo base_url('public/build/css/custom.min.css')?>" rel="stylesheet">

	<!-- full caledario -->
	<link href="<?php echo base_url('public/vendors/fullcalendario/lib/main.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('public/vendors/fullcalendario/lib/css/calendario.css')?>" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="<?php echo base_url('public/vendors/fullcalendario/lib/main.js')?>"></script>
	<script src="<?php echo base_url('public/vendors/fullcalendario/lib/locales-all.js')?>"></script>
	<script src="<?php echo base_url('public/vendors/fullcalendario/lib/js/calendario.js')?>"></script>

</head>

<body class="nav-md">
<div class="container body">
	<div class="main_container">
		<div class="col-md-3 left_col">
			<div class="left_col scroll-view">
				<div class="navbar nav_title" style="border: 0;">
					<a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
				</div>

				<div class="clearfix"></div>

				<?php $this->load->view('layout/sidebar')?>
				<!-- /top navigation -->

				<!-- page content -->
				<div class="right_col" role="main">
					<div class="">

						<!-- ============================================================== -->
						<!--                    MENSAGENS AO USUARIO                        -->
						<!-- ============================================================== -->

						<?php if($message = $this->session->flashdata('sucesso')) : ?>
							<div class="row">
								<div class="col-md-12">
									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong><i class="fa fa-thumbs-up"></i>&nbsp;&nbsp;<?php echo $message ?></strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
							</div>
						<?php endif ?>

						<?php if($message = $this->session->flashdata('error')) : ?>
							<div class="row mb-5">
								<div class="col-md-12 ml-2">
									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong><i class="fa fa-warning"></i>&nbsp;&nbsp;<?php echo $message ?></strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
							</div>
						<?php endif ?>

						<?php if($message = $this->session->flashdata('info')) : ?>
							<div class="row">
								<div class="col-md-12">
									<div class="alert alert-info alert-dismissible fade show" role="alert">
										<strong><i class="fa fa-warning"></i>&nbsp;&nbsp;<?php echo $message
											?></strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
								</div>
							</div>
						<?php endif ?>
						<!-- ============================================================== -->
						<!--                         breadcrumb                             -->
						<!-- ============================================================== -->

						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="home">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
						</ol>

						<div class="clearfix"></div>

						<div class="row">
							<div class="col-md-12">
								<div class="">
									<div class="x_content">

										<?php
											if(isset($_SESSION['msg'])){
												echo $_SESSION['msg'];
												unset($_SESSION['msg']);
											}
										?>
											<div id='calendar'></div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /page content -->

				<!-- footer content -->
				<footer>
					<div class="text-center">
						© Todos os direitos reservados - <a target="_blank" href="https://farleyfernando.com.br">FFSoft</a>
					</div>
					<div class="clearfix"></div>
				</footer>
				<!-- /footer content -->
			</div>
		</div>


		<!-- Modal visualizar -->
		<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			 aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Detalhes do Evento</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<div class="modal-body">
						<div class="visevent">
								<div class="row">
									<div class="col-md-2">
										<label>Id do Evento</label>
										<div class="border p-2" id="id"></div>
									</div>
									<div class="col-md-4">
										<label>Titulo do Evento</label>
										<div class="border p-2" id="title"></div>
									</div>
									<div class="col-md-3">
										<label>Inicio Data/Hora</label>
										<div class="border p-2" id="start"></div>
									</div>
									<div class="col-md-3">
										<label>Fim Data/Hora</label>
										<div class="border p-2" id="end"></div>
									</div>
								</div>
								<button class="btn btn-outline-warning btn-canc-vis mt-2">Editar</button>
								<a href="" id="apagar" class="btn
								btn-outline-danger
								mt-2">Deletar</a>
						</div>
						<div class="formedit">
							<span id="msg-cad"></span>
							<form id="" method="POST" enctype="multipart/form-data" action="<?php echo base_url('calendario/edit')?>">
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Título</label>
									<div class="col-sm-10">
										<input type="text" name="title" class="form-control" id="title"
											   placeholder="Título do evento">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Color</label>
									<div class="col-sm-10">
										<select name="color" class="form-control" id="color">
											<option value="">Selecione</option>
											<option style="color:#FFD700;" value="#FFD700">Amarelo</option>
											<option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
											<option style="color:#FF4500;" value="#FF4500">Laranja</option>
											<option style="color:#8B4513;" value="#8B4513">Marrom</option>
											<option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
											<option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
											<option style="color:#A020F0;" value="#A020F0">Roxo</option>
											<option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
											<option style="color:#228B22;" value="#228B22">Verde</option>
											<option style="color:#8B0000;" value="#8B0000">Vermelho</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Início do evento</label>
									<div class="col-sm-10">
										<input type="text" name="start" class="form-control" id="start" onkeypress="DataHora
								(event, this)">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-2 col-form-label">Final do evento</label>
									<div class="col-sm-10">
										<input type="text" name="end" class="form-control" id="end"  onkeypress="DataHora
								(event, this)">
									</div>
								</div>

								<div class="form-group row">
									<div class="col-sm-10">
										<button type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane-o"
											></i> &nbsp;Enviar</button>
										<button type="button" class="btn btn-outline-danger btn-canc-edit"><i class="fa
										fa-close"
											></i> &nbsp;Cancelar</button>
									</div>
								</div>
								<input type="hidden" name="id" class="form-control" id="id">
							</form>

						</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	<!-- Modal cadastrar -->
	<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Cadastrar Evento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<span id="msg-cad"></span>
					<form id="" method="POST" enctype="multipart/form-data" action="<?php echo base_url('calendario/add')?>">
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Título</label>
							<div class="col-sm-10">
								<input type="text" name="title" class="form-control" id="" placeholder="Título do evento">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Color</label>
							<div class="col-sm-10">
								<select name="color" class="form-control" id="">
									<option value="">Selecione</option>
									<option style="color:#FFD700;" value="#FFD700">Amarelo</option>
									<option style="color:#0071c5;" value="#0071c5">Azul Turquesa</option>
									<option style="color:#FF4500;" value="#FF4500">Laranja</option>
									<option style="color:#8B4513;" value="#8B4513">Marrom</option>
									<option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
									<option style="color:#436EEE;" value="#436EEE">Royal Blue</option>
									<option style="color:#A020F0;" value="#A020F0">Roxo</option>
									<option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
									<option style="color:#228B22;" value="#228B22">Verde</option>
									<option style="color:#8B0000;" value="#8B0000">Vermelho</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Início do evento</label>
							<div class="col-sm-10">
								<input type="text" name="start" class="form-control" id="start" onkeypress="DataHora
								(event, this)">
							</div>
						</div>
						<div class="form-group row">
							<label class="col-sm-2 col-form-label">Final do evento</label>
							<div class="col-sm-10">
								<input type="text" name="end" class="form-control" id="end"  onkeypress="DataHora
								(event, this)">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane-o"
									></i> &nbsp;Enviar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

		<!-- jQuery -->
		<script src="<?php echo base_url('public/vendors/jquery/dist/jquery.min.js')?>"></script>
		<!-- Bootstrap -->
		<script src="<?php echo base_url('public/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')?>"></script>
		<!-- FastClick -->
		<script src="<?php echo base_url('public/vendors/fastclick/lib/fastclick.js')?>"></script>
		<!-- NProgress -->
		<script src="<?php echo base_url('public/vendors/nprogress/nprogress.js')?>"></script>
		<!-- Custom Theme Scripts -->
		<script src="<?php echo base_url('public/build/js/custom.min.js')?>"></script>

</body>
</html>
