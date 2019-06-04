<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class PacienteDiagnosticoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($idDiagnostico, $idQuestionarioDiagPresc){

		 	$insercao = $this->bd->prepare("INSERT INTO pacienteDiagnostico (IdDiagnostico, IdQuestionarioDiagPresc) VALUES (:idDiagnostico, :idQuestionarioDiagPresc)");
             $insercao->bindParam(":idDiagnostico", $idDiagnostico);
             $insercao->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
		 	$insercao->execute();

		 }

		 public function excluir($idDiagnostico, $idQuestionarioDiagPresc){
		 	$excluir = $this->bd->prepare("DELETE from pacienteDiagnostico where IdDiagnostico = :idDiagnostico AND IdQuestionarioDiagPresc = :idQuestionarioDiagPresc");
            $excluir->bindParam(":idDiagnostico", $idDiagnostico);
            $excluir->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from pacienteDiagnostico");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarIdQuestionarioDiagPresc($idQuestionarioDiagPresc){
            
            $listarIdQuestionarioDiagPresc = $this->bd->prepare("SELECT * from pacienteDiagnostico where IdQuestionarioDiagPresc = :idQuestionarioDiagPresc");
            $listarIdQuestionarioDiagPresc->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
            $listarIdQuestionarioDiagPresc->execute();

            $res = $listarIdQuestionarioDiagPresc->fetchAll(PDO::FETCH_ASSOC);
            return $res;
         }


	}




?>