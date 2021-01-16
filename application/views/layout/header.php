<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="ffsoft" content="sistema para despachante">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('public/images/ffsofticone.png')?>">

    <?php echo (isset($titulo) ? '<title> System - Despachante | '. $titulo.'</title>' : '<System></title>') ?>

    <!-- Inclusão de styles vindo de controllers usuarios-->
    <?php if(isset($styles)): ?>

    <?php foreach($styles as $style): ?>

        <link href="<?php echo base_url('public/'.$style); ?>" rel="stylesheet">

    <?php endforeach; ?>

    <?php endif; ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo base_url('home')?> " class="site_title"><i class="fa fa-paw"></i> <span>FFSoft - System</span></a>
            </div>