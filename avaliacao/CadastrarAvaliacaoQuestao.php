<?php 
    

    $resAvaliacao = $avaliacao->listarTodos();
    $resQuestao = $questao->listarTodos();
?>


<div class="card">
    <div class="card-body">
        <h4>Cadastrar questões para a avaliação</h4>
            <p class="card-description">
                Ex.: Exemplo...
            </p>
            <form class="forms-sample" method="post" action="../controller/AvaliacaoQuestaoController.php?acao=cadastrar">
                <div class="form-group">
                    <label for="selectAvaliacao">Selecione a avaliação</label>
                    <select class="form-control" name="idAvaliacao">
                        <?php 
                        foreach ($resAvaliacao as $avaliacao) {
                            echo '<option value="' .  $avaliacao['IdAvaliacao'] . '">' . $avaliacao['Descricao'] .'</option>';
                        } 
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectQuestao">Selecione a questão</label>
                    <select class="form-control" name="idQuestao">
                        <?php 
                        foreach ($resQuestao as $questao) {
                            echo '<option value="' .  $questao['IdQuestao'] . '">' . $questao['Descricao'] .'</option>';
                        } 
                        ?>
                      </select>
                </div>
            <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
        </form>
    </div>
</div>