<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("header.php"); ?>
  </head>
  <body>
    <div class="container">
      <?php include("nav.php"); ?>
      <main role="main">
        <h1>Login</h1>
        <?php if ($this->session->flashdata('message')) { ?>
          <div class='alert alert-<?=$this->session->flashdata("type");?>' role="alert">
            <?=$this->session->flashdata('message');?>
          </div>
        <?php } ?>
        <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
        <?php echo form_open('welcome'); ?>
        <form>
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input name="email" type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
          <label for="inputPassword">Senha</label>
          <input name="password" type="password" class="form-control" id="inputPassword" placeholder="********">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>

      </form>
      <br><a href="Register">Registrar</a>
      </main>

      
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>