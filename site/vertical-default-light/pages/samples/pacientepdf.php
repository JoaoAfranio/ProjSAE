<!DOCTYPE html>
<html>
<?php 
require '../util/config.php';
require '../util/conecta.php';

  if (isset($_GET["idPaciente"])) {
    $idPaciente = $_GET["idPaciente"];
  }else{
    $idPaciente = "0";
  }

  $con = conecta();
  
  $queryUlimoQuestDiagPres = "SELECT * FROM questionariodiagpres 
                           WHERE DataRealizado = (select max(DataRealizado) from questionariodiagpres
                                                  WHERE IdPaciente = '$idPaciente' LIMIT 1) LIMIT 1";

$resUltimoQuestDiagPres = mysqli_query($con, $queryUlimoQuestDiagPres);

foreach($resUltimoQuestDiagPres as $ultimoQuestDiagPres){
        $idQuestionarioDiagPresc = $ultimoQuestDiagPres['idQuestionarioDiagPresc'];

        $queryDiagnosticos = "SELECT * from questionariodiagpres
                                INNER JOIN pacientediagnostico on pacientediagnostico.idQuestionarioDiagPresc = questionariodiagpres.idQuestionarioDiagPresc
                                INNER JOIN diagnostico on diagnostico.IdDiagnostico = pacientediagnostico.IdDiagnostico
                                WHERE questionariodiagpres.IdQuestionarioDiagPresc = '$idQuestionarioDiagPresc'";

        $queryPrescricoes = "SELECT * from questionariodiagpres
                                INNER JOIN pacienteprescricao on pacienteprescricao.idQuestionarioDiagPresc = questionariodiagpres.idQuestionarioDiagPresc
                                INNER JOIN prescricao on prescricao.IdPrescricao = pacienteprescricao.IdPrescricao
                                WHERE questionariodiagpres.IdQuestionarioDiagPresc = '$idQuestionarioDiagPresc'";
    }
    
    $queryQuestionario = "SELECT * FROM questionario 
                          WHERE 
                          IdFormulario in (1,2,3) AND 
                          IdPaciente = '$idPaciente' AND
                          DataRealizado = (select max(DataRealizado) FROM questionario WHERE IdFormulario in (1,2,3) AND IdPaciente = '$idPaciente' ) LIMIT 1";
                                          
    $resQuestionario = mysqli_query($con, $queryQuestionario);
    $resPrescricoes = mysqli_query($con, $queryPrescricoes);
    $resDiagnosticos = mysqli_query($con, $queryDiagnosticos);

    foreach($resQuestionario as $questionario){
        $idQuestionario = $questionario['IdQuestionario'];
    }

    $queryPaciente =  "SELECT * FROM paciente as pac INNER JOIN questionario as quest on quest.IdPaciente = pac.IdPaciente 
                                INNER JOIN tipopaciente as tp on tp.IdTipoPaciente = pac.IdTipoPaciente
                                INNER JOIN unidadeinternacao as ui on ui.IdUnidadeInternacao = pac.IdUnidadeInternacao
                                WHERE quest.IdQuestionario = '$idQuestionario' LIMIT 1";

    $resPaciente = mysqli_query($con, $queryPaciente);

      $querySelectAvaliacao = "SELECT avaliacao.IdAvaliacao, avaliacao.Descricao from aplicacao INNER JOIN formulario on formulario.IdFormulario = aplicacao.IdFormulario
                           INNER JOIN avaliacao on avaliacao.IdAvaliacao = aplicacao.IdAvaliacao
                           INNER JOIN questionario on questionario.IdFormulario = formulario.IdFormulario
                           WHERE questionario.IdQuestionario = '$idQuestionario'";
      $resSelectAvaliacao = mysqli_query($con, $querySelectAvaliacao);

        $queryQuestaoMultipla = "SELECT res.IdAvaliacao, questao.IdQuestao, questao.Descricao, afirmativa.Descricao as descricaoAfirmativa
        FROM resposta as res INNER JOIN questionario as quest on res.IdQuestionario = quest.IdQuestionario
        INNER JOIN respostamultipla as rM on rM.IdResposta = res.IdResposta
        INNER JOIN respostamultiplaafirmativa as rMAfirmativa on rMAfirmativa.IdResposta = rM.IdResposta
        INNER JOIN Questao  on questao.IdQuestao = rMAfirmativa.IdQuestao 
        INNER JOIN Afirmativa on afirmativa.IdAfirmativa = rMAfirmativa.IdAfirmativa
        WHERE quest.IdQuestionario = '$idQuestionario'";

        $resQuestaoMultipla = mysqli_query($con, $queryQuestaoMultipla);


        $querySelectQuestoesMultipla = "SELECT res.IdAvaliacao, questao.IdQuestao, questao.Descricao
                              FROM resposta as res INNER JOIN questionario as quest on res.IdQuestionario = quest.IdQuestionario
                              INNER JOIN respostamultipla as rM on rM.IdResposta = res.IdResposta
                              INNER JOIN respostamultiplaafirmativa as rMAfirmativa on rMAfirmativa.IdResposta = rM.IdResposta
                              INNER JOIN Questao  on questao.IdQuestao = rMAfirmativa.IdQuestao 
                              INNER JOIN Afirmativa on afirmativa.IdAfirmativa = rMAfirmativa.IdAfirmativa
                              WHERE quest.IdQuestionario = '$idQuestionario' GROUP BY questao.IdQuestao";

      $resSelectQuestoesMultipla = mysqli_query($con, $querySelectQuestoesMultipla);

        $queryQuestaoUnica = "SELECT res.IdAvaliacao, questao.Descricao, afirmativa.Descricao as descricaoAfirmativa
        FROM resposta as res INNER JOIN questionario as quest on res.IdQuestionario = quest.IdQuestionario
        INNER JOIN respostaunica as rUnica on rUnica.IdResposta = res.IdResposta 
        INNER JOIN Questao  on questao.IdQuestao = rUnica.IdQuestao 
        INNER JOIN Afirmativa on afirmativa.IdAfirmativa = rUnica.IdAfirmativa
        WHERE quest.IdQuestionario = '$idQuestionario'";

        $resQuestaoUnica = mysqli_query($con, $queryQuestaoUnica);

        $queryQuestaoAberta =  "SELECT res.IdAvaliacao , questao.Descricao, rAberta.DescricaoRespostaAberta 
        FROM resposta as res INNER JOIN questionario as quest on res.IdQuestionario = quest.IdQuestionario
        INNER JOIN respostaaberta as rAberta on rAberta.IdResposta = res.IdResposta 
        INNER JOIN Questao  on questao.IdQuestao = rAberta.IdQuestao WHERE quest.IdQuestionario = '$idQuestionario'";

        $resQuestaoAberta = mysqli_query($con, $queryQuestaoAberta);
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

                        <?php 
                          foreach($resPrescricoes as $prescricao){
                        ?>
                        <div class="col-md-6 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body" id="<?php echo $prescricao['IdAvaliacao'];?>">
                              <h5>Prescrições</h5>
                             <p class="text-muted"><i class="mdi mdi-check menu-icon"></i><?php echo $prescricao['Descricao'];?><b> de <?php echo $prescricao['Rotina'];?> em <?php echo $prescricao['Rotina'];?> horas</b></p>
                            </div>
                          </div>
                        </div>
                          <?php } ?>

                        <?php 
                          foreach($resDiagnosticos as $diagnostico){
                        ?>
                        <div class="col-md-6 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <h5>Diagnósticos</h5>
                              <p class="text-muted"><i class="mdi mdi-check menu-icon"></i><?php echo $diagnostico['Descricao'];?></p>
                            </div>
                          </div>
                        </div>
                          <?php } ?>

                        <div class="col-md-6 grid-margin stretch-card">
                          <div class="card">
                            <div class="card-body">
                              <h5>Evolução</h5>
                              <p class="text-muted"><i class="mdi mdi-check menu-icon"></i>Nenhuma evolução aparente...</p>
                            </div>
                          </div>
                        </div>

                      <div class="col-12">
                        <div class="table-responsive">
                          <table id="order-listing" class="table">
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
                                  <td><?php echo $prescricao['Rotina'];?> em <?php echo $prescricao['Rotina'];?> horas</td>
                              </tr>
                          <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                        <!-- ------------------------------------------------------------------------------------------------- -->
                        <!-- ------------------------------------------------------------------------------------------------- -->
                        </div>
                      </div>
                  </div>
              </div>

  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../../../vendors/js/vendor.bundle.base.js"></script>
  <script src="../../../../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../../../js/off-canvas.js"></script>
  <script src="../../../../js/hoverable-collapse.js"></script>
  <script src="../../../../js/template.js"></script>
  <script src="../../../../js/settings.js"></script>
  <script src="../../../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
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