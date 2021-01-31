

       <?php $this->load->view('layout/sidebar')?>

		<!-- /top navigation -->

		<!-- page content -->
		<div class="right_col" role="main">
			<!-- ============================================================== -->
			<!--                    MENSAGENS AO USUARIO                        -->
			<!-- ============================================================== -->

			<?php if($message = $this->session->flashdata('sucesso')) : ?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-success alert-dismissible fade show" role="alert">
							<strong><i class="fa fa-thumbs-up"></i>&nbsp;&nbsp;<?php echo $message ?></strong>
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
							<strong><i class="fa fa-warning"></i>&nbsp;&nbsp;<?php echo $message ?></strong>
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
							<strong><i class="fa fa-warning"></i>&nbsp;&nbsp;<?php echo $message
								?></strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</div>
				</div>
			<?php endif ?>
			<div class="row" style="display: inline-block;">
				<div class=" top_tiles" style="margin: 10px 0;">
					<div class="col-md-3 col-sm-3  tile">
						<span>Total de Serviços</span>
						<h2 class="text-info"><?php echo 'R$&nbsp;'.number_format
								($soma_ordem_servicos->ordem_servico_valor_total == null ? '0,00' :
									$soma_ordem_servicos->ordem_servico_valor_total,
									2, ",", ".")	; ?></h2>
						<span class="sparkline_one" style="height: 160px;">
						  <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
					  </span>
					</div>
					<div class="col-md-3 col-sm-3  tile">
						<span>Contas à Pagar</span>
						<h2 class="text-danger"><?php echo 'R$&nbsp;'.number_format
								($total_pagar->conta_pagar_valor == null ? '0,00' :
									$total_pagar->conta_pagar_valor,
									2, ",", ".")	; ?></h2>
						<span class="sparkline_one" style="height: 160px;">
						  <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
					  </span>
					</div>
					<div class="col-md-3 col-sm-3  tile">
						<span>Contas à Receber</span>
						<h2 class="text-success"><?php echo 'R$&nbsp;'.($total_receber->conta_receber_valor == null ? '0,00' :
									$total_receber->conta_receber_valor); ?></h2>
						<span class="sparkline_one" style="height: 160px;">
						  <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 125px;"></canvas>
					  </span>
					</div>
				</div>
			</div>
			<br/>

			<div class="row mt-xl-5">
				<div class="col-lg-6 mb-4">
					<!-- Illustrations -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">VEICULOS COM VENCIMENTO DE DUT</h6>
						</div>
						<div class="card-body">
							<div class="text-center">
								<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 20rem;" src="<?php echo
								base_url('public/images/guincho.svg'); ?>" alt="">
							</div>

							<div class="table-responsive">
								<table class="table table-striped table-borderless">

									<thead>
									<tr>
										<th >Placa</th>
										<th class="text-center">Data Vencimento</th>
										<th class="text-center">Cliente</th>
									</tr>

									</thead>
									<tbody>

									<?php foreach ($veiculos_dut as $veiculo): ?>

										<tr>
											<td class="text-gray-900" style="font-size:14px;"><?php echo
												$veiculo->veiculo_placa ?></td>
											<td class="text-center" style="font-size:14px;">
												<?php
													if($veiculo->veiculo_venc_dut == date('Y-m-d')){

														echo '<span class="badge badge-warning" style="font-size:13px;">'.
																formata_data_banco_sem_hora
																($veiculo->veiculo_venc_dut).' - Vence Hoje</span>';
													}else{
														echo '<span class="badge badge-danger" style="font-size:13px;">'.
																formata_data_banco_sem_hora
																($veiculo->veiculo_venc_dut).' - Vencido</span>';
													}
												?>
											</td>

											<td class="text-center"><?php echo '<span class="badge badge-primary" style="font-size:13px;">' . $veiculo->veiculo_cliente . '</span>' ?></td>
										</tr>

									<?php endforeach; ?>


									</tbody>

								</table>
							</div>
						</div>
					</div>


				</div>
				<div class="col-lg-6 mb-4">
					<!-- Illustrations -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">TOP 3 - MAIS SERVIÇOS</h6>
						</div>
						<div class="card-body">
							<div class="text-center">
								<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 15rem;" src="<?php echo
								base_url('public/images/servicos.svg'); ?>" alt="">
							</div>

							<div class="table-responsive">
								<table class="table table-striped table-borderless">

									<thead>
									<tr>
										<th>Nome Serviço</th>
										<th class="text-center">Qtde Serviços</th>
									</tr>

									</thead>
									<tbody>

									<?php foreach ($servicos_mais_vendidos as $servico): ?>

										<tr>
											<td class="text-gray-900" style="font-size:14px;"><?php echo $servico->servico_nome ?></td>
											<td class="text-center"><?php echo '<span class="badge badge-primary" style="font-size:13px;">' . $servico->qtde_serv_vendidos . '</span>' ?></td>
										</tr>

									<?php endforeach; ?>

									</tbody>

								</table>
							</div>
						</div>
					</div>

				</div>

			</div>

		</div>
	</div>
	<!-- /page content -->

	<!-- footer content -->

