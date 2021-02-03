<div class="clearfix"></div>

			<!--trazer usuário atual edição de perfil e colocar username-->


            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('public/images/user.png')?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem-vindo,</span>
				  <?php $user = $this->ion_auth->user()->row(); ?>
                <h2><?php echo ($user) ? $user->first_name : 'SysDES';
					?></h2>

              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?php echo base_url('home')?>"><i class="fa fa-home"></i> Home <span class=""></span></a></li>

                  <li><a><i class="fa fa-desktop"></i> Serviços <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('os')?>">Ordens Serviços</a></li>
                      <li><a href="<?php echo base_url('recibos')?>">Recibos</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-plus-square"></i> Cadastros <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('clientes')?>">Clientes</a></li>
                      <li><a href="<?php echo base_url('servicos')?>">Serviços</a></li>
                      <li><a href="<?php echo base_url('veiculos')?>">Veículos</a></li>
                      <li><a href="<?php echo base_url('fornecedores')?>">Fornecedores</a></li>
					  <li><a href="<?php echo base_url('pag')?>">Formas de Pgto</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-car"></i> Veículos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo base_url('categorias')?>">Categorias</a></li>
                      <li><a href="<?php echo base_url('cores')?>">Cores</a></li>
                      <li><a href="<?php echo base_url('tipos')?>"">Tipos</a></li>
                      <li><a href="<?php echo base_url('combustivel')?>"">Combustíveis</a></li>
					  <li><a href="<?php echo base_url('especies')?>"">Espécies</a></li>
                    </ul>
                  </li>

					<?php if($this->ion_auth->is_admin()) : ;?>
							<li><a><i class="fa fa-dollar"></i> Financeiro <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li><a href="<?php echo base_url('pagar')?>">Contas à Pagar</a></li>
									<li><a href="<?php echo base_url('receber')?>">Contas à Receber</a></li>
								</ul>
							</li>
							<li><a><i class="fa fa-line-chart"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
								<ul class="nav child_menu">
									<li><a href="<?php echo base_url('relatorios/pagar')?>">Contas à Pagar</a></li>
									<li><a href="<?php echo base_url('relatorios/receber')?>">Contas à Receber</a></li>
									<li><a href="<?php echo base_url('relatorios/receitas')?>">Serviços</a></li>
								</ul>
							</li>
						</ul>
					  </div>
					  <!-- MODULO CONFIG -->
					  <div class="menu_section">
						<h3>CONFIGURAÇÕES</h3>
						<ul class="nav side-menu">
						  <li><a><i class="fa fa-globe"></i> Sistema <span class="fa fa-chevron-down"></span></a>
							<ul class="nav child_menu">
							  <li><a href="<?php echo base_url('users') ?>">Usuários</a></li>
							  <li><a href="<?php echo base_url('empresa') ?>">Empresa</a></li>
							</ul>
						  </li>
					<?php endif;?>

                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="arquivos">Central Arquivos</a></li>
					  <li><a href="calendario">Calendário</a></li>

                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="false"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-placement="top" href="#" data-toggle="modal" data-target="#logoutModal"
				 title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">

                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?php echo base_url('public/images/user.png')?>" alt=""><?php echo ($user) ?
								$user->first_name : 'SysDES';
						?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">

                      <a class="dropdown-item"  href="<?php  echo base_url('users/edit/'.$this->session->userdata('user_id'));?>">Perfil</a>
                      <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>

		<?php if(isset($contador_notificacoes) and $contador_notificacoes > 0): ?>

                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-bell-o"></i>
                      <span class="badge bg-green"><?php echo $contador_notificacoes; ?></span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">

				<!-- Dropdown - Alerts contas a receber vencidas-->
				<?php if ($contas_receber_vencidas) : ?>
                      <li class="nav-item">
                        <a class="dropdown-item" href="<?php echo base_url('receber'); ?>">
                          <span>
                            <span class="time"><?php echo ucfirst( utf8_encode( strftime("%d de %B de %Y", strtotime("now") ) ) ); ?></span>
                          </span>
                          <span class=""><br>
                            <i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp;&nbsp;Existem contas a receber vencidas!
                          </span>
                        </a>
                      </li>
				<?php endif; ?>

						<!-- Dropdown - Alerts contas a pagar vencidas-->
				<?php if ($contas_pagar_vencidas) : ?>
							<li class="nav-item">
								<a class="dropdown-item" href="<?php echo base_url('pagar'); ?>">
                          <span>
                            <span class="time"><?php echo ucfirst( utf8_encode( strftime("%d de %B de %Y", strtotime("now") ) ) ); ?></span>
                          </span>
									<span class=""><br>
                            <i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp;&nbsp;Existem contas à pagar vencidas!
                          </span>
								</a>
							</li>
				<?php endif; ?>

						<!-- Dropdown - Alerts contas a receber vencem hoje-->
				<?php if ($contas_receber_vencem_hoje) : ?>
							<li class="nav-item">
								<a class="dropdown-item" href="<?php echo base_url('receber'); ?>">
                          <span>
                            <span class="time"><?php echo ucfirst( utf8_encode( strftime("%d de %B de %Y", strtotime("now") ) ) ); ?></span>
                          </span>
							<span class=""><br>
                            <i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp;&nbsp;Existem contas à receber
								vencendo hoje!
                          </span>
								</a>
							</li>
				<?php endif; ?>
						<!-- Dropdown - Alerts contas a pagar vencem hoje-->
				<?php if ($contas_pagar_vencem_hoje) : ?>
							<li class="nav-item">
								<a class="dropdown-item" href="<?php echo base_url('pagar'); ?>">
                          <span>
                            <span class="time"><?php echo ucfirst( utf8_encode( strftime("%d de %B de %Y", strtotime("now") ) ) ); ?></span>
                          </span>
									<span class=""><br>
                            <i class="fa fa-bell-o" aria-hidden="true"></i>&nbsp;&nbsp;Existem contas à pagar
										vencendo hoje!
                          </span>
								</a>
							</li>
				<?php endif; ?>
                    </ul>
                  </li>

		<?php endif; ?>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body"><h6>Clique em <strong>"Sair"</strong> para encerrar sua sessão atual.</h6></div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="<?php echo base_url('login/logout'); ?>">Sair</a>
                </div>
            </div>
            </div>
        </div>

