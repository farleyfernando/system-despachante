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
						<li class="breadcrumb-item"><a href="<?php echo base_url('pagar')?>">Pagar</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php echo $titulo;?>
						</li>
					</ol>

					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					
					<br/>
					<form class="form-label-left input_mask" method="post">
							<fieldset class="mt-4 mb-2 p-2">
								<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa
								fa-money"></i>&nbsp;Dados da Conta&nbsp;</legend>
								<div class="form-group row">
									<div class="col-md-6">
										<label >Fornecedor</label>
										<select class="form-control contas_pagar" name="conta_pagar_fornecedor_id">
											<option></option>
											<?php foreach ($fornecedores as $fornecedor): ?>
												<option value="<?php echo $fornecedor->fornecedor_id ?>"><?php
													echo $fornecedor->fornecedor_nome .' '.
															$fornecedor->fornecedor_sobrenome .' | CPF/CNPJ: '.
															$fornecedor->fornecedor_cpf_cnpj ?></option>
											<?php endforeach; ?>
										</select>
										<?php echo form_error('conta_pagar_fornecedor_id', '<small class="form-text text-danger">', '</small>'); ?>

									</div>
									<div class="col-md-2">
										<label>Data Vencimento</label>
										<input type="date" class="form-control" name="conta_pagar_data_venc"
											   placeholder="" value="<?php echo set_value('conta_pagar_data_venc'); ?>">
										<?php echo form_error('conta_pagar_data_venc', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
									<div class="col-md-2">
										<label>Valor Conta</label>
										<input type="text" class="form-control money2" name="conta_pagar_valor"
											   placeholder="Valor conta" value="<?php echo set_value('conta_pagar_valor'); ?>">
										<?php echo form_error('conta_pagar_valor', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
									<div class="col-md-2">
										<label >Status</label>
										<select class="form-control" name="conta_pagar_status">
											<option value="0">Pendente</option>
											<option value="1">Paga</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-12">
										<label>Observaçoes da Conta</label>
										<textarea class="form-control" name="conta_pagar_obs" style="max-height:
										60px;min-width: 100%" placeholder="Obs. conta"><?php echo set_value('conta_pagar_obs'); ?></textarea>
										<?php echo form_error('conta_pagar_obs', '<small class="form-text text-danger">', '</small>'); ?>
									</div>
								</div>
							</fieldset>

						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group row">
							<div class="col-md-9 col-sm-9">
								<button type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane-o"
									></i> &nbsp;Enviar</button>
								<a href="<?php echo base_url('pagar'); ?>"><button type="button" class="btn
								btn-outline-primary"><i	class="fa fa-mail-reply-all"
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
