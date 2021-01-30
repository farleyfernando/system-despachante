<?php $totalServico = 0;
      $totalProdutos = 0; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php echo(isset($titulo) ? '<title>SysDES | ' . $titulo . '</title>' : '<title>SysDES</title>') ?>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="icon" href="<?php echo base_url('public/img/icontech.png') ?>" type="image/x-icon">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public//impressao/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/impressao/css/matrix-style.css"/>
	<link href="<?php echo base_url(); ?>public/impressao/font-awesome/css/font-awesome.css" rel="stylesheet"/>
	<link href="<?= base_url('public/impressao/css/custom.css'); ?>" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

	<style>
		.table {
			margin-bottom: 5px;
		}
	</style>
</head>

<body>

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">

			<div class="invoice-content">
				<div class="invoice-head" style="margin-bottom: 0">

					<table class="table table-condensed">
						<tbody>
						<?php if ($empresa == null) { ?>

							<tr>
								<td colspan="3" class="alert">Você precisa configurar os dados do emitente. >>><a
											href="<?php echo base_url('empresa'); ?>">Configurar</a>
									<<<
								</td>
							</tr> <?php } else { ?>
							<tr>
								<td style="width: 25%"><img src="<?php echo base_url(); ?>public/images/icontech.png"
															style="max-height: 100px"></td>
								<td>
									<span style="font-size: 20px; "> <?php echo $empresa->empresa_nome_fantasia;
									?></span> </br>
									<span><b>CNPJ: </b><?php echo $empresa->empresa_cnpj; ?> </br> <b>End: </b><?php
										echo $empresa->empresa_endereco
												. ', ' . $empresa->empresa_numero . ' - ' . $empresa->empresa_bairro
												. ' - ' . $empresa->empresa_cidade . ' - ' . $empresa->empresa_estado
												. ' - ' . $empresa->empresa_cep; ?> </span> </br>
									<span><b>Telefone: </b><?php echo $empresa->empresa_tel_fixo; ?></span></td>
								<td style="width: 18%; text-align: center"><h5><strong>N° Recibo:
									<span><?php echo $recibo_servico->recibo_servico_id ?></span></strong></h5>
									<span>Data Emissão:
										<?php echo date('d/m/Y') ?></span>
								</td>
							</tr>

						<?php } ?>
						</tbody>
					</table>


					<table class="table table-condensend">
						<tbody>
						<tr>
							<td style="width: 50%; padding-left: 0">
								<ul>
									<li>
										<span>
											<h5><b>CLIENTE</b></h5>
											<span><b>Nome: </b><?php echo $recibo_servico->cliente_nome_completo
												?></span><br/>
											<span><b>CPF: </b><?php echo $recibo_servico->cliente_cpf_cnpj ?></span><br>
											<span><b>Celular: </b><?php echo $recibo_servico->cliente_celular
												?></span><br>
											<span><b>End: </b><?php echo $recibo_servico->cliente_endereco_completo
												?></span><br>
											<span><b>Cidade: </b><?php echo $recibo_servico->cliente_cidade
												?></span><br>
									</li>
								</ul>
							</td>
							<td style="width: 50%; padding-left: 0">
								<ul>
									<li>
										<span>
											<h5><b>Dados do Veículo</b></h5>
										</span>
										<span><b>Marca/Modelo: </b><?php echo $recibo_servico->marca_modelo; ?></span>
										<br/><span><b>Tipo: </b> <?php echo $recibo_servico->tipo; ?></span>
										<br/>
										<span><b>Cor: </b><?php echo $recibo_servico->cor; ?></span>
										<br/>
										<span><b>Placa: </b><?php echo $recibo_servico->placa; ?></span> <br/>
										<span><b>Renavam: </b> <?php echo $recibo_servico->renavam; ?></span><br/>

									</li>
								</ul>
							</td>
						</tr>
						</tbody>
					</table>

				</div>

				<div style="margin-top: 0; padding-top: 0">


					<table class="table table-condensed">
						<tbody>

						<?php if ($recibo_servico->recibo_servico_data_emissao != null) { ?>

							<?php if ($recibo_servico->recibo_servico_obs != null) { ?>
								<tr>
									<td colspan="5">
										<b>OBSERVAÇÕES: </b>
										<?php echo htmlspecialchars_decode($recibo_servico->recibo_servico_obs) ?>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>

						</tbody>
					</table>

					<?php if ($recibo_servico != null) { ?>
						<table class="table table-bordered table-condensed">
							<thead>
							<tr>
								<th>Serviço</th>
								<th>Quantidade</th>
								<th>Desconto %</th>
								<th>Preço unit.</th>
								<th>Total</th>
							</tr>
							</thead>
							<tbody>
							<?php
							setlocale(LC_MONETARY, 'en_US');
							foreach ($servicos_recibo as $s) {
								echo '<tr>';
								echo '<td>' . $s->servico_descricao . '</td>';
								echo '<td style="text-align: center">' . $s->recibo_ts_quantidade . '</td>';
								echo '<td style="text-align: center">' . $s->recibo_ts_valor_desconto . '</td>';
								echo '<td style="text-align: center">R$ ' .$s->recibo_ts_valor_unitario.
										'</td>';
								echo '<td style="text-align: center">R$ ' . number_format($s->recibo_ts_valor_total, 2,
												',', '.') . '</td>';
								echo '</tr>';
							} ?>

							<tr>
								<td colspan="3" style="text-align: right"><strong>Total:</strong></td>
								<td><strong>R$ <?php echo number_format($valor_final_recibo->os_valor_total, 2, ',',
												'.'); ?></strong></td>
							</tr>
							</tbody>
						</table>
					<?php } ?>
					<?php
					echo "<h4 style='text-align: right'>Valor Total: R$ " . number_format
							($valor_final_recibo->os_valor_total,
									2, ',', '.') . "</h4>";

					?>

					<table class="table table-bordered table-condensed">
						<tbody>
						<tr>
							<td style="text-align: center; font-size: 18px;"><strong>DECLARAÇÃO</strong><br><br>
								<p style="text-align: left; font-size: 13px;">DECLARO PARA OS DEVIDOS FINS,
									QUE FOI DADO ENTRADA EM NOSSO ESCRITÓRIO OS DOCUMENTOS DO VEÍCULO MENCIONADO ACIMA.
								</p><br>
							</td>

						</tr>
						</tbody>
					</table>

					<table class="table table-bordered table-condensed">
						<tbody>
						<tr>
							<td>Data<br>
								<?php echo formata_data_banco_sem_hora($recibo_servico->recibo_servico_data_emissao) ?>
							</td>
							<td>Assinatura do Cliente
								<hr>
							</td>
							<td>Assinatura - Escritório
								<hr>
							</td>
						</tr>
						</tbody>
					</table>

					<img src="<?php echo base_url(); ?>public/images/tesoura.png"/>

				</div>
			</div>
		</div>
	</div>
</div>


<script src="<?php echo base_url(); ?>public/impressao/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>public/impressao/js/matrix.js"></script>

<script>
	//window.print();
</script>

</body>

</html>

