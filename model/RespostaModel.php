<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class RespostaModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($idAplicacao,$idAvaliacao,$idQuestao,$idQuestionario){

		 	$insercao = $this->bd->prepare("INSERT INTO resposta (IdAplicacao, IdAvaliacao, IdQuestao, IdQuestionario) VALUES (:idAplicacao, :idAvaliacao, :idQuestao, :idQuestionario)");
             $insercao->bindParam(":idAplicacao", $idAplicacao);
             $insercao->bindParam(":idAvaliacao", $idAvaliacao);
             $insercao->bindParam(":idQuestao", $idQuestao);
             $insercao->bindParam(":idQuestionario", $idQuestionario);
		 	$insercao->execute();

		 }

		 public function excluir($idResposta){
		 	$excluir = $this->bd->prepare("DELETE from resposta where idResposta = :idResposta");
		 	$excluir->bindParam(":idResposta", $idResposta);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from resposta");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarID($idResposta){
            
            $listarUm = $this->bd->prepare("SELECT * from resposta where idResposta = :idResposta");
            $listarUm->bindParam(":idResposta", $idResposta, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
         }

         public function listarResposta($idAplicacao,$idAvaliacao,$idQuestao,$idQuestionario){
            $listarResposta = $this->bd->prepare("SELECT * FROM Resposta WHERE IdAplicacao = '$idAplicacao' 
            AND IdAvaliacao = '$idAvaliacao' AND IdQuestao = '$idQuestao' AND IdQuestionario = '$idQuestionario'");

            $listarResposta->execute();

            $res = $listarResposta->fetch(PDO::FETCH_ASSOC);
            return $res;
         }

	}




?>