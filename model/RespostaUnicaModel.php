<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class RespostaUnicaModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($idResposta, $idAfirmativa, $idQuestao){

		 	$insercao = $this->bd->prepare("INSERT INTO respostaUnica (IdResposta, IdAfirmativa, IdQuestao) VALUES (:idResposta, :idAfirmativa, :idQuestao)");
             $insercao->bindParam(":idResposta", $idResposta);
             $insercao->bindParam(":idAfirmativa", $idAfirmativa);
             $insercao->bindParam(":idQuestao", $idQuestao);
		 	$insercao->execute();

		 }

		 public function excluir($idRespostaUnica){
		 	$excluir = $this->bd->prepare("DELETE from respostaUnica where idRespostaUnica = :idRespostaUnica");
		 	$excluir->bindParam(":idRespostaUnica", $idRespostaUnica);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from respostaUnica");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarID($idRespostaUnica){
            
            $listarUm = $this->bd->prepare("SELECT * from respostaUnica where idRespostaUnica = :idRespostaUnica");
            $listarUm->bindParam(":idRespostaUnica", $idRespostaUnica, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
         }


	}




?>