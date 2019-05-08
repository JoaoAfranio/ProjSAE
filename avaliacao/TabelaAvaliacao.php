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
