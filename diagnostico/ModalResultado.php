<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/ResultadoModel.php";

    $resultado = new ResultadoModel();
?>


<?php $resResultado = $resultado->listarResultadosPorDiagnostico($diag['IdDiagnostico']);
    foreach($resResultado as $result){
        //$resDiagnosticoDescricao = $diagnostico->listarID($diag['IdDiagnostico']);    
?>  
    <form method="post" action="../controller/ResultadoController.php?acao=deletarDiagnostico">
        <input type="hidden" name="idResultado" value="<?php echo $result['IdResultado'];?>">
        <input type="hidden" name="idDiagnostico" value="<?php echo $result['IdDiagnostico'];?>">

        <div class="row">
            <div class="col-12">
                
                <p> <?php echo $result['Descricao'];?> </li>  
                
                <button style="padding: 0.3rem 1.0rem;" type="submit" class="float-right btn btn-primary mr-2"><i class="mdi mdi-delete"></i></button> 
            
                
            
            </p>
                <hr>
            </div>
        </div>  
    </form>
<?php } ?>    