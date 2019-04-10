<?php 
   require '../util/config.php';
   require '../util/conecta.php';

   $con = conecta();

	$idUnidadeInternacao = $_POST['unidadeInternacao'];
	$diagnostico = $_POST['diagnostico'];


	$queryInsertDiag = "INSERT INTO Diagnostico(Descricao, IdUnidadeInternacao)
						VALUES ('$diagnostico', '$idUnidadeInternacao')";
	$resInsert = mysqli_query($con, $queryInsertDiag);

	if($resInsert == true){
	header("Location: ../forms/cadastrarDiagnostico.php?cad=sucesso");	
	}else{
		header("Location: ../forms/cadastrarDiagnostico.php?cad=erro");
	}
?>