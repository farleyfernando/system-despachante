

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
                                <li class="breadcrumb-item"><a href="home">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $titulo;?></li>
                            </ol>
                            
                            <div class="clearfix"></div>
                            <div class="mt-3 mb-3" style="float: right;">
						        <a title="Novo cor Alt+O" accesskey="O" href="<?php echo base_url('cores/add'); ?>"
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
                                    <th class="text-center">Cor</th>
                                    <th class="text-center">Ativo</th>
                                    <th class="text-center no-sort">Ações</th>                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($cores as $cor) : ?>
                                        <tr>
                                        <td class="text-center"><?php echo $cor->cor_id ?></td>
                                        <td class="text-center"><?php echo $cor->cor_nome ?></td>
										<td class="text-center"><?php echo ($cor->cor_ativo == 1 ? '<span class="badge badge-info btn-sm">Sim</span>' : '<span class="badge badge-secondary btn-sm">Não</span>') ?></td>
                                        <td class="text-center">
                                            <a title="Editar cor" href="<?php echo base_url('cores/edit/'
													.$cor->cor_id) ?>" data-toggle="tooltip " data-placement="top">
                                            <i class=" fa fa-check"></i></a>
                                            <a title="Excluir cor"href="javascript(void)" data-toggle="modal" 
                                                data-target="#cor-<?php echo $cor->cor_id; ?>"><i class="fa
                                                fa-close" style="color:red"></i></a>
                    
                                        </td>                               
                                    </tr>
                                    
                                        <!-- Confirma exclusão Modal-->
                                            <div class="modal fade" id="cor-<?php echo $cor->cor_id; ?>"
												 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body"><h6>Para excluir a cor selecionado clique
															em <strong>"Confirmar" !</strong> </h6></div>
                                                    <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-danger" href="<?php echo base_url('cores/del/'.$cor->cor_id); ?>">Confirmar</a>
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
