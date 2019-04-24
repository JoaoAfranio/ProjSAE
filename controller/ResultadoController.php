<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/ResultadoModel.php";


	$resultadoModel = new ResultadoModel();

	$acao = $_GET["acao"];


	if($acao == "cadastrar"){
		$descricao 	= $_POST["descricao"];
		$idDiagnostico 	= $_POST["idDiagnostico"];

		$resultadoModel->inserir($descricao, $idDiagnostico);

		echo "<script>location.href='../resultado/Resultado.php?cad=sucesso';</script>";
	}

	if($acao = "deletar"){

		$idResultado = $_POST["idResultado"];
		$resultadoModel->excluir($idResultado);

		echo "<script>location.href='../resultado/resultado.php?deletar=sucesso';</script>";

	}

    if($acao = "deletarDiagnostico"){
        $idResultado = $_POST["idResultado"];
        $idDiagnostico 	= $_POST["idDiagnostico"];

		$resultadoModel->excluir($idResultado, $idDiagnostico);

		echo "<script>location.href='../resultado/Resultado.php?deletar=sucesso';</script>";

	}

	



?>