<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/QuestaoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaModel.php";

    $questao = new QuestaoModel();
    $afirmativa = new AfirmativaModel();

    $resQuestao = $questao->listarTodos();
    $resAfirmativa = $afirmativa->listarTodos();
?>


<div class="card">
    <div class="card-body">
        <h4>Cadastrar afirmativas para a pergunta</h4>
            <p class="card-description">
                Ex.: Exemplo de pergunta aqui
            </p>
            <form class="forms-sample" method="post" action="../controller/AfirmativaQuestaoController.php?acao=cadastrar">
                <div class="form-group">
                    <label for="inputPergunta">Selecione a questão</label>
                    <select class="form-control" name="idQuestao">
                        <?php 
                            foreach ($resQuestao as $Questao) {
                                echo '<option value="' .  $Questao['IdQuestao'] . '">' . $Questao['Descricao'] .'</option>';
                            } 
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="selectTipoPergunta">Selecione a afirmativa</label>
                    <select class="form-control" name="idAfirmativa">
                        <?php 
                            foreach ($resAfirmativa as $Afirmativa) {
                                echo '<option value="' .  $Afirmativa['IdAfirmativa'] . '">' . $Afirmativa['Descricao'] .'</option>';
                            } 
                        ?>
                      </select>
                </div>
            <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
        </form>
    </div>
</div>