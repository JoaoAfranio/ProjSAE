<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PrescricaoDiagnosticoModel.php";


	$prescricaoDiagnosticoModel = new PrescricaoDiagnosticoModel();

	$acao = $_GET["acao"];
    $idDiagnostico 	= $_POST["idDiagnostico"];
    $idPrescricao 	= $_POST["idPrescricao"];


	if($acao == "cadastrar"){

		$prescricaoDiagnosticoModel->inserir($idDiagnostico, $idPrescricao);

	    echo "<script>location.href='../prescricao/Prescricao.php?cad=sucesso';</script>";
	}

	if($acao = "deletar"){

		$prescricaoDiagnosticoModel->excluir($idDiagnostico, $idPrescricao);

		echo "<script>location.href='../diagnostico/Diagnostico.php?deletar=sucesso';</script>";

	}



	



?>