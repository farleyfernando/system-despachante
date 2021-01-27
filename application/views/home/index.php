
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

            <h3>HOME</h3>

        </div>
    </div>
</div>
<!-- /page content -->
            

