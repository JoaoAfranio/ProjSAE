<!DOCTYPE html>
<html lang="pt-br">
<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/sae/template/header.php";
?>


<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php require '../template/menuENF.php'; ?>
      <div class="main-panel">          
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4>Paciente: <small class="text-muted">Nome do paciente</small> </h4>
                      <h5>Código do Paciente: <small class="text-muted">Codigo do paciente</small> </h5>
                      <br>
                      <form id="form-rotina" action="RotinaEvolucao.php">
                        <div role="application" class="wizard clearfix" id="steps-uid-0"><div class="steps clearfix">
                            <ul role="tablist">
                                <li role="tab" class="first done" aria-disabled="false" aria-selected="true">
                                    <a id="steps-uid-0-t-0" aria-controls="steps-uid-0-p-0">
                                    <span class="current-info audible">current step: </span>
                                    <span class="number">1.</span> Diagnóstico</a>
                                </li>
                                <li role="tab" class="done" aria-disabled="false" aria-selected="false">
                                    <a id="steps-uid-0-t-1" aria-controls="steps-uid-0-p-1">
                                    <span class="number">2.</span> Prescrição</a>
                                </li>
                                <li role="tab" class="current" aria-disabled="true">
                                    <a id="steps-uid-0-t-2"  aria-controls="steps-uid-0-p-2">
                                    <span class="number">3.</span> Resultado</a>
                                </li>
                                <li role="tab" class="disabled last" aria-disabled="true">
                                    <a id="steps-uid-0-t-3"  aria-controls="steps-uid-0-p-3">
                                    <span class="number">4.</span> Evolução</a>
                                </li>
                            </ul>
                        </div>
                        <div class="content clearfix">
                        <h3 id="steps-uid-0-h-2" tabindex="-1" class="title current">Resultado</h3>
                          <section id="steps-uid-0-p-2" role="tabpanel" aria-labelledby="steps-uid-0-h-2" class="body current" style="left: 0px;" aria-hidden="false">
                            <div class="add-items d-flex">
                              <input type="text" class="inputPrescricao typehead form-control prescricao-list-input" placeholder="Insira uma prescrição">
                              <button class="add btn btn-primary font-weight-bold prescricao-list-add-btn">Adicionar</button>
                            </div>
                            <div class="list-wrapper">
                              <ul class="d-flex flex-column-reverse prescricao-list">
                              </ul>
                            </div>
                          </section>
                        </div>
                        <div class="actions clearfix">
                            <ul role="menu" aria-label="Pagination">
                              <li aria-hidden="false" aria-disabled="false">
                                <button class="add btn btn-primary font-weight-bold" type="submit">Próximo</button>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </form>
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

<script>
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
