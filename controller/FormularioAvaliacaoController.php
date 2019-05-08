<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/FormularioAvaliacaoModel.php";


	$formularioAvaliacaoModel = new FormularioAvaliacaoModel();

	$acao = $_GET["acao"];
    $idAvaliacao 	= $_POST["idAvaliacao"];
    $idFormulario 	= $_POST["idFormulario"];


	if($acao == "cadastrar"){

		$formularioAvaliacaoModel->inserir($idAvaliacao, $idFormulario);

		echo "<script>location.href='../formulario/Formulario.php?cad=sucesso';</script>";
		exit();
	}

	if($acao == "deletar"){

		$formularioAvaliacaoModel->excluir($idAvaliacao, $idFormulario);

		echo "<script>location.href='../formulario/Formulario.php?deletar=sucesso';</script>";

	}

?>