<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaModel.php";



    $questao = new QuestaoModel();
    $afirmativa = new AfirmativaModel();
    $resQuestao = $questao->listarTodos();
?>

<div class="card">
    <div class="card-body">
        <h4>Perguntas cadastradas</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Questão</th>
                        <th>Afirmativas</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ordem = 0;
                            foreach($resQuestao as $quest){
                            $ordem++;
                    ?>        

                        <tr>    
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $quest['Descricao'];?></td>
                            <td>

                                    <?php $resAfirmativa = $questao->listarAfirmativas($quest['IdQuestao']);
                                            foreach($resAfirmativa as $afirm){
                                                $resAfirmativaDescricao = $afirmativa->listarID($afirm['IdAfirmativa']);
                                                
                                    ?>  
                                    <form method="post" action="../controller/AfirmativaQuestaoController.php?acao=deletar">
                                        <input type="hidden" name="idQuestao" value="<?php echo $afirm['IdQuestao'];?>">
                                        <input type="hidden" name="idAfirmativa" value="<?php echo $afirm['IdAfirmativa'];?>">

                                        <div class="row">
                                            <div class="col-12">
                                                
                                              <p> <?php echo $resAfirmativaDescricao['Descricao'];?> </li>  <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-delete"></i></button> </p>
                                               
                                            </div>
                                        </div>  
                                        </form>
                                    <?php } ?>      
                                                

                            </td>
                            <td>
                                <form class="forms-sample" method="post" action="../controller/QuestaoController.php?acao=deletar">
                                    <input type="hidden" name="idQuestao" value="<?php echo $quest['IdQuestao']?>">
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
