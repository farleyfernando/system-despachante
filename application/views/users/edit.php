<?php $this->load->view('layout/sidebar'); ?>

<!-- page content -->
<div class="right_col" role="main">

	<div class="row">
		<div class="col-md-12 ">
			<div class="x_panel">
				<div class="x_title">
					<!-- ============================================================== -->
					<!--                         breadcrumb                             -->
					<!-- ============================================================== -->

					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url('users')?>">Usuários</a></li>
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
							<div class="col-md-4 col-sm-4  form-group has-feedback">
								<input type="text" name="first_name" class="form-control has-feedback-left" value="<?php echo $users->first_name ?>" id="inputSuccess2" placeholder="Primeiro nome">
								<?php echo form_error('first_name','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>

							<div class="col-md-4 col-sm-4  form-group has-feedback">
								<input type="text" name="last_name" class="form-control has-feedback-left" value="<?php echo $users->last_name ?>" id="inputSuccess2" placeholder="Primeiro nome">
								<?php echo form_error('last_name','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>

							<div class="col-md-4 col-sm-4  form-group has-feedback">
								<input type="email" class="form-control has-feedback-left" name="email" value="<?php echo $users->email ?>" id="inputSuccess4" placeholder="Email">
								<?php echo form_error('email','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-3 col-sm-3  form-group has-feedback">
								<input type="text" class="form-control has-feedback-left" name="username" value="<?php echo $users->username ?>" id="inputSuccess4" placeholder="Username">
								<?php echo form_error('username','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-3 col-sm-4  form-group has-feedback">
								<input type="text" name="phone" class="form-control has-feedback-left sp_celphones" value="<?php echo $users->phone ?>" id="inputSuccess2" placeholder="Primeiro nome">
								<?php echo form_error('phone','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
							</div>
							<div class="col-md-3 col-sm-4  form-group has-feedback">
								<select class="form-control" name="perfil_usuario" <?php echo (!$this->ion_auth->is_admin() ? 'disabled' : '') ?>>
									<option value="2" <?php echo ($perfil_usuario->id == 2) ? 'selected' : ''; ?>>Usuário</option>
									<option value="1" <?php echo ($perfil_usuario->id == 1) ? 'selected' : ''; ?>>Administrador</option>
								</select>
							</div>
							<div class="col-md-3 col-sm-4  form-group has-feedback">
								<select class="form-control" name="active" <?php echo (!$this->ion_auth->is_admin() ? 'disabled' : '') ?>>
									<option value="0" <?php echo ($users->active == 0) ? 'selected' : ''; ?>>Não</option>
									<option value="1" <?php echo ($users->active == 1) ? 'selected' : ''; ?>>Sim</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-6 col-sm-4  form-group has-feedback">
								<input type="password" class="form-control has-feedback-left" name="password" value="" id="inputSuccess4" placeholder="Senha">
								<?php echo form_error('password','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
							</div>

							<div class="col-md-6 col-sm-4 form-group has-feedback">
								<input type="password" name="confirma_password" class="form-control has-feedback-left" value="" id="inputSuccess2" placeholder="Confirmar senha">
								<?php echo form_error('confirma_password','<small class="form-text text-danger">','</small>'); ?>
								<span class="fa fa-key form-control-feedback left" aria-hidden="true"></span>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group row">
							<div class="col-md-9 col-sm-9">
								<button type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane-o"
									></i> &nbsp;Enviar</button>
								<a href="<?php echo base_url('users'); ?>"><button type="button" class="btn
												btn-outline-primary"><i class="fa fa-mail-reply-all"
										></i> &nbsp;Voltar</button></a>
							</div>
						</div>

						<input type="hidden" name="usuario_id" value="<?php  echo $users->id ?>">
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
<!-- /page content -->
