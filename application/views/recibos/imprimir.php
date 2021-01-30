
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
							<strong><i class="far fa-smile-wink"></i>&nbsp;&nbsp;<?php echo $message ?></strong>
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
							<strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message ?></strong>
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
							<strong><i class="fas fa-exclamation-triangle"></i>&nbsp;&nbsp;<?php echo $message ?></strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
			<?php endif ?>

			<div class="container-fluid">

				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url('recibos'); ?>">Recibos</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo; ?></li>
					</ol>
				</nav>

				<!-- DataTales Example -->
				<div class="mb-4" style="padding-left: 130px;">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4">
								<a target="_blank" href="<?php echo base_url('recibos/imprimirA4/'
									.$recibo_servico->recibo_servico_id); ?>" class="btn btn-dark btn-icon-split
									btn-lg">
                         <span class="icon text-white-50">
                            <i class="fa fa-print"></i>
                         </span>
									<span class="text">&nbsp;Imprimir Recibo</span>
								</a>
							</div>
							<div class="col-md-4">
								<a href="<?php echo base_url('recibos/add'); ?>" class="btn btn-success btn-icon-split
								btn-lg">
                         <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                         </span>
									<span class="text">&nbsp;Emitir Recibo</span>
								</a>
							</div>
							<div class="col-md-4">
								<a href="<?php echo base_url('recibos'); ?>" class="btn btn-info btn-icon-split btn-lg">
                         <span class="icon text-white-50">
                            <i class="fa fa-list-ol"></i>
                         </span>
									<span class="text">&nbsp;Listar Recibo</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<!-- /page content -->
            

