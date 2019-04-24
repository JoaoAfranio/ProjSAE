<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class AfirmativaQuestaoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($idQuestao, $idAfirmativa){

		 	$insercao = $this->bd->prepare("INSERT INTO questaoafirmativa (IdQuestao, IdAfirmativa) VALUES (:idQuestao, :idAfirmativa)");
            $insercao->bindParam(":idQuestao", $idQuestao);
            $insercao->bindParam(":idAfirmativa", $idAfirmativa);
		 	$insercao->execute();

		 }

		 public function excluir($idQuestao, $idAfirmativa){
		 	$excluir = $this->bd->prepare("DELETE from questaoafirmativa where idAfirmativa = :idAfirmativa AND idQuestao = :idQuestao");
            $excluir->bindParam(":idQuestao", $idQuestao); 
            $excluir->bindParam(":idAfirmativa", $idAfirmativa);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from questaoafirmativa");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
		 }


	}




?>