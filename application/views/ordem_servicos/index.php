

            <?php $this->load->view('layout/sidebar'); ?>

                

                <!-- page content -->
                <div class="right_col" role="main">
                
                <div class="">                    
                    <div class="page-title">                                       
                    </div>
                    <div class="clearfix"></div>
                    <div class="row">                           
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                        <div class="x_title mt-2">
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
                <!-- ============================================================== -->
                <!--                         breadcrumb                             -->
                <!-- ============================================================== -->

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="home">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
                            </ol>
                            
                            <div class="clearfix"></div>
                            <div class="mt-3 mb-3" style="float: right;">
						        <a title="Nova os Alt+O" accesskey="O" href="<?php echo base_url('os/add'); ?>"
								   ><i class="fa fa-plus-square-o
						        fa-3x"
								   style="color:seagreen"></i></a>
					        </div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                            
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center" style="padding-right: 1rem;">Data Emissão</th>
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center pr-1">Placa</th>
									<th class="text-center" style="padding-right: 1rem;">Valor Total</th>
									<th class="text-center pr-1">Status Ordem</th>
                                    <th class="text-center no-sort" style="padding-right: 1rem;">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($ordens_servicos as $os) : ?>
                                        <tr>
                                        <td class="text-center"><?php echo $os->ordem_servico_id ?></td>
										<td class="text-center"><?php echo formata_data_banco_com_hora
											($os->ordem_servico_data_emissao) ?></td>
										<td><?php echo $os->recibo_nome_cliente ?></td>
										<td class="text-center"><?php echo $os->ordem_placa ?></td>
										<td class="text-center pr-3"><?php echo 'R$&nbsp;'.$os->ordem_servico_valor_total ?></td>

										<?php

										if($os->ordem_servico_status == 'CONCLUIDO'){

											echo '<td class="text-center"><span class="badge badge-success btn-sm">CONCLUÍDO</span></td>';

										}elseif($os->ordem_servico_status == 'REAGENDADO'){

											echo '<td class="text-center"><span class="badge badge-info btn-sm">REAGENDA PELO ESCRITÓRIO</span></td>';

										}elseif($os->ordem_servico_status == 'CANCELADO'){

											echo '<td class="text-center"><span class="badge badge-danger btn-sm">CANCELADO PELO CLIENTE</span></td>';

										}elseif($os->ordem_servico_status == 'AGENDAMENTO'){

											echo '<td class="text-center"><span class="badge badge-warning btn-sm text-gray-900">AGENDAMENTO REALIZADO</span></td>';

										}elseif($os->ordem_servico_status == 'RETIRADA'){

											echo '<td class="text-center"><span class="badge badge-warning btn-sm text-gray-900">AGUARDANDO RETIRADA DOC</span></td>';

										}else{
											echo '<td class="text-center"><span class="badge badge-dark btn-sm">AGUARDANDO AGENDAMENTO</span></td>';
										}

										?>

                                        <td class="text-center">
                                            <a title="Editar recibo" href="<?php echo base_url('os/edit/'
													.$os->ordem_servico_id) ?>" data-toggle="tooltip " data-placement="top">
                                            <i class=" fa fa-check"></i></a>
                                            <a title="Excluir recibo"href="javascript(void)" data-toggle="modal"
                                                data-target="#os-<?php echo $os->ordem_servico_id; ?>"><i class="fa
                                                fa-close" style="color:red"></i></a>
											<a title="Imprimir recibo" target="_blank" href="<?php echo base_url('os/imprimirA4/'
													.$os->ordem_servico_id) ?>" data-toggle="tooltip "
											   data-placement="top">
												<i class=" fa fa-print"></i></a>
                    
                                        </td>                               
                                    </tr>
                                    
                                        <!-- Confirma exclusão Modal-->
                                            <div class="modal fade" id="os-<?php echo $os->ordem_servico_id; ?>"
												 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que
														deseja excluir? A exclusão causará divergência no relatório
														.</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body"><h6>Para excluir o recibo selecionado clique
															em <strong>"Confirmar" !</strong> </h6></div>
                                                    <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-danger" href="<?php echo base_url('os/del/'.$os->ordem_servico_id); ?>">Confirmar</a>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
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
    </div>
</div>
</div>
</div>
</div>
        <!-- /page content -->

        <!-- footer content -->
        

  </body>
</html>
