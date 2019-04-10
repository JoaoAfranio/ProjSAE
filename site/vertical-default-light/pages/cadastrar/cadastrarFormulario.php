<?php 
   require '../util/config.php';
   require '../util/conecta.php';

   $con = conecta();

   $acao = $_GET['acao'];

   if($acao == "cadFormulario"){
   		$nomeFormulario = $_POST['inputFormulario'];

   	$queryInsertFormulario = "INSERT INTO Formulario(Descricao) VALUES ('$nomeFormulario')";
	   $resInsert = mysqli_query($con, $queryInsertFormulario);
   }

   if($acao == "formularioAvaliacao"){
   		$idFormulario = $_POST['idFormulario'];
   		$idAvaliacoes = $_POST['idAvaliacao'];
   		for ($i=0;$i<count($idAvaliacoes);$i++)
   		{
   		   $queryInsertAplicacao = "INSERT INTO Aplicacao(IdAvaliacao, IdFormulario) VALUES ('$idAvaliacoes[$i]', '$idFormulario')";
		      $resInsert = mysqli_query($con, $queryInsertAplicacao);
   		}
   }

   if($resInsert == true){
   header("Location: ../forms/montarFormulario.php?cad=sucesso");	
   }else{
   //	header("Location: ../forms/montarFormulario.php?cad=erro");
   }
?>