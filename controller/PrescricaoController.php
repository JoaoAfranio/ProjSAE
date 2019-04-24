<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PrescricaoModel.php";


	$prescricaoModel = new PrescricaoModel();

	$acao = $_GET["acao"];


	if($acao == "cadastrar"){
		$descricao 	= $_POST["descricao"];

		$prescricaoModel->inserir($descricao);

		echo "<script>location.href='../prescricao/Prescricao.php?cad=sucesso';</script>";
	}

	if($acao = "deletar"){

		$idPrescricao = $_POST["idPrescricao"];
		$prescricaoModel->excluir($idPrescricao);

		echo "<script>location.href='../prescricao/Prescricao.php?deletar=sucesso';</script>";

	}



	



?>