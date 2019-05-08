<?php
	
	require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/FormularioModel.php";


	$formularioModel = new FormularioModel();

	$acao = $_GET["acao"];


	if($acao == "cadastrar"){
		$descricao 	= $_POST["descricao"];

		$formularioModel->inserir($descricao);

		echo "<script>location.href='../formulario/Formulario.php?cad=sucesso';</script>";
	}

	if($acao == "deletar"){

		$idFormulario = $_POST["idFormulario"];
		$formularioModel->excluir($idFormulario);

		echo "<script>location.href='../formulario/Formulario.php?deletar=sucesso';</script>";

	}



	



?>