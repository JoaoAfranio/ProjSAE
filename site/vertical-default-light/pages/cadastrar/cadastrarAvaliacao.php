<?php 
   require '../util/config.php';
   require '../util/conecta.php';

   $con = conecta();

   $acao = $_GET['acao'];

   if($acao == "cadAvaliacao"){
   		$nomeAvaliacao = $_POST['inputAvaliacao'];

   	$queryInsertAvaliacao = "INSERT INTO Avaliacao(Descricao) VALUES ('$nomeAvaliacao')";
	$resInsert = mysqli_query($con, $queryInsertAvaliacao);
   }

   if($acao == "questaoAvaliacao"){
   		$questao = $_POST['questao'];
   		$idAvaliacao = $_POST['idAvaliacao'];
   		for ($i=0;$i<count($questao);$i++)
   		{
   		   $queryInsertAvaliacaoQuestao = "INSERT INTO AvaliacaoQuestao(IdQuestao,IdAvaliacao) VALUES ('$questao[$i]', '$idAvaliacao')";
		   $resInsert = mysqli_query($con, $queryInsertAvaliacaoQuestao);
   		}
   }

   if($resInsert == true){
   header("Location: ../forms/montarAvaliacao.php?cad=sucesso");	
   }else{
   	header("Location: ../forms/montarAvaliacao.php?cad=erro");
   }
?>