
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
						<li class="breadcrumb-item"><a href="<?php echo base_url('home')?>">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php echo $titulo;?>
						</li>
					</ol>

					<div class="clearfix"></div>
				</div>

				<div class="x_content">

					<br/>
					<form class="form-label-left input_mask" method="post">
						<div class="form-group row">
							<div class="col-md-3 col-sm-4  form-group has-feedback">
								<input type="text" name="empresa_razao_social" class="form-control has-feedback-left" value="<?php echo $empresa->empresa_razao_social; ?>" id="inputSuccess2" placeholder="Razão Social">
								<?php echo form_error('empresa_razao_social','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>

							<div class="col-md-3 col-sm-4  form-group has-feedback">
								<input type="text" name="empresa_nome_fantasia" class="form-control has-feedback-left" value="<?php echo $empresa->empresa_nome_fantasia; ?>" id="inputSuccess2" placeholder="Nome Fantasia">
								<?php echo form_error('empresa_nome_fantasia','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>

							<div class="col-md-3 col-sm-4  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left cnpj" name="empresa_cnpj" value="<?php echo $empresa->empresa_cnpj; ?>" id="inputSuccess4" placeholder="CNPJ">
								<?php echo form_error('empresa_cnpj','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-tags form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-3 col-sm-3  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left" name="empresa_ie" value="<?php echo $empresa->empresa_ie; ?>" id="inputSuccess4" placeholder="Ins. Estadual">
								<?php echo form_error('empresa_ie','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-tag form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3 col-sm-3  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left telfixo" name="empresa_tel_fixo" value="<?php echo $empresa->empresa_tel_fixo; ?>" id="inputSuccess4" placeholder="Telefone">
								<?php echo form_error('empresa_tel_fixo','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-3 col-sm-3  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left sp_celphones" name="empresa_tel_movel" value="<?php echo $empresa->empresa_tel_movel; ?>" id="inputSuccess4" placeholder="Celular">
								<?php echo form_error('empresa_tel_movel','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-3 col-sm-4  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left" name="empresa_email" value="<?php echo $empresa->empresa_email; ?>" id="inputSuccess4" placeholder="Email">
								<?php echo form_error('empresa_email','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-send form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-3 col-sm-3  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left" name="empresa_site" value="<?php echo $empresa->empresa_site; ?>" id="inputSuccess4" placeholder="Site">
								<?php echo form_error('empresa_site','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-sitemap form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-2 col-sm-3  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left cep" name="empresa_cep" value="<?php echo $empresa->empresa_cep; ?>" id="inputSuccess4" placeholder="CEP">
								<?php echo form_error('empresa_cep','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-share-square-o form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-3 col-sm-3  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left" name="empresa_endereco" value="<?php echo $empresa->empresa_endereco; ?>" id="inputSuccess4" placeholder="Endereço">
								<?php echo form_error('empresa_endereco','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-1 col-sm-4  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left" name="empresa_numero" value="<?php echo $empresa->empresa_numero; ?>" id="inputSuccess4" placeholder="Número">
								<?php echo form_error('empresa_numero','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-html5 form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-2 col-sm-3  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left" name="empresa_bairro" value="<?php echo $empresa->empresa_bairro; ?>" id="inputSuccess4" placeholder="Bairro">
								<?php echo form_error('empresa_bairro','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-language form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-3 col-sm-4  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left" name="empresa_cidade" value="<?php echo $empresa->empresa_cidade; ?>" id="inputSuccess4" placeholder="Cidade">
								<?php echo form_error('empresa_cidade','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-1 col-sm-3  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left" name="empresa_estado" value="<?php echo $empresa->empresa_estado; ?>" id="inputSuccess4" placeholder="Estado">
								<?php echo form_error('empresa_estado','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-language form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="row">
								<div class="col-12">
									<label for="message">Observações</label>
									<textarea id="message" class="form-control" name="empresa_obs" data-parsley-trigger="keyup" data-parsley-maxlength="100" data-parsley-maxlength-message="Já atigiu a quantidade de caracter permitidos.." data-parsley-validation-threshold="10" rows="5" cols="200"
											  style="max-height: 60px;min-width: 100"><?php echo $empresa->empresa_obs; ?></textarea>
								</div>
							</div>
						</div>
				</div>
				<div class="clearfix"></div>
				<div class="ln_solid"></div>
				<div class="form-group row">
					<div class="col-md-9 col-sm-9">
						<button type="submit" class="btn btn-outline-success">Enviar</button>
						<a href="<?php echo base_url('home'); ?>"><button type="button" class="btn
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
