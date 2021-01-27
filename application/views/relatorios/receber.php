
<?php $this->load->view('layout/sidebar'); ?>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
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
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							<strong><i class="fa fa-warning"></i>&nbsp;&nbsp;<?php echo $message
								?></strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
			<?php endif ?>

			<div class="container-fluid" style="margin-top: 70px;">

				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url('/'); ?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
					</ol>
				</nav>

				<!-- DataTales Example -->
				<div class="card shadow mb-4">


					<div class="card-body">

						<form action="" class="user" name="form_vendas" target="_blank" enctype="multipart/form-data" method="post" accept-charset="utf-8">

							<fieldset class="p-2">
								<legend class="font-small" style="font-size:17px; width: initial"><i class="fa
								fa-bullseye"></i></i>&nbsp;&nbsp;Escolha uma opção</legend>

								<div class="form-group row pt-3 pl-3">
									<div class="custom-control custom-radio col offset-md-1 mb-2">
										<input type="radio" id="customRadio1" name="contas" value="pagas" class="custom-control-input" checked="">
										<label class="custom-control-label" for="customRadio1" style="font-size:16px;
											padding-top: 0.05rem;">Contas pagas</label>
									</div>
									<div class="custom-control custom-radio ml-auto col mb-2">
										<input type="radio" id="customRadio2" name="contas" value="receber"
											   class="custom-control-input">
										<label class="custom-control-label" for="customRadio2" style="font-size:16px;
											padding-top: 0.05rem;">Contas a receber</label>
									</div>
									<div class="custom-control custom-radio ml-auto col">
										<input type="radio" id="customRadio3" name="contas" value="vencidas" class="custom-control-input">
										<label class="custom-control-label" for="customRadio3" style="font-size:16px;
											padding-top: 0.05rem;">Contas vencidas</label>
									</div>

								</div>

							</fieldset>


							<div class="mt-3">
								<button class="btn btn-outline-success"><i class="fa fa-paper-plane-o"
									></i> &nbsp;Enviar</button>
								<a href="<?php echo base_url('home'); ?>"><button type="button" class="btn
										btn-outline-primary"><i class="fa fa-mail-reply-all"
										></i> &nbsp;Voltar</button></a>
							</div>

						</form>

					</div>
				</div>

			</div>

        </div>
    </div>
</div>
<!-- /page content -->
            

