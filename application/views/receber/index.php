

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
						        <a title="Nova conta Alt+O" accesskey="O" href="<?php echo base_url('receber/add');
						        ?>"
								   ><i class="fa fa-plus
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
                                    <th class="text-center">Cliente</th>
                                    <th class="text-center" style="padding-left: 30px !important;">Valor Conta</th>
									<th class="text-center">Data Vencimento</th>
									<th class="text-center">Data Pagamento</th>
									<th class="text-center">Situação</th>
                                    <th class="text-center no-sort pr-4">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($contas_receber as $receber) : ?>
                                        <tr>
                                        <td class="text-center"><?php echo $receber->conta_receber_id ?></td>
                                        <td class="text-center"><?php echo $receber->receber_nome_cliente ?></td>
										<td class="text-center pr-4"><?php echo 'R$&nbsp;'.$receber->conta_receber_valor
											?></td>
										<td class="text-center pr-4"><?php echo formata_data_banco_sem_hora
											($receber->conta_receber_data_venc); ?></td>
											<td class="text-center pr-4"><?php echo ($receber->conta_receber_status == 1 ?
											formata_data_banco_com_hora($receber->conta_receber_data_pagamento) : 'Aguardando Pgto')  ?></td>
										<td class="text-center pr-3">
											<?php

											if($receber->conta_receber_status == 1){

												echo '<span class="badge badge-success btn-sm">Paga</span>';

											}elseif(strtotime($receber->conta_receber_data_venc) > strtotime(date
													('Y-m-d'))){

												echo '<span class="badge badge-secondary btn-sm">À receber</span>';

											}elseif(strtotime($receber->conta_receber_data_venc) == strtotime(date
													('Y-m-d'))){

												echo '<span class="badge badge-warning btn-sm">Vence Hoje</span>';
											}else{
												echo '<span class="badge badge-danger btn-sm">Vencida</span>';
											}
											?>
										</td>

                                        <td class="text-center">
                                            <a title="Editar contas_receber" href="<?php echo base_url('receber/edit/'
													.$receber->conta_receber_id) ?>" data-toggle="tooltip "
											   data-placement="top">
                                            <i class=" fa fa-check"></i></a>
                                            <a title="Excluir contas_receber"href="javascript(void)" data-toggle="modal" 
                                                data-target="#contas_receber-<?php echo $receber->conta_receber_id; ?>"><i
														class="fa
                                                fa-close" style="color:red"></i></a>
                    
                                        </td>                               
                                    </tr>
                                    
                                        <!-- Confirma exclusão Modal-->
                                            <div class="modal fade" id="contas_receber-<?php echo $receber->conta_receber_id;
                                            ?>"
												 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body"><h6>Para excluir a conta selecionada clique
															em <strong>"Confirmar" !</strong> </h6></div>
                                                    <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-danger" href="<?php echo base_url('receber/del/'
															.$receber->conta_receber_id); ?>">Confirmar</a>
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
