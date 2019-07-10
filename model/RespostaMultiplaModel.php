<?php
	//Obtem o diretório geral do projeto
	require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/config/BD.php";


	class RespostaMultiplaModel{

		private $bd;

		 function __construct(){

		 	$this->bd = BancoDados::obterConexao();

         }

         
         public function inserir($idResposta){
            $insercao = $this->bd->prepare("INSERT INTO respostamultipla(IdResposta) VALUES (:idResposta)");
            $insercao->bindParam(":idResposta", $idResposta);
            $insercao->execute();

         }

         public function inserirRespostasMultipla($idResposta, $idAfirmativa, $idQuestao){
            $insercaoRespostaMultipla = $this->bd->prepare("INSERT INTO respostamultiplaafirmativa (IdResposta, IdAfirmativa, IdQuestao) VALUES (:idResposta, :idAfirmativa, :idQuestao)"); 
            $insercaoRespostaMultipla->bindParam(":idAfirmativa", $idAfirmativa);
            $insercaoRespostaMultipla->bindParam(":idQuestao", $idQuestao);
            $insercaoRespostaMultipla->bindParam(":idResposta", $idResposta);
            $insercaoRespostaMultipla->execute();
         }
         
		   public function listarTodasQuestoesMultiplas($idQuestionario){
            
            $listarTodasQuestoesMultiplas = $this->bd->prepare("SELECT res.IdAvaliacao, questao.IdQuestao, questao.Descricao, afirmativa.Descricao as descricaoAfirmativa
                                            FROM resposta as res INNER JOIN questionario as quest on res.IdQuestionario = quest.IdQuestionario
                                            INNER JOIN respostamultipla as rM on rM.IdResposta = res.IdResposta
                                            INNER JOIN respostamultiplaafirmativa as rMAfirmativa on rMAfirmativa.IdResposta = rM.IdResposta
                                            INNER JOIN questao  on questao.IdQuestao = rMAfirmativa.IdQuestao 
                                            INNER JOIN afirmativa on afirmativa.IdAfirmativa = rMAfirmativa.IdAfirmativa
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
                                                            INNER JOIN questao  on questao.IdQuestao = rMAfirmativa.IdQuestao 
                                                            INNER JOIN afirmativa on afirmativa.IdAfirmativa = rMAfirmativa.IdAfirmativa
                                                            WHERE quest.IdQuestionario = :idQuestionario GROUP BY questao.IdQuestao");
            $listarTodasSelectQuestoesMultipla->bindParam(":idQuestionario", $idQuestionario, PDO::PARAM_INT);
            $listarTodasSelectQuestoesMultipla->execute();

            $res = $listarTodasSelectQuestoesMultipla->fetchAll(PDO::FETCH_ASSOC);
            return $res;
         }
	}




?>