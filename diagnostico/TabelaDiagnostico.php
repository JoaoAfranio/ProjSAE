<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/PrescricaoModel.php";
    

    $diagnostico = new DiagnosticoModel();
    $prescricao = new PrescricaoModel();
    $resDiagnostico = $diagnostico->listarTodos();
?>

<div class="card">
    <div class="card-body">
        <h4>Diagnósticos cadastrados</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Diagnóstico</th>
                        <th>Prescrições</th>
                        <th>Unidade de Internação</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ordem = 0;
                            foreach($resDiagnostico as $diag){
                            $ordem++;
                    ?>        

                        <tr>    
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $diag['Descricao'];?></td>
                            <td>

                                    <?php $resPrescricao = $diagnostico->listarPrescricoes($diag['IdDiagnostico']);
                                            foreach($resPrescricao as $presc){
                                                $resPrescricaoDescricao = $prescricao->listarID($presc['IdPrescricao']);
                                                
                                    ?>  
                                    <form method="post" action="../controller/PrescricaoDiagnosticoController.php?acao=deletar">
                                        <input type="hidden" name="idDiagnostico" value="<?php echo $presc['IdDiagnostico'];?>">
                                        <input type="hidden" name="idPrescricao" value="<?php echo $presc['IdPrescricao'];?>">

                                        <div class="row">
                                            <div class="col-12">
                                                
                                              <p> <?php echo $resPrescricaoDescricao['Descricao'];?> </li>  <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-delete"></i></button> </p>
                                               
                                            </div>
                                        </div>  
                                        </form>
                                    <?php } ?>      
                                                

                            </td>
                            <td>
                                <?php $resUnidade = $diagnostico->listarUnidade($diag['IdUnidadeInternacao']);
                                echo $resUnidade['NomeUnidade'];?>
                            </td>
                            <td>
                                <form class="forms-sample" method="post" action="../controller/DiagnosticoController.php?acao=deletar">
                                    <input type="hidden" name="idDiagnostico" value="<?php echo $diag['IdDiagnostico']?>">
                                    <button type="submit" class="btn btn-primary mr-2">Deletar</button>
                                </form>
                            </td>
                        </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
