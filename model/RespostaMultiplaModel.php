<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class RespostaMultiplaModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

         }
         
		 public function listarTodasQuestoesMultiplas($idQuestionario){
            
            $listarTodasQuestoesMultiplas = $this->bd->prepare("SELECT res.IdAvaliacao, questao.IdQuestao, questao.Descricao, afirmativa.Descricao as descricaoAfirmativa
                                            FROM resposta as res INNER JOIN questionario as quest on res.IdQuestionario = quest.IdQuestionario
                                            INNER JOIN respostamultipla as rM on rM.IdResposta = res.IdResposta
                                            INNER JOIN respostamultiplaafirmativa as rMAfirmativa on rMAfirmativa.IdResposta = rM.IdResposta
                                            INNER JOIN Questao  on questao.IdQuestao = rMAfirmativa.IdQuestao 
                                            INNER JOIN Afirmativa on afirmativa.IdAfirmativa = rMAfirmativa.IdAfirmativa
                                            WHERE quest.IdQuestionario = :idQuestionario");
            $listarTodasQuestoesMultiplas->bindParam(":idQuestionario", $idQuestionario, PDO::PARAM_INT);
            $listarTodasQuestoesMultiplas->execute();

            $res = $listarTodasQuestoesMultiplas->fetchAll(PDO::FETCH_ASSOC);
            return $res;
         }


         public function listarTodasSelectQuestoesMultipla($idQuestionario){
            
            $listarTodasSelectQuestoesMultipla = $this->bd->prepare("SELECT res.IdAvaliacao, questao.IdQuestao, questao.Descricao
                                                            FROM resposta as res INNER JOIN questionario as quest on res.IdQuestionario = quest.IdQuestionario
                                                            INNER JOIN respostamultipla as rM on rM.IdResposta = res.IdResposta
                                                            INNER JOIN respostamultiplaafirmativa as rMAfirmativa on rMAfirmativa.IdResposta = rM.IdResposta
                                                            INNER JOIN Questao  on questao.IdQuestao = rMAfirmativa.IdQuestao 
                                                            INNER JOIN Afirmativa on afirmativa.IdAfirmativa = rMAfirmativa.IdAfirmativa
                                                            WHERE quest.IdQuestionario = :idQuestionario GROUP BY questao.IdQuestao");
            $listarTodasSelectQuestoesMultipla->bindParam(":idQuestionario", $idQuestionario, PDO::PARAM_INT);
            $listarTodasSelectQuestoesMultipla->execute();

            $res = $listarTodasSelectQuestoesMultipla->fetchAll(PDO::FETCH_ASSOC);
            return $res;
         }
	}




?>