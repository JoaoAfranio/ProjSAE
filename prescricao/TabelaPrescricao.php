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
                        <th>Editar</th>
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

                            <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $prescricao['IdPrescricao'];?>">
                                Editar
                            </button>

                            <!-- Modal Editar -->
                            <form class="forms-sample" method="post" action="../controller/PrescricaoController.php?acao=editar">
                            <input type="hidden" name="idPrescricao" value="<?php echo $prescricao['IdPrescricao'];?>"> 
                                <div class="modal fade" id="modal<?php echo $prescricao['IdPrescricao'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Questão: <span class="text-muted"><?php echo $prescricao['Descricao'];?></span></h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" class="form-control" name="descricao"> 
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Modal Editar -->
                            </td>
                        </tr>
                    
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>