<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class QuestionarioModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

        public function inserir($idFormulario, $idPaciente, $dataRealizado, $idFuncionario){

        $insercao = $this->bd->prepare("INSERT INTO Questionario (IdFormulario, IdPaciente, DataRealizado, IdFuncionario) VALUES (:idFormulario, :idPaciente, :dataRealizado, :idFuncionario)");
        $insercao->bindParam(":idFormulario", $idFormulario);
        $insercao->bindParam(":idPaciente", $idPaciente);
        $insercao->bindParam(":dataRealizado", $dataRealizado);
        $insercao->bindParam(":idFuncionario", $idFuncionario);

        $insercao->execute();

        }

        public function excluir($idQuestionario){
        $excluir = $this->bd->prepare("DELETE from Questionario where idQuestionario = :idQuestionario");
        $excluir->bindParam(":idQuestionario", $idQuestionario);
        $excluir->execute();
        }

        public function listarTodos(){
        $listar = $this->bd->query("SELECT * from Questionario");
        $res = $listar->fetchAll(PDO::FETCH_ASSOC);
        return $res;
        }

		public function listarID($idQuestionario){
            
            $listarUm = $this->bd->prepare("SELECT * from Questionario where idQuestionario = :idQuestionario");
            $listarUm->bindParam(":idQuestionario", $idQuestionario, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
         }

        public function listarUltimoQuestPaciente($idPaciente){
        
        $listarUltimoQuestPaciente = $this->bd->prepare("SELECT max(IdQuestionario) as IdQuestionario FROM questionario
                                                            WHERE DataRealizado = (select max(DataRealizado) from questionario
                                                                WHERE IdPaciente = :idPaciente  LIMIT 1) LIMIT 1");
        $listarUltimoQuestPaciente->bindParam(":idPaciente", $idPaciente, PDO::PARAM_INT);
        $listarUltimoQuestPaciente->execute();

        $res = $listarUltimoQuestPaciente->fetch(PDO::FETCH_ASSOC);
        return $res;
        }


	}



?>