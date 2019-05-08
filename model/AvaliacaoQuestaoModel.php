<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class AvaliacaoQuestaoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($idQuestao, $idAvaliacao){

		 	$insercao = $this->bd->prepare("INSERT INTO avaliacaoquestao (IdQuestao, IdAvaliacao) VALUES (:idQuestao, :idAvaliacao)");
            $insercao->bindParam(":idQuestao", $idQuestao);
            $insercao->bindParam(":idAvaliacao", $idAvaliacao);
		 	$insercao->execute();

		 }

		 public function excluir($idQuestao, $idAvaliacao){
		 	$excluir = $this->bd->prepare("DELETE from avaliacaoquestao where idAvaliacao = :idAvaliacao AND idQuestao = :idQuestao");
            $excluir->bindParam(":idQuestao", $idQuestao); 
            $excluir->bindParam(":idAvaliacao", $idAvaliacao);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from avaliacaoquestao");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
		 }

		 public function listarTodasQuestoes($idAvaliacao){
			$listarTodasQuestoes = $this->bd->query("SELECT * from avaliacaoquestao WHERE idAvaliacao = " . $idAvaliacao);
			$res = $listarTodasQuestoes->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		 }


	}




?>