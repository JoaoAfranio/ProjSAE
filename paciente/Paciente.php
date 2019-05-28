<!DOCTYPE html>
<html lang="pt-br">
<?php
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacienteModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/QuestionarioModel.php";

    include $_SERVER["DOCUMENT_ROOT"] . "/sae/template/header.php";
    
    if (isset($_GET["idPaciente"])) {
        $idPaciente = $_GET["idPaciente"];
    }else{
        echo "<script>location.href='../paciente/PesquisarPaciente.php';</script>";
    }

    $pacienteModel = new PacienteModel();
    $resPaciente = $pacienteModel->listarInfosPaciente($idPaciente);

    $questionarioModel = new QuestionarioModel();
    $resQuestionario = $questionarioModel->listarQuestFormFunc($idPaciente);
    

?>

<body
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


?>>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require '../template/menuENF.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <?php foreach($resPaciente as $paciente){?>
          <div class="card">
            <div class="card-body">
              <h4>Paciente: <small class="text-muted"><?php echo $paciente['Nome'];?></small> </h4>
              <h5>Codigo do paciente: <small class="text-muted"><?php echo $paciente['CodigoPaciente'];?></small> </h5>
              <h5>Tipo do paciente: <small class="text-muted"><?php echo $paciente['Descricao'];?></small> </h5>
              <h5>Unidade de internação: <small class="text-muted"><?php echo $paciente['NomeUnidade'];?></small> </h5>
              <br>
              <a class="mBottom10 buttonPesqPaciente btn btn-primary" href="../examefisico/ExameFisico.php?idPaciente=<?php echo $paciente['IdPaciente'];?>&tipoPaciente=<?php echo $paciente['IdTipoPaciente'];?>"><i class="mdi mdi-file menu-icon"></i> Realizar Exame Físico</a>
              <a class="mBottom10 buttonPesqPaciente btn btn-primary" href="../apps/realizarRotina.php?nome=<?php echo $paciente['Nome'];?>">
              <i class="mdi mdi-playlist-check menu-icon"></i> Realizar Rotina</a>
              <a target="_blank" class="mBottom10 buttonPesqPaciente btn btn-primary" href="../samples/pacientepdf.php?idPaciente=<?php echo $paciente['IdPaciente'];?>"><i class="mdi mdi-file menu-icon"></i> Gerar PDF</a>
              <h4 style="margin-top: 20px;">Histórico do paciente</h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>

                        <tr>
                            <th>Ordem #</th>
                            <th>Data Realizada</th>
                            <th>Responsável</th>
                            <th>Formulário</th>

                            <th>Visualizar</th>
                        </tr>

                      </thead>
                      <tbody>
                    <?php
                    $ordem = 0;
                    $idPaciente = $paciente['IdPaciente'];
                    foreach($resQuestionario as $questionario){
                      $ordem++;
                                        ?>        
                        <tr>
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $questionario['dataFormatada'];?></td>
                            <td><?php echo $questionario['Nome'];?></td>
                            <td><?php echo $questionario['Descricao'];?></td>
                            <td>
                              <a class="btn btn-success btn-md" <?php echo 'href="pacienteFormulario.php?idPaciente='. $paciente['IdPaciente'] . '&idQuestionario=' . $questionario['IdQuestionario'] . '"';?>>Ver</a>
                            </td>
                        </tr>
                    <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php }?>
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

</html>
