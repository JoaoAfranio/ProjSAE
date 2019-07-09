<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/sae/template/header.php";

    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacienteModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacientePrescricaoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PrescricaoModel.php";

    $idQuestionario = $_GET["idQuestionario"];

    if (isset($_GET["idPaciente"])) {
      $idPaciente = $_GET["idPaciente"];
    }

    $pacientePrescricaoModel = new PacientePrescricaoModel();
    $prescricaoModel = new PrescricaoModel();

    $pacienteModel = new PacienteModel();
    $resPaciente = $pacienteModel->listarID($idPaciente);

    $resQuestionarioPresc = $pacientePrescricaoModel->listarTodosPorQuestionarioDiagPresc($idQuestionario);

?>


<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require '../template/menuENF.php'; ?>
      <div class="main-panel">          
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                    <h4>Paciente: <small class="text-muted"><?php echo $resPaciente['Nome'];?></small> </h4>
                      <h5>Prontuário: <small class="text-muted"><?php echo $resPaciente['CodigoPaciente'];?></small> </h5>
                      <br>
                      <form id="form-rotina" method="POST" action="../controller/QuestionarioDiagnosticoController.php?acao=cadastrarPrescricaoRot">
                      <input type="hidden" name="idQuestionario" value="<?php echo $idQuestionario;?>">
                      <input type="hidden" name="idPaciente" value="<?php echo $idPaciente?>";>
                        <div role="application" class="wizard clearfix" id="steps-uid-0"><div class="steps clearfix">
                            <ul role="tablist">
                                <li role="tab" class="first done" aria-disabled="false" aria-selected="true">
                                    <a id="steps-uid-0-t-0" aria-controls="steps-uid-0-p-0">
                                    <span class="current-info audible">current step: </span>
                                    <span class="number">1.</span> Diagnóstico</a>
                                </li>
                                <li role="tab" class="current" aria-disabled="false" aria-selected="false">
                                    <a id="steps-uid-0-t-1" aria-controls="steps-uid-0-p-1">
                                    <span class="number">2.</span> Prescrição</a>
                                </li>
                                <li role="tab" class="disabled" aria-disabled="true">
                                    <a id="steps-uid-0-t-2"  aria-controls="steps-uid-0-p-2">
                                    <span class="number">3.</span> Resultado</a>
                                </li>
                                <li role="tab" class="disabled last" aria-disabled="true">
                                    <a id="steps-uid-0-t-3"  aria-controls="steps-uid-0-p-3">
                                    <span class="number">4.</span> Observação</a>
                                </li>
                            </ul>
                        </div>
                        <div class="content clearfix">
                        <h3 id="steps-uid-0-h-1" tabindex="-1" class="title current">Prescrição</h3>
                          <section id="steps-uid-0-p-1" role="tabpanel" aria-labelledby="steps-uid-0-h-1" class="body current" style="left: 0px;" aria-hidden="false">
                          <?php 
                                  $idPrescricoes = "";
                                  // Busco todos os diagnosticos do questionario
                                  foreach($resQuestionarioPresc as $prescricao){
                                    $idPrescricoes .= $prescricao['IdPrescricao'] . ";";
                          } ?>
                                  <input type="hidden" name="prescricoes" value="
                                  <?php               
                                    echo $idPrescricoes;
                                  ?>">

                          <?php 
                                  // Busco todos as prescricoes do questionario
                                  foreach($resQuestionarioPresc as $prescricao){
                          ?>

                          <?php
                                    // Busco a descricao da prescricao atraves do ID
                                    $resPrescricao = $prescricaoModel->listarID($prescricao["IdPrescricao"]);  
                                    ?>
                                    <p><?php echo $resPrescricao['Descricao']?></p>
                                    <select name="prescricao<?php echo $prescricao["IdPrescricao"] ?>">               
                                    <option value="Rotina">Rotina</option>
                                    <option value="0:30 Hr">0:30 Hr</option>
                                    <option value="1:00 Hr">1:00 Hr</option>
                                    <option value="1:30 Hr">1:30 Hr</option>
                                    <option value="2:00 Hr">2:00 Hr</option>
                                    <option value="3:00 Hr">3:00 Hr</option>
                                    <option value="4:00 Hr">4:00 Hr</option>
                                    <option value="5:00 Hr">5:00 Hr</option>
                                    <option value="6:00 Hr">6:00 Hr</option>
                                    <option value="7:00 Hr">7:00 Hr</option>
                                    <option value="8:00 Hr">8:00 Hr</option>
                                    <option value="9:00 Hr">9:00 Hr</option>
                                    <option value="10:00 Hr">10:00 Hr</option>
                                    <option value="12:00 Hr">12:00 Hr</option>
                                    <option value="24:00 Hr">24:00 Hr</option>
                                    </select>
                                  <?php } ?>
                          </section>
                        </div>
                        <div class="actions clearfix">
                            <ul role="menu" aria-label="Pagination">
                              <li aria-hidden="false" aria-disabled="false">
                                <button class="add btn btn-primary font-weight-bold" type="submit">Próximo</button>
                              </li>
                            </ul>
                          </div>
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
  <script src="../js/data-table.js"></script>
  <script src="../js/alerts.js"></script>
  <script src="../js/avgrund.js"></script>
  <!-- End custom js for this page-->
</body>

<script>
    $(".inputPrescricao").typeahead({
        source: ['',
        <?php foreach($resPrescricao as $prescricao){ 
        echo "'" . trim($prescricao['Descricao']) . '\','; 
        } ?>
        ]
        , minLength: 1
    });
});
</script>

</html>
