<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/DiagnosticoModel.php";
    

    $resultado = new ResultadoModel();
    $diagnostico = new DiagnosticoModel();
    $resResultado = $resultado->listarTodos();
?>

<div class="card">
    <div class="card-body">
        <h4>Questões cadastradas</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Resultado</th>
                        <th>Diagnóstico</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ordem = 0;
                            foreach($resResultado as $result){
                            $ordem++;
                    ?>        

                        <tr>    
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $result['Descricao'];?></td>
                            <td>

                                    <?php $resDiagnostico = $resultado->listarDiagnosticos($result['IdResultado']);
                                            foreach($resDiagnostico as $diag){
                                                $resDiagnosticoDescricao = $diagnostico->listarID($diag['IdDiagnostico']);
                                                
                                    ?>  
                                    <form method="post" action="../controller/ResultadoController.php?acao=deletarDiagnostico">
                                        <input type="hidden" name="idResultado" value="<?php echo $diag['IdResultado'];?>">
                                        <input type="hidden" name="idDiagnostico" value="<?php echo $diag['IdDiagnostico'];?>">

                                        <div class="row">
                                            <div class="col-12">
                                                
                                              <p> <?php echo $resDiagnosticoDescricao['Descricao'];?> </li>  <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-delete"></i></button> </p>
                                               
                                            </div>
                                        </div>  
                                        </form>
                                    <?php } ?>      
                                                

                            </td>
                            <td>
                                <form class="forms-sample" method="post" action="../controller/ResultadoController.php?acao=deletar">
                                    <input type="hidden" name="idResultado" value="<?php echo $result['IdResultado']?>">
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
