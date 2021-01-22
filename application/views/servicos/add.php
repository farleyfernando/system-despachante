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
						<li class="breadcrumb-item"><a href="<?php echo base_url('servicos')?>">Serviços</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php echo $titulo;?>
						</li>
					</ol>

					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					
					<br/>
					<form class="form-label-left input_mask" method="post">
							<fieldset class="mb-2 p-2">
								<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa
								fa-plug"></i>&nbsp;Dados do Serviço&nbsp;</legend>
							<div class="form-group row">
								<div class="col-md-4">
									<label class="pl-2">Nome do Serviço <span>*</span>
								</label>
									<input type="text" class="form-control" name="servico_nome" value="<?php echo
									set_value('servico_nome'); ?>" placeholder="Nome serviço">
									<?php echo form_error('servico_nome','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-4">
									<label class="pl-2">Valor do Serviço <span>*</span>
									</label>
									<input type="text" name="servico_preco" class="form-control money" value="<?php echo
									set_value('servico_preco'); ?>" placeholder="Valor Serviço">
									<?php echo form_error('servico_preco','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-4">
									<label class="pl-2">Servico Ativo</label>
									<select class="form-control" name="servico_ativo">
										<option value="1">Sim</option>
										<option value="0">Não</option>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<label>Descriçao do Serviço</label>
									<textarea type="text" class="form-control" name="servico_descricao"
											  style="max-height: 100px;min-width: 100px" placeholder="Descrição serviço"><?php echo set_value('servico_descricao'); ?></textarea>
									<?php echo form_error('servico_descricao', '<small class="form-text text-danger">', '</small>'); ?>
								</div>
							</div>
						</fieldset>

						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group row">
							<div class="col-md-9 col-sm-9">
								<button type="submit" class="btn btn-outline-success">Enviar</button>
								<a href="<?php echo base_url('servicos'); ?>"><button type="button" class="btn
								btn-outline-primary">Voltar</button></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /page content -->
