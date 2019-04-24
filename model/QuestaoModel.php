<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class QuestaoModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($descricao,$tipoRespostaQuestao){

		 	$insercao = $this->bd->prepare("INSERT INTO questao (Descricao, IdTipoQuestao, PossuiOutro) VALUES (:descricao, :tipoRespostaQuestao, 'N')");
		 	$insercao->bindParam(":descricao", $descricao);
		 	$insercao->bindParam(":tipoRespostaQuestao", $tipoRespostaQuestao);
		 	$insercao->execute();

		 }

		 public function excluir($idQuestao){
		 	$excluir = $this->bd->prepare("DELETE from questao where idQuestao = :idQuestao");
		 	$excluir->bindParam(":idQuestao", $idQuestao);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from questao");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
		 }

		public function listarAfirmativas($idQuestao){
			$listarAfirmativas = $this->bd->query("SELECT * from questaoafirmativa WHERE idQuestao = " . $idQuestao);
			$listarAfirmativas->bindParam(":idQuestao", $idQuestao);

			$res = $listarAfirmativas->fetchAll(PDO::FETCH_ASSOC);
			return $res;
		}

	}




?>