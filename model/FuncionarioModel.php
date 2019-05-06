<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class funcionarioModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

		 }

		 public function inserir($nome, $login, $senha, $idtipofuncionario){

			$insercao = $this->bd->prepare("INSERT INTO funcionario (nome, login, senha, IdTipoFuncionario ) VALUES (:nome, :login, :senha, :idtipofuncionario)");
			$insercao->bindParam(":nome", $nome);
			$insercao->bindParam(":login", $login);
			$insercao->bindParam(":senha", $senha);
			$insercao->bindParam(":idtipofuncionario", $idtipofuncionario);
			$insercao->execute();

		 }

		 public function atualizar($nome,$login,$senha,$idtipofuncionario){
			$atualiza = $this->bd->prepare("UPDATE usuario set nome = :nome, login = :login, senha = :senha where idfuncionario = :idfuncionario and (select idtipofuncionario from tifuncionario) = :idtipofuncionario");
			$atualiza->bindParam(":nome", $nome);
			$atualiza->bindParam(":login", $login);
			$atualiza->bindParam(":senha", $senha);
			$atualiza->bindParam(":idtipofuncionario", $idtipofuncionario);
			$atualiza->execute();
		}
         

		 public function excluir($idfuncionario){
		 	$excluir = $this->bd->prepare("DELETE from funcionario where idfuncionario = :idfuncionario");
		 	$excluir->bindParam(":idfuncionario", $idfuncionario);
		 	$excluir->execute();
		 }

		 public function listarTodos(){
		 	$listar = $this->bd->query("SELECT * from funcionario");
		 	$res = $listar->fetchAll(PDO::FETCH_ASSOC);
		 	return $res;
		 }

         public function listarID($idfuncionario){
            
            $listarUm = $this->bd->prepare("SELECT * from funcionario where idfuncionario = :idfuncionario");
            $listarUm->bindParam(":idfuncionario", $idfuncionario, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
		 }
		 
		 public function listarLogin($idfuncionario){
            
            $listarUm = $this->bd->prepare("SELECT login from funcionario where login = :login");
            $listarUm->bindParam(":idfuncionario", $idfuncionario, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
		 }
		 
		 public function listarSenha($idfuncionario){
            
            $listarUm = $this->bd->prepare("SELECT senha from funcionario where idfuncionario = :idfuncionario");
            $listarUm->bindParam(":idfuncionario", $idfuncionario, PDO::PARAM_INT);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
		 }

		 public function verificaSenhaAdministrador($senha){
            
            $listarUm = $this->bd->prepare("SELECT IdFuncionario from funcionario where senha = :senha");
            $listarUm->bindParam(":senha", $senha);
            $listarUm->execute();

            $res = $listarUm->fetch(PDO::FETCH_ASSOC);
            return $res;
		 }



		 public function autenticacao($login,$senha){

			$logar = $this->bd->prepare("SELECT * FROM funcionario where login = :login and senha = :senha");
			$logar->bindParam(":login", $login);
			$logar->bindParam(":senha", $senha);
			
			$logar->execute();
			$res = $logar->fetch();

			return $res;

	}




	}

?>