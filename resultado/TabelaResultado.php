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
                        </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
