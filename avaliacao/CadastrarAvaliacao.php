<div class="card">
    <div class="card-body">
        <h4>Cadastrar Avaliação</h4>
        <p class="card-description">
            Ex.: Exemplo de avaliação aqui
        </p>
        <form class="forms-sample" method="post" action="../controller/AvaliacaoController.php?acao=cadastrar"> 
            <div class="form-group">
                <label for="descricao">Avaliação</label>
                <input type="text" class="form-control" name="descricao" placeholder="Exemplo de avaliação">
            </div>
            <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
        </form>
    </div>
</div>