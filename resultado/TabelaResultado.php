<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/DiagnosticoModel.php";
    

    $resultado = new ResultadoModel();
    $diagnostico = new DiagnosticoModel();
    $resDiagnostico = $diagnostico->listarTodos();

?>

<div class="card">
    <div class="card-body">
        <h4>Resultados cadastradas</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Diagnóstico</th>
                        <th>Resultado</th>
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

                                    <?php $resResultado = $resultado->listarResultadosPorDiagnostico($diag['IdDiagnostico']);
                                            foreach($resResultado as $result){
                                                //$resDiagnosticoDescricao = $diagnostico->listarID($diag['IdDiagnostico']);
                                                
                                    ?>  
                                    <form method="post" action="../controller/ResultadoController.php?acao=deletarDiagnostico">
                                        <input type="hidden" name="idResultado" value="<?php echo $result['IdResultado'];?>">
                                        <input type="hidden" name="idDiagnostico" value="<?php echo $result['IdDiagnostico'];?>">

                                        <div class="row">
                                            <div class="col-12">
                                                
                                              <p> <?php echo $result['Descricao'];?> </li>  <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-delete"></i></button> </p>
                                               
                                            </div>
                                        </div>  
                                        </form>
                                    <?php } ?>      
                                                

                            </td>
                        </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
