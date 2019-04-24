<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/DiagnosticoModel.php";


	$diagnosticoModel = new DiagnosticoModel();

	$acao = $_GET["acao"];


	if($acao == "cadastrar"){
		$descricao 	= $_POST["descricao"];
		$idUnidadeInternacao 	= $_POST["idUnidadeInternacao"];

		$diagnosticoModel->inserir($descricao, $idUnidadeInternacao);

		echo "<script>location.href='../diagnostico/Diagnostico.php?cad=sucesso';</script>";
	}

	if($acao = "deletar"){

		$idDiagnostico = $_POST["idDiagnostico"];
		$diagnosticoModel->excluir($idDiagnostico);

		echo "<script>location.href='../diagnostico/diagnostico.php?deletar=sucesso';</script>";

	}



	



?>