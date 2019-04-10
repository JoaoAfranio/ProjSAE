<!DOCTYPE html>
<html lang="pt-br">


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
      <?php require '../menu/menu.php'; ?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12">
              <h1 class="text-center align-items-center justify-content-center d-block tituloExame">Exame Físico</h1>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h5>Avaliação Neurólogica</h5>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="selectAtividade">Atividade</label>
                      <select class="form-control" id="selectAtividade">
                        <option> -- </option>
                        <option>Reativo frente a estímulo</option>
                        <option>Hipoativo</option>
                      </select>
                    </div>
                    <div class="form-group">
                    <label>Reflexos</label>
                    <select class="js-example-basic-multiple w-100" multiple="multiple">
                          <option>Busca</option>
                          <option>Sucção</option>
                          <option>Preensão palmar</option>
                          <option>Preensão plantar</option>
                          <option>Cutânea plantar/babinsk</option>
                          <option>de Moro</option>
                          <option>Marcha Reflexa</option>
                    </select>
                    <input type="text" class="form-control obsInput" id="inputReflexo" placeholder="Observação">
                    </div>
                    <div class="form-group">
                      <label for="selectCranio">Crânio</label>
                      <select class="js-example-basic-multiple w-100" multiple="multiple">
                          <option>Simétrico</option>
                          <option>Assimétrico</option>
                          <option>Bossa</option>
                          <option>Cefalohematoma</option>
                          <option>Escoriações</option>
                          <option>Máscara equimótica</option>
                    </select>
                    <input type="text" class="form-control obsInput" id="inputCranio" placeholder="Observação">
                    </div>
                    <div class="form-group">
                      <label for="selectFontanelas">Fontanelas</label>
                      <select class="form-control" id="selectFontanelas">
                        <option> -- </option>
                        <option>Planas</option>
                        <option>Deprimida</option>
                        <option>Abaulada</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="olhos">Olhos</label>

                      <select class="form-control obsInput" id="selectOlhosMucosa">
                        <option> -- </option>
                        <option>Mucosa Corada</option>
                        <option>Mucosa Hipocorada</option>
                      </select>

                      <select class="form-control obsInput" id="selectOlhosMucosa">
                        <option> -- </option>
                        <option>Secreção purulenta</option>
                        <option>Hiperemia</option>
                        <option>Edema</option>
                      </select>

                      <div class="form-group obsInput">
                      <label for="inputPupilas">Pupilas</label>
                      <input type="text" class="form-control" id="inputPupilas" placeholder="Pupilas">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="selectInsercaoOrelha">Inserção da orelha</label>
                      <select class="form-control" id="selectInsercaoOrelha">
                        <option> -- </option>
                        <option>Mesmo nível dos olhos</option>
                        <option>Acima dos olhos</option>
                        <option>Abaixo dos olhos</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="selectLobulo">Lóbulo</label>
                      <select class="form-control" id="selectLobulo">
                        <option> -- </option>
                        <option>Sem alterações</option>
                        <option>Malformado</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="selectBoca">Boca</label>
                      <select class="js-example-basic-multiple w-100" multiple="multiple">
                          <option>Mucosa corada</option>
                          <option>Hipocorada</option>
                          <option>Palato íntegro</option>
                          <option>Lábios íntegros</option>
                          <option>Dentes neonatais</option>
                    </select>
                    </div>

                    <div class="form-group">
                      <label for="selectPescoço">Pescoço</label>
                      <select class="form-control" id="selectPescoço">
                        <option> -- </option>
                        <option>Móvel</option>
                        <option>Torcicolo Congênito</option>
                        <option>Bócio</option>
                      </select>
                      <input type="text" class="form-control obsInput" id="inputPescocoObs" placeholder="Observação">
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h5>Avaliação Abdome</h5>
                  <form class="forms-sample">
                    <div class="form-group">
                      <label for="selectAtividade">Coto Umbilical</label>
                      <select class="form-control" id="selectAtividade">
                        <option> -- </option>
                        <option>Com clamp</option>
                        <option>Sem clamp</option>
                      </select>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-6 col-form-label">Presença de cateter umbilical</label>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked>
                            Sim
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
                            Não
                          </label>
                        </div>
                      </div>
                    </div>


                    <div class="form-group">
                    <label>Data da inserção</label>
                        <div id="datepicker-popup" class="input-group date datepicker">
                          <input type="text" class="form-control">
                          <span class="input-group-addon input-group-append border-left">
                            <span class="mdi mdi-calendar input-group-text"></span>
                          </span>
                        </div>
                    </div>

                    <div class="form-group">
                    <label>Data do curativo</label>
                        <div id="datepicker-popup" class="input-group date datepicker">
                          <input type="text" class="form-control">
                          <span class="input-group-addon input-group-append border-left">
                            <span class="mdi mdi-calendar input-group-text"></span>
                          </span>
                        </div>
                    </div>

                    <div class="form-group">
                      <select class="js-example-basic-multiple w-100" multiple="multiple">
                          <option>Bom aspecto</option>
                          <option>Hiperemiado</option>
                          <option>Exsudato</option>                   
                      </select>
                      <input type="text" class="form-control obsInput" id="inputCurativoOutro" placeholder="Outro">
                    </div>

                    <div class="form-group">
                      <label for="selectAbdome">Abdome</label>
                      <select class="js-example-basic-multiple w-100" multiple="multiple">
                          <option>Plano</option>
                          <option>Globoso</option>
                          <option>Distendido</option>
                          <option>Tenso</option>
                          <option>Flácido</option>
                          <option>RHA+</option>
                          <option>RHA diminuídos</option>
                          <option>RHA-</option>
                    </select>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-6 col-form-label">Hepatomegalia</label>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked>
                            Sim
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
                            Não
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-6 col-form-label">Esplenomegalia</label>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked>
                            Sim
                          </label>
                        </div>
                      </div>
                      <div class="col-sm-3">
                        <div class="form-check">
                          <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2">
                            Não
                          </label>
                        </div>
                      </div>
                    </div>                    

                    <div class="form-group">
                      <label for="selectAtividade">Mecônio</label>
                      <select class="form-control" id="selectAtividade">
                        <option> -- </option>
                        <option>< 24 h</option>
                        <option>24-48 h</option>
                        <option>Ausente</option>
                      </select>
                    </div>                    
                    <button type="submit" class="btn btn-primary mr-2">Enviar</button>
                    <button class="btn btn-light">Cancelar</button>
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
    <script src="../../../../js/formpickers.js"></script>
  <script src="../../../../js/file-upload.js"></script>
  <script src="../../../../js/iCheck.js"></script>
  <script src="../../../../js/typeahead.js"></script>
  <script src="../../../../js/select2.js"></script>
  <!-- End custom js for this page-->
</body>


<!-- Mirrored from www.urbanui.com/calmui/template/demo/vertical-default-light/pages/forms/basic_elements.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Nov 2018 15:35:38 GMT -->
</html>
