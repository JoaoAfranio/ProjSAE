<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/QuestaoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/TipoQuestaoModel.php";

    $questao = new QuestaoModel();
    $tipoQuestao = new TipoQuestaoModel();
    $resTipoQuestao = $tipoQuestao->listarTodos();
?>

<div class="card">
    <div class="card-body">
        <h4>Cadastrar pergunta</h4>
        <p class="card-description">
            Ex.: Exemplo de pergunta aqui
        </p>
            <form class="forms-sample" method="post" action="../controller/QuestaoController.php?acao=cadastrar">
                    <div class="form-group">
                      <label for="inputPergunta">Pergunta</label>
                      <input required type="text" class="form-control" name="descricao" placeholder="Exemplo de pergunta">
                    </div>
                    <div class="form-group">
                      <label for="idTipoQuestao">Tipo da Resposta</label>
                      <select class="form-control" name="idTipoQuestao">
                        <?php foreach($resTipoQuestao as $tipoQuestao){?>
                        <option value="<?php echo $tipoQuestao['IdTipoQuestao']?>"><?php echo $tipoQuestao['Descricao']?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
            </form>
    </div>
</div>