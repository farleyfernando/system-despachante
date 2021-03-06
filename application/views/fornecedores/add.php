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
						<li class="breadcrumb-item"><a href="<?php echo base_url('fornecedores')
							?>">Fornecedores</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php echo $titulo;?>
						</li>
					</ol>

					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					
					<br/>
					<form class="form-label-left input_mask" method="post">
						<div class="custom-control custom-radio custom-control-inline mt-2">
							<input type="radio" id="pessoa_fisica" name="fornecedor_tipo" class="custom-control-input" value="1" <?php echo set_checkbox('fornecedor_tipo', '1') ?> checked="">
							<label class="custom-control-label pt-1" for="pessoa_fisica">Pessoa física</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input type="radio" id="pessoa_juridica" name="fornecedor_tipo" class="custom-control-input" value="2" <?php echo set_checkbox('fornecedor_tipo', '2') ?> >
							<label class="custom-control-label pt-1" for="pessoa_juridica">Pessoa jurídica</label>
						</div>
					<fieldset class=" mt-2 mb-2 p-2">
							<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa
							fa-group"></i>&nbsp; Dados Cadastrais &nbsp;</legend>
						<div class="form-group row">
							<div class="col-md-3">
								<div class="pessoa_fisica">
									<label class="pl-2" >Nome <span>*</span></label>
									<input type="text" name="fornecedor_nome" class="form-control"
										   value="<?php echo set_value('fornecedor_nome'); ?>" placeholder="Nome">
									<?php echo form_error('fornecedor_nome','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="pessoa_juridica">
									<label class="pl-2" >Razão Social <span>*</span></label>
									<input type="text" name="fornecedor_rs" class="form-control"
										   value="<?php echo set_value('fornecedor_rs'); ?>"  placeholder="Razão Social">
									<?php echo form_error('fornecedor_rs','<small class="form-text text-danger">','</small>'); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="pessoa_fisica">
									<label class="pl-2">Sobrenome <span>*</span>
									</label>
									<input type="text" name="fornecedor_sobrenome" class="form-control" value="<?php
									echo set_value('fornecedor_sobrenome'); ?>" placeholder="Sobrenome">
									<?php echo form_error('fornecedor_sobrenome','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="pessoa_juridica">
									<label class="pl-2" >Nome Fantasia <span>*</span>
									</label>
									<input type="text" name="fornecedor_nf" class="form-control"
										   value="<?php echo set_value('fornecedor_nf'); ?>" placeholder="Nome Fantasia">
									<?php echo form_error('fornecedor_nf','<small class="form-text 
									text-danger">','</small>'); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="pessoa_fisica">
									<label class="pl-2">Data Nasc. <span>*</span></label>
									<input type="date" class="form-control" name="fornecedor_dn" value="<?php echo
									set_value('fornecedor_dn'); ?>">
									<?php echo form_error('fornecedor_dn','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="pessoa_juridica">
									<label class="pl-2">Data Abertura. <span>*</span></label>
									<input type="date" class="form-control" name="fornecedor_dn_ab" value="<?php echo
									set_value('fornecedor_dn_ab'); ?>">
									<?php echo form_error('fornecedor_dn_ab','<small class="form-text text-danger">','</small>'); ?>
								</div>
							</div>
							<div class="col-md-3">
								<div class="pessoa_fisica">
									<label class="pl-2">CPF <span>*</span></label>
									<input type="text" class="form-control cpf" name="fornecedor_cpf" value="<?php echo set_value('fornecedor_cpf')
									; ?>" placeholder="CPF">
									<?php echo form_error('fornecedor_cpf','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="pessoa_juridica">
									<label class="pl-2" >CNPJ <span>*</span>
									</label>
									<input type="text" name="fornecedor_cnpj" class="form-control cnpj"
										   value="<?php echo set_value('fornecedor_cnpj'); ?>" placeholder="CNPJ">
									<?php echo form_error('fornecedor_cnpj','<small class="form-text 
										text-danger">','</small>'); ?>
								</div>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<div class="pessoa_fisica">
									<label class="pl-2">RG </label><span>*</span></label>
									<input type="text" class="form-control rg" name="fornecedor_rg" value="<?php echo
									set_value('fornecedor_rg'); ?>" placeholder="RG">
									<?php echo form_error('fornecedor_rg','<small class="form-text 
										text-danger">','</small>'); ?>
								</div>
								<div class="pessoa_juridica">
									<label class="pl-2">Insc. Est. </label><span>*</span></label>
									<input type="text" class="form-control" name="fornecedor_ie" value="<?php echo
									set_value('fornecedor_ie'); ?>" placeholder="Ins. Estadual">
									<?php echo form_error('fornecedor_ie','<small class="form-text text-danger">','</small>'); ?>
								</div>
							</div>
							<div class="col-md-3">
								<label class="pl-2">E-mail <span>*</span></label>
								<input type="email" name="fornecedor_email" class="form-control" value="<?php echo
								set_value('fornecedor_email'); ?>" placeholder="E-mail">
								<?php echo form_error('fornecedor_email','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">Telefone <span>*</span></label>
								<input type="text" class="form-control telfixo" name="fornecedor_telefone" value="<?php
								echo set_value('fornecedor_telefone'); ?>"  placeholder="Telefone">
								<?php echo form_error('fornecedor_telefone','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">Celular <span>*</span></label>
								<input type="text" class="form-control sp_celphones" name="fornecedor_celular"
									   value="<?php echo set_value('fornecedor_celular'); ?>"
									   placeholder="Celular">
								<?php echo form_error('fornecedor_celular','<small class="form-text text-danger">','</small>'); ?>
							</div>
						</div>
					</fieldset>
						<fieldset class="mt-4 mb-2 p-2">
							<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa fa-map-marker"></i>&nbsp; Localização &nbsp;</legend>
							<div class="form-group row">
								<div class="col-md-2">
									<label class="pl-2">CEP <span>*</span>
								</label>
									<input type="text" class="form-control cep" name="fornecedor_cep" value="<?php echo
									set_value('fornecedor_cep'); ?>" placeholder="CEP" onblur="pesquisacep(this.value);">
									<?php echo form_error('fornecedor_cep','<small class="form-text text-danger">','</small>'); ?>

								</div>
								<div class="col-md-5">
									<label class="pl-2">Endereço <span>*</span>
									</label>
									<input type="text" name="fornecedor_endereco" class="form-control" value="<?php echo
									set_value('fornecedor_endereco'); ?>" id="end" placeholder="Endereço">
									<?php echo form_error('fornecedor_endereco','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Numero <span>*</span>
								</label>
									<input type="text" class="form-control" name="fornecedor_num_end"
										   value="<?php echo set_value('fornecedor_num_end'); ?>"
										   placeholder="Nº">
									<?php echo form_error('fornecedor_num_end','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-3">
									<label class="pl-2">Bairro <span>*</span>
								</label>
									<input type="text" class="form-control" name="fornecedor_bairro"
										   value="<?php echo set_value('fornecedor_bairro'); ?>" id="bairro"
										   placeholder="Bairro">
									<?php echo form_error('fornecedor_bairro','<small class="form-text text-danger">','</small>'); ?>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-5">
									<label class="pl-2">Complemento <span>*</span>
								</label>
									<input type="text" class="form-control"
										   name="fornecedor_complemento" value="<?php echo
									set_value('fornecedor_complemento'); ?>" placeholder="Complemento">
									<?php echo form_error('fornecedor_complemento','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-5">
									<label class="pl-2">Cidade <span>*</span>
									</label>
									<input type="text" name="fornecedor_cidade" class="form-control"
										   value="<?php echo set_value('fornecedor_cidade'); ?>" id="cidade"
										   placeholder="Cidade" readonly>
									<?php echo form_error('fornecedor_cidade','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Estado <span>*</span>
									</label>
									<input type="text" class="form-control uf"
										   name="fornecedor_estado" value="<?php echo set_value('fornecedor_estado'); ?>"
										   id="uf" placeholder="Estado" readonly>
									<?php echo form_error('fornecedor_estado','<small class="form-text text-danger">','</small>'); ?>
								</div>
							</div>			
						</fieldset>
						<fieldset class="mt-4 mb-2 p-2">
								<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa
								fa-gears"></i>&nbsp;Configurações&nbsp;</legend>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="pl-2">Fornecedor Ativo</label>
									<select class="form-control" name="fornecedor_ativo">
										<option value="1">Sim</option>
										<option value="0">Não</option>
									</select>
								</div>
								<div class="col-md-9">
									<label class="pl-2">Observações</label>
									<input type="text" name="fornecedor_obs" class="form-control"
										   value="<?php echo set_value('fornecedor_obs'); ?>"
										   placeholder="Obs">
									<?php echo form_error('fornecedor_obs','<small class="form-text text-danger">','</small>')
									; ?>
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
								<a href="<?php echo base_url('fornecedores'); ?>"><button type="button" class="btn
									btn-outline-primary"><i class="fa fa-mail-reply-all"></i> &nbsp;Voltar</button></a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /page content -->
