<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class AfirmativaModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($descricao){

		 	$insercao = $this->bd->prepare("INSERT INTO afirmativa (Descricao) VALUES (:descricao)");
		 	$insercao->bindParam(":descricao", $descricao);
		 	$insercao->execute();

		 }

		 public function excluir($idAfirmativa){
		 	$excluir = $this->bd->prepare("DELETE from afirmativa where idAfirmativa = :idAfirmativa");
		 	$excluir->bindParam(":idAfirmativa", $idAfirmativa);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from afirmativa");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarID($idAfirmativa){
            
            $listarUm = $this->bd->prepare("SELECT * from afirmativa where idAfirmativa = :idAfirmativa");
            $listarUm->bindParam(":idAfirmativa", $idAfirmativa, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
         }


	}




?>