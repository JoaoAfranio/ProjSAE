<?php   $resPrescricao = $diagnostico->listarPrescricoes($diag['IdDiagnostico']);
        foreach($resPrescricao as $presc){
            $resPrescricaoDescricao = $prescricao->listarID($presc['IdPrescricao']);
            
?>  
<form method="post" action="../controller/PrescricaoDiagnosticoController.php?acao=deletar">
    <input type="hidden" name="idDiagnostico" value="<?php echo $presc['IdDiagnostico'];?>">
    <input type="hidden" name="idPrescricao" value="<?php echo $presc['IdPrescricao'];?>">

    <div class="row">
        <div class="col-12">
            
          <p><?php echo $resPrescricaoDescricao['Descricao'];?> <button style="padding: 0.3rem 1.0rem;" type="submit" class="float-right btn btn-primary mr-2"><i class="mdi mdi-delete"></i></button></p>
           <hr>
        </div>
    </div>  
    </form>
    
<?php } ?>      
