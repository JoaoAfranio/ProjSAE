<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class PrescricaoDiagnosticoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($idDiagnostico, $idPrescricao){

		 	$insercao = $this->bd->prepare("INSERT INTO diagnosticoprescricao (IdDiagnostico, IdPrescricao) VALUES (:idDiagnostico, :idPrescricao)");
            $insercao->bindParam(":idDiagnostico", $idDiagnostico);
            $insercao->bindParam(":idPrescricao", $idPrescricao);
		 	$insercao->execute();

		 }

		 public function excluir($idDiagnostico, $idPrescricao){
		 	$excluir = $this->bd->prepare("DELETE from diagnosticoprescricao where idPrescricao = :idPrescricao AND idDiagnostico = :idDiagnostico");
            $excluir->bindParam(":idDiagnostico", $idDiagnostico); 
            $excluir->bindParam(":idPrescricao", $idPrescricao);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from diagnosticoprescricao");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
		 }


	}




?>