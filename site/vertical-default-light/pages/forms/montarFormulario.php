<!DOCTYPE html>
<html lang="pt-br">
<?php

  require '../util/config.php';
  require '../util/conecta.php';

  $con = conecta();

  $resFormulario = mysqli_query($con, 'SELECT * FROM formulario');
  $resAvaliacao = mysqli_query($con, 'SELECT * FROM avaliacao');
?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Projeto SAE</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../../vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../../../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../../../vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="http://www.urbanui.com/">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../images/favicon.png" />
</head>

<body 
<?php
  if(isset($_GET['cad'])) {
    $cadastro = $_GET['cad'];
      if($cadastro == "sucesso"){
          echo "onload=showSwal('success-message')";
      }else{
          echo "onload=showSwal('error-message')";
      }
  }

  if(isset($_GET['deletar'])) {
    $deletar = $_GET['deletar'];
      if($deletar == "sucesso"){
          echo "onload=showSwal('delete-success-message')";
      }else{
          echo "onload=showSwal('delete-error-message')";
      }
  }


?>>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require '../menu/menu.php'; ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4>Cadastrar novo formulário</h4>
                  <p class="card-description">
                    Ex.: Instrumento de Anamnese e Exame Físico - Pediátrico
                  </p>
                  <form class="forms-sample" method="post" action="../cadastrar/cadastrarFormulario.php?acao=cadFormulario">
                    <div class="form-group">
                      <label for="inputPergunta">Nome do formulário</label>
                      <input type="text" class="form-control" name="inputFormulario" placeholder="Nome do Formulário">
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
                    <button class="btn btn-light">Cancelar</button>
                  </form>
                  </div>
              </div>
            </div>          
          <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4>Adicionar avaliações ao formulário</h4>
                  <p class="card-description">
                    Ex.: Exemplo aqui
                  </p>
                  <form class="forms-sample" method="post" action="../cadastrar/cadastrarFormulario.php?acao=formularioAvaliacao">
                    <div class="form-group">
                      <label>Nome do formulário</label>
                      <select class="form-control" name="idFormulario">
                      <?php 
                          foreach ($resFormulario as $Formulario) {
                            echo '<option value="' .  $Formulario['IdFormulario'] . '">' . $Formulario['Descricao'] .'</option>';
                          } 
                      ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="selectAtividade">Selecionar Avaliações</label>
                      <select name="idAvaliacao[]" class="js-example-basic-multiple w-100" multiple>
                      <?php 
                          foreach ($resAvaliacao as $Avaliacao) {
                            echo '<option value="' .  $Avaliacao['IdAvaliacao'] . '">' . $Avaliacao['Descricao'] .'</option>';
                          } 
                      ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
                    <button class="btn btn-light">Cancelar</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php require '../menu/footer.php';?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../../../js/off-canvas.js"></script>
  <script src="../../../../js/hoverable-collapse.js"></script>
  <script src="../../../../js/template.js"></script>
  <script src="../../../../js/settings.js"></script>
  <script src="../../../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../../../js/file-upload.js"></script>
  <script src="../../../../js/iCheck.js"></script>
  <script src="../../../../js/typeahead.js"></script>
  <script src="../../../../js/select2.js"></script>
  <script src="../../../../js/alerts.js"></script>
  <script src="../../../../js/avgrund.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/calmui/template/demo/vertical-default-light/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 15:35:38 GMT -->
</html>
