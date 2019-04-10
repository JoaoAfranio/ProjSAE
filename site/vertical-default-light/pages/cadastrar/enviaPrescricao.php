<?php 
   require '../util/config.php';
   require '../util/conecta.php';

   $con = conecta();

	$prescricao = $_POST['prescricao'];
	$diagnostico = $_POST['diagnostico'];


	$queryInsertPresc = "INSERT INTO Prescricao(Descricao, IdDiagnostico)
						VALUES ('$prescricao', '$diagnostico')";
	$resInsert = mysqli_query($con, $queryInsertPresc);

	if($resInsert == true){
	header("Location: ../forms/cadastrarPrescricao.php?cad=sucesso");	
	}else{
	header("Location: ../forms/cadastrarPrescricao.php?cad=erro");
	}
?>