<?php 
   require '../util/config.php';
   require '../util/conecta.php';

   $con = conecta();

	$idDiagnostico = $_GET['idDiagnostico'];


	$queryDeletetDiag = "DELETE FROM Diagnostico WHERE IdDiagnostico = '$idDiagnostico'";
	$resDelete = mysqli_query($con, $queryDeletetDiag);

	if($resDelete == true){
	header("Location: ../forms/cadastrarDiagnostico.php?deletar=sucesso");	
	}else{
	header("Location: ../forms/cadastrarDiagnostico.php?deletar=erro");
	}
?>