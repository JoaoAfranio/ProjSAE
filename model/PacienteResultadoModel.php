<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class PacienteResultadoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($idResultado, $idQuestionarioDiagPresc){

		 	$insercao = $this->bd->prepare("INSERT INTO pacienteresultado (IdResultado, IdQuestionarioDiagPresc) VALUES (:idResultado, :idQuestionarioDiagPresc)");
            $insercao->bindParam(":idResultado", $idResultado);
            $insercao->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
		 	$insercao->execute();

		 }

		 public function excluir($idResultado, $idQuestionarioDiagPresc){
		 	$excluir = $this->bd->prepare("DELETE from pacienteresultado where IdResultado = :idResultado AND IdQuestionarioDiagPresc = :idQuestionarioDiagPresc");
            $excluir->bindParam(":idResultado", $idResultado);
            $excluir->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from pacienteresultado");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarTodasPorQuest($idQuestionarioDiagPresc){
            
            $listarTodasPorQuest = $this->bd->prepare("SELECT * from pacienteresultado where IdQuestionarioDiagPresc = :idQuestionarioDiagPresc");
            $listarTodasPorQuest->bindParam(":idQuestionarioDiagPresc", $idQuestionarioDiagPresc);
            $listarTodasPorQuest->execute();

            $res = $listarTodasPorQuest->fetchAll(PDO::FETCH_ASSOC);
            return $res;
         }


	}




?>