<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SAE</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="css/iconfonts/mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="css/vendor.bundle.base.css">
  <link rel="stylesheet" href="css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="http://www.urbanui.com/">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.ico" />

</head>



<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="images/logo.png" alt="logo">
              </div>
              <h4>Seja bem-vindo novamente!</h4>
              <h6 class="font-weight-light">Vamos começar o trabalho?</h6>
              <form class="pt-3" action="controller/FuncionarioController.php?acao=autenticar"  method="post">
                <div class="form-group">
                  <label for="exampleInputEmail">Usuário</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" name="login" id="login" placeholder="Usuário">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Senha</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" name="senha" id="senha" placeholder="Senha">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Mantenha-me conectado
                    </label>
                  </div>
                </div>
                <div class="my-3">
                  <button  class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="entrar" name="entrar" id="entrar" onclick="return validaCampo(); return false;" >LOGIN</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row"><img src="images/back.png"></div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="js/vendor.bundle.base.js"></script>
  <script src="js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
</body>


<!-- Mirrored from www.urbanui.com/calmui/template/demo/vertical-default-light/pages/samples/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 13:40:07 GMT -->
</html>



<!--
<form  style="margin-top: 50px;margin-left: 20px;" action="login.php"  method="post" name="login" id="login">
          <input placeholder="Login" type="text" class="login_input" name="login" id="login" >
          <input style="margin-bottom: 20px;" placeholder="Senha" type="password" class="login_input" name="senha" id="senha">
          <br>
          <a style="margin-left: 50px;margin-top: 10px;" href="cadastro.html">Não possui uma conta?</a>
          <button class="button-login" type="submit" value="entrar" name="entrar" id="entrar" onclick="return validaCampo(); return false;">Entrar</button>
          

          </form>
-->