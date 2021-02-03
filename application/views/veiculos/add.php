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
						<li class="breadcrumb-item"><a href="<?php echo base_url('veiculos')?>">Veiculos</a></li>
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
								fa-car"></i>&nbsp;Dados do Veículo&nbsp;</legend>
							<div class="form-group row">
								<div class="col-md-2">
									<label class="pl-2">Placa <span>*</span>
								</label>
									<input type="text" class="form-control placa" name="veiculo_placa" value="<?php echo
									set_value('veiculo_placa'); ?>" placeholder="___-___" required>
									<?php echo form_error('veiculo_placa','<small class="form-text text-danger">','</small>'); ?>
								</div>
								<div class="col-md-3">
									<label class="pl-2">Marca / Modelo <span>*</span>
									</label>
									<input type="text" class="form-control" name="veiculo_marca_modelo" value="<?php
									echo set_value('veiculo_marca_modelo'); ?>" placeholder="Marca/Modelo" required>
									<?php echo form_error('veiculo_marca_modelo','<small class="form-text 
									text-danger">','</small>'); ?>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Tipo</label>
									<select class="form-control" name="veiculo_tipo_id">
										<option value="0">SELECIONE</option>
										<?php foreach ($tipos as $tipo): ?>
											<option value="<?php echo $tipo->tipo_id ?>" <?php echo
											($tipo->tipo_nome); ?> <?php echo
											($tipo->tipo_ativo == 0 ? 'disabled' : '')?>><?php echo
												($tipo->tipo_ativo ==
												0 ? $tipo->tipo_nome.'&nbsp; ->&nbsp;Inativa':
														$tipo->tipo_nome)
												?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-1">
									<label class="pl-2">UF <span>*</span>
									</label>
									<input type="text" class="form-control uf" name="veiculo_uf" value="<?php
									echo set_value('veiculo_uf'); ?>" placeholder="UF">
									<?php echo form_error('veiculo_uf','<small class="form-text 
									text-danger">','</small>'); ?>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Espécie</label>
									<select class="form-control" name="veiculo_especie_id">
										<option value="0">SELECIONE</option>
										<?php foreach ($especies as $especie): ?>
											<option value="<?php echo $especie->especie_id ?>"> <?php echo
											($especie->especie_nome); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Cor</label>
									<select class="form-control" name="veiculo_cor_id">
										<option value="0">SELECIONE</option>
										<?php foreach ($cores as $cor): ?>
											<option value="<?php echo $cor->cor_id ?>" <?php echo
											($cor->cor_nome); ?> <?php echo
											($cor->cor_ativo == 0 ? 'disabled' : '')?>><?php echo
												($cor->cor_ativo ==
												0 ? $cor->cor_nome.'&nbsp; ->&nbsp;Inativa':
														$cor->cor_nome)
												?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-2">
									<label class="pl-2">Combustível</label>
									<select class="form-control" name="veiculo_combustivel_id">
										<option value="0">SELECIONE</option>
										<?php foreach ($combustiveis as $combustivel): ?>
											<option value="<?php echo $combustivel->combustivel_id ?>" <?php echo
											($combustivel->combustivel_nome); ?> <?php echo
											($combustivel->combustivel_ativo == 0 ? 'disabled' : '')?>><?php echo
												($combustivel->combustivel_ativo ==
												0 ? $combustivel->combustivel_nome.'&nbsp; ->&nbsp;Inativo':
														$combustivel->combustivel_nome)
												?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Fabricação</label>
									<select class="form-control" name="veiculo_fabricacao">
										<option value="NACIONAL">NACIONAL</option>
										<option value="IMPORTADO">IMPORTADO</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Categoria</label>
									<select class="form-control" name="veiculo_categoria_id">
										<option value="0">SELECIONE</option>
										<?php foreach ($categorias as $categoria): ?>
											<option value="<?php echo $categoria->categoria_id ?>" <?php echo
											($categoria->categoria_nome); ?> <?php echo
											($categoria->categoria_ativa == 0 ? 'disabled' : '')?>><?php echo
												($categoria->categoria_ativa ==
												0 ? $categoria->categoria_nome.'&nbsp; ->&nbsp;Inativo':
														$categoria->categoria_nome)
												?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Ano Fabricação <span>*</span>
									</label>
									<input type="text" class="form-control" name="veiculo_ano_fab" value="<?php
									echo set_value('veiculo_ano_fab'); ?>" placeholder="Ano Fab." required>
									<?php echo form_error('veiculo_ano_fab','<small class="form-text 
									text-danger">','</small>'); ?>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Ano Modelo <span>*</span>
									</label>
									<input type="text" class="form-control" name="veiculo_ano_mod" value="<?php
									echo set_value('veiculo_ano_mod'); ?>" placeholder="Ano Fab." required>
									<?php echo form_error('veiculo_ano_mod','<small class="form-text 
									text-danger">','</small>'); ?>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Potência</label>
									<input type="text" class="form-control" name="veiculo_potencia" value="<?php
									echo set_value('veiculo_potencia'); ?>" placeholder="Potência">
									<?php echo form_error('veiculo_potencia','<small class="form-text 
									text-danger">','</small>'); ?>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-3">
									<label class="pl-2">Chassi <span>*</span></label>
									<input type="text" class="form-control" name="veiculo_chassi" value="<?php
									echo set_value('veiculo_chassi'); ?>" placeholder="Chassi">
									<?php echo form_error('veiculo_chassi','<small class="form-text 
								text-danger">','</small>'); ?>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Nº Cilindro</label>
									<input type="text" class="form-control" name="veiculo_cilindros" value="<?php
									echo set_value('veiculo_cilindros'); ?>" placeholder="Cilindros">
									<?php echo form_error('veiculo_cilindros','<small class="form-text 
								text-danger">','</small>'); ?>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Cilindrada</label>
									<input type="text" class="form-control" name="veiculo_cilindrada" value="<?php
									echo set_value('veiculo_cilindrada'); ?>" placeholder="Cilindrada">
									<?php echo form_error('veiculo_cilindrada','<small class="form-text 
								text-danger">','</small>'); ?>
								</div>
								<div class="col-md-3">
									<label class="pl-2">Chassi Remarcado</label>
									<select class="form-control" name="veiculo_chassi_rem">
										<option value="0">Não</option>
										<option value="1">Sim</option>
									</select>
								</div>
								<div class="col-md-2">
									<label class="pl-2">Lugares</label>
									<input type="text" class="form-control" name="veiculo_lugares" value="<?php
									echo set_value('veiculo_lugares'); ?>" placeholder="Lugares">
									<?php echo form_error('veiculo_lugares','<small class="form-text 
								text-danger">','</small>'); ?>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-4">
									<label class="pl-2">Renavam <span>*</span></label>
									<input type="text" class="form-control" name="veiculo_renavam" value="<?php
									echo set_value('veiculo_renavam'); ?>" placeholder="Renavam" required>
									<?php echo form_error('veiculo_renavam','<small class="form-text 
							text-danger">','</small>'); ?>
								</div>
								<div class="col-md-4">
									<label class="pl-2">Nº Motor</label>
									<input type="text" class="form-control" name="veiculo_num_motor" value="<?php
									echo set_value('veiculo_num_motor'); ?>" placeholder="Nº Motor">
									<?php echo form_error('veiculo_num_motor','<small class="form-text 
								text-danger">','</small>'); ?>
								</div>
								<div class="col-md-4">
									<label class="pl-2">Município Emplacamento</label>
									<input type="text" class="form-control" name="veiculo_mun_emp" value="<?php
									echo set_value('veiculo_mun_emp'); ?>" placeholder="Mun. Emplacamento">
									<?php echo form_error('veiculo_mun_emp','<small class="form-text 
								text-danger">','</small>'); ?>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-8">
									<label class="pl-2">Proprietário <span>*</span></label>
									<select class="form-control" name="veiculo_prop_id">
										<option value="0">SELECIONE</option>
										<?php foreach ($clientes as $cliente): ?>
											<option value="<?php echo $cliente->cliente_id ?>"
													<?php echo ($cliente->cliente_ativo == 0 ? 'disabled' : '')?>>
												<?php echo $cliente->cliente_nome . ' ' . $cliente->cliente_sobrenome .
														' | CPF/CNPJ: ' . $cliente->cliente_cpf_cnpj; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="col-md-4">
									<label class="pl-2">Data Venc. DUT <span>*</span></label>
									<input type="date" class="form-control" name="veiculo_venc_dut" value="<?php
									echo set_value('veiculo_venc_dut'); ?>">
									<?php echo form_error('veiculo_venc_dut','<small class="form-text 
								text-danger">','</small>'); ?>
								</div>
							</div>
								<div class="form-group row">
									<div class="col-md-4">
										<label class="pl-2">Nº CRV</label>
										<input type="text" class="form-control" name="veiculo_num_crv" value="<?php
										echo set_value('veiculo_num_crv'); ?>" placeholder="Nº crv">
										<?php echo form_error('veiculo_num_crv','<small class="form-text 
								text-danger">','</small>'); ?>
									</div>
									<div class="col-md-4">
										<label class="pl-2">Data Emissão CRV</label>
										<input type="date" class="form-control" name="veiculo_dte_crv" value="<?php
										echo set_value('veiculo_dte_crv'); ?>" >
										<?php echo form_error('veiculo_dte_crv','<small class="form-text 
							text-danger">','</small>'); ?>
									</div>
									<div class="col-md-4">
										<label class="pl-2">Nº DUDA</label>
										<input type="text" class="form-control" name="veiculo_num_duda" value="<?php
										echo set_value('veiculo_num_duda'); ?>" placeholder="Nº duda">
										<?php echo form_error('veiculo_num_duda','<small class="form-text 
							text-danger">','</small>'); ?>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-6">
										<label for="message">Observações</label>
										<textarea id="message" class="form-control" name="veiculo_obs"
												  data-parsley-trigger="keyup" data-parsley-maxlength="100"
												  data-parsley-maxlength-message="Já atigiu a quantidade de caracter permitidos.."
												  data-parsley-validation-threshold="10" rows="5" cols="200"
												  style="max-height: 60px;min-width: 100"><?php echo
											set_value('veiculo_obs'); ?></textarea>
									</div>
									<div class="col-6">
										<label for="message">Restrições</label>
										<textarea id="message" class="form-control" name="veiculo_restricao"
												  data-parsley-trigger="keyup" data-parsley-maxlength="100"
												  data-parsley-maxlength-message="Já atigiu a quantidade de caracter permitidos.."
												  data-parsley-validation-threshold="10" rows="5" cols="200"
												  style="max-height: 60px;min-width: 100"><?php echo
											set_value('veiculo_restricao'); ?></textarea>
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
								<a href="<?php echo base_url('veiculos'); ?>"><button type="button" class="btn
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
