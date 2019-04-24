<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class ResultadoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($descricao,$idDiagnostico){

		 	$insercao = $this->bd->prepare("INSERT INTO resultado (Descricao, IdDiagnostico) VALUES (:descricao, :idDiagnostico)");
		 	$insercao->bindParam(":descricao", $descricao);
		 	$insercao->bindParam(":idDiagnostico", $idDiagnostico);
		 	$insercao->execute();

		 }

		 public function excluir($idResultado){
		 	$excluir = $this->bd->prepare("DELETE from resultado where idResultado = :idResultado");
		 	$excluir->bindParam(":idResultado", $idResultado);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from resultado");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
		 }

		public function listarDiagnosticos($idResultado){
			$listarDiagnosticos = $this->bd->query("SELECT * from resultado WHERE idResultado = " . $idResultado);
			$listarDiagnosticos->bindParam(":idResultado", $idResultado);

			$res = $listarDiagnosticos->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}


        public function excluirDiagnostico($idResultado, $idDiagnostico){
            $excluir = $this->bd->prepare("DELETE from resultado where idResultado = :idResultado AND idDiagnostico = :idDiagnostico");
            $excluir->bindParam(":idResultado", $idResultado);
            $excluir->bindParam(":idDiagnostico", $idDiagnostico);
            $excluir->execute();
        }
	}




?>