<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class QuestionarioDiagPrescModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($dataRealizado, $evolucao, $idPaciente, $idFuncionario){

		 	$insercao = $this->bd->prepare("INSERT INTO QuestionarioDiagPresc (DataRealizado, Evolucao, IdPaciente, IdFuncionario) VALUES (:dataRealizado, :evolucao, :idPaciente, :idFuncionario)");
			$insercao->bindParam(":dataRealizado", $dataRealizado);
			$insercao->bindParam(":evolucao", $evolucao);
			$insercao->bindParam(":idPaciente", $idPaciente);
			$insercao->bindParam(":idFuncionario", $idFuncionario);
		 	$insercao->execute();

		 }

		 public function excluir($idQuestionarioDiagPresc){
		 	$excluir = $this->bd->prepare("DELETE from QuestionarioDiagPresc where idQuestionarioDiagPresc = :idQuestionarioDiagPresc");
		 	$excluir->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from QuestionarioDiagPresc");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarID($idQuestionarioDiagPresc){
            
            $listarUm = $this->bd->prepare("SELECT * from QuestionarioDiagPresc where idQuestionarioDiagPresc = :idQuestionarioDiagPresc");
            $listarUm->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
		 }

		public function listarUltimo($idPaciente){
			$listarUltimo = $this->bd->prepare("SELECT max(IdQuestionarioDiagPresc) from QuestionarioDiagPresc where idPaciente = :idPaciente");
            $listarUltimo->bindParam(":idPaciente", $idPaciente, PDO::PARAM_INT);
			$listarUltimo->execute();
			
            $res = $listarUltimo->fetch(PDO::FETCH_ASSOC);
            return $res;
		}

		        
        public function alterarEvolucao($idQuestionario, $evolucao){

            $alterarEvolucao = $this->bd->prepare("UPDATE QuestionarioDiagPresc SET Evolucao = :evolucao WHERE IdQuestionarioDiagPresc = :idQuestionario");
            $alterarEvolucao->bindParam(":idQuestionario", $idQuestionario);
            $alterarEvolucao->bindParam(":evolucao", $evolucao);
            $alterarEvolucao->execute();
    
        }

		 



	}




?>