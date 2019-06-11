<!DOCTYPE html>
<html lang="pt-br">

<?php 

    include $_SERVER["DOCUMENT_ROOT"] . "/sae/template/header.php";

    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/QuestionarioModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacienteModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/RespostaAbertaModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/RespostaUnicaModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/RespostaMultiplaModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/QuestionarioDiagPrescModel.php";

    $idQuestionario = $_POST["idQuestionario"];
    $idQuestionarioDiagPresc = $_POST["idQuestionarioDiagPresc"];

   

    $questionarioDiagPrescModel = new QuestionarioDiagPrescModel();
    $resDiagnosticos = $questionarioDiagPrescModel->listarTodosDiagnosticosIdQuestionario($idQuestionarioDiagPresc);

    $resPrescricoes = $questionarioDiagPrescModel->listarTodasPrescricoesIdQuestionario($idQuestionarioDiagPresc);

    $resResultados = $questionarioDiagPrescModel->listarTodosResultadosIdQuestionario($idQuestionarioDiagPresc);
    
    $questionarioModel = new QuestionarioModel();
    $resSelectAvaliacao = $questionarioModel->listarTodasAvaliacoes($idQuestionario);

    $resQuestionarioDiagPresc = $questionarioDiagPrescModel->listarID($idQuestionarioDiagPresc);

    $pacienteModel = new PacienteModel();
    $resPaciente = $pacienteModel->listarInfoPeloIdQuestionario($idQuestionario);

    $respostaAbertaModel = new RespostaAbertaModel();
    $resQuestaoAberta = $respostaAbertaModel->listarTodasRespostasAbertasQuestionario($idQuestionario);

    $respostaUnicaModel = new RespostaUnicaModel();
    $resQuestaoUnica = $respostaUnicaModel->listarTodasRespostasUnicasQuestionario($idQuestionario);
    
    $respostaMultiplaModel = new RespostaMultiplaModel();
    $resQuestaoMultipla = $respostaMultiplaModel->listarTodasQuestoesMultiplas($idQuestionario);

    $resSelectQuestoesMultipla = $respostaMultiplaModel->listarTodasSelectQuestoesMultipla($idQuestionario);

    

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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../images/favicon.png" />
</head>
<body onload="buscarQuestoes();">
    <!-- partial:../../partials/_navbar.html -->
      <!-- partial -->
      <div class="col-lg-12">
                  <div class="card px-2">
                      <div class="card-body">
                          <div class="container-fluid">
                            <h3 class="text-right my-5">Questionário Nº <?php echo $idQuestionario;?></h3>
                            <hr>
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                          <div class="row">
                            <div class="col-md-12 pl-0">
                            <?php foreach($resPaciente as $paciente){?>
                              <p class="mt-5 mb-2"><b>Paciente <u><?php echo $paciente['Nome'];?></u></b></p>
                              <p>Codigo Paciente: <?php echo $paciente['CodigoPaciente'];?>,<br>Unidade de Internação: <?php echo $paciente['NomeUnidade'];?>,<br>Tipo Paciente: <?php echo $paciente['Descricao'];?></p>
                            </div>
                          </div>
                            <?php } ?>
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                          </div>
                        <div class="row">
                        <!-- ------------------------------------------------------------------------------------------------- -->
                        <!-- ------------------------------------------------------------------------------------------------- -->   
                        <!-- Fazer um Foreach com essa div que esta entre o comentario para cada uma das avaliações: ANAMNESE, DIAGNOSTICO, PRESCRICAO E EVOLUÇÃO-->                     
                        <?php 
                          foreach($resSelectAvaliacao as $avaliacao){
                        ?>
                        <div class="col-md-6 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body" id="<?php echo $avaliacao['IdAvaliacao'];?>">
                              <h5><?php echo $avaliacao['Descricao'];?></h5>

                            </div>
                          </div>
                        </div>
                        

                          <?php } ?>



                        <div class="col-md-6 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <h5>Evolução</h5>
                              <p class="text-muted"></i><?php 
                              if($resQuestionarioDiagPresc["Evolucao"] == " "){
                                echo "Nenhuma evolução aparente";
                              }else{
                                echo $resQuestionarioDiagPresc["Evolucao"];
                              }
                              ?></p>
                            </div>
                          </div>
                        </div>
                        
                      <?php if(count($resPrescricoes) > 0){?>
                        <div class="col-12">
                          <div>
                            <table class="table">
                              <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Prescrição</th>
                                    <th>Rotina</th>

                                </tr>

                              </thead>
                              <tbody>
                            <?php
                            $ordem = 0;
                            foreach($resPrescricoes as $prescricao){
                              $ordem++;
                                                ?>        
                                <tr>
                                    <td><?php echo $ordem;?></td>
                                    <td><?php echo $prescricao['Descricao'];?></td>
                                    <td><?php echo $prescricao['Rotina'];?> em <?php echo $prescricao['Rotina'];?></td>
                                </tr>
                            <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      <?php } ?>

                      <?php if(count($resDiagnosticos) > 0){?>
                        <div class="col-12">
                          <div>
                            <table class="table">
                              <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Diagnóstico</th>
                                    <th>Resultado</th>

                                </tr>

                              </thead>
                              <tbody>
                            <?php
                            $ordem = 0;
                            foreach($resDiagnosticos as $diagnostico){
                              $ordem++;
                                                ?>        
                                <tr>
                                    <td><?php echo $ordem;?></td>
                                    <td><?php echo $diagnostico['Descricao'];?></td>
                                    <td><?php                   
                                    foreach($resResultados as $resultado){
                                      if($resultado['IdDiagnostico'] == $diagnostico['IdDiagnostico']){
                                        echo "<p><i class='mdi mdi-check menu-icon'></i>" . $resultado['resDescricao'] . "</p><br>";
                                      }
                                    }
                                    ?></td>
                                </tr>
                            <?php } ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      <?php } ?>
                        <!-- ------------------------------------------------------------------------------------------------- -->
                        <!-- ------------------------------------------------------------------------------------------------- -->
                        </div>
                      </div>
                  </div>
              </div>

        <!-- content-wrapper ends -->
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

  <script>
    function buscarQuestoes(){
      <?php foreach($resQuestaoAberta as $questaoAberta){?>
        $('#' + <?php echo $questaoAberta['IdAvaliacao']?>).append(
          '<div class="form-group">' + 
            '<h6 style="color:#0f6c8f !important;"><?php echo $questaoAberta['Descricao']?>:</h6>' + 
            '<p class="text-muted"><?php echo $questaoAberta['DescricaoRespostaAberta']?></p>' + 
          '</div>');
      <?php } ?>

      <?php foreach($resQuestaoUnica as $questaoUnica){?>
        $('#' + <?php echo $questaoUnica['IdAvaliacao']?>).append(
          '<div class="form-group">' + 
            '<h6 style="color:#0f6c8f !important;"><?php echo $questaoUnica['Descricao']?>:</h6>' + 
            '<p class="text-muted"><i class="mdi mdi-check menu-icon"><?php echo $questaoUnica['descricaoAfirmativa']?></p>' + 
          '</div>');
      <?php } ?>

      <?php foreach($resSelectQuestoesMultipla as $questoesMultipla){?>
        $('#' + <?php echo $questoesMultipla['IdAvaliacao']?>).append(
          '<div class="form-group" id="questao<?php echo $questoesMultipla['IdQuestao'];?>">' + 
            '<h6 style="color:#0f6c8f !important;"><?php echo $questoesMultipla['Descricao']?>:</h6>' + 
          '</div>');
      <?php } ?>

      <?php foreach($resQuestaoMultipla as $questaoMultipla){?>
        $('#questao' + <?php echo $questaoMultipla['IdQuestao']?>).append(
          '<p class="text-muted"><i class="mdi mdi-check menu-icon"></i><?php echo $questaoMultipla['descricaoAfirmativa']?></p>');
      <?php } ?>
    }
  </script>
</body>
</html>