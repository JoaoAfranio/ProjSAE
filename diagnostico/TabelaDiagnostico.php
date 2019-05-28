<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/PrescricaoModel.php";

    $diagnostico = new DiagnosticoModel();
    $prescricao = new PrescricaoModel();
    $resDiagnostico = $diagnostico->listarTodos();
?>

<div class="card">
    <div class="card-body">
        <h4>Diagnósticos cadastrados</h4>
        <div class="table-responsive">
            <table id="order-listing" class="table">
                <thead>
                    <tr>
                        <th>Ordem #</th>
                        <th>Diagnóstico</th>
                        <th>Prescrições</th>
                        <th>Resultados</th>
                        <th>Unidade de Internação</th>
                        <th>Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $ordem = 0;
                            foreach($resDiagnostico as $diag){
                            $ordem++;
                    ?>        

                        <tr>    
                            <td><?php echo $ordem;?></td>
                            <td><?php echo $diag['Descricao'];?></td>

                            <td><div style="text-align:center;"><button type="button" data-toggle="modal" data-target="#Modal-<?php echo $diag['IdDiagnostico'];?>" class="btn btn-primary mr-2"><i class="mdi mdi-magnify menu-icon"></i></button></div></td>

                            <div class="modal fade" id="Modal-<?php echo $diag['IdDiagnostico'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel-<?php echo $diag['IdDiagnostico'];?>" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel-<?php $diag['IdDiagnostico'];?>">Visualizando Prescrições</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php  require 'ModalDiagnostico.php' ?>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <td><div style="text-align:center;"><button type="button" data-toggle="modal" data-target="#Modal-R<?php echo $diag['IdDiagnostico'];?>" class="btn btn-primary mr-2"><i class="mdi mdi-magnify menu-icon"></i></button></div></td>

                            <div class="modal fade" id="Modal-R<?php echo $diag['IdDiagnostico'];?>" tabindex="-1" role="dialog" aria-labelledby="ModalLabel-<?php echo $diag['IdDiagnostico'];?>" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModalLabel-<?php $diag['IdDiagnostico'];?>">Visualizando Resultados</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <?php  include 'ModalResultado.php' ?>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <td>
                                <?php $resUnidade = $diagnostico->listarUnidade($diag['IdUnidadeInternacao']);
                                echo $resUnidade['NomeUnidade'];?>
                            </td>
                            <td>
                                <form class="forms-sample" method="post" action="../controller/DiagnosticoController.php?acao=deletar">
                                    <input type="hidden" name="idDiagnostico" value="<?php echo $diag['IdDiagnostico']?>">
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
