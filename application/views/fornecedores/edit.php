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
						<p><strong><i class="fa fa-clock-o"></i>&nbsp; Última atualização: </strong><?php echo
							formata_data_banco_com_hora($fornecedor->fornecedor_data_alteracao) ?></p>
					<fieldset class=" mb-2 p-2">
							<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa
							fa-group"></i>&nbsp; Dados Cadastrais &nbsp;</legend>
						<div class="form-group row">
							<div class="col-md-3">
								<?php if($fornecedor->fornecedor_tipo == 1): ?>
									<label class="pl-2" >Nome <span>*</span>
									</label>
									<input type="text" name="fornecedor_nome" class="form-control"
										   value="<?php echo $fornecedor->fornecedor_nome; ?>" id="inputSuccess2" placeholder="<?php
									echo ($fornecedor->fornecedor_tipo == 1 ? 'Nome':'Razão Social') ?>">
									<?php echo form_error('fornecedor_nome','<small class="form-text text-danger">','</small>'); ?>

								<?php else: ?>
									<label class="pl-2" >Razão Social <span>*</span>
									</label>
									<input type="text" name="fornecedor_nome" class="form-control"
										   value="<?php echo $fornecedor->fornecedor_nome; ?>" id="inputSuccess2" placeholder="<?php
									echo ($fornecedor->fornecedor_tipo == 1 ? 'Nome':'Razão Social') ?>">
									<?php echo form_error('fornecedor_nome','<small class="form-text text-danger">','</small>'); ?>
								<?php endif; ?>
							</div>
							<div class="col-md-3">
								<?php if($fornecedor->fornecedor_tipo == 1): ?>
									<label class="pl-2">Sobrenome <span>*</span>
									</label>
									<input type="text" name="fornecedor_sobrenome" class="form-control" value="<?php echo $fornecedor->fornecedor_sobrenome; ?>"
										   placeholder="<?php
									echo ($fornecedor->fornecedor_tipo == 1 ? 'Sobrenome':'Nome Fantasia') ?>">
									<?php echo form_error('fornecedor_sobrenome','<small class="form-text text-danger">','</small>'); ?>
								<?php else: ?>
									<label class="pl-2" >Nome Fantasia <span>*</span>
									</label>
									<input type="text" name="fornecedor_sobrenome" class="form-control"
										   value="<?php echo $fornecedor->fornecedor_sobrenome; ?>" placeholder="<?php
									echo ($fornecedor->fornecedor_tipo == 1 ? 'Sobrenome':'Nome Fantasia') ?>">
									<?php echo form_error('fornecedor_sobrenome','<small class="form-text 
									text-danger">','</small>'); ?>
								<?php endif; ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">Data Nasc. <span>*</span></label>
								<input type="date" class="form-control" name="fornecedor_dn" value="<?php echo
								$fornecedor->fornecedor_dn; ?>" id="inputSuccess4" placeholder="Data nasc.">
								<?php echo form_error('fornecedor_dn','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<?php if($fornecedor->fornecedor_tipo == 1): ?>
									<label class="pl-2">CPF <span>*</span></label>
									<input type="text" class="form-control cpf" name="fornecedor_cpf" value="<?php echo
									$fornecedor->fornecedor_cpf_cnpj; ?>" placeholder="<?php
									echo ($fornecedor->fornecedor_tipo == 1 ? 'CPF':'CNPJ') ?>">
									<?php echo form_error('fornecedor_cpf','<small class="form-text text-danger">','</small>'); ?>

								<?php else: ?>
									<label class="pl-2" >CNPJ <span>*</span>
									</label>
									<input type="text" name="fornecedor_cnpj" class="form-control cnpj"
										   value="<?php echo $fornecedor->fornecedor_cpf_cnpj; ?>" placeholder="<?php
									echo ($fornecedor->fornecedor_tipo == 1 ? 'CPF':'CNPJ') ?>">
									<?php echo form_error('fornecedor_cnpj','<small class="form-text 
										text-danger">','</small>'); ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<?php if($fornecedor->fornecedor_tipo == 1): ?>
									<label class="pl-2">RG </label><span>*</span></label>
								<?php else: ?>
									<label class="pl-2">Insc. Est. </label><span>*</span></label>
								<?php endif; ?>
								<input type="text" class="form-control" name="fornecedor_rg_ie" value="<?php echo $fornecedor->fornecedor_rg_ie; ?>"
									   placeholder="<?php echo ($fornecedor->fornecedor_tipo == 1 ? 'RG':'Insc. Estadual')
									   ?>">
								<?php echo form_error('fornecedor_rg_ie','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">E-mail <span>*</span></label>
								<input type="email" name="fornecedor_email" class="form-control" value="<?php echo
								$fornecedor->fornecedor_email; ?>" id="inputSuccess2" placeholder="E-mail">
								<?php echo form_error('fornecedor_email','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">Telefone <span>*</span></label>
								<input type="text" class="form-control telfixo" name="fornecedor_telefone" value="<?php
								echo $fornecedor->fornecedor_telefone; ?>" id="inputSuccess4" placeholder="Telefone">
								<?php echo form_error('fornecedor_telefone','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">Celular <span>*</span></label>
								<input type="text" class="form-control sp_celphones" name="fornecedor_celular"
									   value="<?php echo $fornecedor->fornecedor_celular; ?>" id="inputSuccess4"
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
									$fornecedor->fornecedor_cep; ?>" id="inputSuccess4" placeholder="CEP" onblur="pesquisacep(this.value);">
									<?php echo form_error('fornecedor_cep','<small class="form-text text-danger">','</small>'); ?>

								</div>
								<div class="col-md-5">
									<label class="pl-2">Endereço <span>*</span>
									</label>
									<input type="text" name="fornecedor_endereco" class="form-control" value="<?php echo
									$fornecedor->fornecedor_endereco; ?>" id="end" placeholder="Endereço">
									<?php echo form_error('fornecedor_endereco','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Numero <span>*</span>
								</label>
									<input type="text" class="form-control" name="fornecedor_num_end"
										   value="<?php echo $fornecedor->fornecedor_num_end; ?>" id="inputSuccess4"
										   placeholder="Nº">
									<?php echo form_error('fornecedor_num_end','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-3">
									<label class="pl-2">Bairro <span>*</span>
								</label>
									<input type="text" class="form-control" name="fornecedor_bairro"
										   value="<?php echo $fornecedor->fornecedor_bairro; ?>" id="bairro"
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
									$fornecedor->fornecedor_complemento; ?>" id="inputSuccess4" placeholder="Complemento">
									<?php echo form_error('fornecedor_complemento','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-5">
									<label class="pl-2">Cidade <span>*</span>
									</label>
									<input type="text" name="fornecedor_cidade" class="form-control"
										   value="<?php echo $fornecedor->fornecedor_cidade; ?>" id="cidade"
										   placeholder="Cidade" readonly>
									<?php echo form_error('fornecedor_cidade','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Estado <span>*</span>
									</label>
									<input type="text" class="form-control uf"
										   name="fornecedor_estado" value="<?php echo $fornecedor->fornecedor_estado; ?>"
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
									<select class="form-control" name="fornecedor_ativo" <?php echo
									(!$this->ion_auth->is_admin
									() ?	'disabled' : '') ?>>
										<option value="0" <?php echo ($fornecedor->fornecedor_ativo == 0) ? 'selected' : '';
										?>>Não</option>
										<option value="1" <?php echo ($fornecedor->fornecedor_ativo == 1) ? 'selected' : '';
										?>>Sim</option>
									</select>
								</div>
								<div class="col-md-9">
									<label class="pl-2">Observações</label>
									<input type="text" name="fornecedor_obs" class="form-control"
										   value="<?php echo $fornecedor->fornecedor_obs; ?>" id="cidade"
										   placeholder="Obs">
									<?php echo form_error('fornecedor_obs','<small class="form-text text-danger">','</small>')
									; ?>
								</div>
							</div>
						</fieldset>

						<input type="hidden" name="fornecedor_tipo" value="<?php echo $fornecedor->fornecedor_tipo; ?>">
						<input type="hidden" name="fornecedor_id" value="<?php echo $fornecedor->fornecedor_id; ?>">
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group row">
							<div class="col-md-9 col-sm-9">
								<button type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane-o"
									></i> &nbsp;Enviar</button>
								<a href="<?php echo base_url('fornecedores'); ?>"><button type="button" class="btn
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
