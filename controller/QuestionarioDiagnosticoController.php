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
        $idPaciente = $_POST["idPaciente"];
        $idQuestionario = $_POST["idQuestionario"];
        
        //[A FAZER] Utilizar Session para pegar IdUsuarios
        $idFuncionario = 21;
        $dataRealizado = date('Y-m-d');
        $evolucao = " ";

        $questionarioDiagPrescModel->inserir($dataRealizado, $evolucao, $idPaciente, $idFuncionario, $idQuestionario);
        
        $questionario = $questionarioDiagPrescModel->listarUltimo($idPaciente);
        $idQuestionario = $questionario["max(IdQuestionarioDiagPresc)"];

        foreach($_POST["diagnosticos"] as $diagnostico){
            $pacienteDiagnosticoModel->inserir($diagnostico , $idQuestionario);
        }


        echo "<script>location.href='../rotina/RotinaPrescricao.php?idQuestionario=". $idQuestionario ."&idPaciente=". $idPaciente ."';</script>";
	}


    if($acao == "cadastrarPrescricao"){
        $idQuestionarioDiagPresc = $_POST["idQuestionario"];
        $idPaciente = $_POST["idPaciente"];

        
       if(isset($_POST["diagnosticos"])) {
            
            $diagnosticos  = ($_POST["diagnosticos"]);
            $idDiagnosticos = explode(";", $diagnosticos);
            

            if(count($idDiagnosticos) == 2){
                $idDiagnosticos =  array_filter($idDiagnosticos, function($value) {
                    return !empty($value);
                  });

                foreach($idDiagnosticos as $idDiag){
                    $idDiagnostico = trim($idDiag); 
                    foreach($_POST["diagnostico" . $idDiagnostico] as $idPrescricao){
                        $pacientePrescricaoModel->inserir($idDiagnostico, $idPrescricao, $idQuestionarioDiagPresc);
                    }
                    break;
                }
            }else{
                foreach($idDiagnosticos as $diag){
                    $idDiagnostico = trim($diag); 
                    if($diag != ""){
                        foreach($_POST["diagnostico" . $idDiagnostico] as $idPrescricao){
                            $pacientePrescricaoModel->inserir($idDiagnostico, $idPrescricao, $idQuestionarioDiagPresc);
                        }
                    }  
                }
            }
        }
      echo "<script>location.href='../rotina/RotinaPrescricaoRot.php?idQuestionario=". $idQuestionarioDiagPresc ."&idPaciente=". $idPaciente ."';</script>";
    }

    if($acao == "cadastrarPrescricaoRot"){
        $idQuestionarioDiagPresc = $_POST["idQuestionario"];
        $idPaciente = $_POST["idPaciente"];

        if(isset($_POST["prescricoes"])) {
        $prescricoes  = ($_POST["prescricoes"]);
        $idPrescricoes = explode(";", $prescricoes);
        
        foreach($idPrescricoes as $presc){
            $idPrescricao = trim($presc); 

            if($presc != ""){
                $rotina = $_POST["prescricao" . $idPrescricao];
                $pacientePrescricaoModel->alterarRotina($idQuestionarioDiagPresc, $idPrescricao, $rotina);
            }  
        }

    }
        echo "<script>location.href='../rotina/RotinaResultado.php?idQuestionario=". $idQuestionarioDiagPresc ."&idPaciente=". $idPaciente ."';</script>";
    }

    if($acao == "cadastrarResultado"){
        
        $idQuestionarioDiagPresc = $_POST["idQuestionario"];
        $idPaciente = $_POST["idPaciente"];

        if(isset($_POST["diagnosticos"])) {
            $diagnosticos  = ($_POST["diagnosticos"]);
            $idDiagnosticos = explode(";", $diagnosticos);
            
            foreach($idDiagnosticos as $diag){
                $idDiagnostico = trim($diag); 
                if($diag != ""){
                    foreach($_POST["diagnostico" . $idDiagnostico] as $idResultado){
                        $pacienteResultadoModel->inserir($idResultado, $idQuestionarioDiagPresc);
                    }
                }  
            }

        }
        echo "<script>location.href='../rotina/RotinaEvolucao.php?idQuestionario=". $idQuestionarioDiagPresc ."&idPaciente=". $idPaciente ."';</script>";
	}


    if($acao == "cadastrarEvolucao"){
        $idQuestionarioDiagPresc = $_POST["idQuestionario"];
        $idPaciente = $_POST["idPaciente"];
        if(isset($_POST["evolucao"])) {
            $evolucao 	= $_POST["evolucao"];
            $questionarioDiagPrescModel->alterarEvolucao($idQuestionarioDiagPresc, $evolucao);

        }
        echo "<script>location.href='../paciente/Paciente.php?cad=sucesso&idPaciente=" . $idPaciente ."';</script>";
	}

?>