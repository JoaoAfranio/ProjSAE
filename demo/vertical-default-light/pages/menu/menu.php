    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="../../index-2.html"><img src="../../../../images/logo.png" alt="logo"/></a>
          <a class="navbar-brand brand-logo-mini" href="../../index-2.html"><img src="http://www.urbanui.com/calmui/template/images/logo-mini.svg" alt="logo"/></a>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="../../../../images/faces/face5.jpg" alt="profile"/>
              <span class="nav-profile-name">Bruna Vieira</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="mdi mdi-settings text-primary"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">

    
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Cadastrar Pacientes</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="#">Neonato</a></li>                
                <li class="nav-item"><a class="nav-link" href="../forms/cadastrarPed.php">Pediátrico</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Adulto</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../apps/realizarRotina.php">
              <i class="mdi mdi-playlist-check menu-icon"></i>
              <span class="menu-title">Realizar Rotina</span>
            </a>
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="../samples/search-pessoa.php">
              <i class="mdi mdi-account-search menu-icon"></i>
              <span class="menu-title">Pesquisar Paciente</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../forms/exameFisico.php">
              <i class="mdi mdi-file menu-icon"></i>
              <span class="menu-title">Exame Físico</span>
            </a>
          </li>
        </ul>
      </nav>