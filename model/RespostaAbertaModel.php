<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class RespostaAbertaModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($descricaoRespostaAberta, $idResposta){

		 	$insercao = $this->bd->prepare("INSERT INTO respostaaberta (DescricaoRespostaAberta, IdResposta) VALUES (:descricaoRespostaAberta, :idResposta)");
             $insercao->bindParam(":descricaoRespostaAberta", $descricaoRespostaAberta);
             $insercao->bindParam(":idResposta", $idResposta);
		 	$insercao->execute();

		 }

		 public function excluir($idRespostaAberta){
		 	$excluir = $this->bd->prepare("DELETE from respostaaberta where idRespostaAberta = :idRespostaAberta");
		 	$excluir->bindParam(":idRespostaAberta", $idRespostaAberta);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from respostaaberta");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarID($idRespostaAberta){
            
            $listarUm = $this->bd->prepare("SELECT * from respostaaberta where idRespostaAberta = :idRespostaAberta");
            $listarUm->bindParam(":idRespostaAberta", $idRespostaAberta, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
         }


	}




?>