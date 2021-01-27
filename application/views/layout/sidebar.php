<div class="clearfix"></div>

			<!--trazer usuário atual edição de perfil e colocar username-->
			<?php $user = $this->ion_auth->user()->row(); ?>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?php echo base_url('public/images/img.jpg')?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Bem-vindo,</span>
                <h2>FFSoft</h2>
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
                      <li><a href="os">Recibo</a></li>
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
					<li><a><i class="fa fa-dollar"></i> Financeiro <span class="fa fa-chevron-down"></span></a>
						<ul class="nav child_menu">
							<li><a href="<?php echo base_url('pagar')?>">Contas à Pagar</a></li>
							<li><a href="<?php echo base_url('receber')?>">Contas à Receber</a></li>

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
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">Calendário</a></li>
                      
                    </ul>
                  </li>
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
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
                      <img src="<?php echo base_url('public/images/img.jpg')?>" alt="">FFSoft
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">

                      <a class="dropdown-item"  href="<?php  echo base_url('users/edit/'.$this->session->userdata('user_id'));?>">Perfil</a>
                      <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#logoutModal"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="<?php echo base_url('public/images/img.jpg')?>" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="<?php echo base_url('public/images/img.jpg')?>" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
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

