<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class FormularioModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($descricao){

		 	$insercao = $this->bd->prepare("INSERT INTO formulario (Descricao) VALUES (:descricao)");
		 	$insercao->bindParam(":descricao", $descricao);
		 	$insercao->execute();

		 }

		 public function excluir($idFormulario){
		 	$excluir = $this->bd->prepare("DELETE from formulario where idFormulario = :idFormulario");
		 	$excluir->bindParam(":idFormulario", $idFormulario);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from formulario");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
         }
         
         public function listarID($idFormulario){
            
            $listarUm = $this->bd->prepare("SELECT * from formulario where idFormulario = :idFormulario");
            $listarUm->bindParam(":idFormulario", $idFormulario, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
         }


	}




?>