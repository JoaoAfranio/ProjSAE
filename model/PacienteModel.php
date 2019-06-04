<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class PacienteModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }



		 public function inserir($codigoPaciente, $nome, $idTipoPaciente, $idUnidadeInternacao){

		 	$insercao = $this->bd->prepare("INSERT INTO paciente (CodigoPaciente, Nome, IdTipoPaciente, IdUnidadeInternacao) VALUES (:codigoPaciente, :nome, :idTipoPaciente, :idUnidadeInternacao)");
            $insercao->bindParam(":codigoPaciente", $codigoPaciente);
            $insercao->bindParam(":nome", $nome);
            $insercao->bindParam(":idTipoPaciente", $idTipoPaciente);
            $insercao->bindParam(":idUnidadeInternacao", $idUnidadeInternacao);
		 	$insercao->execute();

		 }

		 public function excluir($idPaciente){
		 	$excluir = $this->bd->prepare("DELETE from paciente where idPaciente = :idPaciente");
		 	$excluir->bindParam(":idPaciente", $idPaciente);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from paciente");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarID($idPaciente){
            
            $listarUm = $this->bd->prepare("SELECT * from paciente where idPaciente = :idPaciente");
            $listarUm->bindParam(":idPaciente", $idPaciente, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
         }

         public function listarUltimo($codigoPaciente){
            $listarUltimo = $this->bd->prepare("SELECT * FROM paciente WHERE CodigoPaciente = :codigoPaciente");
            $listarUltimo->bindParam(":codigoPaciente", $codigoPaciente);
            $listarUltimo->execute();

            $res = $listarUltimo->fetch(PDO::FETCH_ASSOC);
            return $res;
         }

         public function listarPeloNome($nome){
            $listarPeloNome = $this->bd->query("SELECT * from paciente WHERE nome like '%$nome%' GROUP BY nome");
            $res = $listarPeloNome->fetchAll(PDO::FETCH_ASSOC);
            return $res;
         }

         public function listarInfosPaciente($idPaciente){
            $listarInfosPaciente = $this->bd->prepare("SELECT pac.IdPaciente, pac.Nome, pac.CodigoPaciente, tpPac.IdTipoPaciente, tpPac.Descricao, ui.NomeUnidade, ui.IdUnidadeinternacao
                                                       FROM Paciente as pac INNER JOIN tipopaciente as tpPac on tpPac.IdTipoPaciente = pac.IdTipoPaciente
                                                                            INNER JOIN unidadeinternacao as ui on ui.IdUnidadeInternacao = pac.IdUnidadeInternacao
                                                                            WHERE pac.IdPaciente = :idPaciente");
            $listarInfosPaciente->bindParam(":idPaciente", $idPaciente, PDO::PARAM_INT);
            $listarInfosPaciente->execute();

            $res = $listarInfosPaciente->fetchAll(PDO::FETCH_ASSOC);
            return $res;

         }


         public function listarInfoPeloIdQuestionario($idQuestionario){
            $listarInfoPeloIdQuestionario = $this->bd->prepare("SELECT * FROM paciente as pac INNER JOIN questionario as quest on quest.IdPaciente = pac.IdPaciente 
                                                                  INNER JOIN tipopaciente as tp on tp.IdTipoPaciente = pac.IdTipoPaciente
                                                                  INNER JOIN unidadeinternacao as ui on ui.IdUnidadeInternacao = pac.IdUnidadeInternacao
                                                                  WHERE quest.IdQuestionario = :idQuestionario LIMIT 1");
            $listarInfoPeloIdQuestionario->bindParam(":idQuestionario", $idQuestionario, PDO::PARAM_INT);
            $listarInfoPeloIdQuestionario->execute();

            $res = $listarInfoPeloIdQuestionario->fetchAll(PDO::FETCH_ASSOC);
            return $res;
            
         }
	}




?>