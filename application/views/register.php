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
        <?php echo anchor('Welcome', 'Voltar') ?>
        <h1>Registrar</h1>
        <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
        <?php echo form_open('Register'); ?>
        <div class="form-group">
          <label">Nome</label>
          <input name="name" type="text" class="form-control" placeholder="Nome">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input name="email" type="text" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
          <label>Senha</label>
          <input name="password" type="password" class="form-control" placeholder="********">
          <label>Confirme sua senha</label>
          <input name="passconf" type="password" class="form-control" placeholder="********">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
      </form>
      </main>
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>