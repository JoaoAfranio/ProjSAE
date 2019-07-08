<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/DiagnosticoModel.php";
    

    $resultado = new ResultadoModel();
    $resResultado = $resultado->listarTodos();

?>

<div class="card">
    <div class="card-body">
        <h4>Resultados cadastradas</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Resultados</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ordem = 0;
                            foreach($resResultado as $res){
                            $ordem++;
                    ?>        

                        <tr>    
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $res['Descricao'];?></td>
                            <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal<?php echo $res['IdResultado'];?>">
                                Editar
                            </button>

                            <!-- Modal Editar -->
                            <form class="forms-sample" method="post" action="../controller/ResultadoController.php?acao=editar">
                            <input type="hidden" name="idResultado" value="<?php echo $res['IdResultado'];?>"> 
                                <div class="modal fade" id="modal<?php echo $res['IdResultado'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar Resutaldo: <span class="text-muted"><?php echo $res['Descricao'];?></span></h5>
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
