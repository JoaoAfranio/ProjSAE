<!DOCTYPE html>
<html lang="pt-br">

<?php 

    include $_SERVER["DOCUMENT_ROOT"] . "/sae/template/header.php";
    
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/QuestionarioModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacienteModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/RespostaAbertaModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/RespostaUnicaModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/RespostaMultiplaModel.php";


  if (isset($_GET["idQuestionario"])) {
    $idQuestionario = $_GET["idQuestionario"];
  }else{
    echo "<script>location.href='../paciente/PesquisarPaciente.php';</script>";
  }

  if (isset($_GET["idPaciente"])) {
    $idPaciente = $_GET["idPaciente"];
  }else{
    echo "<script>location.href='../paciente/PesquisarPaciente.php';</script>";
  }


    $questionarioModel = new QuestionarioModel();
    $resSelectAvaliacao = $questionarioModel->listarTodasAvaliacoes($idQuestionario);

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
    <?php require '../template/menuENF.php'; ?>
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
                        <script>buscarQuestoes();</script>
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
<script >
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

</html>
