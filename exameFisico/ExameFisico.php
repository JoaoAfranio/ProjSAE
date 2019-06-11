<!DOCTYPE html>
<html lang="pt-br">
<?php 
  include $_SERVER["DOCUMENT_ROOT"] . "/sae/template/header.php";

  require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacienteModel.php";
  require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/FormularioModel.php";
  require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/QuestaoModel.php";
  require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/FormularioAvaliacaoModel.php";

  require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaModel.php";
  require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaQuestaoModel.php";

  
    if (isset($_GET["idPaciente"])) {
      $idPaciente = $_GET["idPaciente"];
    }else{
        header('Location: ../paciente/PesquisarPaciente.php');
    }
    $afirmativa = new AfirmativaModel();
    $afirmativaQuestao = new AfirmativaQuestaoModel();
    $questaoModel = new  QuestaoModel();
    $formularioModel = new FormularioModel();
    $pacienteModel = new PacienteModel();
    $formularioAvaliacao = new FormularioAvaliacaoModel();

    $resPaciente = $pacienteModel->listarID($idPaciente);

     // $resAvaliacao = mysqli_query($con, 'SELECT * FROM tipoquestao WHERE descricao LIKE "%Avaliação%" ');


?>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require '../template/menuENF.php'; ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center align-items-center justify-content-center d-block ">Exame Físico</h1>
              <h4 class="text-center">Paciente: <small class="text-muted"><?php echo $resPaciente["Nome"];?></small> </h4>


              <h5 class="text-center tituloExame">Codigo Paciente: <small class="text-muted"><?php echo $resPaciente["CodigoPaciente"];?></small> </h5>
            </div>

            <!----------------------------------------------------------------------------------------------- --> 

            <?php
            $idTipoPaciente = $resPaciente["IdTipoPaciente"];
            // 1 = Adulto
            // 2 = Pediatrico
            // 3 = Neonato


            if($idTipoPaciente == 3){
              $idFormulario = 10;
                //$nomeFormulario = "Instrumento de Anamnese e Exame Físico - RN";
            }else if($idTipoPaciente == 2){
              $idFormulario = 11;  
                //$nomeFormulario = "Instrumento de Anamnese e Exame Físico - Pediátrico";
            }else if($idTipoPaciente == 1){
                //$nomeFormulario = "Instrumento de Anamnese e Exame Físico - Adulto";
                $idFormulario = 12;  
            }else{
                header('Location: ../paciente/PesquisarPaciente.php');
            }


            $resSelectAvaliacao = $formularioModel->listarTodasAvaliacoes($idFormulario);

            foreach($resSelectAvaliacao as $avaliacao){
            ?>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h5><?php echo $avaliacao['Descricao'];?></h5>
                  <form action="../controller/PacienteController.php?acao=cadastrardados&idPaciente=<?php echo $idPaciente;?>&idTipoPaciente=<?php echo $idTipoPaciente;?>" method="post" class="forms-sample">
                    <?php
                    $idAvaliacao = $avaliacao['IdAvaliacao'];

                    $resFormAvaliacao = $formularioAvaliacao->listarTodasQuestoesAplicacao($avaliacao['IdAplicacao']);
                    foreach($resFormAvaliacao as $avalQuest){
                        $resQuestao = $questaoModel->listarID($avalQuest['IdQuestao']);
                        
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
                            $resAfirmativa = $questaoModel->listarAfirmativas($resQuestao['IdQuestao']);
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
                            $resAfirmativa = $questaoModel->listarAfirmativas($resQuestao['IdQuestao']);
                            // Fechada Escolha Multipla
                            ?>
                            <div class="form-group">
                              <label for="selectAtividade"><?php echo $resQuestao['Descricao'];?></label>
                              <select class="js-example-basic-multiple w-100" multiple="multiple" <?php echo "name=" . $avalQuest['IdAplicacao'] . ';' . $avalQuest['IdAvaliacao'] . ';' . $avalQuest['IdQuestao']  . ';' . $avalQuest['IdTipoQuestao']  . "[]";?>>
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

                        } 


                        ?>

                  
                </div>
              </div>
            </div>

            <?php } ?>
            <!----------------------------------------------------------------------------------------------- --> 

            <?php    
           //   }
            ?>
            <div class="col-md-12 text-right">
                    <button type="submit" class="text-right btn btn-primary mr-2">Enviar</button>
                    <button class="text-right btn btn-light">Cancelar</button>
            </div>
            </form>
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
    <script src="../js/formpickers.js"></script>
  <script src="../js/file-upload.js"></script>
  <script src="../js/iCheck.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
