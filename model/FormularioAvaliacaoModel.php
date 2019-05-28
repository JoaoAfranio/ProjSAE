<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class FormularioAvaliacaoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($idAvaliacao, $idFormulario){

		 	$insercao = $this->bd->prepare("INSERT INTO aplicacao (IdAvaliacao, IdFormulario) VALUES (:idAvaliacao, :idFormulario)");
            $insercao->bindParam(":idAvaliacao", $idAvaliacao);
            $insercao->bindParam(":idFormulario", $idFormulario);
		 	$insercao->execute();

		 }

		 public function excluir($idAvaliacao, $idFormulario){
            $excluir = $this->bd->prepare("DELETE from aplicacao where idFormulario = :idFormulario AND idAvaliacao = :idAvaliacao"); 
            $excluir->bindParam(":idAvaliacao", $idAvaliacao); 
            $excluir->bindParam(":idFormulario", $idFormulario);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from aplicacao");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
		 }

		 public function listarTodosIdFormulario($idFormulario){
			$listarTodosIdFormulario = $this->bd->query("SELECT * from aplicacao WHERE idFormulario = " . $idFormulario);
			$res = $listarTodosIdFormulario->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		 }

		 public function listarTudoPorIdFormulario($idFormulario){
			
			$listarTudoPorIdFormulario = $this->bd->query("SELECT aplicacao.IdAplicacao, avaliacao.IdAvaliacao, questao.IdQuestao, questao.Descricao,questao.IdTipoQuestao,questao.PossuiOutro 
			FROM formulario INNER JOIN aplicacao ON aplicacao.IdFormulario = formulario.IdFormulario 
			INNER JOIN avaliacao on avaliacao.IdAvaliacao = aplicacao.IdAvaliacao 
			INNER JOIN avaliacaoquestao on avaliacaoquestao.IdAvaliacao = avaliacao.IdAvaliacao 
			INNER JOIN questao on questao.IdQuestao = avaliacaoquestao.IdQuestao 
			WHERE formulario.IdFormulario = " . $idFormulario);
			
			$res = $listarTudoPorIdFormulario->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		 }


	}




?>