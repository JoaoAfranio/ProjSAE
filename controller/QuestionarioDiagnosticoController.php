<?php
	
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/QuestionarioDiagPrescModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacienteDiagnosticoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacientePrescricaoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"]	. "/sae/model/PacienteResultadoModel.php";

    $questionarioDiagPrescModel = new QuestionarioDiagPrescModel();
    $pacienteDiagnosticoModel = new PacienteDiagnosticoModel();
    $pacientePrescricaoModel = new PacientePrescricaoModel();
    $pacienteResultadoModel = new PacienteResultadoModel();

    


    $acao = $_GET["acao"];


	if($acao == "cadastrarDiagnostico"){

        //[A FAZER] Utilizar Session para pegar IdUsuarios
        $idFuncionario = 21;
        $dataRealizado = date('Y-m-d');
        $evolucao = " ";
        $idPaciente = $_POST["idPaciente"];

        $questionarioDiagPrescModel->inserir($dataRealizado, $evolucao, $idPaciente, $idFuncionario);
        
        $questionario = $questionarioDiagPrescModel->listarUltimo($idPaciente);
        $idQuestionario = $questionario["max(IdQuestionarioDiagPresc)"];

        foreach($_POST["diagnosticos"] as $diagnostico){
            $pacienteDiagnosticoModel->inserir($diagnostico , $idQuestionario);
         }

		 echo "<script>location.href='../rotina/RotinaPrescricao.php?idQuestionario=". $idQuestionario ."&idPaciente=". $idPaciente ."';</script>";
	}


    if($acao == "cadastrarPrescricao"){
        $diagnosticos  = ($_POST["diagnosticos"]);
        $idDiagnosticos = explode(";", $diagnosticos);
        $idQuestionarioDiagPresc = $_POST["idQuestionario"];
        $idPaciente = $_POST["idPaciente"];
        
        foreach($idDiagnosticos as $diag){
            $idDiagnostico = trim($diag); 
            if($diag != ""){
                foreach($_POST["diagnostico" . $idDiagnostico] as $idPrescricao){
                    $pacientePrescricaoModel->inserir($idDiagnostico, $idPrescricao, $idQuestionarioDiagPresc);
                }
            }  
        }

        echo "<script>location.href='../rotina/RotinaPrescricaoRot.php?idQuestionario=". $idQuestionarioDiagPresc ."&idPaciente=". $idPaciente ."';</script>";
    }

    if($acao == "cadastrarPrescricaoRot"){
        $prescricoes  = ($_POST["prescricoes"]);
        $idPrescricoes = explode(";", $prescricoes);
        
        $idQuestionarioDiagPresc = $_POST["idQuestionario"];
        $idPaciente = $_POST["idPaciente"];

        foreach($idPrescricoes as $presc){
            $idPrescricao = trim($presc); 

            if($presc != ""){
                $rotina = $_POST["prescricao" . $idPrescricao];
                $pacientePrescricaoModel->alterarRotina($idQuestionarioDiagPresc, $idPrescricao, $rotina);
            }  
        }

        echo "<script>location.href='../rotina/RotinaResultado.php?idQuestionario=". $idQuestionarioDiagPresc ."&idPaciente=". $idPaciente ."';</script>";
    }

    if($acao == "cadastrarResultado"){
        $diagnosticos  = ($_POST["diagnosticos"]);
        $idDiagnosticos = explode(";", $diagnosticos);

        $idQuestionarioDiagPresc = $_POST["idQuestionario"];
        $idPaciente = $_POST["idPaciente"];
        
        foreach($idDiagnosticos as $diag){
            $idDiagnostico = trim($diag); 
            if($diag != ""){
                foreach($_POST["diagnostico" . $idDiagnostico] as $idResultado){
                    $pacienteResultadoModel->inserir($idResultado, $idQuestionarioDiagPresc);
                }
            }  
        }

        echo "<script>location.href='../rotina/RotinaEvolucao.php?idQuestionario=". $idQuestionarioDiagPresc ."&idPaciente=". $idPaciente ."';</script>";
	}


    if($acao == "cadastrarEvolucao"){
		$evolucao 	= $_POST["evolucao"];
        $idQuestionarioDiagPresc = $_POST["idQuestionario"];
        $idPaciente = $_POST["idPaciente"];

        $questionarioDiagPrescModel->alterarEvolucao($idQuestionarioDiagPresc, $evolucao);

        echo "<script>location.href='../paciente/Paciente.php?cad=sucesso&idPaciente=" . $idPaciente ."';</script>";
	}

?>