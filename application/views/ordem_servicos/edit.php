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
						<li class="breadcrumb-item"><a href="<?php echo base_url('os')?>">Recibos</a></li>
						<li class="breadcrumb-item active" aria-current="page">
							<?php echo $titulo;?>
						</li>
					</ol>

					<div class="clearfix"></div>
				</div>
				
				<div class="x_content">
					
					<br/>
					<form class="form-label-left" id="form" method="post" name="form_edit"
						  enctype="multipart/form-data" accept-charset="utf-8">
						<fieldset id="vendas" class="p-2">

							<legend class="font-small" style="font-size:17px; width: initial"><i class="fa
							fa-wrench"></i>&nbsp;&nbsp;Escolha os serviços</legend>

							<div class="form-group row">
								<div class="ui-widget col-lg-12 mb-1 mt-1">
									<input id="buscar_servicos" class="search form-control form-control-lg col-lg-12"
										   placeholder="Qual serviço você está buscando?">
								</div>
							</div>
							<div class="table-responsive">
								<table id="table_servicos" class="table">
									<thead>
									<tr>
										<th></th>
										<th class="" style="width: 55%">Serviço</th>
										<th class="text-right pr-2" style="width: 12%">Valor unitário</th>
										<th class="text-center" style="width: 8%">Qtde</th>
										<th class="" style="width: 8%">% Desc</th>
										<th class="text-right pr-2" style="width: 15%">Total</th>
										<th class="" style="width: 25%"></th>
										<th class="" style="width: 25%"></th>
									</tr>
									</thead>
									<tbody id="lista_servicos" class="">

									<?php if (isset($os_tem_servicos)): ?>

										<?php $i = 0; ?>

										<?php foreach ($os_tem_servicos as $os_servico): ?>

											<?php $i++; ?>

											<tr>
												<td><input type="hidden" name="servico_id[]" value="<?php echo $os_servico->ordem_ts_id_servico ?>" data-cell="A<?php echo $i; ?>" data-format="0" readonly></td>

												<td><input title="Descrição do servico" type="text" name="servico_descricao[]" value="<?php echo $os_servico->servico_descricao ?>" class="servico_descricao form-control form-control-user input-sm" data-cell="B<?php echo $i; ?>" readonly></td>

												<td><input title="Valor unitário do servico" name="servico_preco[]" value="<?php echo $os_servico->ordem_ts_valor_unitario ?>" class="form-control form-control-user input-sm text-right money pr-1" data-cell="C<?php echo $i; ?>" data-format="R$ 0,0.00" readonly></td>

												<td><input title="Digite a quantidade apenas em número inteiros" type="text" inputmode="numeric" pattern="[-+]?[0-9]*[.,]?[0-9]+" name="servico_quantidade[]" value="<?php echo $os_servico->ordem_ts_quantidade ?>" class="qty form-control form-control-user text-center" data-cell="D<?php echo $i; ?>" data-format="0[.]00" required></td>

												<td><input title="Insira o desconto" name="servico_desconto[]" class="form-control form-control-user input-sm text-right" value="<?php echo $os_servico->ordem_ts_valor_desconto ?>" data-cell="E<?php echo $i; ?>" data-format="0,0[.]00 %" required></td>

												<td><input title="Valor total do servico selecionado" name="servico_item_total[]" value="<?php echo $os_servico->ordem_ts_valor_total ?>" class="form-control form-control-user input-sm text-right pr-1" data-cell="F<?php echo $i; ?>" data-format="R$ 0,0.00" data-formula="D<?php echo $i; ?>*(C<?php echo $i; ?>-(C<?php echo $i; ?>*E<?php echo $i; ?>))" readonly></td>

												<td class="text-center"><input type="hidden"
																			   name="valor_desconto_servico[]"
																			   data-cell="H<?php echo $i; ?>"
																			   data-format="R$ 0,0.00" data-formula="
																			   ((C<?php echo $i; ?>*D<?php echo $i;
																			   ?>)-F<?php echo $i; ?>)"><a
															title="Remover o servico" class="btn-remove"
															style="color: red;" href="#"><i
																class="fa fa-close mt-2"></i></a></td>
											</tr>


										<?php endforeach; ?>

									<?php endif; ?>

									</tbody>
									<tfoot >
									<tr class="">
										<td colspan="5" class="text-right border-0">
											<label class="font-weight-bold pt-1" for="total">Valor de desconto:</label>
										</td>
										<td class="text-right border-0">
											<input type="text" name="ordem_servico_valor_desconto" class="form-control form-control-user text-right pr-1" data-format="$ 0,0.00" data-cell="L1" data-formula="SUM(H1:H5)" readonly="">
										</td>
										<td class="border-0">&nbsp;</td>
									</tr>
									<tr class="">
										<td colspan="5" class="text-right border-0">
											<label class="font-weight-bold pt-1" for="total">Total a pagar:</label>
										</td>
										<td class="text-right border-0">
											<input type="text" name="ordem_servico_valor_total" id="ordem_servico_valor_total"
												   class="form-control form-control-user text-right pr-1" data-format="0.00" data-cell="G2" data-formula="SUM(F1:F5)" readonly="">
										</td>
										<td class="border-0">&nbsp;</td>
									</tr>
									<tr class="">
										<td colspan="5" class="text-right border-0">
											<label class="font-weight-bold pt-1" for="total">Total pago:</label>
										</td>
										<td class="text-right border-0">
											<input type="text" name="ordem_servico_total_pago" id="ordem_servico_total_pago"
												   onblur="calculaTrocoOs()" value="<?php echo ($ordem_servico->ordem_servico_total_pago
											== null ||
											$os_servico->ordem_ts_total_pago == null ? '0.00' : $ordem_servico->ordem_servico_total_pago);
											?>"class="form-control form-control-user text-right pr-1"
												   data-format="" required>
										</td>
										<td class="border-0">&nbsp;</td>
									</tr>
									<tr class="">
										<td colspan="5" class="text-right border-0">
											<label class="font-weight-bold pt-1" for="total">Troco:</label>
										</td>
										<td class="text-right border-0">
											<input type="text" name="ordem_servico_troco" id="ordem_servico_troco"
												   value="<?php echo ($ordem_servico->ordem_servico_troco == null ||
												   $os_servico->ordem_ts_valor_troco == null ? '0.00' :
														   $ordem_servico->ordem_servico_troco); ?>"
												   class="form-control form-control-user text-right pr-1"
												   data-format="" onfocus="calculaTrocoOs(this.value)"
												   readonly>
										</td>
										<td class="border-0">&nbsp;</td>
									</tr>
									</tfoot>
								</table>
							</div>
						</fieldset>
						<fieldset class="mt-4 p-2">

							<legend class="font-small" style="font-size:17px; width: initial"><i class="fa
							fa-file-text"></i>&nbsp;&nbsp;Dados do
								Recibo</legend>

							<div class="">
								<div class="form-group row">

									<div class="col-sm-5 mb-1 mb-sm-0">
										<label class="small my-0">Escolha o cliente <span class="text-danger">*</span></label>
										<select class="custom-select contas_receber" name="ordem_servico_cliente_id" required="">
											<?php foreach ($clientes as $cliente): ?>
												<option value="<?php echo $cliente->cliente_id; ?>" <?php echo ($cliente->cliente_id == $ordem_servico->ordem_servico_cliente_id ? 'selected' : '') ?> ><?php echo $cliente->cliente_nome . ' ' . $cliente->cliente_sobrenome . ' | CPF ou CNPJ: ' . $cliente->cliente_cpf_cnpj; ?></option>
											<?php endforeach; ?>
										</select>
										<?php echo form_error('ordem_servico_cliente_id', '<div class="text-danger small">', '</div>') ?>
									</div>
									<div class="col-sm-5 mb-1 mb-sm-0">
										<label class="small my-0">Veículo Placa <span
													class="text-danger">*</span></label>
										<select class="form-control" name="ordem_servico_veiculo_id"
												required="">
											<?php foreach ($veiculos as $veiculo): ?>
												<option value="<?php echo $veiculo->veiculo_id; ?>" <?php echo
												($veiculo->veiculo_id == $ordem_servico->ordem_servico_veiculo_id ? 'selected' :
												'') ?>><?php echo $veiculo->veiculo_placa . ' | Renavam: ' .
															$veiculo->veiculo_renavam ?></option>
											<?php endforeach; ?>
										</select>
										<?php echo form_error('ordem_servico_veiculo_id', '<div class="text-danger 
										small">', '</div>') ?>
									</div>

									<div class="col-md-2">
										<label class="small my-0">Forma de Pagamento <span
													class="text-danger">*</span></label>
										<select id="id_pagamento" class="form-control forma-pagamento"
												name="ordem_servico_forma_pagamento_id">
											<option value="">Escolha</option>
											<?php foreach ($formas_pagamentos as $forma_pagamento): ?>
												<option value="<?php echo $forma_pagamento->forma_pagamento_id; ?>" <?php echo ($forma_pagamento->forma_pagamento_id == $ordem_servico->ordem_servico_forma_pagamento_id ? 'selected' : '') ?> ><?php echo $forma_pagamento->forma_pagamento_nome; ?></option>
											<?php endforeach; ?>
										</select>
										<?php echo form_error('ordem_servico_forma_pagamento_id', '<div class="text-danger small">', '</div>') ?>
									</div>

								</div>

								<div class="form-group row">
									<div class="col-sm-12 mb-1 mb-sm-0">
										<label class="small my-0">Observações <span class="text-danger"></span></label>
										<textarea type="text" class="form-control form-control-user" value="" name="ordem_servico_obs"><?php echo set_value('ordem_servico_obs', $ordem_servico->ordem_servico_obs); ?></textarea>
									</div>
								</div>

							</div>

						</fieldset>


						<input type="hidden" name="ordem_servico_id" value="<?php echo $ordem_servico->ordem_servico_id ?>" />

						</div>
						<div class="clearfix"></div>
						<div class="ln_solid"></div>
						<div class="form-group row">
							<div class="col-md-9 col-sm-9">
								<button type="submit" class="btn btn-outline-success"><i class="fa fa-paper-plane-o"
									></i> &nbsp;Enviar</button>
								<a href="<?php echo base_url('os'); ?>"><button type="button" class="btn
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
