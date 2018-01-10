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
        <?php echo anchor('Posts', 'Voltar') ?>
        <h1>Alterar Senha</h1>
        <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
        <?php echo form_open('Register/ResetPassword'); ?>
        <div class="form-group">
          <label">Senha atual</label>
          <input name="password" type="password" class="form-control" placeholder="Nome">
        </div>
        <div class="form-group">
          <label>Nova senha</label>
          <input name="newpassword" type="password" class="form-control" placeholder="********">
          <label>Confirme sua nova senha</label>
          <input name="passconf" type="password" class="form-control" placeholder="********">
        </div>
        <button type="submit" class="btn btn-primary">OK</button>
      </form>
      </main>
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>