<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="ffsoft" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/images/ffsofticone.png')?>">

    <?php echo (isset($titulo) ? '<title> System - Despachante | '. $titulo.'</title>' : '<System></title>') ?>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('public/vendors/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url('public/vendors/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url('public/vendors/nprogress/nprogress.css')?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="echo base_url('public/vendors/animate.css/animate.min.css')?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url('public/build/css/custom.min.css')?>" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <!-- ============================================================== -->
        <!--                    MENSAGENS AO USUARIO                        -->
        <!-- ============================================================== -->

        

      <div class="login_wrapper">
        <div class="animate form login_form">

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
                
          <section class="login_content">
              
            <form method="post" id="loginform" action="<?php echo base_url('login/auth') ?>">
              <h1>LOGIN</h1>
              <div>
                <input type="email" class="form-control" name="email" placeholder="E-mail" required="" />
              </div>
              <div>
                <input type="password" class="form-control" name="password" placeholder="Senha" required="" />
              </div>
              <div>
                  <div style="width: 90; height:10">
                    <button type="submit" class="btn btn-outline-dark">Entrar</button>
                  </div>
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div class="mr-5">
                  <img src="<?php echo base_url('public/images/sysdes.png')?>" width=400 height=50>
                </div>
				  <div class="ml-4 mt-3">
					  <a href="https://farleyfernando.com.br" target="_blank">© <?php echo date('Y')?> - Todos os
						  direitos reservados - FFSoft </a>
				  </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <script src="<?php echo base_url('public/vendors/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('public/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>.
    <script src="<?php echo base_url('public/vendors/nprogress/nprogress.js') ?>"></script>   
    <script src="<?php echo base_url('public/build/js/custom.min.js') ?>"></script>
  </body>
</html>
