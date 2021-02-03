

<?php $this->load->view('layout/sidebar'); ?>
		<!-- /top navigation -->

		<!-- page content -->
		<div class="right_col" role="main">
			<div class="">
				<div class="clearfix"></div>

				<!-- ============================================================== -->
				<!--                         breadcrumb                             -->
				<!-- ============================================================== -->

				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url('clientes')?>">Clientes</a></li>
					<li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
				</ol>

				<form class="form-label-left input_mask" method="post">
					<p><strong><i class="fa fa-clock-o"></i>&nbsp; Última atualização: </strong><?php echo
						formata_data_banco_com_hora($cliente->cliente_data_alteracao) ?></p>
					<fieldset class=" mb-2 p-2">
						<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa fa-group"></i>&nbsp; Dados Pessoais &nbsp;</legend>
						<div class="form-group row">
							<div class="col-md-3">
								<?php if($cliente->cliente_tipo == 1): ?>
									<label class="pl-2" >Nome <span>*</span>
									</label>
									<input type="text" name="cliente_nome" class="form-control"
										   value="<?php echo $cliente->cliente_nome; ?>" id="inputSuccess2" placeholder="<?php
									echo ($cliente->cliente_tipo == 1 ? 'Nome':'Razão Social') ?>">
									<?php echo form_error('cliente_nome','<small class="form-text text-danger">','</small>'); ?>

								<?php else: ?>
									<label class="pl-2" >Razão Social <span>*</span>
									</label>
									<input type="text" name="cliente_nome" class="form-control"
										   value="<?php echo $cliente->cliente_nome; ?>" id="inputSuccess2" placeholder="<?php
									echo ($cliente->cliente_tipo == 1 ? 'Nome':'Razão Social') ?>">
									<?php echo form_error('cliente_nome','<small class="form-text text-danger">','</small>'); ?>
								<?php endif; ?>
							</div>
							<div class="col-md-3">
								<?php if($cliente->cliente_tipo == 1): ?>
									<label class="pl-2">Sobrenome <span>*</span>
									</label>
									<input type="text" name="cliente_sobrenome" class="form-control" value="<?php echo $cliente->cliente_sobrenome; ?>"
										   placeholder="<?php
										   echo ($cliente->cliente_tipo == 1 ? 'Sobrenome':'Nome Fantasia') ?>">
									<?php echo form_error('cliente_sobrenome','<small class="form-text text-danger">','</small>'); ?>
								<?php else: ?>
									<label class="pl-2" >Nome Fantasia <span>*</span>
									</label>
									<input type="text" name="cliente_sobrenome" class="form-control"
										   value="<?php echo $cliente->cliente_sobrenome; ?>" placeholder="<?php
									echo ($cliente->cliente_tipo == 1 ? 'Sobrenome':'Nome Fantasia') ?>">
									<?php echo form_error('cliente_sobrenome','<small class="form-text 
									text-danger">','</small>'); ?>
								<?php endif; ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">Data Nasc. <span>*</span></label>
								<input type="date" class="form-control" name="cliente_dn" value="<?php echo
								$cliente->cliente_dn; ?>" id="inputSuccess4" placeholder="Data nasc.">
								<?php echo form_error('cliente_dn','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<?php if($cliente->cliente_tipo == 1): ?>
									<label class="pl-2">CPF <span>*</span></label>
									<input type="text" class="form-control cpf" name="cliente_cpf" value="<?php echo
									$cliente->cliente_cpf_cnpj; ?>" placeholder="<?php
									echo ($cliente->cliente_tipo == 1 ? 'CPF':'CNPJ') ?>">
									<?php echo form_error('cliente_cpf','<small class="form-text text-danger">','</small>'); ?>

								<?php else: ?>
									<label class="pl-2" >CNPJ <span>*</span>
									</label>
									<input type="text" name="cliente_cnpj" class="form-control cnpj"
										   value="<?php echo $cliente->cliente_cpf_cnpj; ?>" placeholder="<?php
									echo ($cliente->cliente_tipo == 1 ? 'CPF':'CNPJ') ?>">
									<?php echo form_error('cliente_cnpj','<small class="form-text 
										text-danger">','</small>'); ?>
								<?php endif; ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3">
								<?php if($cliente->cliente_tipo == 1): ?>
									<label class="pl-2">RG </label><span>*</span></label>
								<?php else: ?>
									<label class="pl-2">Insc. Est. </label><span>*</span></label>
								<?php endif; ?>
								<input type="text" class="form-control" name="cliente_rg_ie" value="<?php echo $cliente->cliente_rg_ie; ?>"
									   placeholder="<?php echo ($cliente->cliente_tipo == 1 ? 'RG':'Insc. Estadual')
									   ?>">
								<?php echo form_error('cliente_rg_ie','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">E-mail <span>*</span></label>
								<input type="email" name="cliente_email" class="form-control" value="<?php echo
								$cliente->cliente_email; ?>" id="inputSuccess2" placeholder="E-mail">
								<?php echo form_error('cliente_email','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">Telefone <span>*</span></label>
								<input type="text" class="form-control telfixo" name="cliente_telefone" value="<?php
								echo $cliente->cliente_telefone; ?>" id="inputSuccess4" placeholder="Telefone">
								<?php echo form_error('cliente_telefone','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">Celular <span>*</span></label>
								<input type="text" class="form-control sp_celphones" name="cliente_celular"
									   value="<?php echo $cliente->cliente_celular; ?>" id="inputSuccess4"
									   placeholder="Celular">
								<?php echo form_error('cliente_celular','<small class="form-text text-danger">','</small>'); ?>
							</div>
						</div>
					</fieldset>
					<fieldset class="mt-4 mb-2 p-2">
						<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa fa-map-marker"></i>&nbsp; Localização &nbsp;</legend>
						<div class="form-group row">
							<div class="col-md-2">
								<label class="pl-2">CEP <span>*</span>
								</label>
								<input type="text" class="form-control cep" name="cliente_cep" value="<?php echo
								$cliente->cliente_cep; ?>" id="inputSuccess4" placeholder="CEP" onblur="pesquisacep(this.value);">
								<?php echo form_error('cliente_cep','<small class="form-text text-danger">','</small>'); ?>

							</div>
							<div class="col-md-5">
								<label class="pl-2">Endereço <span>*</span>
								</label>
								<input type="text" name="cliente_endereco" class="form-control" value="<?php echo
								$cliente->cliente_endereco; ?>" id="end" placeholder="Endereço">
								<?php echo form_error('cliente_endereco','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-2">
								<label class="pl-2">Numero <span>*</span>
								</label>
								<input type="text" class="form-control" name="cliente_num_end"
									   value="<?php echo $cliente->cliente_num_end; ?>" id="inputSuccess4"
									   placeholder="Nº">
								<?php echo form_error('cliente_num_end','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-3">
								<label class="pl-2">Bairro <span>*</span>
								</label>
								<input type="text" class="form-control" name="cliente_bairro"
									   value="<?php echo $cliente->cliente_bairro; ?>" id="bairro"
									   placeholder="Bairro">
								<?php echo form_error('cliente_bairro','<small class="form-text text-danger">','</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-5">
								<label class="pl-2">Complemento <span>*</span>
								</label>
								<input type="text" class="form-control"
									   name="cliente_complemento" value="<?php echo
								$cliente->cliente_complemento; ?>" id="inputSuccess4" placeholder="Complemento">
								<?php echo form_error('cliente_complemento','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-5">
								<label class="pl-2">Cidade <span>*</span>
								</label>
								<input type="text" name="cliente_cidade" class="form-control"
									   value="<?php echo $cliente->cliente_cidade; ?>" id="cidade"
									   placeholder="Cidade" readonly>
								<?php echo form_error('cliente_cidade','<small class="form-text text-danger">','</small>'); ?>
							</div>
							<div class="col-md-2">
								<label class="pl-2">Estado <span>*</span>
								</label>
								<input type="text" class="form-control uf"
									   name="cliente_estado" value="<?php echo $cliente->cliente_estado; ?>"
									   id="uf" placeholder="Estado" readonly>
								<?php echo form_error('cliente_estado','<small class="form-text text-danger">','</small>'); ?>
							</div>
						</div>
					</fieldset>
					<fieldset class="mt-4 mb-2 p-2">
						<legend class="ml-3" style="font-size:17px; width: initial"><i class="fa
								fa-gears"></i>&nbsp;Configurações&nbsp;</legend>
						<div class="form-group row">
							<div class="col-md-3">
								<label class="pl-2">Cliente Ativo</label>
								<select class="form-control" name="cliente_ativo" <?php echo
								(!$this->ion_auth->is_admin
								() ?	'disabled' : '') ?>>
									<option value="0" <?php echo ($cliente->cliente_ativo == 0) ? 'selected' : '';
									?>>Não</option>
									<option value="1" <?php echo ($cliente->cliente_ativo == 1) ? 'selected' : '';
									?>>Sim</option>
								</select>
							</div>
							<div class="col-md-9">
								<label class="pl-2">Observações</label>
								<input type="text" name="cliente_obs" class="form-control"
									   value="<?php echo $cliente->cliente_obs; ?>" id="cidade"
									   placeholder="Obs">
								<?php echo form_error('cliente_obs','<small class="form-text text-danger">','</small>')
								; ?>
							</div>
						</div>
					</fieldset>

					<input type="hidden" name="cliente_tipo" value="<?php echo $cliente->cliente_tipo; ?>">
					<input type="hidden" name="cliente_id" value="<?php echo $cliente->cliente_id; ?>">

					<div class="clearfix"></div>
					<div class="ln_solid"></div>

					<div class="form-group row">
						<div class="col-md-9 col-sm-9">
							<button type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane-o"
								></i> &nbsp;Enviar</button>
							<a href="<?php echo base_url('clientes'); ?>"><button type="button" class="btn
										btn-outline-primary"><i class="fa fa-mail-reply-all"
									></i> &nbsp;Voltar</button></a>
						</div>
					</div>
				</form>


			</div>
		</div>
		<!-- /page content -->

		<!-- footer content -->

