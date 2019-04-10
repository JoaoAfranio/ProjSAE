<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.urbanui.com/calmui/template/demo/vertical-default-light/pages/apps/todo.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 13:40:07 GMT -->
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>CalmUI Admin</title>
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
    <?php require '../menu/menu.php'; ?>
      <!-- partial -->
      <div class="main-panel">          
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin">
                  <div class="card">
                    <div class="card-body">
                      <h4>Paciente: <small class="text-muted">João Rodrigues Rosa</small> </h4>
                      <h5>Atendimento: <small class="text-muted">Nº 19478</small> </h5>
                      <br>
                      <form id="example-form" action="#">
                        <div>
                          <h3>Diagnóstico</h3>
                          <section>
                              <div class="add-items d-flex">
                                <input type="text" class="typehead form-control diagnostico-list-input"  placeholder="Insira um diagnóstico">
                                <button class="add btn btn-primary font-weight-bold diagnostico-list-add-btn">Adicionar</button>
                              </div>
                              <div class="list-wrapper">
                                <ul class="d-flex flex-column-reverse diagnostico-list">
                                  <li>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Lorem ipsum dolor sit amet
                                      </label>
                                    </div>
                                    <i class="remove mdi mdi-close-circle-outline"></i>
                                  </li>
                                  <li class="completed">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Sunt in culpa qui officia deserunt mollit anim id est laborum
                                      </label>
                                    </div>
                                    <i class="remove mdi mdi-close-circle-outline"></i>
                                  </li>
                                  <li>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Ut aliquip ex ea commodo
                                      </label>
                                    </div>
                                    <i class="remove mdi mdi-close-circle-outline"></i>
                                  </li>
                                  <li>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Duis aute irure dolor in reprehenderit in voluptate velit esse
                                        cillum dolore
                                      </label>
                                    </div>
                                    <i class="remove mdi mdi-close-circle-outline"></i>
                                  </li>
                                  <li class="completed">
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Lorem ipsum dolor sit amet
                                      </label>
                                    </div>
                                    <i class="remove mdi mdi-close-circle-outline"></i>
                                  </li>
                                  <li>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Sunt in culpa qui officia deserunt mollit anim id est laborum
                                      </label>
                                    </div>
                                    <i class="remove mdi mdi-close-circle-outline"></i>
                                  </li>
                                </ul>
                              </div>
                          </section>
                          <h3>Prescrição</h3>
                          <section>
                              <div class="add-items d-flex">
                                  <input type="text" class="typehead form-control prescricao-list-input"  placeholder="Insira uma prescrição">
                                  <button class="add btn btn-primary font-weight-bold prescricao-list-add-btn">Adicionar</button>
                                </div>
                                <div class="list-wrapper">
                                  <ul class="d-flex flex-column-reverse prescricao-list">
                                    <li>
                                      <div class="form-check">
                                        <label class="form-check-label">
                                          <input class="checkbox" type="checkbox">Lorem ipsum dolor sit amet<i class="input-helper"></i>
                                        </label></div><label class="mleftAuto" for="selectRotina">
                                          Rotina</label>
                                          <select class="form-control selectRotina form-control-sm" id="selectRotina">
                                            <option>02 em 02 Horas</option>
                                            <option>04 em 04 Horas</option>
                                            <option>06 em 06 Horas</option>
                                          </select><i class="remove mdi mdi-close-circle-outline"></i>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">Sunt in culpa qui officia deserunt mollit anim id est laborum<i class="input-helper"></i>
                                          </label></div><label class="mleftAuto" for="selectRotina">
                                            Rotina</label>
                                            <select class="form-control selectRotina form-control-sm" id="selectRotina">
                                              <option>02 em 02 Horas</option>
                                              <option>04 em 04 Horas</option>
                                              <option>06 em 06 Horas</option>
                                            </select><i class="remove mdi mdi-close-circle-outline"></i>
                                    </li>
                                    <li>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input class="checkbox" type="checkbox">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore<i class="input-helper"></i>
                                          </label></div><label class="mleftAuto" for="selectRotina">
                                            Rotina</label>
                                            <select class="form-control selectRotina form-control-sm" id="selectRotina">
                                              <option>02 em 02 Horas</option>
                                              <option>04 em 04 Horas</option>
                                              <option>06 em 06 Horas</option>
                                            </select><i class="remove mdi mdi-close-circle-outline"></i>
                                    </li>
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
                          <h3>Relatório</h3>
                          <section>
                            <h3>Finish</h3>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input class="checkbox" type="checkbox">
                                I agree with the Terms and Conditions.
                              </label>
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
  <script src="../../../../js/wizard.js"></script>
  <script src="../../../../js/calendar.js"></script>
  <script src="../../../../js/typeahead.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/calmui/template/demo/vertical-default-light/pages/apps/todo.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 13:40:17 GMT -->
</html>
