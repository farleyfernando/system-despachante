

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
						        <a title="Novo veiculo Alt+O" accesskey="O" href="<?php echo base_url('veiculos/add');
						        ?>"><i class="fa fa-plus fa-2x" style="color:#50ab78"></i>&nbsp;<i class="fa fa-car
						        fa-2x" style="color:#50ab78"></i></a>
					        </div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                            
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th class="text-center pr-2">Placa</th>
                                    <th class="text-center pr-2">Proprietário</th>
                                    <th class="text-center pr-2">Tipo</th>
                                    <th class="text-center pr-2">Chassi</th>
                                    <th class="text-center pr-2">Cor</th>
                                    <th class="text-center pr-2">Renavam</th>
                                    <th class="text-center pr-2">Data Venc. DUT</th>
                                    <th class="text-center pr-2">Açoes</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($veiculos as $veiculo) : ?>
                                        <tr>
                                        <td class="text-center"><?php echo $veiculo->veiculo_placa ?></td>
                                        <td class="text-center"><?php echo $veiculo->veiculo_cliente ?></td>
                                        <td class="text-center"><?php echo $veiculo->veiculo_tipo ?></td>
                                        <td class="text-center"><?php echo $veiculo->veiculo_chassi ?></td>
                                        <td class="text-center"><?php echo $veiculo->veiculo_cor ?></td>
                                        <td class="text-center"><?php echo $veiculo->veiculo_renavam ?></td>
                                        <td class="text-center"><?php echo formata_data_banco_sem_hora($veiculo->veiculo_venc_dut) ?></td>

										<td class="text-center">
                                            <a title="Editar veiculo" href="<?php echo base_url('veiculos/edit/'
													.$veiculo->veiculo_id) ?>" data-toggle="tooltip " data-placement="top">
                                            <i class=" fa fa-check"></i></a>
                                            <a title="Excluir veiculo"href="javascript(void)" data-toggle="modal" 
                                                data-target="#veiculo-<?php echo $veiculo->veiculo_id; ?>"><i class="fa
                                                fa-close" style="color:red"></i></a>
                    
                                        </td>                               
                                    </tr>
                                    
                                        <!-- Confirma exclusão Modal-->
                                            <div class="modal fade" id="veiculo-<?php echo $veiculo->veiculo_id; ?>"
												 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body"><h6>Para excluir a veiculo selecionado clique
															em <strong>"Confirmar" !</strong> </h6></div>
                                                    <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-danger" href="<?php echo base_url('veiculos/del/'.$veiculo->veiculo_id); ?>">Confirmar</a>
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
