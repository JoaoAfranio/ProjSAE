<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class PacientePrescricaoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($idDiagnostico, $idPrescricao, $idQuestionarioDiagPresc){

		 	$insercao = $this->bd->prepare("INSERT INTO pacientePrescricao (IdDiagnostico, IdPrescricao, IdQuestionarioDiagPresc) VALUES (:idDiagnostico, :idPrescricao, :idQuestionarioDiagPresc)");
            $insercao->bindParam(":idDiagnostico", $idDiagnostico);
            $insercao->bindParam(":idPrescricao", $idPrescricao);
            $insercao->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
		 	$insercao->execute();

		 }

		 public function excluir($idDiagnostico, $idPrescricao, $idQuestionarioDiagPresc){
		 	$excluir = $this->bd->prepare("DELETE from pacientePrescricao where IdDiagnostico = :idDiagnostico AND IdQuestionarioDiagPresc = :idQuestionarioDiagPresc AND IdPrescricao = :idPrescricao");
            $excluir->bindParam(":idDiagnostico", $idDiagnostico);
            $excluir->bindParam(":idPrescricao", $idPrescricao);
            $excluir->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from pacientePrescricao");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarTodasPorDiagQuest($idDiagnostico, $idQuestionarioDiagPresc){
            
            $listarTodasPorDiagQuest = $this->bd->prepare("SELECT * from pacientePrescricao where IdDiagnostico = :idDiagnostico AND IdQuestionarioDiagPresc = :idQuestionarioDiagPresc");
            $listarTodasPorDiagQuest->bindParam(":idDiagnostico", $idDiagnostico);
            $listarTodasPorDiagQuest->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
            $listarTodasPorDiagQuest->execute();

            $res = $listarIdQuestionarioDiagPresc->fetchAll(PDO::FETCH_ASSOC);
            return $res;
         }


	}




?>