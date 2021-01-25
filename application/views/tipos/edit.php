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
					<!-- ============================================================== -->
					<!--                         breadcrumb                             -->
					<!-- ============================================================== -->

					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url('tipos')?>">Tipos</a></li>
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
							formata_data_banco_com_hora($tipos->tipo_data_alteracao) ?></p>

							<fieldset class="mt-4 mb-2 p-2">
								<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa
								fa-xing"></i>&nbsp;Dados da Tipo&nbsp;</legend>
							<div class="form-group row">
								<div class="col-md-6">
									<label class="pl-2">Nome Tipo <span>*</span>
								</label>
									<input type="text" class="form-control" name="tipo_nome" value="<?php echo
									$tipos->tipo_nome; ?>" placeholder="Nome tipo">
									<?php echo form_error('tipo_nome','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-6">
									<label class="pl-2">Tipo Ativo</label>
									<select class="form-control" name="tipo_ativo">
										<option value="0" <?php echo ($tipos->tipo_ativo == 0) ? 'selected' : '';
										?>>Não</option>
										<option value="1" <?php echo ($tipos->tipo_ativo == 1) ? 'selected' : '';
										?>>Sim</option>
									</select>
								</div>
							</div>
						</fieldset>


						<input type="hidden" name="tipo_id" value="<?php echo $tipos->tipo_id; ?>">
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
				<div class="form-group row">
					<div class="col-md-9 col-sm-9">
						<button type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane-o"
							></i> &nbsp;Enviar</button>
						<a href="<?php echo base_url('tipos'); ?>"><button type="button" class="btn
												btn-outline-primary"><i class="fa fa-mail-reply-all"
								></i> &nbsp;Voltar</button></a>
					</div>
				</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /page content -->
