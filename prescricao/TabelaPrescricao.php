<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/PrescricaoModel.php";

    $prescricao = new PrescricaoModel();

    $resPrescricao = $prescricao->listarTodos();
?>

<div class="card">
    <div class="card-body">
        <h4>Prescrições cadastradas</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table display">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Prescrição</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ordem = 0;
                            foreach($resPrescricao as $prescricao){
                            $ordem++;
                    ?>        

                        <tr>    
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $prescricao['Descricao'];?></td>
                            <td>
                                <form class="forms-sample" method="post" action="../controller/PrescricaoController.php?acao=deletar">
                                    <input type="hidden" name="idPrescricao" value="<?php echo $prescricao['IdPrescricao']?>">
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