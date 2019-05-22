<?php   
  $resFormulario = $formulario->listarTodos();
  $formularioAvaliacao = new FormularioAvaliacaoModel();
  $avaliacaoQuestao = new AvaliacaoQuestaoModel();
?>

<div class="card">
    <div class="card-body">
        <h4>Formulário cadastrados</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Visualizar</th>
                        <th>Formulário</th>
                        <th>Avaliações</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            $ordem = 0;
                            foreach($resFormulario as $form){
                                $ordem++;
                    ?>        

                        <tr>    
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $form['Descricao'];?></td>
                            <td><div style="text-align:center;"><button type="button" data-toggle="modal" data-target="#Modal-<?php echo $form['IdFormulario'];?>" class="btn btn-primary mr-2"><i class="mdi mdi-magnify menu-icon"></i></button></div></td>

                            <div class="modal fade" id="Modal-<?php echo $form['IdFormulario'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel-<?php echo $quest['IdQuestao'];?>" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel-<?php $form['IdFormulario'];?>">Visualizando Formulário</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php  require 'ModalFormulario.php' ?>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fim Modal -->
                            <td>

                                    <?php   
                                            
                                            $resFormAvaliacao = $formularioAvaliacao->listarTodosIdFormulario($form['IdFormulario']);
                                            foreach($resFormAvaliacao as $formAvaliacao){
                                                $resAvaliacaoDescricao = $avaliacao->listarID($formAvaliacao['IdAvaliacao']);
                                              
                                    ?>  
                                    <form method="post" action="../controller/FormularioAvaliacaoController.php?acao=deletar">
                                        <input type="hidden" name="idAvaliacao" value="<?php echo $formAvaliacao['IdAvaliacao'];?>">
                                        <input type="hidden" name="idFormulario" value="<?php echo $formAvaliacao['IdFormulario'];?>">

                                        <div class="row">
                                            <div class="col-12">
                                                
                                              <p> <?php echo $resAvaliacaoDescricao['Descricao'];?> </li>  <button type="submit" class="btn btn-primary mr-2"><i class="mdi mdi-delete"></i></button> </p>
                                               
                                            </div>
                                        </div>  
                                        </form>
                                    <?php } ?>      
                                                

                            </td>
                            <td>
                                <form class="forms-sample" method="post" action="../controller/FormularioController.php?acao=deletar">
                                    <input type="hidden" name="idFormulario" value="<?php  echo $form['IdFormulario']?>">
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
