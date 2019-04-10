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

  if (isset($_GET["formulario"])) {
    $formulario = $_GET["formulario"];
  }else{
    header('Location: ../samples/search-pessoa.php');
  }

  $con = conecta();
  $resPaciente = mysqli_query($con, "SELECT * FROM paciente WHERE nome = '$nomePesq' LIMIT 1");

  $resAvaliacao = mysqli_query($con, 'SELECT * FROM tipoquestao WHERE descricao LIKE "%Avaliação%" ');


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
            <div class="col-md-12">
              <h1 class="text-center align-items-center justify-content-center d-block ">Exame Físico</h1>
              <h4 class="text-center">Paciente: <small class="text-muted"><?php echo $nomePesq;?></small> </h4>
          <?php 
            foreach($resPaciente as $paciente){
              $codigoPaciente = $paciente['CodigoPaciente'];
              $idPaciente = $paciente['IdPaciente'];
              $idTipoPaciente = $paciente['IdTipoPaciente'];
            
          ?>
              <h5 class="text-center tituloExame">Codigo Paciente: <small class="text-muted"><?php echo $codigoPaciente;?></small> </h5>
            </div>
          <?php } ?>

            <!----------------------------------------------------------------------------------------------- --> 

            <?php
            if($formulario == 3){
              $nomeFormulario = "Instrumento de Anamnese e Exame Físico - RN";
            }else if($formulario == 2){
              $nomeFormulario = "Instrumento de Anamnese e Exame Físico - Pediátrico";
            }else if($formulario == 1){
              $nomeFormulario = "Instrumento de Anamnese e Exame Físico - Adulto";
            }else{
              $nomeFormulario = "none";
            }


            $querySelectAvaliacao =   "SELECT avaliacao.Descricao FROM formulario INNER JOIN aplicacao ON aplicacao.IdFormulario = formulario.IdFormulario 
                                        INNER JOIN avaliacao on avaliacao.IdAvaliacao = aplicacao.IdAvaliacao
                                        INNER JOIN avaliacaoquestao on avaliacaoquestao.IdAvaliacao = avaliacao.IdAvaliacao 
                                        WHERE formulario.Descricao = '$nomeFormulario' GROUP BY avaliacao.Descricao";

            $resSelectAvaliacao = mysqli_query($con, $querySelectAvaliacao);

              foreach($resSelectAvaliacao as $avaliacao){
            ?>

            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h5><?php echo $avaliacao['Descricao'];?></h5>
                  <form class="forms-sample" action="../cadastrar/enviaCadPaciente.php?idTipoPaciente=<?php echo $idTipoPaciente;?>&idPaciente=<?php echo $idPaciente;?>" method="post">
                    <?php
                    $avaliacaoDescricao = $avaliacao['Descricao'];
                    $queryQuestao = "SELECT aplicacao.IdAplicacao, avaliacao.IdAvaliacao, questao.IdQuestao, questao.Descricao,questao.IdTipoQuestao,questao.PossuiOutro 
                                     FROM formulario INNER JOIN aplicacao ON aplicacao.IdFormulario = formulario.IdFormulario 
                                     INNER JOIN avaliacao on avaliacao.IdAvaliacao = aplicacao.IdAvaliacao 
                                     INNER JOIN avaliacaoquestao on avaliacaoquestao.IdAvaliacao = avaliacao.IdAvaliacao 
                                     INNER JOIN questao on questao.IdQuestao = avaliacaoquestao.IdQuestao 
                                     WHERE avaliacao.Descricao = '$avaliacaoDescricao'";

                    $resSelectQuestao = mysqli_query($con, $queryQuestao);

                    foreach($resSelectQuestao as $questao){
                      if($questao['IdTipoQuestao'] == 1){
                        //Questao Aberta
                        ?>

                        <div class="form-group">
                          <label for="input"><?php echo $questao['Descricao'];?></label>
                          <input type="text" class="form-control" 
                          <?php echo "name=" . $questao['IdAplicacao'] . ';' . $questao['IdAvaliacao'] . ';' . $questao['IdQuestao']  . ';' . $questao['IdTipoQuestao']  . "";
                                echo " placeholder=" . $questao['Descricao'];
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
                            <select class="form-control" <?php echo "name=" . $questao['IdAplicacao'] . ';' . $questao['IdAvaliacao'] . ';' . $questao['IdQuestao']  . ';' . $questao['IdTipoQuestao']  . "";?>>
                              <option> -- </option>
                          <?php foreach($resSelectAfirmativa as $afirmativa){ ?> 
                              <option value="<?php echo $afirmativa['IdAfirmativa'];?>"><?php echo $afirmativa['Descricao'];?></option>
                          <?php } ?>
                            </select>
                            <!--
                            <?php
                            if($questao['PossuiOutro'] == 'S'){ ?>
                              <input type="text" class="form-control obsInput" id="inputPescocoObs" placeholder="Observação">
                            <?php
                            } ?>
                             -->
                          </div>

                          <?php
                        }



                        if($questao['IdTipoQuestao'] == 3){
                          ?>
                          <div class="form-group">
                            <label for="selectAtividade"><?php echo $questao['Descricao'];?></label>
                            <select <?php echo "name=" . $questao['IdAplicacao'] . ';' . $questao['IdAvaliacao'] . ';' . $questao['IdQuestao']  . ';' . $questao['IdTipoQuestao']  . "";?> class="js-example-basic-multiple w-100" multiple>
                          <?php foreach($resSelectAfirmativa as $afirmativa){ ?> 
                              <option><?php echo $afirmativa['Descricao'];?></option>
                          <?php } ?>
                            </select>
                            <!--
                            <?php
                            if($questao['PossuiOutro'] == 'S'){ ?>
                              <input type="text" class="form-control obsInput" <?php echo "name='input" . $questao['Descricao'] . "'";?>  placeholder="Observação">
                            <?php
                            } ?>
                            -->
                          </div>

                          <?php
                          }


                          
                        if($questao['IdTipoQuestao'] == 4){
                          ?>
                          <div class="form-group">
                            <label for="selectAtividade"><?php echo $questao['Descricao'];?></label>
                            <div iclass="input-group date">
                              <input type="date" <?php echo "name=" . $questao['IdAplicacao'] . ';' . $questao['IdAvaliacao'] . ';' . $questao['IdQuestao']  . ';' . $questao['IdTipoQuestao']  . "";?>   class="form-control">
                            </div>
                          </div>

                          <?php
                          }

                          
                         if($questao['IdTipoQuestao'] == 5){
                          ?>
                          <div class="form-group row">
                            <label class="col-sm-6 col-form-label"><?php echo $questao['Descricao'];?></label>
                          <?php foreach($resSelectAfirmativa as $afirmativa){ ?> 
                          <div class="col-sm-3">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" <?php echo "name=" . $questao['IdAplicacao'] . ';' . $questao['IdAvaliacao'] . ';' . $questao['IdQuestao']  . ';' . $questao['IdTipoQuestao']  ."";?> value="<?php echo $afirmativa['IdAfirmativa'];?>">
                                <?php echo $afirmativa['Descricao'];?>
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
    <script src="../../../../js/formpickers.js"></script>
  <script src="../../../../js/file-upload.js"></script>
  <script src="../../../../js/iCheck.js"></script>
  <script src="../../../../js/typeahead.js"></script>
  <script src="../../../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/calmui/template/demo/vertical-default-light/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 15:35:38 GMT -->
</html>
