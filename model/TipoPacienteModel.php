<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class TipoPacienteModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from tipopaciente");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
		 }


	}




?>