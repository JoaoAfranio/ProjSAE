<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class DiagnosticoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($descricao,$idUnidadeInternacao){

		 	$insercao = $this->bd->prepare("INSERT INTO diagnostico (Descricao, IdUnidadeInternacao) VALUES (:descricao, :idUnidadeInternacao)");
		 	$insercao->bindParam(":descricao", $descricao);
		 	$insercao->bindParam(":idUnidadeInternacao", $idUnidadeInternacao);
		 	$insercao->execute();

		 }

		 public function editar($idDiagnostico, $descricao){

			$editar = $this->bd->prepare("UPDATE diagnostico SET Descricao = :descricao WHERE IdDiagnostico = :idDiagnostico");
			$editar->bindParam(":descricao", $descricao);
			$editar->bindParam(":idDiagnostico", $idDiagnostico);
			$editar->execute();

		}

		 public function excluir($idDiagnostico){
		 	$excluir = $this->bd->prepare("DELETE from diagnostico where idDiagnostico = :idDiagnostico");
		 	$excluir->bindParam(":idDiagnostico", $idDiagnostico);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from diagnostico");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
		 }

		public function listarPrescricoes($idDiagnostico){
			$listarPrescricoes = $this->bd->query("SELECT * from diagnosticoprescricao WHERE idDiagnostico = " . $idDiagnostico);
			$listarPrescricoes->bindParam(":idDiagnostico", $idDiagnostico);

			$res = $listarPrescricoes->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}

		public function listarID($idDiagnostico){
            
            $listarUm = $this->bd->prepare("SELECT * from diagnostico where idDiagnostico = :idDiagnostico");
            $listarUm->bindParam(":idDiagnostico", $idDiagnostico, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
		 }
		 
		 public function listarUnidade($idUnidadeInternacao){
			 $listarUnidade = $this->bd->prepare("SELECT * from unidadeinternacao where IdUnidadeInternacao = :idUnidadeInternacao");
			 $listarUnidade->bindParam(":idUnidadeInternacao", $idUnidadeInternacao, PDO::PARAM_INT);
			 $listarUnidade->execute();
 
			 $res = $listarUnidade->fetch(PDO::FETCH_ASSOC);
			 return $res;
		 }

		public function listarTodosPorUnidade($idUnidadeInternacao){
			$listar = $this->bd->query("SELECT * from diagnostico WHERE IdUnidadeInternacao = " . $idUnidadeInternacao);
			$res = $listar->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}


	}




?>