<?php

require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacienteModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/QuestionarioModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/RespostaModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/RespostaAbertaModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/RespostaUnicaModel.php";
require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/RespostaMultiplaModel.php";

$respostaModel = new RespostaModel();
$respostaMultiplaModel = new RespostaMultiplaModel();
$questionarioModel = new QuestionarioModel();
$respostaAbertaModel = new RespostaAbertaModel();
$respostaUnicaModel = new RespostaUnicaModel();
$questionarioModel = new QuestionarioModel();
$pacienteModel = new PacienteModel();

$acao = $_GET["acao"];

if($acao == "cadastrardados"){

     
    $idTipoPaciente = $_GET['idTipoPaciente'];
    $idPaciente = $_GET['idPaciente'];
 
    //[A FAZER] Utilizar Session para pegar IdUsuarios
    $idFuncionario = 21;
 
    if($idTipoPaciente == 3){
       $idFormulario = 10;
    }else if($idTipoPaciente == 2){
       $idFormulario = 11;
    }else if($idTipoPaciente == 1){
       $idFormulario = 12;
    }else{
       exit();
    }
 
    $dataHoje = date('Y-m-d');
 
 
 
    $questionarioModel->inserir($idFormulario, $idPaciente, $dataHoje, $idFuncionario); // Crio Questionario
 
    $resSelectQuestionario = $questionarioModel->listarUltimoQuestPaciente($idPaciente); // Seleciono Questionario Criado
 
    $idQuestionario = $resSelectQuestionario['IdQuestionario'];

    foreach($_POST as $nomeQuestao => $respostaQuestao)
    {
        
        
        /* Aqui se declara variável dinamicamente; pode ser um array de variáveis com conteúdo do array post onde cada posição contém o nome do campo do formulário e o valor será o valor do campo do formulário, ou criar várias variáveis isoladas como abaixo. */
        $temp = $nomeQuestao.";".$respostaQuestao;
        


        $pieces = explode(";", $temp);
        $res = explode("\"", $temp);
    
        // echo "Temp:" . $temp;
        // echo var_dump($res);
    
        $idAplicacao = $pieces[0];
        $idAvaliacao = $pieces[1];
        $idQuestao = $pieces[2];
        $idTipoQuestao = $pieces[3];
        
        //Crio Resposta
        $respostaModel->inserir($idAplicacao,$idAvaliacao,$idQuestao,$idQuestionario);

        //Seleciono a ultima resposta com os valores de $idAplicacao,$idAvaliacao,$idQuestao
        $resposta = $respostaModel->listarResposta($idAplicacao,$idAvaliacao,$idQuestao,$idQuestionario);
        $idResposta = $resposta['IdResposta'];

        if($idTipoQuestao == 3){
            // Questao Fechada Multipla Escolha
            $respostaMultiplaModel->inserir($idResposta);
            foreach($respostaQuestao as $idAfirmativa){
                $respostaMultiplaModel->inserirRespostasMultipla($idResposta, $idAfirmativa, $idQuestao);
            }
        }

        // Caso a resposta seja somente unica(aberta, afirmativa unica)
        $respostaQuestao = $pieces[4];
    
        if(($idTipoQuestao == 1) || ($idTipoQuestao == 4)){
        //Questao Aberta
            if($respostaQuestao != ""){
                $respostaAbertaModel->inserir($respostaQuestao, $idResposta);
            }
        }
    
        if(($idTipoQuestao == 2) || ($idTipoQuestao == 5)){
        // Questao Fechada Escolha Unica
        $respostaUnicaModel->inserir($idResposta, $respostaQuestao, $idQuestao);

        }
    
    
    } // Fim Foreach POST
     
    
 echo "<script>location.href='../rotina/RotinaDiagnostico.php?idPaciente=" . $idPaciente . "&idQuestionario=". $idQuestionario ."';</script>";
}

?>