

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
						        <a title="Novo cliente Alt+O" accesskey="O" href="<?php echo base_url('clientes/add');
						        ?>"><i class="fa fa-user-plus fa-3x" style="color:seagreen"></i></a>&nbsp;
								<a class="" data-toggle="modal"
								   data-target="#modal-add-arquivo" title="Adicionar Arquivos Alt+A" accesskey="A"
								href="javascript(void)
                                     "><i class="fa fa-upload fa-3x"></i>
								</a>
					        </div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                            
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">CPF/CNPJ</th>
                                    <th class="text-center">Tipo Cliente</th>
                                    <th class="text-center">Ativo</th>
                                    <th class="text-center no-sort">Ações</th>                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clientes as $client) : ?>
                                        <tr>
                                        <td class="text-center"><?php echo $client->cliente_id ?></td>
                                        <td><?php echo $client->cliente_nome . ' ' . $client->cliente_sobrenome ?></td>
                                        <td class="text-center"><?php echo $client->cliente_cpf_cnpj ?></td>

                                        <td class="text-center pr-1"><?php echo ($client->cliente_tipo == 2 ? '<span class="badge badge-dark btn-sm">PJ</span>' : '<span class="badge badge-warning btn-sm">PF</span>') ?></td>
								        <td class="text-center"><?php echo ($client->cliente_ativo == 1 ? '<span class="badge badge-info btn-sm">Sim</span>' : '<span class="badge badge-secondary btn-sm">Não</span>') ?></td>
                                        <td class="text-center">
                                            <a title="Editar Cliente" href="<?php echo base_url('clientes/edit/'.$client->cliente_id) ?>" data-toggle="tooltip " data-placement="top">
                                            <i class=" fa fa-check"></i></a>
											<a class="" data-toggle="modal"
											   data-target="#modal-list-arquivo" title="Listar Arquivos"href="javascript
											   (void)
                                                 "><i class="fa fa-upload"></i>
											</a>
                                            <a title="Excluir Cliente"href="javascript(void)" data-toggle="modal" 
                                                data-target="#cliente-<?php echo $client->cliente_id; ?>"><i class="fa
                                                fa-close" style="color:red"></i></a>
                                        </td>                               
                                    </tr>
                                    
                                        <!-- Confirma exclusão Modal-->
                                            <div class="modal fade" id="cliente-<?php echo $client->cliente_id; ?>"
												 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body"><h6>Para excluir o cliente selecionado
															clique em <strong>"Confirmar" !</strong> </h6></div>
                                                    <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-danger" href="<?php echo base_url('clientes/del/'.$client->cliente_id); ?>">Confirmar</a>
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
			<!-- Modal add arquivos-->
			<div class="modal fade" id="modal-add-arquivo"
				 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Adicionar Arquivos</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
						<form action="<?php echo base_url('clientes/add_arq/')?>" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-10">
									<label class="pl-2">Cliente <span>*</span></label>
									<select class="form-control" name="arquivo_cliente_id">
										<option>Selecione o cliente</option>
										<?php foreach ($clientes as $cliente): ?>
											<option value="<?php echo $cliente->cliente_id ?>"
													<?php echo ($cliente->cliente_ativo == 0 ? 'disabled' : '')?>>
												<?php echo $cliente->cliente_nome . ' ' . $cliente->cliente_sobrenome .
														' | CPF/CNPJ: ' . $cliente->cliente_cpf_cnpj; ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div><br>
							<div class="row pr-5">
								<div class="col-md-9">
									<label class=""></label>
									<input type="file" name="arquivo_files" class="form-control-sm"
										   value="<?php echo set_value('arquivo_files'); ?>"
										   placeholder="" required>
									<?php echo form_error('arquivo_files','<small class="form-text text-danger">','</small>')
									; ?>
								</div>

								<div class="col-md-3 mt-4">
									<button type="submit" class="btn
									btn-sm btn-outline-success"><i class="fa
									fa-paper-plane-o"
										></i> &nbsp;Enviar</button>
								</div>

							</div>

							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
							</div>
						</form>
					</div>
				</div>
			</div>

			<!-- Modal listar arquivos-->
			<div class="modal fade" id="modal-list-arquivo"
				 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Arquivos Adicionados</h5>
							<button class="close" type="button" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">×</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="table-responsive">
								<table class="table table-striped table-borderless">

									<thead>
									<tr>
										<th >#</th>
										<th class="text-center">Nome Arquivo</th>
										<th class="text-center">Nome cliente</th>
										<th class="text-center">Açoes</th>
									</tr>

									</thead>
									<tbody>

									<?php foreach ($files as $file): ?>

										<tr>
											<td class="text-gray-900" style="font-size:14px;"><?php echo
												$file->arquivo_id ?></td>
											<td class="text-center" style="font-size:14px;">
												<?php echo $file->arquivo_files
												?><?php echo ($client->cliente_id == $file->arquivo_cliente_id ?
														$file->arquivo_files : '');
												?></td>
											<td class="text-gray-900" style="font-size:14px;"><?php echo
												$file->arquivo_cliente ?>
												</td>
											<td class="text-center"><a title="Download Arquivo"
											 href="<?php echo base_url($file->arquivo_files); ?>" data-toggle="tooltip " data-placement="top">
													<i class=" fa fa-upload"></i></a></td>
										</tr>
									<?php endforeach; ?>


									</tbody>

								</table>
							</div>


						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
						</div>
					</div>
				</div>
			</div>


        <!-- /page content -->

        <!-- footer content -->


  </body>
</html>
