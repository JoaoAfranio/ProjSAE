<!DOCTYPE html>
<html lang="pt-br">
<?php 

$idPaciente = $_GET['idPaciente'];
$nomePaciente = $_GET['nomePaciente'];
$idInternacao = $_GET['idInternacao'];
$codigoPaciente = $_GET['codigoPaciente'];
$idTipoPaciente = $_GET['idTipoPaciente'];



include $_SERVER["DOCUMENT_ROOT"] . "/sae/template/header.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/TipoPacienteModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/UnidadeInternacaoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/FormularioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AvaliacaoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/FormularioAvaliacaoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AvaliacaoQuestaoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaQuestaoModel.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/QuestaoModel.php";



$afirmativa = new AfirmativaModel();
$afirmativaQuestao = new AfirmativaQuestaoModel();
$formulario = new FormularioModel();
$formularioAvaliacao = new FormularioAvaliacaoModel();
$avaliacaoQuestao = new AvaliacaoQuestaoModel();
$avaliacao = new AvaliacaoModel();
$questao = new  QuestaoModel();


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
                  <h4>Cadastrando paciente: <?php echo $nomePaciente;?></h4>
                  <p class="card-description">
                    Informe os dados do paciente no formulário abaixo
                  </p>

                    <form action="../controller/PacienteController.php?acao=cadastrardados&idPaciente=<?php echo $idPaciente;?>&idTipoPaciente=<?php echo $idTipoPaciente;?>" method="post" class="forms-sample">

                    <?php
                    // If para decidir qual formulario será invocado

                    if($idTipoPaciente == 1){
                      // Adulto
                      $idFormulario = 15;
                    }else if($idTipoPaciente == 2){
                      // Pediatrico
                      $idFormulario = 14;
                    }else if($idTipoPaciente == 3){
                      // RN
                      $idFormulario = 13;
                    }else{
                      $idFormulario = "0";
                    }

                                            
                    $resFormAvaliacao = $formularioAvaliacao->listarTudoPorIdFormulario($idFormulario);
                    foreach($resFormAvaliacao as $avalQuest){
                    
                        $resQuestao = $questao->listarID($avalQuest['IdQuestao']);
                      if($resQuestao['IdTipoQuestao'] == 1){
                        //Questao Aberta
                        ?>

                        <div class="form-group">
                          <label for="input"><?php echo $resQuestao['Descricao'];?></label>
                          <input type="text" class="form-control" 
                          <?php echo "name=" . $avalQuest['IdAplicacao'] . ';' . $avalQuest['IdAvaliacao'] . ';' . $avalQuest['IdQuestao']  . ';' . $avalQuest['IdTipoQuestao']  . "";
                                echo " placeholder=" . $avalQuest['Descricao'];
                          ?>
                          >
                        </div>

                        <?php
                      }


                        if($resQuestao['IdTipoQuestao'] == 2){
                          $resAfirmativa = $questao->listarAfirmativas($resQuestao['IdQuestao']);
                          // Questao Fechada Escolha Unica
                          ?>

                          <div class="form-group">
                            <label for="selectAtividade"><?php echo $resQuestao['Descricao'];?></label>
                            <select class="form-control" <?php echo "name=" . $avalQuest['IdAplicacao'] . ';' . $avalQuest['IdAvaliacao'] . ';' . $avalQuest['IdQuestao']  . ';' . $avalQuest['IdTipoQuestao']  . "";?>>
                              <option> -- </option>
                          <?php foreach($resAfirmativa as $afirm){
                          $resAfirmativaDescricao = $afirmativa->listarID($afirm['IdAfirmativa']); ?> 
                              <option value="<?php echo $resAfirmativaDescricao['IdAfirmativa'];?>"><?php echo $resAfirmativaDescricao['Descricao'];?></option>
                          <?php } ?>
                            </select>
                            <?php
                            if($resQuestao['PossuiOutro'] == 'S'){ ?>
                              <input type="text" class="form-control obsInput" id="inputObs" placeholder="Observação">
                            <?php
                            } ?>
                          </div>

                          <?php
                        }



                        if($resQuestao['IdTipoQuestao'] == 3){
                          $resAfirmativa = $questao->listarAfirmativas($resQuestao['IdQuestao']);
                          // Fechada Escolha Multipla
                          ?>
                          <div class="form-group">
                            <label for="selectAtividade"><?php echo $resQuestao['Descricao'];?></label>
                            <select class="js-example-basic-multiple w-100" multiple="multiple" <?php echo "name=" . $avalQuest['IdAplicacao'] . ';' . $avalQuest['IdAvaliacao'] . ';' . $avalQuest['IdQuestao']  . ';' . $avalQuest['IdTipoQuestao']  . "";?>>
                            <?php foreach($resAfirmativa as $afirm){
                            $resAfirmativaDescricao = $afirmativa->listarID($afirm['IdAfirmativa']); ?> 
                              <option value="<?php echo $resAfirmativaDescricao['IdAfirmativa'];?>"><?php echo $resAfirmativaDescricao['Descricao'];?></option>
                            <?php } ?>
                            </select>
                            <?php
                            if($resQuestao['PossuiOutro'] == 'S'){ ?>
                              <input type="text" class="form-control obsInput" <?php echo "name='input" . $resQuestao['Descricao'] . "'";?>  placeholder="Observação">
                            <?php
                            } ?>
                          </div>

                          <?php
                          }


                          
                        if($resQuestao['IdTipoQuestao'] == 4){
                          // Data
                          ?>
                          <div class="form-group">
                            <label for="selectAtividade"><?php echo $resQuestao['Descricao'];?></label>
                            <div iclass="input-group date">
                              <input type="date" <?php echo "name=" . $avalQuest['IdAplicacao'] . ';' . $avalQuest['IdAvaliacao'] . ';' . $avalQuest['IdQuestao']  . ';' . $avalQuest['IdTipoQuestao']  . "";?>   class="form-control">
                            </div>
                          </div>

                          <?php
                          }

                          
                         if($resQuestao['IdTipoQuestao'] == 5){
                           // Afirmação ou Negação
                          ?>
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label"><?php echo $resQuestao['Descricao'];?></label>
                            <?php foreach($resAfirmativa as $afirm){
                            $resAfirmativaDescricao = $afirmativa->listarID($afirm['IdAfirmativa']); ?> 
                            <div class="col-sm-3">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" <?php echo "name=" . $avalQuest['IdAplicacao'] . ';' . $avalQuest['IdAvaliacao'] . ';' . $avalQuest['IdQuestao']  . ';' . $avalQuest['IdTipoQuestao']  ."";?> value="<?php echo $resAfirmativaDescricao['IdAfirmativa'];?>">
                                  <?php echo $resAfirmativaDescricao['Descricao'];?>
                                </label>
                              </div>
                            </div>
                            <?php } ?>
                          </div>
                  
                          <?php
                          }
                      } ?>                      
                                 
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
