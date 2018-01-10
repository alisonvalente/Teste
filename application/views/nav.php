<header class="header clearfix">
  <nav>
    <ul class="nav nav-pills float-right">
      <?php if($this->session->userdata('logged_in')) { ?>
      <li class="nav-item">
        <a class="nav-link">Olá, <?=$this->session->userdata('logged_in')['user_name'];?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Register/ResetPassword">Alterar senha</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Welcome/Logout">Sair</a>
      </li>
      <?php } ?>
    </ul>
  </nav>
  <h3 class="text-muted">Teste</h3>
</header>