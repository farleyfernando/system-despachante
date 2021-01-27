<?php $this->load->view('layout/sidebar'); ?>

<!-- page content -->
<div class="right_col" role="main">

	<div class="row">
		<div class="col-md-12 ">
			<div class="x_panel">
				<div class="x_title">

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
						<li class="breadcrumb-item"><a href="<?php echo base_url('pag')?>">Formas
								Pgto</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php echo $titulo;?>
						</li>
					</ol>

					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					
					<br/>
					<form class="form-label-left input_mask" method="post">
						<p><strong><i class="fa fa-clock-o"></i>&nbsp; Última atualização: </strong><?php echo
							formata_data_banco_com_hora($forma_pagamento->forma_pagamento_data_alteracao) ?></p>

							<fieldset class="mt-4 mb-2 p-2">
								<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa
								fa-paypal"></i>&nbsp;Dados Forma Pgto &nbsp;</legend>
							<div class="form-group row">
								<div class="col-md-4">
									<label class="pl-2">Forma Pagamento <span>*</span>
								</label>
									<input type="text" class="form-control" name="forma_pagamento_nome" value="<?php echo
									$forma_pagamento->forma_pagamento_nome; ?>" placeholder="Nome forma_pagamento">
									<?php echo form_error('forma_pagamento_nome','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-4">
									<label class="pl-2">Forma Pagamento Ativa</label>
									<select class="form-control" name="forma_pagamento_ativa">
										<option value="0" <?php echo ($forma_pagamento->forma_pagamento_ativa == 0) ? 'selected' : '';
										?>>Não</option>
										<option value="1" <?php echo ($forma_pagamento->forma_pagamento_ativa == 1) ? 'selected' : '';
										?>>Sim</option>
									</select>
								</div>
								<div class="col-md-4">
									<label class="pl-2">Aceita parcelamento</label>
									<select class="form-control" name="forma_pagamento_aceita_parc">
										<option value="0" <?php echo ($forma_pagamento->forma_pagamento_aceita_parc ==
												0) ?
												'selected' : '';
										?>>Não</option>
										<option value="1" <?php echo ($forma_pagamento->forma_pagamento_aceita_parc ==
												1) ?
												'selected' : '';
										?>>Sim</option>
									</select>
								</div>
							</div>
						</fieldset>


						<input type="hidden" name="forma_pagamento_id" value="<?php echo $forma_pagamento->forma_pagamento_id; ?>">
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group row">
							<div class="col-md-9 col-sm-9">
								<button type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane-o"
									></i> &nbsp;Enviar</button>
								<a href="<?php echo base_url('pag'); ?>"><button type="button" class="btn
										btn-outline-primary"><i class="fa fa-mail-reply-all"
										></i> &nbsp;Voltar</button></a>
							</div>
						</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /page content -->
