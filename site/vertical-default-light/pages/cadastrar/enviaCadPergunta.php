<?php 
	require '../util/config.php';
    require '../util/conecta.php';

    $acao = $_GET['acao'];

    if($acao == "cadastrarAfirmativa"){
	   	$afirmativa = $_POST['inputAfirmativa'];

	    $con = conecta();

	    $insert = "INSERT INTO afirmativa (descricao)  VALUES ('$afirmativa')";

	    $res = mysqli_query($con, $insert);
	    
		
		if($res == true){
			header('Location: ../forms/cadastrarPerguntas.php?cad=sucesso');	
		}else{
			header('Location: ../forms/cadastrarPerguntas.php?cad=erro');
		}

		

		mysqli_close($con);
    }
    if($acao == "cadastrarTipoPergunta"){
	    $tipoquestao = $_POST['inputTipoPergunta'];

	    $con = conecta();

	    $insert = "INSERT INTO tipoquestao (descricao)  VALUES ('$tipoquestao')";


    }
    if($acao == "cadastrarAfirmativaPergunta"){
	    $afirmativa = $_POST['idAfirmativa'];
	    $questao = $_POST['idQuestao'];

	    $con = conecta();

	    $insert = "INSERT INTO questaoafirmativa (IdAfirmativa,IdQuestao)  VALUES ('$afirmativa','$questao')";

		$res = mysqli_query($con, $insert);

		  
		if($res == true){
			header('Location: ../forms/cadastrarPerguntas.php?cad=sucesso');	
		}else{
			header('Location: ../forms/cadastrarPerguntas.php?cad=erro');
		}
		  
		mysqli_close($con);
    }
    if($acao == "cadastrarPergunta"){

	    $descricao = $_POST['descricao'];
	    $tipoRespostaQuestao = $_POST['tipoRespostaQuestao'];


	    $con = conecta();

	    $insert = "INSERT INTO questao (Descricao,IdTipoQuestao, PossuiOutro)  VALUES ('$descricao','$tipoRespostaQuestao','N')";
	    $res = mysqli_query($con, $insert);

	    $select = "SELECT * FROM questao WHERE Descricao = '$descricao'";
	    $resSelect = mysqli_query($con, $select);

	    while ($row = $resSelect->fetch_assoc()) {
	    	$id = $row['IdQuestao'];
		
		    if(($tipoRespostaQuestao == '1') || ($tipoRespostaQuestao == '4')){
		    	$insertQuestaoAberta = "INSERT INTO questaoaberta (IdQuestao) VALUES ('$id')";
		    	$resInsertQuestaoAberta = mysqli_query($con, $insertQuestaoAberta);
		    }
		    if(($tipoRespostaQuestao == '2') || ($tipoRespostaQuestao == '5')){
		    	$insertQuestaoFechadaUnica = "INSERT INTO questaofechadaescolhaunica (IdQuestao) VALUES ('$id')";
		    	$resInsertQuestaoFechadaUnica = mysqli_query($con, $insertQuestaoFechadaUnica);
		    }
		    if($tipoRespostaQuestao == '3'){
		    	$insertQuestaoFechadaMultipla = "INSERT INTO questaofechadamultiplaescolha (IdQuestao) VALUES ('$id')";
		    	$resInsertQuestaoFechadaMultipla = mysqli_query($con, $insertQuestaoFechadaMultipla);
		    }
		}
	    
	  
		if($res == true){
			header('Location: ../forms/cadastrarPerguntas.php?cad=sucesso');	
		}else{
			header('Location: ../forms/cadastrarPerguntas.php?cad=erro');
		}
		  
		mysqli_close($con);

    }



?>