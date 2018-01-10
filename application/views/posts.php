<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!doctype html>
<html lang="en">
  <head>
    <?php include("header.php"); ?>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.11.2/themes/redmond/jquery-ui.css">  
  </head>
  <body>
    <div class="container">
      <?php include("nav.php"); ?>
      <main role="main">
        <?php if ($this->session->flashdata('message')) { ?>
          <div class='alert alert-<?=$this->session->flashdata("type");?>' role="alert">
            <?=$this->session->flashdata('message');?>
          </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-12">
              <a href="Posts/Create"><input type="button" class="btn btn-primary float-right" value="+ Novo Post"></a>
            </div>
        </div>
        <div class="row marketing">
          <div class="col-lg-12">
            <?php foreach ($posts as $post) { ?>
            <div class="card border-secondary mb-3">
              <div class="card-header"><?=$post['title']?></div>
              <div class="card-body text-secondary">
                <p class="card-text"><?=$post['description']?></p>
                <?php if ($post['usrId'] == $this->session->userdata('logged_in')['user_id']) { ?>
                  <?php echo anchor('Posts/Edit/'.$post["id"], 'Editar', 'class="card-link"') ?>
                  <?php echo anchor('Posts/Delete/'.$post["id"], 'Excluir', 'class="card-link open"') ?>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
          </div>
        </div>
        <div class="unique" style="display:none;">Tem certeza que deseja excluir o item?</div>
      </main>
      <?php include("footer.php"); ?>
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
      <script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
      <script>
        $(function () {
          $('.open').on("click", function (e) {
              var link = this;

              e.preventDefault();

              $('.unique').dialog({
                  buttons: {
                      "Sim": function () {
                        $(this).dialog("close");
                          window.location.href = $(link).attr("href");
                      },
                      "Cancel": function () {
                          $(this).dialog("close");
                      }
                  }
              });
          });
        });
      </script>
    </div>
  </body>
</html>