<!DOCTYPE html>
<html lang="pt-br">
<?php
  require '../util/config.php';
  require '../util/conecta.php';

  if (isset($_GET["nome"])) {
    $nome = $_GET["nome"];
  }else{
    $nome = "none";
  }
  $con = conecta();

  $queryPaciente = "SELECT pac.IdPaciente, pac.Nome, pac.CodigoPaciente, tpPac.IdTipoPaciente, tpPac.Descricao, ui.NomeUnidade
                  FROM Paciente as pac INNER JOIN tipopaciente as tpPac on tpPac.IdTipoPaciente = pac.IdTipoPaciente
                                       INNER JOIN unidadeinternacao as ui on ui.IdUnidadeInternacao = pac.IdUnidadeInternacao
                                       WHERE pac.Nome = '$nome' LIMIT 1";

  $resPessoa = mysqli_query($con, $queryPaciente);
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
    <?php require '../menu/menuEnfermeiro.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
        <?php foreach($resPessoa as $pessoa){?>
          <div class="card">
            <div class="card-body">
              <h4>Paciente: <small class="text-muted"><?php echo $pessoa['Nome'];?></small> </h4>
              <h5>Codigo do paciente: <small class="text-muted"><?php echo $pessoa['CodigoPaciente'];?></small> </h5>
              <h5>Tipo do paciente: <small class="text-muted"><?php echo $pessoa['Descricao'];?></small> </h5>
              <h5>Unidade de internação: <small class="text-muted"><?php echo $pessoa['NomeUnidade'];?></small> </h5>
              <br>
              <a class="mBottom10 buttonPesqPaciente btn btn-primary" href="../forms/exameFisico.php?nome=<?php echo $pessoa['Nome'];?>&formulario=<?php echo $pessoa['IdTipoPaciente'];?>"><i class="mdi mdi-file menu-icon"></i> Realizar Exame Físico</a>
              <a class="mBottom10 buttonPesqPaciente btn btn-primary" href="../apps/realizarRotina.php?nome=<?php echo $pessoa['Nome'];?>">
              <i class="mdi mdi-playlist-check menu-icon"></i> Realizar Rotina</a>
              <a target="_blank" class="mBottom10 buttonPesqPaciente btn btn-primary" href="../samples/pacientepdf.php?idPaciente=<?php echo $pessoa['IdPaciente'];?>"><i class="mdi mdi-file menu-icon"></i> Gerar PDF</a>
              <a target="_blank" class="mBottom10 buttonPesqPaciente btn btn-primary" href="#"><i class="mdi mdi-account-minus menu-icon"></i> Dar baixa</a>
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
                    $idPaciente = $pessoa['IdPaciente'];
                        $queryQuestionario = "SELECT IdQuestionario, form.IdFormulario, IdPaciente, DATE_FORMAT(DataRealizado, '%d/%m/%Y') AS dataFormatada, Descricao, user.nome
                        FROM Questionario 
                        INNER JOIN formulario as form on form.IdFormulario = questionario.IdFormulario 
                        INNER JOIN usuario as user on user.IdUsuario = questionario.IdUsuario
                        WHERE IdPaciente = '$idPaciente'";
                        $resQuestionario = mysqli_query($con, $queryQuestionario);
                    foreach($resQuestionario as $questionario){
                      $ordem++;
                                        ?>        
                        <tr>
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $questionario['dataFormatada'];?></td>
                            <td><?php echo $questionario['nome'];?></td>
                            <td><?php echo $questionario['Descricao'];?></td>
                            <td>
                              <a class="btn btn-success btn-md" <?php echo 'href="pacienteFormulario.php?idQuestionario=' . $questionario['IdQuestionario'] . '"';?>>Ver</a>
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
  <!-- inject:js -->
  <script src="../../../../js/off-canvas.js"></script>
  <script src="../../../../js/hoverable-collapse.js"></script>
  <script src="../../../../js/template.js"></script>
  <script src="../../../../js/settings.js"></script>
  <script src="../../../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../../../js/data-table.js"></script>
  <script src="../../../../js/alerts.js"></script>
  <script src="../../../../js/avgrund.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/calmui/template/demo/vertical-default-light/pages/tables/data-table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 15:36:05 GMT -->
</html>
