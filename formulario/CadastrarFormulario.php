<?php
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/FormularioModel.php";

    $afirmativa = new FormularioModel();

?>


<div class="card">
    <div class="card-body">
        <h4>Cadastrar Formulário</h4>
        <p class="card-description">
            Ex.: Exemplo de formulário aqui
        </p>
        <form class="forms-sample" method="post" action="../controller/FormularioController.php?acao=cadastrar">
            <div class="form-group">
                <label for="descricao">Formulário</label>
                <input type="text" class="form-control" name="descricao" placeholder="Exemplo de formulário">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
        </form>
    </div>
</div>