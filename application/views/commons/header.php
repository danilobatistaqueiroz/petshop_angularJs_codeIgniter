<!DOCTYPE html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="PetShop">
    <meta name="author" content="Danilo Batista de Queiroz">
    <title>Petshop</title>
    <script src="<?php echo asset_url();?>js/jquery-2.2.4.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://getbootstrap.com/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>

  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>    
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-left">
            <li><img style="margin:10px;" src="<?php echo asset_url();?>images/paw-brand.jpg"/></li>
            <li><a href="#">Home</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#shopcart">ShopCart</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" onclick="$('#btnLogin').click();">Login</a></li>
          <li><a href="/views/modals/login.php">Register</a></li>
        </ul>
      </div>
    </nav>
    <button id="btnLogin" style="display:none" type="button" data-toggle="modal" data-target="#exampleModal"></button>
    <style>
      li:hover{
        background-color:#FFFFFF;
      }
      .navbar-brand
      {
          position: absolute;
          width: 100%;
          left: 0;
          text-align: center;
          margin:0 auto;
      }
      .navbar-toggle {
          z-index:3;
      }
    </style>