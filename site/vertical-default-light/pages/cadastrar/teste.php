<?php
    require '../util/config.php';
    require '../util/conecta.php';
    
    $con = conecta();


    $queryQuestionario ="INSERT INTO Questionario(IdFormulario, IdPaciente, DataRealizado, IdUsuario) 
    VALUES ('1', '3', '2018-11-30', '1')";
    $resQuestionario = mysqli_query($con, $queryQuestionario);
?>