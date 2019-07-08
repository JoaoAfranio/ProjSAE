<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaQuestaoModel.php";



    $questao = new QuestaoModel();
    $afirmativa = new AfirmativaModel();
    $afirmativaQuestao = new AfirmativaQuestaoModel();
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
                        <th>Visualizar</th>
                        <th>Questão</th>
                        <th>Afirmativas</th>
                        <th>Deletar</th>
                        <th>Editar</th>
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
                            <td><div style="text-align:center;"><button type="button" data-toggle="modal" data-target="#Modal-<?php echo $quest['IdQuestao'];?>" class="btn btn-primary mr-2"><i class="mdi mdi-magnify menu-icon"></i></button></div></td>

                             <div class="modal fade" id="Modal-<?php echo $quest['IdQuestao'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel-<?php echo $quest['IdQuestao'];?>" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ModalLabel-<?php echo $quest['IdQuestao'];?>">Visualizando questão</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <p><?php echo $quest['Descricao'];?></p>
                                                <?php // Formar campo de acordo com o tipo da questão
                                                    // Aberta = 1
                                                    // Fechada Escolha Unica = 2
                                                    // Fechada Escolha Múltipla = 3
                                                    // Data = 4
                                                    // Afirmação ou Negação = 5


                                                    if($quest['IdTipoQuestao'] == 1){
                                                        echo '<input type="text" class="form-control">';
                                                    }
                                                    if($quest['IdTipoQuestao'] == 2){
                                                    ?> 
                                                        <div class="form-group">
                                                        <select class="form-control" <?php echo "name=" . $quest['IdQuestao'];?>>
                                                          <option> -- </option>
                                                      <?php 
                                                        //Trazer todas as afirmativas da questão
                                                      $resAfirmativaQuestao = $afirmativaQuestao->listarTodosIdQuestao($quest['IdQuestao']);
                                                      foreach($resAfirmativaQuestao as $afirmativaQuest){ 
                                                          //Buscar o nome das afirmativas
                                                          $resDescAfirmativa = $afirmativa->listarID($afirmativaQuest['IdAfirmativa']);

                                                          ?> 
                                                          <option><?php echo $resDescAfirmativa['Descricao'];?></option>
                                                          
                                                      <?php } ?>
                                                        </select>
                                                      </div>

                                                      <?php
                                                    }
                                                    if($quest['IdTipoQuestao'] == 3){ ?>
                                                        <div class="form-group">
                                                        <select class="js-example-basic-multiple w-100" multiple="multiple" <?php echo "name='input" . $quest['IdQuestao'] . "'";?>>
                                                      <?php 
                                                      //Trazer todas as afirmativas da questão
                                                      $resAfirmativaQuestao = $afirmativaQuestao->listarTodosIdQuestao($quest['IdQuestao']);
                                                      foreach($resAfirmativaQuestao as $afirmativaQuest){ 

                                                        //Buscar o nome das afirmativas
                                                        $resDescAfirmativa = $afirmativa->listarID($afirmativaQuest['IdAfirmativa']);
                                                          ?> 
                                                          <option><?php echo $resDescAfirmativa['Descricao'];?></option>
                                                      <?php } ?>
                                                        </select>
                                                      </div>
                                                   <?php }
                                                    if($quest['IdTipoQuestao'] == 4){
                                                        echo '<input type="date" class="form-control">';
                                                    }
                                                    if($quest['IdTipoQuestao'] == 5){ ?>
                                                    <div class="form-group row">
                                                        <div class="col-sm-3">
                                                        <div class="form-check">
                                                          <label class="form-check-label">
                                                            <input name="questao" type="radio" class="form-check-input" value="Sim">
                                                            Sim
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <div class="col-sm-3">
                                                        <div class="form-check">
                                                          <label class="form-check-label">
                                                            <input name="questao" type="radio" class="form-check-input" value="Não">
                                                            Não
                                                          </label>
                                                          </div>
                                                        </div>
                                                      </div>
                                                   <?php }
                                                
                                                ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fim Modal -->

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
                                    <button type="submit" 
                                    <?php if(count($resAfirmativa) > 0){
                                        echo "disabled";
                                    }?>
                                    class="btn btn-primary mr-2">Deletar</button>
                                </form>
                            </td>
                            <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $quest['IdQuestao']?>">
                                Editar
                            </button>

                            <!-- Modal Editar -->
                            <form class="forms-sample" method="post" action="../controller/QuestaoController.php?acao=editar">
                            <input type="hidden" name="idQuestao" value="<?php echo $quest['IdQuestao'];?>"> 
                                <div class="modal fade" id="modal<?php echo $quest['IdQuestao']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Questão: <span class="text-muted"><?php echo $quest['Descricao'];?></span></h5>
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
