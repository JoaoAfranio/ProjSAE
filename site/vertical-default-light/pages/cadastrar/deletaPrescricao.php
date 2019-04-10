<?php 
   require '../util/config.php';
   require '../util/conecta.php';

   $con = conecta();

	$idPrescricao = $_GET['idPrescricao'];


	$queryDeletetPres = "DELETE FROM Prescricao WHERE IdPrescricao = '$idPrescricao'";
	$resDelete = mysqli_query($con, $queryDeletetPres);

	if($resDelete == true){
	header("Location: ../forms/cadastrarPrescricao.php?deletar=sucesso");	
	}else{
	header("Location: ../forms/cadastrarPrescricao.php?deletar=erro");
	}
?>