<?php 
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/DiagnosticoModel.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/sae/model/UnidadeInternacaoModel.php";

    $questao = new DiagnosticoModel();
    $unidadeInternacao = new UnidadeInternacaoModel();
    $resUnidadeInternacao = $unidadeInternacao->listarTodos();
?>

<div class="card">
    <div class="card-body">
        <h4>Cadastrar diagnóstico</h4>
        <p class="card-description">
            Ex.: Exemplo de diagnóstico aqui
        </p>
            <form class="forms-sample" method="post" action="../controller/DiagnosticoController.php?acao=cadastrar">
                    <div class="form-group">
                      <label for="inputDiagnostico">Diagnóstico</label>
                      <input required type="text" class="form-control" name="descricao" placeholder="Exemplo de diagnóstico">
                    </div>
                    <div class="form-group">
                      <label for="idUnidadeInternacao">Unidade de internação</label>
                      <select class="form-control" name="idUnidadeInternacao">
                        <?php foreach($resUnidadeInternacao as $unidadeInternacao){?>
                        <option value="<?php echo $unidadeInternacao['IdUnidadeInternacao']?>"><?php echo $unidadeInternacao['NomeUnidade']?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Cadastrar</button>
            </form>
    </div>
</div>