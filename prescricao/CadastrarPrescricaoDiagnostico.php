<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/DiagnosticoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/PrescricaoModel.php";

    $diagnostico = new DiagnosticoModel();
    $prescricao = new PrescricaoModel();

    $resDiagnostico = $diagnostico->listarTodos();
    $resPrescricao = $prescricao->listarTodos();
?>


<div class="card">
    <div class="card-body">
        <h4>Cadastrar prescrições para o diagnóstico</h4>
            <p class="card-description">
                Ex.: Exemplo de pergunta aqui
            </p>
            <form class="forms-sample" method="post" action="../controller/PrescricaoDiagnosticoController.php?acao=cadastrar">
                <div class="form-group">
                    <label for="inputPergunta">Selecione a questão</label>
                    <select class="form-control" name="idDiagnostico">
                        <?php 
                            foreach ($resDiagnostico as $Diagnostico) {
                                echo '<option value="' .  $Diagnostico['IdDiagnostico'] . '">' . $Diagnostico['Descricao'] .'</option>';
                            } 
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectTipoPergunta">Selecione a prescrição</label>
                    <select class="form-control" name="idPrescricao">
                        <?php 
                            foreach ($resPrescricao as $Prescricao) {
                                echo '<option value="' .  $Prescricao['IdPrescricao'] . '">' . $Prescricao['Descricao'] .'</option>';
                            } 
                        ?>
                      </select>
                </div>
            <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
        </form>
    </div>
</div>