<?php
   //[A FAZER] Utilizar Session para pegar IdUsuario

   require '../util/config.php';
   require '../util/conecta.php';

   $con = conecta();

   if ($con->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }

   $idTipoPaciente = $_GET['idTipoPaciente'];
   $idPaciente = $_GET['idPaciente'];

   if($idTipoPaciente == 3){
      $idFormulario = 1;
   }else if($idTipoPaciente == 2){
      $idFormulario = 2;
   }else if($idTipoPaciente == 1){
      $idFormulario = 3;
   }else{
      exit();
   }

   $dataHoje = date('Y-m-d');

   echo $idFormulario . "<br>" . $idPaciente . "<br>" . $dataHoje;


$queryQuestionario ="INSERT INTO Questionario(IdFormulario, IdPaciente, DataRealizado, IdUsuario) 
VALUES ('$idFormulario', '$idPaciente', '$dataHoje', '1')"; // Crio um novo questionario com o id do paciente na data de hoje
$resQuestionario = mysqli_query($con, $queryQuestionario); // Executo query
echo "<br>Resposta Questionario: " . $resQuestionario;

printf("<br><br><br>error: %s\n", mysqli_error($con) . "<br>");


$selectQuestionario = "SELECT max(IdQuestionario) as IdQuestionario FROM questionario
                           WHERE DataRealizado = (select max(DataRealizado) from questionario
                                                  WHERE IdPaciente = '$idPaciente'  LIMIT 1) LIMIT 1"; 
                                                  // Seleciono o ultimo questionario com id do paciente
$resSelectQuestionario = mysqli_query($con, $selectQuestionario); // executo query

foreach($resSelectQuestionario as $ultimoQuestionario){
   $idQuestionario = $ultimoQuestionario['IdQuestionario'];
   echo "<br>ID QUESTIONARIO: " . $idQuestionario;
}

foreach($_POST as $nomeQuestao => $respostaQuestao)
{
   /* Aqui se declara variável dinamicamente; pode ser um array de variáveis com conteúdo do array post onde cada posição contém o nome do campo do formulário e o valor será o valor do campo do formulário, ou criar várias variáveis isoladas como abaixo. */
   $temp = $nomeQuestao.";".$respostaQuestao;
   
   $pieces = explode(";", $temp);
   $res = explode("\"", $temp);


   $idAplicacao = $pieces[0];
   $idAvaliacao = $pieces[1];
   $idQuestao = $pieces[2];
   $idTipoQuestao = $pieces[3];
   $respostaQuestao = $pieces[4];

   if($idTipoQuestao == 3){
      echo $temp ."<br>";
   }

   echo "idAplicacao: " . $idAplicacao . "<br>"; // piece1
   echo "idAvaliacao: " . $idAvaliacao . "<br>"; // piece2
   echo "idQuestao: " . $idQuestao . "<br>"; // piece2
   echo "idTipoQuestao: " . $idTipoQuestao . "<br>"; // piece2
   echo "Resposta: " . $respostaQuestao . "<br>";


      $queryInsertResposta = "INSERT INTO Resposta(IdAplicacao,IdAvaliacao,IdQuestao,IdQuestionario)
      VALUES ('$idAplicacao','$idAvaliacao','$idQuestao','$idQuestionario')";
      $resInsertResposta = mysqli_query($con, $queryInsertResposta);
      
      $selectResposta = "SELECT * FROM Resposta WHERE IdAplicacao = '$idAplicacao' 
      AND IdAvaliacao = '$idAvaliacao' AND IdQuestao = '$idQuestao' AND IdQuestionario = '$idQuestionario'"; 
      // Seleciono a ultima resposta com os valores de $idAplicacao,$idAvaliacao,$idQuestao
      $resSelectResposta = mysqli_query($con, $selectResposta); // executo query

      foreach($resSelectResposta as $resposta){
         $idResposta = $resposta['IdResposta'];

        $queryTipoQuestao = "SELECT * FROM Questao INNER JOIN TipoQuestao WHERE IdQuestao = '$idQuestao'";
        $resTipoQuestao =  mysqli_query($con, $queryTipoQuestao);

        foreach($resTipoQuestao as $questao){
            $idTipoQuestao = $idTipoQuestao;
        } // Fim resTipoQuestao
         if(($idTipoQuestao == 1) || ($idTipoQuestao == 4)){
         //Questao Aberta
         if($respostaQuestao != ""){
            $queryInsertRespostaAberta = "INSERT INTO RespostaAberta(IdResposta, DescricaoRespostaAberta, IdQuestao)
                                        VALUES ('$idResposta', '$respostaQuestao', '$idQuestao')";
            $resInsertRespostaAberta = mysqli_query($con, $queryInsertRespostaAberta);
         }
         }
      
         if(($idTipoQuestao == 2) || ($idTipoQuestao == 5)){
         // Questao Fechada Escolha Unica
         $queryInsertRespostaUnica = "INSERT INTO RespostaUnica(IdResposta, IdAfirmativa, IdQuestao)
                                     VALUES ('$idResposta', '$respostaQuestao', '$idQuestao')";
         $resInsertRespostaUnica = mysqli_query($con, $queryInsertRespostaUnica);

         }
  /*    
         if($idTipoQuestao == 3){
         // Questao Fechada Multipla Escolha
         $queryInsertRespostaMultipla = "INSERT INTO RespostaMultipla(IdResposta) VALUES ('$idResposta')";
         $resInsertRespostaMultipla = mysqli_query($con, $queryInsertRespostaMultipla);

         $querySelectUltimaRespostaMultipla = "";
         $resSelectUltimaRespostaMultipla = mysqli_query($con, $querySelectUltimaRespostaMultipla);

            foreach($resSelectUltimaRespostaMultipla as $ultimaResMultipla){
               foreach($respostaAfirmativa as $resAfirmativa){ // desfazer o array de id de afirmativa
                  $queryMultiplaAfirmativa = "INSERT INTO RespostaMultiplaAfirmativa(IdResposta,IdAfirmativa,IdQuestao)
                                              VALUES ('$idResposta', '$resAfirmativa', '$idQuestao')";
                  $resSelectMultiplaAfirmativa = mysqli_query($con, $queryMultiplaAfirmativa);
               }
            }
         }
      
      
         if($idTipoQuestao == 5){
         //Questao afirmação/negação P.S: Acho que é questão afirmativa
         queryInsertRespostaAfirmacaoNegacao = "";
         resInsertRespostaAfirmacaoNegacao = "";
         }
      }
   
   
   
    */

    } // Fim resSelectResposta

} // Fim Foreach POST
    




header("Location: ../tables/pacienteFormulario.php?cad=sucesso&idQuestionario=" . $idQuestionario);
exit;
?>