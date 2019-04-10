<!DOCTYPE html>
<html lang="pt-br">
<?php
  require '../util/config.php';
  require '../util/conecta.php';


  if (isset($_GET["nome"])) {
    $nomePesq = $_GET["nome"];
  }else{
    $nomePesq = "none";
  }

  $con = conecta();
  
  $selectContaPessoa = "SELECT pac.IdPaciente, pac.Nome, pac.CodigoPaciente, ui.NomeUnidade, diag.Descricao FROM 
                              Paciente as pac left JOIN questionariodiagpres as qDiagPres on qDiagPres.IdPaciente = pac.IdPaciente 
                              left JOIN pacientediagnostico as pacDiag on pacDiag.idQuestionarioDiagPresc = qDiagPres.idQuestionarioDiagPresc
                              left JOIN diagnostico as diag on diag.IdDiagnostico = pacDiag.IdDiagnostico 
                              left JOIN unidadeinternacao as ui on ui.IdUnidadeInternacao = pac.IdUnidadeInternacao
                              WHERE pac.Nome like '%$nomePesq%' GROUP BY pac.Nome ";


  $res = mysqli_query($con, $selectContaPessoa);
  $qntRegistro = mysqli_num_rows($res);




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

<body>
  <div class="container-scroller">
    <?php require '../menu/menuEnfermeiro.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <form action="search-pessoa.php" method="get">
                        <div class="form-group d-flex">
                          <input type="text" class="form-control" name="nome" placeholder="Pesquise aqui" 
                          value="<?php if($nomePesq == "none"){echo "";}else{echo $nomePesq;}?>">
                          <button type="submit" class="btn btn-primary ml-3">Pesquisar</button>
                        </div>
                      </form>
                    </div>
                    <div class="col-12 mb-5">
                      <?php if($nomePesq == "none"){
                            echo " <h2>Realize a consulta...</h2>";
                            }else{
                              echo "<h2>Resultado da Pesquisa para <u class='ml-2'>\"" . $nomePesq . "\"</u></h2>";
                              echo "<p class='text-muted'>Cerca de (" . $qntRegistro . ") resultado(s)</p>";
                              }?>
                      
                    </div>

                    <?php 
                    if($qntRegistro < 1){

                    }{
                    foreach($res as $pessoa){?>

                    <div class="col-12 results">
                      <div class="pt-4 border-bottom">
                        <div class="row">
                          <div class="col-6">
                            <p class="d-block h4 mb-0" href="#"><?php echo $pessoa['Nome'];?></p>
                            <p class="page-description mt-1 w-75 text-muted">Codigo paciente: <?php echo $pessoa['CodigoPaciente'];?></p>
                            <p class="page-description mt-1 w-75 text-muted">Unidade de Internação: <?php echo $pessoa['NomeUnidade'];?></p>
                            <a class="mBottom10 buttonPesqPaciente btn btn-primary" href="../tables/pacientePage.php?nome=<?php echo $pessoa['Nome'];?>"><i class="mdi mdi-account-circle menu-icon"></i> Detalhar Paciente</a>
                            <a target="_blank" class="mBottom10 buttonPesqPaciente btn btn-primary" href="pacientepdf.php?idPaciente=<?php echo $pessoa['IdPaciente'];?>"><i class="mdi mdi-file menu-icon"></i> Gerar PDF</a>
                          </div>
                          <div class="col-6">
                            <p class="d-block h4 mb-0" href="#">Diagnósticos:</p>
                            <ul class="list-arrow">
                            <?php 
                            $nome = $pessoa['Nome'];
                            $queryDiagnostico = "SELECT diag.Descricao FROM diagnostico as diag 
                                                INNER JOIN pacientediagnostico as pacDiag on pacDiag.IdDiagnostico = diag.IdDiagnostico
                                                INNER JOIN questionariodiagpres as qDiagPres on qDiagPres.idQuestionarioDiagPresc = pacDiag.idQuestionarioDiagPresc
                                                INNER JOIN Paciente as pac on qDiagPRes.IdPaciente = pac.IdPaciente
                                                WHERE pac.Nome = '$nome' LIMIT 3";


                            $resDiagnostico = mysqli_query($con, $queryDiagnostico);

                            foreach($resDiagnostico as $diagnostico){?>
                              <li class="page-description mt-1 w-75 text-muted"><?php echo $diagnostico['Descricao'];?></li>
                            <?php }?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php }}?>
                  <!-- 
                    <nav class="col-12" aria-label="Page navigation">
                      <ul class="pagination mt-5">
                        <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                        <li class="page-item  active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Proximo</a></li>
                      </ul>
                    </nav>
                    -->
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
  <!-- inject:js -->
  <script src="../../../../js/off-canvas.js"></script>
  <script src="../../../../js/hoverable-collapse.js"></script>
  <script src="../../../../js/template.js"></script>
  <script src="../../../../js/settings.js"></script>
  <script src="../../../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../../../../js/modal-demo.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
