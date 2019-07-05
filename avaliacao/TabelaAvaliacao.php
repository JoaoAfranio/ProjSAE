<?php   
    $avaliacaoQuestao = new AvaliacaoQuestaoModel();
    $questao = new QuestaoModel();

?>

<div class="card">
    <div class="card-body">
        <h4>Diagnósticos cadastrados</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Avaliação</th>
                        <th>Questões</th>
                        <th>Deletar</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $ordem = 0;
                        foreach($resAvaliacao as $aval){
                        $ordem++;
                    ?>        

                        <tr>    
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $aval['Descricao'];?></td>
                            <td>

                                    <?php 
                                            
                                            $resAvalQuestao = $avaliacaoQuestao->listarTodasQuestoes($aval['IdAvaliacao']);
                                            foreach($resAvalQuestao as $avalQuest){
                                                $resQuestaoDescricao = $questao->listarID($avalQuest['IdQuestao']);
                                                
                                    ?>  
                                    <form method="post" action="../controller/AvaliacaoQuestaoController.php?acao=deletar">
                                        <input type="hidden" name="idAvaliacao" value="<?php echo $avalQuest['IdAvaliacao'];?>">
                                        <input type="hidden" name="idQuestao" value="<?php echo $avalQuest['IdQuestao'];?>">

                                        <div class="row">
                                            <div class="col-12">
                                                
                                              <p><?php echo $resQuestaoDescricao['Descricao'];?> </li>  <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-delete"></i></button> </p>
                                               
                                            </div>
                                        </div>  
                                        </form>
                                    <?php } ?>      
                                                

                            </td>
                            <td>
                                <form class="forms-sample" method="post" action="../controller/AvaliacaoController.php?acao=deletar">
                                    <input type="hidden" name="idAvaliacao" value="<?php echo $aval['IdAvaliacao']?>">
                                    <button type="submit" 
                                    <?php if(count($resAvalQuestao) > 0){
                                        echo "disabled";
                                    }?>
                                    class="btn btn-primary mr-2">Deletar</button>
                                </form>
                            </td>
                            <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalExemplo">
                                Editar
                            </button>

                            <!-- Modal Editar -->
                            <form class="forms-sample" method="post" action="../controller/AvaliacaoController.php?acao=editar">
                            <input type="hidden" name="idAvaliacao" value="<?php echo $aval['IdAvaliacao'];?>"> 
                                <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Questão: <span class="text-muted"><?php echo $aval['Descricao'];?></span></h5>
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
