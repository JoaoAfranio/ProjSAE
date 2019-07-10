<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class QuestionarioDiagPrescModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($dataRealizado, $evolucao, $idPaciente, $idFuncionario, $idQuestionario){

		 	$insercao = $this->bd->prepare("INSERT INTO questionariodiagpresc (DataRealizado, Evolucao, IdPaciente, IdFuncionario, IdQuestionario) VALUES (:dataRealizado, :evolucao, :idPaciente, :idFuncionario, :idQuestionario)");
			$insercao->bindParam(":dataRealizado", $dataRealizado);
			$insercao->bindParam(":evolucao", $evolucao);
			$insercao->bindParam(":idPaciente", $idPaciente);
			$insercao->bindParam(":idFuncionario", $idFuncionario);
			$insercao->bindParam(":idQuestionario", $idQuestionario);
		 	$insercao->execute();

		 }

		 public function excluir($idQuestionarioDiagPresc){
		 	$excluir = $this->bd->prepare("DELETE from questionariodiagpresc where idQuestionarioDiagPresc = :idQuestionarioDiagPresc");
		 	$excluir->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from questionariodiagpresc");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarID($idQuestionarioDiagPresc){
            
            $listarUm = $this->bd->prepare("SELECT * from questionariodiagpresc where idQuestionarioDiagPresc = :idQuestionarioDiagPresc");
            $listarUm->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
		 }

		public function listarUltimo($idPaciente){
			$listarUltimo = $this->bd->prepare("SELECT max(IdQuestionarioDiagPresc) from questionariodiagpresc where idPaciente = :idPaciente");
            $listarUltimo->bindParam(":idPaciente", $idPaciente, PDO::PARAM_INT);
			$listarUltimo->execute();
			
            $res = $listarUltimo->fetch(PDO::FETCH_ASSOC);
            return $res;
		}

		        
        public function alterarEvolucao($idQuestionario, $evolucao){

            $alterarEvolucao = $this->bd->prepare("UPDATE questionariodiagpresc SET Evolucao = :evolucao WHERE IdQuestionarioDiagPresc = :idQuestionario");
            $alterarEvolucao->bindParam(":idQuestionario", $idQuestionario);
            $alterarEvolucao->bindParam(":evolucao", $evolucao);
            $alterarEvolucao->execute();
    
		}
		
		public function listarTodosDiagnosticos($idPaciente){
			$listarTodosDiagnosticos = $this->bd->query("SELECT diag.Descricao FROM diagnostico as diag 
														INNER JOIN pacientediagnostico as pacDiag on pacDiag.IdDiagnostico = diag.IdDiagnostico
														INNER JOIN questionariodiagpresc as qDiagPres on qDiagPres.idQuestionarioDiagPresc = pacDiag.idQuestionarioDiagPresc
														INNER JOIN paciente as pac on qDiagPRes.IdPaciente = pac.IdPaciente
														WHERE pac.IdPaciente = " . $idPaciente);
			$res = $listarTodosDiagnosticos->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}

		public function listarTodosPorPaciente($idPaciente){
			$listarTodosPorPaciente = $this->bd->prepare("SELECT *, DATE_FORMAT(DataRealizado, '%d/%m/%Y') AS dataFormatada from questionariodiagpresc where idPaciente = :idPaciente");
            $listarTodosPorPaciente->bindParam(":idPaciente", $idPaciente, PDO::PARAM_INT);
			$listarTodosPorPaciente->execute();
			
            $res = $listarTodosPorPaciente->fetchAll(PDO::FETCH_ASSOC);
            return $res;
		}

				
		public function listarTodosDiagnosticosIdQuestionario($idQuestionarioDiagPresc){
			$listarTodosDiagnosticosIdQuestionario = $this->bd->query("SELECT * from questionariodiagpresc
														INNER JOIN pacientediagnostico on pacientediagnostico.idQuestionarioDiagPresc = questionariodiagpresc.idQuestionarioDiagPresc
														INNER JOIN diagnostico on diagnostico.IdDiagnostico = pacientediagnostico.IdDiagnostico
														WHERE questionariodiagpresc.IdQuestionarioDiagPresc = " . $idQuestionarioDiagPresc);
			$res = $listarTodosDiagnosticosIdQuestionario->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}

		public function listarTodasPrescricoesIdQuestionario($idQuestionarioDiagPresc){
			$listarTodasPrescricoesIdQuestionario = $this->bd->query("SELECT * from questionariodiagpresc
														INNER JOIN pacienteprescricao on pacienteprescricao.idQuestionarioDiagPresc = questionariodiagpresc.idQuestionarioDiagPresc
														INNER JOIN prescricao on prescricao.IdPrescricao = pacienteprescricao.IdPrescricao
														WHERE questionariodiagpresc.IdQuestionarioDiagPresc = " . $idQuestionarioDiagPresc);
			$res = $listarTodasPrescricoesIdQuestionario->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}

		public function listarTodosResultadosIdQuestionario($idQuestionarioDiagPresc){
			$listarTodosResultadosIdQuestionario = $this->bd->query("SELECT *, resultado.Descricao as resDescricao FROM resultado 
																		INNER JOIN diagnostico on diagnostico.IdDiagnostico = resultado.IdDiagnostico 
																		INNER JOIN pacienteresultado on pacienteresultado.IdResultado = resultado.IdResultado 
																		WHERE pacienteresultado.IdQuestionarioDiagPresc = " . $idQuestionarioDiagPresc);
			$res = $listarTodosResultadosIdQuestionario->fetchAll(PDO::FETCH_ASSOC);
			return $res;

		}


	}




?>