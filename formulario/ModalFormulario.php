<h3 class="text-center"><?php echo  $form['Descricao'];?></h3>
<div class="row">
    <?php 
    $resFormularioAvaliacao = $formularioAvaliacao->listarTodosIdFormulario($form['IdFormulario']);
    foreach($resFormularioAvaliacao as $formAvaliacao){
        $resAvaliacaoDesc = $avaliacao->listarID($formAvaliacao['IdAvaliacao']);
        
    ?>
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo $resAvaliacaoDesc['Descricao']?></h4>
                        <form class="forms-sample">
                            <?php 
                            $resAvaliacaoQuestao = $avaliacaoQuestao->listarTodasQuestoes($formAvaliacao['IdAvaliacao']);
                            foreach($resAvaliacaoQuestao as $AvaliacaoQuestao){
                            $resQuestoes = $questao->listarID($AvaliacaoQuestao['IdQuestao']);
                            ?>
                            
                            <p><?php echo $resQuestoes['Descricao'];?></p>
                                                <?php // Formar campo de acordo com o tipo da questão
                                                    // Aberta = 1
                                                    // Fechada Escolha Unica = 2
                                                    // Fechada Escolha Múltipla = 3
                                                    // Data = 4
                                                    // Afirmação ou Negação = 5


                                                    if($resQuestoes['IdTipoQuestao'] == 1){
                                                        echo '<input style="margin-bottom:10px;" type="text" class="form-control">';
                                                    }
                                                    if($resQuestoes['IdTipoQuestao'] == 2){
                                                    ?> 
                                                        <div class="form-group">
                                                        <select class="form-control" <?php echo "name=" . $resQuestoes['IdQuestao'];?>>
                                                          <option> -- </option>
                                                      <?php 
                                                        //Trazer todas as afirmativas da questão
                                                      $resAfirmativaQuestao = $afirmativaQuestao->listarTodosIdQuestao($resQuestoes['IdQuestao']);
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
                                                    if($resQuestoes['IdTipoQuestao'] == 3){ ?>
                                                        <div class="form-group">
                                                        <select class="js-example-basic-multiple w-100" multiple="multiple" <?php echo "name='input" . $resQuestoes['IdQuestao'] . "'";?>>
                                                      <?php 
                                                      //Trazer todas as afirmativas da questão
                                                      $resAfirmativaQuestao = $afirmativaQuestao->listarTodosIdQuestao($resQuestoes['IdQuestao']);
                                                      foreach($resAfirmativaQuestao as $afirmativaQuest){ 

                                                        //Buscar o nome das afirmativas
                                                        $resDescAfirmativa = $afirmativa->listarID($afirmativaQuest['IdAfirmativa']);
                                                          ?> 
                                                          <option><?php echo $resDescAfirmativa['Descricao'];?></option>
                                                      <?php } ?>
                                                        </select>
                                                      </div>
                                                   <?php }
                                                    if($resQuestoes['IdTipoQuestao'] == 4){
                                                        echo '<input type="date" class="form-control">';
                                                    }
                                                    if($resQuestoes['IdTipoQuestao'] == 5){ ?>
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
                                                } ?>
                        </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
