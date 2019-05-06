<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/FuncionarioModel.php";

    $funcionario = new FuncionarioModel();

    $resFuncionario = $funcionario->listarTodos();
?>

<div class="card">
    <div class="card-body">
        <h4>Funcionario cadastradas</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table display">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Funcionario</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ordem = 0;
                            foreach($resFuncionario as $funcionario){
                            $ordem++;
                    ?>        

                        <tr>    
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $funcionario['nome'];?></td>
                            <td>
                                <form class="forms-sample" method="post" action="../controller/FuncionarioController.php?acao=deletar">
                                    <input type="hidden" name="IdFuncionario" value="<?php echo $funcionario['IdFuncionario']?>">
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