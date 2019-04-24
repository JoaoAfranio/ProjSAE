<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaModel.php";

    $afirmativa = new AfirmativaModel();

    $resAfirmativa = $afirmativa->listarTodos();
?>

<div class="card">
    <div class="card-body">
        <h4>Afirmativas cadastradas</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table display">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Afirmativa</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ordem = 0;
                            foreach($resAfirmativa as $afirmativa){
                            $ordem++;
                    ?>        

                        <tr>    
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $afirmativa['Descricao'];?></td>
                            <td>
                                <form class="forms-sample" method="post" action="../controller/AfirmativaController.php?acao=deletar">
                                    <input type="hidden" name="idAfirmativa" value="<?php echo $afirmativa['IdAfirmativa']?>">
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