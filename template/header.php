<?php 
  session_start();

  if(isset($_GET['acao']) && $_GET['acao'] == 'logout'){

    session_destroy();

    header("Location:/sae/index.php");

  }

 	if(!isset($_SESSION["sessIdTime"])){

    $_SESSION["sessIdTime"] = time();

  }elseif(time() - $_SESSION["sessIdTime"] > 1000){

    $_SESSION = [];
    session_destroy();

  }else{
    $_SESSION["sessIdTime"] = time();
  }


  if(!isset($_SESSION["logado"])){
    header("Location:/sae/index.php");
    exit();
  }
  
  if($_SESSION["TipoFuncionario"]!="administrador"){
    header("Location:/sae/index.php");
  }

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SAE</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../css/iconfonts/mdi/font/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="http://www.urbanui.com/">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.ico" />

</head>
