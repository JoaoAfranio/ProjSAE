<?php
include $_SERVER["DOCUMENT_ROOT"] . "/sae/template/header.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/TipoPacienteModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/UnidadeInternacaoModel.php";


$unidadeInternacao = new UnidadeInternacaoModel();
$resUnidadeInternacao = $unidadeInternacao->listarTodos();

$tipoPaciente = new TipoPacienteModel();
$resTipoPaciente = $tipoPaciente->listarTodos();
?>


<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require '../template/menuENF.php'; ?>
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

                    <form action="../controller/PacienteController.php?acao=cadastrar" method="post" class="forms-sample">
                      <div class="form-group">
                        <label for="inputCodigoPaciente">Código do paciente</label>
                        <input required type="text" class="form-control" name="codigoPaciente" placeholder="Código do paciente">
                      </div>
                      <div class="form-group">
                        <label for="inputNome">Nome do paciente</label>
                        <input required type="text" class="form-control" name="nome" placeholder="Nome">
                      </div>
                      <div class="form-group">
                        <label for="inputCategoria">Categoria do paciente</label>
                        <select required class="form-control" name="idTipoPaciente">
                          <?php foreach($resTipoPaciente as $tipoPaciente){?>
                            <option <?php echo "value='" . $tipoPaciente['IdTipoPaciente'] . "'"?>> <?php echo $tipoPaciente['Descricao'];?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputUnidade">Unidade de internação</label>
                          <select required class="form-control" name="idUnidadeInternacao">
                          <?php foreach($resUnidadeInternacao as $unidadeinternacao){?>
                            <option <?php echo "value='" . $unidadeinternacao['IdUnidadeInternacao'] . "'"?>> <?php echo $unidadeinternacao['NomeUnidade'];?></option>
                          <?php } ?>
                        </select>                   
                      </div>
                      <div class="text-right">
                        <button type="submit"class="btn btn-primary mr-2">Cadastar</button>
                        <button class="btn btn-light">Cancelar</button>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <?php require '../template/footer.php';?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../js/vendor.bundle.base.js"></script>
  <script src="../js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <script src="../js/settings.js"></script>
  <script src="../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/file-upload.js"></script>
  <script src="../js/iCheck.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>
  <script src="../js/formpickers.js"></script>
  <!-- End custom js for this page-->

</body>


</html>
