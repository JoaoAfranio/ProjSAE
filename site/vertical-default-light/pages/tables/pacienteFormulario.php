<!DOCTYPE html>
<html lang="pt-br">

<?php 

  require '../util/config.php';
  require '../util/conecta.php';


  if (isset($_GET["idQuestionario"])) {
    $idQuestionario = $_GET["idQuestionario"];
  }else{
    
  }

  $con = conecta();

  $querySelectAvaliacao = "SELECT avaliacao.IdAvaliacao, avaliacao.Descricao from aplicacao INNER JOIN formulario on formulario.IdFormulario = aplicacao.IdFormulario
                           INNER JOIN avaliacao on avaliacao.IdAvaliacao = aplicacao.IdAvaliacao
                           INNER JOIN questionario on questionario.IdFormulario = formulario.IdFormulario
                           WHERE questionario.IdQuestionario = '$idQuestionario'";
  $resSelectAvaliacao = mysqli_query($con, $querySelectAvaliacao);


  $queryPaciente =  "SELECT * FROM paciente as pac INNER JOIN questionario as quest on quest.IdPaciente = pac.IdPaciente 
                              INNER JOIN tipopaciente as tp on tp.IdTipoPaciente = pac.IdTipoPaciente
                              INNER JOIN unidadeinternacao as ui on ui.IdUnidadeInternacao = pac.IdUnidadeInternacao
                              WHERE quest.IdQuestionario = '$idQuestionario' LIMIT 1";
  $resPaciente = mysqli_query($con, $queryPaciente);

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

<body onload="buscarQuestoes(); 
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


?>">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require '../menu/menuEnfermeiro.php'; ?>
      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card px-2">
                      <div class="card-body">
                          <div class="container-fluid">
                            <h3 class="text-right my-5">Questionário Nº <?php echo $idQuestionario;?></h3>
                            <hr>
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                            <div class="col-lg-3 pl-0">
                            <?php foreach($resPaciente as $paciente){?>
                              <p class="mt-5 mb-2"><b>Paciente <u><?php echo $paciente['Nome'];?></u></b></p>
                              <p>Codigo Paciente: <?php echo $paciente['CodigoPaciente'];?>,<br>Unidade de Internação: <?php echo $paciente['NomeUnidade'];?>,<br>Tipo Paciente: <?php echo $paciente['Descricao'];?></p>
                            </div>
                            <?php } ?>
                          </div>
                          <div class="container-fluid d-flex justify-content-between">
                          </div>
                        <div class="row">
                        <!-- ------------------------------------------------------------------------------------------------- -->
                        <!-- ------------------------------------------------------------------------------------------------- -->                        
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
                        <!-- ------------------------------------------------------------------------------------------------- -->
                        <!-- ------------------------------------------------------------------------------------------------- -->
                        </div>
                          <div class="container-fluid w-100">
                            <a href="#" class="btn btn-primary float-right mt-4 ml-2"><i class="mdi mdi-printer mr-1"></i>Imprimir</a>
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
  <script src="../../../../js/alerts.js"></script>
  <script src="../../../../js/avgrund.js"></script>
  <!-- End custom js for this page-->
</body>
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


<!-- Mirrored from www.urbanui.com/calmui/template/demo/vertical-default-light/pages/samples/invoice.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 15:36:26 GMT -->
</html>
