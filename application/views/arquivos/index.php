

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
								<a class="" data-toggle="modal"
								   data-target="#modal-add-arquivo" title="Adicionar Arquivos Alt+A" accesskey="A"
								href="javascript(void)"><i class="fa fa-upload fa-3x"></i>
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
                                    <th class="text-center">Nome Cliente</th>
                                    <th class="text-center">Arquivo</th>
                                    <th class="text-center no-sort">Ações</th>                                   
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($files as $file) : ?>
                                        <tr>
                                        <td class="text-center"><?php echo $file->arquivo_id ?></td>
                                        <td><?php echo $file->arquivo_cliente ?></td>
                                        <td><?php echo $file->arquivo_files ?></td>
                                        <td class="text-center">
											<a title="Download Arquivo"
											   target="_blank" href="<?php echo base_url($file->arquivo_files); ?>" >
												<i class=" fa fa-download"></i></a>
                                            <a title="Excluir arquivo"href="javascript(void)" data-toggle="modal"
                                                data-target="#file-<?php echo $file->arquivo_id; ?>"><i class="fa
                                                fa-close" style="color:red"></i></a>
                                        </td>                               
                                    </tr>
                                    
                                        <!-- Confirma exclusão Modal-->
                                            <div class="modal fade" id="file-<?php echo $file->arquivo_id; ?>"
												 tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tem certeza que deseja excluir?</h5>
                                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body"><h6>Para excluir o arquivo selecionado
															clique em <strong>"Confirmar" !</strong> </h6></div>
                                                    <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                                                    <a class="btn btn-danger" href="<?php echo base_url('arquivos/del/'
															.$file->arquivo_id); ?>">Confirmar</a>
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
						<form action="<?php echo base_url('arquivos/add/')?>" method="post"
							  enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-11">
									<label class="pl-2">Cliente <span>*</span></label>
									<select class="form-control" name="arquivo_cliente_id">
										<option>Selecione o cliente</option>
										<?php foreach ($clientes as $cliente): ?>
											<option value="<?php echo $cliente->cliente_id ?>"
													<?php echo ($cliente->cliente_ativo == 0 ? 'disabled' : '')?>>
												<?php echo $cliente->cliente_nome . ' ' . $cliente->cliente_sobrenome .
														' | CPF/CNPJ: ' . $cliente->cliente_cpf_cnpj; ?><?php echo
												($cliente->cliente_ativo ==
												0 ? $cliente->cliente_nome.'&nbsp; ->&nbsp;Inativo':
														$cliente->cliente_ativo)?></option>
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

								<div class="col-md-3 mt-4"><button type="submit" class="btn
									btn-sm btn-outline-success"><i class="fa
									fa-paper-plane-o"></i> &nbsp;Enviar</button>
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


        <!-- /page content -->

        <!-- footer content -->


  </body>
</html>
