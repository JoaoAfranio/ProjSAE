<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/calmui/template/demo/vertical-default-light/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 15:35:36 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CalmUI Admin</title>
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

<body>
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
                  <h4>Cadastrando novo paciente</h4>
                  <p class="card-description">
                    Informe os dados do paciente no formulário abaixo
                  </p>
                  <div class="row">
                  <div class="col-md-6 grid-margin stretch-card">
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="inputNumeroProntuario">Número do prontuário</label>
                        <input type="number" class="form-control" id="inputNumeroProntuario" placeholder="Nº do prontuário">
                      </div>
                      <div class="form-group">
                        <label for="inputNome">Nome da criança</label>
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome">
                      </div>
                      <div class="form-group">
                        <label for="inputDataNascimento">Data de nascimento</label>
                        <input type="date" class="form-control" id="inputDataNascimento" placeholder="dd/mm/yyyy">
                      </div>
                      <div class="form-group">
                        <label for="inputIdade">Idade</label>
                        <input type="number" class="form-control" id="inputIdade" placeholder="Idade">
                      </div>

                    </form>
                  </div>
                  <div class="col-md-6 grid-margin stretch-card">
                      <form class="forms-sample">
                        <div class="form-group">
                            <label for="inputNomeResponsavel">Nome do responsável</label>
                            <input type="text" class="form-control" id="inputNomeResponsavel" placeholder="Nome do responsável">
                        </div>
                        <div class="form-group">
                          <label for="inputGrauParentesco">Grau de parentesco</label>
                          <input type="text" class="form-control" id="inputGrauParentesco" placeholder="Grau de parentesco">
                        </div>
                        <div class="form-group">
                          <label for="inputIdadeMae">Idade da mãe</label>
                          <input type="number" class="form-control" id="inputIdadeMae" placeholder="Idade da mãe">
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Cadastar</button>
                        <button class="btn btn-light">Cancelar</button>
                      </form>
                      </div>
                    </div>
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
  <script src="../../../../js/formpickers.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/calmui/template/demo/vertical-default-light/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 15:35:38 GMT -->
</html>
