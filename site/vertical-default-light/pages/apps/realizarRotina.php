<!DOCTYPE html>
<html lang="pt-br">
<?php 

  require '../util/config.php';
  require '../util/conecta.php';

    if (isset($_GET["nome"])) {
    $nomePesq = $_GET["nome"];
  }else{
    header('Location: ../samples/search-pessoa.php');
  }
  $con = conecta();

  $queryPaciente = "SELECT * FROM Paciente WHERE Nome = '$nomePesq'";
  $resPaciente = mysqli_query($con, $queryPaciente);

  foreach($resPaciente as $paciente){
    $idUnidade = $paciente['IdUnidadeInternacao'];
    $codigoPaciente = $paciente['CodigoPaciente'];
  }

  $queryDiagnostico = "SELECT Descricao FROM diagnostico as diag INNER JOIN paciente as pac on 
                      pac.IdUnidadeInternacao = diag.IdUnidadeInternacao WHERE pac.Nome = '$nomePesq'";

  $queryPrescricao = "SELECT presc.Descricao FROM Prescricao as presc INNER JOIN diagnostico as diag on diag.IdDiagnostico = presc.IdDiagnostico
                  INNER JOIN paciente as pac on diag.IdUnidadeInternacao = pac.IdUnidadeInternacao WHERE pac.IdUnidadeInternacao = '$idUnidade'";


  $resDiagnostico = mysqli_query($con, $queryDiagnostico);
  $resPrescricao = mysqli_query($con, $queryPrescricao);
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
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <?php require '../menu/menuEnfermeiro.php'; ?>
      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4>Paciente: <small class="text-muted"><?php echo $nomePesq?></small> </h4>
                      <h5>Código do Paciente: <small class="text-muted"><?php echo $codigoPaciente?></small> </h5>
                      <br>
                      <form id="form-rotina" action="#">
                        <div>
                          <h3>Diagnóstico</h3>
                          <section>
                              <div id="the-basics" class="add-items d-flex">
                                <input type="text" class="inputDiagnostico typehead form-control diagnostico-list-input"  placeholder="Insira um diagnóstico">
                                <button class="add btn btn-primary font-weight-bold diagnostico-list-add-btn">Adicionar</button>
                              </div>
                              <div class="list-wrapper">
                                <ul class="d-flex flex-column-reverse diagnostico-list">
                                  <li>
                                  </li>
                                </ul>
                              </div>
                          </section>
                          <h3>Prescrição</h3>
                          <section>
                              <div class="add-items d-flex">
                                  <input type="text" class="inputPrescricao typehead form-control prescricao-list-input"  placeholder="Insira uma prescrição">
                                  <button class="add btn btn-primary font-weight-bold prescricao-list-add-btn">Adicionar</button>
                                </div>
                                <div class="list-wrapper">
                                  <ul class="d-flex flex-column-reverse prescricao-list">
                                  </ul>
                                </div>
                          </section>
                          <h3>Resultado</h3>
                          <section>
                              <div class="add-items d-flex">
                                  <input type="text" class="inputPrescricao typehead form-control prescricao-list-input"  placeholder="Insira um resultado">
                                  <button class="add btn btn-primary font-weight-bold prescricao-list-add-btn">Adicionar</button>
                                </div>
                                <div class="list-wrapper">
                                  <ul class="d-flex flex-column-reverse prescricao-list">
                                  </ul>
                                </div>
                          </section>
                          <h3>Evolução</h3>
                          <section>
                            <h3>Evolução</h3>
                            <div class="form-group">
                              <textarea class="form-control" rows="10"></textarea>
                            </div>
                          </section>
                        </div>
                      </form>
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
  <!-- inject:js -->
  <script src="../../../../js/off-canvas.js"></script>
  <script src="../../../../js/hoverable-collapse.js"></script>
  <script src="../../../../js/template.js"></script>
  <script src="../../../../js/settings.js"></script>
  <script src="../../../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../../../js/typeahead.js"></script>
  <script src="../../../../js/wizard.js"></script>
  <script src="../../../../js/calendar.js"></script>
  <script src="../../../../js/bootstrap3-typeahead.js"></script>
  <!-- End custom js for this page-->
</body>

<script>
  $(document).ready(function(){
    $(".inputDiagnostico").typeahead({
        source: ['',
        <?php foreach($resDiagnostico as $diagnostico){ 
        echo "'" . $diagnostico['Descricao'] . '\','; 
        } ?>
        ]
        , minLength: 1
    });

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
