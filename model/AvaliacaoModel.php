<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class AvaliacaoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($descricao){

		 	$insercao = $this->bd->prepare("INSERT INTO avaliacao (Descricao) VALUES (:descricao)");
		 	$insercao->bindParam(":descricao", $descricao);
		 	$insercao->execute();

		 }

		 public function editar($idAvaliacao, $descricao){

			$editar = $this->bd->prepare("UPDATE avaliacao SET Descricao = :descricao WHERE IdAvaliacao = :idAvaliacao");
			$editar->bindParam(":descricao", $descricao);
			$editar->bindParam(":idAvaliacao", $idAvaliacao);
			$editar->execute();

		}


		 public function excluir($idAvaliacao){
		 	$excluir = $this->bd->prepare("DELETE from avaliacao where idAvaliacao = :idAvaliacao");
		 	$excluir->bindParam(":idAvaliacao", $idAvaliacao);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from avaliacao");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarID($idAvaliacao){
            
            $listarUm = $this->bd->prepare("SELECT * from avaliacao where idAvaliacao = :idAvaliacao");
            $listarUm->bindParam(":idAvaliacao", $idAvaliacao, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
		 }
		 


	}




?>