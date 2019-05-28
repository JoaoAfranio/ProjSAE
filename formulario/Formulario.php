<?php
include $_SERVER["DOCUMENT_ROOT"] . "/sae/template/header.php";

   require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/FormularioModel.php";
   require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AvaliacaoModel.php";
   require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/FormularioAvaliacaoModel.php";
   require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AvaliacaoQuestaoModel.php";
   require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaModel.php";
   require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaQuestaoModel.php";
   require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/QuestaoModel.php";



   $afirmativa = new AfirmativaModel();
   $afirmativaQuestao = new AfirmativaQuestaoModel();
   $formulario = new FormularioModel();
   $avaliacao = new AvaliacaoModel();
   $questao = new  QuestaoModel();

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


?>
>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require '../template/menuADM.php'; ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <?php require 'CadastrarFormulario.php'?>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <?php require 'CadastrarFormularioAvaliacao.php'?>
            </div>
            <div class="col-12 grid-margin stretch-card">
              <?php require 'TabelaFormulario.php'?>
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
  <script src="../js/file-upload.js"></script>
  <script src="../js/iCheck.js"></script>
  <script src="../js/typeahead.js"></script>
  <script src="../js/select2.js"></script>
  <script src="../js/alerts.js"></script>
  <script src="../js/avgrund.js"></script>
  <script src="../js/data-table.js"></script>
  <!-- End custom js for this page-->

</body>


</html>
