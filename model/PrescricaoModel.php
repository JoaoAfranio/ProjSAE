<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class PrescricaoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($descricao){

		 	$insercao = $this->bd->prepare("INSERT INTO prescricao (Descricao) VALUES (:descricao)");
		 	$insercao->bindParam(":descricao", $descricao);
		 	$insercao->execute();

		 }

		 public function excluir($idPrescricao){
		 	$excluir = $this->bd->prepare("DELETE from prescricao where idPrescricao = :idPrescricao");
		 	$excluir->bindParam(":idPrescricao", $idPrescricao);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from prescricao");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarID($idPrescricao){
            
            $listarUm = $this->bd->prepare("SELECT * from prescricao where idPrescricao = :idPrescricao");
            $listarUm->bindParam(":idPrescricao", $idPrescricao, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
         }


	}




?>