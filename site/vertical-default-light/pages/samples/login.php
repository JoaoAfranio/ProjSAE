<?php 
  require '../util/config.php';
  require '../util/conecta.php';

  session_start();

  $login = $_POST['login'];
  $senha = $_POST['senha'];

        
  $verifica_login = mysqli_query($con, "SELECT * FROM login WHERE login = '$login' AND senha = '$senha'");
  
  $verifica_Usuario_Administrador =  mysqli_query($con, "SELECT * FROM login WHERE login = '$login' AND IdUsuario in (select IdTipoUsuario FROM usuario where IdTipoUsuario = '1')");

    if (mysqli_num_rows($verifica_login)<=0){
          echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='site/vertical-default-light/samples/index.html';</script>";
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
        }else{  

          $_SESSION['login'] = $login;
          $_SESSION['senha'] = $senha;

          header('location:projSAE/site/vertical-default-light/pages/samples/search-pessoa.php');

          

          
        }
?>