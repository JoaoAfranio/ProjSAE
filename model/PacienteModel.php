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
            $listarUltimo = $this->bd->prepare("SELECT * FROM `paciente` WHERE CodigoPaciente = :codigoPaciente");
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
	}




?>