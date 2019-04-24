<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/AfirmativaModel.php";

    $afirmativa = new AfirmativaModel();
?>

<div class="card">
    <div class="card-body">
        <h4>Cadastrar afirmativa</h4>
        <p class="card-description">
            Ex.: Exemplo de afirmativa aqui
        </p>
        <form class="forms-sample" method="post" action="../controller/AfirmativaController.php?acao=cadastrar">
            <div class="form-group">
                <label for="descricao">Afirmativa</label>
                <input type="text" class="form-control" name="descricao" placeholder="Exemplo de afirmativa">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
        </form>
    </div>
</div>