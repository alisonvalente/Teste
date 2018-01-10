<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  <head>
    <?php include("header.php"); ?>
  </head>
  <body>
    <div class="container">
      <?php include("nav.php"); ?>
      <main role="main">
        <?php echo anchor('Posts', 'Voltar') ?>
        <h1>Editar Post</h1>
        <?php echo validation_errors('<div class="alert alert-warning" role="alert">', '</div>'); ?>
        <?php echo form_open('Posts/Edit/'.$id); ?>
          <div class="form-group">
            <label">Titulo</label>
            <input name="title" type="text" class="form-control" value="<?=$title?>">
          </div>
          <div class="form-group">
            <label>Descrição</label>
            <textarea name="description" class="form-control" rows="3"><?=$description?></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </main>
      <?php include("footer.php"); ?>
    </div>
  </body>
</html>