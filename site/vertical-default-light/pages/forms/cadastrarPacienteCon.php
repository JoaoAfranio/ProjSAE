<!DOCTYPE html>
<html lang="pt-br">
<?php 
  require '../util/config.php';
  require '../util/conecta.php';

$nomePaciente = $_POST['inputNome'];
$idInternacao = $_POST['selectUnidadeInternacao'];
$codigoPaciente = $_POST['inputCodigoPaciente'];
$idTipoPaciente = $_POST['selectTipoPaciente'];

  $con = conecta();
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
  <link rel="stylesheet" href="http://www.urbanui.com/">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../../../css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require '../menu/menuEnfermeiro.php'; ?>

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

                    <form action="../cadastrar/enviaCadPaciente.php" method="post" class="forms-sample">

                    <?php
                    if($idTipoPaciente == 3){
                      $idFormulario = 4;
                    }else if($idTipoPaciente == 2){
                      $idFormulario = 5;
                    }else if($idTipoPaciente == 3){
                      $idFormulario = 6;
                    }else{
                      $idFormulario = "0";
                    }



                    $queryAvaliacao = "SELECT avaliacao.Descricao FROM formulario INNER JOIN aplicacao ON aplicacao.IdFormulario = formulario.IdFormulario 
                                        INNER JOIN avaliacao on avaliacao.IdAvaliacao = aplicacao.IdAvaliacao
                                        INNER JOIN avaliacaoquestao on avaliacaoquestao.IdAvaliacao = avaliacao.IdAvaliacao 
                                        WHERE formulario.IdFormulario = '$idFormulario' GROUP BY avaliacao.Descricao LIMIT 1";

                      $resAvaliacao = mysqli_query($con, $queryAvaliacao);

                      foreach($resAvaliacao as $avaliacao){


                    $avaliacaoDescricao = $avaliacao['Descricao'];
                    $queryQuestao = "SELECT questao.IdQuestao,questao.Descricao,questao.IdTipoQuestao,questao.PossuiOutro 
                                     FROM formulario INNER JOIN aplicacao ON aplicacao.IdFormulario = formulario.IdFormulario 
                                     INNER JOIN avaliacao on avaliacao.IdAvaliacao = aplicacao.IdAvaliacao 
                                     INNER JOIN avaliacaoquestao on avaliacaoquestao.IdAvaliacao = avaliacao.IdAvaliacao 
                                     INNER JOIN questao on questao.IdQuestao = avaliacaoquestao.IdQuestao 
                                     WHERE avaliacao.Descricao = '$avaliacaoDescricao'";

                    $resSelectQuestao = mysqli_query($con, $queryQuestao);
                    $i = 0;
                      foreach($resSelectQuestao as $questao){
                        $i++;
                      if($questao['IdTipoQuestao'] == 1){
                        //Questao Aberta
                        ?>

                        <div class="form-group">
                          <label for="input"><?php echo $questao['Descricao'];?></label>
                          <input type="text" class="form-control" 
                          <?php echo "name=" . $questao['IdQuestao'] . " ";
                                echo "placeholder=" . $questao['Descricao'];
                          ?>
                          >
                        </div>

                        <?php
                      }

                      $idQuestao = $questao['IdQuestao'];
                      $queryAfirmativa = "SELECT * FROM formulario INNER JOIN aplicacao ON aplicacao.IdFormulario = formulario.IdFormulario 
                                          INNER JOIN avaliacao on avaliacao.IdAvaliacao = aplicacao.IdAvaliacao 
                                          INNER JOIN avaliacaoquestao on avaliacaoquestao.IdAvaliacao = avaliacao.IdAvaliacao 
                                          INNER JOIN questao on questao.IdQuestao = avaliacaoquestao.IdQuestao 
                                          LEFT JOIN questaoafirmativa on questaoafirmativa.IdQuestao = questao.IdQuestao 
                                          LEFT JOIN afirmativa on afirmativa.IdAfirmativa = questaoafirmativa.IdAfirmativa 
                                          WHERE questao.IdQuestao = '$idQuestao'";

                      $resSelectAfirmativa = mysqli_query($con, $queryAfirmativa);

                      

                        if($questao['IdTipoQuestao'] == 2){
                          // Questao Fechada Escolha Unica
                          ?>

                          <div class="form-group">
                            <label for="selectAtividade"><?php echo $questao['Descricao'];?></label>
                            <select class="form-control" <?php echo "name=" . $questao['IdQuestao'];?>>
                              <option> -- </option>
                          <?php foreach($resSelectAfirmativa as $afirmativa){ ?> 
                              <option><?php echo $afirmativa['Descricao'];?></option>
                          <?php } ?>
                            </select>
                            <?php
                            if($questao['PossuiOutro'] == 'S'){ ?>
                              <input type="text" class="form-control obsInput" id="inputObs" placeholder="Observação">
                            <?php
                            } ?>
                          </div>

                          <?php
                        }



                        if($questao['IdTipoQuestao'] == 3){
                          ?>
                          <div class="form-group">
                            <label for="selectAtividade"><?php echo $questao['Descricao'];?></label>
                            <select class="js-example-basic-multiple w-100" multiple="multiple" <?php echo "name='input" . $questao['IdQuestao'] . "'";?>>
                          <?php foreach($resSelectAfirmativa as $afirmativa){ ?> 
                              <option><?php echo $afirmativa['Descricao'];?></option>
                          <?php } ?>
                            </select>
                            <?php
                            if($questao['PossuiOutro'] == 'S'){ ?>
                              <input type="text" class="form-control obsInput" <?php echo "name='input" . $questao['Descricao'] . "'";?>  placeholder="Observação">
                            <?php
                            } ?>
                          </div>

                          <?php
                          }


                          
                        if($questao['IdTipoQuestao'] == 4){
                          ?>
                          <div class="form-group">
                            <label for="selectAtividade"><?php echo $questao['Descricao'];?></label>
                            <div iclass="input-group date">
                              <input type="date" <?php echo "name='" . $questao['IdQuestao'] . "'";?>   class="form-control">
                            </div>
                          </div>

                          <?php
                          }

                          
                         if($questao['IdTipoQuestao'] == 5){
                          ?>
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label"><?php echo $questao['Descricao'];?></label>
                            <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" <?php echo "name='radio" . $questao['IdQuestao'] . "'";?> value="Sim">
                                Sim
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" <?php echo "name='radio" . $questao['IdQuestao'] . "'";?> value="Não">
                                Não
                              </label>
                              </div>
                            </div>
                          </div>
                  
                          <?php
                          }
                        }
                      } ?>                     
                    <input type="hidden" name="nomePaciente" <?php echo 'value="' . $nomePaciente . '"'; ?>>
                    <input type="hidden" name="idUnidadeInternacao" <?php echo 'value="' . $idInternacao . '"'; ?>>
                    <input type="hidden" name="idTipoPaciente" <?php echo 'value="' . $idTipoPaciente . '"'; ?>>
                    <input type="hidden" name="codigoPaciente" <?php echo 'value="' . $codigoPaciente . '"'; ?>>      
                                 
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
  <script src="../../../../js/file-upload.js"></script>
  <script src="../../../../js/iCheck.js"></script>
  <script src="../../../../js/typeahead.js"></script>
  <script src="../../../../js/select2.js"></script>
  <script src="../../../../js/formpickers.js"></script>
  <!-- End custom js for this page-->
</body>


</html>
