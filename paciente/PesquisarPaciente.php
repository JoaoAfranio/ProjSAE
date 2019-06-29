<!DOCTYPE html>
<html lang="pt-br">
<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/sae/template/header.php";

    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacienteModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/UnidadeInternacaoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/QuestionarioDiagPrescModel.php";

    $unidadeInternacao = new UnidadeInternacaoModel();
    $pacienteModel = new PacienteModel();
    $questionarioDiagPrescModel = new QuestionarioDiagPrescModel();

  if (isset($_GET["nome"])) {
    $nomePesq = $_GET["nome"];
  }else{
    $nomePesq = "none";
  }

  $resPacientes = $pacienteModel->listarPeloNome($nomePesq);
  $resUnidadeInternacao = $unidadeInternacao->listarTodos();

  $qntRegistro = count($resPacientes);


?>


<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require '../template/menuENF.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <form action="PesquisarPaciente.php" method="get">
                        <div class="form-group d-flex">
                          <input type="text" class="form-control" name="nome" placeholder="Pesquise aqui" 
                          value="<?php if($nomePesq == "none"){echo "";}else{echo $nomePesq;}?>">
                          <button type="submit" class="btn btn-primary ml-3">Pesquisar</button>
                        </div>
                      </form>
                    </div>
                    <div class="col-12 mb-5">
                      <?php if($nomePesq == "none"){
                            echo " <h2>Realize a consulta...</h2>";
                            }else{
                              echo "<h2>Resultado da Pesquisa para <u class='ml-2'>\"" . $nomePesq . "\"</u></h2>";
                              echo "<p class='text-muted'>Cerca de (" . $qntRegistro . ") resultado(s)</p>";
                              }?>
                      
                    </div>

                    <?php 
                    if($qntRegistro < 1){

                    }{
                    foreach($resPacientes as $pessoa){?>


                    <div class="col-12 results">
                      <div class="pt-4 border-bottom">
                        <div class="row">
                          <div class="col-6">
                            <p class="d-block h4 mb-0" href="#"><?php echo $pessoa['Nome'];?></p>
                            <p class="page-description mt-1 w-75 text-muted">Codigo paciente: <?php echo $pessoa['CodigoPaciente'];?></p>
                            <?php 
                            foreach($resUnidadeInternacao as $unidadeInternacao){
                                if($pessoa['IdUnidadeInternacao'] == $unidadeInternacao['IdUnidadeInternacao']){
                                    $nomeUnidade = $unidadeInternacao['NomeUnidade'];
                                }
                            }
                            ?>
                            <p class="page-description mt-1 w-75 text-muted">Unidade de Internação: <?php echo $nomeUnidade?></p>
                            <a class="mBottom10 buttonPesqPaciente btn btn-primary" href="../paciente/Paciente.php?idPaciente=<?php echo $pessoa['IdPaciente'];?>"><i class="mdi mdi-account-circle menu-icon"></i> Detalhar Paciente</a>
                          </div>
                          <?php $resIdQuestionarioDiagPresc = $questionarioDiagPrescModel->listarUltimo($pessoa['IdPaciente']);
                            if($resIdQuestionarioDiagPresc['max(IdQuestionarioDiagPresc)'] !=  NULL){
                             
                          ?>
                            <div class="col-6">
                              <p class="d-block h4 mb-0" href="#">Diagnósticos:</p>
                              <ul class="list-arrow">
                              <?php 
                                $resDiagnostico = $questionarioDiagPrescModel->listarTodosDiagnosticosIdQuestionario($resIdQuestionarioDiagPresc['max(IdQuestionarioDiagPresc)']);
                                foreach($resDiagnostico as $diagnostico){
                              ?>
                                
                                <li class="page-description mt-1 w-75 text-muted"><?php echo $diagnostico['Descricao'];?></li>
                              <?php }?>
                              </ul>
                            </div>
                                <?php } ?>
                        </div>
                      </div>
                    </div>
                    <?php }}?>

                  <!-- 
                    <nav class="col-12" aria-label="Page navigation">
                      <ul class="pagination mt-5">
                        <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                        <li class="page-item  active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Proximo</a></li>
                      </ul>
                    </nav>
                    -->

                  </div>
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
  <script src="../js/modal-demo.js"></script>
  <!-- End custom js for this page-->

</body>


</html>
